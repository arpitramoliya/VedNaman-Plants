<?php

// Your data (e.g., URL, text, etc.) for the QR code
// $data = '';
$currentURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$targetScript = 'myRead.php';

$data = str_replace(basename($_SERVER['SCRIPT_NAME']), $targetScript, $currentURL);


// Google Charts API URL for generating QR code
$googleChartsApiUrl = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($data);

// Create an image resource from the QR code URL
$qrCodeImage = imagecreatefrompng($googleChartsApiUrl);

// Set the Content-Type header to indicate that the response is an image
header('Content-Type: image/png');

// Output the image
imagepng($qrCodeImage);

// Free up memory
// imagedestroy($qrCodeImage);

?>
