<!--koding mengurutkan id user secara otomatis & menyesuaikan dari database-->

<?php 

	$sql = $koneksi->query("select id_user from tuser order by id_user desc");

	$data = $sql->fetch_assoc();

	$id_user = $data['id_user'];

	$urut = substr($id_user, 0, 1);

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
              <h3 class="box-title">Tambah Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Id User</label>
                  <input type="text" class="form-control" value="<?php echo "$format"; ?>" name="id">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" name="nama">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" class="form-control" name="email">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">No HP</label>
                  <input type="text" class="form-control" name="no_hp">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" class="form-control" name="username">
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>  

                <div class="form-group">
                  <label for="exampleInputPassword1">Hak Akses</label>
                  <input type="text" class="form-control" name="hak_akses">
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

<!--koding tambah lalu simpan data user-->


          <?php
          
          if (isset($_POST['simpan'])) {

            $id_user = $_POST['id'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $no_hp = $_POST['no_hp'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hak_akses = $_POST['hak_akses'];

            $gambar = $_FILES['gambar']['name'];
          	$lokasi = $_FILES['gambar']['tmp_name'];

          		$upload = move_uploaded_file($lokasi, "images/".$gambar);

            if ($upload){

            $sql=$koneksi->query("insert into tuser (id_user, nama, email, no_hp, username, password, hak_akses, gambar) values ('$id_user', '$nama', '$email', '$no_hp', '$username', '$password', '$hak_akses', '$gambar')");

            if  ($sql){

                ?>

                <script type="text/javascript">
          		alert ("Data Berhasil Disimpan");
          		window.location.href="?page=data_user";
          		</script>

                <?php
            }

          }
}
          
          ?>