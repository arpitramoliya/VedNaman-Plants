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

} else {
    // If ID is not provided, redirect to the main page
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rubber Plant Care</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        section {
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .plant-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
            background-color: #fff;
            transition: transform 0.3s;
        }

        .plant-card:hover {
            transform: scale(1.05);
        }

        img {
            max-width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
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
        <h1>
            <?= $result['heading']; ?>
        </h1>
    </header>

    <section class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="plant-card">
                    
                    <?php
                    if (!empty($result['input_file'])) {
                        
                        $imageArray = explode(',', $result['input_file']);
                        if (!empty($imageArray)) {                            
                            echo '<div class="row">';
                            echo '<div class="col-md-12 mb-4">';
                            echo '<img src="' . $imageArray[0] .'" alt="Image" class="img-fluid " style="width:100% !important">';
                            echo '</div>';
                            // foreach ($imageArray as $imagePath) {
                            //     echo '<div class="col-md-4 mb-4">';
                            //     echo '<img src="' . $imagePath . '" alt="Image" class="img-fluid">';
                            //     echo '</div>';
                            // }
                            echo '</div>';
                        } else {
                            echo '<p>No images available</p>';
                        }

                    } else {
                        echo '<p>No image available</p>';
                    }

                    ?>
                </div>
                <div>
                    <a href="gallery.php?id=<?php echo $id; ?>" class="btn btn-outline-success">Click To View More Image's...</a>                    
                </div><br>
            </div>
            <div class="col-md-6">
                <div class="plant-card">
                    <div class="card-body">
                        <h2 class="card-title">
                            <?= $result['main_title']; ?>
                        </h2>
                        <p class="card-text">
                            <?php 
                                $successResponse = '<div class="success-response">
                               
                                <ul>';

                            $successResponse .= !empty($result['benefits_title1']) ? '<li>' . $result['benefits_title1'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title2']) ? '<li>' . $result['benefits_title2'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title3']) ? '<li>' . $result['benefits_title3'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title4']) ? '<li>' . $result['benefits_title4'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title5']) ? '<li>' . $result['benefits_title5'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title6']) ? '<li>' . $result['benefits_title6'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title7']) ? '<li>' . $result['benefits_title7'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title8']) ? '<li>' . $result['benefits_title8'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title9']) ? '<li>' . $result['benefits_title9'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title10']) ? '<li>' . $result['benefits_title10'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title11']) ? '<li>' . $result['benefits_title11'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title12']) ? '<li>' . $result['benefits_title12'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title13']) ? '<li>' . $result['benefits_title13'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title14']) ? '<li>' . $result['benefits_title14'] . '</li>' : '';
                            $successResponse .= !empty($result['benefits_title15']) ? '<li>' . $result['benefits_title15'] . '</li>' : '';
                            

                            $successResponse .= '</ul></div>';

                            echo $successResponse;

                             ?>
                        
                        <!-- <ul>
                                <li>રબરના છોડ મૂળ એશિયાના છે અને મોરેસી પરિવારના સભ્ય છે. તેના નામનું કારણ એ છે કે પાંદડા અને દાંડી બંનેમાં સફેદ રબર જેવો રસ હોય છે જેમાંથી રબર બનાવવામાં આવે છે.</li>
                                <li>તે એક છોડ છે જે ખરેખર ઉગાડવાનું પસંદ કરે છે.</li>
                                <li> રબરના છોડ તે એક સુંદર વૃક્ષ છે જે જંગલમાં 60 મીટર સુધી વધી શકે છે. પરંતુ આ છોડ સામાન્ય રીતે ઘરની અંદર 2 મીટર સુધી જ ઉગે છે.</li>
                                <li>રબરના છોડને વધારે પાણી આપવાની જરૂર હોતી નથી અને તેમને ફળદ્રુપતાની ભાગ્યે જ જરૂર પડે છે.</li>
                                <li>રબરના છોડમાં વિશાળ સપાટી વિસ્તાર સાથે ખૂબ જાડા પહોળા પાંદડા હોય છે. વિશાળ સપાટી વિસ્તારને કારણે, તે હવાને શુદ્ધ કરવા માટે યોગ્ય છે.</li>
                            </ul> -->
                        </p>

                        <!--<ul>
                            <li>રબરના છોડને હવાને શુદ્ધ કરવાની બીજી રીત મૂળ દ્વારા માનવામાં આવે છે.</li>
                            <li>જેમ જેમ છોડને પાણી પીવડાવવામાં આવે છે, તેમ હવાને છોડના ઉપલા ભાગમાંથી નીચે ખેંચવામાં આવે છે, જે હવામાં રહેલી અશુદ્ધિઓને જમીનમાં નીચે ખેંચવાની મંજૂરી આપે છે. અને આ માટી સુક્ષ્મજીવાણુઓથી સમૃદ્ધ છે, જે હાનિકારક પ્રદૂષકોને હાનિકારક સંયોજનોમાં તોડી નાખે છે અથવા તો રબરના છોડ માટે પોષક સ્ત્રોત તરીકે પણ કામ કરે છે.</li>
                            <li>રબર પ્લાન્ટનો ફાયદો એ છે કે હવામાંથી કાર્બન ડાયોક્સાઇડ દૂર કરવું, તમે શ્વાસ લઈ રહ્યા છો તે હવાની ગુણવત્તામાં સુધારો કરવો.</li>
                            <li>જ્યારે રબરનો છોડ ઓરડામાં બેસે છે ત્યારે તે કાર્બન ડાયોક્સાઇડને શોષી લે છે જે આપણે શ્વાસ બહાર કાઢીએ છીએ અને તેને ઓક્સિજનમાં રૂપાંતરિત કરવાનું માનવામાં આવે છે.</li>
                            <li>ઘરની અંદર રબર પ્લાન્ટ રાખવાનો બીજો સૌથી મોટો હવા શુદ્ધિકરણ લાભ એ છે કે તે વાસ્તવમાં શ્વસન એલર્જી, એટલે કે અસ્થમાની શક્યતાને ઘટાડવાનું માનવામાં આવે છે</li>
                            <li>રબર પ્લાન્ટ ઓરડામાં ભેજ ઘટાડે છે, જે પ્રદૂષકોને ધૂળમાં ફેરવતા અટકાવે છે.</li>
                        </ul> -->

                        <!--   <h2>Additional Resources</h2>
                        <p>For more detailed care instructions, check out <a href="https://example.com/rubber-plant-care" target="_blank">this comprehensive guide</a>.</p>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <center>
        <h3>
            <div class="p-3 mb-2 bg-secondary text-white">વનસ્પતિ શ્લોક</div>
        </h3>

        <b>
        <?= $result['footer_input']; ?>
        </b>
        <br>
        <?php
            // Check if "footer_input" is set in $result before using it
            if(isset($result['footer_inputsub'])) {
                echo $result['footer_inputsub'];
            } else {
                echo "No footer input available";
            }
        ?>


    </center>
    <hr>
    <footer>
        <div style="cursor: pointer;">વેદનમન પરિસરમાં માં વનસ્પતિ ને નમન</div>
    </footer>

    <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>