<?php
include "../config/db.php";
session_start();

/*
 This file simulates SMS sending
 Real API can be integrated later
*/

function sendSMS($courier_id, $phone, $message, $conn) {

    // Log SMS
    mysqli_query($conn,
        "INSERT INTO sms_logs (courier_id, message, sent_to, sent_by)
         VALUES ($courier_id,'$message','$phone',{$_SESSION['user_id']})"
    );

    // Simulated success
    return true;
}
?>
