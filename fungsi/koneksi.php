<?php 
$koneksi = mysqli_connect("localhost","root","","tandonpintar");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

date_default_timezone_set('Asia/Jakarta');
$jam = date("H:i");
$today = date("Y-m-d");
$tgl_jam = date("Y-m-d H:i:s");


?>