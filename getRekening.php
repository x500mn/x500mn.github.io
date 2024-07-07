<?php
include('session.php');
error_reporting(0);
$userID = $u['cuid'];

error_reporting(0);
if($_GET['id']){
	$akunID = $_GET['id'];
	$getRekening = mysqli_query($conn,"SELECT * FROM `tb_rekening_deposit` WHERE cuid = '$akunID'") or die(mysqli_error());
	$gr = mysqli_fetch_array($getRekening);
?>
<div class="row">
  <div class="col-3">
    <div style="background: #fff; border-radius: 5px; padding: 2px 8px;">
      <img src="<?php echo $urlweb; ?>/upload/<?php echo $gr['image']; ?>" class="img-fluid">
    </div>
  </div>
  <div class="col-9">
    <p style="font-weight: 700!important; text-transform: uppercase"><?php echo $gr['pemilik']; ?><br>
    <?php echo $gr['no_rek']; ?>&nbsp;<span class="badge <?php if($gr['status'] == 0) { echo 'badge-danger'; } else { echo 'badge-success'; } ?>"><?php if($gr['status'] == 0) { echo 'Offline'; } else { echo 'Online'; } ?></span></p>
  </div>
</div>
<?php
}
?>