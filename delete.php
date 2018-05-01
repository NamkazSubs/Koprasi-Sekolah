<?php

session_start();

$id = $_GET['id'];
$keranjang = $_SESSION['karanjang'];


unset($keranjang[$id]);

$_SESSION['karanjang'] = $keranjang;

header("location:index.php");
?>