<?php

require_once("config.php");
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submit'])) {

    $depan = $_POST['depan'];
    $belakang = $_POST['belakang'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $nama = "$depan $belakang";

    // Random String
    function generateRandomString($length = 6) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $wasu = '';  
    for ($i = 0; $i < $length; $i++) {
        $wasu .= $characters[rand(0, $charactersLength - 1)];
    }
    return $wasu;
}

$waso = generateRandomString();

    // masukkan dalam table pelanggan
    mysql_select_db($database);
    $query = mysql_query("INSERT INTO `beli` (`code`, `nis`, `nama`,'kelas') VALUES ('$waso', '$nis', '$nama', '$kelas')", $koneksi) or die(mysql_error());

            $total = 0;
            $biaya_pengiriman = 0;

            if (isset($_SESSION['karanjang'])) {
                foreach ($_SESSION['karanjang'] as $key => $value) {
                    $barang_id = $_SESSION['karanjang'][$key];

                    $jmlbel = $isinya["jmlbel"];


                    $query_barang = mysql_query("SELECT * FROM `barang` WHERE `id_barang` = '$barang_id'");
                    // ambil data dari data barang
                    $rs_barang = mysql_fetch_array($query_barang);
                    $harga = $rs_barang['harga'];

                    $jumlah_harga = $harga * $jmlbel;
                    $total += $jumlah_harga;
                    mysql_query("INSERT INTO `beli` (`barang_id`, `jumlah`, `total`, `status`) VALUES ('$barang_id', '$jmlbel', '$jumlah_harga', 'Belum Lunas')");
                }
            }

                // clear session
                foreach ($_SESSION['karanjang'] as $key => $val) {
                    unset($_SESSION['karanjang'][$key]);
                }
                unset($_SESSION['karanjang']);
}


$karanjang = isset($_SESSION['karanjang']) ? $_SESSION['karanjang'] : array(); //cek array kalo ada lanjut
$totalbeli = count($karanjang); // hitung jumlah array

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>K13 | Pembelian Sukses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <script>
    function printPage() {
        window.print('.gorong');
    }
</script>
</head>
<body>

<!-- Struk -->
  <div class="container struk">
      <div class="row">
        <div class="col-12">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-7 text-center gorong">STRUK PEMBELIAN</h1>
              <hr>
              <h6 class="font-weight-bold">No Pembelian : <?php echo $waso; ?></h6>
              <h6 class="font-weight-bold">NIS : <?php echo  $nis; ?></h6>
              <h6 class="font-weight-bold">Nama pembeli : <?php echo $nama; ?></h6>
              <h6 class="font-weight-bold">Kelas : <?php echo $kelas; ?></h6>
              <p class="lead"><hr>
            <div class="row font-weight-bold text-center">
                <div class="col-3">No</div>
                <div class="col-3">Nama Barang</div>
                <div class="col-3">Jumlah</div>
                <div class="col-3">Harga</div>
              </div>
<?php 
$kode = $waso;
$bayar = 0;

foreach ($karanjang as $krjg => $isinya) { ?>

<?php 
$id = $krjg;

$nama_barang = $isinya["nama_barang"];
$harga = $isinya["harga"];
$jmlbel = $isinya["jmlbel"];

$total = $jmlbel * $harga;
$bayar = $total + $bayar;

?>
              <div class="row text-center">
                <div class="col-3"><?php echo $id;?></div>
                <div class="col-3"><?php echo $nama_barang;?></div>
                <div class="col-3"><?php echo $jmlbel;?></div>
                <div class="col-3"><?php echo "Rp ".number_format((double)$harga,0,',','.').""; ?></div>
              </div> 
            	<?php } ?>  
            <div class="row text-center font-weight-bold">
                <div class="col-3"></div>
                <div class="col-3"></div>
                <div class="col-3">Total</div>
                <div class="col-3"><?php echo "Rp ".number_format((double)$bayar,0,',','.').""; ?></div>
              </div>
              <hr>
              <input type="button" class="btn btn-default print" style="cursor: pointer;" value="Print" onclick="printPage()" />
            </div>
          </div>
        </div>
      </div>  
  </div>
<!-- KODE PHP BARANG BY ADITYA RAIHAN -->
      
<!-- End Struk -->
</body>
</html>