<?php
session_start();

$uid = (int)($_GET['uid'] ?? 0);
$redirect = $_GET['redirect'] ?? 'home.php';

// Security: শুধু allowed pages এ redirect হবে
$allowed = ['create-order.php', 'home.php', 'dashboard.php'];
if (!in_array($redirect, $allowed)) {
    $redirect = 'home.php';
}

if ($uid > 0) {
    $config = include __DIR__ . '/sslconfig.php';
    $mysqli = new mysqli($config->db_host, $config->db_user, $config->db_pass, $config->db_name);

    // member table থেকে username আনুন
    $stmt = $mysqli->prepare("SELECT username FROM member WHERE id = ? LIMIT 1");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->fetch();
    $stmt->close();
    $mysqli->close();

    if ($username) {
        $_SESSION['user_id'] = $uid;
        $_SESSION['user_login'] = $username;
        $_SESSION['login_time'] = time();
        $_SESSION['user_login_session'] = 'user_login_session' . time();
        // আপনার অন্য যা session variable দরকার:
        // $_SESSION['logged_in'] = true;
    } else {
        // user পাওয়া যায়নি
        header("Location: /index.php");
        exit;
    }
}

header("Location: /" . $redirect);
exit;