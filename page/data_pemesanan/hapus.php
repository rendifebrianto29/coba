<!--koding hapus data pemesanan-->

<?php

    $id_pemesanan = $_GET ['id'];

    $sql=$koneksi->query("delete from tpemesanan where id_pemesanan = '$id_pemesanan'");

    if($sql) {

    ?>
        <script type="text/javascript">
		
		alert ("Data Berhasil Dihapus");
		window.location.href="?page=data_pemesanan";

	</script>
    <?php

    }

?>