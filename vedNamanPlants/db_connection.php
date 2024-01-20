<?php
// SQLite database file
$databaseFile = 'vedPlants.sqlite';

// Create or open the SQLite database
try {
    $conn = new PDO('sqlite:' . $databaseFile);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
}
?>
