<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'ADMIN') die("Access Denied");
?>

<!-- ADD AGENT -->
<section class="auth-section d-flex align-items-center justify-content-center py-5" style="min-height:85vh;">

    <div class="auth-box bg-gray-dark p-4 p-md-5 rounded-4 shadow-lg" style="max-width:650px;width:100%;">

        <div class="text-center mb-4">
            <h3 class="text-white fw-bold">Add New Agent</h3>
            <p class="text-gray mb-0">Create agent account</p>
        </div>

        <form method="POST" action="../actions/agent_action.php" class="floating-form">

            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control bg-dark text-white border-0"
                       id="name" placeholder="Agent Name" required>
                <label for="name">Agent Name</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control bg-dark text-white border-0"
                       id="email" placeholder="Email" required>
                <label for="email">Email Address</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="phone" class="form-control bg-dark text-white border-0"
                       id="phone" placeholder="Phone">
                <label for="phone">Phone Number</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="city" class="form-control bg-dark text-white border-0"
                       id="city" placeholder="City">
                <label for="city">City</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="branch" class="form-control bg-dark text-white border-0"
                       id="branch" placeholder="Branch">
                <label for="branch">Branch</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" name="password" class="form-control bg-dark text-white border-0"
                       id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <button name="add_agent" class="btn btn-accent w-100 py-2 fw-bold">
                ➕ Add Agent
            </button>

        </form>

    </div>
</section>

<?php include "../includes/footer.php"; ?>

<style>
/* THEME */
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
.floating-form .form-control{
    background:#222;
    color:#fff;
    height:52px;
    border-radius:14px;
    padding:1rem .75rem .25rem;
}
.floating-form label{
    color:#888;
    transition:.3s;
}
.form-control:focus{
    box-shadow:none;
    border:1px solid #ff4b2b;
    background:#222;
}
.form-control:focus + label,
.form-control:not(:placeholder-shown) + label{
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
</style>
