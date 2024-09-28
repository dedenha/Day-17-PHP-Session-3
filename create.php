<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $tanggal_lahir=input($_POST["tanggal_lahir"]);
        $alamat=input($_POST["alamat"]);
        $telepon=input($_POST["telepon"]);
        $penyakit=input($_POST["penyakit"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into pasien (nama,tanggal_lahir,alamat,telepon,penyakit) values
		('$nama','$tanggal_lahir','$alamat','$telepon','$penyakit')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="varchar" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" required/>
        </div>
       <div class="form-group">
            <label>Alamat :</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Telepon:</label>
            <input type="char" name="telepon" class="form-control" placeholder="Masukan No Telepon" required/>
        </div>
        <div class="form-group">
            <label>Penyakit:</label>
            <textarea name="penyakit" class="form-control" rows="5"placeholder="Masukan Penyakit" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>