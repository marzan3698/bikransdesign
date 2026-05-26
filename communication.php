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
                                <div class="box-text">আইটি <br>যোগাযোগ
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/31.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <div class="withdrawal-container">
                            <div class="service-header-wrap">
                                <div class="menu-toggle-btn">
                                    <span class="menu-bar"></span>
                                    <span class="menu-bar"></span>
                                    <span class="menu-bar"></span>
                                </div>
                                <div class="service-title-text">
                                    যোগাযোগ পরিসেবা
                                </div>
                                <div class="notification-icon-btn">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                        <circle cx="18" cy="6" r="3" fill="white" stroke="white" />
                                    </svg>
                                </div>
                            </div>
                            <div class="service-header-wrap2 " style="margin-top: 4px;">
                                <div class="service-title-text2">
                                    যোগাযোগ
                                </div>
                            </div>


                            <form action="register.php" method="post" enctype="multipart/form-data">
                                <h5 style="margin-top: 3px; margin-bottom:3px; padding:5px">সদস্য নাম</h5>
                                <div class="custom-form-group2">
                                    <input type="text" id="name" name="name" placeholder="" required>
                                </div>

                                <h5 style="margin-top: 3px; margin-bottom:3px; padding:5px">সদস্য আইডি</h5>
                                <div class="custom-form-group2">
                                    <input type="text" id="user-id" name="id" placeholder="" required>
                                </div>
                                <h5 style="margin-top: 3px; margin-bottom:3px; padding:5px">সদস্য নাম</h5>
                                <div class="custom-form-group2">
                                    <input type="text" id="name" name="name" placeholder="" required>
                                </div>
                                <h5 style="margin-top: 3px; margin-bottom:3px; padding:5px">হোয়াটসঅ্যাপ নম্বর</h5>
                                <div class="custom-form-group2">
                                    <input type="text" id="whatsup_number" name="whatsup_number" placeholder=""
                                        required>
                                </div>
                                <h5 style="margin-top: 3px; margin-bottom:3px; padding:5px">গ্রাহক সমস্যা লিখুন</h5>
                                <div class="custom-form-group2">
                                    <textarea id="problem" name="problem" placeholder=""
                                        style="height: 120px; resize: none;" required></textarea>
                                </div>



                                <button type="submit" class="custom-submit-button3">সেন্ড করুন</button>
                            </form>

                        </div>
                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>