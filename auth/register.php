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

<?php include "../includes/header.php"; ?>

<!-- REGISTER FORM -->
<section class="auth-section d-flex align-items-center justify-content-center py-5" style="min-height:80vh;">
    <div class="auth-box bg-gray-dark p-4 p-md-5 rounded-3 shadow-lg" style="max-width:400px; width:100%;">

        <div class="text-center mb-4">
            <h3 class="text-white fw-bold">Create Account</h3>
            <p class="text-gray mb-0">Register as a customer</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger text-center py-2">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success text-center py-2">
                <?= $success ?><br>
                <a href="login.php" class="text-accent">Login here</a>
            </div>
        <?php endif; ?>

        <form method="POST" class="form-floating-form">

            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control bg-dark text-white border-0" id="name" placeholder="Full Name" required>
                <label for="name" class="text-gray">Full Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control bg-dark text-white border-0" id="email" placeholder="Email Address" required>
                <label for="email" class="text-gray">Email Address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="phone" class="form-control bg-dark text-white border-0" id="phone" placeholder="Phone Number" required>
                <label for="phone" class="text-gray">Phone Number</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control bg-dark text-white border-0" id="password" placeholder="Password" required>
                <label for="password" class="text-gray">Password</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" name="city" class="form-control bg-dark text-white border-0" id="city" placeholder="City">
                <label for="city" class="text-gray">City</label>
            </div>

            <button type="submit" name="register" class="btn btn-accent w-100 py-2 fw-bold">Register</button>
        </form>

        <div class="text-center mt-3 text-gray">
            <small>
                Already have an account? <a href="login.php" class="text-accent">Login</a>
            </small>
        </div>

    </div>
</section>

<?php include "../includes/footer.php"; ?>

<!-- Custom Styles -->
<style>
/* THEME COLORS */
.auth-section { background-color: #0d0d0d; }
.bg-gray-dark { background-color: #1f1f1f; }
.text-gray { color: #b0b0b0; }
.text-accent { color: #ff4b2b; }

/* Floating label styles */
.form-floating-form .form-floating {
    position: relative;
}
.form-floating-form .form-control {
    background-color: #222;
    border-radius: 12px;
    height: 50px;
    padding: 1rem 0.75rem 0.25rem 0.75rem;
    color: #fff;
}
.form-floating-form label {
    position: absolute;
    top: 12px;
    left: 0.75rem;
    color: #888;
    transition: all 0.3s ease;
    pointer-events: none;
}

/* Move label when input focused or has value */
.form-floating-form .form-control:focus + label,
.form-floating-form .form-control:not(:placeholder-shown) + label {
    top: -10px;
    left: 0.75rem;
    font-size: 0.85rem;
    color: #ff4b2b;
}

/* Input focus */
.form-control:focus {
    box-shadow: none;
    border: 1px solid #ff4b2b;
}

/* Buttons */
.btn-accent {
    background-color: #ff4b2b;
    color: #fff;
    border-radius: 30px;
    transition: all 0.3s;
}
.btn-accent:hover {
    background-color: #ff652f;
    transform: scale(1.05);
}

/* Alerts */
.alert {
    border-radius: 12px;
}

/* Fade-up animation */
.auth-box {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeUp 0.8s ease forwards;
}
@keyframes fadeUp {
    to { opacity: 1; transform: translateY(0); }
}
</style>
