<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "includes/header.php";
?>

<!-- HERO -->
<section class="hero-dark py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="display-4 fw-bold text-white">Smart Courier Management System</h1>
        <p class="lead text-gray mt-3">
          Send, track, and manage your parcels efficiently, securely, and instantly.
        </p>
        <div class="mt-4">
          <a href="auth/register.php" class="btn btn-accent btn-lg me-3">Create Account</a>
          <a href="auth/login.php" class="btn btn-outline-light btn-lg">Login</a>
        </div>
      </div>
      <div class="col-md-6 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/1048/1048316.png"
             class="img-fluid hero-img" style="max-width:380px;">
      </div>
    </div>
  </div>
</section>

<!-- FEATURES -->
<section class="features-dark py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-white">Why Choose Our System?</h2>
      <p class="text-gray">All-in-one courier solutions for users and agents</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card feature-card bg-dark text-white h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-geo-alt fs-1 text-accent mb-3"></i>
            <h5 class="card-title fw-bold">Real-time Parcel Tracking</h5>
            <p class="card-text text-gray">Monitor your shipments live, from pickup to delivery.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card feature-card bg-dark text-white h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-people fs-1 text-accent mb-3"></i>
            <h5 class="card-title fw-bold">User & Agent Dashboards</h5>
            <p class="card-text text-gray">Role-based interfaces for seamless operation.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card feature-card bg-dark text-white h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-shield-check fs-1 text-accent mb-3"></i>
            <h5 class="card-title fw-bold">Secure Platform</h5>
            <p class="card-text text-gray">Encrypted authentication ensures your data is safe.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="services-dark py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-white">Our Services</h2>
      <p class="text-gray">Everything you need for smooth courier management</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="service-box bg-gray-dark text-white p-4 shadow-sm h-100 text-center">
          <i class="bi bi-clock-history fs-2 text-accent mb-3"></i>
          <h5>Fast Delivery</h5>
          <p class="text-gray">Quick parcel delivery with accurate tracking updates.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="service-box bg-gray-dark text-white p-4 shadow-sm h-100 text-center">
          <i class="bi bi-bag-check fs-2 text-accent mb-3"></i>
          <h5>Parcel Management</h5>
          <p class="text-gray">Easily manage all your parcels and shipment histories.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="service-box bg-gray-dark text-white p-4 shadow-sm h-100 text-center">
          <i class="bi bi-chat-dots fs-2 text-accent mb-3"></i>
          <h5>Customer Support</h5>
          <p class="text-gray">24/7 assistance to resolve any courier-related queries.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="testimonials-dark py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-white">What Our Users Say</h2>
      <p class="text-gray">Real feedback from our satisfied customers</p>
    </div>
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner text-center">
        <div class="carousel-item active">
          <p class="lead text-white">"This system made managing deliveries so simple and fast. Highly recommend!"</p>
          <h6 class="fw-bold mt-3 text-accent">– Sarah K.</h6>
        </div>
        <div class="carousel-item">
          <p class="lead text-white">"The tracking feature is very accurate and easy to use."</p>
          <h6 class="fw-bold mt-3 text-accent">– Ahmed R.</h6>
        </div>
        <div class="carousel-item">
          <p class="lead text-white">"Excellent support and user-friendly dashboard for both agents and customers."</p>
          <h6 class="fw-bold mt-3 text-accent">– Maria L.</h6>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>


<section class="cta-dark text-center py-5">
  <div class="container">
    <h2 class="fw-bold text-white">Get Started Today</h2>
    <p class="mb-4 text-gray">Sign up for free and streamline your courier management</p>
    <a href="auth/register.php" class="btn btn-accent btn-lg">Register Now</a>
  </div>
</section>

<?php include "includes/footer.php"; ?>

<!-- Custom CSS -->
<style>
/* Colors */
.hero-dark { background: #0d0d0d; }
.features-dark { background: #111; }
.services-dark { background: #1a1a1a; }
.testimonials-dark { background: #0f0f0f; }
.cta-dark { background: #000; }
.text-gray { color: #b0b0b0; }
.bg-gray-dark { background: #1f1f1f; }
.text-accent { color: #ff4b2b; } /* Orange accent */
.btn-accent { background-color: #ff4b2b; color: #fff; border: none; }
.btn-accent:hover { background-color: #ff652f; color: #fff; transform: scale(1.05); transition: 0.3s; }

/* Hero image animation */
.hero-img { transition: transform 0.5s ease; }
.hero-img:hover { transform: scale(1.05) rotate(-3deg); }

/* Card hover effects */
.feature-card:hover, .service-box:hover {
  transform: translateY(-10px);
  transition: all 0.3s ease;
}

/* Carousel controls */
.carousel-control-prev-icon, .carousel-control-next-icon {
  filter: invert(1);
}
</style>
