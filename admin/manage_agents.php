<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'ADMIN') die("Access Denied");

$totalAgents   = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM users WHERE role='AGENT'"))[0];
$activeAgents  = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM users WHERE role='AGENT' AND status=1"))[0];
$inactiveAgents = $totalAgents - $activeAgents;
?>

<!-- AGENT MANAGEMENT -->
<section class="auth-section py-5" style="min-height:85vh;">

<div class="container">

    <div class="text-center mb-5">
        <h2 class="fw-bold text-white">⚡ Agent Management</h2>
        <p class="text-gray">Manage agents, status & performance</p>
    </div>

    <!-- STATS -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="neo-card">
                <div class="icon-circle accent">
                    <i class="bi bi-people"></i>
                </div>
                <h6>Total Agents</h6>
                <h1><?= $totalAgents ?></h1>
            </div>
        </div>

        <div class="col-md-4">
            <div class="neo-card success">
                <div class="icon-circle success">
                    <i class="bi bi-check-circle"></i>
                </div>
                <h6>Active</h6>
                <h1><?= $activeAgents ?></h1>
            </div>
        </div>

        <div class="col-md-4">
            <div class="neo-card danger">
                <div class="icon-circle danger">
                    <i class="bi bi-x-circle"></i>
                </div>
                <h6>Inactive</h6>
                <h1><?= $inactiveAgents ?></h1>
            </div>
        </div>

    </div>

    <!-- SEARCH + ACTION -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <input type="text" id="search"
               class="form-control dark-input rounded-pill px-4"
               style="max-width:300px"
               placeholder="🔍 Search agent...">

        <a href="add_agent.php" class="neo-btn accent">
            ➕ Add Agent
        </a>
    </div>

    <!-- TABLE -->
    <div class="glass p-4 mb-5">
        <table class="table table-dark table-hover align-middle mb-0" id="agentTable">
            <thead>
                <tr class="text-center">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Branch</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $q = mysqli_query($conn,"SELECT * FROM users WHERE role='AGENT'");
            while($row=mysqli_fetch_assoc($q)){
            ?>
                <tr class="text-center">
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['branch'] ?></td>
                    <td>
                        <span class="badge <?= $row['status']?'bg-success':'bg-danger' ?>">
                            <?= $row['status']?'Active':'Inactive' ?>
                        </span>
                    </td>
                    <td>
                        <button class="neo-btn danger small"
                                onclick="deleteAgent(<?= $row['user_id'] ?>)">
                            🗑 Delete
                        </button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</section>

<!-- THEME -->
<style>
.auth-section{
    background:linear-gradient(135deg,#000000,#0f2027);
}
.text-gray{color:#b0b0b0}

/* Cards */
.neo-card{
    background:#1f1f1f;
    border-radius:22px;
    padding:30px;
    text-align:center;
    border:1px solid rgba(255,255,255,.08);
    box-shadow:0 0 30px rgba(0,0,0,.4);
    transition:.4s;
}
.neo-card:hover{
    transform:translateY(-10px) scale(1.04);
    box-shadow:0 0 40px rgba(255,75,43,.4);
}
.neo-card h6{color:#aaa;font-size:14px}
.neo-card h1{color:#fff;font-size:42px;font-weight:800}

/* Icons */
.icon-circle{
    width:70px;height:70px;
    border-radius:50%;
    margin:0 auto 14px;
    display:flex;align-items:center;justify-content:center;
    font-size:30px;
}
.icon-circle.accent{
    background:#ff4b2b;
    box-shadow:0 0 25px rgba(255,75,43,.6);
}
.icon-circle.success{
    background:#22c55e;
    box-shadow:0 0 25px rgba(34,197,94,.6);
}
.icon-circle.danger{
    background:#dc3545;
    box-shadow:0 0 25px rgba(220,53,69,.6);
}

/* Glass */
.glass{
    background:rgba(255,255,255,.06);
    backdrop-filter:blur(15px);
    border-radius:20px;
    box-shadow:0 0 35px rgba(255,75,43,.25);
}

/* Inputs */
.dark-input{
    background:#1a1a1a;
    color:#fff;
    border:2px solid #ff4b2b;
    border-radius:14px;
    padding:12px;
    transition:.3s;
}
.dark-input:focus{
    background:#222;
    color:#fff;
    box-shadow:0 0 0 .25rem rgba(255,75,43,.25);
    border-color:#ff4b2b;
}

/* Buttons */
.neo-btn{
    padding:12px 26px;
    border-radius:30px;
    color:#fff;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
    border:none;
}
.neo-btn.accent{background:#ff4b2b}
.neo-btn.danger{background:#dc3545}
.neo-btn.small{padding:6px 14px;font-size:14px}
.neo-btn:hover{
    transform:scale(1.08);
    box-shadow:0 0 25px rgba(255,255,255,.3);
}

/* Table hover */
.table-hover tbody tr:hover{
    background:rgba(255,75,43,.05);
    transition:.2s;
}

/* Badges */
.badge.bg-success{background:#22c55e !important}
.badge.bg-danger{background:#dc3545 !important}
</style>

<!-- JS -->
<script>
// SEARCH
document.getElementById("search").addEventListener("keyup",function(){
    let v=this.value.toLowerCase();
    document.querySelectorAll("#agentTable tbody tr").forEach(r=>{
        r.style.display=r.innerText.toLowerCase().includes(v)?"":"none";
    });
});

// DELETE
function deleteAgent(id){
    if(!confirm("Delete agent?")) return;
    fetch("delete_agent.php?id="+id)
    .then(()=>location.reload());
}
</script>

<?php include "../includes/footer.php"; ?>
