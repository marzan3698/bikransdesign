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

            <div data-page="index" class="page homepage" style="background-color: #0B2234 !important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234 !important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 65px !important; width: 95%; margin: auto; min-height:calc(100vh - 105px);">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text" style="margin: 0px;margin-right:7px;padding:7px;">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                            <div class="box-img-wrap" style="padding: 8px 3px;">
                                <div class="item2">
                                    <span class="dot2" style="background: white;"></span>
                                    <span style="color: white;">আজকের ইনকাম -56787676</span>
                                </div>

                                <div class="item2">
                                    <span class="dot2" style="background: #00bcd4;"></span>
                                    <span style="color: #00bcd4;">সহযোগী সদস্য -56787676</span>
                                </div>

                                <div class="item2">
                                    <span class="dot2" style="background: #a6ff00;"></span>
                                    <span style="color: #a6ff00;">তৃতীয় ব্যালেন্স -56787676</span>
                                </div>

                                <div class="item2">
                                    <span class="dot2" style="background:white;"></span>
                                    <span style="color: white;">ক্যাশ করবেন -56787676</span>
                                </div>

                                <div class="item2">
                                    <span class="dot2" style="background: #00bcd4;"></span>
                                    <span style="color: #00bcd4;">বুকিং ব্যালেন্স -56787676</span>
                                </div>

                                <div class="item2">
                                    <span class="dot2" style="background: #a6ff00;"></span>
                                    <span style="color: #a6ff00;">সরাসরি প্রোডাক্ট ক্রয় -12</span>
                                </div>
                            </div>
                        </div>
                        <div class="withdrawal-container">
                            <div class="service-header-wrap">
                                <div class="menu-toggle-btn">
                                    <span class="menu-bar""></span>
                                    <span class=" menu-bar"></span>
                                    <span class="menu-bar"></span>
                                </div>
                                <div class="service-title-text">
                                    বিক্রান্স বিজনেস পরিসেবা
                                </div>
                                <div class="notification-icon-btn" style="color:#0B2234;margin-right:6px;">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                        <circle cx="18" cy="6" r="3" fill="#0B2234" stroke="#0B2234" />
                                    </svg>
                                </div>
                            </div>

                            <div class="service-flex">

                                <div class="service-item">
                                    <a href="customers-number.php">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/1.svg" alt="bKash">
                                        </div>
                                    </a>
                                </div>


                                <div class="service-item">
                                    <a href="javascript::void(0)" onclick="window.location.href='buy_product.php'">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/2.svg" alt="Nagad">
                                        </div>
                                    </a>
                                </div>

                                <div class="service-item">
                                    <a href="javascript::void(0)" onclick="window.location.href='somosti_aya.php'">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/122.svg" alt="Send" style="width: 50%;">
                                        </div>
                                    </a>
                                </div>

                                <div class="service-item">
                                    <a href="refer-commission.php">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/4.svg" alt="Send">
                                        </div>
                                    </a>
                                </div>

                                

                                

                                <div class="service-item">
                                    <a href="team-commission.php">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/5.svg" alt="Withdraw">
                                        </div>
                                    </a>
                                </div>


                                <div class="service-item">
                                    <a href="total-income.php">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/6.svg" alt="Report">
                                        </div>
                                    </a>
                                </div>

                                <div class="service-item">
                                    <a href="bonchito-taka.php">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/7.svg" alt="Send Money">
                                        </div>
                                    </a>
                                </div>

                                <div class="service-item">
                                    <a href="deposit-money.php">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/8.svg" alt="24 Hours">
                                        </div>
                                    </a>
                                </div>

                                <div class="service-item">
                                    <a href="withdraw-money.php">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/9.svg" alt="Cancel">
                                        </div>
                                    </a>
                                </div>


                                <div class="service-item">
                                    <a href="tools-order.php">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/10.svg" alt="bKash">
                                        </div>
                                    </a>
                                </div>
                                <div class="service-item">
                                    <a href="javascript::void(0)" onclick="window.location.href='flow-map.php'">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/11.svg" alt="bKash">
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="service-item">
                                    <a href="tutorial.php">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/12.svg" alt="bKash">
                                        </div>
                                    </a>
                                </div>

                                <div class="service-item">
                                    <div class="service-icon">
                                        <img src="images/custom/porishaba/13.svg" alt="bKash">
                                    </div>
                                </div>
                                <div class="service-item">
                                    <a href="transfer_balance.php">
                                        <div class="service-icon">
                                            <img src="images/custom/porishaba/123.svg" alt="Bank" style="width:40%">
                                        </div>
                                    </a>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon">
                                        <img src="images/custom/porishaba/14.svg" alt="bKash">
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon">
                                        <img src="images/custom/porishaba/15.svg" alt="bKash">
                                    </div>
                                </div>


                                <!--<div class="service-item">
                                    <div class="service-icon">
                                        <img src="images/custom/porishaba/16.svg" alt="bKash">
                                    </div> 
                                </div>
                                <div class="service-item">
                                    <div class="service-icon">
                                        <img src="images/custom/porishaba/17.svg" alt="bKash">
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon">
                                        <img src="images/custom/porishaba/17.svg" alt="bKash">
                                    </div>
                                </div> -->
                            </div>




                        </div>
                    </nav>
                </div>
            </div>

        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>