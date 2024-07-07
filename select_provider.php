<?php
ob_start();
session_start();
include('config/koneksi.php');
$sql_0 = mysqli_query($conn,"SELECT * FROM `tb_seo` WHERE cuid = 1") or die(mysqli_error());
$s0 = mysqli_fetch_array($sql_0);
$urlweb = $s0['urlweb'];

//error_reporting(0);
if($_GET['balanceFrom']){
  $balanceFrom = $_GET['balanceFrom'];
  $userid = $_GET['userid'];
  $getUser = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '$userid'") or die(mysqli_error());
  $gu = mysqli_fetch_array($getUser);
  $usersID = $gu['cuid'];
  $externalPlayerId = $gu['user'];
  if($balanceFrom == 'balanceWallet'){
    $kabupaten = mysqli_query($conn,"SELECT * FROM `tb_balance` WHERE userID = '$usersID'") or die(mysqli_error($conn));
    $kk = mysqli_fetch_array($kabupaten);
    $amount = $kk['active'];
  }
  else {
    $kabupaten = mysqli_query($conn,"SELECT * FROM `tb_balancegame` WHERE userID = '$userid' AND providerid = '$balanceFrom'") or die(mysqli_error($conn));
    $kkk = mysqli_num_rows($kabupaten);
    if($kkk == 0){
      $amount = 0;
    }
    else {
      if($balanceFrom == 'PragmaticPlay'){
            $sql_provider = mysqli_query($conn,"SELECT * FROM `tb_tripayapi` WHERE cuid = 1") or die(mysqli_error());
            $sp = mysqli_fetch_array($sql_provider);
            $urlRequest = $sp['urlRequest'];
            $secureLogin = $sp['api_key'];
            $secretKey = $sp['secret_key'];
            
            $params = 'externalPlayerId='.$externalPlayerId.'&secureLogin='.$secureLogin.$secretKey;
            $hashNeed = md5($params);
            $curl = curl_init();
                    
            curl_setopt_array($curl, array(
                CURLOPT_URL => $urlRequest.'/balance/current',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "secureLogin=".$secureLogin."&externalPlayerId=".$externalPlayerId."&hash=".$hashNeed,
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/x-www-form-urlencoded",
                    "Cache-Control: no-cache"
                ),
            ));
                                   
            $response = curl_exec($curl);
            //echo $response;
            curl_close($curl);
            $hasil = json_decode($response, true);
            $newSaldo = $hasil['balance'];
            $update = mysqli_query($conn,"UPDATE `tb_balancegame` SET amount = '$newSaldo' WHERE userID = '$externalPlayerId' AND providerid = 'PragmaticPlay'") or die(mysqli_error());
      }
      else {
          $newSaldo = 0;
      }
      $amount = $newSaldo;
    }
  }
}                    
?>
<input type="text" class="form-control" value="<?php echo number_format($amount); ?>" style="height: 50px; color: #fff!important;" disabled>