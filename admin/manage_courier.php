<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";
?>

<h4>Manage Shipments</h4>

<table class="table table-bordered table-striped">
<tr class="table-dark">
  <th>Tracking</th>
  <th>Receiver</th>
  <th>Status</th>
  <th>Branch</th>
  <th>Action</th>
</tr>

<?php
$res = mysqli_query($conn,"SELECT * FROM couriers");
while ($row = mysqli_fetch_assoc($res)) {
?>
<tr>
  <td><?= $row['tracking_number'] ?></td>
  <td><?= $row['receiver_name'] ?></td>
  <td><?= $row['status'] ?></td>
  <td><?= $row['branch'] ?></td>
  <td>
    <a class="btn btn-sm btn-warning" href="update_courier.php?id=<?= $row['courier_id'] ?>">Update</a>
    <a class="btn btn-sm btn-danger"
       onclick="return confirm('Delete shipment?')"
       href="../actions/courier_action.php?delete=<?= $row['courier_id'] ?>">Delete</a>
  </td>
</tr>
<?php } ?>
</table>

<?php include "../includes/footer.php"; ?>
