<?php
include "../includes/auth_check.php";
include "../includes/header.php";
?>

<section class="auth-section py-5" style="min-height:85vh;">
    <div class="container text-center">

        <!-- Hero -->
        <h2 class="fw-bold text-white mb-3">💬 Testimonials</h2>
        <p class="text-gray mb-5">Hear from our satisfied customers and partners</p>

        <!-- Carousel -->
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Testimonial 1 -->
                <div class="carousel-item active">
                    <div class="testimonial-card accent mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>John Doe</h5>
                        <p>"Fast and reliable courier service! Highly recommended."</p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="carousel-item">
                    <div class="testimonial-card info mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>Jane Smith</h5>
                        <p>"Amazing support from agents and smooth shipment tracking."</p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="carousel-item">
                    <div class="testimonial-card success mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>Ali Khan</h5>
                        <p>"Billing and reports are so easy to generate. Love this system!"</p>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="carousel-item">
                    <div class="testimonial-card danger mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>Sarah Lee</h5>
                        <p>"Customer support is top-notch. All my shipments delivered safely."</p>
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
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
    text-align:center;
    border:1px solid rgba(255,255,255,0.1);
    transition: 0.3s;
    max-width:400px;
}
.testimonial-card:hover{
    transform: translateY(-8px) scale(1.03);
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
    transition:0.4s;
}

/* Neon Glow Colors */
.testimonial-card.accent .icon-circle{background:#ff4b2b;}
.testimonial-card.info .icon-circle{background:#0dcaf0;}
.testimonial-card.success .icon-circle{background:#22c55e;}
.testimonial-card.danger .icon-circle{background:#dc3545;}

/* Glow Animation on Hover */
.testimonial-card.accent:hover .icon-circle{
    animation: glowPulseAccent 1.5s infinite alternate;
}
.testimonial-card.info:hover .icon-circle{
    animation: glowPulseInfo 1.5s infinite alternate;
}
.testimonial-card.success:hover .icon-circle{
    animation: glowPulseSuccess 1.5s infinite alternate;
}
.testimonial-card.danger:hover .icon-circle{
    animation: glowPulseDanger 1.5s infinite alternate;
}

/* Keyframes */
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

/* Text */
.testimonial-card h5{
    font-weight:700;
    margin-bottom:8px;
    color:#fff;
}
.testimonial-card p{
    font-size:14px;
    color:#b0b0b0;
}

/* Carousel controls */
.carousel-control-prev-icon,
.carousel-control-next-icon{
    filter: invert(1);
}
</style><?php
include "../includes/auth_check.php";
include "../includes/header.php";
?>

<section class="auth-section py-5" style="min-height:85vh;">
    <div class="container text-center">

        <!-- Hero -->
        <h2 class="fw-bold text-white mb-3">💬 Testimonials</h2>
        <p class="text-gray mb-5">Hear from our satisfied customers and partners</p>

        <!-- Carousel -->
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Testimonial 1 -->
                <div class="carousel-item active">
                    <div class="testimonial-card accent mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>John Doe</h5>
                        <p>"Fast and reliable courier service! Highly recommended."</p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="carousel-item">
                    <div class="testimonial-card info mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>Jane Smith</h5>
                        <p>"Amazing support from agents and smooth shipment tracking."</p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="carousel-item">
                    <div class="testimonial-card success mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>Ali Khan</h5>
                        <p>"Billing and reports are so easy to generate. Love this system!"</p>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="carousel-item">
                    <div class="testimonial-card danger mx-auto">
                        <div class="icon-circle"><i class="bi bi-person-circle"></i></div>
                        <h5>Sarah Lee</h5>
                        <p>"Customer support is top-notch. All my shipments delivered safely."</p>
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
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
    text-align:center;
    border:1px solid rgba(255,255,255,0.1);
    transition: 0.3s;
    max-width:400px;
}
.testimonial-card:hover{
    transform: translateY(-8px) scale(1.03);
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
    transition:0.4s;
}

/* Neon Glow Colors */
.testimonial-card.accent .icon-circle{background:#ff4b2b;}
.testimonial-card.info .icon-circle{background:#0dcaf0;}
.testimonial-card.success .icon-circle{background:#22c55e;}
.testimonial-card.danger .icon-circle{background:#dc3545;}

/* Glow Animation on Hover */
.testimonial-card.accent:hover .icon-circle{
    animation: glowPulseAccent 1.5s infinite alternate;
}
.testimonial-card.info:hover .icon-circle{
    animation: glowPulseInfo 1.5s infinite alternate;
}
.testimonial-card.success:hover .icon-circle{
    animation: glowPulseSuccess 1.5s infinite alternate;
}
.testimonial-card.danger:hover .icon-circle{
    animation: glowPulseDanger 1.5s infinite alternate;
}

/* Keyframes */
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

/* Text */
.testimonial-card h5{
    font-weight:700;
    margin-bottom:8px;
    color:#fff;
}
.testimonial-card p{
    font-size:14px;
    color:#b0b0b0;
}

/* Carousel controls */
.carousel-control-prev-icon,
.carousel-control-next-icon{
    filter: invert(1);
}
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include "../includes/footer.php"; ?>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include "../includes/footer.php"; ?>
