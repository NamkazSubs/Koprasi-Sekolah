<?php
session_start();
if(isset($_SESSION['username'])) {
header('location:index.php'); }
require_once("koneksi.php");
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
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/icheck/skins/flat/aero.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper">

      <div class="container">

        <form class="form-signin" method="POST">
          <div class="panel periodic-login">
              <span class="atomic-number"></span>
              <div class="panel-body text-center">
                  <h1 class="atomic-symbol"></h1>
                  <p class="atomic-mass">KOPRASI</p>
                  <p class="element-name">SMKN 13 BANDUNG</p>
                  <p class="element-name">LOG IN</p>

                  <i class="icons icon-arrow-down"></i>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" name="username" required>
                    <span class="bar"></span>
                    <label>Username</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" class="form-text" name="password" required>
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
                  <label class="pull-left">
                  <input type="checkbox" class="icheck pull-left" name="checkbox1"/> Remember me
                  </label>
                  <input type="submit" name="submit" class="btn col-md-12" value="Log In"/>
              </div>
          </div>
        </form>

      </div>

      <!-- end: Content -->
      <!-- start: Javascript -->
      <script src="asset/js/jquery.min.js"></script>
      <script src="asset/js/jquery.ui.min.js"></script>
      <script src="asset/js/bootstrap.min.js"></script>

      <script src="asset/js/plugins/moment.min.js"></script>
      <script src="asset/js/plugins/icheck.min.js"></script>

      <!-- custom -->
      <script src="asset/js/main.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         $('input').iCheck({
          checkboxClass: 'icheckbox_flat-aero',
          radioClass: 'iradio_flat-aero'
        });
       });
     </script>
     <!-- end: Javascript -->
   </body>
   </html>
   <?php
if (isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];
    
$cekuser= mysqli_query($koneksi,"SELECT * FROM admin WHERE username = '$username'");
    
$jumlah = mysqli_num_rows($cekuser);

$hasil = mysqli_fetch_array($cekuser);

if ($jumlah == 0) { ?>
<p class="text-muted push-15-t">Username Belum Terdaftar..</p>
</div>
<?php
} else {
   if($password <> $hasil['password']) {?>
   <p>Username Salah</p>
<?php   
   } else {
     $_SESSION['username'] = $hasil['username'];
     header('location: index.php');
   }
}
}
?>