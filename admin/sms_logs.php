<?php
include "../includes/auth_check.php";
include "../config/db.php";

if ($_SESSION['role'] != 'ADMIN') die("Access Denied");

$result = mysqli_query($conn,
    "SELECT s.message, s.sent_to, s.sent_at, u.name
     FROM sms_logs s
     JOIN users u ON s.sent_by=u.user_id
     ORDER BY s.sent_at DESC"
);
?>

<h2>SMS Logs</h2>

<table border="1">
<tr>
    <th>Message</th>
    <th>Sent To</th>
    <th>Sent By</th>
    <th>Date</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['message'] ?></td>
    <td><?= $row['sent_to'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['sent_at'] ?></td>
</tr>
<?php } ?>
</table>
