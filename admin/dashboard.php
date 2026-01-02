<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

$total = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers"))[0];
$in = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers WHERE status='IN_TRANSIT'"))[0];
$del = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers WHERE status='DELIVERED'"))[0];
?>

<h3 class="mb-5 text-center text-primary fw-bold">Admin Dashboard</h3>

<div class="row g-4">

  <!-- Total Shipments -->
  <div class="col-md-4">
    <div class="card shadow-lg border-0 text-bg-primary h-100 hover-card">
      <div class="card-body text-center py-5">
        <h5 class="card-title fs-5 fw-bold">Total Shipments</h5>
        <h2 class="display-4 fw-bold"><?= $total ?></h2>
        <p class="text-light">All shipments in the system</p>
      </div>
    </div>
  </div>

  <!-- In Transit -->
  <div class="col-md-4">
    <div class="card shadow-lg border-0 text-bg-warning h-100 hover-card">
      <div class="card-body text-center py-5">
        <h5 class="card-title fs-5 fw-bold">In Transit</h5>
        <h2 class="display-4 fw-bold"><?= $in ?></h2>
        <p class="text-dark">Shipments currently on the way</p>
      </div>
    </div>
  </div>

  <!-- Delivered -->
  <div class="col-md-4">
    <div class="card shadow-lg border-0 text-bg-success h-100 hover-card">
      <div class="card-body text-center py-5">
        <h5 class="card-title fs-5 fw-bold">Delivered</h5>
        <h2 class="display-4 fw-bold"><?= $del ?></h2>
        <p class="text-light">Successfully delivered shipments</p>
      </div>
    </div>
  </div>

</div>

<!-- Action Buttons -->
<div class="mt-5 d-flex justify-content-center flex-wrap gap-4">
  <a class="btn btn-dark btn-lg shadow-lg hover-btn" href="add_courier.php">
    <i class="bi bi-plus-circle me-2"></i> Add Shipment
  </a>
  <a class="btn btn-secondary btn-lg shadow-lg hover-btn" href="manage_courier.php">
    <i class="bi bi-card-checklist me-2"></i> Manage Shipment
  </a>
  <a class="btn btn-success btn-lg shadow-lg hover-btn" href="reports.php">
    <i class="bi bi-file-earmark-arrow-down me-2"></i> Download Report
  </a>
</div>

<!-- Custom Hover Effects -->
<style>
.hover-card:hover {
    transform: translateY(-5px);
    transition: 0.3s ease-in-out;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3) !important;
}

.hover-btn:hover {
    transform: scale(1.05);
    transition: 0.3s ease-in-out;
}
</style>

<?php include "../includes/footer.php"; ?>
