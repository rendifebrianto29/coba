<!--koding menampilkan data pemesanan dari Database db_gofutsal ke setiap form -->

<?php

        $id_pemesanan = $_GET['id'];
        
        $sql = $koneksi->query("select * from tpemesanan where id_pemesanan = '$id_pemesanan' ");

        $data =  $sql->fetch_assoc();

?>


<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Id Pemesanan</label>
                  <input type="text" class="form-control" value="<?php echo $data ['id_pemesanan']; ?>" readonly name="id">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Id User</label>
                  <input type="text" class="form-control" value="<?php echo $data ['id_user']; ?>" name="id_user">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Id Lapangan</label>
                  <input type="text" class="form-control" value="<?php echo $data ['id_lapangan']; ?>" name="id_lapangan">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal</label>
                  <input type="date" class="form-control" value="<?php echo $data ['tanggal']; ?>" name="tanggal">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Jam</label>
                  <input type="text" class="form-control" value="<?php echo $data ['jam']; ?>" name="jam">
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Harga</label>
                  <input type="text" class="form-control" value="<?php echo $data ['harga']; ?>" name="harga">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <input type="text" class="form-control" value="<?php echo $data ['status']; ?>" name="status">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Gambar</label>
                  <label><img src="images/<?php echo $data['gambar'] ?>" widht="100" height="100" alt=""></label>
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Ganti Gambar</label>
                  <input type="file" name="gambar">
                </div>  

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="tsubmit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>

<!--koding edit data pemesanan-->

          <?php
          
          if (isset($_POST['simpan'])) {

            $id_user = $_POST['id_user'];
            $id_lapangan = $_POST['id_lapangan'];
            $tanggal = $_POST['tanggal'];
            $jam = $_POST['jam'];
            $harga = $_POST['harga'];
            $status = $_POST['status'];
           
            $gambar = $_FILES['gambar']['name'];
            $lokasi = $_FILES['gambar']['tmp_name'];

            if (!empty($lokasi)) {
         	
              move_uploaded_file($lokasi, "images/".$gambar);

            $sql=$koneksi->query("update tpemesanan set id_user = '$id_user', id_lapangan = '$id_lapangan', tanggal = '$tanggal', jam = '$jam', harga = '$harga', status = '$status', gambar = '$gambar' where id_pemesanan = '$id_pemesanan'");

            if  ($sql){

                ?>

                <script type="text/javascript">
          		alert ("Data Berhasil Diubah");
          		window.location.href="?page=data_pemesanan";
          		</script>

                <?php
            }

          }else{
            $sql=$koneksi->query("update tpemesanan set id_user = '$id_user', id_lapangan = '$id_lapangan', tanggal = '$tanggal', jam = '$jam', harga = '$harga', status = '$status' where id_pemesanan = '$id_pemesanan'");

            if  ($sql){

                ?>

                <script type="text/javascript">
          		alert ("Data Berhasil Diubah");
          		window.location.href="?page=data_pemesanan";
          		</script>

                <?php
            }
          }
        }   

          ?>