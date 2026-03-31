<?php
// Database configuration constants
define('DB_HOST', 'localhost');   // Host where MySQL server is running
define('DB_NAME', 'concertdb'); // Name of the database
define('DB_USER', 'root');         // MySQL username (default for XAMPP)
define('DB_PASS', '');             // MySQL password (blank for XAMPP default)
define('DB_CHARSET', 'utf8mb4');   // Character set for proper encoding

// Data Source Name (DSN) — tells PDO which driver and database to use
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

// PDO options for better error handling and security
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,   // Throw exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,          // Return rows as associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                     // Use real prepared statements
];

try {
    // Create a new PDO connection instance
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    // If connection fails, stop the script and show error message
    die("Connection failed: " . $e->getMessage());
}
?>