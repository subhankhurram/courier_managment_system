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
        echo "<div class='alert alert-success glow-alert text-center'>
                ✅ Courier Added | Tracking: <b>$tracking_number</b>
              </div>";
    } else {
        echo "<div class='alert alert-danger glow-alert text-center'>
                ❌ Error occurred
              </div>";
    }
}
?>

<h3 class="text-center display-5 glow-text mb-5">Add New Courier</h3>

<form method="POST" class="p-5 rounded-4 animated-form" style="max-width:720px;margin:auto;">

    <div class="mb-4">
        <label class="form-label glow-label">Sender (Customer)</label>
        <select name="sender_id" class="form-select form-select-lg dark-input" required>
            <option value="">Select Customer</option>
            <?php
            $customers = mysqli_query($conn,"SELECT * FROM customers");
            while($c=mysqli_fetch_assoc($customers)){
                echo "<option value='{$c['customer_id']}'>{$c['name']} - {$c['phone']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label glow-label">Receiver Name</label>
        <input type="text" name="receiver_name" class="form-control form-control-lg dark-input" required>
    </div>

    <div class="mb-3">
        <label class="form-label glow-label">Receiver Phone</label>
        <input type="text" name="receiver_phone" class="form-control form-control-lg dark-input" required>
    </div>

    <div class="mb-3">
        <label class="form-label glow-label">Receiver Address</label>
        <textarea name="receiver_address" rows="3" class="form-control form-control-lg dark-input" required></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label glow-label">Courier Type</label>
        <input type="text" name="courier_type" class="form-control form-control-lg dark-input" required>
    </div>

    <div class="mb-3">
        <label class="form-label glow-label">Courier Company</label>
        <input type="text" name="courier_company" class="form-control form-control-lg dark-input" required>
    </div>

    <div class="mb-4">
        <label class="form-label glow-label">Expected Delivery</label>
        <input type="date" name="expected_delivery" class="form-control form-control-lg dark-input" required>
    </div>

    <div class="text-center">
        <button name="add_courier" class="btn btn-outline-info btn-lg px-5 hover-btn">
            ➕ Add Courier
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
}

/* Labels */
.glow-label{
    color:#0dcaf0;
    text-shadow:0 0 4px #0dcaf0;
}

/* Form */
.animated-form{
    background:#000;
    box-shadow:0 0 30px rgba(13,202,240,.5);
    animation:pulse 3s infinite alternate;
}

/* Button */
.hover-btn:hover{
    transform:scale(1.08);
    box-shadow:0 0 25px #0dcaf0;
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
