<?php
// Set the content type to JSON
header('Content-Type: application/json');

$whitelist = [];
// Get the 'id' argument from the URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    echo json_encode(false);
    exit;
};
if (isset($whitelist[$id])) {
    echo json_encode(["status" => "true", "ad_message" => $whitelist[$id]["message"]]);
} else {
    echo json_encode(["status" => "false", "ad_message" => ""]);
}
?>
