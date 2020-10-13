<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form

$iduser 	= $_POST['iduser'];
$perintah 	= $_POST['perintah'];
$nama 		= $_POST['nama'];
$username 	= $_POST['username'];
$password 	= $_POST['password'];
$level_user = $_POST['level_user'];

// menginput data ke database
if ($perintah=='tambah') { 
	mysqli_query($koneksi,"INSERT INTO user VALUES('','$nama','$username','$password','$level_user')");
}elseif($perintah=='edit'){
	mysqli_query($koneksi,"UPDATE user SET nama='$nama', username='$username', password='$password', level_user='$level_user' WHERE iduser=".(int)$iduser);
}

// mengalihkan halaman kembali ke index.php
header("location:../pengguna.php");

?>