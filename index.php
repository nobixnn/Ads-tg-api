<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *'); // optional if you want cross-domain access

// ads.json ka path
$adsFile = __DIR__ . '/ads.json';

// File read aur decode
if (!file_exists($adsFile)) {
    echo json_encode(["status" => "error", "message" => "ads.json not found"]);
    exit;
}

$data = json_decode(file_get_contents($adsFile), true);

// Agar koi valid ad na ho
if (!is_array($data) || count($data) === 0) {
    echo json_encode(["status" => "error", "message" => "No ads found"]);
    exit;
}

// Random ad select
$randomAd = $data[array_rand($data)];

// Final JSON response
$response = [
    "status" => "success",
    "ad" => $randomAd
];

// Output JSON
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
