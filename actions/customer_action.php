<?php
include "../config/db.php";
session_start();

/*
  CUSTOMER ACTIONS
  - Add Customer (Admin)
  - Update Customer (Admin)
  - Delete Customer (Admin)
*/

# ADD CUSTOMER
if (isset($_POST['add_customer'])) {

    $name    = $_POST['name'];
    $phone   = $_POST['phone'];
    $email   = $_POST['email'];
    $address = $_POST['address'];

    mysqli_query($conn,
        "INSERT INTO customers (name, phone, email, address)
         VALUES ('$name','$phone','$email','$address')"
    );

    header("Location: ../admin/manage_customer.php");
    exit();
}

# UPDATE CUSTOMER
if (isset($_POST['update_customer'])) {

    $id      = $_POST['customer_id'];
    $name    = $_POST['name'];
    $phone   = $_POST['phone'];
    $email   = $_POST['email'];
    $address = $_POST['address'];

    mysqli_query($conn,
        "UPDATE customers
         SET name='$name', phone='$phone', email='$email', address='$address'
         WHERE customer_id=$id"
    );

    header("Location: ../admin/manage_customer.php");
    exit();
}

# DELETE CUSTOMER
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    mysqli_query($conn,
        "DELETE FROM customers WHERE customer_id=$id"
    );

    header("Location: ../admin/manage_customer.php");
    exit();
}
?>
