<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'ADMIN') {
    die("Access Denied");
}
?>

<h4>Add New Courier</h4>

<form method="POST" action="../actions/courier_action.php">

  <!-- Sender (Customer) -->
  <div class="mb-2">
    <label>Sender (Customer)</label>
    <select name="sender_id" class="form-control" required>
      <option value="">Select Customer</option>
      <?php
      $customers = mysqli_query($conn, "SELECT * FROM customers");
      while ($c = mysqli_fetch_assoc($customers)) {
        echo "<option value='{$c['customer_id']}'>{$c['name']} - {$c['phone']}</option>";
      }
      ?>
    </select>
  </div>

  <!-- Receiver -->
  <div class="mb-2">
    <label>Receiver Name</label>
    <input type="text" name="receiver_name" class="form-control" required>
  </div>

  <div class="mb-2">
    <label>Receiver Phone</label>
    <input type="text" name="receiver_phone" class="form-control" required>
  </div>

  <div class="mb-2">
    <label>Receiver Address</label>
    <textarea name="receiver_address" class="form-control" required></textarea>
  </div>

  <!-- Courier Info -->
  <div class="mb-2">
    <label>Courier Type</label>
    <input type="text" name="courier_type" class="form-control" placeholder="Document / Parcel" required>
  </div>

  <div class="mb-2">
    <label>Courier Company</label>
    <input type="text" name="courier_company" class="form-control" required>
  </div>

  <div class="mb-2">
    <label>Expected Delivery Date</label>
    <input type="date" name="expected_delivery" class="form-control" required>
  </div>

  <button class="btn btn-primary" name="add_courier">
    Add Courier
  </button>

</form>

<?php include "../includes/footer.php"; ?>
