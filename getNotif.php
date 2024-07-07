<?php
date_default_timezone_set("Asia/Jakarta");
include('config/koneksi.php');
$getOrder = mysqli_query($conn,"SELECT * FROM `tb_withdraw` ORDER BY rand() DESC LIMIT 1") or die(mysqli_error());
$go = mysqli_fetch_array($getOrder);
$userID = $go['user'];
$noHp = substr($userID, 0, -4) . 'xxx';
$data = array(
            'message' =>  $noHp.' Telah Berhasil Withdraw Sebesar Rp. '.number_format($go['amount']),
        );
 echo json_encode($data);
?>
