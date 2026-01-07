<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

$total = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers"))[0];
$in    = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers WHERE status='IN_TRANSIT'"))[0];
$del   = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers WHERE status='DELIVERED'"))[0];
?>

<div class="dashboard-wrapper">

<h2 class="dashboard-title">
    🚚 Courier Management Dashboard
</h2>
<p class="dashboard-subtitle">Real-time shipment insights & controls</p>

<div class="row g-4 mt-4">

    <!-- CARD -->
    <div class="col-lg-4">
        <div class="neo-card">
            <div class="icon-circle">
                <i class="bi bi-box-seam"></i>
            </div>
            <h6>Total Shipments</h6>
            <h1><?= $total ?></h1>
            <span>Overall records</span>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="neo-card warning">
            <div class="icon-circle">
                <i class="bi bi-truck"></i>
            </div>
            <h6>In Transit</h6>
            <h1><?= $in ?></h1>
            <span>On the way</span>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="neo-card success">
            <div class="icon-circle">
                <i class="bi bi-check-circle"></i>
            </div>
            <h6>Delivered</h6>
            <h1><?= $del ?></h1>
            <span>Completed orders</span>
        </div>
    </div>

</div>

<!-- ACTION BAR -->
<div class="action-bar mt-5">

    <a href="add_courier.php" class="neo-btn primary">
        <i class="bi bi-plus-circle"></i> Add Shipment
    </a>

    <a href="manage_courier.php" class="neo-btn info">
        <i class="bi bi-kanban"></i> Manage Shipments
    </a>

    <a href="reports.php" class="neo-btn success">
        <i class="bi bi-bar-chart"></i> Reports
    </a>

</div>

</div>

<style>
body{
    background: radial-gradient(circle at top, #0a1a2f, #000);
    color: #fff;
    font-family: 'Segoe UI', sans-serif;
}

.dashboard-wrapper{
    padding: 30px;
}

/* TITLE */
.dashboard-title{
    text-align:center;
    font-weight:800;
    color:#6ec1ff;
    text-shadow:0 0 20px rgba(110,193,255,0.9);
}

.dashboard-subtitle{
    text-align:center;
    color:#9fbcd9;
}

/* CARD */
.neo-card{
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(15px);
    border-radius: 25px;
    padding: 35px;
    text-align:center;
    border:1px solid rgba(110,193,255,0.4);
    box-shadow: 0 0 30px rgba(110,193,255,0.4);
    transition:0.4s;
}

.neo-card:hover{
    transform: translateY(-12px) scale(1.04);
    box-shadow: 0 0 55px rgba(110,193,255,0.9);
}

/* ICON */
.icon-circle{
    width:80px;
    height:80px;
    margin:auto;
    border-radius:50%;
    background: linear-gradient(135deg,#6ec1ff,#0d6efd);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:36px;
    box-shadow:0 0 25px rgba(110,193,255,0.9);
}

.neo-card h6{
    margin-top:20px;
    font-size:15px;
    letter-spacing:1px;
    color:#9fbcd9;
}

.neo-card h1{
    font-size:55px;
    font-weight:800;
    color:#fff;
}

.neo-card span{
    color:#7aaedb;
}

/* VARIANTS */
.neo-card.warning{
    border-color:#ffc107;
    box-shadow:0 0 25px rgba(255,193,7,0.5);
}
.neo-card.success{
    border-color:#28a745;
    box-shadow:0 0 25px rgba(40,167,69,0.5);
}

/* BUTTONS */
.action-bar{
    display:flex;
    justify-content:center;
    gap:25px;
    flex-wrap:wrap;
}

.neo-btn{
    padding:14px 30px;
    border-radius:50px;
    font-size:16px;
    text-decoration:none;
    color:#fff;
    display:flex;
    align-items:center;
    gap:10px;
    transition:0.3s;
    box-shadow:0 0 25px rgba(110,193,255,0.6);
}

.neo-btn:hover{
    transform:scale(1.1);
    box-shadow:0 0 45px rgba(110,193,255,1);
}

.neo-btn.primary{background:#0d6efd;}
.neo-btn.info{background:#17a2b8;}
.neo-btn.success{background:#28a745;}
</style>

<?php include "../includes/footer.php"; ?>
