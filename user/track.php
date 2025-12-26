<?php
include "../config/db.php";
include "../includes/header.php";
?>

<h4>Track Your Shipment</h4>

<form class="row g-3">
  <div class="col-md-6">
    <input class="form-control" name="tracking" placeholder="Enter Tracking Number" required>
  </div>
  <div class="col-md-2">
    <button class="btn btn-primary">Track</button>
  </div>
</form>

<?php
if (isset($_GET['tracking'])) {
  $trk = $_GET['tracking'];
  $res = mysqli_query($conn,"SELECT * FROM couriers WHERE tracking_number='$trk'");
  if ($row = mysqli_fetch_assoc($res)) {
?>
<div class="alert alert-info mt-3">
  <b>Status:</b> <?= $row['status'] ?><br>
  <b>Receiver:</b> <?= $row['receiver_name'] ?><br>
  <a class="btn btn-sm btn-dark mt-2" href="print_status.php?tracking=<?= $trk ?>">Print</a>
</div>
<?php } else { ?>
<div class="alert alert-danger mt-3">Invalid Tracking Number</div>
<?php }} ?>

<?php include "../includes/footer.php"; ?>
