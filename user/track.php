<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../config/db.php";
include "../includes/header.php";
include "../includes/auth_check.php"; // Only logged-in users
?>

<!-- HERO SECTION FOR TRACKING -->
<section class="hero" style="min-height:70vh; display:flex; align-items:center; justify-content:center;">
    <div class="container text-center">
        <h1 class="fw-bold mb-3">Track Your Shipment</h1>
        <p class="text-white-50 mb-4">Enter your tracking number below to see your shipment status instantly.</p>

        <!-- TRACKING FORM -->
        <form class="row g-2 justify-content-center" method="GET">
            <div class="col-md-6">
                <input type="text" name="tracking" class="form-control form-control-lg rounded-pill" placeholder="Enter Tracking Number" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-main btn-lg w-100 rounded-pill">Track</button>
            </div>
        </form>

        <!-- STATUS DISPLAY -->
        <?php
        if (isset($_GET['tracking'])):
            $trk = mysqli_real_escape_string($conn, $_GET['tracking']);
            $res = mysqli_query($conn, "SELECT * FROM couriers WHERE tracking_number='$trk'");
            if ($row = mysqli_fetch_assoc($res)):
        ?>
            <div class="mt-4 p-4 rounded-4 shadow" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); color:#fff; display:inline-block; min-width:300px;">
                <h5 class="fw-bold mb-3">Shipment Status</h5>
                <p><b>Tracking Number:</b> <?= htmlspecialchars($trk) ?></p>
                <p><b>Status:</b> <?= htmlspecialchars($row['status']) ?></p>
                <p><b>Receiver:</b> <?= htmlspecialchars($row['receiver_name']) ?></p>
                <a href="print_status.php?tracking=<?= urlencode($trk) ?>" class="btn btn-light btn-sm mt-2">Print</a>
            </div>
        <?php
            else:
        ?>
            <div class="mt-4 alert alert-danger shadow" style="display:inline-block;">
                Invalid Tracking Number
            </div>
        <?php
            endif;
        endif;
        ?>
    </div>
</section>

<?php include "../includes/footer.php"; ?>
