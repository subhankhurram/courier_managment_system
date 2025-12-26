<?php
include "../includes/auth_check.php";
include "../includes/header.php";
?>

<h4>Add Customer</h4>

<form method="POST" action="../actions/customer_action.php">
  <input class="form-control mb-2" name="name" placeholder="Customer Name" required>
  <input class="form-control mb-2" name="phone" placeholder="Phone" required>
  <input class="form-control mb-2" name="email" placeholder="Email">
  <textarea class="form-control mb-2" name="address" placeholder="Address"></textarea>
  <button class="btn btn-primary" name="add_customer">Add Customer</button>
</form>

<?php include "../includes/footer.php"; ?>
