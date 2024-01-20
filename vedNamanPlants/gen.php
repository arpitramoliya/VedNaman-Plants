<?php
// Include the Composer autoloader
require 'vendor/autoload.php';

// Your data to be encoded in the QR code
$data = 'https://example.com'; // Change this to your actual data

// Generate the QR code
$qrCode = new \BaconQrCode\Encoder\QrCode($data);

// Output the QR code image
header('Content-Type: image/png');
echo $qrCode->writeString();
