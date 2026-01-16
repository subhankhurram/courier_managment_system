<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'AGENT') die("Access Denied");
?>

<section class="auth-section py-5" style="min-height:85vh;">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white">📦 Add New Courier</h2>
            <p class="text-gray">Create a new shipment for customer</p>
        </div>

        <!-- Form Card -->
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <div class="glass p-4 p-md-5">

                    <form method="POST" action="../actions/courier_action.php">

                        <!-- Customer -->
                        <div class="mb-3">
                            <label class="form-label text-white fw-semibold">
                                Select Customer
                            </label>
                            <select name="sender_id" class="form-select dark-input" required>
                                <option value="">-- Choose Customer --</option>
                                <?php
                                $c = mysqli_query($conn,"SELECT * FROM customers");
                                while ($row = mysqli_fetch_assoc($c)) {
                                    echo "<option value='{$row['customer_id']}'>
                                            {$row['name']}
                                          </option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Receiver Name -->
                        <div class="mb-3">
                            <label class="form-label text-white fw-semibold">
                                Receiver Name
                            </label>
                            <input type="text"
                                   class="form-control dark-input"
                                   name="receiver_name"
                                   placeholder="Enter receiver name"
                                   required>
                        </div>

                        <!-- Receiver Phone -->
                        <div class="mb-3">
                            <label class="form-label text-white fw-semibold">
                                Receiver Phone
                            </label>
                            <input type="text"
                                   class="form-control dark-input"
                                   name="receiver_phone"
                                   placeholder="03xx-xxxxxxx"
                                   required>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="form-label text-white fw-semibold">
                                Delivery Address
                            </label>
                            <textarea class="form-control dark-input"
                                      name="receiver_address"
                                      rows="3"
                                      placeholder="Complete delivery address"></textarea>
                        </div>

                        <!-- Row -->
                        <div class="row">

                            <!-- Courier Type -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white fw-semibold">
                                    Courier Type
                                </label>
                                <input type="text"
                                       class="form-control dark-input"
                                       name="courier_type"
                                       placeholder="Parcel / Document">
                            </div>

                            <!-- Courier Company -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-white fw-semibold">
                                    Courier Company
                                </label>
                                <input type="text"
                                       class="form-control dark-input"
                                       name="courier_company"
                                       placeholder="TCS / DHL / Leopards">
                            </div>

                        </div>

                        <!-- Expected Delivery -->
                        <div class="mb-4">
                            <label class="form-label text-white fw-semibold">
                                Expected Delivery Date
                            </label>
                            <input type="date"
                                   class="form-control dark-input"
                                   name="expected_delivery">
                        </div>

                        <!-- Submit -->
                        <div class="text-center">
                            <button class="btn btn-accent px-5 py-2"
                                    name="add_courier">
                                <i class="bi bi-truck me-2"></i>
                                Add Courier
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>
</section>

<!-- Custom Styles -->
<style>
.auth-section{
    background: linear-gradient(135deg,#000000,#0f2027);
}

/* Text */
.text-gray{color:#b0b0b0}

/* Glass Card */
.glass{
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(18px);
    border-radius:20px;
    box-shadow:0 0 40px rgba(255,75,43,.3);
}

/* Inputs */
.dark-input{
    background: rgba(0,0,0,0.6);
    border:1px solid rgba(255,255,255,0.15);
    color:#fff;
    border-radius:12px;
}
.dark-input::placeholder{
    color:#9ca3af;
}
.dark-input:focus{
    background: rgba(0,0,0,0.7);
    border-color:#ff4b2b;
    box-shadow:0 0 0 0.15rem rgba(255,75,43,.25);
    color:#fff;
}

/* Select */
.form-select.dark-input option{
    background:#111;
    color:#fff;
}
</style>

<?php include "../includes/footer.php"; ?>
