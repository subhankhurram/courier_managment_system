<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'ADMIN') die("Access Denied");
?>

<h3 class="text-center display-5 glow-text mb-5">
    Add New Agent
</h3>

<form method="POST" action="../actions/agent_action.php"
      class="p-5 rounded-4 shadow-lg animated-form"
      style="max-width:650px;margin:auto;
             background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);">

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Agent Name</label>
        <input type="text" name="name"
               class="form-control form-control-lg dark-input"
               placeholder="Agent Full Name" required>
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Email</label>
        <input type="email" name="email"
               class="form-control form-control-lg dark-input"
               placeholder="Email Address" required>
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Phone</label>
        <input type="text" name="phone"
               class="form-control form-control-lg dark-input"
               placeholder="Phone Number">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">City</label>
        <input type="text" name="city"
               class="form-control form-control-lg dark-input"
               placeholder="City">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Branch</label>
        <input type="text" name="branch"
               class="form-control form-control-lg dark-input"
               placeholder="Branch Name">
    </div>

    <div class="mb-4">
        <label class="form-label fw-bold text-info glow-label">Password</label>
        <input type="password" name="password"
               class="form-control form-control-lg dark-input"
               placeholder="Secure Password" required>
    </div>

    <div class="text-center">
        <button name="add_agent"
                class="btn btn-outline-info btn-lg px-5 hover-btn">
            ➕ Add Agent
        </button>
    </div>
</form>

<style>
/* Page background */
body{
    background:linear-gradient(135deg,#000000,#0f2027);
    min-height:100vh;
    font-family:'Segoe UI',sans-serif;
}

/* Heading glow */
.glow-text{
    color:#0dcaf0;
    text-shadow:0 0 8px #0dcaf0,0 0 25px rgba(13,202,240,.6);
}

/* Inputs */
.dark-input{
    background:#000;
    color:#e6f7ff;
    border:2px solid #0dcaf0;
    border-radius:14px;
    padding:14px;
    transition:.3s;
}

.dark-input::placeholder{
    color:#7fdfff;
}

.dark-input:focus{
    background:#000;
    color:#fff;
    border-color:#0dcaf0;
    box-shadow:0 0 0 .2rem rgba(13,202,240,.25);
}

/* Hover */
.dark-input:hover{
    transform:translateY(-2px);
}

/* Labels */
.glow-label{
    text-shadow:0 0 4px #0dcaf0;
}

/* Form animation */
.animated-form{
    box-shadow:0 0 25px rgba(13,202,240,.5);
    animation:pulseBorder 3s infinite alternate;
}

/* Button */
.hover-btn:hover{
    transform:scale(1.08);
    box-shadow:0 0 25px #0dcaf0;
    transition:.3s;
}

/* Pulse animation */
@keyframes pulseBorder{
    0%{box-shadow:0 0 15px #0dcaf0;}
    100%{box-shadow:0 0 35px #0dcaf0;}
}
</style>

<?php include "../includes/footer.php"; ?>
