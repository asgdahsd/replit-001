<?php
header('Content-Type: application/json');

// Get the method argument from the URL
$method = isset($_GET['method']) ? $_GET['method'] : null;

// Base directory for method scripts
$methods_dir = './methods/';

// Route the request to the appropriate script based on the method
switch ($method) {
    case 'check_user':
        require $methods_dir . 'check_user.php';
        break;
    case 'check_univ_id':
        require $methods_dir . 'check_universe_id.php';
        break;
    case 'check_wipe_universe':
        require $methods_dir . 'check_wipe_id.php';
        break;
    case 'check_ad':
        require $methods_dir . 'check_advertise_message.php';
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid method']);
        break;
}
?>
