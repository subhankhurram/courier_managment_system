<?php
include "../includes/auth_check.php";
include "../includes/header.php";
?>

<!-- ADD CUSTOMER -->
<section class="auth-section d-flex align-items-center justify-content-center py-5" style="min-height:85vh;">

    <div class="auth-box bg-gray-dark p-4 p-md-5 rounded-4 shadow-lg"
         style="max-width:650px;width:100%;">

        <div class="text-center mb-4">
            <h3 class="text-white fw-bold">Add New Customer</h3>
            <p class="text-gray mb-0">Create customer account</p>
        </div>

        <form method="POST"
              action="../actions/customer_action.php"
              class="floating-form"
              id="addCustomerForm">

            <div class="form-floating mb-3">
                <input type="text" name="name"
                       class="form-control bg-dark text-white border-0"
                       id="name" placeholder="Customer Name" required>
                <label for="name">Customer Name</label>
                <small class="text-danger" id="nameError"></small>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="phone"
                       class="form-control bg-dark text-white border-0"
                       id="phone" placeholder="Phone Number" required>
                <label for="phone">Phone Number</label>
                <small class="text-danger" id="phoneError"></small>
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email"
                       class="form-control bg-dark text-white border-0"
                       id="email" placeholder="Email Address">
                <label for="email">Email Address</label>
                <small class="text-danger" id="emailError"></small>
            </div>

            <div class="form-floating mb-4">
                <textarea name="address"
                          class="form-control bg-dark text-white border-0"
                          id="address"
                          placeholder="Full Address"
                          style="height:90px"></textarea>
                <label for="address">Address</label>
                <small class="text-danger" id="addressError"></small>
            </div>

            <button name="add_customer"
                    class="btn btn-accent w-100 py-2 fw-bold">
                ➕ Add Customer
            </button>

        </form>

    </div>
</section>

<?php include "../includes/footer.php"; ?>

<style>
/* SAME THEME */
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
.floating-form textarea.form-control{
    height:auto;
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

<script>
// Customer Form Validation
document.getElementById("addCustomerForm").addEventListener("submit", function(e){
    let valid = true;

    // Clear previous errors
    ["name","phone","email","address"].forEach(id=>{
        document.getElementById(id+"Error").innerText = "";
    });

    // Name: letters & spaces only
    const name = document.getElementById("name").value.trim();
    if(!/^[A-Za-z\s]{2,50}$/.test(name)){
        document.getElementById("nameError").innerText = "Name should contain only letters (2-50 chars).";
        valid = false;
    }

    // Phone: digits 10-15
    const phone = document.getElementById("phone").value.trim();
    if(!/^\d{10,15}$/.test(phone)){
        document.getElementById("phoneError").innerText = "Phone should be 10-15 digits.";
        valid = false;
    }

    // Email: valid format (optional)
    const email = document.getElementById("email").value.trim();
    if(email && !/^[\w.-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,6}$/.test(email)){
        document.getElementById("emailError").innerText = "Invalid email address.";
        valid = false;
    }

    // Address: min 5 chars
    const address = document.getElementById("address").value.trim();
    if(address && address.length < 5){
        document.getElementById("addressError").innerText = "Address must be at least 5 characters.";
        valid = false;
    }

    if(!valid) e.preventDefault();
});
</script>
