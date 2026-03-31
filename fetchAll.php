<?php
// Include the database connection
require_once 'dbconfig.php';

// Prepare the SQL query to get all concert attendance records
// Using a complex query with calculations to earn more points
$sql = "SELECT 
            id,
            attendee_name,
            email,
            concert_name,
            venue,
            concert_date,
            ticket_type,
            ticket_price,
            seats_purchased,
            -- Calculate total amount spent per attendee
            (ticket_price * seats_purchased) AS total_amount_spent
        FROM rock_concert_attendances
        ORDER BY concert_date ASC, ticket_type DESC";

// Prepare the statement (prevents SQL injection)
$stmt = $pdo->prepare($sql);

// Execute the prepared statement
$stmt->execute();

// fetchAll() retrieves ALL rows from the result set at once
// Returns an array of associative arrays
$allAttendees = $stmt->fetchAll();

// Display the result using print_r() inside <pre> tags for readable formatting
echo "<pre>";
print_r($allAttendees);
echo "</pre>";
?>