<!--koding mengurutkan id pemesanan secara otomatis & menyesuaikan dari database-->

<?php 

	$sql = $koneksi->query("select id_pemesanan from tpemesanan order by id_pemesanan desc");

	$data = $sql->fetch_assoc();

	$id_pemesanan = $data['id_pemesanan'];

	$urut = substr($id_pemesanan,  0,1);

	$tambah = (int) $urut+1;

	if (strlen($tambah) ==1 ){
    $format =""."".$tambah;
  }elseif (strlen($tambah) ==2) {
		$format =""."".$tambah;
	}elseif (strlen($tambah) ==3 ){
		$format =""."".$tambah;
	}else {
		$format ="".$tambah;
}

  ?>

<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Pemesanan</h3>
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

                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <input type="text" class="form-control" name="status">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Gambar</label>
                  <input type="file" name="gambar">
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="tsubmit" name="simpan" class="btn btn-primary">Simpan</button>
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
            $status = $_POST['status'];
            
            $gambar = $_FILES['gambar']['name'];
            $lokasi = $_FILES['gambar']['tmp_name'];

            $upload = move_uploaded_file($lokasi, "images/".$gambar);

            if ($upload){

            $sql=$koneksi->query("insert into tpemesanan (id_pemesanan, id_user, id_lapangan, tanggal, jam, harga, status, gambar) values ('$id_pemesanan', '$id_user', '$id_lapangan', '$tanggal', '$jam', '$harga', '$status', '$gambar')");

            if  ($sql){

                ?>

                <script type="text/javascript">
          		alert ("Data Berhasil Disimpan");
          		window.location.href="?page=data_pemesanan";
          		</script>

                <?php
            }

          }
        }
          
          ?>