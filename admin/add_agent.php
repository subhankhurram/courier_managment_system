<?php
include "../includes/auth_check.php";
include "../config/db.php";

if ($_SESSION['role'] != 'ADMIN') die("Access Denied");
?>

<h3 class="text-center display-5 glow-text mb-5">Add New Agent</h3>

<form method="POST" action="../actions/agent_action.php"
      class="p-5 rounded shadow-lg animated-form"
      style="max-width: 650px; margin:auto; background:#000000;">

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Agent Name</label>
        <input type="text" name="name" class="form-control form-control-lg glow-input"
               placeholder="Agent Full Name" required>
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Email</label>
        <input type="email" name="email" class="form-control form-control-lg glow-input"
               placeholder="Email Address" required>
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Phone</label>
        <input type="text" name="phone" class="form-control form-control-lg glow-input"
               placeholder="Phone Number">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">City</label>
        <input type="text" name="city" class="form-control form-control-lg glow-input"
               placeholder="City">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Branch</label>
        <input type="text" name="branch" class="form-control form-control-lg glow-input"
               placeholder="Branch Name">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Password</label>
        <input type="password" name="password" class="form-control form-control-lg glow-input"
               placeholder="Secure Password" required>
    </div>

    <div class="text-center">
        <button name="add_agent" class="btn btn-info btn-lg px-5 shadow-lg hover-btn">
            <i class="bi bi-person-plus-fill me-2"></i> Add Agent
        </button>
    </div>
</form>

<style>
/* Page background */
body {
    background: linear-gradient(135deg, #000000, #0d6efd);
    font-family: 'Segoe UI', sans-serif;
    min-height: 100vh;
    padding: 40px 0;
}

/* Glowing heading */
.glow-text {
    color: #0d6efd;
    text-shadow: 0 0 8px #0d6efd, 0 0 20px rgba(13,110,253,0.7);
}

/* Input styling */
.glow-input {
    background-color: #000000;
    color: #0d6efd;
    border: 2px solid #0d6efd;
    border-radius: 12px;
    padding: 12px;
    transition: all 0.3s ease-in-out;
}

.glow-input::placeholder {
    color: #6ea8fe;
}

.glow-input:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(13,110,253,0.6);
}

/* Labels */
.glow-label {
    text-shadow: 0 0 4px #0d6efd;
}

/* Form animation */
.animated-form {
    border-radius: 16px;
    box-shadow: 0 0 25px rgba(13,110,253,0.5);
    animation: pulseBorder 3s infinite alternate;
}

/* Button hover */
.hover-btn:hover {
    transform: scale(1.08);
    box-shadow: 0 0 25px #0d6efd, 0 0 50px rgba(13,110,253,0.4);
    transition: 0.3s ease-in-out;
}

/* Border pulse animation */
@keyframes pulseBorder {
    0%   { box-shadow: 0 0 15px #0d6efd; }
    100% { box-shadow: 0 0 30px #0d6efd; }
}
</style>
