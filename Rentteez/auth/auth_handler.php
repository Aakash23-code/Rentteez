<?php
header('Content-Type: application/json');
require_once '../includes/db.php';
session_start();

$action = $_POST['action'] ?? '';

if ($action === 'register') {
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $password = $_POST['password'] ?? '';
    $state = $_POST['state'] ?? '';
    $city = $_POST['city'] ?? '';
    $firebase_uid = $_POST['firebase_uid'] ?? '';

    if (empty($fullname) || empty($mobile) || empty($firebase_uid)) {
        echo json_encode(['status' => 'error', 'message' => 'Please fill all required fields.']);
        exit;
    }

    // Hash password if provided
    $hashed_password = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;

    try {
        // Check if user already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE mobile = ? OR (email = ? AND email != '')");
        $stmt->execute([$mobile, $email]);
        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'error', 'message' => 'User already exists with this email or mobile.']);
            exit;
        }

        $sql = "INSERT INTO users (fullname, email, mobile, password, state, city, firebase_uid) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fullname, $email, $mobile, $hashed_password, $state, $city, $firebase_uid]);

        echo json_encode(['status' => 'success', 'message' => 'Registration successful!']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} 

elseif ($action === 'login_email') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];

            // Log the login
            $log_stmt = $conn->prepare("INSERT INTO login_logs (user_id, login_method, ip_address, user_agent) VALUES (?, 'email', ?, ?)");
            $log_stmt->execute([$user['id'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']]);

            echo json_encode(['status' => 'success', 'message' => 'Login successful!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email or password.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error.']);
    }
}

elseif ($action === 'login_mobile') {
    $mobile = $_POST['mobile'] ?? '';
    $firebase_uid = $_POST['firebase_uid'] ?? '';

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE mobile = ?");
        $stmt->execute([$mobile]);
        $user = $stmt->fetch();

        if ($user) {
            // Update firebase_uid if not set
            if (empty($user['firebase_uid'])) {
                $update = $conn->prepare("UPDATE users SET firebase_uid = ? WHERE id = ?");
                $update->execute([$firebase_uid, $user['id']]);
            }
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];

            // Log the login
            $log_stmt = $conn->prepare("INSERT INTO login_logs (user_id, login_method, ip_address, user_agent) VALUES (?, 'mobile', ?, ?)");
            $log_stmt->execute([$user['id'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']]);

            echo json_encode(['status' => 'success', 'message' => 'Login successful!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Mobile number not registered.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error.']);
    }
}
?>
