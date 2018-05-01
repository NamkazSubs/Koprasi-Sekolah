<?php

include "koneksi.php";

$id = $_GET['kode'];

//perintah delete
$delete = "DELETE FROM barang WHERE id_barang ='$id'";
$query = mysqli_query($koneksi,$delete);

if ($query) {
		header("location: list-barang.php");
	}
	else{
		echo "Gagal";
	}
?>