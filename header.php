      <div class="topMenu">
        <div class="topbar-container d-none d-sm-block">
          <div class="container">
            <div class="row">
              <div class="col-6" style="padding: 0;">
                
              </div>
              <div class="col-6" style="padding: 0;">
                <?php
                  error_reporting(0);
                  if(isset($_SESSION['user'])){
                    $user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '".$_SESSION['user']."'") or die (mysqli_error());
                    $u = mysqli_fetch_array($user);
                    $userID = $u['cuid'];

                    $sql_balance = mysqli_query($conn,"SELECT * FROM `tb_saldo_member` WHERE userID = '$userID'") or die(mysqli_error());
                    $sb = mysqli_fetch_array($sql_balance);
                    $saldoMember = $sb['active']/1000;
                ?>
                <form class="form-inline justify-content-end mt-2" action="#">
                  <a href="#" class="mr-3 text-right" style="font-size: 14px;">
                    <?php echo $_SESSION['user']; ?>
                  </a>
                  <a href="#" class="mr-3 text-right" style="font-size: 14px;">
                    <span class="balance">Rp. <?php echo number_format($saldoMember, 2); ?></span>
                  </a>
                  <a href="#" class="mr-3" style="background: none; border: 0;"><i class="fa fa-refresh"></i></a>
                  <a href="<?php echo $urlweb; ?>/account/" class="mr-2" data-toggle="tooltip" data-placement="bottom" title="Account">
                    <img src="<?php echo $urlweb; ?>/upload/profile.png" style="width: 25px; height: 25px;">
                  </a>
                  <a href="<?php echo $urlweb; ?>/deposit/" class="mr-2" data-toggle="tooltip" data-placement="bottom" title="Deposit">
                    <img src="<?php echo $urlweb; ?>/upload/bank-account.png" style="width: 25px; height: 25px;">
                  </a>
                  <a href="<?php echo $urlweb; ?>/history/" class="mr-2" data-toggle="tooltip" data-placement="bottom" title="Transaction">
                    <img src="<?php echo $urlweb; ?>/upload/redemption-store.png" style="width: 25px; height: 25px;">
                  </a>
                  <a href="<?php echo $urlweb; ?>/promo/" class="mr-2" data-toggle="tooltip" data-placement="bottom" title="Promotion">
                    <img src="<?php echo $urlweb; ?>/upload/bonus.png" style="width: 25px; height: 25px;">
                  </a>
                  <a href="#" class="mr-2" data-toggle="tooltip" data-placement="bottom" title="Inbox">
                    <img src="<?php echo $urlweb; ?>/upload/notification.png" style="width: 25px; height: 25px;">
                  </a>
                  <a href="#" class="mr-2" style="background: none; border: 0;"><i class="fa fa-bell"></i></a>
                  <a href="#" class="btn btn-danger mr-2" style="border: 0;"><i class="fa fa-sign-out"></i> Logout</a>
                </form>
                <?php } else { ?>
                <form class="form-inline justify-content-end" action="<?php echo $urlweb; ?>/login-proses/" method="POST">
                  <div class="input-group mr-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: none; border: none; color: #fff;" id="basic-addon1"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" name="user" class="form-control ml-2 mr-2" pattern="[a-zA-Z0-9]+" placeholder="Username" title="Username Tidak Valid" style="width: 135px;" required>
                  </div>
                  <div class="input-group mr-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: none; border: none; color: #fff;" id="basic-addon1"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="password" name="pass" class="form-control mr-2" pattern="[a-z0-9A-Z]{8}+" placeholder="Password" title="Password Hanya Masukan Huruf dan Angka" style="width: 135px;" required>
                  </div>
                  <button type="submit" class="btn btn-main mr-2">LOGIN</button>
                  <button type="button" onclick="location.href='<?php echo $urlweb; ?>/register/'" class="btn btn-secondaries">REGISTER</button>
                </form>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="topbar-container d-block d-sm-none">
          <div class="container">
            <div class="row">
              <?php
                error_reporting(0);
                if(isset($_SESSION['user'])){
                  $user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '".$_SESSION['user']."'") or die (mysqli_error());
                  $u = mysqli_fetch_array($user);
                  $userID = $u['cuid'];
                  $sql_balance = mysqli_query($conn,"SELECT * FROM `tb_saldo_member` WHERE userID = '$userID'") or die(mysqli_error());
                  $sb = mysqli_fetch_array($sql_balance);
              ?>
              <div class="col-6">
                <a href="<?php echo $urlweb; ?>">
                  <img src="<?php echo $urlwebs; ?>/upload/<?php echo $s0['image']; ?>" style="width: auto; max-height: 35px; color: #fff!important;" alt="logo icon">
                </a>
              </div>
              <div class="col-6">

                <span class="float-right" type="button" id="openBtn" href="javascript:void();" onclick="openNav();" style="font-size: 20px; color: #fff;">
                  <strong><i class="fa fa-bars"></i></strong>
                </span>
              </div>
              <?php } else { ?>
              <div class="col-6">
                <a href="<?php echo $urlweb; ?>">
                  <img src="<?php echo $urlwebs; ?>/upload/<?php echo $s0['image']; ?>" style="width: auto; max-height: 35px; color: #fff!important;" alt="logo icon">
                </a>
              </div>
              <div class="col-6">
                <span class="float-right" type="button" id="openBtn" href="javascript:void();" onclick="openNav();" style="font-size: 20px; color: #fff;">
                  <strong><i class="fa fa-bars"></i></strong>
                </span>
              </div>
              <?php } ?>
            </div>
          </div>
          <div data-section="announcements">
            <marquee class="text-white">
              <?php echo $s0['news']; ?>
            </marquee>
          </div>
        </div>

        <div class="topNav d-none d-sm-block">
          <div class="container">
            <div class="row">
              <div class="col-3">
                <a href="<?php echo $urlweb; ?>">
                  <img src="<?php echo $urlwebs; ?>/upload/<?php echo $s0['image']; ?>" style="display: block; margin: 0 auto; width: auto; max-height: 80px; color: #fff!important; margin-top: 10px;" alt="logo icon">
                </a>
              </div>
              <div class="col-9">
                <ul class="nav top-menu" style="--image-src: url(https://nx-cdn.nexus2wl.xyz/Images/nexus-alpha/dark-gold/desktop/layout/category-sprite.png?v=20240525-1); --separator-src: url(https://nx-cdn.nexus2wl.xyz/Images/nexus-alpha/dark-gold/desktop/layout/vertical-seperator.png?v=20240525-1);">
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $urlweb; ?>/hot/">
                      <i data-icon="hot-games"></i>Hot Games
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $urlweb; ?>/slot/">
                      <i data-icon="slots"></i>Slots
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $urlweb; ?>/casino/">
                      <i data-icon="casino"></i>Live Casino
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $urlweb; ?>/lotto/">
                      <i data-icon="others"></i>Lottery
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $urlweb; ?>/sport/">
                      <i data-icon="sports"></i>Sports
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $urlweb; ?>/fishing/">
                      <i data-icon="crash-game"></i>Crash Game
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $urlweb; ?>/arcade/">
                      <i data-icon="arcade"></i>Arcade
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $urlweb; ?>/poker/">
                      <i data-icon="poker"></i>Poker
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $urlweb; ?>/esport/">
                      <i data-icon="e-sports"></i>E-Sports
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo $urlweb; ?>/promo/">
                      <i data-icon="promotion"></i>Promotion
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="mySidenav" class="sidenav">
        <div class="sidenavTop">
          <div class="row">
            <div class="col-9">
              
            </div>
            <div class="col-3 text-right">
              <button class="closebtn" id="closeBtn" style="background: #1a0924; border: 1px solid #000; width: 45px; height: 45px; padding: 0!important; margin: 0!important; color: #fff; line-height: 25px; font-size: 22px;" onclick="closeNav()">
                <i class="fa fa-close"></i>
              </button>
            </div>
          </div>
          <div class="sidebarMenuLeft">
            <?php
                  error_reporting(0);
                  if(isset($_SESSION['user'])){
                    $user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '".$_SESSION['user']."'") or die (mysqli_error());
                    $u = mysqli_fetch_array($user);
                    $userID = $u['cuid'];

                    $sql_balance = mysqli_query($conn,"SELECT * FROM `tb_saldo_member` WHERE userID = '$userID'") or die(mysqli_error());
                    $sb = mysqli_fetch_array($sql_balance);
                    $saldoMember = $sb['active']/1000;
                ?>
                <form action="<?php echo $urlweb; ?>/login-proses/" method="POST">
                  <div class="input-group p-2">
                    <div class="input-group-prepend" style="font-size: 16px;">
                      IDR<span class="balance text-success"><?php echo number_format($saldoMember, 2); ?></span>
                    </div>
                  </div>
                  <div class="input-group p-2 mb-3">
                    <div class="input-group-prepend" style="font-size: 16px;">
                      0
                    </div>
                  </div>
                  <div class="user-menu">
                    <div class="user-menu-item">
                      <a href="<?php echo $urlweb; ?>/deposit/">
                        <img loading="lazy" src="https://nx-cdn.nexus2wl.xyz/Images/nexus-alpha/dark-gold/mobile/tabs/deposit.svg?v=20240526-1">DEPOSIT
                      </a>
                    </div>
                    <div class="user-menu-item">
                      <a href="<?php echo $urlweb; ?>/deposit/">
                        <img loading="lazy" src="https://nx-cdn.nexus2wl.xyz/Images/nexus-alpha/dark-gold/mobile/tabs/withdrawal.svg?v=20240526-1">WITHDRAWAL
                      </a>
                    </div>
                    <div class="user-menu-item">
                      <a href="<?php echo $urlweb; ?>/deposit/">
                        <img loading="lazy" src="https://nx-cdn.nexus2wl.xyz/Images/nexus-alpha/dark-gold/mobile/tabs/redemption-store.svg?v=20240526-1">HISTORY
                      </a>
                    </div>
                  </div>
                </form>
                <?php } else { ?>
                <form action="<?php echo $urlweb; ?>/login-proses/" method="POST">
                  <div class="input-group mr-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: none; border: none; color: #fff;" id="basic-addon1"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" name="user" class="form-control" pattern="[a-zA-Z0-9]+" placeholder="Username" title="Username Tidak Valid" style="width: 135px;" required>
                  </div>
                  <div class="input-group mr-2 mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="background: none; border: none; color: #fff;" id="basic-addon1"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="password" name="pass" class="form-control" pattern="[a-z0-9A-Z]{8}+" placeholder="Password" title="Password Hanya Masukan Huruf dan Angka" style="width: 135px;" required>
                  </div>
                  <div class="row">
                    <div class="col-6 pr-1"><button type="submit" class="btn btn-main w-100">LOGIN</button></div>
                    <div class="col-6 pl-1"><button type="button" onclick="location.href='<?php echo $urlweb; ?>/register/'" class="btn btn-secondaries w-100">REGISTER</button></div>
                  </div>
                </form>
                <?php } ?>
          </div>
        </div>

        <div class="sidenavBottom">
          <div class="side_navigation mb-3">
            <ul class="nav flex-column">
              <?php if(isset($_SESSION['user'])){ ?>
              <li class="nav-item">
                <a href="<?php echo $urlweb; ?>/profil/" class="nav-link">
                  Profile
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $urlweb; ?>/history/" class="nav-link">
                  Transaksi
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $urlweb; ?>/transaksi/" class="nav-link">
                  Laporan Transaksi
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="<?php echo $urlweb; ?>/refferal/" class="nav-link">
                  Referral
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Tentang Kami
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  FAQ
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Syarat & Ketentuan
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  Hubungi Kami
                </a>
              </li>
              <?php if(isset($_SESSION['user'])){ ?>
              <li class="nav-item">
                <a href="<?php echo $urlweb; ?>/logout/" class="nav-link">
                  Logout
                </a>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        </div>
      </div>

<?php
error_reporting(0);
if($s0['onoff'] == 1){
    header('location:'.$urlweb.'/mtweb/');
}
if(isset($_SESSION['user'])){
    $user =mysqli_query($conn,"SELECT * FROM `tb_user` WHERE user = '".$_SESSION['user']."'") or die (mysqli_error());
    $u = mysqli_fetch_array($user);
    $users = $u['user'];
    if($u['level'] == 'user'){
        $usersID = $u['cuid'];
        $usernames = $u['extplayer'];
        
        $getBalance = mysqli_query($conn,"SELECT * FROM `tb_saldo_member` WHERE userID = '$usersID'") or die(mysqli_error());
        $gb = mysqli_fetch_array($getBalance);
                
        $getTransaksi = mysqli_query($conn,"SELECT * FROM `tb_transaksi` WHERE userID = '$usersID' AND jenis = 5 AND status = 0 ORDER BY cuid DESC LIMIT 1") or die(mysqli_error($conn));
        $gt = mysqli_fetch_array($getTransaksi);
      	$transaksiID = $gt['cuid'];
        $providerID = $gt['providerID'];
        $gameID = $gt['gameid'];
        $getGame = mysqli_query($conn,"SELECT * FROM `tb_tripayapi` WHERE cuid = '$providerID'") or die(mysqli_error());
        $gg = mysqli_fetch_array($getGame);
        $providerCode = $gg['providerCode'];
        $providerName = $gg['providerName'];
        $catatan = $providerName.' Transfer Back ';
      
        $postAgent = [
          	'method' => 'money_info',
            'agent_code' => $agentCode, 
            'agent_token' => $agentToken,
            'user_code' => $usernames,
        ];
        $jsonAgent = json_encode($postAgent);

        $urlAgent = $urlRequest;
        $chAgent = curl_init();
        curl_setopt($chAgent, CURLOPT_URL, $urlAgent . "user/balance"); 
        curl_setopt($chAgent, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($chAgent, CURLOPT_POSTFIELDS, $jsonAgent);                                                                  
        curl_setopt($chAgent, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($chAgent, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json'                                                                       
        ));   
        curl_setopt($chAgent, CURLOPT_SSL_VERIFYPEER, FALSE);

        //execute post
        $responseAgent = curl_exec($chAgent);
        //echo $responseAgent;
        curl_close($chAgent);
        $hasilAgent = json_decode($responseAgent, true);
      
        $balanceMember = $hasilAgent['user']['balance'];
      	
        if($balanceMember > 0){
          
            $kode_unik = substr(str_shuffle(1234567890),0,3);
            $kd_transaksi = date('Ymds').$kode_unik.$usersID;
            $created_date = date('Y-m-d H:i:s');
            if($gt['status'] == 0){
                if($gb['active'] == 0){
                    $insert_transaksi = mysqli_query($conn,"INSERT INTO `tb_transaksi` (`kd_transaksi`, `date`, `transaksi`, `total`, `saldo`, `note`, `gameid`, `providerID`, `jenis`, `metode`, `pay_from`, `userID`, `status`) VALUES ('$kd_transaksi','$created_date','Transfer','$balanceMember',0, '$catatan', '', '$providerID','6','0','$providerID','$usersID',1)") or die(mysqli_error($conn));
                    $updateBalance = mysqli_query($conn,"UPDATE `tb_saldo_member` SET `active` = '$balanceMember' WHERE userID = '$usersID'") or die(mysqli_error($conn));
                    $updateTransaksi = mysqli_query($conn,"UPDATE `tb_transaksi` SET `status` = 1 WHERE cuid = '$transaksiID'") or die(mysqli_error($conn));
            }
          }
        }       
    }
}
?>