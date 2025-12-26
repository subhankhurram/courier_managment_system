<?php
include "../config/db.php";
session_start();

if (isset($_POST['update_status'])) {

    $courier_id = $_POST['courier_id'];
    $status = $_POST['status'];
    $location = $_POST['location'];
    $remarks = $_POST['remarks'];

    mysqli_query($conn,
        "INSERT INTO shipment_tracking 
        (courier_id, status, location, remarks)
        VALUES ($courier_id,'$status','$location','$remarks')"
    );

    mysqli_query($conn,
        "UPDATE couriers SET status='$status' WHERE courier_id=$courier_id"
    );

    header("Location: ../admin/manage_courier.php");
}
if ($status == 'DELIVERED') {

    $res = mysqli_query($conn,
        "SELECT tracking_number, receiver_phone
         FROM couriers WHERE courier_id=$courier_id"
    );

    $row = mysqli_fetch_assoc($res);

    $msg = "Your courier ({$row['tracking_number']}) has been DELIVERED successfully.";

    include "../sms/send_sms.php";
    sendSMS($courier_id, $row['receiver_phone'], $msg, $conn);
}

?>
