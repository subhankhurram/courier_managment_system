<?php
include "../includes/auth_check.php";
include "../includes/header.php";
?>

<h3 class="text-center display-5 glow-text mb-5">Add Customer</h3>

<form method="POST"
      action="../actions/customer_action.php"
      class="p-5 rounded-4 animated-form"
      style="max-width:650px;margin:auto;">

    <div class="mb-4">
        <label class="form-label glow-label">Customer Name</label>
        <input type="text" name="name"
               class="form-control form-control-lg dark-input"
               placeholder="Customer Name" required>
    </div>

    <div class="mb-4">
        <label class="form-label glow-label">Phone</label>
        <input type="text" name="phone"
               class="form-control form-control-lg dark-input"
               placeholder="Phone Number" required>
    </div>

    <div class="mb-4">
        <label class="form-label glow-label">Email</label>
        <input type="email" name="email"
               class="form-control form-control-lg dark-input"
               placeholder="Email Address">
    </div>

    <div class="mb-4">
        <label class="form-label glow-label">Address</label>
        <textarea name="address"
                  class="form-control form-control-lg dark-input"
                  rows="3"
                  placeholder="Full Address"></textarea>
    </div>

    <div class="text-center">
        <button name="add_customer"
                class="btn btn-outline-info btn-lg px-5 hover-btn">
            <i class="bi bi-person-plus me-2"></i> Add Customer
        </button>
    </div>
</form>

<style>
body{
    background:linear-gradient(135deg,#000,#0f2027);
    min-height:100vh;
    font-family:'Segoe UI',sans-serif;
}

/* Heading */
.glow-text{
    color:#0dcaf0;
    text-shadow:0 0 10px #0dcaf0,0 0 30px rgba(13,202,240,.6);
}

/* Labels */
.glow-label{
    color:#0dcaf0;
    font-weight:600;
    text-shadow:0 0 4px #0dcaf0;
}

/* Inputs */
.dark-input{
    background:#000;
    color:#e8faff;
    border:2px solid #0dcaf0;
    border-radius:14px;
    padding:14px;
    transition:.3s;
}
.dark-input::placeholder{
    color:#6fe7ff;
}
.dark-input:hover{
    transform:translateY(-2px);
    box-shadow:0 6px 20px rgba(13,202,240,.4);
}
.dark-input:focus{
    background:#000;
    box-shadow:0 0 0 .25rem rgba(13,202,240,.25);
}

/* Form card */
.animated-form{
    background:#000;
    box-shadow:0 0 30px rgba(13,202,240,.5);
    animation:pulse 3s infinite alternate;
}

/* Button */
.hover-btn:hover{
    transform:scale(1.08);
    box-shadow:0 0 25px #0dcaf0,0 0 50px rgba(13,202,240,.4);
}

/* Animation */
@keyframes pulse{
    from{box-shadow:0 0 15px #0dcaf0;}
    to{box-shadow:0 0 35px #0dcaf0;}
}
</style>

<?php include "../includes/footer.php"; ?>
