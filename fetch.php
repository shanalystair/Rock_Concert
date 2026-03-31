<?php
// Include the database connection
require_once 'dbconfig.php';

// Query to get VIP attendees with total spending — one row at a time
$sql = "SELECT 
            attendee_name,
            concert_name,
            venue,
            ticket_type,
            ticket_price,
            seats_purchased,
            -- Compute total cost
            (ticket_price * seats_purchased) AS total_cost
        FROM rock_concert_attendances
        WHERE ticket_type = 'VIP'
        ORDER BY total_cost DESC";

// Prepare and execute the statement
$stmt = $pdo->prepare($sql);
$stmt->execute();

echo "<h3>VIP Attendees (fetched one row at a time using fetch()):</h3>";

// fetch() retrieves ONE row at a time from the result set
// Loop continues until fetch() returns false (no more rows)
while ($row = $stmt->fetch()) {
    echo "<pre>";
    print_r($row); // Print each row individually
    echo "</pre>";
}
?>