<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Smart Courier Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<style>
/* GENERAL STYLES */
body {
    font-family: 'Inter', sans-serif;
    background-color: #0d0d0d;
    color: #fff;
    margin: 0;
}

/* NAVBAR */
.navbar {
    background-color: #111;
    box-shadow: 0 4px 12px rgba(0,0,0,0.6);
    transition: background-color 0.3s;
}
.navbar.sticky-top.scrolled {
    background-color: #0a0a0a;
}

.navbar-brand {
    color: #ff4b2b;
    font-weight: 700;
    font-size: 1.5rem;
}

.navbar-nav .nav-link {
    color: #b0b0b0;
    font-weight: 500;
    margin-left: 15px;
    transition: color 0.3s;
}
.navbar-nav .nav-link:hover {
    color: #ff4b2b;
}

.btn-accent {
    background-color: #ff4b2b;
    color: #fff;
    border: none;
    font-weight: 600;
    border-radius: 30px;
    padding: 8px 25px;
    transition: all 0.3s;
}
.btn-accent:hover {
    background-color: #ff652f;
    transform: scale(1.05);
}

.btn-outline-light {
    border: 2px solid #fff;
    color: #fff;
    border-radius: 30px;
    padding: 8px 25px;
    transition: all 0.3s;
}
.btn-outline-light:hover {
    background-color: #ff4b2b;
    border-color: #ff4b2b;
    color: #fff;
}

/* HERO (optional if needed in header) */
.hero-dark {
    min-height: 100vh;
    background: linear-gradient(135deg, #0d0d0d, #1a1a1a);
    display: flex;
    align-items: center;
}

/* RESPONSIVE */
@media (max-width: 991px) {
    .navbar-nav .nav-link {
        margin-left: 0;
        margin-bottom: 10px;
    }
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top py-3">
  <div class="container">
    <a class="navbar-brand" href="/courier_managment_system/index.php"> Cargo Nest</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item">
          <a class="nav-link" href="/courier_managment_system/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/courier_managment_system/features.php">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/courier_managment_system/services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/courier_managment_system/testimonials.php">Testimonials</a>
        </li>
        <li class="nav-item ms-lg-3">
          <a href="/courier_managment_system/auth/register.php" class="btn btn-accent">Sign Up</a>
        </li>
        <li class="nav-item ms-2">
          <a href="/courier_managment_system/auth/login.php" class="btn btn-outline-light">Login</a>
        </li>
        <li class="nav-item ms-2">
          <a href="/courier_managment_system/auth/logout.php" class="btn btn-outline-light">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Optional: Sticky Navbar Scroll Effect -->
<script>
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if(window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
bhai meri baat suno jb hum login kreingein to sirf logot hi nzr ana chaiye us  