<?php
if (session_id() == "") {
	session_start();
}
//ini digunakan untuk validasi jika tidak ada sessi login maka diredirect ke halaman login
if (!isset($_SESSION['username']) or $_SESSION['username'] == "") {
	header("location:login.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html>

<head>
	<script src="js/jquery.min.js"></script>

	<link rel="shortcut icon" href="favico.ico">

	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="ico/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="ico/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="ico/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="ico/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="ico/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="ico/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="ico/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="ico/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="ico/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="ico/favicon-128.png" sizes="128x128" />
	<meta name="application-name" content="&nbsp;" />
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="mstile-310x310.png" />


	<title>Tandon Airku</title>




	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&display=swap" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="chartjs/Chart.css">

	<link rel="stylesheet" type="text/css" href="datatable/datatables.min.css" />
	<script type="text/javascript" src="datatable/dataTables.min.js"></script>



	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>


	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="datatable/css/dataTablesChart.css"> -->

	<style type="text/css">
		body {
			margin-top: 60px;
			font-family: 'Montserrat', sans-serif;

		}


		.navbar {
			box-shadow: 0px 8px 8px -6px rgba(0, 0, 0, .5);
		}

		/*Kualitas Terkini*/
		.kualitas {
			color: #33A5C9;
			margin-top: 15px;
			/*text-align: center;*/
			font-size: 18px;
			margin-bottom: 8px;
		}

		.tanggal {
			color: #084052;
			margin-top: 4px;
			/*text-align: center;*/
			font-size: 30px;
		}

		.container-lima {

			width: 350px;
			height: 30px;
			margin: 1px auto;
			display: flex;
			background-color: #000000;

		}

		.kotak {
			width: 168px;
			height: 35px;
			background-color: #DFF7FF;
			color: #084052;
			border-radius: 5px 5px 5px 5px;
			text-align: center;
			font-size: 23px;
			/*margin:auto;*/
			/*padding-top: 5px;*/
		}

		.kotak span {
			margin: auto;
		}

		.navbar-btn {
			border-radius: 20px;
			background-color: #64CFF0;
		}

		.navbar-brand {
			font-family: 'Pacifico', cursive;
			letter-spacing: 3px;

		}

		.card {
			background-color: #33A5C9;
			border-radius: 10px 10px 0px 0px;
			margin: 10px;
			padding: 10px;
			height: 150px;
			color: #fff;
			/*margin-bottom: -10px;*/
		}

		.card2 {
			margin-top: -100px;
			background-color: #127999;
			border-radius: 0px 0px 10px 10px;
			margin: 10px;
			padding: 10px;
			height: 50px;
			color: #fff;
		}

		.angka {
			color: #fff;
			font-size: 76px;
			font-weight: bold;
			font-family: 'Robota-NonCommercial';
		}

		.ket-atas {
			color: #fff;
		}

		.ket-atas-atas {
			margin-top: 10px;
			color: #fff;
		}
	</style>
</head>

<body>

	<script src="chartjs/Chart.js"></script>
	<script src="chartjs/Chart.bundle.js"></script>
	<script src="datatable/datatables.js"></script>
	<?php
	include 'fungsi/koneksi.php';
	?>


	<!-- Navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="home.php"> <img alt="Brand" src="ico/favicon-32x32.png" style="margin-top: -6px; margin-left: -5px;"></a>
				<a class="navbar-brand" href="home.php" style="color: #64CFF0; font-size: 30px; ">Tandon Airku</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav  navbar-right">
					<li class="active"><a href="home.php">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
							Home<span class="sr-only">(current)</span></a></li>
					<!-- /*IF jika level_user==1 atau admin maka menu di bawah ini akan tampil*/  -->
					<?php if ($_SESSION['level_user'] == "1") { ?>

						<li><a href="pengguna.php">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								Pengguna</a></li>
					<?php } ?>
					<a type="button" href="fungsi/logout.php" class="btn navbar-btn btn-sm" style="margin-left: 10px; margin-top: 13px">
						<span class="glyphicon glyphicon-log-out" aria-hidden="true" style="color: white;"></span>
						<strong style="color: white;">Keluar</strong></a>
				</ul>
			</div> <!-- navbar-collapse -->
		</div> <!-- container-fluid -->
	</nav>

	<!-- Kualitas Terkini -->
	<div class="container">

		<div class="kualitas">Last Update : </div>

		<div class="kotak">
			<span>
				<?php
				date_default_timezone_set('Asia/Jakarta');
				echo date('H : i : s a');
				?>
			</span>
		</div>

		<div class="tanggal">
			<span>
				<?php
				date_default_timezone_set('Asia/Jakarta');
				echo date('l, d M Y');
				?>
			</span>
		</div>

	</div>



	<!-- navigasi angka -->
	<div class="container" style="padding-top: 30px;">
		<!--  -->

		<div class="row">

			<div class="col-md-3 col-xs-6 ">
				<div class="row">
					<div class="card" style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);">
						<center>
							<font id="turbidity" class="angka"> - </font>
							<font>NTu</font>
						</center>
						<font class="ket-atas">Turbidity</font>
					</div>
				</div>
				<div class="row" style="margin-top:-20px;">
					<div class="card2" style="box-shadow: 0px -3px 2px rgba(0,0,0,0.4);">
						<center><strong id="turbidity_status"> - </strong></center>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-xs-6 ">
				<div class="row">
					<div class="card" style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);" style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);">
						<center>
							<font id="ph" class="angka"> - </font>
						</center>
						<font class="ket-atas">pH</font>
					</div>
				</div>
				<div class="row" style="margin-top:-20px;">
					<div class="card2" style="box-shadow: 0px -3px 2px rgba(0,0,0,0.4);">
						<center><strong id="ph_status"> - </strong></center>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-xs-6 ">
				<div class="row">
					<div class="card" style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);">
						<center>
							<font id="tds" class="angka"> - </font>
							<font>mg/l</font>
						</center>
						<font class="ket-atas">TDS</font>
					</div>
				</div>
				<div class="row" style="margin-top:-20px;">
					<div class="card2" style="box-shadow: 0px -3px 2px rgba(0,0,0,0.4);">
						<center><strong id="tds_status"> - </strong></center>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-xs-6 ">
				<div class="row">
					<div class="card" style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);">
						<center>
							<font style="margin:top;">Level</font>
							<font id="volume" class="angka"> - </font>
						</center>
						<font class="ket-atas">Volume Air</font>
					</div>
				</div>
				<div class="row" style="margin-top:-20px;">
					<div class="card2" style="box-shadow: 0px -3px 2px rgba(0,0,0,0.4);">
						<center><strong id="volume_status"> - </strong></center>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- riwayat -->
	<div class="container">
		<div class="row">
			<!-- sisi kiri -->
			<div class="col-md-4" style="padding: 35px;">
				<legend>
					<!-- <div class="kotak">  -->
					Riwayat
					<!-- </div> -->
				</legend>


				<div class="row">

					<div class="col-md-7">
						<select class="form-control" onchange="sel()" id="filter">

							<option selected value="mingguan">Minggu ini</option>
							<option value="bulanan">Bulan ini</option>
						</select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-8 col-xs-12 ">
						<div class="row">
							<div class="card" style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);">
								<center>
									<font id="jml_air" class="angka"> - </font>
									<font>Liter</font>
								</center>
							</div>
						</div>
						<div class="row" style="margin-top:-20px;">
							<div class="card2" style="box-shadow: 0px -3px 2px rgba(0,0,0,0.4);">
								<center>Air digunakan</center>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-8 col-xs-12 ">
						<div class="row">
							<div class="card" style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);">
								<center>
									<font id="jml_kuras" class="angka"> - </font>
									<font style="font-size: 30px">x</font>
								</center>
							</div>
						</div>
						<div class="row" style="margin-top:-20px;">
							<div class="card2" style="box-shadow: 0px -3px 2px rgba(0,0,0,0.4);">
								<center>Jumlah Pengurasan</center>
							</div>
						</div>
						<br>

						<legend></legend>
						<div class="panel panel-info">
							<h4 class="panel-default">
								<center>Pompa Air</center>
							</h4>
							<div class="panel-heading">
								<center>
									<label class="checkbox-inline">
										<?php
										$ambilSensorPompaAir = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM sensor WHERE idsensor=11 LIMIT 0,1"));
										?>
										<input type="checkbox" <?php echo $ambilSensorPompaAir['status_sensor'] == 'on' ? 'checked' : ''; ?> id="pompaCheckbox" data-toggle="toggle">
									</label>
								</center>
							</div>
						</div>
						<div class="panel panel-info">
							<h4 class="panel-default">
								<center>Kuras Tandon</center>
							</h4>
							<div class="panel-heading">
								<center>
									<label class="checkbox-inline">
										<?php
										$ambilSensorKurasTandon = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM sensor WHERE idsensor=12 LIMIT 0,1"));
										?>
										<input type="checkbox" <?php echo $ambilSensorKurasTandon['status_sensor'] == 'on' ? 'checked' : ''; ?> id="kurasCheckbox" data-toggle="toggle">
									</label>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- sisi kanan -->
			<div class="col-md-8" style="padding: 35px;">
				<legend> Grafik Penggunaan Air</legend>
				<br><br>
				<div class="row">
					<canvas id="myChart" width="400" height="200"></canvas>
				</div>
				<br>
				<legend>Log Aktifitas</legend>
				<div class="row">

					<table id="aktivitastable"class="table table-bordered table-hover datatable">
						
		                
						<thead>
							<tr>
								<th>Tanggal</th>
								<th>Waktu</th>
								<th>Aktifitas</th>
							</tr>
						</thead>
						<tbody id="tbody">

						</tbody>
					</table>


				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(function() {
			$('#pompaCheckbox').change(function() {
				// console.log('Toggle: ' + $(this).prop('checked'))
				updateCheckbox('<?= $ambilSensorPompaAir['idsensor'] ?>', $(this).prop('checked'))
			})
		})
		$(function() {
			$('#kurasCheckbox').change(function() {
				// console.log('Toggle: ' + $(this).prop('checked'))
				updateCheckbox('<?= $ambilSensorKurasTandon['idsensor'] ?>', $(this).prop('checked'))
			})
		})

		function updateCheckbox(id, stt) { // function
			$.ajax({
				// data : isi untuk mengirim data ke url
				data: {
					'idsensor': id,
					'status_sensor': stt
				},
				// type GET / POST
				type: 'GET',
				// url tujuan pengiriman data
				url: 'fungsi/saklar_pompa.php',
				success: function(successResult) { // jika status sukses
					console.log(successResult) // menampilkan ke console isi urlphpnya.php
					//olah data sukses disini
					Swal.fire({
					  position: 'top-end',
					  icon: 'success',
					  title: 'Berhasil',
					  showConfirmButton: false,
					  timer: 1500
					})
				},
				error: function(errorResult) { // jika status error
					console.log(errorResult) // menampilkan ke console isi urlphpnya.php
					//olah data error disini
					Swal.fire({
					  position: 'top-end',
					  icon: 'warning',
					  title: 'Gagal',
					  showConfirmButton: false,
					  timer: 1500
					})
				}
			})
		}
	</script>

	<script>
		var ctx = document.getElementById('myChart');
	</script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
	<script src="js/sweet.js"></script>

	<script type="text/javascript">


		var filter = $("#filter").val();
		function sel() {
			air()
			filter = $("#filter").val();
			ajax_table()
		}
		//statistik dgn filter
		air()

		
		 // $(document).ready(function(){
		 function ajax_table(){

		 	$('#aktivitastable').DataTable().ajax.reload();
		 }


			$('#aktivitastable').DataTable(
					{
						'processing': true,
		                'serverSide': true,
		                'serverMethod': 'post',
		                //'searching': false, // Remove default Search Control
		                'ajax': {
		                    'url':'fungsi/ajaxfile.php',
		                    'data': function(data){
		                        // // Read values
		                        // var aktivitas = $('#searchByAktifitas').val();
		                        // var tgl = $('#searchByTgl').val();

		                        // // Append to data
		                        // data.searchByAktifitas = aktivitas;
		                        // data.searchByTgl = tgl;
		                        data.filter = filter
		                    }
		                },
		                'columns': [
		                    { data: 'tgl' },
		                    { data: 'waktu' },
		                    { data: 'aktivitas' },
		                ]
						}
				);
		 // });
			


		function air() {
			var filter = $("#filter").val();

			$.ajax({
				url: 'backend/statistik_dinamis.php',
				type: 'post',
				data: {
					filter
				},
				dataType: 'json',
				success: function(data) {
					console.log(data)
					jml_air = data.jml_air[0].jml
					// console.log(jml_air)
					$("#jml_air").html(data.jml_air[0].jml)
					$("#jml_kuras").html(data.jml_kuras[0].jml)

					// //table
					// var html = '';
					// var no = 1;
					// for (var row of data.table) {
					// 	html += `<tr>
					// 				<td>${no}</td>
					// 				<td>${row.tgl}</td>
					// 				<td>${row.waktu}</td>
					// 				<td>${row.aktivitas}</td>
					// 			</tr>`;
					// 	no++;
					// }
					// $("#tbody").html(html)

					//chart
					var myChart = new Chart(ctx, {
						type: 'line',
						data: {
							labels: data.chart[0].label,
							datasets: [{
								label: 'Volume Air satuan liter',
								data: data.chart[0].data
							}]
						},
						options: {
							scales: {
								yAxes: [{
									ticks: {
										beginAtZero: true
									}
								}]
							}
						}
					});
				},
				error: function(err) {
					console.log('error' + err)
				}
			})
		}

		//statistik hari ini
		statistikHariIni()

		function statistikHariIni() {
			$.ajax({
				url: 'backend/statistik_hari_ini.php',
				type: 'post',
				data: {},
				dataType: 'json',
				success: function(data) {
					console.log(data)
					for (var row of data) {
						if (row.idsensor == 5) {
							$("#ph").html(row.nilai_sensor);
							$("#ph_status").html(row.status_air);
						}

						if (row.idsensor == 6) {
							$("#turbidity").html(row.nilai_sensor);
							$("#turbidity_status").html(row.status_air);
						}

						if (row.idsensor == 8) {
							$("#tds").html(row.nilai_sensor);
							$("#tds_status").html(row.status_air);
						}

						if (row.idsensor == 9) {
							$("#volume").html(row.nilai_sensor);
							$("#volume_status").html(row.status_air);
						}
					}

				},
				error: function(err) {
					console.log('error ' + err)
				}
			})
		}
	</script>
</body>

</html>