<?php
/***********************
 * SESSION & SECURITY
 ***********************/
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../config/db.php";
include "../includes/header.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Only ADMIN allowed
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'ADMIN') {
    die("Access Denied");
}

/***********************
 * VALIDATE COURIER ID
 ***********************/
if (!isset($_GET['courier_id']) || !is_numeric($_GET['courier_id'])) {
    die("Invalid Courier ID");
}

$courier_id = (int) $_GET['courier_id'];

/***********************
 * FETCH COURIER
 ***********************/
$stmt = mysqli_prepare(
    $conn,
    "SELECT courier_id, receiver_name, receiver_phone, receiver_address, status 
     FROM couriers 
     WHERE courier_id = ?"
);
mysqli_stmt_bind_param($stmt, "i", $courier_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$row = mysqli_fetch_assoc($result)) {
    die("Courier not found");
}

/***********************
 * HANDLE SUCCESS MESSAGE
 ***********************/
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<div class='alert alert-success'>Courier updated successfully!</div>";
}
?>

<h4>Update Courier</h4>

<form method="POST" action="../actions/courier_action.php">

    <input type="hidden" name="courier_id" value="<?= $row['courier_id'] ?>">

    <div class="mb-2">
        <label>Receiver Name</label>
        <input type="text" class="form-control" name="receiver_name"
               value="<?= htmlspecialchars($row['receiver_name']) ?>" required>
    </div>

    <div class="mb-2">
        <label>Receiver Phone</label>
        <input type="text" class="form-control" name="receiver_phone"
               value="<?= htmlspecialchars($row['receiver_phone']) ?>" required>
    </div>

    <div class="mb-2">
        <label>Receiver Address</label>
        <textarea class="form-control" name="receiver_address" required><?= 
            htmlspecialchars($row['receiver_address']) 
        ?></textarea>
    </div>

    <div class="mb-2">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="BOOKED" <?= $row['status']=='BOOKED'?'selected':'' ?>>BOOKED</option>
            <option value="IN_TRANSIT" <?= $row['status']=='IN_TRANSIT'?'selected':'' ?>>IN TRANSIT</option>
            <option value="DELIVERED" <?= $row['status']=='DELIVERED'?'selected':'' ?>>DELIVERED</option>
        </select>
    </div>

    <button type="submit" name="update_courier" class="btn btn-warning">
        Update Courier
    </button>

</form>

<?php include "../includes/footer.php"; ?>
