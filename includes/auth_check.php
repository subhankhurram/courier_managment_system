<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
if ($_SESSION['role'] != 'ADMIN') {
    die("Access Denied");
}
if ($_SESSION['role'] != 'ADMIN') {
    die("Access Denied");
}

?>
