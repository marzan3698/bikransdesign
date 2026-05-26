<?php
require_once('sadmin/config.php');
require_once('sadmin/function.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {

    // Check if username and password are set
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        die("Invalid login: Username or password is missing.");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if database connection ($mysqli) is set up
    if (!isset($mysqli)) {
        die("Database connection not found.");
    }

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $mysqli->prepare("SELECT `id`, `password` FROM member WHERE `username` = ?");

    // Check if the statement was prepared correctly
    if (!$stmt) {
        die("MySQL error: " . $mysqli->error);
    }

    // Bind the username parameter
    $stmt->bind_param("s", $username);

    // Execute the query
    if (!$stmt->execute()) {
        die("MySQL error: " . $stmt->error);
    }

    // Store the result
    $stmt->store_result();

    // Check if exactly one row is returned
    if ($stmt->num_rows == 1) {
        // Bind result variables
        $stmt->bind_result($id, $hashedPassword);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Start user session
            $_SESSION['user_login'] = $username;
            $_SESSION['user_id'] = $id;
            $_SESSION['login_time'] = time();
            $_SESSION['user_login_session'] = 'user_login_session' . time();

            // Redirect to index page
            header("Location: home.php");
            exit();
        } else {
            // Incorrect password
            echo "Invalid login: Incorrect password.";
        }
    } else {
        // Username not found
        echo "Invalid login: Username not found.";
    }

    // Close the statement
    $stmt->close();
} else {
    // Form was not submitted
    // echo "Form not submitted correctly.";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100vw;
        }

        .phone-wrapper {
            width: 100%;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .bg-image {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(75, 74, 74, 0.55) 0%, rgba(58, 57, 57, 0.55) 50%, #000000 100%), url(images/custom/login.jpeg) center / cover no-repeat;
            z-index: 0;
        }

        .content {
            position: relative;
            z-index: 1;
            padding: 60px 7vw 40px;
        }

        h1 {
            color: #fff;
            font-size: 26px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 0.5px;
        }

        .field-label {
            color: #ccc;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 6px;
            letter-spacing: 0.3px;
        }

        .input-wrap {
            position: relative;
            margin-bottom: 14px;
        }

        .input-wrap input {
            width: 100%;
            padding: 13px 16px;
            border-radius: 5px;
            border: none;
            background: rgba(230, 230, 230, 0.92);
            color: #333;
            font-size: 13px;
            font-family: 'Poppins', sans-serif;
            outline: none;
        }

        .input-wrap input::placeholder {
            color: #aaa;
        }

        .eye-icon {
            position: absolute;
            right: 14px;
            top: 55%;
            transform: translateY(-50%);
            color: #888;
            cursor: pointer;
            font-size: 16px;
            user-select: none;
        }

        .options-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 10px 0 22px;
        }

        .remember-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Toggle switch */
        .toggle {
            width: 36px;
            height: 20px;
            background: #555;
            border-radius: 10px;
            position: relative;
            cursor: pointer;
            transition: background 0.3s;
        }

        .toggle.on {
            background: #3dd68c;
        }

        .toggle::after {
            content: '';
            position: absolute;
            width: 14px;
            height: 14px;
            background: #fff;
            border-radius: 50%;
            top: 3px;
            left: 3px;
            transition: left 0.3s;
        }

        .toggle.on::after {
            left: 19px;
        }

        .remember-text {
            color: #bbb;
            font-size: 11px;
        }

        .forgot {
            color: #bbb;
            font-size: 11px;
            text-decoration: none;
            cursor: pointer;
        }

        .forgot:hover {
            color: #fff;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #3dd68c;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            letter-spacing: 0.5px;
            transition: background 0.2s, transform 0.1s;
        }

        .btn-login:hover {
            background: #33c47e;
        }

        .btn-login:active {
            transform: scale(0.98);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 22px 0;
            margin-bottom: 10px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.25);
        }

        .divider span {
            color: #bbb;
            font-size: 12px;
            white-space: nowrap;
        }

        .social-row {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .social-btn {
            flex: 1;
            padding: 10px 0;
            background: rgb(80 79 79 / 85%);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }

        .social-btn:hover {
            background: rgba(80, 80, 80, 0.95);
        }

        .social-btn svg {
            width: 20px;
            height: 20px;
        }

        .signup-text {
            position: absolute;
            bottom: 25px;
            left: 0;
            width: 100%;
            text-align: center;
            color: #bbb;
            font-size: 12px;
        }

        .signup-link {
            color: #3dd68c;
            font-weight: 600;
            cursor: pointer;
        }
    </style>
</head>
<!--   -->

<body>

    <div class="phone-wrapper">
        <div class="bg-image"></div>
        <div class="content">
            <h1>Login</h1>
            <form id="LoginForm" method="post" action="">
                <div class="field-label">Email</div>
                <div class="input-wrap">
                    <input name="username" type="text" placeholder="Email Address">
                </div>
                <div class="field-label">Password</div>
                <div class="input-wrap">
                    <input name="password" type="password" placeholder="Password" id="pwdInput">
                    <span class="eye-icon" onclick="togglePwd()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="18" height="18"
                            stroke="currentColor" stroke-width="2">
                            <path
                                d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24" />
                            <line x1="1" y1="1" x2="23" y2="23" />
                        </svg>
                    </span>
                </div>

                <div class="options-row">
                    <div class="remember-wrap">
                        <div class="toggle" id="toggle" onclick="this.classList.toggle('on')"></div>
                        <span class="remember-text">Remember me</span>
                    </div>
                    <a class="forgot">Forgot password?</a>
                </div>

                <button name="submit" type="submit" class="btn-login">Login</button>
            </form>
            <div class="divider"><span>Or login with</span></div>

            <div class="social-row">
                <!-- Google -->
                <button class="social-btn">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="white">
                        <path
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                        <path
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                        <path
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" />
                        <path
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                    </svg>
                </button>

                <!-- Apple -->
                <button class="social-btn">
                    <svg viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z" />
                    </svg>
                </button>
                <!-- Facebook -->
                <button class="social-btn">
                    <svg viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 2h-3a5 5 0 0 0-5 5v3H6v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                    </svg>
                </button>

            </div>



        </div>
        <p class="signup-text">Don't have an account? <a class="signup-link">Signup</a></p>

    </div>

    <script>
        function togglePwd() {
            const i = document.getElementById('pwdInput');
            i.type = i.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>

</html>