<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../config/db.php";

// Admin check
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ADMIN') {
    die("Access Denied");
}

if (isset($_POST['create_bill'])) {

    $courier_id   = $_POST['courier_id'];
    $amount       = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $created_by   = $_SESSION['user_id'];

    // Check if bill already exists
    $check = mysqli_prepare($conn, "SELECT bill_id FROM bills WHERE courier_id=?");
    mysqli_stmt_bind_param($check, "i", $courier_id);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);

    if (mysqli_stmt_num_rows($check) > 0) {
        header("Location: create_bill.php?error=bill_exists");
        exit;
    }

    // Insert bill
    $stmt = mysqli_prepare($conn, "INSERT INTO bills 
        (courier_id, amount, payment_mode, created_at)
        VALUES (?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "idsi",
        $courier_id,
        $amount,
        $payment_mode,
        $created_by
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: create_bill.php?success=1");
        exit;
    } else {
        die("Billing Error: " . mysqli_error($conn));
    }
}
