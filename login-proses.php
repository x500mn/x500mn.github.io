<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include('config/koneksi.php');

$last_login = date('Y-m-d H:i:s');
$usere = mysqli_real_escape_string($conn,$_POST['user']);
$user = strtolower($usere);
$pass = mysqli_real_escape_string($conn,$_POST['pass']);
if (empty($user) && empty($pass)) {
    header('location:../login/?notif=1');
    exit;
} else if (empty($user)) {
    header('location:../login/?notif=1');
    exit;
} else if (empty($pass)) {
    header('location:../login/?notif=1');
    exit;
}
$apa = date('H:s');
$auths = $user.$pass.$apa;
$tokenAuths = md5($auths);
$tokenAuth = strtolower($tokenAuths);

$q = mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '$user'") or die(mysqli_error($conn));
if (mysqli_num_rows($q) > 0) {
	$user_data = mysqli_fetch_array($q,MYSQLI_ASSOC);
	$token = insertToken($user_data['cuid']);
	$statusnya = $user_data['status'];
	if($statusnya == 1){
		$password = $user_data['pass'];
		if(password_verify($pass,$password)){
			$userID = $user_data['cuid'];
			$level = $user_data['level'];
			$extplayer = $user_data['extplayer'];
			$_SESSION['user'] = $user;
			$_SESSION['token'] = $token;

			$update = mysqli_query($conn,"UPDATE `tb_user` SET last_login = '$last_login' WHERE user = '".$_SESSION['user']."'") or die(mysqli_error());
			$postArray = [
			        'method' => 'user_create',
                    'agent_code' => $agentCode, 
                    'agent_token' => $agentToken,
                    'user_code' => $extplayer
                ];
                            
                $jsonData = json_encode($postArray);

            	$ch1 = curl_init();
            	curl_setopt($ch1, CURLOPT_URL, $urlRequest . "user/create");
            	curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            	curl_setopt($ch1, CURLOPT_POSTFIELDS, $jsonData);                                                                  
            	curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);                                                                      
            	curl_setopt($ch1, CURLOPT_HTTPHEADER, array(                                                                          
            	    'Content-Type: application/json'                                                                       
            	));   
            	curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
            	//execute post
            	$response1 = curl_exec($ch1);
                //echo $response1;
            	curl_close($ch1);
            	$hasil = json_decode($response1,true);
            	
			$cekProvider = mysqli_query($conn,"SELECT * FROM `tb_tripayapi` WHERE cuid = 4") or die(mysqli_error());
			$cpr = mysqli_fetch_array($cekProvider);
			if($cpr['status'] == 1){
			    $cekPlayer = mysqli_query($conn,"SELECT * FROM `tb_ppplayer` WHERE userID = '".$userID."' AND provider = 'PGSoft'") or die(mysqli_error());
			    $cpl = mysqli_num_rows($cekPlayer);
			    if($cpl == 0){
			        $sql_provider = mysqli_query($conn,"SELECT * FROM `tb_tripayapi` WHERE cuid = 4") or die(mysqli_error());
        		    $sp = mysqli_fetch_array($sql_provider);
        		    $urlRequest = $sp['urlRequest'];
			        $secureLogin = $sp['api_key']; //apikey
			        $secretKey = $sp['secret_key']; //brandID
			        
			        function getGUID(){
					    if (function_exists('com_create_guid')){
					        return com_create_guid();
					    }else{
					        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
					        $charid = strtoupper(md5(uniqid(rand(), true)));
					        $hyphen = chr(45);// "-"
					        $uuid = 
					            substr($charid, 0, 8).$hyphen
					            .substr($charid, 8, 4).$hyphen
					            .substr($charid,12, 4).$hyphen
					            .substr($charid,16, 4).$hyphen
					            .substr($charid,20,12);
					                
					        return $uuid;
					    }
					}
					$guid = getGUID();
			        $curl = curl_init();
				                   
					curl_setopt_array($curl, array(
					    CURLOPT_URL => $urlRequest.'external/v3/Player/Create?trace_id='.$guid,
					    CURLOPT_RETURNTRANSFER => true,
					    CURLOPT_ENCODING => "",
					    CURLOPT_MAXREDIRS => 10,
					    CURLOPT_TIMEOUT => 0,
					    CURLOPT_FOLLOWLOCATION => true,
					    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					    CURLOPT_CUSTOMREQUEST => "POST",
					    CURLOPT_POSTFIELDS => "operator_token=".$secureLogin."&secret_key=".$secretKey."&player_name=".$extplayer."&currency=IDR&nickname=".$extplayer."",
					    CURLOPT_HTTPHEADER => array(
					        "Content-Type: application/x-www-form-urlencoded",
					        "Cache-Control: no-cache"
					    ),
					));
						                    
					$response = curl_exec($curl);
					echo $response;
					curl_close($curl);
					$hasil = json_decode($response, true);
			        $inserPlayer = mysqli_query($conn,"INSERT INTO `tb_ppplayer` (`userID`, `externalPlayerId`, `playerid`, `token`, `provider`, `balance`, `status`) VALUES ('$userID','$extplayer','', '$tokenAuth','PGSoft',0,0)") or die(mysqli_error());
			        $cekPlayer = mysqli_query($conn,"SELECT * FROM `tb_playerapi` WHERE `extplayer` = '$extplayer'") or die(mysqli_error());
                    $cpp = mysqli_num_rows($cekPlayer);
                    if($cpp == 0){
                        $insert = mysqli_query($conn,"INSERT INTO `tb_playerapi` (`extplayer`, `ops`, `status`) VALUES ('$extplayer','$tokenAuth',1)") or die(mysqli_error());
                    }
                    else {
                        $insert = mysqli_query($conn,"UPDATE `tb_playerapi` SET ops = '$tokenAuth' WHERE extplayer = '$extplayer'") or die(mysqli_error());
                    }
			    }
			    else {
			        $updates = mysqli_query($conn,"UPDATE `tb_ppplayer` SET token = '$tokenAuth' WHERE userID = '".$userID."' AND provider = 'PGSoft'") or die(mysqli_error());
			        $cekPlayer = mysqli_query($conn,"SELECT * FROM `tb_playerapi` WHERE `extplayer` = '$extplayer'") or die(mysqli_error());
                    $cpp = mysqli_num_rows($cekPlayer);
                    if($cpp == 0){
                        $insert = mysqli_query($conn,"INSERT INTO `tb_playerapi` (`extplayer`, `ops`, `status`) VALUES ('$extplayer','$tokenAuth',1)") or die(mysqli_error());
                    }
                    else {
                        $insert = mysqli_query($conn,"UPDATE `tb_playerapi` SET ops = '$tokenAuth' WHERE extplayer = '$extplayer'") or die(mysqli_error());
                    }
			    }
			}
			

			

			header('location:../');
		}
		else {
			$_SESSION['user'] == '';
			unset($_SESSION['user']);
			session_destroy();
			header('location:../login/?notif=3');
	    	exit;
		}
	}
	else {
		$_SESSION['user'] == '';
		unset($_SESSION['user']);
		session_destroy();
		header('location:../login/?notif=3');
	    exit;
	}
} else {
    header('location:../login/?notif=3');
}

function insertToken($user_id = 0){
    $conn = $GLOBALS['conn'];
	if(empty($user_id) && $user_id === 0){
		return false;
	}

	$token = generateToken();
	$sql_insert_token = "INSERT INTO tb_token (token) VALUES ('$token')";
	$query_insert_token = mysqli_query($conn,$sql_insert_token) or die(mysqli_error($conn));
    $token_id = mysqli_insert_id($conn);

	// update table user
	$sql_update_user = "UPDATE tb_user SET token_id = $token_id WHERE cuid = $user_id;";
	$query_update_user = mysqli_query($conn,$sql_update_user) or die(mysqli_error($conn));
	return $token;
}

function generateToken(){
	$length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

	$token = md5(microtime(true).$characters);
	return $token;
}

?>