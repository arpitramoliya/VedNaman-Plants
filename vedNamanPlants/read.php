
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plant Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Plant Details</h2>

    <?php
    // Include database connection code here
    include 'db_connection.php';

    // Check if ID parameter is provided
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch record from the database
        $stmt = $conn->prepare("SELECT * FROM vedPlants WHERE id=?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        if ($result) {
            // Display record details
            echo '<p><strong>Heading:</strong> ' . $result['heading'] . '</p>';
            echo '<p><strong>Main Title:</strong> ' . $result['main_title'] . '</p>';
            echo '<p><strong>Main Benefits Title1:</strong> ' . $result['benefits_title1'] . '</p>';
            echo '<p><strong>Main Benefits Title2:</strong> ' . $result['benefits_title2'] . '</p>';
            echo '<p><strong>Main Benefits Title3:</strong> ' . $result['benefits_title3'] . '</p>';
            echo '<p><strong>Main Benefits Title4:</strong> ' . $result['benefits_title4'] . '</p>';
            echo '<p><strong>Main Benefits Title5:</strong> ' . $result['benefits_title5'] . '</p>';
            echo '<p><strong>Main Benefits Title6:</strong> ' . $result['benefits_title6'] . '</p>';
            echo '<p><strong>Main Benefits Title7:</strong> ' . $result['benefits_title7'] . '</p>';
            echo '<p><strong>Main Benefits Title8:</strong> ' . $result['benefits_title8'] . '</p>'; 
            echo '<p><strong>Main Benefits Title9:</strong> ' . $result['benefits_title9'] . '</p>';
            echo '<p><strong>Main Benefits Title10:</strong> ' . $result['benefits_title10'] . '</p>';
            echo '<p><strong>Main Benefits Title11:</strong> ' . $result['benefits_title11'] . '</p>';
            echo '<p><strong>Main Benefits Title12:</strong> ' . $result['benefits_title12'] . '</p>'; 
            echo '<p><strong>Main Benefits Title13:</strong> ' . $result['benefits_title13'] . '</p>';
            echo '<p><strong>Main Benefits Title14:</strong> ' . $result['benefits_title14'] . '</p>';
            echo '<p><strong>Main Benefits Title15:</strong> ' . $result['benefits_title15'] . '</p>';
            echo '<p><strong>shlok footer:</strong> ' . $result['footer_input'] . '</p>';
            echo '<p><strong>shlok Benefits fotter:</strong> ' . $result['footer_inputsub'] . '</p>';
            echo '<a href="index.php" class="btn btn-secondary">Back</a>';
        } else {
            echo '<p>Record not found.</p>';
            echo '<a href="index.php" class="btn btn-secondary">Back</a>';
        }
    } else {
        // If ID is not provided, redirect to the main page
        header('Location: index.php');
    }
    ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
