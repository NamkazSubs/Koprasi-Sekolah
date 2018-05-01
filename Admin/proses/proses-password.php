<?php 
include "config.php";

$username = $_POST['username'];
$lama = $_POST['pass_lama'];
$baru = $_POST['pass_baru'];
$konfirmasi = $_POST['konfirmasi'];

$asek = mysqli_query($koneksi,"SELECT*FROM admin WHERE username = '$username'");
$data = mysqli_fetch_array($asek);

if($data['password'] == $lama){
    if($baru == $konfirmasi){
    $kirim = mysqli_query($koneksi,"UPDATE admin SET password = '$baru' WHERE username = '$username' ");
        header("location:../ganti-password.php?pesan=1&isi=Password Berhasil Di Ganti");
    }else{
        header("location:../ganti-password.php?pesan=2&isi=Konfirmasi Password Baru Salah Silahkan Masukan Dengan Benar");
    }
}else{
    header("location:../ganti-password.php?pesan=3&isi=Maaf Password Lama Anda Salah Silahkan Masukan Dengan Benar");
}




?>