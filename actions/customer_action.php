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

    $_SESSION['customer_success'] = "✅ Customer added successfully!";
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

    $_SESSION['customer_success'] = "✅ Customer updated successfully!";
    header("Location: ../admin/manage_customer.php");
    exit();
}

# DELETE CUSTOMER
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    // Check if customer has courier records
    $check = mysqli_query($conn, "SELECT courier_id FROM couriers WHERE sender_id=$id");
    if (mysqli_num_rows($check) > 0) {
        // Cannot delete: customer has couriers
        $_SESSION['customer_error'] = "❌ Cannot delete customer! They have existing courier records.";
    } else {
        mysqli_query($conn, "DELETE FROM customers WHERE customer_id=$id");
        $_SESSION['customer_success'] = "✅ Customer deleted successfully!";
    }

    header("Location: ../admin/manage_customer.php");
    exit();
}
?>
