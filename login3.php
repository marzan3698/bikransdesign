<?php
require_once('sadmin/config.php');
require_once('sadmin/function.php');

// Check if the form is submitted
if (isset($_GET['username']) && isset($_GET['password'])) {

    if (!isset($_GET['username']) || !isset($_GET['password'])) {
        die("Invalid login: Username or password is missing.");
    }

    $username = $_GET['username'];
    $password = $_GET['password'];

    if (!isset($mysqli)) {
        die("Database connection not found.");
    }

    // added update_status
    $stmt = $mysqli->prepare("SELECT `id`, `password`, `update_status` FROM member WHERE `username` = ?");

    if (!$stmt) {
        die("MySQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $username);

    if (!$stmt->execute()) {
        die("MySQL error: " . $stmt->error);
    }

    $stmt->store_result();

    if ($stmt->num_rows == 1) {

        // added update_status variable
        $stmt->bind_result($id, $hashedPassword, $update_status);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {

            $_SESSION['user_login'] = $username;
            $_SESSION['user_id'] = $id;
            $_SESSION['login_time'] = time();
            $_SESSION['user_login_session'] = 'user_login_session' . time();

            // condition here
            if ($update_status == 1) {
                header("Location: home.php");
            } else {
                header("Location: home.php");
            }
            exit();

        } else {
            echo "Invalid login: Incorrect password.";
        }

    } else {
        echo "Invalid login: Username not found.";
    }

    $stmt->close();
}
?>


