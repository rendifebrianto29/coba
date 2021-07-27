<?php

include "include/koneksi.php";
$sql = $koneksi->query("SELECT COUNT(id_user) AS total FROM tuser");
$data = $sql->fetch_assoc();

$sql1 = $koneksi->query("SELECT COUNT(id_lapangan) AS total FROM tlapangan");
$data1 = $sql1->fetch_assoc();

$sql2 = $koneksi->query("SELECT COUNT(id_pemesanan) AS total FROM tpemesanan");
$data2 = $sql2->fetch_assoc();


?>

<?php




?>

<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $data["total"];
              ?></h3>

              <p>Data User</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="index.php?page=data_user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $data1["total"]; ?></h3>

              <p>Data Lapangan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="index.php?page=data_lapangan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $data2["total"]; ?></h3>

              <p>Data Pemesanan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="index.php?page=data_pemesanan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       