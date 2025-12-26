<?php
include "../includes/auth_check.php";
include "../config/db.php";

if ($_SESSION['role'] != 'AGENT') die("Access Denied");

$branch = $_SESSION['branch'];

$total = mysqli_fetch_row(
    mysqli_query($conn, "SELECT COUNT(*) FROM couriers WHERE branch='$branch'")
)[0];

$in_transit = mysqli_fetch_row(
    mysqli_query($conn,
    "SELECT COUNT(*) FROM couriers WHERE branch='$branch' AND status='IN_TRANSIT'")
)[0];

$delivered = mysqli_fetch_row(
    mysqli_query($conn,
    "SELECT COUNT(*) FROM couriers WHERE branch='$branch' AND status='DELIVERED'")
)[0];
?>

<h2>Agent Dashboard (<?= $branch ?>)</h2>

<p>Total Shipments: <?= $total ?></p>
<p>In-Transit Shipments: <?= $in_transit ?></p>
<p>Delivered Shipments: <?= $delivered ?></p>

<a href="add_courier.php">Add Shipment</a> |
<a href="manage_courier.php">Manage Shipment</a>
