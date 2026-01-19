<?php
if (isset($_GET['success'])) {
    echo "<div class='alert glow-alert text-center mb-4'>
            ✅ Bill Generated Successfully
          </div>";
}
if (isset($_GET['error']) && $_GET['error'] === 'bill_exists') {
    echo "<div class='alert glow-alert-danger text-center mb-4'>
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
    die("<div class='alert glow-alert-danger text-center mt-5'>Access Denied</div>");
}
?>

<!-- GENERATE BILL -->
<section class="auth-section d-flex align-items-center justify-content-center py-5" style="min-height:85vh;">

    <div class="auth-box bg-gray-dark p-4 p-md-5 rounded-4 shadow-lg"
         style="max-width:650px;width:100%;">

        <div class="text-center mb-4">
            <h3 class="text-white fw-bold">Generate Bill</h3>
            <p class="text-gray mb-0">Create courier billing</p>
        </div>

        <form method="POST" action="billing_action.php" class="floating-form" id="generateBillForm">

            <div class="form-floating mb-3">
                <select name="courier_id"
                        class="form-select bg-dark text-white border-0"
                        id="courier" required>
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
                <label for="courier">Courier Tracking #</label>
                <small class="text-danger" id="courierError"></small>
            </div>

            <div class="form-floating mb-3">
                <input type="number" name="amount"
                       class="form-control bg-dark text-white border-0"
                       id="amount" placeholder="Amount" required>
                <label for="amount">Amount</label>
                <small class="text-danger" id="amountError"></small>
            </div>

            <div class="form-floating mb-4">
                <select name="payment_mode"
                        class="form-select bg-dark text-white border-0"
                        id="payment" required>
                    <option value="">Select Payment Mode</option>
                    <option value="CASH">Cash</option>
                    <option value="ONLINE">Online</option>
                </select>
                <label for="payment">Payment Mode</label>
                <small class="text-danger" id="paymentError"></small>
            </div>

            <button name="create_bill"
                    class="btn btn-accent w-100 py-2 fw-bold">
                🧾 Generate Bill
            </button>

        </form>

    </div>
</section>

<?php include "../includes/footer.php"; ?>

<style>
/* SAME GLOBAL THEME */
.auth-section{
    background:linear-gradient(135deg,#000000,#0f2027);
}
.bg-gray-dark{
    background:#1f1f1f;
}
.text-gray{
    color:#b0b0b0;
}

/* Animation */
@keyframes fadeUp{
    from{opacity:0;transform:translateY(30px);}
    to{opacity:1;transform:translateY(0);}
}
.auth-box{
    opacity:0;
    animation:fadeUp .8s ease forwards;
}

/* Floating Inputs */
.floating-form .form-control,
.floating-form .form-select{
    background:#222;
    color:#fff;
    height:52px;
    border-radius:14px;
    padding:1rem .75rem .25rem;
}
.floating-form label{
    color:#888;
    transition:.3s;
}
.form-control:focus,
.form-select:focus{
    box-shadow:none;
    border:1px solid #ff4b2b;
    background:#222;
}
.form-control:focus + label,
.form-control:not(:placeholder-shown) + label,
.form-select:focus + label{
    color:#ff4b2b;
    transform:scale(.85) translateY(-1.4rem) translateX(.15rem);
}

/* Button */
.btn-accent{
    background:#ff4b2b;
    color:#fff;
    border-radius:30px;
    transition:.3s;
}
.btn-accent:hover{
    background:#ff652f;
    transform:scale(1.05);
    box-shadow:0 0 20px rgba(255,75,43,.6);
}

/* Alerts */
.glow-alert{
    background:#000;
    color:#ff4b2b;
    border:2px solid #ff4b2b;
}
.glow-alert-danger{
    background:#000;
    color:#ff4b2b;
    border:2px solid #ff4b2b;
}
</style>

<script>
// Generate Bill Form Validation
document.getElementById("generateBillForm").addEventListener("submit", function(e){
    let valid = true;

    // Clear previous errors
    ["courier","amount","payment"].forEach(id=>{
        document.getElementById(id+"Error").innerText = "";
    });

    // Courier selection
    const courier = document.getElementById("courier").value;
    if(!courier){
        document.getElementById("courierError").innerText = "Please select a courier.";
        valid = false;
    }

    // Amount: positive number
    const amount = document.getElementById("amount").value.trim();
    if(!/^\d+(\.\d{1,2})?$/.test(amount) || Number(amount) <= 0){
        document.getElementById("amountError").innerText = "Enter a valid positive amount.";
        valid = false;
    }

    // Payment mode
    const payment = document.getElementById("payment").value;
    if(!payment){
        document.getElementById("paymentError").innerText = "Please select a payment mode.";
        valid = false;
    }

    if(!valid) e.preventDefault();
});
</script>
