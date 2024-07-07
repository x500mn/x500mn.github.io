<?php
include('sessions.php');
error_reporting(0);
$userID = $u['cuid'];

$getLastBalance = mysqli_query($conn,"SELECT * FROM `tb_balance` WHERE userID = '$userID'") or die(mysqli_error());
$glb = mysqli_fetch_array($getLastBalance);
?>
			<tbody>
                <tr>
                  <td style="border-top: 0; vertical-align: middle; color: #fff;">
                    <strong>Dompet Utama</strong>
                  </td>
                  <td class="text-right" style="border-top: 0; vertical-align: middle; color: #e4d00a;">
                    IDR <?php echo number_format($glb['active']); ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" style="border-top: 0; color: #fff;">
                    <strong>Provider</strong>
                  </td>
                </tr>
                <?php
                  $getProvider = mysqli_query($conn,"SELECT * FROM `tb_tripayapi` ORDER BY cuid ASC") or die(mysqli_error());
                  while($gp = mysqli_fetch_array($getProvider)){
                    $provider = $gp['provider'];
                    $urlRequest = $gp['urlRequest'];
                    $secureLogin = $gp['api_key'];
                    $secretKey = $gp['secret_key'];
                ?>
                <tr>
                  <td style="border-top: 0; vertical-align: middle; padding-top: 5px;  padding-bottom: 5px; color: #fff;">
                    <?php echo $gp['provider']; ?><br>
                    <a href="<?php echo $urlweb; ?>/function/tarik-<?php echo $gp['provider']; ?>.php" class="text-warning">Tarik Saldo</a>
                  </td>
                  <td class="text-right" style="border-top: 0; vertical-align: middle; padding-top: 5px;  padding-bottom: 5px; color: #e4d00a;">
                    <?php
                      $kabupaten = mysqli_query($conn,"SELECT * FROM `tb_ppplayer` WHERE userID = '$userID' AND provider = '$provider'") or die(mysqli_error($conn));
                      $kkk = mysqli_fetch_array($kabupaten);
                      echo 'Rp. '.number_format($kkk['balance']);
                    ?>
                  </td>
                </tr>
                <?php } ?>
            </tbody>