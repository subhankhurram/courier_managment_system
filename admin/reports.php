<?php
include "../includes/auth_check.php";
include "../config/db.php";

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=shipment_report.csv");

$output = fopen("php://output", "w");

fputcsv($output, [
    'Tracking', 'Receiver', 'Status', 'Branch', 'Booking Date'
]);

$result = mysqli_query($conn, "SELECT * FROM couriers");

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, [
        $row['tracking_number'],
        $row['receiver_name'],
        $row['status'],
        $row['branch'],
        $row['booking_date']
    ]);
}

fclose($output);
exit;
?>
