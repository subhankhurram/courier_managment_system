<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

/* Stats */
$total = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers"))[0];
$in    = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers WHERE status='IN_TRANSIT'"))[0];
$del   = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM couriers WHERE status='DELIVERED'"))[0];
?>

<!-- ADMIN DASHBOARD -->
<section class="auth-section d-flex align-items-center justify-content-center py-5"
         style="min-height:85vh;">

    <div class="container text-center">

        <div class="mb-5">
            <h1 class="fw-bold text-white mb-2">🚚 Admin Dashboard</h1>
            <p class="text-gray">
                Monitor shipments and system activity
            </p>
        </div>

        <!-- STATS -->
        <div class="row justify-content-center g-4">

            <div class="col-md-3">
                <div class="neo-card">
                    <div class="icon-circle accent">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <h6>Total Shipments</h6>
                    <h1><?= $total ?></h1>
                    <span>All records</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="neo-card warning">
                    <div class="icon-circle warning">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h6>In Transit</h6>
                    <h1><?= $in ?></h1>
                    <span>On the way</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="neo-card success">
                    <div class="icon-circle success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <h6>Delivered</h6>
                    <h1><?= $del ?></h1>
                    <span>Completed</span>
                </div>
            </div>

        </div>

        <!-- ACTIONS -->
       <!-- ACTIONS -->
<div class="action-bar mt-5 d-flex gap-3 justify-content-center flex-wrap">

<a href="add_agent.php" class="neo-btn accent">
    <i class="bi bi-person-plus"></i> Add Agent
</a>

<a href="add_customer.php" class="neo-btn accent">
    <i class="bi bi-person-plus-fill"></i> Add Customer
</a>

<a href="add_courier.php" class="neo-btn accent">
    <i class="bi bi-plus-circle"></i> Add Shipment
</a>

<a href="manage_agents.php" class="neo-btn info">
    <i class="bi bi-people"></i> Manage Agents
</a>

<a href="manage_customer.php" class="neo-btn info">
    <i class="bi bi-people-fill"></i> Manage Customers
</a>

<a href="manage_courier.php" class="neo-btn info">
    <i class="bi bi-kanban"></i> Manage Shipments
</a>

<a href="create_bill.php" class="neo-btn warning">
    <i class="bi bi-receipt"></i> Create Bill
</a>
<!-- 
<a href="billing_action.php" class="neo-btn warning">
    <i class="bi bi-wallet2"></i> Billing Actions
</a> -->

<a href="update_courier.php" class="neo-btn success">
    <i class="bi bi-pencil-square"></i> Update Shipment
</a>

<a href="reports.php" class="neo-btn success">
    <i class="bi bi-bar-chart"></i> Reports
</a>

</div>


    </div>
</section>

<style>
/* SAME GLOBAL THEME */
.auth-section{
    background:linear-gradient(135deg,#000000,#0f2027);
}
.text-gray{
    color:#b0b0b0;
}

/* Cards */
.neo-card{
    background:#1f1f1f;
    border-radius:22px;
    padding:32px 25px;
    border:1px solid rgba(255,255,255,0.08);
    box-shadow:0 0 25px rgba(0,0,0,.4);
    transition:.4s;
}
.neo-card:hover{
    transform:translateY(-10px) scale(1.04);
    box-shadow:0 0 40px rgba(255,75,43,.4);
}
.neo-card h6{
    margin-top:14px;
    font-size:14px;
    color:#aaa;
}
.neo-card h1{
    font-size:44px;
    font-weight:800;
    color:#fff;
}
.neo-card span{
    font-size:13px;
    color:#888;
}

/* Icons */
.icon-circle{
    width:72px;
    height:72px;
    margin:auto;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
    margin-bottom:14px;
    background:#ff4b2b;
    box-shadow:0 0 25px rgba(255,75,43,.6);
}
.icon-circle.warning{
    background:#f59e0b;
    box-shadow:0 0 25px rgba(245,158,11,.6);
}
.icon-circle.success{
    background:#22c55e;
    box-shadow:0 0 25px rgba(34,197,94,.6);
}

/* Buttons */
.neo-btn{
    padding:14px 26px;
    border-radius:30px;
    font-weight:600;
    text-decoration:none;
    color:#fff;
    transition:.3s;
    display:inline-flex;
    gap:10px;
    align-items:center;
}
.neo-btn.accent{
    background:#ff4b2b;
}
.neo-btn.info{
    background:#0dcaf0;
}
.neo-btn.success{
    background:#22c55e;
}
.neo-btn:hover{
    transform:scale(1.08);
    box-shadow:0 0 25px rgba(255,255,255,.3);
}
</style>

<?php include "../includes/footer.php"; ?>
