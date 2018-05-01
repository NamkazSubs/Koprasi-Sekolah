<?php 
include "config.php";

$nama = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$kirim = mysqli_query($koneksi,"INSERT INTO barang(nama_barang,stok,harga) VALUES('$nama','$stok','$harga')");

header("location:../tambah-barang.php?pesan=1&isi=Barang Sudah Di Tambahkan");


?>