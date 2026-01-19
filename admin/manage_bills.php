<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../config/db.php";
include "../includes/header.php";

/* Admin check */
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ADMIN') {
    die("<div class='alert glow-alert alert-danger text-center mt-5 p-3'>Access Denied</div>");
}

/* Handle success/error messages */
$success = $_SESSION['bill_success'] ?? '';
$error   = $_SESSION['bill_error'] ?? '';
unset($_SESSION['bill_success'], $_SESSION['bill_error']);

/* Fetch all bills */
$bills = mysqli_query($conn, "SELECT b.bill_id, b.courier_id, b.amount, b.payment_mode, b.payment_status, c.tracking_number 
                              FROM bills b 
                              LEFT JOIN couriers c ON b.courier_id=c.courier_id
                              ORDER BY b.bill_id DESC");
?>

<section class="auth-section py-5" style="min-height:85vh;">
    <div class="container">

        <div class="text-center mb-4">
            <h3 class="fw-bold text-white">🧾 Manage Bills</h3>
            <p class="text-gray mb-0">Edit or delete billing records</p>
        </div>

        <?php if($success): ?>
            <div class="alert glow-alert text-center my-3"><?= $success ?></div>
        <?php endif; ?>
        <?php if($error): ?>
            <div class="alert glow-alert-danger text-center my-3"><?= $error ?></div>
        <?php endif; ?>

        <table class="table table-dark table-striped table-hover text-white align-middle">
            <thead>
                <tr>
                    <th>Bill ID</th>
                    <th>Courier #</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($bills)): ?>
                <tr>
                    <td><?= $row['bill_id'] ?></td>
                    <td><?= $row['tracking_number'] ?? 'N/A' ?></td>
                    <td><?= number_format($row['amount'],2) ?></td>
                    <td><?= $row['payment_mode'] ?></td>
                    <td><?= $row['payment_status'] ?></td>
                    <td class="d-flex gap-2">
                        <a href="update_bill.php?id=<?= $row['bill_id'] ?>" class="btn btn-sm btn-accent">Edit</a>
                        <a href="delete_bill.php?id=<?= $row['bill_id'] ?>" class="btn btn-sm btn-danger"
                           onclick="return confirm('Are you sure you want to delete this bill?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>
</section>

<style>
.text-gray{color:#b0b0b0;}
.auth-section{background:linear-gradient(135deg,#000,#0f2027);}
.btn-accent{background:#ff4b2b;color:#fff;border-radius:30px;padding:5px 12px;}
.btn-accent:hover{background:#ff652f;}
</style>
