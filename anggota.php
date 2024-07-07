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
        <div class="card mb-3" style="background-color: #000;">
          <div class="card-body p-2 text-uppercase font-weight-bold">
            Referral
          </div>
        </div>

        <div class="row">
          <div class="col-sm-4">
            <img src="<?php echo $urlweb; ?>/upload/5806789.png" class="img-fluid" style="display: block; margin: 0 auto;">
          </div>
          <div class="col-sm-8">
            <p style="font-size: 18px;">Bagikan link referral ke teman anda dan ceritakan betapa menguntungkannya bermain judi disini!</p>
            <div class="input-group">
              <input type="text" class="form-control" value="<?php echo $urlweb; ?>/register/?ref=<?php echo $u['user']; ?>" style="height: 35px!important;" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-danger clip" onclick="copy_affiliate()" data-clipboard-text="<?php echo $urlweb; ?>/register/?ref=<?php echo $u['user']; ?>" style="border: 0!important;" id="button-addon2">
                  <i class="fa fa-copy"></i> Salin
                </button>
              </div>
            </div>
            <div class="text-white mt-3 mb-3 p-2 pt-4 pb-2" style="background-color: var(--mode-greydark);"">
              <div class="row">
                <div class="col-6 text-center">
                  <h5>Total Refferal</h5>
                  <p class="text-white"><?php echo $u['reff']; ?></p>
                </div>
                <div class="col-6 text-center">
                  <h5>Total Penghasilan</h5>
                  <p class="text-white">
                    <?php
                      $hitungKomisi = mysqli_query($conn,"SELECT SUM(total) as komisi FROM `tb_transaksi` WHERE userID = '$userID' AND jenis = 3 AND status = 1") or die(mysqli_error());
                      $hk = mysqli_fetch_array($hitungKomisi);
                      $komisi = $hk['komisi'] / 1000;
                      echo 'IDR '.round($komisi,2);
                    ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table default-datatable">
                <thead>
                  <tr style="background-color: var(--mode-greydark);">
                    <th class="text-center text-white" style="vertical-align: middle; font-size: 12px;">#</th>
                    <th class="text-center text-white" style="vertical-align: middle; font-size: 12px;">Tanggal Gabung</th>
                    <th class="text-center text-white" style="vertical-align: middle; font-size: 12px;">Nama Akun</th>
                    <th class="text-center text-white" style="vertical-align: middle; font-size: 12px;">Komisi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql_refferal = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE uplineID = '$userID' AND cuid != '$userID' ORDER BY cuid DESC") or die(mysqli_error());
                    $no = 0;
                    while($sr = mysqli_fetch_array($sql_refferal)){
                      $no++;
                      $reffID = $sr['cuid'];
                      $hitungKomisi1 = mysqli_query($conn,"SELECT SUM(total) as komisi FROM `tb_transaksi` WHERE userID = '$reffID' AND jenis = 3 AND status = 1") or die(mysqli_error());
                      $hk1 = mysqli_fetch_array($hitungKomisi1);
                      $komisi1 = $hk1['komisi'] / 1000;
                  ?>
                  <tr>
                    <td class="text-center text-white pt-1 pb-1" style="vertical-align: middle; white-space: nowrap; font-size: 12px;"><?php echo $no; ?></td>
                    <td class="text-center text-white pt-1 pb-1" style="vertical-align: middle; white-space: nowrap; font-size: 12px;"><?php echo date('Y-m-d', strtotime($sr['join_date'])); ?><br><?php echo date('H:i:s', strtotime($sr['join_date'])); ?></td>
                    <td class="text-center text-white pt-1 pb-1" style="vertical-align: middle; white-space: nowrap; font-size: 12px;"><?php echo $sr['user']; ?></td>
                    <td class="text-right text-white pt-1 pb-1" style="vertical-align: middle; white-space: nowrap; font-size: 12px; text-align: right;">
                      IDR <?php echo round($komisi1,2); ?>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--Start footer-->
    <?php include('footer.php'); ?>
    <script src="<?php echo $urlweb; ?>/assets/js/clipboard.min.js"></script>
    <script>
      var clipboard = new ClipboardJS('.clip');
      function copy_affiliate() {
        alert("Link Refferal berhasil di Copy");
      }
    </script>
</body>
</html>

