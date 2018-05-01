<?php
include "config.php";

   $depan = $_POST['depan'];
    $belakang = $_POST['belakang'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $nama = "$depan $belakang";
    $id = 6;

$query = mysqli_query($koneksi,"INSERT INTO pelanggan VALUES ('1','$nis','$nama','$kelas')");   

if($query){
    echo "DATA PELANGGAN MASUK";
}else{
    echo "DATA PELANGGAN ERROR";
}


?>