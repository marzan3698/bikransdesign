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
    <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">
    <style>
        .sub-box{
            width: 33.33%;
            padding: 10px;
            text-align: center;
            font-weight: 500;
            font-size: 15px;
            color: #fff;
            font-family: 'SolaimanLipi', sans-serif !important;

            display: flex;
            justify-content: center;  /* horizontal center */
            align-items: center;      /* vertical center */
        }
        .sub-box a{
            color: #fff;
        }
        .service-icon2{
            padding: 10px;
            background: transparent;
            color: #fff !important;
            font-size: 14px;
        }
        .service-icon2 span{
            color: #fff !important;
        }
    </style>

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
                        style="margin-top: 60px !important; width: 95%; margin: auto; border: 1px solid #12D584; min-height:86vh;">
                        <?php 
                            $agentCheck = QB::table('agent')->where('user_id', $_SESSION['user_id'])->where('status', 1)->first();
                        ?>
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
                                <div class="service-title-text" style="color: #fff;font-size: 25px;">
                                    বিক্রান্স এজেন্ট প্যানেল
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
                                    <div class="service-icon2">
                                        <?php if($agentCheck){ ?>
                                            <span> এজেন্ট নিবন্ধন সম্পন্ন হয়েছে</span>
                                        <?php }else{ ?>
                                            <span onclick="window.location.href='agent_nibondhon.php'"> এজেন্ট নিবন্ধন আবেদন</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                         <?php if($agentCheck){ ?>
                                            <span onclick="window.location.href='agent-balens-abedon.php'"> এজেন্ট ব্যালেন্স আবেদন</span>
                                        <?php }else{ ?>
                                            <span> এজেন্ট ব্যালেন্স আবেদন</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>বর্তমান ব্যালেন্স: <?= $member->agent_balence ?></span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span onclick="window.location.href='agent-balance-report.php'">এজেন্ট ব্যালেন্স রিপোর্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                         <?php if($agentCheck){ ?>
                                            <span onclick="window.location.href='agent-product-order.php'">এজেন্ট প্রোডাক্ট অর্ডার</span>
                                        <?php }else{ ?>
                                            <span>এজেন্ট প্রোডাক্ট অর্ডার</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span onclick="window.location.href='agent-product-order-report.php'">এজেন্ট প্রোডাক্ট অর্ডার রিপোর্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <?php
                                            $allProducts = QB::table('product')->orderBy('id', 'asc')->get();
                                            $totalStock = 0;
                                            foreach ($allProducts as $product) {
                                                $totalStock += agent_product_stock($product->id);
                                            }
                                        ?>
                                        <span onclick="window.location.href='agent-product-stock.php'">এজেন্ট প্রোডাক্ট স্টক: <?= $totalStock ?></span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span onclick="window.location.href='agent-product-stock-report.php'">এজেন্ট প্রোডাক্ট <br> স্টক রিপোর্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <?php if($agentCheck){ ?>
                                            <span onclick="window.location.href='agent_pre_register.php'">নতুন সদস্য <br> নিবন্ধন</span>
                                        <?php }else{ ?>
                                            <span>নতুন সদস্য নিবন্ধন</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span onclick="window.location.href='new-member-list-agent-created.php'">নতুন সদস্য <br> নিবন্ধন তালিকা</span>
                                    </div>
                                </div>

                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span onclick="window.location.href='sodosso-product-delivery-report.php'">সব প্রোডাক্ট ডেলিভারি রিপোর্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <?php if($agentCheck){ ?>
                                            <span onclick="window.location.href='agent-product-repurchase.php'">গ্রাহক প্রোডাক্ট <br> রি-অর্ডার</span>
                                        <?php }else{ ?>
                                            <span>গ্রাহক প্রোডাক্ট <br> রি-অর্ডার</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span onclick="window.location.href='agent-product-repurchase-report.php'">প্রোডাক্ট রি-অর্ডার রিপোর্ট</span>
                                    </div>
                                </div>
                                <div class="service-item" onclick="window.location.href='agent-bikroy-commission.php'">
                                    <div class="service-icon2">
                                        <span>এজেন্ট বিক্রয় কমিশন-  <?php $total = QB::query("
                                            SELECT IFNULL(SUM(cradit),0) as total_credit
                                            FROM user_transection
                                            WHERE user_id = '{$_SESSION['user_id']}'
                                            AND his = 561
                                        ")->first();

                                        echo $total->total_credit; ?></span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span onclick="window.location.href='agent-sales-report.php'">এজেন্ট থেকে <br> বিক্রয় রিপোর্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>এজেন্ট রয়্যালিটি বোনাস- <?php $total = QB::query("
                                            SELECT IFNULL(SUM(cradit),0) as total_credit
                                            FROM user_transection
                                            WHERE user_id = '{$_SESSION['user_id']}'
                                            AND his = 571
                                        ")->first();

                                        echo $total->total_credit; ?></span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span><a href="roylity_bonus.php" style="color: white;">রয়্যালিটি বোনাস রিপোর্ট</a></span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>এজেন্ট মাসিক ইনসেনটিভ টার্গেট-0</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>এজেন্ট মাসিক ইনসেনটিভ-0</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>এজেন্ট মাসিক ইনসেনটিভ রিপোর্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>ক্যাশ পেমেন্ট <br> রিকুয়েস্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>পেমেন্ট এজেন্ট কমিশন দিন</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>ক্যাশ পেমেন্ট রিপোর্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>পেমেন্ট এজেন্ট কমিশন-0</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>পেমেন্ট এজেন্ট কমিশন রিপোর্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>পেমেন্ট এজেন্ট অফিস খরচ-0</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>পেমেন্ট এজেন্ট অফিস খরচ রিপোর্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>এজেন্ট মোট ইনকাম-0</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>প্রোডাক্ট <br> রিকুয়েস্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>রিকুয়েস্ট প্রোডাক্ট ডেলিভারি রিপোর্ট</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>আসিতেছে</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>আসিতেছে</span>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="service-icon2">
                                        <span>আসিতেছে</span>
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
