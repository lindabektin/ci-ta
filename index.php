<!DOCTYPE html>
<html>
<head>
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
	<meta name="application-name" content="&nbsp;"/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="mstile-310x310.png" />


	<title>Tandon Airku</title>

	<script src="js/jquery.min.js"></script>

	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&display=swap" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<style type="text/css">

		body{
			font-family: 'Montserrat', sans-serif;
	
			background-image: url(ico/bg.svg) ;
			background-position: center;
		  	background-repeat: no-repeat;
		  	background-size: cover;
			background-color: #C9F5FF;

		}
	
		.navbar{
			    box-shadow: 0px 8px 8px -6px rgba(0,0,0,.5);
			}

		/*Kualitas Terkini*/
		.kualitas{
			color:#33A5C9;
			margin-top: 15px;
			/*text-align: center;*/
			font-size: 18px;
			margin-bottom: 8px;
		}

		.tanggal{
			color:#084052;
			margin-top: 4px;
			/*text-align: center;*/
			font-size: 30px;
		}


		.container-lima{

			width: 350px;
			height: 30px;
			margin: 1px auto;
			display: flex;
			background-color: #eee;

			}

		.kotak{
			width: 168px;
			height:35px;
			background-color: #DFF7FF;
			color: #084052;
			border-radius: 5px 5px 5px 5px;
			text-align: center;
			font-size: 23px;
			/*margin:auto;*/
			/*padding-top: 5px;*/
		}

		.kotak span{
			margin: auto;
		}
	/*	.container{
			padding-top: 50px;
		}*/
		.navbar-brand{
			font-family: 'Pacifico', cursive;
			letter-spacing: 3px;
			font-size: 30px;
			}

		.navbar-btn{
			border-radius: 20px;

		}
	
		.card{
				background-color: #33A5C9;
				border-radius: 10px 10px 0px 0px;
				margin: 10px;
				padding: 10px;
				height: 150px;
				color: #fff;
				/*margin-bottom: -10px;*/
			}
		.card2{
				margin-top: -100px;
				background-color: #127999;
				border-radius: 0px 0px 10px 10px;
				margin: 10px;
				padding: 10px;
				height: 50px;
				color:#fff;
			}

		.angka{
			color: #fff;
			font-size: 76px;
			font-weight: bold;
			font-family: 'Robota-NonCommercial';
		}
		.ket-atas{
			color: #fff;
		}
		.ket-atas-atas{
			margin-top: 10px;
			color: #fff;
		}
	</style>
</head>

<body>
	<?php  
           include 'fungsi/koneksi.php';
     ?>

	<!-- Navbar -->
	<nav class="navbar" style="border: none;">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	    	<a type="button" href="login.php" class="btn navbar-btn btn-sm navbar-toggle collapsed" style="background-color: #64CFF0;">
	      	<strong style="color: white;">Login</strong></a>
	    	<a class="navbar-brand" href="#"> <img alt="Brand" src="ico/favicon-32x32.png" style="margin-top: -6px; margin-left: -5px;"></a>
		    <a class="navbar-brand" href="#" style="color: #64CFF0; ">Tandon Airku</a>
	    </div>
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	      	<a type="button" href="login.php" class="btn navbar-btn btn-sm" style="background-color: #64CFF0; margin-left: 10px; margin-top: 13px">
	      	<strong style="color: white;">Login</strong></a>


	      </ul>
	    </div> <!-- navbar-collapse -->
	  </div> <!-- container-fluid -->
	</nav>
	<!-- Navbar End -->

	<!-- Kualitas Terkini -->
				<!-- <div class="container">

				</div> -->

<!-- <div class="col-md-3 col-xs-6 ">
					<img src="ico/blue.png" style="width: 500px;  margin-left: 0px; ">
				</div> -->
				
				

	<!-- navigasi angka -->
	<div class="container" >
		<!--  -->

		<div class="row">

			<div class="col-md-6">
					<!-- Kualitas Terkini -->

					<div class="kualitas" >Last Update : </div>

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

					<div>
						<img src="ico/blue.png" style="width: 500px;  margin-left: 0px; padding-top: 20px;  ">
					</div>

			</div>

			<div class="row" style="padding-top: 50px;">

				<div class="col-md-3 col-xs-6 ">
					<div class="row">
						<div class="card" style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);">
							<center><font id="turbidity" class="angka"> - </font><font>NTu</font></center>
							<font class="ket-atas">Turbidity</font>
						</div>
					</div>
					<div class="row" style="margin-top:-20px;">
						<div class="card2" style="box-shadow: 0px -3px 2px rgba(0,0,0,0.4);"><center><strong id="turbidity_status"> - </strong></center></div>
					</div>
				</div>

				<div class="col-md-3 col-xs-6 ">
					<div class="row">
						<div class="card" style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);"style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);">
							<center><font id="ph" class="angka"> - </font></center>
							<font class="ket-atas">pH</font>
						</div>
					</div>
					<div class="row" style="margin-top:-20px;">
						<div class="card2" style="box-shadow: 0px -3px 2px rgba(0,0,0,0.4);"><center><strong id="ph_status"> - </strong></center></div>
					</div>
				</div>

			
				<div class="col-md-3 col-xs-6 ">
					<div class="row">
						<div class="card" style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);">
							<center><font id="tds" class="angka"> - </font><font>mg/l</font></center>
							<font class="ket-atas">TDS</font>
						</div>
					</div>
					<div class="row" style="margin-top:-20px;">
						<div class="card2" style="box-shadow: 0px -3px 2px rgba(0,0,0,0.4);"><center><strong id="tds_status"> - </strong></center></div>
					</div>
				</div>

				<div class="col-md-3 col-xs-6 ">
					<div class="row">
						<div class="card" style="box-shadow: 0px -4px 2px rgba(0,0,0,0.4);">
							<center>
								<font style="margin:top;">Level</font>
								<font id="volume" class="angka"> - </font>
							</center>
							<font class="ket-atas">Volume</font>			
						</div>
					</div>
					<div class="row" style="margin-top:-20px;">
						<div class="card2" style="box-shadow: 0px -3px 2px rgba(0,0,0,0.4);"><center><strong id="volume_status"> - </strong></center></div>
					</div> 
				</div>

			</div>
	
		</div>
		
	</div>

	<script type="text/javascript">
		statistikHariIni()
		function statistikHariIni(){
			$.ajax({
				url : 'backend/statistik_hari_ini.php',
				type : 'post',
				data : {},
				dataType : 'json',
				success : function(data){
					console.log(data)
					for(var row of data){
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
				error : function(err){
					console.log('error '+err)
				}
			})
		}
	</script>


</body>
</html>