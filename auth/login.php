<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<?php include "../includes/header.php"; ?>

<!-- LOGIN FORM -->
<section class="auth-section d-flex align-items-center justify-content-center py-5" style="min-height:80vh;">
    <div class="auth-box bg-gray-dark p-4 p-md-5 rounded-3 shadow-lg" style="max-width:400px; width:100%;">

        <div class="text-center mb-4">
            <h3 class="text-white fw-bold">Welcome Back</h3>
            <p class="text-gray mb-0">Login to your account</p>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger text-center py-2">
                <?php
                    if ($_GET['error'] === 'invalid_password') {
                        echo "Invalid Password";
                    } elseif ($_GET['error'] === 'user_not_found') {
                        echo "User not found or inactive";
                    }
                ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login_action.php" class="form-floating-form">

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control bg-dark text-white border-0" id="email" placeholder="Email Address" required>
                <label for="email" class="text-gray">Email Address</label>
            </div>

            <div class="form-floating mb-4">
                <input type="password" name="password" class="form-control bg-dark text-white border-0" id="password" placeholder="Password" required>
                <label for="password" class="text-gray">Password</label>
            </div>

            <button class="btn btn-accent w-100 py-2 fw-bold">Login</button>
        </form>

        <div class="text-center mt-3 text-gray">
            <small>
                Don't have an account? <a href="register.php" class="text-accent">Register</a>
            </small>
        </div>

    </div>
</section>

<?php include "../includes/footer.php"; ?>

<!-- Custom Styles -->
<style>
/* THEME COLORS */
.auth-section { background-color: #0d0d0d; }
.bg-gray-dark { background-color: #1f1f1f; }
.text-gray { color: #b0b0b0; }
.text-accent { color: #ff4b2b; }

/* Fade Up Animation */
@keyframes fadeUp{
    from {opacity:0; transform:translateY(30px);}
    to {opacity:1; transform:translateY(0);}
}
.auth-box { opacity:0; animation: fadeUp 0.8s ease forwards; }

/* Floating label styles */
.form-floating-form .form-floating {
    position: relative;
}
.form-floating-form .form-control {
    background-color: #222;
    border-radius: 12px;
    height: 50px;
    padding: 1rem 0.75rem 0.25rem 0.75rem;
    color: #fff;
}
.form-floating-form label {
    position: absolute;
    top: 12px;
    left: 0.75rem;
    color: #888;
    transition: all 0.3s ease;
    pointer-events: none;
}

/* Move label when input focused or has value */
.form-floating-form .form-control:focus + label,
.form-floating-form .form-control:not(:placeholder-shown) + label {
    top: -10px;
    left: 0.75rem;
    font-size: 0.85rem;
    color: #ff4b2b;
}

/* Input focus */
.form-control:focus {
    box-shadow: none;
    border: 1px solid #ff4b2b;
}

/* Buttons */
.btn-accent {
    background-color: #ff4b2b;
    color: #fff;
    border-radius: 30px;
    transition: all 0.3s;
}
.btn-accent:hover {
    background-color: #ff652f;
    transform: scale(1.05);
}

/* Alerts */
.alert {
    border-radius: 12px;
}

/* Fade-up animation for box */
.auth-box {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeUp 0.8s ease forwards;
}
</style>
