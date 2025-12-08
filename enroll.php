<?php
// Start output buffering to catch any unwanted output
ob_start();

error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors in JSON response

try {
    // Define DB constants without requiring config.php to avoid session issues
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'learn_it_with_muhindo');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('DB_SOCKET', '/Applications/MAMP/tmp/mysql/mysql.sock');
    
    require_once 'functions.php';

    // Check if request is POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        exit;
    }

    // Create table if not exists
    createEnrollmentsTable();

    // Process enrollment
    $result = saveEnrollment(
        $_POST['name'] ?? '',
        $_POST['email'] ?? '',
        $_POST['phone'] ?? '',
        $_POST['course'] ?? '',
        $_POST['message'] ?? ''
    );

    // Clear any buffered output
    ob_clean();
    
    // Send JSON header
    header('Content-Type: application/json');
    echo json_encode($result);
} catch (Exception $e) {
    error_log("Enrollment error: " . $e->getMessage());
    
    // Clear any buffered output
    ob_clean();
    
    // Send JSON header
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false, 
        'message' => 'System error: ' . $e->getMessage()
    ]);
}
ob_end_flush();
?>
