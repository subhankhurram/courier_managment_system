<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'ADMIN') {
    die("Access Denied");
}
?>

<h4>Manage Agents</h4>

<a href="add_agent.php" class="btn btn-primary mb-3">Add New Agent</a>

<table class="table table-bordered table-striped">
  <tr class="table-dark">
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>City</th>
    <th>Branch</th>
    <th>Status</th>
    <th>Action</th>
  </tr>

<?php
$query = "
SELECT u.user_id, u.name, u.email, u.phone, u.city, u.branch, u.status
FROM users u
WHERE u.role='AGENT'
";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
  <td><?= $row['name']; ?></td>
  <td><?= $row['email']; ?></td>
  <td><?= $row['phone']; ?></td>
  <td><?= $row['city']; ?></td>
  <td><?= $row['branch']; ?></td>
  <td>
    <?= ($row['status'] == 1) ? 'Active' : 'Inactive'; ?>
  </td>
  <td>
    <a href="delete_agent.php?id=<?= $row['user_id']; ?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Delete this agent?')">
       Delete
    </a>
  </td>
</tr>
<?php } ?>
</table>

<?php include "../includes/footer.php"; ?>
