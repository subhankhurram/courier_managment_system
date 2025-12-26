<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";
?>

<h4>Manage Customers</h4>

<table class="table table-bordered">
<tr>
  <th>Name</th><th>Phone</th><th>Email</th><th>Action</th>
</tr>

<?php
$res = mysqli_query($conn,"SELECT * FROM customers");
while ($row = mysqli_fetch_assoc($res)) {
?>
<tr>
  <td><?= $row['name'] ?></td>
  <td><?= $row['phone'] ?></td>
  <td><?= $row['email'] ?></td>
  <td>
    <a class="btn btn-danger btn-sm"
       href="../actions/customer_action.php?delete=<?= $row['customer_id'] ?>"
       onclick="return confirm('Delete customer?')">Delete</a>
  </td>
</tr>
<?php } ?>
</table>

<?php include "../includes/footer.php"; ?>
