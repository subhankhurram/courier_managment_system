<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";
?>

<!-- MANAGE CUSTOMERS -->
<section class="auth-section py-5" style="min-height:85vh;">

<div class="container">

    <div class="text-center mb-5">
        <h3 class="fw-bold text-white">Manage Customers</h3>
        <p class="text-gray mb-0">View, manage, and delete customer records</p>
    </div>

    <!-- ALERTS -->
    <?php if(isset($_SESSION['customer_success'])): ?>
        <div class="alert glow-alert text-center mb-4">
            <?= $_SESSION['customer_success']; unset($_SESSION['customer_success']); ?>
        </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['customer_error'])): ?>
        <div class="alert glow-alert-danger text-center mb-4">
            <?= $_SESSION['customer_error']; unset($_SESSION['customer_error']); ?>
        </div>
    <?php endif; ?>

    <div class="glass p-4">

        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0 rounded-3 overflow-hidden">
                <thead>
                    <tr class="text-center text-accent">
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
                        <td class="fw-semibold text-white">
                            <?= $row['name'] ?>
                        </td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <a class="neo-btn danger small"
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

</div>
</section>

<?php include "../includes/footer.php"; ?>

<style>
/* GLOBAL THEME */
.auth-section{
    background:linear-gradient(135deg,#000000,#0f2027);
}
.text-gray{color:#b0b0b0}
.text-accent{color:#ff4b2b}

/* Glass container */
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
.neo-btn.danger{background:#dc3545}
.neo-btn.small{font-size:14px}
.neo-btn:hover{
    transform:scale(1.08);
    box-shadow:0 0 20px rgba(255,255,255,.3);
}

/* ALERTS */
.glow-alert{
    background:#000;
    color:#ff4b2b;
    border:2px solid #ff4b2b;
    border-radius:16px;
    padding:12px;
    box-shadow:0 0 25px rgba(255,75,43,.5);
}
.glow-alert-danger{
    background:#000;
    color:#dc3545;
    border:2px solid #dc3545;
    border-radius:16px;
    padding:12px;
    box-shadow:0 0 25px rgba(255,75,43,.5);
}
</style>
