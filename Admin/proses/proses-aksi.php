<?php
include "config.php";
$kode = $_POST['id'];
$nama = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$kirim1 = mysqli_query($koneksi,"UPDATE barang SET nama_barang = '$nama' WHERE id_barang = '$kode' ");
$kirim2 = mysqli_query($koneksi,"UPDATE barang SET stok  = '$stok' WHERE id_barang = '$kode' ");
$kirim3 = mysqli_query($koneksi,"UPDATE barang SET harga   = '$harga' WHERE id_barang = '$kode' ");

header("location:../list-barang.php");
?>