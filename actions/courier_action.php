<?php
include "../config/db.php";
session_start();

if (isset($_POST['add_courier'])) {

    $tracking = uniqid("TRK");
    $sender_id = $_POST['sender_id'];
    $receiver_name = $_POST['receiver_name'];
    $receiver_phone = $_POST['receiver_phone'];
    $address = $_POST['receiver_address'];
    $type = $_POST['courier_type'];
    $company = $_POST['courier_company'];
    $delivery = $_POST['expected_delivery'];
    $branch = $_SESSION['branch'];

    mysqli_query($conn,
        "INSERT INTO couriers 
        (tracking_number, sender_id, receiver_name, receiver_phone,
         receiver_address, courier_type, courier_company,
         booking_date, expected_delivery, created_by, branch)
        VALUES
        ('$tracking',$sender_id,'$receiver_name','$receiver_phone',
         '$address','$type','$company',CURDATE(),'$delivery',
         {$_SESSION['user_id']},'$branch')"
    );

    header("Location: ../admin/manage_courier.php");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM couriers WHERE courier_id=$id");
    header("Location: ../admin/manage_courier.php");
}
if (isset($_POST['update_courier'])) {

    $id = $_POST['courier_id'];

    mysqli_query($conn,
        "UPDATE couriers SET
         receiver_name='{$_POST['receiver_name']}',
         receiver_phone='{$_POST['receiver_phone']}',
         receiver_address='{$_POST['receiver_address']}',
         status='{$_POST['status']}'
         WHERE courier_id=$id"
    );

    header("Location: ../admin/manage_courier.php");
}

?>
