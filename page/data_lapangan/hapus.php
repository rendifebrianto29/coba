<!--koding hapus data lapangan-->

<?php

    $id_lapangan = $_GET ['id'];

    $sql=$koneksi->query("delete from tlapangan where id_lapangan = '$id_lapangan'");

    if($sql) {

    ?>
        <script type="text/javascript">
		
		alert ("Data Berhasil Dihapus");
		window.location.href="?page=data_lapangan";

	</script>
    <?php

    }

?>