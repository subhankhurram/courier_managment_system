<?php
include "includes/auth_check.php";
include "includes/header.php";
?>

<section class="auth-section py-5" style="min-height:85vh;">
    <div class="container text-center">

        <!-- Hero -->
        <h2 class="fw-bold text-white mb-3">🛠 Our Services</h2>
        <p class="text-gray mb-5">Explore all services offered by the courier management system</p>

        <!-- Service Cards -->
        <div class="row g-4 justify-content-center">

            <div class="col-md-3">
                <a href="add_courier.php" class="service-card accent">
                    <div class="icon-circle"><i class="bi bi-truck"></i></div>
                    <h5>Courier Booking</h5>
                    <p>Create new shipments quickly</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="manage_courier.php" class="service-card info">
                    <div class="icon-circle"><i class="bi bi-kanban"></i></div>
                    <h5>Shipment Management</h5>
                    <p>Track, update, or delete shipments</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="billing.php" class="service-card success">
                    <div class="icon-circle"><i class="bi bi-cash-stack"></i></div>
                    <h5>Billing</h5>
                    <p>Generate invoices and bills</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="reports.php" class="service-card danger">
                    <div class="icon-circle"><i class="bi bi-bar-chart"></i></div>
                    <h5>Reports & Analytics</h5>
                    <p>Monitor business performance</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="agents.php" class="service-card accent">
                    <div class="icon-circle"><i class="bi bi-person-badge"></i></div>
                    <h5>Agent Services</h5>
                    <p>Manage agent accounts and tasks</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="manage_customers.php" class="service-card info">
                    <div class="icon-circle"><i class="bi bi-people"></i></div>
                    <h5>Customer Support</h5>
                    <p>Manage customers & communication</p>
                </a>
            </div>

        </div>
    </div>
</section>

<style>
.auth-section{
    background: linear-gradient(135deg,#000000,#0f2027);
}
.text-gray{color:#b0b0b0}

/* Service Cards */
.service-card{
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
.service-card:hover{
    transform: translateY(-8px) scale(1.03);
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
    transition:0.4s;
}

/* Neon Glow Colors */
.service-card.accent .icon-circle{background:#ff4b2b;}
.service-card.info .icon-circle{background:#0dcaf0;}
.service-card.success .icon-circle{background:#22c55e;}
.service-card.danger .icon-circle{background:#dc3545;}

/* Card Glow on Hover per type */
.service-card.accent:hover .icon-circle{
    animation: glowPulseAccent 1.5s infinite alternate;
}
.service-card.info:hover .icon-circle{
    animation: glowPulseInfo 1.5s infinite alternate;
}
.service-card.success:hover .icon-circle{
    animation: glowPulseSuccess 1.5s infinite alternate;
}
.service-card.danger:hover .icon-circle{
    animation: glowPulseDanger 1.5s infinite alternate;
}

/* Glow Animations */
@keyframes glowPulseAccent {
    0% {box-shadow:0 0 15px #ff4b2b,0 0 30px rgba(255,75,43,0.6);transform:scale(1);}
    100% {box-shadow:0 0 30px #ff4b2b,0 0 50px rgba(255,75,43,0.8);transform:scale(1.1);}
}
@keyframes glowPulseInfo {
    0% {box-shadow:0 0 15px #0dcaf0,0 0 30px rgba(13,202,240,0.6);transform:scale(1);}
    100% {box-shadow:0 0 30px #0dcaf0,0 0 50px rgba(13,202,240,0.8);transform:scale(1.1);}
}
@keyframes glowPulseSuccess {
    0% {box-shadow:0 0 15px #22c55e,0 0 30px rgba(34,197,94,0.6);transform:scale(1);}
    100% {box-shadow:0 0 30px #22c55e,0 0 50px rgba(34,197,94,0.8);transform:scale(1.1);}
}
@keyframes glowPulseDanger {
    0% {box-shadow:0 0 15px #dc3545,0 0 30px rgba(220,53,69,0.6);transform:scale(1);}
    100% {box-shadow:0 0 30px #dc3545,0 0 50px rgba(220,53,69,0.8);transform:scale(1.1);}
}

/* Card Text */
.service-card h5{
    font-weight:700;
    margin-bottom:8px;
    color:#fff;
}
.service-card p{
    font-size:14px;
    color:#b0b0b0;
}

/* Responsive */
@media(max-width:768px){
    .icon-circle{width:60px;height:60px;font-size:26px;}
}
</style>

<?php include "includes/footer.php"; ?>
