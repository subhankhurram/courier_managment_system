<?php
include "../config/db.php";

$trk = $_GET['tracking'];

$res = mysqli_query($conn,
"SELECT c.tracking_number, s.status, s.location, s.updated_at
 FROM couriers c
 JOIN shipment_tracking s ON c.courier_id=s.courier_id
 WHERE c.tracking_number='$trk'"
);
?>

<h3>Shipment Timeline</h3>
<?php while ($row = mysqli_fetch_assoc($res)) { ?>
<p>
<b><?= $row['status'] ?></b> -
<?= $row['location'] ?> |
<?= $row['updated_at'] ?>
</p>
<?php } ?>
