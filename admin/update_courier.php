<?php
echo "<div class='text-center text-accent mb-2'>
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
    echo "<div class='alert glow-alert text-center my-3'>
            ✅ Courier updated successfully!
          </div>";
}
?>

<section class="auth-section py-5" style="min-height:85vh;">

<div class="container">

    <div class="text-center mb-4">
        <h3 class="fw-bold text-white">🔄 Update Courier</h3>
        <p class="text-gray mb-0">Edit courier details & status</p>
    </div>

    <form method="POST" action="../actions/courier_action.php"
          class="glass p-5 rounded-4"
          style="max-width:650px;margin:auto;">

        <input type="hidden" name="courier_id" value="<?= $row['courier_id'] ?>">

        <div class="mb-3">
            <label class="form-label text-accent fw-semibold">Receiver Name</label>
            <input type="text" class="form-control form-control-lg dark-input"
                   name="receiver_name"
                   value="<?= htmlspecialchars($row['receiver_name']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label text-accent fw-semibold">Receiver Phone</label>
            <input type="text" class="form-control form-control-lg dark-input"
                   name="receiver_phone"
                   value="<?= htmlspecialchars($row['receiver_phone']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label text-accent fw-semibold">Receiver Address</label>
            <textarea class="form-control form-control-lg dark-input"
                      name="receiver_address" rows="3" required><?= 
                htmlspecialchars($row['receiver_address']) 
            ?></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label text-accent fw-semibold">Status</label>
            <select class="form-select form-select-lg dark-input" name="status">
                <option value="BOOKED" <?= $row['status']=='BOOKED'?'selected':'' ?>>BOOKED</option>
                <option value="IN_TRANSIT" <?= $row['status']=='IN_TRANSIT'?'selected':'' ?>>IN TRANSIT</option>
                <option value="DELIVERED" <?= $row['status']=='DELIVERED'?'selected':'' ?>>DELIVERED</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" name="update_courier"
                    class="btn btn-accent w-100 py-2 fw-bold">
                🔄 Update Courier
            </button>
        </div>
    </form>

</div>
</section>

<style>
/* GLOBAL THEME */
.auth-section{
    background:linear-gradient(135deg,#000000,#0f2027);
}
.text-gray{color:#b0b0b0}
.text-accent{color:#ff4b2b}

/* Glass Form */
.glass{
    background:rgba(255,255,255,.06);
    backdrop-filter:blur(15px);
    border-radius:20px;
    box-shadow:0 0 35px rgba(255,75,43,.25);
}

/* Inputs */
.dark-input{
    background:#1a1a1a;
    color:#fff;
    border:2px solid #ff4b2b;
    border-radius:14px;
    padding:12px;
    transition:.3s;
}
.dark-input:focus{
    background:#222;
    color:#fff;
    box-shadow:0 0 0 .25rem rgba(255,75,43,.25);
    border-color:#ff4b2b;
}
.form-control:hover,
.form-select:hover{
    transform:translateY(-2px);
    transition:.25s;
}

/* Button */
.btn-accent{
    background:#ff4b2b;
    color:#fff;
    border-radius:30px;
    font-weight:700;
    transition:.3s;
}
.btn-accent:hover{
    transform:scale(1.05);
    box-shadow:0 0 25px rgba(255,75,43,.6);
}

/* Alerts */
.glow-alert{
    background:#000;
    color:#ff4b2b;
    border:2px solid #ff4b2b;
    box-shadow:0 0 25px rgba(255,75,43,.5);
    border-radius:16px;
    padding:12px;
