<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Lapangan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <a href="?page=data_lapangan&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px;" title="">Tambah</a>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id Lapangan</th>
                  <th>Nama Lapangan</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>


                	<?php 

                		$no = 1;

                		$sql = $koneksi->query("select * from tlapangan");
                		while ($data = $sql->fetch_assoc()) {
                			
                	 ?>

                <tr>
                  <td><?php echo $no ++; ?></td>
                  <td><?php echo $data['id_lapangan'] ?></td>
                  <td><?php echo $data['nama_lapangan'] ?></td>
                  <td><?php echo $data['harga'] ?></td>


                  <td>
                    
                    <a href="?page=data_lapangan&aksi=ubah&id=<?php echo $data ['id_lapangan']; ?>" class="btn btn-success" title=""><i class="fa fa-edit"> </i>Ubah</a>
                    <a onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini')" href="?page=data_lapangan&aksi=hapus&id=<?php echo $data ['id_lapangan'] ?>" class="btn btn-danger" title=""><i class="fa fa-trash"> </i>Hapus</a>

                  </td>

                </tr>
               
              <?php }  ?>

            </tbody>

        </table>

    </div>
</div>


