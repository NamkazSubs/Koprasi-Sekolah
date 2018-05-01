<?php
session_start();
include "config.php";

$karanjang = isset($_SESSION['karanjang']) ? $_SESSION['karanjang'] : array(); //cek array kalo ada lanjut
$totalbeli = count($karanjang); // hitung jumlah array

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>KOPERASI MITRA USAHA SMKN 13 BANDUNG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Side Nav -->
<div id="mySidenav" class="sidenav">
  <a href="#" id="keranjang" class="text-center" data-toggle="modal" data-target="#myModal">KERANJANG<span class="badge">
  <?php 
if ($totalbeli != 0) { 
echo "$totalbeli";
 }else{
    echo "0";
} ?>   
  </span></a>

  <div id="contact" class="text-center" style="cursor: none">KONTAK
    <div  id="nohp" class="text-center">08123456789</div>
    <div  id="line" class="text-center">@koperasi13</div>
  </div>  

</div>
<!-- End Sidenav -->

<!-- MODAL MODAL MODAL -->
      <!-- The Modals -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Keranjang Anda</h4>
                <button type="button" class="close" data-dismiss="modal" style="cursor: pointer;">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
                <div class="container"> 
<?php 
if ($totalbeli == 0) {
echo "<h5> Anda belum memilih barang </h5>";
} else {  $nomor = 1;   
?>     
                  <table class="table table-light text-center">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
<?php 
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
                      <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $nama_barang;?></td>
                        <td><?php echo $jmlbel;?></td>
                        <td><?php echo "Rp ".number_format((double)$harga,0,',','.').""; ?></td>
                        <td style="cursor: pointer;">
                        <a href="delete.php?id=<?php echo $id;?>">&times;</a>
                        </td>
                      </tr>
<?php $nomor++; } ?>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Total</th>
                        <th><?php echo "Rp ".number_format((double)$bayar,0,',','.').""; ?></th>
                      </tr>
	<?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>        
              <!-- Modal footer -->
            <?php if ($totalbeli == 0) {
}else{ ?>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" style="cursor: pointer;" data-toggle="modal" data-target="#myModal2">Lanjut</button>
              </div> <?php } ?>
            </div>
          </div>
        </div>
      <!-- End Modals -->

      <!-- Modal Form-->
        <div class="modal fade" id="myModal2">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Form Pembelian</h4>
                <button type="button" class="close" data-dismiss="modal" style="cursor: pointer;">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
                <form action="pembelian-sukses.php" method="POST">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="depan" placeholder="Nama Depan">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" name="belakang" placeholder="Nama Belakang">
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px;">
                    <div class="col">
                      <input type="text" class="form-control" name="nis" placeholder="N I S">
                    </div>
                    <div class="col">
                      <select class="custom-select custom-select-lg mb-3" name="kelas">
                        <option selected>Kelas</option>
                        <option value="X AK 1">X AK 1</option>
                        <option value="X AK 2">X AK 2</option>
                        <option value="X AK 3">X AK 3</option>
                        <option value="X AK 4">X AK 4</option>
                        <option value="X AK 5">X AK 5</option>
                        <option value="X AK 6">X AK 6</option>         
                        <option value="X TKJ 1">X TKJ 1</option>
                        <option value="X TKJ 2">X TKJ 2</option>
                        <option value="X TKJ 3">X TKJ 3</option>
                        <option value="X RPL 1">X RPL 1</option>
                        <option value="X RPL 2">X RPL 2</option>
                        <option value="XI AK 1">XI AK 1</option>
                        <option value="XI AK 2">XI AK 2</option>
                        <option value="XI AK 3">XI AK 3</option>
                        <option value="XI AK 4">XI AK 4</option>
                        <option value="XI AK 5">XI AK 5</option>
                        <option value="XI AK 6">XI AK 6</option>         
                        <option value="XI TKJ 1">XI TKJ 1</option>
                        <option value="XI TKJ 2">XI TKJ 2</option>
                        <option value="XI TKJ 3">XI TKJ 3</option>
                        <option value="XI RPL 1">XI RPL 1</option>
                        <option value="XI RPL 2">XI RPL 2</option>
                        <option value="XII AK 1">XII AK 1</option>
                        <option value="XII AK 2">XII AK 2</option>
                        <option value="XII AK 3">XII AK 3</option>
                        <option value="XII AK 4">XII AK 4</option>
                        <option value="XII AK 5">XII AK 5</option>
                        <option value="XII AK 6">XII AK 6</option>         
                        <option value="XII TKJ 1">XII TKJ 1</option>
                        <option value="XII TKJ 2">XII TKJ 2</option>
                        <option value="XII TKJ 3">XII TKJ 3</option>
                        <option value="XII RPL 1">XII RPL 1</option>
                        <option value="XII RPL 2">XII RPL 2</option>
                        <option value="XIII AK 1">XIII AK 1</option>
                        <option value="XIII AK 2">XIII AK 2</option>
                        <option value="XIII AK 3">XIII AK 3</option>
                        <option value="XIII AK 4">XIII AK 4</option>
                        <option value="XIII AK 5">XIII AK 5</option>
                        <option value="XIII AK 6">XIII AK 6</option>                 
                      </select>
                    </div>
                  </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" style="cursor: pointer;" name="submit" value="Selesai">
              </div>
            </form>
              </div>
              
              <!-- Modal footer -->
            </div>
          </div>
        </div>
      <!-- End Modal Form -->
<!-- END MODAL MODAL MODAL -->

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid " style="background: 0.1rem url(img/bg2.png);background-color:#e9ecef;">
  <div class="container">
    <img src="img/logokoperasi.png" class="rounded mx-auto d-block" alt="" width="100px" style="padding-bottom: 10px;">
    <h1 class="display-4 text-center">KOPERASI <b>13</b></h1>
    <h6 class="display-9 text-center">(KOPERASI MITRA USAHA SMKN <b>13</b> BANDUNG)</h6>
  </div>
</div>
<!-- End Jumbotron -->

<!-- Tabel Barang -->
<div class="container ngetot">
  <div class="table-responsive" style="padding-top: 2rem">
    <table class="table table-light text-center">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Jumlah</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
     <?php 
    $nomor = 1; 
    $jijo = mysqli_query($koneksi,"SELECT * FROM barang ORDER BY id_barang ASC");
    while ($data = mysqli_fetch_array($jijo)){?>
    <tr>
        <td><?php echo $nomor ?></td>
        <td><?php echo $data['nama_barang']; ?></td>
        <td><?php echo "Rp ".number_format((double)$data['harga'],0,',','.').""; ?></td>
        <td><?php echo $data['stok']; ?></td>
        <td>
          <form method="POST" action="order.php">
              <input type="number" name="jumlah" min="1" max="<?php echo $data['stok']; ?>" step="1" value="1" id="quantity">
             <input name="id" type="hidden" value="<?php echo $data['id_barang']; ?>">
             
              <input type="submit"  class="btn btn-outline-primary" id="kirim" style="cursor: pointer;" value="Beli">
          </form>
        </td>
      </tr>
    
    <?php $nomor++ ?>
    <?php } ?>
    </tbody>
  </table>
</div>
  </div>      
  
  <div class="haha">
      
  </div>
<!-- End Tabel Barang -->
   
<!-- Footer -->
    <footer style="background: 0.1rem url(img/bg2.png);background-color:#e9ecef;">
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col-12">
            <p>Koperasi <b>13</b>
              Memudahkan para siswa untuk membeli sesuatu yang diinginkan sejak lama. dan membantu siswa meraih cita-cita.
            </p>
          </div>
          <div class="col-12">
            Built With ♥ By Team <b>4</b>
          </div>
        </div>  
      </div>
    </footer> 
    <!-- End Footer -->
    <!--- AJAX LOAD BY Fu -->
    <!-- END AJAX LOAD BY FU -->

</body>
</html>