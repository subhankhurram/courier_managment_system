<?php
include "../config/db.php";
include "../sms/send_sms.php";

if (isset($_GET['pickup_sms'])) {

    $cid = $_GET['pickup_sms'];

    $res = mysqli_query($conn,
        "SELECT tracking_number, receiver_phone
         FROM couriers WHERE courier_id=$cid"
    );

    $row = mysqli_fetch_assoc($res);

    $msg = "Your courier ({$row['tracking_number']}) has been booked and is in transit.";

    sendSMS($cid, $row['receiver_phone'], $msg, $conn);

    header("Location: ../admin/manage_courier.php");
}
