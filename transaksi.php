<?php
include('session.php');
$hari = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
$monthly = date('Y-m');
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
        <div class="card" style="background-color: #000;">
          <div class="card-body p-2 text-uppercase font-weight-bold">
            Data Pribadi
          </div>
        </div>
        <div class="form-tab-heading vertical-align-center">
          <a href="<?php echo $urlweb; ?>/transaksi/" class="text-uppercase form-heading-subtab text-center active">
            Sejarah Transaksi
          </a>
          <a href="<?php echo $urlweb; ?>/taruhan/" class="text-uppercase form-heading-subtab text-center">
            Sejarah Taruhan
          </a>
        </div>
        <div class="card" style="background-color: #000;">
          <div class="card-body p-2">
            <div class="table-responsive">
              <table class="table table-hover table-stripped default-datatable">
                <thead>
                  <tr style="background-color: var(--mode-greydark);">
                    <th class="text-center text-white" style="vertical-align: middle; font-size: 12px;">Tanggal</th>
                    <th class="text-center text-white" style="vertical-align: middle; font-size: 12px;">Transaksi</th>
                    <th class="text-center text-white" style="vertical-align: middle; font-size: 12px;">Jumlah</th>
                    <th class="text-center text-white" style="vertical-align: middle; font-size: 12px;">Catatan</th>
                    <th class="text-center text-white" style="vertical-align: middle; font-size: 12px;">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql_transaksi = mysqli_query($conn,"SELECT * FROM `tb_transaksi` WHERE `userID` = '$userID' AND jenis IN (1,2,3,4) AND `date` LIKE '$monthly%' AND status != 0 ORDER BY cuid DESC") or die(mysqli_error());
                    while($st = mysqli_fetch_array($sql_transaksi)){
                  ?>
                  <tr>
                    <td class="text-center text-white pt-1 pb-1" style="vertical-align: middle; white-space: nowrap; font-size: 12px;"><?php echo date('Y-m-d', strtotime($st['date'])); ?><br><?php echo date('H:i:s', strtotime($st['date'])); ?></td>
                    <td class="text-center text-white pt-1 pb-1" style="vertical-align: middle; white-space: nowrap; font-size: 12px;"><?php echo $st['transaksi']; ?></td>
                    <td class="text-right text-white pt-1 pb-1" style="vertical-align: middle; white-space: nowrap; font-size: 12px; text-align: right;">Rp. <?php echo number_format($st['total']); ?></td>
                    <td class="text-center text-white pt-1 pb-1" style="vertical-align: middle; white-space: nowrap; font-size: 12px;"><?php echo $st['note']; ?></td>
                    <td class="text-center text-white pt-1 pb-1" style="vertical-align: middle; white-space: nowrap; font-size: 12px;">
                      <?php
                        if($st['jenis'] == 1){
                          if($st['status'] == 0){
                            echo '
                              <a href="'.$urlweb.'/konfirmasi/?trxID='.$st['kd_transaksi'].'" class="badge badge-info w-100 p-2">Bayar</a>
                            ';
                          }
                          else if($st['status'] == 1){
                            echo '
                              <a href="#" class="badge badge-success w-100 p-2">Berhasil</a>
                            ';
                          }
                          else if($st['status'] == 2){
                            echo '
                              <a href="#" class="badge badge-danger w-100 p-2">Ditolak</a>
                            ';
                          }
                        }
                        else {
                          if($st['status'] == 0){
                            echo '
                              <a href="#" class="badge badge-info w-100 p-2">Menunggu</a>
                            ';
                          }
                          else if($st['status'] == 1){
                            echo '
                              <a href="#" class="badge badge-success w-100 p-2">Berhasil</a>
                            ';
                          }
                          else if($st['status'] == 2){
                            echo '
                              <a href="#" class="badge badge-danger w-100 p-2">Ditolak</a>
                            ';
                          }
                        }
                      ?>
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
</body>
</html>

