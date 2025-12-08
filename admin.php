<?php
require_once 'functions.php';

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $password = $_POST['password'] ?? '';
    if (adminLogin($password)) {
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Invalid password';
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    adminLogout();
    header('Location: admin.php');
    exit;
}

// Check if logged in
if (!isAdminLoggedIn()) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: 'Arial', sans-serif;
                background: #000;
                color: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .login-container {
                background: #fff;
                color: #000;
                padding: 2rem;
                width: 100%;
                max-width: 400px;
                border: 2px solid #000;
            }
            h2 {
                margin-bottom: 1.5rem;
                font-size: 1.5rem;
            }
            .form-group {
                margin-bottom: 1rem;
            }
            label {
                display: block;
                margin-bottom: 0.5rem;
                font-weight: 600;
            }
            input[type="password"] {
                width: 100%;
                padding: 0.7rem;
                border: 2px solid #000;
                font-size: 1rem;
            }
            input[type="password"]:focus {
                outline: none;
                border-color: #000;
            }
            button {
                width: 100%;
                padding: 0.8rem;
                background: #000;
                color: #fff;
                border: 2px solid #000;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.2s;
            }
            button:hover {
                background: #fff;
                color: #000;
            }
            .error {
                color: #f00;
                margin-bottom: 1rem;
                font-size: 0.9rem;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <h2>Admin Login</h2>
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required autofocus>
                </div>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Get enrollments
$enrollments = getAllEnrollments();
$totalEnrollments = count($enrollments);

// Calculate course statistics
$courseStats = [];
foreach ($enrollments as $enrollment) {
    $course = $enrollment['course'];
    if (!isset($courseStats[$course])) {
        $courseStats[$course] = 0;
    }
    $courseStats[$course]++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Enrollments</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background: #f5f5f5;
            color: #000;
        }
        .header {
            background: #000;
            color: #fff;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
        }
        .header h1 {
            font-size: 1.5rem;
        }
        .logout-btn {
            background: #fff;
            color: #000;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border: 2px solid #fff;
            font-weight: 600;
            transition: all 0.2s;
        }
        .logout-btn:hover {
            background: #000;
            color: #fff;
        }
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: #fff;
            border: 2px solid #000;
            padding: 1rem;
        }
        .stat-card h3 {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        .stat-card .number {
            font-size: 2rem;
            font-weight: 700;
        }
        .enrollments-section {
            background: #fff;
            border: 2px solid #000;
            padding: 1.5rem;
        }
        .enrollments-section h2 {
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 0.8rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #000;
            color: #fff;
            font-weight: 600;
        }
        tr:hover {
            background: #f5f5f5;
        }
        .course-badge {
            display: inline-block;
            padding: 0.3rem 0.6rem;
            background: #000;
            color: #fff;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .no-data {
            text-align: center;
            padding: 2rem;
            color: #666;
        }
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            .container {
                padding: 1rem;
            }
            table {
                font-size: 0.85rem;
            }
            th, td {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Learn it with Muhindo Academy - Admin Panel</h1>
        <a href="?logout=1" class="logout-btn">Logout</a>
    </div>

    <div class="container">
        <div class="stats">
            <div class="stat-card">
                <h3>Total Enrollments</h3>
                <div class="number"><?php echo $totalEnrollments; ?></div>
            </div>
            <div class="stat-card">
                <h3>Web Design</h3>
                <div class="number"><?php echo $courseStats['web-design'] ?? 0; ?></div>
            </div>
            <div class="stat-card">
                <h3>Web Development</h3>
                <div class="number"><?php echo $courseStats['web-development'] ?? 0; ?></div>
            </div>
            <div class="stat-card">
                <h3>Mobile App</h3>
                <div class="number"><?php echo $courseStats['mobile-app'] ?? 0; ?></div>
            </div>
        </div>

        <div class="enrollments-section">
            <h2>Recent Enrollments</h2>
            <?php if ($totalEnrollments > 0): ?>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($enrollments as $enrollment): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($enrollment['id']); ?></td>
                                    <td><?php echo date('M d, Y H:i', strtotime($enrollment['created_at'])); ?></td>
                                    <td><?php echo htmlspecialchars($enrollment['name']); ?></td>
                                    <td><?php echo htmlspecialchars($enrollment['email']); ?></td>
                                    <td><?php echo htmlspecialchars($enrollment['phone']); ?></td>
                                    <td>
                                        <span class="course-badge">
                                            <?php 
                                                $courseNames = [
                                                    'web-design' => 'Web Design',
                                                    'web-development' => 'Web Dev',
                                                    'mobile-app' => 'Mobile App'
                                                ];
                                                echo $courseNames[$enrollment['course']] ?? $enrollment['course'];
                                            ?>
                                        </span>
                                    </td>
                                    <td><?php echo htmlspecialchars($enrollment['message'] ?: '-'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="no-data">No enrollments yet.</div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
