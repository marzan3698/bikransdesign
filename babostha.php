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

            <div data-page="index" class="page homepage" style="background-color: #EEEEEE !important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222; min-height:calc(100vh - 105px);">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text">বিজনেস ব্যবস্থাপনা <br> অনুসরণ করুন
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/11.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <div class="withdrawal-container">
                            <div class="balance-header" style="background-color: #12E586;padding: 10px;">
                                <div class="available-balance" style="color: #222;">
                                    বিজনেস ব্যবস্থাপনা দেখুন
                                </div>
                            </div>

                            <div class="service-flex">
                                <div class="service-item" onclick="window.location.href='ortho-poristhiti.php'">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/17.png" alt="bKash">
                                    </div>
                                    <div class="service-name3">অর্থ পরিস্থিতি</div>
                                </div>

                                <div class="service-item" onclick="window.location.href='prosno.php'">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/18.png" alt="Nagad">
                                    </div>
                                    <div class="service-name3">প্রশ্ন করুন</div>
                                </div>

                                <div class="service-item" onclick="window.location.href='abedon.php'">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/19.png" alt="Bank">
                                    </div>
                                    <div class="service-name3">আবেদন</div>
                                </div>

                                <div class="service-item" onclick="window.location.href='ayerpoth.php'">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/20.png" alt="Send">
                                    </div>
                                    <div class="service-name3">আয়ের পথ</div>
                                </div>

                                <div class="service-item" onclick="window.location.href='distributor-list.php'">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/5.png" alt="Withdraw">
                                    </div>
                                    <div class="service-name3">ডিস্ট্রিবিউটর</div>
                                </div>

                                <div class="service-item" onclick="window.location.href='invite-list.php'">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/7.png" alt="Report">
                                    </div>
                                    <div class="service-name3">ইনভাইট</div>
                                </div>

                                <div class="service-item" onclick="window.location.href='followup-list.php'">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/6.png" alt="Send Money">
                                    </div>
                                    <div class="service-name3">ফলোআপ</div>
                                </div>

                                <div class="service-item" onclick="window.location.href='routine.php'">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/8.png" alt="24 Hours">
                                    </div>
                                    <div class="service-name3">রুটিন</div>
                                </div>

                                <div class="service-item" onclick="window.location.href='routine-report.php'">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/7.png" alt="Cancel">
                                    </div>
                                    <div class="service-name3">টার্গেট</div>
                                </div>

                                <div class="service-item">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/7.png" alt="Service">
                                    </div>
                                    <div class="service-name3">অনান্য</div>
                                </div>

                                <div class="service-item">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/7.png" alt="Service">
                                    </div>
                                    <div class="service-name3">অনান্য</div>
                                </div>

                                <div class="service-item">
                                    <div class="service-icon3">
                                        <img src="images/custom/icons/7.png" alt="Service">
                                    </div>
                                    <div class="service-name3">অনান্য</div>
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