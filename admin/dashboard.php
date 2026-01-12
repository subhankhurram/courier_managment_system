<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php"; // navbar included

// Fetch stats
$total = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers"))[0];
$in    = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers WHERE status='IN_TRANSIT'"))[0];
$del   = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers WHERE status='DELIVERED'"))[0];
?>

<!-- HERO DASHBOARD -->
<section class="hero" style="min-height:70vh; display:flex; align-items:center; justify-content:center; flex-direction:column; text-align:center; padding-top:50px; padding-bottom:50px;">
    <div class="container">

        <h1 class="fw-bold mb-3">🚚 Admin Dashboard</h1>
        <p class="text-white-50 mb-5">Monitor shipments, manage orders, and get real-time insights.</p>

        <!-- CARDS -->
        <div class="row justify-content-center g-4">

            <!-- Total Shipments -->
            <div class="col-md-3">
                <div class="neo-card">
                    <div class="icon-circle bg-gradient-primary">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <h6>Total Shipments</h6>
                    <h1><?= $total ?></h1>
                    <span>Overall records</span>
                </div>
            </div>

            <!-- In Transit -->
            <div class="col-md-3">
                <div class="neo-card warning">
                    <div class="icon-circle bg-gradient-warning">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h6>In Transit</h6>
                    <h1><?= $in ?></h1>
                    <span>On the way</span>
                </div>
            </div>

            <!-- Delivered -->
            <div class="col-md-3">
                <div class="neo-card success">
                    <div class="icon-circle bg-gradient-success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <h6>Delivered</h6>
                    <h1><?= $del ?></h1>
                    <span>Completed orders</span>
                </div>
            </div>

        </div>

        <!-- ACTION BUTTONS -->
        <div class="action-bar mt-5 flex-wrap justify-content-center">
            <a href="add_courier.php" class="neo-btn primary"><i class="bi bi-plus-circle"></i> Add Shipment</a>
            <a href="manage_courier.php" class="neo-btn info"><i class="bi bi-kanban"></i> Manage Shipments</a>
            <a href="reports.php" class="neo-btn success"><i class="bi bi-bar-chart"></i> Reports</a>
        </div>

    </div>
</section>

<style>
/* =========================
   DASHBOARD THEME (Index-style)
========================= */
.neo-card{
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(12px);
    border-radius: 20px;
    padding: 30px;
    text-align:center;
    border:1px solid rgba(255,255,255,0.2);
    box-shadow: 0 0 25px rgba(0,0,0,0.2);
    transition:0.4s;
}
.neo-card:hover{
    transform: translateY(-8px) scale(1.03);
    box-shadow:0 0 50px rgba(0,0,0,0.3);
}

.neo-card h6{
    margin-top:15px;
    font-size:15px;
    color:#ccc;
}

.neo-card h1{
    font-size:45px;
    font-weight:700;
    color:#fff;
}

.neo-card span{
    color:#aaa;
    font-size:13px;
}

.icon-circle{
    width:70px;
    height:70px;
    margin:auto;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    margin-bottom:15px;
    background: linear-gradient(135deg,#667eea,#764ba2);
    box-shadow:0 0 20px rgba(102,126,234,0.6);
}

.icon-circle.bg-gradient-warning{
    background: linear-gradient(135deg,#fbbf24,#f59e0b);
    box-shadow:0 0 20px rgba(251,191,36,0.6);
}
.icon-circle.bg-gradient-succe
