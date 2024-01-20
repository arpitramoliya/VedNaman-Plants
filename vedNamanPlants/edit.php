<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Plant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Plant</h2>

    <?php
    // Include database connection code here
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $id = $_POST['id'];
        $heading = $_POST['heading'];
        $mainTitle = $_POST['main_title'];
        $benefitsTitle1 = $_POST['benefits_title1'];
        $benefitsTitle2 = $_POST['benefits_title2'];
        $benefitsTitle3 = $_POST['benefits_title3'];
        $benefitsTitle4 = $_POST['benefits_title4'];
        $benefitsTitle5 = $_POST['benefits_title5'];
        $benefitsTitle6 = $_POST['benefits_title6'];
        $benefitsTitle7 = $_POST['benefits_title7'];
        $benefitsTitle8 = $_POST['benefits_title8'];
        $benefitsTitle9 = $_POST['benefits_title9'];
        $benefitsTitle10    = $_POST['benefits_title10'];
        $benefitsTitle11    = $_POST['benefits_title11'];
        $benefitsTitle12    = $_POST['benefits_title12'];
        $benefitsTitle13    = $_POST['benefits_title13'];
        $benefitsTitle14    = $_POST['benefits_title14'];
        $benefitsTitle15    = $_POST['benefits_title15'];
        $footerInput    = $_POST['footer_input'];
        $footerInputSub = $_POST['footer_inputsub'];

        // Update record in the database
        $stmt = $conn->prepare("UPDATE vedPlants SET heading=?, main_title=?, benefits_title1=?, benefits_title2=?, benefits_title3=?, benefits_title4=?, benefits_title5=?, benefits_title6=?, benefits_title7=?, benefits_title8=?, benefits_title9=?, benefits_title10=?, benefits_title11=?, benefits_title12=?, benefits_title13=?, benefits_title14=?, benefits_title15=?, footer_input=?, footer_inputsub=? WHERE id=?");
        $stmt->execute([$heading, $mainTitle, $benefitsTitle1, $benefitsTitle2, $benefitsTitle3, $benefitsTitle4, $benefitsTitle5, $benefitsTitle6, $benefitsTitle7, $benefitsTitle8, $benefitsTitle9, $benefitsTitle10, $benefitsTitle11, $benefitsTitle12, $benefitsTitle13, $benefitsTitle14, $benefitsTitle15, $footer_input, $footer_inputsub, $id]);

        // Display success message
        echo '<div class="alert alert-success" role="alert">Record updated successfully!</div>';
    }

    // Fetch record to pre-fill the form
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM plantsData WHERE id=?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
    } else {
        // If ID is not provided, redirect to the main page
        header('Location: index.php');
        exit();
    }
    ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

        <div class="mb-3">
            <label for="heading" class="form-label">Heading</label>
            <input type="text" class="form-control" id="heading" name="heading" value="<?php echo $result['heading']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="main_title" class="form-label">Main Title</label>
            <input type="text" class="form-control" id="main_title" name="main_title" value="<?php echo $result['main_title']; ?>" required>
        </div>

        <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title1</label>
                <input type="text" class="form-control" id="benefits_title1" name="benefits_title1" value="<?php echo $result['benefits_title1']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title2</label>
                <input type="text" class="form-control" id="benefits_title2" name="benefits_title2" value="<?php echo $result['benefits_title2']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title3</label>
                <input type="text" class="form-control" id="benefits_title3" name="benefits_title3" value="<?php echo $result['benefits_title3']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title4</label>
                <input type="text" class="form-control" id="benefits_title4" name="benefits_title4" value="<?php echo $result['benefits_title4']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title5</label>
                <input type="text" class="form-control" id="benefits_title5" name="benefits_title5" value="<?php echo $result['benefits_title5']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title6</label>
                <input type="text" class="form-control" id="benefits_title6" name="benefits_title6" value="<?php echo $result['benefits_title6']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title7</label>
                <input type="text" class="form-control" id="benefits_title7" name="benefits_title7" value="<?php echo $result['benefits_title7']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title8</label>
                <input type="text" class="form-control" id="benefits_title8" name="benefits_title8" value="<?php echo $result['benefits_title8']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title9</label>
                <input type="text" class="form-control" id="benefits_title9" name="benefits_title9" value="<?php echo $result['benefits_title9']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title10</label>
                <input type="text" class="form-control" id="benefits_title10" name="benefits_title10" value="<?php echo $result['benefits_title10']; ?>">
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title11</label>
                <input type="text" class="form-control" id="benefits_title11"  name="benefits_title11" value="<?php echo $result['benefits_title11']; ?>">
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title12</label>
                <input type="text" class="form-control" id="benefits_title12" name="benefits_title12" value="<?php echo $result['benefits_title12']; ?>">
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title13</label>
                <input type="text" class="form-control" id="benefits_title13" name="benefits_title13" value="<?php echo $result['benefits_title13']; ?>" >
            </div>

            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title14</label>
                <input type="text" class="form-control" id="benefits_title14" name="benefits_title14" value="<?php echo $result['benefits_title14']; ?>">
            </div>
            
            <div class="mb-3">
                <label for="benefits_title" class="form-label">Benefits Title15</label>
                <input type="text" class="form-control" id="benefits_title15" name="benefits_title15" value="<?php echo $result['footer_input']; ?>" >
            </div>
           
            <div class="mb-3">
                <label for="footer_input" class="form-label">સ્લોક</label>
                <textarea class="form-control" id="footer_input" name="footer_input" rows="3" value="<?php echo $result['footer_input']; ?>" ></textarea>
            </div>

            <div class="mb-3">
                <label for="footer_input" class="form-label">સ્લોક ભાષાંતર</label>
                <textarea class="form-control" id="footer_inputsub" name="footer_inputsub" rows="3" value="<?php echo $result['footer_inputsub']; ?>" ></textarea>
            </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
