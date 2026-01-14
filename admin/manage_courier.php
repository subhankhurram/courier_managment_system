<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";
?>

<!-- MANAGE SHIPMENTS -->
<section class="auth-section py-5" style="min-height:85vh;">

<div class="container">

    <div class="text-center mb-5">
        <h3 class="fw-bold text-white">Manage Shipments</h3>
        <p class="text-gray mb-0">View & update courier status</p>
    </div>

    <div class="glass p-4">

        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0 rounded-3 overflow-hidden">
                <thead>
                    <tr class="text-center text-accent">
                        <th>Tracking</th>
                        <th>Receiver</th>
                        <th>Status</th>
                        <th>Branch</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $res = mysqli_query($conn,"SELECT * FROM couriers");
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <tr class="text-center">
                        <td class="fw-semibold text-white">
                            <?= $row['tracking_number'] ?>
                        </td>

                        <td><?= $row['receiver_name'] ?></td>

                        <td>
                            <span class="badge 
                                <?= $row['status']=='DELIVERED' ? 'bg-success' : 
                                   ($row['status']=='IN_TRANSIT' ? 'bg-warning text-dark' : 'bg-secondary') ?>">
                                <?= $row['status'] ?>
                            </span>
                        </td>

                        <td><?= $row['branch'] ?></td>

                        <td>
                            <a class="neo-btn info small"
                               href="update_courier.php?id=<?= $row['courier_id'] ?>">
                                ✏ Update
                            </a>

                            <a class="neo-btn danger small"
                               onclick="return confirm('Delete shipment?')"
                               href="../actions/courier_action.php?delete=<?= $row['courier_id'] ?>">
                                🗑 Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>
</section>

<?php include "../includes/footer.php"; ?>

<style>
/* SAME GLOBAL THEME */
.auth-section{
    background:linear-gradient(135deg,#000000,#0f2027);
}
.text-gray{color:#b0b0b0}
.text-accent{color:#ff4b2b}

/* Glass Card */
.glass{
    background:rgba(255,255,255,.06);
    backdrop-filter:blur(15px);
    border-radius:20px;
    box-shadow:0 0 35px rgba(255,75,43,.25);
}

/* Table hover */
.table-hover tbody tr:hover{
    background:rgba(255,75,43,.08);
    transition:.2s;
}

/* Buttons */
.neo-btn{
    padding:8px 18px;
    border-radius:30px;
    color:#fff;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
    display:inline-block;
    margin:2px;
}
.neo-btn.info{background:#0dcaf0}
.neo-btn.danger{background:#dc3545}
.neo-btn.small{font-size:14px}
.neo-btn:hover{
    transform:scale(1.08);
    box-shadow:0 0 20px rgba(255,255,255,.3);
}
</style>
