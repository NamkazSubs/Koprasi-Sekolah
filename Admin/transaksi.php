<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");
$muncul = mysqli_query($koneksi,"SELECT * FROM admin");
$data = mysqli_fetch_array($muncul);

$nip = $data['nip'];
$id_pesanan = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Koperasi SMKN 13 BANDUNG">
	<meta name="author" content="Created By Fu">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KOPRASI SMKN 13 BANDUNG</title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/fullcalendar.min.css"/>
	<link href="asset/css/style.css" rel="stylesheet">
	<!-- end: Css -->

	<link rel="shortcut icon" href="asset/img/logo-koperasi-03.jpg">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

 <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="index.php" class="navbar-brand"> 
                 <b>Koperasi</b>
                </a>

              <ul class="nav navbar-nav search-nav">
                <li>
                   <div class="search">
                    <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                    <div class="form-group form-animate-text">
                      <input type="text" class="form-text" required>
                      <span class="bar"></span>
                      <label class="label-search">Apa AJa Deh <b>Buat Di Cari</b> </label>
                    </div>
                  </div>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><?php echo $data['nama'];?></span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li><a href="#"><span class="fa fa-user"></span> My Profile</a></li>
                     <li><a href="#"><span class="fa fa-calendar"></span> My Calendar</a></li>
                    <li><a href="logout.php" class="fa fa-power-off"><span> Log Out</span></a></li>    
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                     <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <li class="active ripple">
                      <a class="tree-toggle nav-header"><span class="fa-home fa"></span> Dashboard 
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="index.php">Dashboard</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header">
                    <span class="icons icon-handbag"></span> Barang
                    <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="tambah-barang.php">Tambah Barang</a></li>
                        <li><a href="list-barang.php">List Barang</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-credit-card fa"></span> Transaksi
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="transaksi-barang.php">Barang</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header">
                    <span class="fa fa-archive"></span> Laporan
                    <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="laporan-barang.php">Barang</a></li>
                        <li><a href="laporan-pendapatan.php">Pendapatan</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="icons icon-settings"></span> Setting
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="ganti-password.php">Ganti Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                      </ul>
                    </li>
                     <li class="ripple">
                      <a class="tree-toggle nav-header">
                      </a>
                      <ul class="nav nav-list tree">
                      </ul>
                    </li>

                    
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->
          <div id="content">
            <div class="tabs-wrapper text-center">             

            <div class="col-md-12 tab-content">

               <!-- start: Content -->
    <div class="panel invoice-v1-content">
        <div class="panel-body">
            <div class="col-md-12 invoice-v1-header">
              <div class="col-md-12">
                <h1><b>INVOICE</b></h1>
              </div>
              <div class="col-md-12">
                <h4>
            <?php 
            $koplok = mysqli_query($koneksi,"SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'");
            $gubluk = mysqli_fetch_array($koplok);
            ?>  
                <address>
                  <strong>ID Pesanan : <?php echo $gubluk['id_pesanan']; ?></strong><br>
                  Created: <?php echo $gubluk['tanggal']; ?><br>
                </address>
                </h4>
              </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <h4>
                    <address>
                      <strong>Koperasi 13.</strong><br>
                      Jl. Soekarno Hatta No.Km.10, Jatisari<br>
                      Buahbatu, Kota Bandung.<br>
                      <abbr title="Phone">P:</abbr> (022) 7318960
                    </address>
                    </h4>
                </div>
                <div class="col-md-6 text-right">
                    <h4>
                    <address>
                      <strong>[N]-Project</strong><br>
                      Kamukura Izuru<br>
                      NamkazSubs@gmail.com<br>
                    </address>
                    </h4>
                </div>
            </div>
            <div class="col-md-12 padding-0">
                <div class="responsive-table">
                    
                   <table class="table table-striped">
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                    </tr>
     <?php 
            $no = 1;
            $subtotal = 0;
            $brg = mysqli_query($koneksi,"SELECT pesanan_detail.*,barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.id_barang=barang.id_barang WHERE pesanan_detail.id_pesanan = '$id_pesanan'");
            while($tampil = mysqli_fetch_array($brg)){
                
                $total = $tampil['harga'] * $tampil['jumlah'];
                $subtotal = $subtotal + $total;
                $jancok = $tampil['harga'];
                ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $tampil['nama_barang'];?></td>
                      <td><?php echo $tampil['jumlah'];?></td>
                      <td><?php echo "Rp ".number_format((double)$jancok,0,',','.').""; ?></td>
                    </tr>
            <?php $no++; ?>
            <?php } ?> 
                    <tr>
                      <th colspan="3">Total</th>
                      <td><?php echo "Rp ".number_format((double)$subtotal,0,',','.').""; ?></td>
                    </tr>
                </table>
            <form action="proses/proses-transaksi.php" id="invoice" method="POST">
            <div class="form-group form-animate-checkbox">
            <input type="checkbox" class="checkbox" name="checkbox" value="check" id="validate_agree">
            <label>Lunas</label>
            </div>
            <input type="hidden" name="nip" value="<?php echo $data['nip'];?>">
            <input type="hidden" name="total" value="<?php echo $subtotal ?>">
            <input type="hidden" name="id_pembelian" value="<?php echo $gubluk['id_pesanan']; ?>">
            <input type="submit" class="btn btn-succes" value="Update" onclick="if(!this.form.checkbox.checked){alert('Mohon Ceklis Checkbox nya .. !!');return false}">
            </form>
            </div>
        </div>
    </div>
    <!-- end: content -->
                </div>
              </div>
          </div>
        
          

     <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft panjang">
                <ul class="nav nav-list">
                     <ul class="nav nav-list">
                    <li class="active ripple">
                      <a class="tree-toggle nav-header"><span class="fa-home fa"></span> Dashboard 
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="index.php">Dashboard</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header">
                    <span class="icons icon-handbag"></span> Barang
                    <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="tambah-barang.php">Tambah Barang</a></li>
                        <li><a href="list-barang.php">List Barang</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header">
                    <span class="fa fa-credit-card fa"></span> Transaksi
                    <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="transaksi-barang.php">Barang</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header">
                    <span class="fa fa-archive"></span> Laporan
                    <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="laporan-barang.php">Barang</a></li>
                        <li><a href="laporan-pendapatan.php">Pendapatan</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="icons icon-settings"></span> Setting
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="ganti-password.php">Ganti Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                      </ul>
                    </li>
                     <li class="ripple">
                      <a class="tree-toggle nav-header">
                      </a>
                      <ul class="nav nav-list tree">
                      </ul>
                    </li>
                  </ul>
                  </ul>
            </div>
        </div>       
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

    <!-- start: Javascript -->
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/jquery.ui.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
   
    
    <!-- plugins -->
    <script src="asset/js/plugins/moment.min.js"></script>
    <script src="asset/js/plugins/fullcalendar.min.js"></script>
    <script src="asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="asset/js/plugins/jquery.vmap.min.js"></script>
    <script src="asset/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="asset/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="asset/js/plugins/chart.min.js"></script>
    <script src="asset/js/plugins/jquery.datatables.min.js"></script>
    <script src="asset/js/plugins/datatables.bootstrap.min.js"></script>

    <!-- custom -->
     <script src="asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  
  $("#invoice").validate({
      errorElement: "em",
      errorPlacement: function(error, element) {
        $(element.parent("div").addClass("form-animate-error"));
        error.appendTo(element.parent("div"));
      },
      success: function(label) {
        $(label.parent("div").removeClass("form-animate-error"));
      },
      rules: {
        validate_agree: "required"
      },
      messages: {
        validate_agree: "Please accept our policy"
      }
    });
  });
</script>
 
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>

  <!-- end: Javascript -->
  </body>
</html>