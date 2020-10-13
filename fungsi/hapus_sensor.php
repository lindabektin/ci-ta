<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$idsensor = $_GET['id'];


// menginput data ke database
$result = mysqli_query($koneksi, "DELETE FROM sensor WHERE idsensor=".(int)$idsensor);

// mengalihkan halaman kembali ke index.php
header("location:../sensor.php");

?>