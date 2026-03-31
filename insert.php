<?php
// Include the database connection
require_once 'dbconfig.php';

// Data to be inserted (in real projects, this comes from $_POST form data)
$newAttendee = [
    'attendee_name'  => 'Pedro Penduko',
    'email'          => 'pedro@email.com',
    'concert_name'   => 'Eraserheads Reunion',
    'venue'          => 'Mall of Asia Arena',
    'concert_date'   => '2025-06-15',
    'ticket_type'    => 'Backstage Pass',
    'ticket_price'   => 5000.00,
    'seats_purchased'=> 1
];

// Use a prepared statement with named placeholders (:name) to prevent SQL injection
$sql = "INSERT INTO rock_concert_attendances 
            (attendee_name, email, concert_name, venue, concert_date, ticket_type, ticket_price, seats_purchased)
        VALUES 
            (:attendee_name, :email, :concert_name, :venue, :concert_date, :ticket_type, :ticket_price, :seats_purchased)";

// Prepare the statement
$stmt = $pdo->prepare($sql);

// Execute and bind the values from our array
$stmt->execute($newAttendee);

// rowCount() returns how many rows were affected
if ($stmt->rowCount() > 0) {
    // lastInsertId() gets the auto-generated ID of the newly inserted record
    echo "Record inserted successfully! New ID: " . $pdo->lastInsertId();
} else {
    echo "Insertion failed.";
}
?>