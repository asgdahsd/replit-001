<?php
// Set the content type to JSON
header('Content-Type: application/json');

// Define the path to the whitelist JSON file
$whitelist_file = './universeid_blacklist.json';

// Get the 'id' argument from the URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    echo json_encode(false);
    exit;
}

// Load the whitelist from the JSON file
if (file_exists($whitelist_file)) {
    $whitelist = json_decode(file_get_contents($whitelist_file), true);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Whitelist file not found']);
    exit;
}

// Check if the ID is in the whitelist
$is_whitelisted = isset($whitelist[$id]) && $whitelist[$id] === true;

// Return true if whitelisted, otherwise false
echo json_encode($is_whitelisted);
?>
