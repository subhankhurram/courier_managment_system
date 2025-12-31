
<?php
if (isset($_GET['success'])) {
    echo "<div class='alert alert-success'>Bill Generated Successfully</div>";
}
if (isset($_GET['error']) && $_GET['error'] == 'bill_exists') {
    echo "<div class='alert alert-danger'>Bill already exists for this courier</div>";
}
?>



<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../includes/header.php";
include "../config/db.php";

// Admin check
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ADMIN') {
    die("Access Denied");
}
?>

<h4>Create Bill</h4>

<form method="POST" action="billing_action.php">

    <div class="mb-2">
        <label>Select Courier</label>
        <select name="courier_id" class="form-control" required>
            <option value="">Select Courier</option>
            <?php
            $q = mysqli_query($conn, "SELECT courier_id, tracking_number FROM couriers");
            while ($row = mysqli_fetch_assoc($q)) {
                echo "<option value='{$row['courier_id']}'>
                        {$row['tracking_number']}
                      </option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-2">
        <input type="number" name="amount" class="form-control" placeholder="Amount" required>
    </div>

    <div class="mb-2">
        <select name="payment_mode" class="form-control" required>
            <option value="CASH">Cash</option>
            <option value="ONLINE">Online</option>
        </select>
    </div>

    <button type="submit" name="create_bill" class="btn btn-primary">
        Generate Bill
    </button>

</form>

<?php include "../includes/footer.php"; ?>
