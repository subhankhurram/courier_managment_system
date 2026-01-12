<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | Courier System</title>

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

.login-box{
    width:360px;
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

.btn-login{
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

<div class="login-box">

    <div class="text-center mb-3">
        <h3>Welcome Back</h3>
        <p class="text-muted">Login to your account</p>
    </div>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger text-center py-2">
            <?php
                if ($_GET['error'] === 'invalid_password') {
                    echo "Invalid Password";
                } elseif ($_GET['error'] === 'user_not_found') {
                    echo "User not found or inactive";
                }
            ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="login_action.php">
        <input type="email" name="email" class="form-control mb-3" placeholder="Email Address" required>
        <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>
        <button class="btn btn-login w-100 text-white">Login</button>
    </form>

    <div class="text-center mt-3">
        <small>
            Don't have an account?
            <a href="register.php">Register</a>
        </small>
    </div>

</div>

</body>
</html>
