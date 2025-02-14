
<?php
// URL of the JSON file
$json_url = "./whitelist.json";

// Get the user ID from the request (assuming it is passed as a query parameter 'userid')
$user_id = isset($_GET['userid']) ? $_GET['userid'] : null;

header('Content-Type: application/json');

if ($user_id === null) {
    echo json_encode(false);
    exit;
}

// Fetch the JSON file content
$json_content = file_get_contents($json_url);

if ($json_content === false) {
    echo json_encode(false);
    exit;
}

// Decode the JSON content into a PHP associative array
$whitelist = json_decode($json_content, true);

if ($whitelist === null) {
    echo json_encode(false);
    exit;
}

// Check if the user ID is in the whitelist and has a value of true
$is_whitelisted = isset($whitelist[$user_id]) && $whitelist[$user_id] === true;

// Respond with true or false
echo json_encode($is_whitelisted);
?>
