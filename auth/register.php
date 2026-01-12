<?php
session_start();
include "../config/db.php";

$success = "";
$error   = "";

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
        $error = "Email already registered";
    } else {
        // Insert into users table
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO users (role, name, email, phone, password, city, status)
             VALUES ('CUSTOMER', ?, ?, ?, ?, ?, 1)"
        );
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $password, $city);
        mysqli_stmt_execute($stmt);

        // Insert into customers table
        $stmt2 = mysqli_prepare(
            $conn,
            "INSERT INTO customers (name, phone, email)
             VALUES (?, ?, ?)"
        );
        mysqli_stmt_bind_param($stmt2, "sss", $name, $phone, $email);
        mysqli_stmt_execute($stmt2);

        $success = "Registration successful. You can login now.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register | Courier System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    height:100vh;
    background: linear-gradient(135deg,#667eea,#764ba2);
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Segoe UI',sans-serif;
}

.register-box{
    width:380px;
    background:#ffffff;
    border-radius:16px;
    padding:35px;
    box-shadow:0 20px 50px rgba(0,0,0,0.25);
    animation: fadeUp .8s ease;
}

@keyframes fadeUp{
    from{opacity:0; transform:translateY(30px);}
    to{opacity:1; transform:translateY(0);}
}

.form-control{
    height:48px;
    border-radius:10px;
}

.form-control:focus{
    box-shadow:none;
    border-color:#667eea;
}

.btn-register{
    height:48px;
    border-radius:10px;
    font-weight:600;
    background: linear-gradient(135deg,#667eea,#764ba2);
    border:none;
}

.brand{
    position:absolute;
    top:25px;
    left:30px;
    color:#fff;
    font-weight:600;
}
</style>
</head>

<body>

<div class="brand">🚚 Courier System</div>

<div class="register-box">

    <div class="text-center mb-3">
        <h3>Create Account</h3>
        <p class="text-muted">Register as a customer</p>
    </div>

    <?php if ($error): ?>
        <div class="alert alert-danger text-center py-2">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success text-center py-2">
            <?= $success ?><br>
            <a href="login.php">Login here</a>
        </div>
    <?php endif; ?>

    <form method="POST">

        <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>

        <input type="email" name="email" class="form-control mb-3" placeholder="Email Address" required>

        <input type="text" name="phone" class="form-control mb-3" placeholder="Phone Number" required>

        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

        <input type="text" name="city" class="form-control mb-4" placeholder="City">

        <button type="submit" name="register" class="btn btn-register w-100 text-white">
            Register
        </button>

    </form>

    <div class="text-center mt-3">
        <small>
            Already have an account?
            <a href="login.php">Login</a>
        </small>
    </div>

</div>

</body>
</html>
