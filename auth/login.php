<?php
session_start();
include "../config/db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email='$email' AND status=1";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {

    if (password_verify($password, $row['password'])) {

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role']    = $row['role'];
        $_SESSION['branch']  = $row['branch'];

        if ($row['role'] == 'ADMIN') {
            header("Location: ../admin/dashboard.php");
        } elseif ($row['role'] == 'AGENT') {
            header("Location: ../agent/dashboard.php");
        } else {
            header("Location: ../user/track.php");
        }

    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}
?>
