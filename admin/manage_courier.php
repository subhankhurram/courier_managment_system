<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";
?>

<h4 class="text-center text-info fw-bold mb-4 display-6">
    Manage Shipments
</h4>

<div class="container">
    <div class="table-responsive shadow-lg rounded-4 p-3"
         style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);">

        <table class="table table-dark table-hover align-middle mb-0 rounded-3 overflow-hidden">
            <thead>
                <tr class="text-info text-center">
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
                    <td class="fw-semibold text-light">
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
                        <a class="btn btn-sm btn-outline-info me-1 hover-btn"
                           href="update_courier.php?id=<?= $row['courier_id'] ?>">
                            ✏ Update
                        </a>

                        <a class="btn btn-sm btn-outline-danger hover-btn"
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

<style>
/* Button hover animation */
.hover-btn:hover {
    transform: scale(1.08);
    transition: 0.25s ease-in-out;
    box-shadow: 0 6px 20px rgba(0,0,0,0.6);
}

/* Table row hover glow */
.table-hover tbody tr:hover {
    background-color: rgba(0, 255, 255, 0.08);
    transition: 0.2s;
}

/* Page background */
body {
    background: linear-gradient(135deg, #000000, #0f2027);
    min-height: 100vh;
}
</style>

<?php include "../includes/footer.php"; ?>
