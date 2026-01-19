<?php
// ====================
// INCLUDE AUTH AND HEADER
// ====================
// require_once __DIR__ . "/includes/auth_check.php";
require_once __DIR__ . "/includes/header.php";
?>

<section class="auth-section py-5" style="min-height:85vh;">
    <div class="container text-center">

        <!-- Heading -->
        <h2 class="fw-bold text-white mb-3">💬 Testimonials</h2>
        <p class="text-gray mb-5"></p>

        <!-- Testimonial Cards -->
        <div class="row g-4 justify-content-center">

            <div class="col-md-4">
                <div class="testimonial-card accent mx-auto">
                    <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                    <h5>John Doe</h5>
                    <p>"Fast and reliable courier service! Highly recommended."</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial-card info mx-auto">
                    <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                    <h5>Jane Smith</h5>
                    <p>"Amazing support from agents and smooth shipment tracking."</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial-card success mx-auto">
                    <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                    <h5>Ali Khan</h5>
                    <p>"Billing and reports are so easy to generate. Love this system!"</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="testimonial-card danger mx-auto">
                    <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                    <h5>Sarah Lee</h5>
                    <p>"Customer support is top-notch. All shipments delivered safely."</p>
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

/* Testimonial Cards */
.testimonial-card{
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(15px);
    border-radius:20px;
    padding:30px 20px;
    border:1px solid rgba(255,255,255,0.1);
    max-width:400px;
    transition:.3s;
    text-align:center;
}
.testimonial-card:hover{
    transform:translateY(-8px) scale(1.03);
    box-shadow:0 0 30px rgba(255,75,43,.4);
}

/* Icon Circle */
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

/* Neon Colors */
.testimonial-card.accent .icon-circle{background:#ff4b2b;}
.testimonial-card.info .icon-circle{background:#0dcaf0;}
.testimonial-card.success .icon-circle{background:#22c55e;}
.testimonial-card.danger .icon-circle{background:#dc3545;}

/* Text */
.testimonial-card h5{
    color:#fff;
    font-weight:700;
    margin-bottom:8px;
}
.testimonial-card p{
    color:#b0b0b0;
    font-size:14px;
}
</style>

<?php
// ====================
// INCLUDE FOOTER
// ====================
require_once __DIR__ . "/includes/footer.php";
?>
