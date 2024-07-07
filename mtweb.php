<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('config/koneksi.php');
$sid = session_id();
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];
$urlwebs = $s0['urlweb'];
$pengguna = $s0['user'];
$sql_1a = mysqli_query($conn,"SELECT * FROM `tb_social` WHERE user = '$pengguna'") or die(mysqli_error());
$s1a = mysqli_fetch_array($sql_1a);
$sql_1b = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '$pengguna'") or die(mysqli_error());
$s1b = mysqli_fetch_array($sql_1b);
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d');
$stat = mysqli_query($conn,"INSERT INTO `tb_stat` (`ip`, `date`, `hits`, `page`, `user`) VALUES ('$ip', '$date', 1, 'Beranda', '$pengguna')") or die (mysqli_error());
if($s0['onoff'] == 0){
    header('location:'.$urlweb);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $s0['instansi']; ?></title>
  <meta name="description" content="<?php echo $s0['deskripsi']; ?>">
  <meta name="keywords" content="<?php echo $s0['keyword']; ?>">
  <meta property="og:title" content="<?php echo $s0['instansi']; ?>"/>
  <meta property="og:description" content="<?php echo $s0['deskripsi']; ?>" />
  <meta property="og:url" content="<?php echo $urlweb; ?>" />
  <meta property="og:image" content="<?php echo $urlweb; ?>/upload/<?php echo $s0['image']; ?>" />
  <meta name="resource-type" content="document" />
  <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
  <meta http-equiv="content-language" content="en-us" />
  <meta name="author" content="<?php echo $urlweb; ?>" />
  <meta name="contact" content="<?php echo $urlweb; ?>" />
  <meta name="copyright" content="Copyright (c) <?php echo $urlweb; ?>. All Rights Reserved." />
  <meta name="robots" content="index, nofollow">

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $urlweb; ?>/upload/favicon.png">
  
  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/plugins/summernote/dist/summernote-bs4.css"/>
  <!-- simplebar CSS-->
  <link href="<?php echo $urlweb; ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo $urlweb; ?>/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!--Data Tables -->
  <link href="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <!-- animate CSS-->
  <link href="<?php echo $urlweb; ?>/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?php echo $urlweb; ?>/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Horizontal menu CSS-->
  <link href="<?php echo $urlweb; ?>/assets/css/horizontal-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <?php include('style.php'); ?>
  <link href="<?php echo $urlweb; ?>/assets/css/style-main.css" rel="stylesheet"/>
  <!-- Custom Style--> 
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <style type="text/css">
    .carousel img {
        width: 100%;
        margin-right: 10px;
    }
    @media screen and ( max-width: 768px ) {
      /* half-width cells for larger devices */
      .carousel img { width: 100%; }
    }
  </style>
</head>

<body>

  <!-- Start wrapper-->
  <div id="wrapper">

    <div class="pt-5 pb-5">
      <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 text-center">
                <img src="<?php echo $urlweb; ?>/upload/maintenance_imge.png" class="img-fluid" style="display: block; margin: 0 auto; margin-top: 25%;">
                <h4>Mohon Maaf, Saat ini Kami Sedang dalam perbaikan Sistem!</h4>
            </div>
            <div class="col-sm-3"></div>
        </div>
      </div>
    </div>
    
    <!--Start footer-->
  </div>
  
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo $urlweb; ?>/assets/js/jquery.min.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/js/popper.min.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/js/bootstrap.min.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/js/jquery.countdown.js"></script>
  <script type="text/javascript" src="<?php echo $urlweb; ?>/assets/js/main.js"></script>
  
  <!-- simplebar js -->
  <script src="<?php echo $urlweb; ?>/assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- horizontal-menu js -->
  <script src="<?php echo $urlweb; ?>/assets/js/horizontal-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="<?php echo $urlweb; ?>/assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
  <!--Select Plugins Js-->
  <script src="<?php echo $urlweb; ?>/assets/plugins/select2/js/select2.min.js"></script>
  <!--Data Tables js-->
  <script src="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>
</body>
</html>

