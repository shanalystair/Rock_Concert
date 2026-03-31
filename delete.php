<?php
// Include the database connection
require_once 'dbconfig.php';

// ID of the record to be deleted
// In real projects, this would come from $_GET or $_POST
$deleteId = 9; // The ID of Pedro Penduko we just inserted

// Prepare DELETE statement using a named placeholder for safety
$sql = "DELETE FROM rock_concert_attendances WHERE id = :id";

// Prepare the statement
$stmt = $pdo->prepare($sql);

// Bind the ID value to the :id placeholder
$stmt->bindParam(':id', $deleteId, PDO::PARAM_INT); // PARAM_INT ensures it's treated as integer

// Execute the deletion
$stmt->execute();

// Check how many rows were deleted
if ($stmt->rowCount() > 0) {
    echo "Record with ID $deleteId deleted successfully.";
} else {
    echo "No record found with ID $deleteId. Nothing was deleted.";
}
?>