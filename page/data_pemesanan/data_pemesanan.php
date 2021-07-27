<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <a href="?page=data_pemesanan&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px;" title="">Tambah</a>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id Pemesanan</th>
                  <th>Id User</th>
                  <th>Id Lapangan</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Gambar</th>
                </tr>
                </thead>
                <tbody>


                	<?php 

                		$no = 1;

                		$sql = $koneksi->query("select * from tpemesanan");
                		while ($data = $sql->fetch_assoc()) {
                			
                	 ?>

                <tr>
                  <td><?php echo $no ++; ?></td>
                  <td><?php echo $data['id_pemesanan'] ?></td>
                  <td><?php echo $data['id_user'] ?></td>
                  <td><?php echo $data['id_lapangan'] ?></td>
                  <td><?php echo $data['tanggal'] ?></td>
                  <td><?php echo $data['jam'] ?></td>
                  <td><?php echo $data['harga'] ?></td>
                  <td><?php echo $data['status'] ?></td>
                  <td><img src="images/<?php echo $data['gambar'] ?>" widht="60" height="60" alt=""></td>

                  <td>
                    
                    <a href="?page=data_pemesanan&aksi=ubah&id=<?php echo $data ['id_pemesanan']; ?>" class="btn btn-success" title=""><i class="fa fa-edit"> </i>Ubah</a>
                    <a onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini')" href="?page=data_pemesanan&aksi=hapus&id=<?php echo $data ['id_pemesanan'] ?>" class="btn btn-danger" title=""><i class="fa fa-trash"> </i>Hapus</a>

                  </td>

                </tr>
               
              <?php }  ?>

            </tbody>

        </table>

    </div>
</div>


