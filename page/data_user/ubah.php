<!--koding menampilkan data user dari Database db_gofutsal ke setiap form -->

<?php

        $id_user = $_GET['id'];
        
        $sql = $koneksi->query("select * from tuser where id_user = '$id_user' ");

        $data =  $sql->fetch_assoc();

?>


<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Id User</label>
                  <input type="text" class="form-control" value="<?php echo $data ['id_user'];  ?>" readonly name="id">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" value="<?php echo $data ['nama'];  ?>" name="nama">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" class="form-control" value="<?php echo $data ['email'];  ?>" name="email">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">No HP</label>
                  <input type="text" class="form-control" value="<?php echo $data ['no_hp'];  ?>" name="no_hp">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" class="form-control" value="<?php echo $data ['username'];  ?>" name="username">
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" value="<?php echo $data ['password'];  ?>" name="password">
                </div>  
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Hak Akses</label>
                  <input type="text" class="form-control" value="<?php echo $data ['hak_akses'];  ?>" name="hak_akses">
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

<!--koding edit data user-->

          <?php
          
          if (isset($_POST['simpan'])) {

            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $no_hp = $_POST['no_hp'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hak_akses = $_POST['hak_akses'];
           
            $gambar = $_FILES['gambar']['name'];
            $lokasi = $_FILES['gambar']['tmp_name'];

            if (!empty($lokasi)) {
         	
              move_uploaded_file($lokasi, "images/".$gambar);

            $sql=$koneksi->query("update tuser set nama = '$nama', email = '$email', no_hp = '$no_hp', username = '$username', password = '$password', hak_akses = '$hak_akses', gambar = '$gambar' where id_user = '$id_user'");

            if  ($sql){

                ?>

                <script type="text/javascript">
          		alert ("Data Berhasil Diubah");
          		window.location.href="?page=data_user";
          		</script>

                <?php
            }

          }else{

            $sql=$koneksi->query("update tuser set nama = '$nama', email = '$email', no_hp = '$no_hp', username = '$username', password = '$password', hak_akses = '$hak_akses' where id_user = '$id_user'");
          
            if ($sql) {
          			
              ?>

              <script type="text/javascript">
                alert ("Data Berhasil Diubah");
                window.location.href="?page=data_user";
              </script>

              <?php

            }

          }
        }          
          ?>