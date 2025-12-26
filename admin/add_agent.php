<?php
include "../includes/auth_check.php";
include "../config/db.php";

if ($_SESSION['role'] != 'ADMIN') die("Access Denied");
?>

<form method="POST" action="../actions/agent_action.php">
    <input type="text" name="name" placeholder="Agent Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone">
    <input type="text" name="city" placeholder="City">
    <input type="text" name="branch" placeholder="Branch">
    <input type="password" name="password" required>
    <button name="add_agent">Add Agent</button>
</form>
