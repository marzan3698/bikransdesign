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

        <div class="pages">

            <div data-page="index" class="page homepage" style="background-color: #0B2234!important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 50px !important; width: 95%; margin: auto; border: 1px solid #222; min-height:calc(100vh - 105px);">

                        <img src="images/custom/1.svg" width="100%" height="auto" alt=""
                            style="padding: 0px; margin:0px; ">



                        <div class="withdrawal-container">


                            <div class="service-flex" style="border: none;">
                                <div class="div" style="width: 100%;">


                                    <div class="green-box">
                                        উত্তোলনকৃত ব্যালেন্স <?php echo $member->balance; ?>
                                    </div>
                                </div>
                                <div class="service-item2">
                                    <a href="javascript::void(0)" onclick="window.location.href='bkash.php'">
                                        <div class="service-icon4">
                                            <img src="images/custom/3.svg" alt="bKash">
                                        </div>

                                    </a>
                                </div>
                                <div class="service-item2">
                                    <a href="javascript::void(0)" onclick="window.location.href='nagad.php'">
                                        <div class="service-icon4">
                                            <img src="images/custom/4.svg" alt="Nagad">
                                        </div>

                                    </a>
                                </div>
                                <div class="service-item2">
                                    <a href="javascript::void(0)" onclick="window.location.href='dutch-bangla.php'">
                                        <div class="service-icon4">
                                            <img src="images/custom/5.svg" alt="Bank">
                                        </div>
                                    </a>
                                </div>
                                <div class="service-item2">
                                    <div class="service-icon4">
                                        <img src="images/custom/6.svg" alt="Send">
                                    </div>
                                </div>
                                <div class="service-item2">
                                    <div class="service-icon4">
                                        <img src="images/custom/7.svg" alt="Send">
                                    </div>
                                </div>
                                <div class="service-item2">
                                    <div class="service-icon4">
                                        <img src="images/custom/8.svg" alt="Send">
                                    </div>
                                </div>
                                <div class="service-item2">
                                    <div class="service-icon4">
                                        <img src="images/custom/9.svg" alt="Send Money">
                                    </div>

                                </div>
                                <div class="service-item2">
                                    <div class="service-icon4">
                                        <img src="images/custom/10.svg" alt="Send">
                                    </div>
                                </div>
                                <div class="service-item2">
                                    <div class="service-icon4">
                                        <img src="images/custom/11.svg" alt="Send">
                                    </div>
                                </div>
                                <div class="service-item2">
                                    <div class="service-icon4">
                                        <img src="images/custom/94.png" alt="Send">
                                    </div>
                                </div>
                                <div class="service-item2">
                                    <div class="service-icon4">
                                        <img src="images/custom/94.png" alt="Send">
                                    </div>
                                </div>
                                <div class="service-item2">
                                    <div class="service-icon4">
                                        <img src="images/custom/94.png" alt="Send">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>