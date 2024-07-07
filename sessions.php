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

$sql_1 = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE cuid = 1") or die(mysqli_error());
$s1b = mysqli_fetch_array($sql_1);

if(isset($_SESSION['user'])){
    $user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '".$_SESSION['user']."'") or die (mysqli_error());
    $u = mysqli_fetch_array($user);
    $users = $u['user'];
    $id_user = $u['cuid'];
    $userID = $u['cuid'];
    $externalPlayerId = $u['extplayer'];
    $token_id = isset($u['token_id']) ? $u['token_id'] : false;
    $level = isset($u['level']) ? $u['level'] : false;
    
    $sql_3 = mysqli_query($conn,"SELECT * FROM `tb_saldo_member` WHERE userID = '$userID'") or die(mysqli_error());
    $s3 = mysqli_fetch_array($sql_3);
    $saldoMember = $s3['active']/1000;
}
else {
    $saldoMember = 0;
}

?>