<?php
include "../config/db.php";
include "../includes/auth_check.php";
require "../phpmailer/src/PHPMailer.php";
require "../phpmailer/src/SMTP.php";
require "../phpmailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




// Tracking number generator
function generateTrackingNumber() {
    return 'TRK' . strtoupper(bin2hex(random_bytes(5)));
}

/* ============================
   ADD COURIER (AGENT)
============================ */
if (isset($_POST['add_courier']) && $_SESSION['role'] === 'AGENT') {

    $tracking_no       = generateTrackingNumber();
    $sender_id         = $_POST['sender_id'];
    $receiver_name     = $_POST['receiver_name'];
    $receiver_phone    = $_POST['receiver_phone'];
    $receiver_address  = $_POST['receiver_address'];
    $courier_type      = $_POST['courier_type'];
    $courier_company   = $_POST['courier_company'];
    $expected_delivery = $_POST['expected_delivery'];

    $created_by = $_SESSION['user_id'];
    $branch     = $_SESSION['branch'];
    $booking    = date('Y-m-d');

    // Insert courier (secure)
    $stmt = $conn->prepare("
        INSERT INTO couriers
        (tracking_number, sender_id, receiver_name, receiver_phone, receiver_address,
         courier_type, courier_company, booking_date, expected_delivery,
         status, created_by, branch)
        VALUES (?,?,?,?,?,?,?,?,?,'BOOKED',?,?)
    ");

    $stmt->bind_param(
        "sisssssssis",
        $tracking_no,
        $sender_id,
        $receiver_name,
        $receiver_phone,
        $receiver_address,
        $courier_type,
        $courier_company,
        $booking,
        $expected_delivery,
        $created_by,
        $branch
    );

    $stmt->execute();
    $courier_id = $stmt->insert_id;

    // Insert shipment tracking
    $conn->query("
        INSERT INTO shipment_tracking (courier_id, status, location, remarks)
        VALUES ($courier_id, 'BOOKED', '$branch', 'Courier Booked')
    ");

    /* ============================
       SEND TRACKING EMAIL
    ============================ */
    $cust = $conn->prepare("SELECT name, email FROM customers WHERE customer_id=?");
    $cust->bind_param("i", $sender_id);
    $cust->execute();
    $customer = $cust->get_result()->fetch_assoc();

    if (!empty($customer['email'])) {

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'talhajahangir2008@gmail.com';
        $mail->Password   = 'pqrzfyxhlvpcbkny';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('talhajahangir2008@gmail.com', 'Courier Management System');
        $mail->addAddress($customer['email'], $customer['name']);

        $mail->isHTML(true);
        $mail->Subject = "Courier Tracking Number";

        $mail->Body = "
            <h3>Dear {$customer['name']}</h3>
            <p>Your courier has been booked successfully.</p>
            <p><b>Tracking Number:</b> {$tracking_no}</p>
            <p>Status: BOOKED</p>
            <p>Thank you for using our service.</p>
        ";

        $mail->send();
    }

    header("Location: ../agent/dashboard.php?success=courier_added");
    exit;
}

/* ============================
   DELETE COURIER (ADMIN)
============================ */
if (isset($_GET['delete']) && $_SESSION['role'] === 'ADMIN') {

    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM couriers WHERE courier_id=$id");

    header("Location: ../admin/manage_courier.php?deleted=1");
    exit;
}

/* ============================
   UPDATE COURIER (ADMIN/AGENT)
============================ */
if (isset($_POST['update_courier']) && in_array($_SESSION['role'], ['ADMIN','AGENT'])) {

    $id = intval($_POST['courier_id']);

    $stmt = $conn->prepare("
        UPDATE couriers SET
        receiver_name=?,
        receiver_phone=?,
        receiver_address=?,
        status=?
        WHERE courier_id=?
    ");

    $stmt->bind_param(
        "ssssi",
        $_POST['receiver_name'],
        $_POST['receiver_phone'],
        $_POST['receiver_address'],
        $_POST['status'],
        $id
    );

    $stmt->execute();

    header("Location: ../admin/manage_courier.php?updated=1");
    exit;
}
