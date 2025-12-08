<?php
// Prevent any output before JSON
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'learn_it_with_muhindo');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_SOCKET', '/Applications/MAMP/tmp/mysql/mysql.sock');

function getDBConnection(&$errorMessage = null) {
    try {
        // Use socket for local development (MAMP), standard connection for production
        if (defined('DB_SOCKET') && !empty(DB_SOCKET) && file_exists(DB_SOCKET)) {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";unix_socket=" . DB_SOCKET;
        } else {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        }
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch(PDOException $e) {
        $errorMessage = $e->getMessage();
        error_log("Database connection failed: " . $errorMessage);
        return null;
    }
}

function createEnrollmentsTable() {
    $pdo = getDBConnection();
    if (!$pdo) return false;
    
    try {
        $sql = "CREATE TABLE IF NOT EXISTS enrollments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(50) NOT NULL,
            course VARCHAR(100) NOT NULL,
            message TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            ip_address VARCHAR(45),
            INDEX idx_created_at (created_at DESC),
            INDEX idx_email (email)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
        
        $pdo->exec($sql);
        return true;
    } catch(PDOException $e) {
        error_log("Table creation failed: " . $e->getMessage());
        return false;
    }
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function isValidPhone($phone) {
    $phone = preg_replace('/[^0-9+]/', '', $phone);
    return strlen($phone) >= 10;
}

function isDuplicateEnrollment($email, $course) {
    $pdo = getDBConnection();
    if (!$pdo) return false;
    
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM enrollments WHERE email = ? AND course = ? AND created_at > DATE_SUB(NOW(), INTERVAL 1 HOUR)");
        $stmt->execute([$email, $course]);
        return $stmt->fetchColumn() > 0;
    } catch(PDOException $e) {
        error_log("Duplicate check failed: " . $e->getMessage());
        return false;
    }
}

function saveEnrollment($name, $email, $phone, $course, $message = '') {
    $dbError = null;
    $pdo = getDBConnection($dbError);
    if (!$pdo) {
        return ['success' => false, 'message' => 'Database connection failed. ' . ($dbError ? 'Error: ' . $dbError : 'Please try again later.')];
    }
    
    $name = sanitizeInput($name);
    $email = sanitizeInput($email);
    $phone = sanitizeInput($phone);
    $course = sanitizeInput($course);
    $message = sanitizeInput($message);
    
    if (empty($name) || empty($email) || empty($phone) || empty($course)) {
        return ['success' => false, 'message' => 'All required fields must be filled.'];
    }
    
    if (!isValidEmail($email)) {
        return ['success' => false, 'message' => 'Invalid email address.'];
    }
    
    if (!isValidPhone($phone)) {
        return ['success' => false, 'message' => 'Invalid phone number.'];
    }
    
    if (isDuplicateEnrollment($email, $course)) {
        return ['success' => false, 'message' => 'You have already enrolled in this course recently.'];
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO enrollments (name, email, phone, course, message, ip_address) VALUES (?, ?, ?, ?, ?, ?)");
        $ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        
        $stmt->execute([$name, $email, $phone, $course, $message, $ipAddress]);
        
        return ['success' => true, 'message' => 'Thank you for enrolling! We will contact you shortly with course details and payment information.'];
    } catch(PDOException $e) {
        error_log("Enrollment save failed: " . $e->getMessage());
        return ['success' => false, 'message' => 'Failed to save enrollment. Please try again.'];
    }
}

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method.');
    }

    createEnrollmentsTable();

    $result = saveEnrollment(
        $_POST['name'] ?? '',
        $_POST['email'] ?? '',
        $_POST['phone'] ?? '',
        $_POST['course'] ?? '',
        $_POST['message'] ?? ''
    );

    ob_clean();
    header('Content-Type: application/json');
    echo json_encode($result);
    
} catch (Exception $e) {
    error_log("Enrollment error: " . $e->getMessage());
    ob_clean();
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false, 
        'message' => 'System error: ' . $e->getMessage()
    ]);
}

ob_end_flush();
?>
