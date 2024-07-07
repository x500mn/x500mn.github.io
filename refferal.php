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

    <section class="mt-4 mb-5 deposit">
      <div class="container">
        <div class="card mb-3" style="background-color: #000;">
          <div class="card-body p-2 text-uppercase font-weight-bold">
            Referral
          </div>
        </div>

        <img src="<?php echo $urlweb; ?>/upload/referral.jpg" class="img-fluid mb-3" alt="...">
        <div class="row">
          <div class="col-sm-6">
            <p><small><strong>Jadilah bagian dari sistem Referral kami</strong></small></p>
            <ol class="list-unstyled" style="font-size: 15px;">
              <li><i class="fa fa-check-circle text-success"></i>&nbsp; Monitoring Member Realtime</li>
              <li><i class="fa fa-check-circle text-success"></i>&nbsp; Banyak Pilihan Permainan</li>
              <li><i class="fa fa-check-circle text-success"></i>&nbsp; Pembayaran Komisi Tepat Waktu</li>
              <li><i class="fa fa-check-circle text-success"></i>&nbsp; Komisi Seumur Hidup</li>
              <li><i class="fa fa-check-circle text-success"></i>&nbsp; Aman & Terpercaya</li>
            </ol>
          </div>
          <div class="col-sm-6"></div>
          <div class="col-sm-12">
            <h5>Program Referral kami</h5>
            <p>Kini kami telah memiliki program referral untuk member setia kami. Program Referral adalah program yang memberikan kesempatan kepada pengguna yang telah memiliki akun disitus Kami untuk mendapatkan bonus tambahan dengan cara merekomendasikan kami kepada relasi Anda.</p>

            <p>Dengan semakin banyaknya orang yang menggunakan kode referral Anda untuk registrasi dan bermain disitus kami, semakin menguntungkan untuk Anda dan semua orang! Semua teman Anda yang turut melakukan registrasi dan bermain di kami akan mendapatkan kesempatan untung memenangkan jackpot dari kami. Kami juga akan memberi Anda komisi karena berhasil mengajak teman – teman Anda untuk bermain di kami. Dengan ikut serta dalam Program Referral kami, Anda akan mendapatkan komisi untuk setiap teman yang bermain di kami sesuai dengan syarat dan ketentuan yang berlaku.</p>

            <p>Bagaimana cara saya mengajak teman untuk menggunakan kode referral ?</p>

            <p>Mengajak teman Anda untuk berpartisipasi sangatlah mudah! Mereka hanya butuh untuk memasukkan kode referral unik Anda ketika mereka melakukan registrasi akun di kami. Kode referral Anda dapat ditemukan di Halaman Referral.</p>

            <p>Harap diingat, agar referral Anda dianggap valid, teman – teman Anda harus melakukan registrasi akun dan bermain game di kami. Setelah login dan memasukkan kode referral, teman – teman Anda dapat langsung melakukan deposit dan bermain game.</p>

            <p>Syarat Untuk Mendapatkan Komisi – Member.</p>

            <p>Agar Anda memenuhi syarat untuk mendapatkan komisi, pastikan bahwa member Anda telah berhasil bermain game dan melakukan transaksi yang memenuhi syarat program referral kami.</p>

            <p>Hadiah Berlipat Ganda untuk Anda !</p>

            <p>Anda bisa mendapatkan komisi beberapa kali. Anda akan mendapat komisi dari seluruh Anggota Anda yang bermain di website Kami. Ajak lebih banyak teman Anda untuk menggunakan kode referral Anda dan dapatkan lebih banyak komisi.</p>

            <p>Anda dapat melihat daftar member yang berhasil menggunakan kode referral dan keuntungan yang Anda dapatkan pada halaman referral.</p>

            <p>Mudah, bukan? Daftar dan main disitus kami untuk mendapat keuntungan sekarang juga !</p>
          </div>
        </div>
        <div class="text-center">
          <a href="<?php echo $urlweb; ?>/anggota/" class="btn btn-secondaries mt-4 mb-3" style="width: 200px; height: 50px; line-height: 40px!important;">HALAMAN REFERRAL</a>
        </div>
      </div>
    </section>
    
    <!--Start footer-->
    <?php include('footer.php'); ?>
</body>
</html>

