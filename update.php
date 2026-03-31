<?php
// Include the database connection
require_once 'dbconfig.php';

// Updated data — upgrading Maria Santos from General Admission to VIP
$updatedData = [
    'ticket_type'    => 'VIP',
    'ticket_price'   => 2500.00,
    'seats_purchased'=> 2,
    'id'             => 2  // ID of Maria Santos
];

// Prepare UPDATE statement with named placeholders
$sql = "UPDATE rock_concert_attendances
        SET 
            ticket_type     = :ticket_type,      -- New ticket type
            ticket_price    = :ticket_price,     -- New price
            seats_purchased = :seats_purchased   -- Updated seat count
        WHERE id = :id";                          -- Target specific record by ID

// Prepare the statement
$stmt = $pdo->prepare($sql);

// Execute with the updated values
$stmt->execute($updatedData);

// Confirm the update
if ($stmt->rowCount() > 0) {
    echo "Record updated successfully!";
} else {
    echo "No changes were made (data may already be the same).";
}
?>