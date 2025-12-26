<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'AGENT') die("Access Denied");
?>

<h4>Add Courier (Agent)</h4>

<form method="POST" action="../actions/courier_action.php">

  <select name="sender_id" class="form-control mb-2" required>
    <option value="">Select Customer</option>
    <?php
    $c = mysqli_query($conn,"SELECT * FROM customers");
    while ($row = mysqli_fetch_assoc($c)) {
      echo "<option value='{$row['customer_id']}'>{$row['name']}</option>";
    }
    ?>
  </select>

  <input class="form-control mb-2" name="receiver_name" placeholder="Receiver Name" required>
  <input class="form-control mb-2" name="receiver_phone" placeholder="Receiver Phone" required>
  <textarea class="form-control mb-2" name="receiver_address" placeholder="Address"></textarea>

  <input class="form-control mb-2" name="courier_type" placeholder="Parcel / Document">
  <input class="form-control mb-2" name="courier_company" placeholder="Courier Company">
  <input class="form-control mb-2" type="date" name="expected_delivery">

  <button class="btn btn-primary" name="add_courier">
    Add Courier
  </button>
</form>

<?php include "../includes/footer.php"; ?>
