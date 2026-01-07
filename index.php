<?php session_start(); ?>
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
    font-family: 'Segoe UI', sans-serif;
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

.login-box h3{
    font-weight:600;
    margin-bottom:5px;
}

.login-box p{
    font-size:14px;
    color:#6c757d;
    margin-bottom:25px;
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

.btn-login:hover{
    opacity:.9;
}

.brand{
    position:absolute;
    top:25px;
    left:30px;
    color:#fff;
    font-weight:600;
    letter-spacing:.5px;
}
</style>
</head>

<body>

<div class="brand">🚚 Courier System</div>

<div class="login-box">
    <div class="text-center mb-3">
        <h3>Welcome Back</h3>
        <p>Login to your account</p>
    </div>

    <form method="POST" action="auth/login.php">
        <input type="email" name="email" class="form-control mb-3" placeholder="Email Address" required>
        <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>

        <button class="btn btn-login w-100 text-white">Login</button>
    </form>
</div>

</body>
</html>
