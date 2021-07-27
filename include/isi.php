<?php


	$page = $_GET['page'];
	$aksi = $_GET['aksi'];

		if ($page == "data_user") {
			if ($aksi == "") {
				include "page/data_user/data_user.php";
			}

			if ($aksi == "tambah") {
				include "page/data_user/tambah.php";
			}

			if ($aksi == "ubah") {
				include "page/data_user/ubah.php";
			}

			if ($aksi == "hapus") {
				include "page/data_user/hapus.php";
			}

		}

		if ($page == "data_lapangan") {
			if ($aksi == "") {
				include "page/data_lapangan/data_lapangan.php";
			}

			if ($aksi == "tambah") {
				include "page/data_lapangan/tambah.php";
			}

			if ($aksi == "ubah") {
				include "page/data_lapangan/ubah.php";
			}

			if ($aksi == "hapus") {
				include "page/data_lapangan/hapus.php";
			}

		}

		if ($page == "data_pemesanan") {
			if ($aksi == "") {
				include "page/data_pemesanan/data_pemesanan.php";
			}

			if ($aksi == "tambah") {
				include "page/data_pemesanan/tambah.php";
			}

			if ($aksi == "ubah") {
				include "page/data_pemesanan/ubah.php";
			}

			if ($aksi == "hapus") {
				include "page/data_pemesanan/hapus.php";
			}

		}
		
		if ($page == "") {
			include "home.php";
		}

?>

