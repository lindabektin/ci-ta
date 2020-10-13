<?php  
  if (session_id()=="") {
    session_start();
  }
  //ini digunakan untuk validasi jika tidak ada sessi login dan loginnya bukan sebagai admin maka diredirect ke halaman login 
  if (!isset($_SESSION['username']) OR $_SESSION['username']=="" OR $_SESSION['level_user']!="1") {
    header("location:login.php?pesan=gagal");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="js/jquery.min.js"></script>
  <meta charset="utf-8">

  <!-- Icon -->
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

  <!-- end Icon -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&display=swap" rel="stylesheet" />

  <title>Data Pengguna</title>

  <link rel="stylesheet" type="text/css" href="datatable/datatables.min.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="js/bootstrap.min.js"></script>

  <style type="text/css">
    body{
      margin-top: 60px;
      font-family: 'Montserrat', sans-serif;

    }

    .navbar{
          box-shadow: 0px 8px 8px -6px rgba(0,0,0,.5);
      }

    .navbar-btn{
      border-radius: 20px;
      background-color: #64CFF0;
    }

    .navbar-brand{
      font-family: 'Pacifico', cursive;
      letter-spacing: 3px;
      
    }

    .btn-danger {
      color: #fff;
      background-color: #d9534f;
      border-color: #d43f3a;
      margin-left: 10px;
    }
  </style>
</head>

<body>
  <script src="js/bootstrap.min.js"></script>
<!-- Navbar -->
  <nav class="navbar navbar-default navbar-fixed-top" style="border: none;">
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
          <li><a href="home.php">
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span> 
            Home</a></li>
          
          <li class="active" ><a href="pengguna.php">
            <span class="glyphicon glyphicon-user" aria-hidden="true" ></span> 
            Pengguna<span class="sr-only">(current)</span></a></li>
           
            <a type="button" href="fungsi/logout.php" class="btn navbar-btn btn-sm" style="margin-left: 10px; margin-top: 13px">
              <span class="glyphicon glyphicon-log-out" aria-hidden="true"style="color: white;"></span>
                <strong style="color: white;">Keluar</strong></a>
        </ul>
      </div> <!-- navbar-collapse -->
    </div> <!-- container-fluid -->
  </nav>
<!-- End Navbar -->


  <div class="container" style="padding-top: 70px;">
   <div class="row">
    <!-- FORM  -->	    
    <div class="col-md-12">

      <fieldset>
        <!-- Form Name -->
        <center><legend><b>Pengguna Tandon Air Pintar</b></legend></center>
        
        <?php  
          include 'fungsi/koneksi.php';
          $perintah = 'tambah';
          $iduser   = '';
          $nama = '';
          $username = '';
          $password = '';
          $level_user = '';
          if (isset($_GET['perintah']) && $_GET['perintah']=='edit') {
            $perintah = 'edit';
            $iduser = $_GET['id'];

            $result = mysqli_query($koneksi, "SELECT * FROM user WHERE iduser=".(int)$iduser);

            while($user_data = mysqli_fetch_array($result)){
              $nama = $user_data['nama'];
              $username = $user_data['username'];
              $password = $user_data['password'];
              $level_user = $user_data['level_user'];
            }
          }
        ?>

        <form method="post" action="fungsi/simpan_pengguna.php" class="form-horizontal" id="form-edit-pengguna">
          <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="nama">Nama</label>  
              <div class="col-md-4">
                <input value="<?php echo $nama; ?>" id="nama" name="nama" type="text" placeholder="Nama" class="form-control input-md">
                <input id="iduser" name="iduser" type="hidden" value="<?php echo $iduser; ?>">
                <input id="perintah" name="perintah" type="hidden" value="<?php echo $perintah; ?>">
              </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="username">Username</label>  
                <div class="col-md-4">
                  <input value="<?php echo $username; ?>" id="username" name="username" type="text" placeholder="Username" class="form-control input-md">
                </div>
              </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="password">Password</label>  
              <div class="col-md-4">
                <input value="<?php echo $password; ?>" id="password" name="password" type="text" placeholder="Password" class="form-control input-md">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label" for="level_user">Level User</label>  
              <div class="col-md-4">
                <select class="form-control" id="level_user" name="level_user">
                  <option <?php echo $level_user=='' ? 'selected="selected"' : ''; ?> value="">== Silahkan Pilih ==</option>
                  <option <?php echo $level_user=='1' ? 'selected="selected"' : ''; ?> value="1">Admin</option>
                  <option <?php echo $level_user=='2' ? 'selected="selected"' : ''; ?> value="2">User</option>
                </select>
              </div>
            </div>
        <!-- Button -->   
            <div class="form-group">
                <label class="col-md-4 control-label" for="btn-save"></label>
                <div class="col-md-4">
                  <button type="submit" name="btn-save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan Data</button>
                </div>
            </div>
        </form>
      </fieldset>
  </div> 




  <!-- LIST -->
  <div class=col-md-12>

      <legend>Data Pengguna</legend>
        <table class="table table-bordered table-hover datatable">
          <thead>
            <tr>
              <th width="50">No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Password</th>
              <th>Level User</th>
              <th width="200">Actions</th>
            </tr>
          </thead>
          <tbody id="tbody">
            <?php 
            $no = 1;
            $data = mysqli_query($koneksi,"select * from user");
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                  <th><?php echo $d['nama']; ?></th>
                  <th><?php echo $d['username']; ?></th>
                  <th><?php echo $d['password']; ?></th>
                  <th><?php echo $d['level_user']==1 ? 'Admin' : 'User'; ?></th>
                <td>
                  <center>
                  <a class="btn btn-success btn-sm" href="?id=<?php echo $d['iduser']; ?>&perintah=edit" ><i class="glyphicon glyphicon-pencil"></i> EDIT</a>
                  <a class="btn btn-danger btn-sm" onclick="hapuspengguna(<?php echo $d['iduser']; ?>)"><i class="glyphicon glyphicon-trash"></i> HAPUS</a>
                 </center>
                </td>
              </tr>
              <?php 
                }
              ?>
          </tbody>
        </table>     
  </div>

</div>
</div>

<script type="text/javascript">
  function hapuspengguna(id) {
    var konfirmasi = confirm("Apakah anda yakin akan menghapus data ini?");
    if (konfirmasi){
       window.location.href = 'fungsi/hapus_pengguna.php?id='+id;
    }
  }
</script>
</body>
</html>
