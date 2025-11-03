<?php
// -----------------------------------------------------
// ✅ Random Ad API
// File: index.php
// -----------------------------------------------------

// 🧾 Headers — ye ensure karega ki page HTML nahi, JSON dikhe
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *'); // optional: CORS allow

// 📂 ads.json ka path
$adsFile = __DIR__ . '/ads.json';

// 🔍 Check file exist karti hai ya nahi
if (!file_exists($adsFile)) {
    echo json_encode([
        "status" => "error",
        "message" => "ads.json file not found"
    ], JSON_PRETTY_PRINT);
    exit;
}

// 📖 File read aur decode
$data = json_decode(file_get_contents($adsFile), true);

// ❌ Empty ya invalid JSON check
if (!is_array($data) || count($data) === 0) {
    echo json_encode([
        "status" => "error",
        "message" => "No ads found or invalid JSON"
    ], JSON_PRETTY_PRINT);
    exit;
}

// 🎯 Random ad pick karo
$randomAd = $data[array_rand($data)];

// 🕒 Extra info add kar do (optional)
$response = [
    "status" => "success",
    "developer" => "@Tushar2oo3",
    "timestamp" => date('Y-m-d H:i:s'),
    "ad" => $randomAd
];

// 🔄 Response send karo
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
exit;
?>
