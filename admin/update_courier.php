<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'ADMIN') die("Access Denied");

$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM couriers WHERE courier_id=$id");
$row = mysqli_fetch_assoc($res);
?>

<h4>Update Courier</h4>

<form method="POST" action="../actions/courier_action.php">
  <input type="hidden" name="courier_id" value="<?= $row['courier_id'] ?>">

  <input class="form-control mb-2" name="receiver_name"
         value="<?= $row['receiver_name'] ?>" required>

  <input class="form-control mb-2" name="receiver_phone"
         value="<?= $row['receiver_phone'] ?>" required>

  <textarea class="form-control mb-2"
            name="receiver_address"><?= $row['receiver_address'] ?></textarea>

  <select class="form-control mb-2" name="status">
    <option <?= $row['status']=='BOOKED'?'selected':'' ?>>BOOKED</option>
    <option <?= $row['status']=='IN_TRANSIT'?'selected':'' ?>>IN_TRANSIT</option>
    <option <?= $row['status']=='DELIVERED'?'selected':'' ?>>DELIVERED</option>
  </select>

  <button class="btn btn-warning" name="update_courier">
    Update Courier
  </button>
</form>

<?php include "../includes/footer.php"; ?>
