<?php
include "koneksi.php";

$id_pesanan = $_GET['id'];

$delete = mysqli_query($koneksi,"DELETE FROM pesanan WHERE id_pesanan ='$id_pesanan'");
$delete1 = mysqli_query($koneksi,"DELETE FROM pesanan_detail WHERE id_pesanan ='$id_pesanan'"); 

header("location:transaksi-barang.php");

?>