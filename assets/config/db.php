<?php
// this file creates a connecttion to the MySQL-database.

//Values matches settings in docker-compose.yml
define('DB_HOST', 'mysql');        // Server name
define('DB_NAME', 'mydb');         // Database name
define('DB_USER', 'root');         // User name
define('DB_PASS', 'root');         // Password

// Create database connection using PDO
try {
    // Connection string (DSN = Data Source Name)
    // utf8mb4 for swedish symbols
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

    // PDO-settings
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,                            // Show errors as exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,                       // Get results as associative arrays
        PDO::ATTR_EMULATE_PREPARES => false,                                    // Prevent SQL injection by using real prepared statements
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = 'Europe/Stockholm'",   // Swedish timezone
    ];

    // Create connection
    $dbh = new PDO($dsn, DB_USER, DB_PASS, $options);

    // Success message (for testing, can be removed later)
    echo 'Anslutningen till databasen lyckades!';
} catch (PDOException $e) {
    // Error message if connection fails
    die("Kunde inte ansluta till databasen.");
}
