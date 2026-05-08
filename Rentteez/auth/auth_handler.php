<?php
header('Content-Type: application/json');
require_once '../includes/db.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

// SMTP Configuration (Please update with your details)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER', 'manyanirvan29@gmail.com');
define('SMTP_PASS', 'polu reji twex actr');
define('SMTP_PORT', 587);

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
} elseif ($action === 'login_email') {
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
} elseif ($action === 'login_mobile') {
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
} elseif ($action === 'send_recovery_otp') {
    $email = $_POST['email'] ?? '';

    if (empty($email)) {
        echo json_encode(['status' => 'error', 'message' => 'Email is required.']);
        exit;
    }

    try {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() === 0) {
            echo json_encode(['status' => 'error', 'message' => 'Email not registered.']);
            exit;
        }

        $otp = rand(100000, 999999);
        $_SESSION['recovery_otp'] = $otp;
        $_SESSION['recovery_email'] = $email;
        $_SESSION['otp_time'] = time();

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USER;
            $mail->Password = SMTP_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = SMTP_PORT;

            $mail->setFrom(SMTP_USER, 'Rentteez Support');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Recovery OTP - Rentteez';
            
            // Premium Email Template
            $mail->Body = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #e0e0e0; border-radius: 10px; overflow: hidden;'>
                <div style='background-color: #4a6cf7; padding: 20px; text-align: center;'>
                    <h2 style='color: #ffffff; margin: 0;'>Rentteez</h2>
                </div>
                <div style='padding: 30px; color: #333333;'>
                    <h3 style='color: #4a6cf7;'>Reset Your Password</h3>
                    <p>Hello,</p>
                    <p>We received a request to reset your password. Use the verification code below to proceed:</p>
                    <div style='background-color: #f4f7ff; padding: 20px; text-align: center; border-radius: 8px; margin: 20px 0;'>
                        <span style='font-size: 32px; font-weight: bold; letter-spacing: 5px; color: #4a6cf7;'>$otp</span>
                    </div>
                    <p style='color: #666666; font-size: 14px;'>This OTP is valid for <b>2 minutes</b>. Please do not share this code with anyone.</p>
                    <hr style='border: 0; border-top: 1px solid #eeeeee; margin: 20px 0;'>
                    <p style='font-size: 12px; color: #999999;'>If you didn't request this, you can safely ignore this email.</p>
                </div>
                <div style='background-color: #f9f9f9; padding: 15px; text-align: center; color: #999999; font-size: 12px;'>
                    &copy; 2026 Rentteez. All rights reserved.
                </div>
            </div>";

            $mail->send();
            echo json_encode(['status' => 'success', 'message' => 'OTP sent to your email.']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error.']);
    }
} elseif ($action === 'verify_recovery_otp') {
    $otp = $_POST['otp'] ?? '';

    if (isset($_SESSION['recovery_otp']) && $_SESSION['recovery_otp'] == $otp) {
        // Check if OTP is older than 2 mins (120 seconds)
        if (time() - $_SESSION['otp_time'] > 120) {
            echo json_encode(['status' => 'error', 'message' => 'OTP expired. Please resend a new code.']);
        } else {
            $_SESSION['otp_verified'] = true;
            echo json_encode(['status' => 'success', 'message' => 'OTP verified successfully.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid OTP code.']);
    }
} elseif ($action === 'reset_password') {
    $password = $_POST['password'] ?? '';
    $email = $_SESSION['recovery_email'] ?? '';

    if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized access. Please verify OTP first.']);
        exit;
    }

    if (empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Password is required.']);
        exit;
    }

    try {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->execute([$hashed_password, $email]);

        // Clear session
        unset($_SESSION['recovery_otp']);
        unset($_SESSION['recovery_email']);
        unset($_SESSION['otp_verified']);
        unset($_SESSION['otp_time']);

        echo json_encode(['status' => 'success', 'message' => 'Password updated successfully!']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error.']);
    }
}
?>