<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Alglonema Plant Gallery</title>
  <!-- Add the Bootstrap CSS link here -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    header {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 1em 0;
    }

    .gallery-container {
      max-width: 800px;
      margin: 20px auto;
    }

    .gallery-item {
      margin-bottom: 20px;
    }

    .gallery-item img {
      width: 100%;
      height: auto;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
    }

    .gallery-item img:hover {
      transform: scale(1.1);
    }
    
    footer {
      text-align: center;
      padding: 1em 0;
      background-color: #333;
      color: #fff;
    }
  </style>
</head>
<body>
    <header>
        <h1>Alglonema Plant</h1>
    </header>

    <div class="container gallery-container">
        <div class="row">

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
                    // Get images from the folder (replace 'uploads' with your actual folder name)
                    $imageFolder = '';
                    $imagePaths = explode(',', $result['input_file']);
                    
                    // Display all images in the gallery
                    if (!empty($imagePaths)) {
                        foreach ($imagePaths as $imagePath) {
                            echo '<div class="col-lg-4 col-md-6">';
                            echo '<div class="gallery-item">';
                            // echo '<h3>'.$imagePath.'</h3>';
                            echo '<img src="' . $imageFolder . $imagePath . '" alt="Plant Image" class="img-fluid">';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No images available</p>';
                    }

                    echo '<a href="index.php" class="btn btn-secondary mt-3">Back</a>';
                } else {
                    echo '<p>Record not found.</p>';
                    echo '<a href="index.php" class="btn btn-secondary mt-3">Back</a>';
                }
            } else {
                // If ID is not provided, redirect to the main page
                header('Location: index.php');
            }
            ?>

        </div>
    </div>

    <footer>
        <div style="cursor: pointer;">વેદનમન પરિસરમાં માં વનસ્પતિ ને નમન</div>
    </footer>

    <!-- Bootstrap JS scripts (jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
    document.getElementById('input_files').addEventListener('change', handleFileSelect);

    function handleFileSelect(event) {
        const files = event.target.files;
        const selectedImages = [];

        for (let i = 0; i < files.length; i++) {
            selectedImages.push(URL.createObjectURL(files[i]));
        }

        // Save selected images to local storage
        localStorage.setItem('selectedImages', JSON.stringify(selectedImages));
    }
</script>


</body>
</html>
