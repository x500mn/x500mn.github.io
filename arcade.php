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
$hari = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');

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
  <!-- Custom Style-->
  <?php include('style.php'); ?>
  <link href="<?php echo $urlweb; ?>/assets/css/owl.carousel.css" rel="stylesheet"/>
  <link href="<?php echo $urlweb; ?>/assets/css/owl.carousel.min.css" rel="stylesheet"/>
</head>

<body>

  <!-- Start wrapper-->
  <div id="wrapper">
    <header>
      <?php include('header.php'); ?>
    </header>

    <section class="d-block d-sm-none">
      <?php if(!isset($_SESSION['user'])){ ?>
      <div class="login-links-container">
        <a href="<?php echo $urlweb; ?>/register/" class="btn_register">Register</a>
        <a href="<?php echo $urlweb; ?>/login/" class="btn_login">Login</a>
      </div>
      <?php } else { ?>
      <div class="login-links-container">
        <a href="<?php echo $urlweb; ?>/deposit/" class="btn_register">Deposit</a>
        <a href="<?php echo $urlweb; ?>/withdraw/" class="btn_login">Withdraw</a>
      </div>
      <?php } ?>
      <div class="main-menu-outer-container">
        <main>
          <a href="<?php echo $urlweb; ?>/hot/" data-active="false">
          <img loading="lazy" src="<?php echo $urlweb; ?>/upload/hot-games.svg" style="--image-src: url(<?php echo $urlweb; ?>/upload/hot-games-active.svg);">Hot Games</a>
          <a href="<?php echo $urlweb; ?>/slot/" data-active="false">
          <img loading="lazy" src="<?php echo $urlweb; ?>/upload/slots.svg" style="--image-src: url(<?php echo $urlweb; ?>/upload/slots-active.svg);">Slots</a>
          <a href="<?php echo $urlweb; ?>/casino/" data-active="false">
          <img loading="lazy" src="<?php echo $urlweb; ?>/upload/casino.svg" style="--image-src: url(<?php echo $urlweb; ?>/upload/casino-active.svg);">Live Casino</a>
          <a href="<?php echo $urlweb; ?>/lotto/" data-active="false">
          <img loading="lazy" src="<?php echo $urlweb; ?>/upload/others.svg" style="--image-src: url(<?php echo $urlweb; ?>/upload/others-active.svg);">Lottery</a>
          <a href="<?php echo $urlweb; ?>/sport/" data-active="false">
          <img loading="lazy" src="<?php echo $urlweb; ?>/upload/sports.svg" style="--image-src: url(<?php echo $urlweb; ?>/upload/sports-active.svg);">Sports</a>
          <a href="<?php echo $urlweb; ?>/fishing/" data-active="false">
          <img loading="lazy" src="<?php echo $urlweb; ?>/upload/crash-game.svg" style="--image-src: url(<?php echo $urlweb; ?>/upload/crash-game-active.svg);">Crash Game</a>
          <a href="<?php echo $urlweb; ?>/arcade/" data-active="false">
          <img loading="lazy" src="<?php echo $urlweb; ?>/upload/arcade.svg" style="--image-src: url(<?php echo $urlweb; ?>/upload/arcade-active.svg);">Arcade</a>
          <a href="<?php echo $urlweb; ?>/poker/" data-active="false">
          <img loading="lazy" src="<?php echo $urlweb; ?>/upload/poker.svg" style="--image-src: url(<?php echo $urlweb; ?>/upload/poker-active.svg);">Poker</a>
          <a href="<?php echo $urlweb; ?>/esport/" data-active="false">
          <img loading="lazy" src="<?php echo $urlweb; ?>/upload/e-sports.svg" style="--image-src: url(<?php echo $urlweb; ?>/upload/e-sports-active.svg);">E-Sports</a>
        </main>
      </div>
    </section>

    <section class="d-none d-sm-block">
      <div class="container">
        <div class="information">
          <div data-section="title"><i class="fas fa-bullhorn"></i>&nbsp; Notice</div>
          <div data-section="announcements">
            <marquee class="text-white">
              <?php echo $s0['news']; ?>
            </marquee>
          </div>
          <div data-section="date"><?php echo date('d/m/Y H:i:s'); ?></div>
        </div>
        <div class="home-jackpot-container">
          <div data-section="jackpot">
            <a href="#" rel="nofollow">
            <div class="progressive-jackpot" style="background-image: url(<?php echo $urlweb; ?>/upload/jackpot.gif);">
              <picture>
                <source srcset="<?php echo $urlweb; ?>/upload/jackpot-play-logo.webp" type="image/webp">
                <source srcset="<?php echo $urlweb; ?>/upload/jackpot-play-logo.png" type="image/png">
                <img alt="Jackpot Play" class="jackpot-play" loading="lazy" src="<?php echo $urlweb; ?>/upload/jackpot-play-logo.png">
              </picture>
              <div class="jackpot-container">
                <span class="jackpot-currency jackpot_currency">IDR </span>
                <span class="count-jack" id="counter1" data-progressive-jackpot-url="#">UPDATING</span>
              </div>
            </div>
            </a>
          </div>
          <div data-section="lottery"></div>
        </div>
      </div>
    </section>

    <section class="mt-3 mb-5">
      <div class="container">
        <div class="card" style="background: #1a1a1a; border-radius: 3px;">
          <div class="card-body">
            <?php
              echo '
                <img src="'.$urlweb.'/upload/icon/slot_not_found.png" class="img-fluid" style="display: block; margin: 0 auto;">
                <h3 class="text-center" style="margin-bottom: 100px;">Game Sedang Maintenance</h3>
              ';
            ?>
          </div>
        </div>
        
      </div>
    </section>
        
    <!--Start footer-->
    <?php include('footer.php'); ?>
</body>
</html>

