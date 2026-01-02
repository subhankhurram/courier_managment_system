<?php
include "../includes/auth_check.php";
include "../includes/header.php";
?>

<h4 class="mb-4 text-center text-light fw-bold display-5 glow-text">Add Customer</h4>

<form method="POST" action="../actions/customer_action.php" class="p-5 rounded shadow-lg animated-form" style="max-width: 700px; margin:auto;">

  <div class="mb-3">
      <label class="form-label fw-bold text-info glow-label">Customer Name</label>
      <input type="text" name="name" class="form-control form-control-lg shadow-sm glow-input" placeholder="Customer Name" required>
  </div>

  <div class="mb-3">
      <label class="form-label fw-bold text-info glow-label">Phone</label>
      <input type="text" name="phone" class="form-control form-control-lg shadow-sm glow-input" placeholder="Phone Number" required>
  </div>

  <div class="mb-3">
      <label class="form-label fw-bold text-info glow-label">Email</label>
      <input type="email" name="email" class="form-control form-control-lg shadow-sm glow-input" placeholder="Email Address">
  </div>

  <div class="mb-4">
      <label class="form-label fw-bold text-info glow-label">Address</label>
      <textarea name="address" class="form-control form-control-lg shadow-sm glow-input" rows="3" placeholder="Full Address"></textarea>
  </div>

  <div class="text-center">
      <button type="submit" name="add_customer" class="btn btn-info btn-lg shadow-lg hover-btn">
          <i class="bi bi-plus-circle me-2"></i> Add Customer
      </button>
  </div>
</form>

<!-- Custom Styles (Matching Add Courier Page Theme) -->
<style>
body {
    background: linear-gradient(135deg, #000000, #0d6efd);
    font-family: 'Segoe UI', sans-serif;
    min-height: 100vh;
    padding: 40px 0;
}

/* Glow Text */
.glow-text {
    text-shadow: 0 0 8px #0d6efd, 0 0 20px #0d6efd, 0 0 30px #0d6efd;
}

/* Inputs & textarea */
.glow-input {
    background-color: #000000;
    color: #0d6efd;
    border: 2px solid #0d6efd;
    border-radius: 12px;
    padding: 10px;
    transition: all 0.3s ease-in-out;
}
.glow-input:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(13,110,253,0.6);
}

/* Labels glow */
.glow-label {
    text-shadow: 0 0 4px #0d6efd;
}

/* Form card animation */
.animated-form {
    background: #000000;
    border-radius: 15px;
    animation: pulseBorder 3s infinite alternate;
    box-shadow: 0 0 25px rgba(13,110,253,0.5);
}

/* Button hover effect */
.hover-btn:hover {
    transform: scale(1.08);
    box-shadow: 0 0 25px #0d6efd, 0 0 50px rgba(13,110,253,0.4);
}

/* Alerts */
.glow-alert {
    background: #000000;
    color: #0d6efd;
    border: 2px solid #0d6efd;
    text-shadow: 0 0 4px #0d6efd;
}

/* Animation keyframes */
@keyframes pulseBorder {
    0% { box-shadow: 0 0 15px #0d6efd, 0 0 30px rgba(13,110,253,0.4); }
    50% { box-shadow: 0 0 25px #0d6efd, 0 0 50px rgba(13,110,253,0.5); }
    100% { box-shadow: 0 0 15px #0d6efd, 0 0 30px rgba(13,110,253,0.4); }
}

/* Placeholder color */
::placeholder {
    color: #0d6efd;
    opacity: 1;
}
</style>

<?php include "../includes/footer.php"; ?>
