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
        echo "<div class='alert alert-success mt-2'>Courier added successfully! Tracking Number: <strong>$tracking_number</strong></div>";
    } else {
        echo "<div class='alert alert-danger mt-2'>Error: ".mysqli_error($conn)."</div>";
    }
}
?>

<h4>Add New Courier</h4>

<form method="POST" action="">
    <!-- Sender (Customer) -->
    <div class="mb-2">
        <label>Sender (Customer)</label>
        <select name="sender_id" class="form-control" required>
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
    <div class="mb-2">
        <label>Receiver Name</label>
        <input type="text" name="receiver_name" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Receiver Phone</label>
        <input type="text" name="receiver_phone" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Receiver Address</label>
        <textarea name="receiver_address" class="form-control" required></textarea>
    </div>

    <!-- Courier Info -->
    <div class="mb-2">
        <label>Courier Type</label>
        <input type="text" name="courier_type" class="form-control" placeholder="Document / Parcel" required>
    </div>

    <div class="mb-2">
        <label>Courier Company</label>
        <input type="text" name="courier_company" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Expected Delivery Date</label>
        <input type="date" name="expected_delivery" class="form-control" required>
    </div>

    <button type="submit" name="add_courier" class="btn btn-primary">Add Courier</button>
</form>


<?php include "../includes/footer.php"; ?>


