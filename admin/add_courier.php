<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../config/db.php";
include "../includes/header.php";

// Function to generate unique tracking number
function generateTrackingNumber() {
    return 'TRK'.date('YmdHis').rand(100, 999);
}

// Admin access check
if (!isset($_SESSION['user_id']) || !isset($_SESSION['role']) || strtoupper($_SESSION['role']) !== 'ADMIN') {
    die("Access Denied: You are not an admin");
}

// Handle form submission
if (isset($_POST['add_courier'])) {

    $sender_id         = $_POST['sender_id'];
    $receiver_name     = trim($_POST['receiver_name']);
    $receiver_phone    = trim($_POST['receiver_phone']);
    $receiver_address  = trim($_POST['receiver_address']);
    $courier_type      = trim($_POST['courier_type']);
    $courier_company   = trim($_POST['courier_company']);
    $expected_delivery = $_POST['expected_delivery'];
    $created_by        = $_SESSION['user_id'];
    $tracking_number   = generateTrackingNumber();

    // Insert into couriers table
    $stmt = mysqli_prepare($conn, "INSERT INTO couriers 
        (tracking_number, sender_id, receiver_name, receiver_phone, receiver_address, courier_type, courier_company, expected_delivery, status, created_by)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'BOOKED', ?)");
    mysqli_stmt_bind_param($stmt, "sissssssi", $tracking_number, $sender_id, $receiver_name, $receiver_phone, $receiver_address, $courier_type, $courier_company, $expected_delivery, $created_by);

    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='alert alert-success mt-3 shadow-lg p-3 rounded text-center glow-alert'>
                ✅ Courier added successfully! <strong>Tracking Number: $tracking_number</strong>
              </div>";
    } else {
        echo "<div class='alert alert-danger mt-3 shadow-lg p-3 rounded text-center glow-alert'>
                ❌ Error: ".mysqli_error($conn)."
              </div>";
    }
}
?>

<h4 class="mb-4 text-center text-light fw-bold display-5 glow-text">Add New Courier</h4>

<form method="POST" action="" class="p-5 rounded shadow-lg animated-form" style="max-width: 700px; margin:auto;">

    <!-- Sender (Customer) -->
    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Sender (Customer)</label>
        <select name="sender_id" class="form-select form-select-lg shadow-sm sender-select" required>
            <option value="">Select Customer</option>
            <?php
            $customers = mysqli_query($conn, "SELECT * FROM customers");
            while ($c = mysqli_fetch_assoc($customers)) {
                echo "<option value='{$c['customer_id']}'>{$c['name']} - {$c['phone']}</option>";
            }
            ?>
        </select>
    </div>

    <!-- Receiver Info -->
    <div class="mb-3">
        <label class="form-label fw-bold text-info glow-label">Receiver Name</label>
        <input type="text" name="receiver_name" class="form-control form-control-lg shadow-sm glow-input" placeholder="Receiver Full Name" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold text-info glow-label">Receiver Phone</label>
        <input type="text" name="receiver_phone" class="form-control form-control-lg shadow-sm glow-input" placeholder="Phone Number" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold text-info glow-label">Receiver Address</label>
        <textarea name="receiver_address" class="form-control form-control-lg shadow-sm glow-input" rows="3" placeholder="Full Address" required></textarea>
    </div>

    <!-- Courier Info -->
    <div class="mb-3">
        <label class="form-label fw-bold text-info glow-label">Courier Type</label>
        <input type="text" name="courier_type" class="form-control form-control-lg shadow-sm glow-input" placeholder="Document / Parcel" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold text-info glow-label">Courier Company</label>
        <input type="text" name="courier_company" class="form-control form-control-lg shadow-sm glow-input" placeholder="Company Name" required>
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Expected Delivery Date</label>
        <input type="date" name="expected_delivery" class="form-control form-control-lg shadow-sm glow-input" required>
    </div>

    <div class="text-center">
        <button type="submit" name="add_courier" class="btn btn-info btn-lg shadow-lg hover-btn">
            <i class="bi bi-plus-circle me-2"></i> Add Courier
        </button>
    </div>
</form>

<!-- Custom Styles -->
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

/* Hover effect for form inputs */
.glow-input, .sender-select {
    background-color: #000000;
    color: #0d6efd;
    border: 2px solid #0d6efd;
    border-radius: 12px;
    padding: 10px;
    transition: all 0.3s ease-in-out;
}
.glow-input:hover, .sender-select:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(13,110,253,0.6);
}

/* Label glow */
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
