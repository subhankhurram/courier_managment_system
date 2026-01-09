<?php
if (isset($_GET['success'])) {
    echo "<div class='alert glow-alert alert-success text-center mb-4'>
            ✅ Bill Generated Successfully
          </div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'bill_exists') {
    echo "<div class='alert glow-alert alert-danger text-center mb-4'>
            ❌ Bill already exists for this courier
          </div>";
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../includes/header.php";
include "../config/db.php";

/* Admin check */
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ADMIN') {
    die("<div class='alert glow-alert alert-danger text-center mt-5'>Access Denied</div>");
}
?>

<h3 class="text-center display-5 glow-text mb-5">Generate Bill</h3>

<form method="POST" action="billing_action.php"
      class="p-5 rounded-4 animated-form"
      style="max-width:650px;margin:auto;">

    <div class="mb-4">
        <label class="form-label glow-label">Select Courier</label>
        <select name="courier_id" class="form-select form-select-lg dark-input" required>
            <option value="">Select Courier</option>
            <?php
            $q = mysqli_query($conn,"SELECT courier_id,tracking_number FROM couriers");
            while($row=mysqli_fetch_assoc($q)){
                echo "<option value='{$row['courier_id']}'>
                        {$row['tracking_number']}
                      </option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-4">
        <label class="form-label glow-label">Amount</label>
        <input type="number" name="amount"
               class="form-control form-control-lg dark-input"
               placeholder="Enter Amount" required>
    </div>

    <div class="mb-4">
        <label class="form-label glow-label">Payment Mode</label>
        <select name="payment_mode"
                class="form-select form-select-lg dark-input" required>
            <option value="CASH">Cash</option>
            <option value="ONLINE">Online</option>
        </select>
    </div>

    <div class="text-center">
        <button name="create_bill"
                class="btn btn-outline-info btn-lg px-5 hover-btn">
            🧾 Generate Bill
        </button>
    </div>
</form>

<style>
/* Page background */
body{
    background:linear-gradient(135deg,#000,#0f2027);
    min-height:100vh;
    font-family:'Segoe UI',sans-serif;
}

/* Headings */
.glow-text{
    color:#0dcaf0;
    text-shadow:0 0 10px #0dcaf0,0 0 30px rgba(13,202,240,.6);
}

/* Labels */
.glow-label{
    color:#0dcaf0;
    text-shadow:0 0 4px #0dcaf0;
    font-weight:600;
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
.dark-input:focus{
    background:#000;
    box-shadow:0 0 0 .25rem rgba(13,202,240,.25);
}
.dark-input:hover{
    transform:translateY(-2px);
    box-shadow:0 6px 20px rgba(13,202,240,.4);
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

/* Alerts */
.glow-alert{
    background:#000;
    color:#0dcaf0;
    border:2px solid #0dcaf0;
    box-shadow:0 0 20px rgba(13,202,240,.5);
}

/* Animation */
@keyframes pulse{
    from{box-shadow:0 0 15px #0dcaf0;}
    to{box-shadow:0 0 35px #0dcaf0;}
}
</style>

<?php include "../includes/footer.php"; ?>
