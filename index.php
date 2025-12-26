<?php session_start(); ?>
<form method="POST" action="auth/login.php">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Login</button>
    <?php include "includes/header.php"; ?>

<div class="row justify-content-center">
  <div class="col-md-4">
    <div class="card shadow">
      <div class="card-header text-center">
        <h4>Login</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="auth/login.php">
          <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
          <input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
          <button class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>

</form>
