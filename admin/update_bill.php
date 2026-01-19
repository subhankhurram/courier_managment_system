<?php
ob_start(); // Start output buffering
session_start();

include "../config/db.php";

/* Admin check */
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ADMIN') {
    die("<div class='alert glow-alert alert-danger text-center mt-5 p-3'>Access Denied</div>");
}

/***********************
 * VALIDATE BILL ID
 ***********************/
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("<div class='alert glow-alert-danger text-center mt-5 p-3'>Invalid Bill ID</div>");
}

$bill_id = (int) $_GET['id'];

/***********************
 * FETCH BILL DATA
 ***********************/
$stmt = mysqli_prepare($conn, "SELECT * FROM bills WHERE bill_id=?");
mysqli_stmt_bind_param($stmt, "i", $bill_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$bill = mysqli_fetch_assoc($result)) {
    die("<div class='alert glow-alert-danger text-center mt-5 p-3'>Bill not found</div>");
}

/***********************
 * HANDLE UPDATE
 ***********************/
if (isset($_POST['update_bill'])) {
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $payment_status = $_POST['payment_status'];

    $update = mysqli_prepare($conn, "UPDATE bills SET amount=?, payment_mode=?, payment_status=? WHERE bill_id=?");
    mysqli_stmt_bind_param($update, "dssi", $amount, $payment_mode, $payment_status, $bill_id);

    if (mysqli_stmt_execute($update)) {
        $_SESSION['bill_success'] = "Bill updated successfully ✅";
        header("Location: manage_bills.php");
        exit;
    } else {
        $error = "Update failed: " . mysqli_error($conn);
    }
}

// Include header AFTER processing POST to avoid headers error
include "../includes/header.php";
?>

<section class="auth-section py-5" style="min-height:85vh;">
<div class="container">

    <div class="text-center mb-4">
        <h3 class="fw-bold text-white">📝 Update Bill</h3>
        <p class="text-gray mb-0">Edit bill details</p>
    </div>

    <?php if(!empty($error)) echo "<div class='alert glow-alert-danger text-center mb-4'>{$error}</div>"; ?>

    <form method="POST" class="glass p-5 rounded-4" style="max-width:650px;margin:auto;">

        <div class="mb-3">
            <label class="form-label text-accent fw-semibold">Amount</label>
            <input type="number" step="0.01" name="amount"
                   class="form-control form-control-lg dark-input"
                   value="<?= htmlspecialchars($bill['amount']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label text-accent fw-semibold">Payment Mode</label>
            <select name="payment_mode" class="form-select form-select-lg dark-input" required>
                <option value="CASH" <?= $bill['payment_mode']=='CASH'?'selected':'' ?>>Cash</option>
                <option value="ONLINE" <?= $bill['payment_mode']=='ONLINE'?'selected':'' ?>>Online</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label text-accent fw-semibold">Payment Status</label>
            <select name="payment_status" class="form-select form-select-lg dark-input" required>
                <option value="PAID" <?= $bill['payment_status']=='PAID'?'selected':'' ?>>Paid</option>
                <option value="UNPAID" <?= $bill['payment_status']=='UNPAID'?'selected':'' ?>>Unpaid</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" name="update_bill" class="btn btn-accent w-100 py-2 fw-bold">
                🔄 Update Bill
            </button>
        </div>

    </form>
</div>
</section>

<style>
/* GLOBAL THEME */
.auth-section{background:linear-gradient(135deg,#000000,#0f2027);}
.text-gray{color:#b0b0b0;}
.text-accent{color:#ff4b2b;}

/* Glass Form */
.glass{background:rgba(255,255,255,.06);backdrop-filter:blur(15px);border-radius:20px;box-shadow:0 0 35px rgba(255,75,43,.25);}

/* Inputs */
.dark-input{background:#1a1a1a;color:#fff;border:2px solid #ff4b2b;border-radius:14px;padding:12px;transition:.3s;}
.dark-input:focus{background:#222;color:#fff;box-shadow:0 0 0 .25rem rgba(255,75,43,.25);border-color:#ff4b2b;}
.form-control:hover,.form-select:hover{transform:translateY(-2px);transition:.25s;}

/* Button */
.btn-accent{background:#ff4b2b;color:#fff;border-radius:30px;font-weight:700;transition:.3s;}
.btn-accent:hover{transform:scale(1.05);box-shadow:0 0 25px rgba(255,75,43,.6);}

/* Alerts */
.glow-alert{background:#000;color:#ff4b2b;border:2px solid #ff4b2b;box-shadow:0 0 25px rgba(255,75,43,.5);border-radius:16px;padding:12px;}
.glow-alert-danger{background:#000;color:#ff4b2b;border:2px solid #ff4b2b;box-shadow:0 0 25px rgba(255,75,43,.5);border-radius:16px;padding:12px;}
</style>
