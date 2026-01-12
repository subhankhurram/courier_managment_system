<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "includes/header.php";
?>

<!-- HERO -->
<section class="hero">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1>Smart Courier Management System</h1>
        <p class="mt-3">
          Send, track, and manage your parcels with speed, security, and confidence.
        </p>
        <div class="mt-4">
          <a href="auth/register.php" class="btn btn-main me-3">Create Account</a>
          <a href="auth/login.php" class="btn btn-outline">Login</a>
        </div>
      </div>

      <div class="col-md-6 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/1048/1048316.png"
             class="img-fluid"
             style="max-width:380px;">
      </div>
    </div>
  </div>
</section>

<!-- FEATURES -->
<section class="features">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Why Choose Our System?</h2>
      <p class="text-muted">Powerful tools for customers and agents</p>
    </div>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="feature-box text-center">
          <i class="bi bi-geo-alt fs-1 text-primary"></i>
          <h5 class="mt-3">Parcel Tracking</h5>
          <p class="text-muted">Track shipments in real time.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="feature-box text-center">
          <i class="bi bi-people fs-1 text-primary"></i>
          <h5 class="mt-3">User & Agent Roles</h5>
          <p class="text-muted">Separate dashboards for each role.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="feature-box text-center">
          <i class="bi bi-shield-check fs-1 text-primary"></i>
          <h5 class="mt-3">Secure Platform</h5>
          <p class="text-muted">Encrypted & role-based authentication.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta text-center">
  <div class="container">
    <h2 class="fw-bold">Start Managing Deliveries Today</h2>
    <p class="mb-4">Create your free account and get started instantly.</p>
    <a href="auth/register.php" class="btn btn-light btn-lg">Register Now</a>
  </div>
</section>

<?php include "includes/footer.php"; ?>
