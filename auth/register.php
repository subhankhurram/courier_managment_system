<?php
session_start();
include "../config/db.php";
include "../includes/header.php";

// Handle registration
if (isset($_POST['register'])) {

    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $city  = trim($_POST['city']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = mysqli_prepare($conn, "SELECT user_id FROM users WHERE email=?");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);

    if (mysqli_stmt_num_rows($check) > 0) {
        echo "<div class='alert alert-danger mt-2'>Email already registered</div>";
    } else {
        // Insert into users table
        $stmt = mysqli_prepare($conn, "INSERT INTO users (role, name, email, phone, password, city, status) VALUES ('CUSTOMER', ?, ?, ?, ?, ?, 1)");
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $password, $city);
        mysqli_stmt_execute($stmt);

        // Insert into customers table
        $stmt2 = mysqli_prepare($conn, "INSERT INTO customers (name, phone, email) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt2, "sss", $name, $phone, $email);
        mysqli_stmt_execute($stmt2);

        echo "<div class='alert alert-success mt-2'>Registration successful. <a href='login.php'>Login here</a></div>";
    }
}
?>

<h4>User Registration</h4>

<form method="POST" action="">
  <div class="mb-2">
    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
  </div>
  <div class="mb-2">
    <input type="email" name="email" class="form-control" placeholder="Email" required>
  </div>
  <div class="mb-2">
    <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
  </div>
  <div class="mb-2">
    <input type="password" name="password" class="form-control" placeholder="Password" required>
  </div>
  <div class="mb-2">
    <input type="text" name="city" class="form-control" placeholder="City">
  </div>
  <button type="submit" name="register" class="btn btn-primary">Register</button>
</form>

<?php include "../includes/footer.php"; ?>
