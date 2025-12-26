<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'AGENT') die("Access Denied");

$branch = $_SESSION['branch'];
?>

<h4>My Branch Shipments</h4>

<table class="table table-bordered">
<tr class="table-dark">
  <th>Tracking</th>
  <th>Receiver</th>
  <th>Status</th>
</tr>

<?php
$res = mysqli_query($conn,
    "SELECT * FROM couriers WHERE branch='$branch'"
);

while ($row = mysqli_fetch_assoc($res)) {
?>
<tr>
  <td><?= $row['tracking_number'] ?></td>
  <td><?= $row['receiver_name'] ?></td>
  <td><?= $row['status'] ?></td>
</tr>
<?php } ?>
</table>

<?php include "../includes/footer.php"; ?>
