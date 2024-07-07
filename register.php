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
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <?php
                    error_reporting(0);
                    if (!empty($_GET['notif'])) {
                      if ($_GET['notif'] == 1) {
                        echo '
                          <div class="alert alert-success alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-icon">
                              <i class="fa fa-check"></i>
                            </div>
                            <div class="alert-message">
                              <span><strong>Congrats!</strong> Akun Berhasil Dibuat!</span>
                            </div>
                          </div>
                        ';
                      }
                      if ($_GET['notif'] == 2) {
                        echo '
                          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-icon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div class="alert-message">
                              <span><strong>Warning!</strong> Username Sudah Terdaftar, <a href="'.$urlweb.'/forgot/" class="text-danger">Klik Disini</a> Apabila Anda Lupa dengan Password Anda!</span>
                            </div>
                          </div>
                        ';
                      }
                      if ($_GET['notif'] == 3) {
                        echo '
                          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-icon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div class="alert-message">
                              <span><strong>Warning!</strong> Alamat Email Sudah Terdaftar!</span>
                            </div>
                          </div>
                        ';
                      }
                      if ($_GET['notif'] == 4) {
                        echo '
                          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-icon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div class="alert-message">
                              <span><strong>Warning!</strong> No. Handphone Sudah Terdaftar!</span>
                            </div>
                          </div>
                        ';
                      }
                      if ($_GET['notif'] == 5) {
                        echo '
                          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-icon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div class="alert-message">
                              <span><strong>Warning!</strong> Nomor Rekening Sudah Terdaftar!</span>
                            </div>
                          </div>
                        ';
                      }
                      if ($_GET['notif'] == 6) {
                        echo '
                          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-icon">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div class="alert-message">
                              <span><strong>Warning!</strong> Sepertinya Terjadi Kesalahan, Silahkan Coba Lgi!</span>
                            </div>
                          </div>
                        ';
                      }
                    }
                  ?>
            <form role="form" class="mt-3 mb-4" action="<?php echo $urlweb; ?>/function/step-1.php" method="POST">
              <div class="card" style="background-color: #000;">
                <div class="card-body p-2">
                  <div class="form-group mb-3">
                    <label>Username</label>
                    <input type="text" name="user" class="form-control" pattern="[a-zA-Z0-9]+" placeholder="Username, Kombinasi Huruf kecil dan angka" title="Username Tidak Valid" required>
                    <span><small>* Kombinasi Huruf Kecil dan Angka Tanpa Spesial Karakter</small></span>
                  </div>
                  <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" pattern="[a-z0-9A-Z]{8}+" placeholder="Password, Kombinasi huruf dan angka tanpa spesial karakter" title="Password Hanya Masukan Huruf dan Angka" required>
                  	<span><small>* Kombinasi Huruf dan Angka Tanpa Spesial Karakter</small></span>
                  </div>
                  <div class="form-group mb-3">
                    <label>Alamat Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Alamat Email">
                  </div>
                  <div class="form-group mb-3">
                    <label>No. Handphone</label>
                    <input type="tel" class="form-control" name="no_hp" pattern="[0-9]+" placeholder="No. Whatsapp">
                  </div>
                  <div class="form-group mb-3">
                    <label>Bank</label>
                    <select class="form-control" name="akun" required>
                      <option value="">-- Pilih Bank --</option>
                      <option value="BANK BCA">BANK BCA</option>
                      <option value="BANK BNI">BANK BNI</option>
                      <option value="BANK TABUNGAN NEGARA">BANK TABUNGAN NEGARA</option>
                      <option value="BANK MANDIRI">BANK MANDIRI</option>
                      <option value="BANK MASPION">BANK MASPION</option>
                      <option value="BANK SINARMAS">BANK SINARMAS</option>
                      <option value="BANK MAYORA">BANK MAYORA</option>
                      <option value="BANK BRI">BANK BRI</option>
                      <option value="BANK BCA SYARIAH">BANK BCA SYARIAH</option>
                      <option value="BANK MUAMALAT INDONESIA">BANK MUAMALAT INDONESIA</option>
                      <option value="BANK OCBC NISP">BANK OCBC NISP</option>
                      <option value="BANK UOB">BANK UOB</option>
                      <option value="BANK PERMATA">BANK PERMATA</option>
                      <option value="BANK DANAMON">BANK DANAMON</option>
                      <option value="BANK BUKOPIN">BANK BUKOPIN</option>
                      <option value="BANK CIMB NIAGA">BANK CIMB NIAGA</option>
                      <option value="BANK SYARIAH INDONESIA">BANK SYARIAH INDONESIA</option>
                      <option value="BANK ARTHA GRAHA">BANK ARTHA GRAHA</option>
                      <option value="BANK ARTOS">BANK ARTOS</option>
                      <option value="BANK BJB">BANK BJB</option>
                      <option value="BANK BTPN">BANK BTPN</option>
                      <option value="BANK COMMONWEATLH">BANK COMMONWEATLH</option>
                      <option value="BANK DBS">BANK DBS</option>
                      <option value="BANK DKI">BANK DKI</option>
                      <option value="BANK HSBC">BANK HSBC</option>
                      <option value="BANK JATIM">BANK JATIM</option>
                      <option value="BANK MAYBANK">BANK MAYBANK</option>
                      <option value="BANK MEGA">BANK MEGA</option>
                      <option value="BANK NAGARI">BANK NAGARI</option>
                      <option value="OVO">OVO</option>
                      <option value="GOPAY">GOPAY</option>
                      <option value="DANA">DANA</option>
                      <option value="LINKAJA">LINKAJA</option>
                      <option value="SAKUKU">SAKUKU</option>
                      <option value="SHOPEEPAY">SHOPEEPAY</option>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label>Nama Rekening</label>
                    <input type="text" name="full_name" class="form-control" autocomplete="off" pattern="[a-zA-Z\s]+" placeholder="Nama Pemilik Rekening" required>
                  </div>
                  <div class="form-group mb-3">
                    <label>No. Rekening</label>
                    <input type="tel" name="no_rek" class="form-control" autocomplete="off" pattern="[0-9]+" placeholder="Nomor Rekening Bank" required>
                  </div>
                  <div class="form-group mb-3">
                    <label>Kode Referral</label>
                    <input type="text" name="sponsor" class="form-control" autocomplete="off" placeholder="Username Anda" value="<?php if(isset($_GET['ref'])) { echo $_GET['ref']; } ?>" readonly>
                  </div>
                  <div class="form-group mb-3">
                    <label>Bagaimana Anda tahu tentang<br>situs web kami ?</label>
                    <select class="form-control" required>
                      <option value="">-- Pilih Sumber Informasi -- </option>
                      <option value="Facebook">Facebook</option>
                      <option value="Google">Google</option>
                      <option value="Teman">Teman</option>
                      <option value="Marketing">Marketing</option>
                      <option value="Telegram">Telegram</option>
                    </select>
                  </div>
                </div>
              </div>
              <button type="submit" name="submit" value="submit" class="btn btn-secondaries w-100 mt-3" style="height: 40px;">DAFTAR</button>
              <p class="text-center mt-3 mb-3">Sudah Punya Akun?</p>
              <a href="<?php echo $urlweb;?>/login/" class="btn btn-main w-100" style="height: 40px; line-height: 30px!important;">MASUK</a>
            </form>
          </div>
          <div class="col-sm-3"></div>
        </div>
      </div>
    </section>
    
    <!--Start footer-->
    <?php include('footer.php'); ?>
</body>
</html>

