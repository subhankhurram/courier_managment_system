<?php
if (isset($_GET['success'])) {
    echo "<div class='alert glow-alert alert-success mt-3 text-center p-3 rounded shadow-lg'>
            ✅ Bill Generated Successfully
          </div>";
}
if (isset($_GET['error']) && $_GET['error'] == 'bill_exists') {
    echo "<div class='alert glow-alert alert-danger mt-3 text-center p-3 rounded shadow-lg'>
            ❌ Bill already exists for this courier
          </div>";
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../includes/header.php";
include "../config/db.php";

// Admin check
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ADMIN') {
    die("<div class='alert glow-alert alert-danger text-center mt-5 p-3'>Access Denied</div>");
}
?>

<h3 class="text-center display-5 glow-text mb-5">Generate Bill</h3>

<form method="POST" action="billing_action.php" class="p-5 rounded shadow-lg animated-form" style="max-width: 600px; margin:auto; background: #000000;">

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Select Courier</label>
        <select name="courier_id" class="form-select form-select-lg shadow-sm glow-input" required>
            <option value="">Select Courier</option>
            <?php
            $q = mysqli_query($conn, "SELECT courier_id, tracking_number FROM couriers");
            while ($row = mysqli_fetch_assoc($q)) {
                echo "<option value='{$row['courier_id']}'>{$row['tracking_number']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Amount</label>
        <input type="number" name="amount" class="form-control form-control-lg shadow-sm glow-input" placeholder="Enter Amount" required>
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Payment Mode</label>
        <select name="payment_mode" class="form-select form-select-lg shadow-sm glow-input" required>
            <option value="CASH">Cash</option>
            <option value="ONLINE">Online</option>
        </select>
    </div>

    <div class="text-center">
        <button type="submit" name="create_bill" class="btn btn-info btn-lg shadow-lg hover-btn">
            <i class="bi bi-receipt me-2"></i> Generate Bill
        </button>
    </div>

</form>

<style>
body {
    background: linear-gradient(135deg, #000000, #0d6efd);
    font-family: 'Segoe UI', sans-serif;
    min-height: 100vh;
    padding: 40px 0;
}

.glow-text {
    text-shadow: 0 0 8px #0d6efd, 0 0 20px #0d6efd, 0 0 30px rgba(13,110,253,0.7);
}

.glow-input {
    background-color: #000000;
    color: #0d6efd;
    border: 2px solid #0d6efd;
    border-radius: 12px;
    padding: 10px;
    transition: all 0.3s ease-in-out;
}
.glow-input:hover, .form-select:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(13,110,253,0.6);
}

.glow-label {
    text-shadow: 0 0 4px #0d6efd;
}

.animated-form {
    border-radius: 15px;
    animation: pulseBorder 3s infinite alternate;
    box-shadow: 0 0 25px rgba(13,110,253,0.5);
}

.hover-btn:hover {
    transform: scale(1.08);
    box-shadow: 0 0 25px #0d6efd, 0 0 50px rgba(13,110,253,0.4);
    transition: 0.3s ease-in-out;
}

.alert.glow-alert {
    background: #000000;
    color: #0d6efd;
    border: 2px solid #0d6efd;
    text-shadow: 0 0 4px #0d6efd;
    transition: all 0.3s ease-in-out;
}

@keyframes pulseBorder {
    0% { box-shadow: 0 0 15px #0d6efd, 0 0 30px rgba(13,110,253,0.4); }
    50% { box-shadow: 0 0 25px #0d6efd, 0 0 50px rgba(13,110,253,0.5); }
    100% { box-shadow: 0 0 15px #0d6efd, 0 0 30px rgba(13,110,253,0.4); }
}

::placeholder {
    color: #0d6efd;
    opacity: 1;
}
</style>

<?php include "../includes/footer.php"; ?>
