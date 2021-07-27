<!--koding mengurutkan id sewa secara otomatis & menyesuaikan dari database-->

<?php 

	$sql = $koneksi->query("select id_lapangan from tlapangan order by id_lapangan desc");

	$data = $sql->fetch_assoc();

	$id_lapangan = $data['id_lapangan'];

	$urut = substr($id_lapangan, 0,1);

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
              <h3 class="box-title">Tambah Data Lapangan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Id Lapangan</label>
                  <input type="text" class="form-control" value="<?php echo "$format"; ?>" name="id">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Lapangan</label>
                  <input type="text" class="form-control" name="nama_lapangan">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Harga</label>
                  <input type="text" class="form-control" name="harga">
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="tsubmit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>

<!--koding tambah lalu simpan data lapangan A-->


          <?php
          
          if (isset($_POST['simpan'])) {

            $id_lapangan = $_POST['id'];
            $nama_lapangan = $_POST['nama_lapangan'];
            $harga = $_POST['harga'];

            $sql=$koneksi->query("insert into tlapangan (id_lapangan, nama_lapangan, harga) values ('$id_lapangan', '$nama_lapangan', '$harga')");

            if  ($sql){

                ?>

                <script type="text/javascript">
          		alert ("Data Berhasil Disimpan");
          		window.location.href="?page=data_lapangan";
          		</script>

                <?php
            }

          }
          
          ?>