<!--koding hapus data user-->

<?php

    $id_user = $_GET ['id'];

    $sql=$koneksi->query("delete from tuser where id_user = '$id_user'");

    if($sql) {

    ?>
        <script type="text/javascript">
		
		alert ("Data Berhasil Dihapus");
		window.location.href="?page=data_user";

	</script>
    <?php

    }

?>