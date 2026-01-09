<?php
echo "<div class='text-center text-info mb-2'>
        Courier ID from URL: <strong>" . ($_GET['id'] ?? 'NOT SET') . "</strong>
      </div>";

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
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid Courier ID");
}

$courier_id = (int) $_GET['id'];

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
    echo "<div class='alert alert-success text-center shadow-lg'>
            ✅ Courier updated successfully!
          </div>";
}
?>

<h4 class="text-center text-info fw-bold mb-4 display-6">
    Update Courier
</h4>

<div class="container">
<form method="POST" action="../actions/courier_action.php"
      class="p-5 shadow-lg rounded-4"
      style="max-width:650px;margin:auto;
             background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);">

    <input type="hidden" name="courier_id" value="<?= $row['courier_id'] ?>">

    <div class="mb-3">
        <label class="form-label text-info fw-semibold">Receiver Name</label>
        <input type="text" class="form-control form-control-lg dark-input"
               name="receiver_name"
               value="<?= htmlspecialchars($row['receiver_name']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-info fw-semibold">Receiver Phone</label>
        <input type="text" class="form-control form-control-lg dark-input"
               name="receiver_phone"
               value="<?= htmlspecialchars($row['receiver_phone']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label text-info fw-semibold">Receiver Address</label>
        <textarea class="form-control form-control-lg dark-input"
                  name="receiver_address" rows="3" required><?= 
            htmlspecialchars($row['receiver_address']) 
        ?></textarea>
    </div>

    <div class="mb-4">
        <label class="form-label text-info fw-semibold">Status</label>
        <select class="form-select form-select-lg dark-input" name="status">
            <option value="BOOKED" <?= $row['status']=='BOOKED'?'selected':'' ?>>BOOKED</option>
            <option value="IN_TRANSIT" <?= $row['status']=='IN_TRANSIT'?'selected':'' ?>>IN TRANSIT</option>
            <option value="DELIVERED" <?= $row['status']=='DELIVERED'?'selected':'' ?>>DELIVERED</option>
        </select>
    </div>

    <div class="text-center">
        <button type="submit" name="update_courier"
                class="btn btn-outline-info btn-lg px-5 hover-btn">
            🔄 Update Courier
        </button>
    </div>
</form>
</div>

<style>
body{
    background:linear-gradient(135deg,#000000,#0f2027);
    min-height:100vh;
}

/* Dark inputs */
.dark-input{
    background:#000;
    color:#e6f7ff;
    border:2px solid #0dcaf0;
    border-radius:12px;
}

.dark-input:focus{
    background:#000;
    color:#fff;
    box-shadow:0 0 0 0.2rem rgba(13,202,240,.25);
    border-color:#0dcaf0;
}

/* Hover effects */
.hover-btn:hover{
    transform:scale(1.08);
    transition:.3s;
    box-shadow:0 8px 30px rgba(0,0,0,.7);
}

.form-control:hover,
.form-select:hover{
    transform:translateY(-2px);
    transition:.25s;
}
</style>

<?php include "../includes/footer.php"; ?>
