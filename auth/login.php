<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../includes/header.php";
?>

<h4>Login</h4>

<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'invalid_password') {
        echo "<div class='alert alert-danger'>Invalid Password</div>";
    }
    if ($_GET['error'] == 'user_not_found') {
        echo "<div class='alert alert-danger'>User not found</div>";
    }
}
?>

<form method="POST" action="login_action.php">

  <div class="mb-2">
    <input type="email" name="email" class="form-control" placeholder="Email" required>
  </div>

  <div class="mb-2">
    <input type="password" name="password" class="form-control" placeholder="Password" required>
  </div>

  <button type="submit" class="btn btn-primary">Login</button>

</form>

<?php include "../includes/footer.php"; ?>
