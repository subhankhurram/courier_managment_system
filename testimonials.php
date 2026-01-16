<?php
// ====================
// INCLUDE AUTH AND HEADER
// ====================
require_once __DIR__ . "/includes/auth_check.php";
require_once __DIR__ . "/includes/header.php";
?>

<!-- ====================
     TESTIMONIALS SECTION
==================== -->
<section class="auth-section py-5" style="min-height:85vh;">
    <div class="container text-center">

        <!-- Heading -->
        <h2 class="fw-bold text-white mb-3">💬 Testimonials</h2>
        <p class="text-gray mb-5">Hear from our satisfied customers and partners</p>

        <!-- Carousel -->
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="testimonial-card accent mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>John Doe</h5>
                        <p>"Fast and reliable courier service! Highly recommended."</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="testimonial-card info mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>Jane Smith</h5>
                        <p>"Amazing support from agents and smooth shipment tracking."</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="testimonial-card success mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>Ali Khan</h5>
                        <p>"Billing and reports are so easy to generate. Love this system!"</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="testimonial-card danger mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>Sarah Lee</h5>
                        <p>"Customer support is top-notch. All my shipments delivered safely."</p>
                    </div>
                </div>

            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>

<!-- ====================
     CUSTOM CSS
==================== -->
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
.testimonial-card h5{color:#fff;font-weight:700;}
.testimonial-card p{color:#b0b0b0;font-size:14px;}

/* Carousel Controls */
.carousel-control-prev-icon,
.carousel-control-next-icon{filter:invert(1);}
</style>

<?php
// ====================
// INCLUDE FOOTER
// ====================
require_once __DIR__ . "/includes/footer.php";
?>
