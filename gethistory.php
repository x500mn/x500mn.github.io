<?php
include('config/koneksi.php');
$getProvider = mysqli_query($conn,"SELECT * FROM `tb_tripayapi` WHERE cuid = 3") or die(mysqli_error());
$gp = mysqli_fetch_array($getProvider);
$provider = $gp['provider'];
$urlRequest = $gp['urlRequest'];
$secureLogin = $gp['api_key'];
$secretKey = $gp['secret_key'];

$pid = 0;
$periode = 0;
$posisi = 'habanero';
$menang = 0;
$diskon = 0;
$status = 1;

$startDate = '20230501000000';
$endDate = date('YmdHis');

$kabupaten = mysqli_query($conn,"SELECT * FROM `tb_ppplayer` WHERE status = 1 AND provider = 'Habanero'") or die(mysqli_error($conn));
while($k = mysqli_fetch_array($kabupaten)){
	$userID = $k['userID'];
	$externalPlayerId = $k['externalPlayerId'];
	$playerID = $k['playerid'];

    $curl = curl_init();
        
    curl_setopt_array($curl, array(
        CURLOPT_URL => $urlRequest.'GetPlayerGameResults',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => '{
          "BrandId": "'.$secretKey.'", 
          "APIKey": "'.$secureLogin.'", 
          "Username": "'.$externalPlayerId.'",
          "DtStartUTC":"'.$startDate.'",
          "DtEndUTC":"'.$endDate.'"
        }',
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/x-www-form-urlencoded",
          "Cache-Control: no-cache"
        ),
    ));
                                        
    $response = curl_exec($curl);
    echo $response;
    curl_close($curl);
    $hasil = json_decode($response, true);
    
    for($i=0;$i<COUNT($hasil);$i++){
        $gameCode = $hasil[$i]['GameKeyName'];
        $gameName = $hasil[$i]['GameName'];
        $created = date('Y-m-d 00:00:00', strtotime($hasil[$i]['DtCompleted']));
        $nominal = $hasil[$i]['Stake'];
        $bayar = $hasil[$i]['Payout'];
        $jumlah = $hasil[$i]['BalanceAfter'];
        $tebak = $hasil[$i]['FriendlyGameInstanceId'];
        if($bayar < $nominal){
            $keterangan = 'Kalah';
        }
        else {
            $keterangan = 'Menang';
        }
        if($hasil[$i]['GameStateName'] == 'Completed'){
            $insertHistory = mysqli_query($conn,"INSERT INTO `tb_taruhan` (`userID`, `pid`, `gameid`, `code`, `periode`, `created_date`, `tebak`, `posisi`, `nominal`, `menang`, `diskon`, `bayar`, `jumlah`, `keterangan`, `status`) VALUES 
                ('$userID','$pid','$gameCode','$gameName','$periode','$created','$tebak','$posisi','$nominal','$menang','$diskon','$bayar','$jumlah','$keterangan',1)") or die(mysqli_error($conn));
            echo $created.' '.$nominal.' '.$bayar.' '.$jumlah.'<br>';
        }
    }
    
}
?>
