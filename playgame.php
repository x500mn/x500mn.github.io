<?php
require_once('session.php');
include('config/connectAPI.php');
error_reporting(0);
$ipaddress = $_SERVER['REMOTE_ADDR'];
$usersID = $u['cuid'];
$usernames = $u['extplayer'];
$balanceMember = $s3['active'];

$provider = $_GET['slug'];
$gameide = $_GET['gameid'];

$kode_unik = substr(str_shuffle(1234567890),0,3);
$kd_transaksi = date('Ymds').$kode_unik.$usersID;
$requestID = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz123456789'),0,8);
$created_date = date('Y-m-d H:i:s');

$cekGame = mysqli_query($conn,"SELECT * FROM `tb_gamelist` WHERE `gameid` = '$gameide' AND `provider` = '$provider'") or die(mysqli_error());
$cek = mysqli_fetch_array($cekGame);
$gameType = $cek['datatype'];
$jenisnya = $cek['category'];
$getProvider = mysqli_query($conn,"SELECT * FROM `tb_tripayapi` WHERE `provider` = '$provider'") or die(mysqli_error());
$gp = mysqli_fetch_array($getProvider);
$providerID = $gp['cuid'];
$providerCode = $gp['providerCode'];
$gameID = $gameide;
echo $providerCode.' '.$code;
if($gameType == 'SL'){
    $urlBack = $urlweb.'/slot/';
}
else if($gameType == 'EGames'){
    $urlBack = $urlweb.'/arcade/';
}
else if($gameType == 'Arcade'){
    $urlBack = $urlweb.'/arcade/';
}
else if($gameType == 'FH'){
    $urlBack = $urlweb.'/fishing/';
}
else if($gameType == 'LC'){
    $urlBack = $urlweb.'/casino/';
}
else if($gameType == 'SB'){
    $urlBack = $urlweb.'/sport/';
}
else {
    $urlBack = $urlweb.'/';
}
echo $balanceMember;
$postArray = [
    'method' => 'game_launch',
    'agent_code' => $agentCode, 
    'agent_token' => $agentToken,
    'user_code' => $usernames,
    'provider_code' => $providerCode,
    'game_code' => $gameID,
    'lang' => 'en'
];

// var_dump($postArray);
                     
$jsonData = json_encode($postArray);

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $urlRequest . "game/launch"); 
curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch1, CURLOPT_POSTFIELDS, $jsonData);                                                                  
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch1, CURLOPT_HTTPHEADER, array(                                                                          
'Content-Type: application/json'                                                                       
));   
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
                
//execute post
$response1 = curl_exec($ch1);
echo $response1;
curl_close($ch1);
$hasil = json_decode($response1,true);
if($hasil['status'] == 1){
    $playUrl = $hasil['launch_url'];
    
        $catatan = 'Transfer To '.$provider;
        $insert_transaksi = mysqli_query($conn,"INSERT INTO `tb_transaksi` (`kd_transaksi`, `date`, `transaksi`, `total`, `saldo`, `note`, `gameid`, `providerID`, `jenis`, `metode`, `pay_from`, `userID`, `status`) VALUES ('$kd_transaksi', '$created_date', 'Transfer', '$balanceMember', 0, '$catatan', '$gameID', '$providerID', 5, 0, 0,'$usersID', 0)") or die(mysqli_error());
        $updateBalance = mysqli_query($conn,"UPDATE `tb_saldo_member` SET `active` = active - '$balanceMember', `transfer` = transfer + '$balanceMember' WHERE userID = '$usersID'") or die(mysqli_error());
        
        header('location:'.$playUrl);
        exit();
}
else {
    // var_dump($response1);
    header('Location:'.$urlBack);
    exit();
}
?>