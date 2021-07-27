<!--koding menampilkan data lapangan dari Database db_gofutsal ke setiap form -->

<?php

        $id_lapangan = $_GET['id'];
        
        $sql = $koneksi->query("select * from tlapangan where id_lapangan = '$id_lapangan' ");

        $data =  $sql->fetch_assoc();

?>


<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Lapangan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Id Lapangan</label>
                  <input type="text" class="form-control" value="<?php echo $data ['id_lapangan']; ?>" readonly name="id">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Lapangan</label>
                  <input type="text" class="form-control" value="<?php echo $data ['nama_lapangan']; ?>" name="nama_lapangan">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Harga</label>
                  <input type="text" class="form-control" value="<?php echo $data ['harga']; ?>" name="harga">
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="tsubmit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>

<!--koding edit data lapangan-->

          <?php
          
          if (isset($_POST['simpan'])) {

            $nama_lapangan = $_POST['nama_lapangan'];
            $harga = $_POST['harga'];

            $sql=$koneksi->query("update tlapangan set nama_lapangan = '$nama_lapangan', harga = '$harga' where id_lapangan = '$id_lapangan'");

            if  ($sql){

                ?>

                <script type="text/javascript">
          		alert ("Data Berhasil Diubah");
          		window.location.href="?page=data_lapangan";
          		</script>

                <?php
            }

          }
          
          ?>