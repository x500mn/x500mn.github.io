<?php
include('session.php');

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
            <div class="row">
              <div class="col p-1">
                <a class="btn btn-transaksi w-100 mb-1" href="<?php echo $urlweb; ?>/deposit/">Deposit</a>
              </div>
              <div class="col p-1">
                <a class="btn btn-transaksi active w-100 mb-1" href="<?php echo $urlweb; ?>/withdraw/">Withdraw</a>
              </div>
              <div class="col p-1">
                <a class="btn btn-transaksi w-100 mb-1" href="<?php echo $urlweb; ?>/history/">Transaksi</a>
              </div>
              <div class="col p-1">
                <a class="btn btn-transaksi w-100 mb-1" href="<?php echo $urlweb; ?>/bank/">Info Akun</a>
              </div>
            </div>
            <div class="form-tab-heading vertical-align-center">
              <div class="text-uppercase form-heading-subtab text-center active">
                01 formulir
              </div>
              <div class="text-uppercase form-heading-subtab text-center">
                02 konfirmasi
              </div>
              <div class="text-uppercase form-heading-subtab text-center">
                03 hasil
              </div>
            </div>
            <div class="card" style="background-color: #000;">
              <div class="card-body p-2">
                <?php
                  error_reporting(0);
                  $useridnya = $u['cuid'];
                  $cekTransaksi = mysqli_query($conn,"SELECT * FROM `tb_transaksi` WHERE userID = '$useridnya' AND jenis = 2 AND status = 0") or die(mysqli_error());
                  $ct = mysqli_num_rows($cekTransaksi);
                  if($ct > 0){
                    echo '
                      <div class="alert alert-success alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div class="alert-message">
                          <span>Anda masih memiliki Permintaan Penarikan yang Belum Diproses. Silahkan Tunggu Hingga Proses Penarikan Sebelumnya Selesai.</span>
                        </div>
                      </div>
                    ';
                  }
                  else {
                ?>
                <form role="form" class="mt-3 mb-4" action="<?php echo $urlweb; ?>/function/withdraw.php" method="POST">
                  <div class="form-group mb-3">
                    <label>Nominal Penarikan</label>
                    <input type="number" name="nominal" placeholder="Masukan Jumlah Penarikan" min="<?php echo $sad['min_depo']; ?>" max="999999999" class="form-control" value="">
                    <span style="font-size: 12px;">Minimal Penarikan Rp. <?php echo number_format($sad['min_wd']); ?></span>
                  </div>
                  <div class="form-group mb-3">
                    <label>Nomor Rekening Anda</label>
                    <select name="metode" id="metode" class="form-control" required>
                      <option value=""> Pilih </option>
                      <?php
                        $sql_bank = mysqli_query($conn,"SELECT * FROM `tb_rekening_deposit` WHERE userID = '$userID' ORDER BY cuid ASC") or die(mysqli_error());
                        $no=0;
                        while($sb = mysqli_fetch_array($sql_bank)){
                          $no++;
                      ?>
                      <option value="<?php echo $sb['cuid']; ?>">
                        <?php echo $sb['akun']; ?> - <?php echo $sb['no_rek']; ?> a/n <?php echo $sb['pemilik']; ?>
                      </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Passoword Anda">
                  </div>
                  <button type="submit" name="submit" value="submit" class="btn btn-secondaries w-100" style="height: 40px;">KONFIRMASI</button>
                </form>
                <?php
                  }
                  if (!empty($_GET['notif'])) {
                    if ($_GET['notif'] == 1) {
                      echo '
                        <div class="alert alert-success alert-dismissible mb-2" role="alert">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <div class="alert-message">
                            <span>Permintaan Penarikan Dana Berhasil! Proses Penarikan membutuhkan waktu 5 - 10 Menit.</span>
                          </div>
                        </div>
                      ';
                    }
                    if ($_GET['notif'] == 2) {
                      echo '
                        <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <div class="alert-message">
                            <span>Minimal Penarikan Rp. '.number_format($sad['min_wd']).'</span>
                          </div>
                        </div>
                      ';
                    }
                    if ($_GET['notif'] == 3) {
                      echo '
                        <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <div class="alert-message">
                            <span>Password Yang Anda Masukan Salah</span>
                          </div>
                        </div>
                      ';
                    }
                    if ($_GET['notif'] == 4) {
                      echo '
                        <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <div class="alert-message">
                            <span>Permintaan Penarikan Gagal! Nominal yang Anda Masukan Melebihi Saldo Anda.</span>
                          </div>
                        </div>
                      ';
                    }
                    if ($_GET['notif'] == 5) {
                      echo '
                        <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <div class="alert-message">
                            <span>Anda masih memiliki Permintaan Penarikan yang Belum Diproses. Silahkan Tunggu Hingga Proses Penarikan Sebelumnya Selesai.</span>
                          </div>
                        </div>
                      ';
                    }
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="col-sm-3"></div>
        </div>
      </div>
    </section>
    
    <!--Start footer-->
    <?php include('footer.php'); ?>
</body>
</html>

