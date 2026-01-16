<?php
session_start();
include "../config/db.php";
// require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!isset($_POST['add_courier']) || $_SESSION['role'] !== 'AGENT') {
    die("Unauthorized Access");
}

$sender_id         = $_POST['sender_id'];
$receiver_name     = $_POST['receiver_name'];
$receiver_phone    = $_POST['receiver_phone'];
$receiver_address  = $_POST['receiver_address'];
$courier_type      = $_POST['courier_type'];
$courier_company   = $_POST['courier_company'];
$expected_delivery = $_POST['expected_delivery'];

$created_by   = $_SESSION['user_id'];
$booking_date = date('Y-m-d');
$tracking_no  = generateTrackingNumber();

// Insert Courier
$insert = $conn->prepare("
    INSERT INTO couriers 
    (tracking_number, sender_id, receiver_name, receiver_phone, receiver_address,
     courier_type, courier_company, booking_date, expected_delivery, status, created_by)
    VALUES (?,?,?,?,?,?,?,?,?,'BOOKED',?)
");

$insert->bind_param(
    "sisssssssi",
    $tracking_no,
    $sender_id,
    $receiver_name,
    $receiver_phone,
    $receiver_address,
    $courier_type,
    $courier_company,
    $booking_date,
    $expected_delivery,
    $created_by
);

if ($insert->execute()) {

    $courier_id = $insert->insert_id;

    // Insert initial tracking history
    $conn->query("
        INSERT INTO shipment_tracking (courier_id, status, location, remarks)
        VALUES ($courier_id, 'BOOKED', 'Booking Branch', 'Courier Booked')
    ");

    // Fetch customer email
    $cust = $conn->prepare("SELECT name, email FROM customers WHERE customer_id=?");
    $cust->bind_param("i", $sender_id);
    $cust->execute();
    $customer = $cust->get_result()->fetch_assoc();

    if ($customer && !empty($customer['email'])) {

        $mail = new PHPMailer(true);

        try {
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
            $mail->Subject = "Your Courier Tracking Number";

            $mail->Body = "
                <h3>Dear {$customer['name']},</h3>
                <p>Your courier has been successfully booked.</p>
                <p><strong>Tracking Number:</strong> {$tracking_no}</p>
                <p>Status: <b>BOOKED</b></p>
                <p>You can track your shipment using this number.</p>
                <br>
                <p>Thank you,<br>Courier Management System</p>
            ";

            $mail->send();

        } catch (Exception $e) {
            // Optional: log email error
        }
    }

    header("Location: ../agent/dashboard.php?success=courier_added");
    exit;
}
