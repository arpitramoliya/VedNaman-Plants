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

        include 'db_connection.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            $benefitsTitle10 = $_POST['benefits_title10'];
            $benefitsTitle11 = $_POST['benefits_title11'];
            $benefitsTitle12 = $_POST['benefits_title12'];
            $benefitsTitle13 = $_POST['benefits_title13'];
            $benefitsTitle14 = $_POST['benefits_title14'];
            $benefitsTitle15 = $_POST['benefits_title15'];
            $footerInput = $_POST['footer_input'];
            $footerInputSub = $_POST['footer_inputsub'];

            // $uploadDirectory = 'uploads/';
            // $uploadedFiles = [];

            // foreach ($_FILES['input_files']['tmp_name'] as $key => $tmp_name) {
            //     $file_name = $_FILES['input_files']['name'][$key];
            //     $file_tmp = $_FILES['input_files']['tmp_name'][$key];

            //     $currentDateTime = date('YmdHis');
            //     $target_file = $uploadDirectory . $currentDateTime . '.jpg';

            //     move_uploaded_file($file_tmp, $target_file);
            //     $uploadedFiles[] = $target_file;
            // }

            $uploadDirectory = 'uploads/';
            $uploadedFiles = [];

            foreach ($_FILES['input_files']['tmp_name'] as $key => $tmp_name) {
                $file_name = $_FILES['input_files']['name'][$key];
                $file_tmp = $_FILES['input_files']['tmp_name'][$key];

                $currentDateTime = date('YmdHis');
                $target_file = $uploadDirectory . rand(115,50000) . $currentDateTime . '_' . $key . '.jpg';

                move_uploaded_file($file_tmp, $target_file);
                $uploadedFiles[] = $target_file;
            }
            $stmt = $conn->prepare("UPDATE vedPlants SET heading=?, main_title=?, benefits_title1=?, benefits_title2=?, benefits_title3=?, benefits_title4=?, benefits_title5=?, benefits_title6=?, benefits_title7=?, benefits_title8=?, benefits_title9=?, benefits_title10=?, benefits_title11=?, benefits_title12=?, benefits_title13=?, benefits_title14=?, benefits_title15=?, footer_input=?, footer_inputsub=?,input_file = ?  WHERE id=?");
            $stmt->execute([$heading, $mainTitle, $benefitsTitle1, $benefitsTitle2, $benefitsTitle3, $benefitsTitle4, $benefitsTitle5, $benefitsTitle6, $benefitsTitle7, $benefitsTitle8, $benefitsTitle9, $benefitsTitle10, $benefitsTitle11, $benefitsTitle12, $benefitsTitle13, $benefitsTitle14, $benefitsTitle15, $footerInput, $footerInputSub,implode(',', $uploadedFiles), $id]);

            echo '<div class="alert alert-success" role="alert">Record updated successfully!</div>';
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $conn->prepare("SELECT * FROM vedPlants WHERE id=?");
            $stmt->execute([$id]);
            $result = $stmt->fetch();
        } else {
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
                <label for="benefits_title1" class="form-label">Benefits Title1</label>
                <input type="text" class="form-control" id="benefits_title1" name="benefits_title1" value="<?php echo $result['benefits_title1']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title2" class="form-label">Benefits Title2</label>
                <input type="text" class="form-control" id="benefits_title2" name="benefits_title2" value="<?php echo $result['benefits_title2']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title3" class="form-label">Benefits Title3</label>
                <input type="text" class="form-control" id="benefits_title3" name="benefits_title3" value="<?php echo $result['benefits_title3']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title4" class="form-label">Benefits Title4</label>
                <input type="text" class="form-control" id="benefits_title4" name="benefits_title4" value="<?php echo $result['benefits_title4']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title5" class="form-label">Benefits Title5</label>
                <input type="text" class="form-control" id="benefits_title5" name="benefits_title5" value="<?php echo $result['benefits_title5']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title6" class="form-label">Benefits Title6</label>
                <input type="text" class="form-control" id="benefits_title6" name="benefits_title6" value="<?php echo $result['benefits_title6']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title7" class="form-label">Benefits Title7</label>
                <input type="text" class="form-control" id="benefits_title7" name="benefits_title7" value="<?php echo $result['benefits_title7']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title8" class="form-label">Benefits Title8</label>
                <input type="text" class="form-control" id="benefits_title8" name="benefits_title8" value="<?php echo $result['benefits_title8']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="benefits_title9" class="form-label">Benefits Title9</label>
                <input type="text" class="form-control" id="benefits_title9" name="benefits_title9" value="<?php echo $result['benefits_title9']; ?>" >
            </div>

            <div class="mb-3">
                <label for="benefits_title10" class="form-label">Benefits Title10</label>
                <input type="text" class="form-control" id="benefits_title10" name="benefits_title10" value="<?php echo $result['benefits_title10']; ?>">
            </div>

            <div class="mb-3">
                <label for="benefits_title11" class="form-label">Benefits Title11</label>
                <input type="text" class="form-control" id="benefits_title11" name="benefits_title11" value="<?php echo $result['benefits_title11']; ?>" >
            </div>

            <div class="mb-3">
                <label for="benefits_title12" class="form-label">Benefits Title12</label>
                <input type="text" class="form-control" id="benefits_title12" name="benefits_title12" value="<?php echo $result['benefits_title12']; ?>" >
            </div>

            <div class="mb-3">
                <label for="benefits_title13" class="form-label">Benefits Title13</label>
                <input type="text" class="form-control" id="benefits_title13" name="benefits_title13" value="<?php echo $result['benefits_title13']; ?>" >
            </div>

            <div class="mb-3">
                <label for="benefits_title14" class="form-label">Benefits Title14</label>
                <input type="text" class="form-control" id="benefits_title14" name="benefits_title14" value="<?php echo $result['benefits_title14']; ?>" >
            </div>

            <div class="mb-3">
                <label for="benefits_title15" class="form-label">Benefits Title15</label>
                <input type="text" class="form-control" id="benefits_title15" name="benefits_title15" value="<?php echo $result['benefits_title15']; ?>" >
            </div>

            <div class="mb-3">
                <label for="footer_input" class="form-label">Footer Input</label>
                <input type="text" class="form-control" id="footer_input" name="footer_input" value="<?php echo $result['footer_input']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="footer_inputsub" class="form-label">Footer Input Sub</label>
                <input type="text" class="form-control" id="footer_inputsub" name="footer_inputsub" value="<?php echo $result['footer_inputsub']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="input_files" class="form-label">Upload Images</label>
                <input type="file" class="form-control" id="input_files" name="input_files[]" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
