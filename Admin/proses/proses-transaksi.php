<?php 
include "config.php";
$id_pemesan = $_POST['id_pembelian'];
$nip = $_POST['nip'];
$total = $_POST['total'];

$kirim = mysqli_query($koneksi,"INSERT INTO history(nip,id_pesanan,total) VALUES('$nip','$id_pemesan','$total')");
$kirim1 = mysqli_query($koneksi,"UPDATE pesanan SET status = 'Lunas' WHERE id_pesanan = '$id_pemesan' ");

$asek = mysqli_query($koneksi,"SELECT * FROM pesanan_detail WHERE id_pesanan = '$id_pemesan' ");
while($tampil = mysqli_fetch_assoc($asek)){
    $id_barang = $tampil['id_barang'];
    $jumlah = $tampil['jumlah'];
    
    mysqli_query($koneksi,"UPDATE barang SET stok=stok-$jumlah WHERE id_barang = '$id_barang' ");
}

header("location:../transaksi-barang.php");
?>