<?php
// Include authentication and header
// require_once __DIR__ . "/includes/auth_check.php";
require_once __DIR__ . "/includes/header.php";
?>

<section class="auth-section py-5" style="min-height:85vh;">
    <div class="container text-center">

        <!-- Hero -->
        <h2 class="fw-bold text-white mb-3">🛠 Our Services</h2>
        <p class="text-gray mb-5"></p>

        <!-- Service Cards -->
        <div class="row g-4 justify-content-center">

            <div class="col-md-3">
                <div class="service-card">
                    <div class="icon-circle accent"><i class="bi bi-truck"></i></div>
                    <h5>Courier Booking</h5>
                    <p>Create new shipments quickly</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="service-card">
                    <div class="icon-circle info"><i class="bi bi-kanban"></i></div>
                    <h5>Shipment Management</h5>
                    <p>Track, update, or delete shipments</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="service-card">
                    <div class="icon-circle success"><i class="bi bi-cash-stack"></i></div>
                    <h5>Billing</h5>
                    <p>Generate invoices and bills</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="service-card">
                    <div class="icon-circle danger"><i class="bi bi-bar-chart"></i></div>
                    <h5>Reports & Analytics</h5>
                    <p>Monitor business performance</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="service-card">
                    <div class="icon-circle accent"><i class="bi bi-person-badge"></i></div>
                    <h5>Agent Services</h5>
                    <p>Manage agent accounts and tasks</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="service-card">
                    <div class="icon-circle info"><i class="bi bi-people"></i></div>
                    <h5>Customer Support</h5>
                    <p>Manage customers & communication</p>
                </div>
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
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(15px);
    border-radius:20px;
    padding:25px;
    color:#fff;
    transition: 0.3s;
    text-align:center;
    border:1px solid rgba(255,255,255,0.1);
    cursor:pointer;
}
.service-card:hover{
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 0 40px rgba(255,75,43,0.5);
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

/* Glow animation on hover */
.service-card:hover .icon-circle{
    animation: glowPulse 1.5s infinite alternate;
}

@keyframes glowPulse {
    0% {
        box-shadow: 0 0 15px rgba(255,255,255,0.3),
                    0 0 25px rgba(255,75,43,0.4),
                    0 0 35px rgba(255,75,43,0.5);
        transform: scale(1);
    }
    100% {
        box-shadow: 0 0 25px rgba(255,255,255,0.5),
                    0 0 40px rgba(255,75,43,0.7),
                    0 0 60px rgba(255,75,43,0.9);
        transform: scale(1.1);
    }
}

/* Icon Colors */
.icon-circle.accent{background:#ff4b2b;}
.icon-circle.success{background:#22c55e;}
.icon-circle.info{background:#0dcaf0;}
.icon-circle.danger{background:#dc3545;}

/* Card Text */
.service-card h5{font-weight:700;margin-bottom:8px;color:#fff;}
.service-card p{font-size:14px;color:#b0b0b0;}

/* Responsive */
@media(max-width:768px){
    .icon-circle{width:60px;height:60px;font-size:26px;}
}
</style>

<?php
// Include footer
require_once __DIR__ . "/includes/footer.php";
?>
