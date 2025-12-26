<?php
include "../config/db.php";
session_start();

if (isset($_POST['add_agent'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $branch = $_POST['branch'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn,
        "INSERT INTO users (role, name, email, phone, password, city, branch)
         VALUES ('AGENT','$name','$email','$phone','$password','$city','$branch')"
    );

    $user_id = mysqli_insert_id($conn);

    mysqli_query($conn,
        "INSERT INTO agents (user_id, city, branch)
         VALUES ($user_id,'$city','$branch')"
    );

    header("Location: ../admin/manage_agents.php");
}
?>
