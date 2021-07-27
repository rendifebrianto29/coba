<?php 


  include "include/koneksi.php";
  
    session_start();

  if ($_SESSION['admin'] || $_SESSION['pelanggan'])  {

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GOFutsal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class=""><b>GO</b>Futsal</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      

      <?php if ($_SESSION['pelanggan']) {
        $user = $_SESSION['pelanggan'];

      }

      

      $sql_user = $koneksi->query("select * from tuser where id_user='$user'");
      $data_user = $sql_user->fetch_assoc();

      $nama = $data_user['nama'];
      $level = $data_user['hak_akses']; 
      $id_user = $data_user['id_user']; 

      ?>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="images/<?php echo $data_user['gambar'] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Hai, <?php echo $nama; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/<?php echo $data_user['gambar'] ?>" class="img-circle" alt="User Image">

                <p>
                 Anda Login Sebagai <?php echo $data_user['hak_akses'] ?>
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  
  <div class="center">
        <!-- left column -->
        <div class="col-md-6 col-md-offset-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">PESAN LAPANGAN</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Id Pemesanan</label>
                  <input type="text" class="form-control" value="<?php echo "$format"; ?>" name="id_pemesanan">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Id User</label>
                  <input type="text" class="form-control" name="id_user">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Id Lapangan</label>
                  <input type="text" class="form-control" name="id_lapangan">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal</label>
                  <input type="date" class="form-control" name="tanggal">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Jam</label>
                  <input type="text" class="form-control" name="jam">
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Harga</label>
                  <input type="text" class="form-control" name="harga">
                </div>

                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="tsubmit" name="simpan" class="btn btn-primary">Pesan</button>
              </div>
            </form>
          </div>

<!--koding tambah lalu simpan data pemesanan-->


          <?php
          
          if (isset($_POST['simpan'])) {

            $id_pemesanan = $_POST['id_pemesanan'];
            $id_user = $_POST['id_user'];
            $id_lapangan = $_POST['id_lapangan'];
            $tanggal = $_POST['tanggal'];
            $jam = $_POST['jam'];
            $harga = $_POST['harga'];


            $sql=$koneksi->query("insert into tpemesanan (id_pemesanan, id_user, id_lapangan, tanggal, jam, harga) values ('$id_pemesanan', '$id_user', '$id_lapangan', '$tanggal', '$jam', '$harga')");

            if  ($sql){

                ?>

                <script type="text/javascript">
          		alert ("Data Berhasil Disimpan");
          		window.location.href="?index2&aksi=sewa";
          		</script>

                <?php
            }

          }
        
          
          ?>
           
     
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
 

<?php include "include/menu2.php";?>


    <!-- Main content -->
   
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php include "include/isi2.php"; ?>
    </section>
  </div>
  <!-- /.content-wrapper -->

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>

<?php }else{

    header("location:login.php");
}
 ?>

