<?php
// Include database connection code here
include 'db_connection.php';

// Check if ID parameter is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete record from the database
    $stmt = $conn->prepare("DELETE FROM vedPlants WHERE id=?");
    $stmt->execute([$id]);

    // Redirect to the main page with a success message
    header('Location: index.php?message=Record deleted successfully');
} else {
    // If ID is not provided, redirect to the main page
    header('Location: index.php');
}
?>

