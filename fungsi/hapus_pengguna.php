<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$iduser = $_GET['id'];


// menginput data ke database
$result = mysqli_query($koneksi, "DELETE FROM user WHERE iduser=".(int)$iduser);

// mengalihkan halaman kembali ke index.php
header("location:../pengguna.php");

?>