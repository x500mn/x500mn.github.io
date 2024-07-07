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
              <div class="text-uppercase form-heading-subtab text-center">
                01 formulir
              </div>
              <div class="text-uppercase form-heading-subtab text-center">
                02 konfirmasi
              </div>
              <div class="text-uppercase form-heading-subtab text-center active">
                03 hasil
              </div>
            </div>
            <?php
              if(isset($_GET['trxID'])){
                $trxID = $_GET['trxID'];
                $sql_2 = mysqli_query($conn,"SELECT * FROM `tb_transaksi` WHERE kd_transaksi = '$trxID'") or die(mysqli_error());
                $s2 = mysqli_fetch_array($sql_2);
                $metode = $s2['metode'];
                $getBank = mysqli_query($conn,"SELECT * FROM `tb_rekening_deposit` WHERE cuid = '$metode'") or die(mysqli_error());
                $gb = mysqli_fetch_array($getBank);
            ?>
            <div class="card" style="background-color: #000;">
              <div class="card-body p-2">
                <img src="<?php echo $urlweb; ?>/upload/ICN_Berhasil.png" class="mt-3" style="display: block; margin: 0 auto; width: 125px; height: 125px;">
                <h4 class="text-center mt-3">TRANSAKSI ANDA SEDANG DIPROSES</h4>
                <p class="text-center" style="font-size: 14px;">Customer service kami akan segera memproses transaksi anda</p>
                <div style="background-color: var(--mode-greydark); padding: 15px;">
                  <table class="table">
                    <tr>
                      <td class="text-white" style="font-size: 14px; font-weight: 700; border-top: 0; border-bottom: 1px solid #fff;">Bank Tujuan</td>
                      <td class="text-white" class="text-right" style="font-size: 14px; font-weight: 700; text-align: right; border-top: 0; border-bottom: 1px solid #fff;"><?php echo $gb['akun']; ?></td>
                    </tr>
                    <tr>
                      <td class="text-white" style="white-space: nowrap; font-size: 14px; font-weight: 700; width: 30%; border-top: 0; border-bottom: 1px solid #fff;">Rekening Tujuan</td>
                      <td class="text-white" class="text-right" style="font-size: 14px; font-weight: 700; text-align: right; border-top: 0; border-bottom: 1px solid #fff;">
                        <?php echo $gb['pemilik']; ?><br>
                        <?php echo $gb['no_rek']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-white" style="font-size: 14px; font-weight: 700; width: 30%; border-top: 0; border-bottom: 1px solid #fff;">Jumlah</td>
                      <td class="text-white" class="text-right" style="font-size: 14px; font-weight: 700; text-align: right; border-top: 0; border-bottom: 1px solid #fff;">Rp. <?php echo number_format($s2['total']); ?></td>
                    </tr>
                    <tr>
                      <td class="text-white" style="font-size: 14px; font-weight: 700; border-top: 0; border-bottom: 1px solid #fff;">No. Transaksi</td>
                      <td class="text-white" class="text-right" style="font-size: 14px; font-weight: 700; text-align: right; border-top: 0; border-bottom: 1px solid #fff;"><?php echo $_GET['trxID']; ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <a href="<?php echo $urlweb;?>/dashboard/" class="btn btn-secondaries w-100 mt-4 mb-3" style="height: 40px; line-height: 30px!important;">SELESAI</a>
            <?php
              }
              else {
                header('location:'.$urlweb.'/deposit/');
                exit();
              }
            ?>
          </div>
          <div class="col-sm-3"></div>
        </div>
      </div>
    </section>
    
    <!--Start footer-->
    <?php include('footer.php'); ?>
    <script>
      $(document).ready(function (){
        $("#metode").change(function (){
          url = "<?php echo $urlweb; ?>/getRekening.php?id="+$(this).val();
          $('#boxDeposit').load(url);
          //console.log(url);
          return false;
        });
      });
    </script>
</body>
</html>

