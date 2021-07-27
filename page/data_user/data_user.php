 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <a href="?page=data_user&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px;" title="">Tambah</a>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id User</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Hak Akses</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>


                	<?php 

                		$no = 1;

                		$sql = $koneksi->query("select * from tuser");
                		while ($data = $sql->fetch_assoc()) {
                			
                	 ?>

                <tr>
                  <td><?php echo $no ++; ?></td>
                  <td><?php echo $data['id_user'] ?></td>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['email'] ?></td>
                  <td><?php echo $data['no_hp'] ?></td>
                  <td><?php echo $data['username'] ?></td>
                  <td><?php echo $data['password'] ?></td>
                  <td><?php echo $data['hak_akses'] ?></td>
                  <td><img src="images/<?php echo $data['gambar'] ?>" widht="60" height="60" alt=""></td>

                  <td>
                    
                    <a href="?page=data_user&aksi=ubah&id=<?php echo $data ['id_user']; ?>" class="btn btn-success" title=""><i class="fa fa-edit"> </i>Ubah</a>
                    <a onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini')" href="?page=data_user&aksi=hapus&id=<?php echo $data ['id_user'] ?>" class="btn btn-danger" title=""><i class="fa fa-trash"> </i>Hapus</a>

                  </td>

                </tr>
               
              <?php }  ?>

            </tbody>

        </table>

    </div>
</div>


