<?php
include "../includes/auth_check.php";
include "../config/db.php";
include "../includes/header.php";

if ($_SESSION['role'] != 'ADMIN') die("Access Denied");

$totalAgents = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM users WHERE role='AGENT'"))[0];
$activeAgents = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM users WHERE role='AGENT' AND status=1"))[0];
$inactiveAgents = $totalAgents - $activeAgents;
?>

<div class="container-fluid admin-wrap">

<h2 class="title">⚡ Agent Management Dashboard</h2>

<!-- STATS -->
<div class="row g-4 mb-4">
  <div class="col-md-4">
    <div class="stat-card blue">
      <h5>Total Agents</h5>
      <h2><?= $totalAgents ?></h2>
    </div>
  </div>
  <div class="col-md-4">
    <div class="stat-card green">
      <h5>Active</h5>
      <h2><?= $activeAgents ?></h2>
    </div>
  </div>
  <div class="col-md-4">
    <div class="stat-card red">
      <h5>Inactive</h5>
      <h2><?= $inactiveAgents ?></h2>
    </div>
  </div>
</div>

<!-- SEARCH -->
<input type="text" id="search" class="form-control search-box mb-3" placeholder="🔍 Search agent...">

<div class="text-end mb-3">
  <a href="add_agent.php" class="neo-btn primary">➕ Add Agent</a>
</div>

<!-- TABLE -->
<div class="glass">
<table class="table agent-table" id="agentTable">
<thead>
<tr>
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
<tr>
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
<button class="neo-btn danger small" onclick="deleteAgent(<?= $row['user_id'] ?>)">🗑 Delete</button>
</td>
</tr>
<?php } ?>

</tbody>
</table>
</div>

<!-- CHART -->
<div class="glass mt-5 p-4">
<canvas id="agentChart"></canvas>
</div>

</div>

<!-- STYLES -->
<style>
body{
background:radial-gradient(circle,#0a1a2f,#000);
color:#fff;
font-family:'Segoe UI';
}

.admin-wrap{padding:30px}

.title{
text-align:center;
color:#6ec1ff;
font-weight:800;
text-shadow:0 0 20px #6ec1ff;
margin-bottom:30px;
}

.stat-card{
padding:25px;
border-radius:16px;
text-align:center;
font-weight:700;
box-shadow:0 0 25px rgba(0,0,0,.6);
}

.stat-card.blue{background:#0d6efd}
.stat-card.green{background:#198754}
.stat-card.red{background:#dc3545}

.glass{
background:rgba(255,255,255,.06);
backdrop-filter:blur(15px);
border-radius:18px;
padding:20px;
box-shadow:0 0 35px rgba(110,193,255,.4);
}

.agent-table thead{
background:linear-gradient(135deg,#0d6efd,#6ec1ff);
color:#000;
}

.agent-table tbody tr:hover{
background:rgba(110,193,255,.12);
transform:scale(1.01);
transition:.3s;
}

.neo-btn{
border:none;
padding:10px 22px;
border-radius:50px;
color:#fff;
background:#0d6efd;
box-shadow:0 0 20px #0d6efd;
transition:.3s;
}

.neo-btn:hover{transform:scale(1.08)}

.neo-btn.danger{background:#dc3545}
.neo-btn.small{padding:6px 14px;font-size:14px}

.search-box{
border-radius:30px;
padding:12px 20px;
box-shadow:0 0 20px rgba(110,193,255,.5);
}
</style>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

// CHART
new Chart(document.getElementById('agentChart'),{
type:'doughnut',
data:{
labels:['Active','Inactive'],
datasets:[{
data:[<?= $activeAgents ?>,<?= $inactiveAgents ?>],
backgroundColor:['#198754','#dc3545']
}]
}
);
</script>

<?php include "../includes/footer.php"; ?>
