<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // In a real-world scenario, you'd want to validate the credentials against a database.
    // For simplicity, I'm using hardcoded values here.
    if ($username == 'cjp@vanaspati.com' && $password == 'vanaspati') {
        $_SESSION['username'] = $username;
        header("Location: index.php"); // Redirect to the dashboard or home page
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
    require 'header.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plants Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2>Plants Data</h2>
        <a href="create.php" class="btn btn-primary mb-3">Add New Plant</a>

        <?php
        // Include database connection code here
        include 'db_connection.php';

        // Fetch and display records
        // Pagination logic
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $records_per_page = 10; // Adjust as needed
        $offset = ($page - 1) * $records_per_page;

        // Fetch records with pagination
        $stmt = $conn->prepare("SELECT * FROM vedPlants LIMIT :offset, :records_per_page");
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if ($result) {
            echo '<table class="table table-bordered">';
            echo '<thead><tr><th>ID</th><th>Heading</th><th>Main Title</th><th>Main Description</th><th>Actions</th></tr></thead>';
            echo '<tbody>';
            foreach ($result as $row) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['heading'] . '</td>';
                echo '<td>' . $row['main_title'] . '</td>';
                echo '<td>' . $row['benefits_title1'] . '</td>';
                echo '<td>'. $row['benefits_title2'] . '</td>';
                echo '<td>'. $row['benefits_title3'] . '</td>';
                echo '<td>'. $row['benefits_title4'] . '</td>';
                echo '<td>'. $row['benefits_title5'] . '</td>';
                echo '<td>'. $row['benefits_title6'] . '</td>';
                echo '<td>'. $row['benefits_title7'] . '</td>';
                echo '<td>'. $row['benefits_title8'] . '</td>';
                echo '<td>'. $row['benefits_title9'] . '</td>';
                echo '<td>'. $row['benefits_title10'] . '</td>';
                echo '<td>'. $row['benefits_title11'] . '</td>';
                echo '<td>'. $row['benefits_title12'] . '</td>';
                echo '<td>'. $row['benefits_title13'] . '</td>';
                echo '<td>'. $row['benefits_title14'] . '</td>';
                echo '<td>'. $row['benefits_title15'] . '</td>';
                echo '<td>'. $row['footer_input'] . '</td>';
                echo '<td>'. $row['footer_inputsub'] . '</td>';

                echo '<td>
                    <a href="myRead.php?id=' . $row['id'] . '" class="btn btn-info btn-sm m-1">View</a>
                    <a href="update.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm m-1">Edit</a>
                    <a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm m-1" onclick="return confirm(\'Are you sure you want to delete this record?\')">Delete</a>
                    <a href="generate_qr.php?id=' . $row['id'] . '" class="btn btn-info btn-sm mt-1">QR Code</a>
                  </td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        } else {
            echo '<p>No records found.</p>';
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>