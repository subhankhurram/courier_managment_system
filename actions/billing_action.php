<?php
include "../config/db.php";
session_start();

if (isset($_POST['create_bill'])) {

    $cid = $_POST['courier_id'];
    $amount = $_POST['amount'];
    $mode = $_POST['payment_mode'];

    mysqli_query($conn,
        "INSERT INTO bills (courier_id, amount, payment_mode, payment_status)
         VALUES ($cid,$amount,'$mode','PAID')"
    );

    header("Location: ../admin/dashboard.php");
}
?>
