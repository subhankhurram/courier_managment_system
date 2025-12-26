<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

$total = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers"))[0];
$in = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers WHERE status='IN_TRANSIT'"))[0];
$del = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers WHERE status='DELIVERED'"))[0];
?>

<h3>Admin Dashboard</h3>

<div class="row">
  <div class="col-md-4">
    <div class="card text-bg-primary mb-3">
      <div class="card-body">
        <h5>Total Shipments</h5>
        <h2><?= $total ?></h2>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card text-bg-warning mb-3">
      <div class="card-body">
        <h5>In Transit</h5>
        <h2><?= $in ?></h2>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card text-bg-success mb-3">
      <div class="card-body">
        <h5>Delivered</h5>
        <h2><?= $del ?></h2>
      </div>
    </div>
  </div>
</div>

<a class="btn btn-dark" href="add_courier.php">Add Shipment</a>
<a class="btn btn-secondary" href="manage_courier.php">Manage Shipment</a>
<a class="btn btn-success" href="reports.php">Download Report</a>

<?php include "../includes/footer.php"; ?>

