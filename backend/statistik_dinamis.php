<?php
// die(print_r($_POST));
	include '../fungsi/koneksi.php';

	// if ($_POST['filter'] == 'harian') {
	// 	$tgl_siaki = date('y-m-d');


	// 	$qry = "SELECT sum(nilai_sensor) as jml
	// 			FROM sensor_value where tgl = '{$tgl_siaki}' and idsensor=7 "; //volume hari ini

	// 	$qry2 = "SELECT * from aktivitas where tgl = '{$tgl_siaki}' order by waktu desc";


	// 	$qry3 = "SELECT * from sensor_value where tgl = '{$tgl_siaki}' and idsensor=7 "; //mengisi hari ini

	// 	$qry4 = "SELECT count(*) as jml from aktivitas where tgl = '{$tgl_siaki}' and idsensor = 12 and aktivitas = 'menguras'"; //tabel hari ini

	// }else 
	if ($_POST['filter'] == 'mingguan'){

		$qry = "SELECT SUM( nilai_sensor ) AS jml
				FROM sensor_value
				WHERE idsensor =7
				AND tgl	BETWEEN DATE_SUB( NOW( ) , INTERVAL 7 DAY )	AND NOW( )"; // Volume 7 hari terakhir

		$qry2 = "SELECT * from aktivitas where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 7
				DAY ) AND NOW( ) order by waktu desc"; //tabel 7 hari terakhir

		$qry3 =  "SELECT tgl, SUM(nilai_sensor) AS jml 
					FROM sensor_value 
					where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 7 DAY ) AND NOW( ) 
						and idsensor=7 
					GROUP BY tgl"; //chart 7 hari terakhir (volume total per hari) sql bisa di web error

		$qry4 = "SELECT count(*) as jml from aktivitas 
				where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 7	DAY ) AND NOW( )
					and idsensor = 12 and aktivitas = 'menguras'"; //menguras 7 hari terakhir
	}else{
		$qry = "SELECT SUM( nilai_sensor ) AS jml
				FROM sensor_value
				WHERE idsensor =7
				AND tgl	BETWEEN DATE_SUB( NOW( ) , INTERVAL 30	DAY )AND NOW( )"; //Volume 30 hari terakhir

		$qry2 = "SELECT * from aktivitas 
				where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 30 DAY ) AND NOW( ) 
				order by waktu desc"; //tabel 30 hari terakhir

		$qry3 = "SELECT tgl, SUM(nilai_sensor) AS jml 
					FROM sensor_value 
					where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 30 DAY ) AND NOW( ) 
						and idsensor=7 
					GROUP BY tgl"; //chart 30 hari terakhir tampil tapi tidak terjumlah

		$qry4 = "SELECT count(*) as jml from aktivitas where tgl BETWEEN DATE_SUB( NOW( ) , INTERVAL 30	DAY ) AND NOW( ) 
				and idsensor = 12 and aktivitas = 'menguras'"; //menguras 30 hari terakhir
	}


	// die($qry4);
	$ex = mysqli_query($koneksi, $qry);
	$data = [];
	while($row = mysqli_fetch_assoc($ex)){
		$data[]=$row;
	}



	$ex2 = mysqli_query($koneksi, $qry2);
	$table = [];
	while($row = mysqli_fetch_assoc($ex2)){
		$table[]=$row;
	}



	$ex3 = mysqli_query($koneksi, $qry3);
	$chart = [];
	$label=[];
	$dat=[];
	while($row = mysqli_fetch_assoc($ex3)){
		// $chart[]=$row;
		array_push($label, $row['tgl']);
		array_push($dat, $row['jml']);
	}
	array_push($chart, array('label' => $label, 'data'=> $dat ));


	$ex4 = mysqli_query($koneksi, $qry4);
	$jml_kuras = [];
	while($row = mysqli_fetch_assoc($ex4)){
		$jml_kuras[]=$row;
	}

	$res = array('jml_air' => $data,
				'jml_kuras' => $jml_kuras,
				'chart' => $chart,
				'table'=> $table,
			 );
	echo json_encode($res);
	die();
?>