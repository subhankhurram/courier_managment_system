<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'AGENT') die("Access Denied");

$branch = $_SESSION['branch'];
?>

<section class="auth-section py-5" style="min-height:85vh;">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white">📦 My Branch Shipments</h2>
            <p class="text-gray">
                Branch: <span class="text-accent fw-semibold"><?= htmlspecialchars($branch) ?></span>
            </p>
        </div>

        <!-- Table -->
        <div class="table-responsive glass p-4">
            <table class="table table-dark table-hover align-middle mb-0">
                <thead>
                    <tr class="text-center text-accent">
                        <th>Tracking</th>
                        <th>Receiver</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $res = mysqli_query($conn,
                    "SELECT * FROM couriers WHERE branch='$branch'"
                );

                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <tr class="text-center">
                        <td class="fw-semibold text-white">
                            <?= htmlspecialchars($row['tracking_number']) ?>
                        </td>
                        <td><?= htmlspecialchars($row['receiver_name']) ?></td>
                        <td>
                            <span class="badge
                                <?= $row['status']=='DELIVERED' ? 'bg-success' :
                                   ($row['status']=='IN_TRANSIT' ? 'bg-warning text-dark' : 'bg-secondary') ?>">
                                <?= htmlspecialchars($row['status']) ?>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</section>

<style>
/* Background */
.auth-section{
    background: linear-gradient(135deg,#000000,#0f2027);
}

/* Text */
.text-gray{color:#b0b0b0}
.text-accent{color:#ff4b2b}

/* Glass container */
.glass{
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(15px);
    border-radius:20px;
    box-shadow:0 0 35px rgba(255,75,43,.25);
}

/* Table hover */
.table-hover tbody tr:hover{
    background-color: rgba(255,75,43,0.12);
    transition:0.2s;
}
</style>

<?php include "../includes/footer.php"; ?>
