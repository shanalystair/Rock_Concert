<?php
// Include the database connection
require_once 'dbconfig.php';

// Complex query: summarize total revenue per concert with attendee count
$sql = "SELECT 
            rca.id,
            rca.attendee_name,
            rca.email,
            rca.concert_name,
            rca.venue,
            rca.concert_date,
            rca.ticket_type,
            rca.ticket_price,
            rca.seats_purchased,
            -- Calculate total spending per attendee
            (rca.ticket_price * rca.seats_purchased) AS total_spent
        FROM rock_concert_attendances rca
        ORDER BY rca.concert_date ASC, total_spent DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rock Concert Attendances</title>
    <style>
        /* Basic table styling */
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2   { color: #333; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #aaa; padding: 8px 12px; text-align: left; }
        th   { background-color: #4a90d9; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; } /* Alternating row colors */
        .vip { color: darkred; font-weight: bold; }
    </style>
</head>
<body>

<h2>Rock Concert Attendance Records</h2>

<!-- Check if there are records to display -->
<?php if (count($records) > 0): ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Attendee Name</th>
            <th>Email</th>
            <th>Concert</th>
            <th>Venue</th>
            <th>Date</th>
            <th>Ticket Type</th>
            <th>Price (₱)</th>
            <th>Seats</th>
            <th>Total Spent (₱)</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop through each record and render a table row -->
        <?php foreach ($records as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['attendee_name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['concert_name']) ?></td>
            <td><?= htmlspecialchars($row['venue']) ?></td>
            <td><?= htmlspecialchars($row['concert_date']) ?></td>
            <!-- Highlight VIP tickets with a special CSS class -->
            <td class="<?= $row['ticket_type'] === 'VIP' ? 'vip' : '' ?>">
                <?= htmlspecialchars($row['ticket_type']) ?>
            </td>
            <td><?= number_format($row['ticket_price'], 2) ?></td>
            <td><?= htmlspecialchars($row['seats_purchased']) ?></td>
            <td><strong><?= number_format($row['total_spent'], 2) ?></strong></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <p>No records found.</p>
<?php endif; ?>

</body>
</html>