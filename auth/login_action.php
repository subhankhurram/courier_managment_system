<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../config/db.php";

// Check if form is submitted
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    header("Location: login.php?error=user_not_found");
    exit;
}

$email    = trim($_POST['email']);
$password = $_POST['password'];

// Prepared statement for security
$stmt = mysqli_prepare($conn, "SELECT user_id, role, password, branch FROM users WHERE email=? AND status=1");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {

    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role']    = $row['role'];
        $_SESSION['branch']  = $row['branch'];

        // Role-based redirect
        if ($row['role'] === 'ADMIN') {
            header("Location: ../admin/dashboard.php");
        } elseif ($row['role'] === 'AGENT') {
            header("Location: ../agent/dashboard.php");
        } else {
            header("Location: ../user/track.php");
        }
        exit;

    } else {
        header("Location: login.php?error=invalid_password");
        exit;
    }

} else {
    header("Location: login.php?error=user_not_found");
    exit;
}
