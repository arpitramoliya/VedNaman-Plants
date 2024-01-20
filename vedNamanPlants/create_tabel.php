<?php



// Include SQLite database connection code here
$dbFile = 'vedPlants.sqlite';
try {
    $conn = new PDO('sqlite:' . $dbFile);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

// Create the plantsData table
$query = "CREATE TABLE IF NOT EXISTS vedPlants (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    heading TEXT,
    main_title TEXT,
    benefits_title1 TEXT,
    benefits_title2 TEXT,
    benefits_title3 TEXT,
    benefits_title4 TEXT,
    benefits_title5 TEXT,
    benefits_title6 TEXT,
    benefits_title7 TEXT,
    benefits_title8 TEXT,
    benefits_title9 TEXT,
    benefits_title10 TEXT,
    benefits_title11 TEXT,
    benefits_title12 TEXT,
    benefits_title13 TEXT,
    benefits_title14 TEXT,
    benefits_title15 TEXT,
    footer_input TEXT,
    footer_inputsub TEXT,
    input_file TEXT
)";
    try {
        $conn->exec($query);
        echo 'Table created successfully!<br>';
    } catch (PDOException $e) {
        echo 'Table creation failed: ' . $e->getMessage() . '<br>';
    }
?>
