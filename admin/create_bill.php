<?php
include "../includes/auth_check.php";
include "../config/db.php";
?>

<form method="POST" action="../actions/billing_action.php">
    <input type="number" name="courier_id" placeholder="Courier ID" required>
    <input type="number" name="amount" placeholder="Amount" required>
    <select name="payment_mode">
        <option>CASH</option>
        <option>ONLINE</option>
    </select>
    <button name="create_bill">Create Bill</button>
</form>
