<?php
	include 'fungsi/koneksi.php';
	$sensor = $_GET['sensor'];
	$post=json_decode(file_get_contents('php://input'));
	// echo "<pre>";
	// print_r($post);die();
	@$nilai = $post->nilai;
	@$status = $post->status;

	if($sensor == "ph"){
		ph($nilai,$status, $koneksi);
	}elseif($sensor == "waterflow"){
		waterflow($nilai,$status, $koneksi);
	}elseif($sensor ==  "water_level"){
		water_level($nilai,$status, $koneksi);
	}elseif($sensor == "turbidity"){
		turbidity($nilai,$status, $koneksi);
	}elseif($sensor == "tds"){
		turbidity($nilai,$status, $koneksi);
	}elseif($sensor == "pompa_get"){
		pompa_get($sensor,$koneksi);
	}elseif($sensor == "kran_get"){
		kran_get($sensor, $koneksi);
	}elseif($sensor == "pompa_post"){
		pompa_post($status,$koneksi);
	}elseif($sensor == "kran_post"){
		kran_post($status, $koneksi);
	}else{
		echo json_encode("Invalid");die();
	}

	function ph($nilai, $status,$koneksi){
		$qry = "INSERT INTO sensor_value (idsensor, tgl, waktu, nilai_sensor, status_air) VALUES (5, curdate(), curtime(), $nilai, '{$status}' )";
		$ex = mysqli_query($koneksi, $qry);
		if($ex){
			$res = array("status"=>true, "pesan" => "Data berhasil disimpan");
		}else{
			$res = array("status"=>false, "pesan" => "Data gagal disimpan");
		}
		echo json_encode($res);die();
	}

	function waterflow($nilai, $status,$koneksi){
		$qry = "INSERT INTO sensor_value (idsensor, tgl, waktu, nilai_sensor, status_air) VALUES (7, curdate(), curtime(), $nilai, '{$status}' )";
		$ex = mysqli_query($koneksi, $qry);
		if($ex){
			$res = array("status"=>true, "pesan" => "Data berhasil disimpan");
		}else{
			$res = array("status"=>false, "pesan" => "Data gagal disimpan");
		}
		echo json_encode($res);die();
	}

	function water_level($nilai, $status,$koneksi){
		$qry = "INSERT INTO sensor_value (idsensor, tgl, waktu, nilai_sensor, status_air) VALUES (9, curdate(), curtime(), $nilai, '{$status}' )";
		$ex = mysqli_query($koneksi, $qry);
		if($ex){
			$res = array("status"=>true, "pesan" => "Data berhasil disimpan");
		}else{
			$res = array("status"=>false, "pesan" => "Data gagal disimpan");
		}
		echo json_encode($res);die();
	}

	function turbidity($nilai, $status,$koneksi){
		$qry = "INSERT INTO sensor_value (idsensor, tgl, waktu, nilai_sensor, status_air) VALUES (6, curdate(), curtime(), $nilai, '{$status}' )";
		$ex = mysqli_query($koneksi, $qry);
		if($ex){
			$res = array("status"=>true, "pesan" => "Data berhasil disimpan");
		}else{
			$res = array("status"=>false, "pesan" => "Data gagal disimpan");
		}
		echo json_encode($res);die();
	}

	function tds($nilai, $status,$koneksi){
		$qry = "INSERT INTO sensor_value (idsensor, tgl, waktu, nilai_sensor, status_air) VALUES (8, curdate(), curtime(), $nilai, '{$status}' )";
		$ex = mysqli_query($koneksi, $qry);
		if($ex){
			$res = array("status"=>true, "pesan" => "Data berhasil disimpan");
		}else{
			$res = array("status"=>false, "pesan" => "Data gagal disimpan");
		}
		echo json_encode($res);die();
	}

	function pompa_post($status,$koneksi){
		$qry = "UPDATE sensor SET status_sensor='$status' WHERE idsensor=11";
		$ex = mysqli_query($koneksi, $qry);
		if($ex){
			$res = array("status"=>true, "pesan" => "Data berhasil disimpan");
		}else{
			$res = array("status"=>false, "pesan" => "Data gagal disimpan");
		}
		echo json_encode($res);die();
	}

	function kran_post($status,$koneksi){
		$qry = "UPDATE sensor SET status_sensor='$status' WHERE idsensor=12";
		$ex = mysqli_query($koneksi, $qry);
		if($ex){
			$res = array("status"=>true, "pesan" => "Data berhasil disimpan");
		}else{
			$res = array("status"=>false, "pesan" => "Data gagal disimpan");
		}
		echo json_encode($res);die();
	}

	function pompa_get($status, $koneksi){
		$qry = "SELECT * from sensor where idsensor = 11";
		$ex = mysqli_query($koneksi, $qry);
		$data = [];
		while($row = mysqli_fetch_assoc($ex)){
			$data[]=$row;
		}

		if (count($data) != 0) {
			$res = array("status"=> true, "pesan" => "Berhasil mengambil data", "data"=>$data);
		}else{
			$res = array("status"=>false, "pesan" => "Data mengambil gagal");
		}
		echo json_encode($res);die();
	}

	function kran_get($sensor, $koneksi){
		$qry = "SELECT * from sensor where idsensor = 12";
		$ex = mysqli_query($koneksi, $qry);
		$data = [];
		while($row = mysqli_fetch_assoc($ex)){
			$data[]=$row;
		}

		if (count($data) != 0) {
			$res = array("status"=> true, "pesan" => "Berhasil mengambil data", "data"=>$data);
		}else{
			$res = array("status"=>false, "pesan" => "Data mengambil gagal");
		}
		echo json_encode($res);die();
	}


?>