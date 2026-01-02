<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "../config/db.php";

/******** SECURITY ********/
if (!isset($_POST['update_status'])) {
    die("Invalid Request");
}

/******** REQUIRED FIELDS ********/
if (
    !isset($_POST['courier_id']) ||
    !isset($_POST['status'])
) {
    die("Missing required fields");
}

/******** SAFE VARIABLES ********/
$courier_id = (int) $_POST['courier_id'];
$status     = trim($_POST['status']);
$location   = trim($_POST['location'] ?? '');
$remarks    = trim($_POST['remarks'] ?? '');

/******** INSERT TRACKING ********/
$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO shipment_tracking (courier_id, status, location, remarks)
     VALUES (?, ?, ?, ?)"
);
if (!$stmt) die(mysqli_error($conn));

mysqli_stmt_bind_param($stmt, "isss", $courier_id, $status, $location, $remarks);
mysqli_stmt_execute($stmt);

/******** UPDATE COURIER ********/
$stmt2 = mysqli_prepare(
    $conn,
    "UPDATE couriers SET status=? WHERE courier_id=?"
);
if (!$stmt2) die(mysqli_error($conn));

mysqli_stmt_bind_param($stmt2, "si", $status, $courier_id);
mysqli_stmt_execute($stmt2);

/******** SEND SMS ON DELIVERY ********/
if ($status === 'DELIVERED') {

    $res = mysqli_prepare(
        $conn,
        "SELECT tracking_number, receiver_phone 
         FROM couriers WHERE courier_id=?"
    );
    mysqli_stmt_bind_param($res, "i", $courier_id);
    mysqli_stmt_execute($res);
    $result = mysqli_stmt_get_result($res);

    if ($row = mysqli_fetch_assoc($result)) {

        $msg = "Your courier ({$row['tracking_number']}) has been DELIVERED successfully.";

        include "../sms/send_sms.php";
        sendSMS($courier_id, $row['receiver_phone'], $msg, $conn);
    }
}

/******** REDIRECT ********/
header("Location: ../admin/manage_courier.php?updated=1");
exit;
