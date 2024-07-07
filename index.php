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

    <section>
      <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php
              $sql_21 = mysqli_query($conn,"SELECT * FROM `tb_slide` ORDER BY sort ASC") or die(mysqli_error());
              $nos=0;
              while($s21 = mysqli_fetch_array($sql_21)){
                $nos++;
                $a = $nos - 1;
            ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $a; ?>"<?php if($nos == 1){ echo ' class="active"'; } ?>></li>
            <?php } ?>
          </ol>
          <div class="carousel-inner">
            <?php
              $sql_2 = mysqli_query($conn,"SELECT * FROM `tb_slide` ORDER BY sort ASC") or die(mysqli_error());
              $no = 0;
              while($s2 = mysqli_fetch_array($sql_2)){
                $no++;
            ?>
            <div class="carousel-item<?php if($no == 1) { echo ' active'; } ?>">
              <img class="d-block w-100" src="<?php echo $urlweb; ?>/upload/<?php echo $s2['image']; ?>" alt="First slide">
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
    <?php if(!isset($_SESSION['user'])){ ?>
    <section class="d-block d-sm-none">
      <div class="login-links-container">
        <a href="<?php echo $urlweb; ?>/register/" class="btn_register">Register</a>
        <a href="<?php echo $urlweb; ?>/login/" class="btn_login">Login</a>
      </div>
    </section>
    <?php } ?>
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

    <section class="d-block d-sm-none">
      <div data-section="jackpot">
        <a href="#" rel="nofollow">
          <div class="progressive-jackpot progressive-jackpot-slot">
            <picture>
              <source srcset="<?php echo $urlweb; ?>/upload/jackpot-play-logo.webp" type="image/webp">
              <source srcset="<?php echo $urlweb; ?>/upload/jackpot-play-logo.png" type="image/png">
              <img alt="Jackpot Play" class="img-fluid" loading="lazy" src="<?php echo $urlweb; ?>/upload/jackpot-play-logo.webp" style="max-width: 70%; display: block; margin: 0 auto;">
            </picture>
            <div class="jackpot-container" style="background-image: url('<?php echo $urlweb; ?>/upload/jackpot_mb.gif');">
              <span class="jackpot-currency jackpot_currency">IDR </span>
              <span class="count-jack" id="counter1" data-progressive-jackpot-url="#">UPDATING</span>
            </div>
          </div>
        </a>
      </div>
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

    <section class="mt-4 mb-5">
      <div class="container">
        <h6><img src="<?php echo $urlwebs; ?>/upload/icon/hot.png" class="mb-1" style="float: left; width: 20px; height: 20px; margin-right:8px;"><strong>Game Terpopuler</strong></h6>
        <section class="mt-3">
          <div class="gameList">
              <?php                
                $sql_3 = mysqli_query($conn,"SELECT * FROM `tb_gamelist` WHERE `datatype` = 'SL' AND `provider` IN('PragmaticPlay','PGSoft') ORDER BY rand() LIMIT 12") or die(mysqli_error($conn));
                while($s3 = mysqli_fetch_array($sql_3)){
                  $provider = $s3['provider'];
                  $ProviderMana = mysqli_query($conn,"SELECT * FROM `tb_tripayapi` WHERE provider = '$provider'") or die(mysqli_error());
                  $pm = mysqli_fetch_array($ProviderMana);
                  if(isset($_SESSION['user'])){
                    $externalPlayerId = $_SESSION['user'];
                    if($pm['status'] == 1){
                      $playUrl = 'href="'.$urlweb.'/playgame/'.$s3['provider'].'/'.$s3['gameid'].'" target="_blank"';
                    }
                    else {
                      $playUrl = 'href="#" data-toggle="modal" data-target="#modalGame" data-backdrop="static" data-keyboard="false"';
                    }
                  }
                  else {
                    $playUrl = 'href="#" data-toggle="modal" data-target="#modalLogin" data-backdrop="static" data-keyboard="false"';
                  }
                  $getProvider1 = mysqli_query($conn,"SELECT * FROM `tb_tripayapi` WHERE provider = '$provider'") or die(mysqli_error());
                  $gp1 = mysqli_fetch_array($getProvider1);
              ?>
              <div class="gameListColoumn text-center">
                <a <?php echo $playUrl; ?>>
                  <div class="gameList_box" style="background: url('<?php echo $urlwebs; ?>/<?php echo $s3['image']; ?>') no-repeat; background-size: 100% 100%; background-position: center center; border: 1px solid #481c5f;">
                  </div>
                  <p class="mt-2" style="font-size: 0.75rem;"><?php echo $s3['gamename']; ?></p>
                  
                </a>
              </div>
              <?php } ?>
            
          </div>
        </section>
      </div>
    </section>

    <section class="download-apk-container d-none d-sm-block" style="--image-src: url('<?php echo $urlweb; ?>/upload/download-apk-background.png');">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="download-apk">
              <div style="transform: translateX(0%); opacity: 1;">
                <picture>
                  <source srcset="<?php echo $urlweb;?>/upload/download-apk-phone.webp" type="image/webp">
                  <source srcset="<?php echo $urlweb;?>/upload/download-apk-phone.png" type="image/png">
                  <img alt="Download APK" class="img-fluid" loading="lazy" src="<?php echo $urlweb;?>/upload/download-apk-phone.png">
                </picture>
              </div>
              <div style="transform: translateX(0%); opacity: 1;">
                <div class="h2">Download free APK from <strong>BARAQ198 App</strong></div>
                <div class="h3">Enjoy multiple games in one hand</div>
                <div class="download-apk-info">
                  <div class="download-apk-section">
                    <div class="download-apk-qr-code">
                      <a href="#">
                        <picture>
                          <source srcset="<?php echo $urlweb;?>/upload/W1N.webp" type="image/webp">
                          <source srcset="<?php echo $urlweb;?>/upload/W1N.jpg" type="image/jpeg">
                          <img alt="" loading="lazy" src="<?php echo $urlweb;?>/upload/W1N.jpg">
                        </picture>
                      </a>
                    </div>
                    <div class="download-apk-detail">
                      <div>BARAQ198 App</div>
                      <a class="btn" href="#" data-toggle="modal" data-target="#apk_install_guide_modal">Install Guide</a>
                    </div>
                    <span>Scan QR code to Download <i>Android APK</i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--End Back To Top Button-->
    
    
    <!--Start footer-->
    <?php include('footer.php'); ?>
    <script>
      $(window).on('load', function() {
        $('#exampleModal').modal({show: true, backdrop: 'static', keyboard: false});
      });
    </script>
</body>
</html>

