<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Courier Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    font-family:'Segoe UI',sans-serif;
}

/* NAVBAR */
.navbar{
    background: linear-gradient(135deg,#667eea,#764ba2);
    box-shadow:0 10px 30px rgba(0,0,0,0.25);
}

.navbar-brand{
    font-weight:700;
}

.nav-link{
    font-weight:500;
    margin-left:15px;
}

/* HERO */
.hero{
    min-height:100vh;
    background: linear-gradient(135deg,#667eea,#764ba2);
    color:#fff;
    display:flex;
    align-items:center;
}

.hero h1{ font-size:3rem; font-weight:700; }
.hero p{ font-size:1.1rem; opacity:.9; }

.btn-main{
    background:#fff;
    color:#764ba2;
    font-weight:600;
    border-radius:30px;
    padding:12px 30px;
}

.btn-outline{
    border:2px solid #fff;
    color:#fff;
    border-radius:30px;
    padding:12px 30px;
}

/* FEATURES */
.features{ padding:80px 0; }

.feature-box{
    background:#fff;
    border-radius:16px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
    transition:.3s;
}

.feature-box:hover{ transform:translateY(-8px); }

/* CTA */
.cta{
    background: linear-gradient(135deg,#667eea,#764ba2);
    color:#fff;
    padding:80px 0;
}
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark position-absolute w-100">
  <div class="container">
    <a class="navbar-brand" href="/courier_managment_system/index.php">🚚 Courier System</a>
    <div>
      <a href="/courier_managment_system/auth/login.php" class="btn btn-outline-light btn-sm me-2">Login</a>
      <a href="/courier_managment_system/auth/register.php" class="btn btn-light btn-sm">Register</a>
    </div>
  </div>
</nav>
