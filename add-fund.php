<?php require_once('header.php'); ?>
<div class="statusbar-overlay"></div>

<div class="panel-overlay"></div>

<?php require_once('sidebar.php'); ?>
<div class="panel panel-right panel-reveal">
    <link href="css/custom2.css" rel="stylesheet">
    <div class="user_login_info">

        <div class="user_thumb">
            <div class="user_avatar"><img src="images/avatar.jpg" alt="" title="" /></div>
            <div class="user_details">
                <p>Welcome <span>John Doe</span></p>
            </div>
            <div class="user_social">
                <ul>
                    <li><a href="http://twitter.com/" class="external"><img src="images/icons/green/twitter.png" alt=""
                                title="" /></a></li>
                    <li><a href="http://www.facebook.com/" class="external"><img src="images/icons/green/facebook.png"
                                alt="" title="" /></a></li>
                    <li><a href="http://plus.google.com" class="external"><img src="images/icons/green/gplus.png" alt=""
                                title="" /></a></li>
                </ul>
            </div>
        </div>

        <nav class="user-nav">
            <ul>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/settings.png" alt=""
                            title="" /><span>Account Settings</span></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/briefcase.png" alt=""
                            title="" /><span>My Account</span></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/message.png" alt=""
                            title="" /><span>Messages</span><strong>12</strong></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/love.png" alt=""
                            title="" /><span>Favorites</span><strong>5</strong></a></li>
                <li><a href="index.php" class="close-panel"><img src="images/icons/green/lock.png" alt=""
                            title="" /><span>Logout</span></a></li>
            </ul>
        </nav>
    </div>
</div>

<div class="views">

    <div class="view view-main">

        <style>
            .custom-input {
                width: 97%;
                display: block;
                margin: auto;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 0;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                background: transparent;
            }

            .custom-button {
                background-color: #0B2234;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 0;
                cursor: pointer;
                width: 97%;
                display: block;
                margin: auto;
                margin-bottom: 20px;
            }
        </style>

        <div class="pages">

            <div data-page="index" class="page homepage" style="background-color: #EEEEEE !important;">
                <div class="page-content homepagecontent" style="overflow-x: hidden !important;">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222">
                        <div class="box" style="border:1px solid #12d584;width:90%; margin: 10px auto;">
                            <div class="box-text-wrap">
                                <div class="box-text">ফান্ড অ্যাড করুন</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/add-payment.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <div class="date-wrapper2" style="gap: 1px;">
                            <h4 style="background-color:#0B2234;color:#12D584">
                                কার্ড
                            </h4>
                            <h4 style="background-color:#0B2234;color:#12D584">
                                মোবাইল ব্যাংক
                            </h4>
                            <h4 style="background-color:#0B2234;color:#12D584">
                                অন্যান্য ব্যাংক
                            </h4>
                        </div>
                        <div class="date-wrapper2" style="gap: 1px;">
                            <h4>
                                আপনার নিজস্ব ব্যালেন্স থেকে অ্যাড সম্পন্ন করুন
                            </h4>
                        </div>
                        <form action="ssl_pay.php" method="post" id="paymentForm">
                            <div class="date-wrapper2" style="gap: 1px;">
                                <h4 style="flex: 2;">
                                    অ্যাডকৃত ব্যালেন্স পরিমান
                                </h4>
                                <h4>
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                                    <input type="text" type="number" name="amount" style="width: 70px; background: transparent; border: none;" autocomplete="off">
                                </h4>
                                <button type="submit" name="submit"
                                    style="flex: 0 0 auto; padding:5px 14px; font-size:14px; border: 0px; border-radius: 0px; border:1px solid #222">
                                    অ্যাড করুন
                                </button>
                            </div>
                        </form>
                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
    (function(window, document) {
        var loader = function() {
            var script = document.createElement("script"),
                tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>