<?php
include "config.php";
session_start();
$karanjang = isset($_SESSION['karanjang']) ? $_SESSION['karanjang'] : array(); //cek array kalo ada lanjut
$totalbeli = count($karanjang); // hitung jumlah array
if (isset($_POST['submit'])) {

    $depan = $_POST['depan'];
    $belakang = $_POST['belakang'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $nama = "$depan $belakang";
    $waktu = date("Y-m-d:1:s");

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
    
    $query = mysqli_query($koneksi,"INSERT INTO pesanan VALUES ('$waso','$nis','$nama','$kelas','$waktu','Belum Lunas')");  
    
    if($query){
        $last_id_pesanan = mysqli_insert_id($koneksi);
        
        $karanjang = $_SESSION['karanjang'];
        foreach($karanjang AS $key => $value){
            $barang_id = $key;
            $jumlah = $value['jmlbel'];
            $harga = $value['harga'];
            $total = $jumlah * $harga;
            mysqli_query($koneksi,"INSERT INTO pesanan_detail VALUES ('','$waso','$barang_id','$jumlah','$harga')");
        }
        unset($_SESSION['karanjang']);
        
    }    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>KOPERASI MITRA USAHA SMKN 13 BANDUNG | Pembelian Sukses</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/babi.css">
  <script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }
</script>
<body>

<!-- Struk -->
  <div class="container struk" id="PrintArea">
    <span class="gunting">&#9986;</span>
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
$nomor = 1;
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
                <div class="col-3"><?php echo $nomor ?></div>
                <div class="col-3"><?php echo $nama_barang;?></div>
                <div class="col-3"><?php echo $jmlbel;?></div>
                <div class="col-3"><?php echo "Rp ".number_format((double)$harga,0,',','.').""; ?></div>
              </div> 
              <?php $nomor++ ?>
            	<?php } ?>  
            <div class="row text-center font-weight-bold">
                <div class="col-3"></div>
                <div class="col-3"></div>
                <div class="col-3">Total</div>
                <div class="col-3"><?php echo "Rp ".number_format((double)$bayar,0,',','.').""; ?></div>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>  
  </div>
  <div class="container bgsd" id="Not-PrintArea">
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-default print" style="cursor: pointer;" onclick="printDiv('PrintArea')"><a href="">Print</a></button>
        <button type="button" class="btn btn-default print" style="cursor: pointer;"><a href="index.php">Home</a></button>
      </div>
    </div>
  </div>
  
<!-- End Struk -->
</body>
</html>
   