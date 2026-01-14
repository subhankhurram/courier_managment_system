<?php
include "includes/auth_check.php";
include "includes/header.php";
?>

<section class="auth-section py-5" style="min-height:85vh;">
    <div class="container text-center">

        <!-- Hero -->
        <h2 class="fw-bold text-white mb-3">🚀 Features Dashboard</h2>
        <p class="text-gray mb-5">Quick access to all system functionalities with neon-glass style.</p>

        <!-- Feature Cards -->
        <div class="row g-4 justify-content-center">

            <div class="col-md-3">
                <a href="add_courier.php" class="feature-card">
                    <div class="icon-circle accent"><i class="bi bi-plus-circle"></i></div>
                    <h5>Add Shipment</h5>
                    <p>Create new courier entries</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="manage_courier.php" class="feature-card">
                    <div class="icon-circle info"><i class="bi bi-kanban"></i></div>
                    <h5>Manage Shipments</h5>
                    <p>View, update, or delete shipments</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="manage_customers.php" class="feature-card">
                    <div class="icon-circle success"><i class="bi bi-people"></i></div>
                    <h5>Customers</h5>
                    <p>Manage customers & contact info</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="billing.php" class="feature-card">
                    <div class="icon-circle danger"><i class="bi bi-cash-stack"></i></div>
                    <h5>Billing</h5>
                    <p>Generate and manage bills</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="reports.php" class="feature-card">
                    <div class="icon-circle accent"><i class="bi bi-bar-chart"></i></div>
                    <h5>Reports</h5>
                    <p>View analytics and reports</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="agents.php" class="feature-card">
                    <div class="icon-circle success"><i class="bi bi-person-badge"></i></div>
                    <h5>Agents</h5>
                    <p>Manage system agents</p>
                </a>
            </div>

        </div>
    </div>
</section>

<style>
.auth-section{
    background: linear-gradient(135deg,#000000,#0f2027);
}

/* Text */
.text-gray{color:#b0b0b0}

/* Feature Cards */
.feature-card{
    display:block;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(15px);
    border-radius:20px;
    padding:25px;
    text-decoration:none;
    color:#fff;
    transition: 0.3s;
    text-align:center;
    border:1px solid rgba(255,255,255,0.1);
}
.feature-card:hover{
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 0 30px rgba(255,75,43,0.5);
}

/* Icons */
.icon-circle{
    width:70px;
    height:70px;
    border-radius:50%;
    margin:0 auto 15px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
}
.icon-circle.accent{background:#ff4b2b; box-shadow:0 0 25px rgba(255,75,43,.6);}
.icon-circle.success{background:#22c55e; box-shadow:0 0 25px rgba(34,197,94,.6);}
.icon-circle.info{background:#0dcaf0; box-shadow:0 0 25px rgba(13,202,240,.6);}
.icon-circle.danger{background:#dc3545; box-shadow:0 0 25px rgba(220,53,69,.6);}

/* Card Text */
.feature-card h5{
    font-weight:700;
    margin-bottom:8px;
    color:#fff;
}
.feature-card p{
    font-size:14px;
    color:#b0b0b0;
}

/* Responsive */
@media(max-width:768px){
    .icon-circle{width:60px;height:60px;font-size:26px;}
}
</style>

<?php include "includes/footer.php"; ?>
