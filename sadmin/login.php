<?php
require_once('header.php');
?>


<body class="red-bg login bg_login">
    <div class="middle-box text-center loginscreen ">
        <div style="border: 1px solid #122F2C; border-radius: 10px;" class="widgets-container">
            <div>
                
            </div>
            <h3>Welcome to Bikrans</h3>


            <?php

            /* if (isset($_POST['submit'])) {
                        
                         if (!isset($_POST['username']) || !isset($_POST['password'])) {
                            die("Invalid login.");
                        }
                                                
                $_POST['username'] = $mysqli->real_escape_string($_POST['username']);
                $_POST['password'] = $mysqli->real_escape_string($_POST['password']);
                
                $match_admin_query = "SELECT `id` FROM setting WHERE `username`='{$_POST['username']}' AND `password`='{$_POST['password']}'";

                $match_admin_query_result = $mysqli->query($match_admin_query);
                $match_admin_query_num_rows = $match_admin_query_result->num_rows;
                if ($match_admin_query_num_rows == 1) {
                  $_SESSION['admin'] = $_POST['username'];
                
                  header("Location: index.php");
         
                } else {
                  die("Invalid login");
                }
              }
              */

            if (isset($_POST['submit'])) {
                if (!isset($_POST['username']) || !isset($_POST['password'])) {
                    die("Invalid login.");
                }

                $username = $_POST['username'];
                $password = $_POST['password'];

                // Prepare the SQL statement to prevent SQL injection
                $stmt = $mysqli->prepare("SELECT `id`, `main_password` FROM setting WHERE `username` = ?");
                if (!$stmt) {
                    die("MySQL error: " . $mysqli->error);
                }
                $stmt->bind_param("s", $username);
                if (!$stmt->execute()) {
                    die("MySQL error: " . $stmt->error);
                }

                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $hashedPassword);
                    $stmt->fetch();

                    // Verify the password
                    if (password_verify($password, $hashedPassword)) {
                        // Password is correct, start session
                        $_SESSION['admin'] = $username;
                        $_SESSION['admin_id'] = $id;
                        $_SESSION['login_time'] = time();
                        $_SESSION['admin_session'] = 'admin_session' . time();

                        header("Location: index.php");
                        exit();
                    } else {
                        // Password is incorrect
                        die("Invalid login: Incorrect password. <a class='badge badge-warning' href='login.php'>Login</a>");
                    }
                } else {
                    // Username not found
                    die("Invalid login: Username not found.");
                }

                $stmt->close();
            }
            ?>



            <form action="" class="top15" method="post">
                <div class="form-group">
                    <input name="username" type="text" required="" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" required="" placeholder="Password" class="form-control">
                </div>
                <button name="submit" class="btn green block full-width  bottom15" type="submit">Login</button>
                <!--
	<a href="forgot_password.php"><small>Forgot password?</small></a>
-->
            </form>
            <p class="top15"> <small><?php echo TITLE ?> is easy to use and customize &copy;
                    <?php echo date('Y'); ?></small> </p>
        </div>
    </div>
</body>

</html>