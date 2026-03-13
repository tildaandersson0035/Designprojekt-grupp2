<?php
// this file creates a connecttion to the MySQL-database.

//Values matches settings in docker-compose.yml
define('DB_HOST', 'mysql');        // Server name
define('DB_NAME', 'chefskiss');    // Database name
define('DB_USER', 'root');         // User name
define('DB_PASS', 'root');         // Password

// Create database connection using PDO
try {
    // Connection string (DSN = Data Source Name)
    // utf8mb4 for swedish symbols
     $dbh = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,

    // PDO-settings
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,                           // Show errors as exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,                      // Get results as associative arrays
        PDO::ATTR_EMULATE_PREPARES => false,                                   // Prevent SQL injection by using real prepared statements
        PDO::MYSQL_ATTR_FOUND_ROWS => true,                                    // Return the number of found rows, not the number of affected rows
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = 'Europe/Stockholm'"  // Swedish timezone
     )
     );

    // Create connection

} catch (PDOException $e) {
    // Error message if connection fails
    die("Database connection failed: " . $e->getMessage());
}
