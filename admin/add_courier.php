<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../config/db.php";
include "../includes/header.php";

/* Tracking number */
function generateTrackingNumber() {
    return 'TRK'.date('YmdHis').rand(100,999);
}

/* Admin check */
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ADMIN') {
    die("Access Denied");
}

/* Form submit */
if (isset($_POST['add_courier'])) {

    $sender_id         = $_POST['sender_id'];
    $receiver_name     = trim($_POST['receiver_name']);
    $receiver_phone    = trim($_POST['receiver_phone']);
    $receiver_address  = trim($_POST['receiver_address']);
    $courier_type      = trim($_POST['courier_type']);
    $courier_company   = trim($_POST['courier_company']);
    $expected_delivery = $_POST['expected_delivery'];
    $created_by        = $_SESSION['user_id'];
    $tracking_number   = generateTrackingNumber();

    $stmt = mysqli_prepare($conn,"INSERT INTO couriers
    (tracking_number,sender_id,receiver_name,receiver_phone,receiver_address,
     courier_type,courier_company,expected_delivery,status,created_by)
     VALUES (?,?,?,?,?,?,?,?,'BOOKED',?)");

    mysqli_stmt_bind_param($stmt,"sissssssi",
        $tracking_number,$sender_id,$receiver_name,$receiver_phone,
        $receiver_address,$courier_type,$courier_company,
        $expected_delivery,$created_by);

    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='alert glow-alert text-center my-4'>
                ✅ Courier Added Successfully<br>
                <b>Tracking #: $tracking_number</b>
              </div>";
    } else {
        echo "<div class='alert glow-alert-danger text-center my-4'>
                ❌ Error occurred
              </div>";
    }
}
?>

<!-- ADD COURIER -->
<section class="auth-section d-flex align-items-center justify-content-center py-5" style="min-height:85vh;">

    <div class="auth-box bg-gray-dark p-4 p-md-5 rounded-4 shadow-lg"
         style="max-width:750px;width:100%;">

        <div class="text-center mb-4">
            <h3 class="text-white fw-bold">Add New Courier</h3>
            <p class="text-gray mb-0">Create courier booking</p>
        </div>

        <form method="POST" class="floating-form" id="addCourierForm">

            <div class="form-floating mb-3">
                <select name="sender_id"
                        class="form-select bg-dark text-white border-0"
                        id="sender" required>
                    <option value="">Select Customer</option>
                    <?php
                    $customers = mysqli_query($conn,"SELECT * FROM customers");
                    while($c=mysqli_fetch_assoc($customers)){
                        echo "<option value='{$c['customer_id']}'>
                                {$c['name']} — {$c['phone']}
                              </option>";
                    }
                    ?>
                </select>
                <label for="sender">Sender (Customer)</label>
                <small class="text-danger" id="senderError"></small>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="receiver_name"
                       class="form-control bg-dark text-white border-0"
                       id="receiver_name" placeholder="Receiver Name" required>
                <label for="receiver_name">Receiver Name</label>
                <small class="text-danger" id="receiverNameError"></small>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="receiver_phone"
                       class="form-control bg-dark text-white border-0"
                       id="receiver_phone" placeholder="Receiver Phone" required>
                <label for="receiver_phone">Receiver Phone</label>
                <small class="text-danger" id="receiverPhoneError"></small>
            </div>

            <div class="form-floating mb-3">
                <textarea name="receiver_address"
                          class="form-control bg-dark text-white border-0"
                          id="receiver_address"
                          placeholder="Receiver Address"
                          style="height:90px" required></textarea>
                <label for="receiver_address">Receiver Address</label>
                <small class="text-danger" id="receiverAddressError"></small>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="courier_type"
                       class="form-control bg-dark text-white border-0"
                       id="courier_type" placeholder="Courier Type" required>
                <label for="courier_type">Courier Type</label>
                <small class="text-danger" id="courierTypeError"></small>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="courier_company"
                       class="form-control bg-dark text-white border-0"
                       id="courier_company" placeholder="Courier Company" required>
                <label for="courier_company">Courier Company</label>
                <small class="text-danger" id="courierCompanyError"></small>
            </div>

            <div class="form-floating mb-4">
                <input type="date" name="expected_delivery"
                       class="form-control bg-dark text-white border-0"
                       id="expected_delivery" required>
                <label for="expected_delivery">Expected Delivery</label>
                <small class="text-danger" id="expectedDeliveryError"></small>
            </div>

            <button name="add_courier" class="btn btn-accent w-100 py-2 fw-bold">
                ➕ Add Courier
            </button>

        </form>

    </div>
</section>

<?php include "../includes/footer.php"; ?>

<style>
/* SAME THEME AS ADD AGENT */
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
.floating-form textarea.form-control{
    height:auto;
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
// Courier Form Validation
document.getElementById("addCourierForm").addEventListener("submit", function(e){
    let valid = true;

    // Clear previous errors
    ["sender","receiver_name","receiver_phone","receiver_address","courier_type","courier_company","expected_delivery"]
        .forEach(id=>{
            document.getElementById(id+"Error").innerText = "";
        });

    // Sender selected
    const sender = document.getElementById("sender").value;
    if(!sender){
        document.getElementById("senderError").innerText = "Please select a customer.";
        valid = false;
    }

    // Receiver Name: letters & spaces
    const receiverName = document.getElementById("receiver_name").value.trim();
    if(!/^[A-Za-z\s]{2,50}$/.test(receiverName)){
        document.getElementById("receiverNameError").innerText = "Only letters allowed (2-50 chars).";
        valid = false;
    }

    // Receiver Phone: digits 10-15
    const receiverPhone = document.getElementById("receiver_phone").value.trim();
    if(!/^\d{10,15}$/.test(receiverPhone)){
        document.getElementById("receiverPhoneError").innerText = "Phone should be 10-15 digits.";
        valid = false;
    }

    // Receiver Address: min 5 chars
    const receiverAddress = document.getElementById("receiver_address").value.trim();
    if(receiverAddress.length < 5){
        document.getElementById("receiverAddressError").innerText = "Address must be at least 5 characters.";
        valid = false;
    }

    // Courier Type: letters & spaces
    const courierType = document.getElementById("courier_type").value.trim();
    if(!/^[A-Za-z\s]{2,50}$/.test(courierType)){
        document.getElementById("courierTypeError").innerText = "Only letters allowed (2-50 chars).";
        valid = false;
    }

    // Courier Company: letters & spaces
    const courierCompany = document.getElementById("courier_company").value.trim();
    if(!/^[A-Za-z\s]{2,50}$/.test(courierCompany)){
        document.getElementById("courierCompanyError").innerText = "Only letters allowed (2-50 chars).";
        valid = false;
    }

    // Expected Delivery: not empty
    const expectedDelivery = document.getElementById("expected_delivery").value;
    if(!expectedDelivery){
        document.getElementById("expectedDeliveryError").innerText = "Please select a delivery date.";
        valid = false;
    }

    if(!valid) e.preventDefault();
});
</script>
