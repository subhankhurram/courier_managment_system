<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'AGENT') die("Access Denied");

$branch = $_SESSION['branch'];

$total = mysqli_fetch_row(
    mysqli_query($conn, "SELECT COUNT(*) FROM couriers WHERE branch='$branch'")
)[0];

$in_transit = mysqli_fetch_row(
    mysqli_query($conn,
    "SELECT COUNT(*) FROM couriers WHERE branch='$branch' AND status='IN_TRANSIT'")
)[0];

$delivered = mysqli_fetch_row(
    mysqli_query($conn,
    "SELECT COUNT(*) FROM couriers WHERE branch='$branch' AND status='DELIVERED'")
)[0];
?>

<section class="dashboard-section py-5" style="min-height:85vh;">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white">📦 Agent Dashboard</h2>
            <p class="text-gray">Branch: <span class="text-accent fw-semibold"><?= htmlspecialchars($branch) ?></span></p>
        </div>

        <!-- Stats -->
        <div class="row g-4 mb-5">

            <div class="col-md-4">
                <div class="neo-card">
                    <div class="icon-circle accent">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <h6>Total Shipments</h6>
                    <h1><?= $total ?></h1>
                </div>
            </div>

            <div class="col-md-4">
                <div class="neo-card info">
                    <div class="icon-circle info">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h6>In Transit</h6>
                    <h1><?= $in_transit ?></h1>
                </div>
            </div>

            <div class="col-md-4">
                <div class="neo-card success">
                    <div class="icon-circle success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <h6>Delivered</h6>
                    <h1><?= $delivered ?></h1>
                </div>
            </div>

        </div>

        <!-- Actions -->
        <div class="text-center">
            <a href="add_courier.php" class="neo-btn accent me-3">
                ➕ Add Shipment
            </a>
            <a href="manage_courier.php" class="neo-btn info">
                📋 Manage Shipments
            </a>
        </div>

    </div>
</section>

<style>
.dashboard-section{
    background: linear-gradient(135deg,#000000,#0f2027);
}

/* Text */
.text-gray{color:#b0b0b0}
.text-accent{color:#ff4b2b}

/* Cards */
.neo-card{
    background:#1f1f1f;
    border-radius:22px;
    padding:30px;
    text-align:center;
    border:1px solid rgba(255,255,255,.08);
    box-shadow:0 0 30px rgba(0,0,0,.4);
    transition:.4s;
}
.neo-card:hover{
    transform:translateY(-10px) scale(1.04);
    box-shadow:0 0 40px rgba(255,75,43,.4);
}
.neo-card h6{
    color:#aaa;
    font-size:14px;
    margin-bottom:8px;
}
.neo-card h1{
    color:#fff;
    font-size:42px;
    font-weight:800;
}

/* Icons */
.icon-circle{
    width:70px;height:70px;
    border-radius:50%;
    margin:0 auto 14px;
    display:flex;align-items:center;justify-content:center;
    font-size:30px;
}
.icon-circle.accent{
    background:#ff4b2b;
    box-shadow:0 0 25px rgba(255,75,43,.6);
}
.icon-circle.info{
    background:#0dcaf0;
    box-shadow:0 0 25px rgba(13,202,240,.6);
}
.icon-circle.success{
    background:#22c55e;
    box-shadow:0 0 25px rgba(34,197,94,.6);
}

/* Buttons */
.neo-btn{
    padding:14px 32px;
    border-radius:30px;
    color:#fff;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
    display:inline-block;
}
.neo-btn.accent{background:#ff4b2b}
.neo-btn.info{background:#0dcaf0}
.neo-btn:hover{
    transform:scale(1.08);
    box-shadow:0 0 25px rgba(255,255,255,.3);
}
</style>

<?php include "../includes/footer.php"; ?>
