<?php
try {
    // Database credentials
    $hostname = 'db.cs.dal.ca';
    $username = 'kchaudhary';
    $password = 'oi7HKkP9LKpWtsrMiQaoJ8GKT'; // Use the password generated in Step (a)
    $database = 'kchaudhary';

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If the connection is successful, display a confirmation message
    echo "Connection to database works!";
} catch (PDOException $e) {
    // If an error occurs, display the error message
    echo "Connection failed: " . $e->getMessage();
}
?>