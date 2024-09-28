<?php

$host="sql312.infinityfree.com";
$user="if0_37403181";
$password="y7Ww0ItBJkR";
$db="if0_37403181_rumah_sakit";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
        die("Koneksi Gagal:".mysqli_connect_error());
        
}
?>