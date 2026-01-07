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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body{ background:#f4f6f9; }

        .navbar{
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            box-shadow:0 4px 15px rgba(0,0,0,0.2);
            animation: dropDown 0.8s ease;
        }

        @keyframes dropDown{ from{transform:translateY(-30px);opacity:0;} to{transform:translateY(0);opacity:1;} }

        .navbar-brand{ font-weight:700; letter-spacing:1px; }
        .nav-link{ position:relative; font-weight:500; margin-left:15px; }
        .nav-link::after{
            content:'';
            position:absolute;
            width:0; height:2px; left:0; bottom:5px; background:#fff; transition:0.3s;
        }
        .nav-link:hover::after{ width:100%; }

        .container{ animation: fadeIn 0.8s ease; }
        @keyframes fadeIn{ from{opacity:0;} to{opacity:1;} 
      }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">🚚 Courier System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#cmsNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="cmsNav">
        <ul class="navbar-nav ms-auto">
            <?php if (isset($_SESSION['role'])): ?>
                <?php if ($_SESSION['role'] === 'ADMIN'): ?>
                    <li class="nav-item"><a class="nav-link" href="../admin/dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <?php elseif ($_SESSION['role'] === 'AGENT'): ?>
                    <li class="nav-item"><a class="nav-link" href="../agent/dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <?php elseif ($_SESSION['role'] === 'CUSTOMER'): ?>
                    <li class="nav-item"><a class="nav-link" href="../customer/dashboard.php"><i class="bi bi-box-seam"></i> My Shipments</a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link text-warning" href="../auth/logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
