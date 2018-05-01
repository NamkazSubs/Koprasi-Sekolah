<?php 
session_start();

include_once ("config.php");

$id = $_POST['id'];
$jumlah = $_POST['jumlah'];

$karanjang = isset($_SESSION['karanjang']) ? $_SESSION['karanjang'] : false;

$show = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang = '$id'");

$isi = mysqli_fetch_assoc($show);

$karanjang[$id] = ["nama_barang" => $isi["nama_barang"],
					"stok" => $isi["stok"],
					"harga" => $isi["harga"],
                    "jumlah" => $jumlah,
					"jmlbel" => $jumlah];

$_SESSION['karanjang'] = $karanjang;

header("location:index.php");

?>