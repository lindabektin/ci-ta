<?php
	include '../fungsi/koneksi.php';


	$qry = "SELECT *
			FROM (

			SELECT *
			FROM sensor_value
			ORDER BY waktu DESC
			) AS data
			GROUP BY idsensor";
	// die($qry);
	$ex = mysqli_query($koneksi, $qry);
	$data = [];
	while($row = mysqli_fetch_assoc($ex)){
		$data[]=$row;
	}
	echo json_encode($data);
	die();
?>