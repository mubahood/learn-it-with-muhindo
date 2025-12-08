<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'learn_it_with_muhindo');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_SOCKET', '/Applications/MAMP/tmp/mysql/mysql.sock'); // Leave empty '' for production/online hosting

// Admin password
define('ADMIN_PASSWORD', '4321');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
