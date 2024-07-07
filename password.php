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
            <div class="card" style="background-color: #000;">
              <div class="card-body p-2 text-uppercase font-weight-bold">
                Data Pribadi
              </div>
            </div>
            <div class="form-tab-heading vertical-align-center">
              <a href="<?php echo $urlweb; ?>/profil/" class="text-uppercase form-heading-subtab text-center">
                Profile Saya
              </a>
              <a href="<?php echo $urlweb; ?>/password/" class="text-uppercase form-heading-subtab text-center active">
                Ganti Password
              </a>
              <a href="<?php echo $urlweb; ?>/bank/" class="text-uppercase form-heading-subtab text-center">
                Akun Bank
              </a>
            </div>
            <div class="card" style="background-color: #000;">
              <div class="card-body p-2">
                <form role="form" class="mt-3 mb-4" action="<?php echo $urlweb; ?>/function/password.php" method="POST">
                  <div class="form-group mb-3">
                    <label>Password Baru</label>
                    <input type="password" class="form-control" name="pass" pattern="[a-z0-9A-Z]{8}+" title="Kombinasi Huruf dan Angka, Minimal 8 Karakter" required>
                  </div>
                  <div class="form-group mb-3">
                    <label>Ulangi Password Baru</label>
                    <input type="password" class="form-control" name="repass" pattern="[a-z0-9A-Z]{8}+" title="Kombinasi Huruf dan Angka, Minimal 8 Karakter" required>
                  </div>
                  <div class="form-group mb-3">
                    <label>Password Saat Ini</label>
                    <input type="password" class="form-control" name="old_pass" required>
                  </div>
                  <div id="boxDeposit"></div>
                  <button type="submit" name="submit" value="submit" class="btn btn-secondaries w-100" style="height: 40px;">GANTI PASSWORD</button>
                </form>
                <?php
                  error_reporting(0);
                  if (!empty($_GET['notif'])) {
                    if ($_GET['notif'] == 1) {
                      echo '
                        <div class="alert alert-success alert-dismissible" role="alert" style="font-size: 12px;">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <div class="alert-message">
                            <span><strong>Well done!</strong> Perubahan Password Disimpan!</span>
                          </div>
                        </div>
                      ';
                    }
                    if ($_GET['notif'] == 2) {
                      echo '
                        <div class="alert alert-warning alert-dismissible" role="alert" style="font-size: 12px;">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <div class="alert-message">
                            <span><strong>Warning!</strong> Password Yang Anda Masukan Salah!</span>
                          </div>
                        </div>
                      ';
                    }
                    if ($_GET['notif'] == 3) {
                      echo '
                        <div class="alert alert-warning alert-dismissible" role="alert" style="font-size: 12px;">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <div class="alert-message">
                            <span><strong>Warning!</strong> Password Yang Anda Masukan Tidak Sama!</span>
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

