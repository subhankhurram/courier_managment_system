<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";
?>

<h4 class="text-center text-info fw-bold mb-4 display-6">
    Manage Customers
</h4>

<div class="container">
    <div class="table-responsive shadow-lg rounded-4 p-3"
         style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);">

        <table class="table table-dark table-hover align-middle mb-0 rounded-3 overflow-hidden">
            <thead>
                <tr class="text-info text-center">
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <?php
            $res = mysqli_query($conn,"SELECT * FROM customers");
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <tr class="text-center">
                    <td class="fw-semibold text-light">
                        <?= $row['name'] ?>
                    </td>

                    <td><?= $row['phone'] ?></td>

                    <td><?= $row['email'] ?></td>

                    <td>
                        <a class="btn btn-sm btn-outline-danger hover-btn"
                           href="../actions/customer_action.php?delete=<?= $row['customer_id'] ?>"
                           onclick="return confirm('Delete customer?')">
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
/* Button hover */
.hover-btn:hover {
    transform: scale(1.08);
    transition: 0.25s ease-in-out;
    box-shadow: 0 6px 20px rgba(0,0,0,0.6);
}

/* Row hover */
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
