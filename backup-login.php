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
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
    <link href="images/apple-touch-startup-image-320x460.png" media="(device-width: 320px)"
        rel="apple-touch-startup-image">
    <link href="images/apple-touch-startup-image-640x920.png"
        media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
    <title>upmobile - HTML mobile template</title>
    <link rel="stylesheet" href="css/framework7.css">
    <link rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="css/swipebox.css" />
    <link type="text/css" rel="stylesheet" href="css/animations.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
</head>

<body id="mobile_wrap">

    <div class="statusbar-overlay"></div>

    <div class="panel-overlay"></div>

    <div class="panel panel-left panel-reveal">
        <nav class="sidebar-nav">
            <ul>
                <li><a href="index.php" class="close-panel"><img src="images/icons/white/home.png" alt=""
                            title="" /><span>Home</span></a></li>
                <li><a href="about.html" class="close-panel"><img src="images/icons/white/mobile.png" alt=""
                            title="" /><span>About</span></a></li>
                <li><a href="features.html" class="close-panel"><img src="images/icons/white/features.png" alt=""
                            title="" /><span>Features</span></a></li>
                <li><a href="#" data-popup=".popup-login" class="open-popup close-panel"><img
                            src="images/icons/white/lock.png" alt="" title="" /><span>Login</span></a></li>
                <li><a href="team.html" class="close-panel"><img src="images/icons/white/users.png" alt=""
                            title="" /><span>Team</span></a></li>
                <li><a href="blog.html" class="close-panel"><img src="images/icons/white/blog.png" alt=""
                            title="" /><span>Blog</span></a></li>
                <li><a href="photos.html" class="close-panel"><img src="images/icons/white/photos.png" alt=""
                            title="" /><span>Photos</span></a></li>
                <li><a href="videos.html" class="close-panel"><img src="images/icons/white/video.png" alt=""
                            title="" /><span>Videos</span></a></li>
                <li><a href="music.html" class="close-panel"><img src="images/icons/white/music.png" alt=""
                            title="" /><span>Music</span></a></li>
                <li><a href="shop.html" class="close-panel"><img src="images/icons/white/shop.png" alt=""
                            title="" /><span>Shop</span></a></li>
                <li><a href="cart.html" class="close-panel"><img src="images/icons/white/cart.png" alt=""
                            title="" /><span>Cart</span></a></li>
                <li><a href="tables.html" class="close-panel"><img src="images/icons/white/tables.png" alt=""
                            title="" /><span>Tables</span></a></li>
                <li><a href="toggle.html" class="close-panel"><img src="images/icons/white/toggle.png" alt=""
                            title="" /><span>Toggle</span></a></li>
                <li><a href="tabs.html" class="close-panel"><img src="images/icons/white/tabs.png" alt=""
                            title="" /><span>Tabs</span></a></li>
                <li><a href="form.html" class="close-panel"><img src="images/icons/white/form.png" alt=""
                            title="" /><span>Forms</span></a></li>
                <li><a href="contact.html" class="close-panel"><img src="images/icons/white/contact.png" alt=""
                            title="" /><span>Contact</span></a></li>
            </ul>
        </nav>
    </div>

    <div class="panel panel-right panel-reveal">
        <div class="user_login_info">

            <div class="user_thumb">
                <div class="user_avatar"><img src="images/avatar.jpg" alt="" title="" /></div>
                <div class="user_details">
                    <p>Welcome <span>John Doe</span></p>
                </div>
                <div class="user_social">
                    <ul>
                        <li><a href="http://twitter.com/" class="external"><img src="images/icons/white/twitter.png"
                                    alt="" title="" /></a></li>
                        <li><a href="http://www.facebook.com/" class="external"><img
                                    src="images/icons/white/facebook.png" alt="" title="" /></a></li>
                        <li><a href="http://plus.google.com" class="external"><img src="images/icons/white/gplus.png"
                                    alt="" title="" /></a></li>
                    </ul>
                </div>
            </div>

            <nav class="user-nav">
                <ul>
                    <li><a href="features.html" class="close-panel"><img src="images/icons/white/settings.png" alt=""
                                title="" /><span>Account Settings</span></a></li>
                    <li><a href="features.html" class="close-panel"><img src="images/icons/white/briefcase.png" alt=""
                                title="" /><span>My Account</span></a></li>
                    <li><a href="features.html" class="close-panel"><img src="images/icons/white/message.png" alt=""
                                title="" /><span>Messages</span><strong>12</strong></a></li>
                    <li><a href="features.html" class="close-panel"><img src="images/icons/white/love.png" alt=""
                                title="" /><span>Favorites</span><strong>5</strong></a></li>
                    <li><a href="index.html" class="close-panel"><img src="images/icons/white/lock.png" alt=""
                                title="" /><span>Logout</span></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="views">

        <div class="view view-main">



            <div class="pages">

                <div data-page="index" class="page homepage">
                    <div class="page-content homepagecontent">

                        <div class="homenavbar">
                            <h1><span>up</span>mobile</h1>
                            <a href="index.php" data-panel="left" class="open-panel">
                                <div class="navbar_right"><img src="images/icons/white/menu.png" alt="" title="" />
                                </div>
                            </a>
                        </div>


                        <div class="swiper-pagination"></div>



                    </div>
                </div>
            </div>


        </div>
    </div>


    <!-- Login Popup -->
    <div class="popup popup-login modal-in" style="display: block;">
        <div class="content-block">


            <h4 style="padding: 0px; color:#12D584"> বিক্রান্স বিজনেস</h4>
            <h4 style="font-size: 20px;">লগইন</h4>
            <div class="loginform">
                <form id="LoginForm" method="post" action="">
                    <input type="text" name="username" value="" class="form_input required" placeholder="username"
                        required />
                    <input type="password" name="password" value="" class="form_input required" placeholder="password"
                        required />
                    <div class="forgot_pass"><a href="#" data-popup=".popup-forgot"
                            style="font-weight: normal; font-size:12px;" class="open-popup">পাসওয়ার্ড
                            পরিবর্তন ?
                        </a></div>
                    <input style="font-weight: normal;" type="submit" name="submit" class="form_submit" id="submit"
                        value="প্রবেশ করুন" />
                </form>
                <div class="signup_bottom">
                    <p style="line-height: 1.8; color:#12D584; font-weight:400">আমরা ভালো আছি আপনি আসুন <br>
                        বিক্রান্স বিজনেসের সাথে আপনি <br> ভালো থাকবেন আর্থিক ভাবে</p>
                    <!--    <a href="#" data-popup=".popup-signup" class="open-popup">SIGN UP</a> -->
                </div>
            </div>
            <!-- <div class="close_popup_button">
                <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
            </div> -->
        </div>
    </div>

    <!-- Register Popup -->
    <div class="popup popup-signup">
        <div class="content-block">
            <h4>REGISTER</h4>
            <div class="loginform">
                <form id="RegisterForm" method="post">
                    <input type="text" name="Username" value="" class="form_input required" placeholder="Username" />
                    <input type="text" name="Email" value="" class="form_input required" placeholder="Email" />
                    <input type="password" name="Password" value="" class="form_input required"
                        placeholder="Password" />
                    <input type="submit" name="submit" class="form_submit" id="submit" value="SIGN UP" />
                </form>
                <h5>- OR REGISTER WITH A SOCIAL ACCOUNT -</h5>
                <div class="signup_social">
                    <a href="http://www.facebook.com/" class="signup_facebook external">FACEBOOK</a>
                    <a href="http://www.twitter.com/" class="signup_twitter external">TWITTER</a>
                </div>
            </div>
            <div class="close_popup_button">
                <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
            </div>
        </div>
    </div>

    <!-- Forgot Password Popup -->
    <div class="popup popup-forgot">
        <div class="content-block">
            <h4>FORGOT PASSWORD</h4>
            <div class="loginform">
                <form id="ForgotForm" method="post">
                    <input type="text" name="Email" value="" class="form_input required" placeholder="email" />
                    <input type="submit" name="submit" class="form_submit" id="submit" value="RESEND PASSWORD" />
                </form>
                <div class="signup_bottom">
                    <p>Check your email and follow the instructions to reset your password.</p>
                </div>
            </div>
            <div class="close_popup_button">
                <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
            </div>
        </div>
    </div>

    <!-- Social Icons Popup -->
    <div class="popup popup-social">
        <div class="content-block">
            <h4>Social Share</h4>
            <p>Share icons solution that allows you share and increase your social popularity.</p>
            <ul class="social_share">
                <li><a href="http://twitter.com/" class="external"><img src="images/icons/black/twitter.png" alt=""
                            title="" /><span>TWITTER</span></a></li>
                <li><a href="http://www.facebook.com/" class="external"><img src="images/icons/black/facebook.png"
                            alt="" title="" /><span>FACEBOOK</span></a></li>
                <li><a href="http://plus.google.com" class="external"><img src="images/icons/black/gplus.png" alt=""
                            title="" /><span>GOOGLE</span></a></li>
                <li><a href="http://www.dribbble.com/" class="external"><img src="images/icons/black/dribbble.png"
                            alt="" title="" /><span>DRIBBBLE</span></a></li>
                <li><a href="http://www.linkedin.com/" class="external"><img src="images/icons/black/linkedin.png"
                            alt="" title="" /><span>LINKEDIN</span></a></li>
                <li><a href="http://www.pinterest.com/" class="external"><img src="images/icons/black/pinterest.png"
                            alt="" title="" /><span>PINTEREST</span></a></li>
            </ul>
            <div class="close_popup_button"><a href="#" class="close-popup"><img src="images/icons/black/menu_close.png"
                        alt="" title="" /></a></div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/framework7.js"></script>
    <script type="text/javascript" src="js/jquery.swipebox.js"></script>
    <script type="text/javascript" src="js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="js/email.js"></script>
    <script type="text/javascript" src="js/audio.min.js"></script>
    <script type="text/javascript" src="js/classie.js"></script>
    <script type="text/javascript" src="js/selectFx.js"></script>
    <script type="text/javascript" src="js/my-app.js"></script>

</body>

</html>