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
                            $agentCheck = QB::table('agent')->where('user_id', $_SESSION['user_id'])->first();
                        ?>
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text" style="color: white;">বিক্র্যান্স এজেন্ট</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/688.png" alt="" class="box-img" style="width: 130px;">
                            </div>
                        </div>
                        <div style="display: flex; gap: 5px; width: 97%; margin: auto;">
                            <?php if($agentCheck){ ?>
                                <div class="sub-box" style="background: #F26B6C;" onclick="window.location.href='agent_nibondhon.php'">
                                    এজেন্ট নিবন্ধন সম্পন্ন হয়েছে
                                </div>
                            <?php }else{ ?>
                                <div class="sub-box" style="background: #F26B6C;" onclick="window.location.href='agent_nibondhon.php'">
                                    এজেন্ট নিবন্ধন আবেদন
                                </div>
                            <?php } ?>
                            <div class="sub-box" style="background: #00CC99" onclick="window.location.href='agent-balens-abedon.php'">
                                এজেন্ট ব্যালেন্স আবেদন
                            </div>
                            <div class="sub-box" style="background: #7F7F7F;">বর্তমান ব্যালেন্স: <?= $member->agent_balence ?></div>
                        </div>

                        <div style="display: flex; gap: 5px; width: 97%; margin: auto;margin-top:5px !important">
                            <div class="sub-box" style="background: #7F7F7F;" onclick="window.location.href='agent-balance-report.php'">এজেন্ট ব্যালেন্স রিপোর্ট</div>
                            <?php if($agentCheck){ ?>
                                <div class="sub-box" style="background: #F26B6C;" onclick="window.location.href='agent-product-order.php'">এজেন্ট প্রোডাক্ট অর্ডার</div>
                            <?php }else{ ?>
                                <div class="sub-box" style="background: #F26B6C;">এজেন্ট প্রোডাক্ট অর্ডার</div>
                            <?php } ?>
                            <div class="sub-box" style="background: #00CC99;" onclick="window.location.href='agent-product-stock.php'">
                                <?php 
                                    $stockIn = QB::table('agent_product_stock')
                                        ->where('user_id', $_SESSION['user_id'])
                                        ->where('type', 'stock_in')
                                        ->get();

                                    $stockOut = QB::table('agent_product_stock')
                                        ->where('user_id', $_SESSION['user_id'])
                                        ->where('type', 'stock_out')
                                        ->get();

                                    $totalIn = 0;
                                    foreach ($stockIn as $row) {
                                        $totalIn += $row->qty ?? 0;
                                    }

                                    $totalOut = 0;
                                    foreach ($stockOut as $row) {
                                        $totalOut += $row->qty ?? 0;
                                    }

                                    $stock = $totalIn - $totalOut;
                                ?>
                                এজেন্ট প্রোডাক্ট স্টক: <?= $stock ?>
                            </div>
                        </div>

                        <div style="display: flex; gap: 5px; width: 97%; margin: auto;margin-top:5px !important">
                            <?php if($agentCheck){ ?>
                                <div class="sub-box" style="background: #F26B6C;" onclick="window.location.href='agent_pre_register.php'">নতুন সদস্য নিবন্ধন</div>
                            <?php }else{ ?>
                                <div class="sub-box" style="background: #F26B6C;">নতুন সদস্য নিবন্ধন</div>
                            <?php } ?>
                            <div class="sub-box" style="background: #00CC99;" onclick="window.location.href='sodosso-product-delivery-report.php'">সদস্য প্রোডাক্ট ডেলিভারি রিপোর্ট</div>
                            <div class="sub-box" style="background: #F26B6C;" onclick="window.location.href='agent-product-stock.php'">এজেন্ট প্রোডাক্ট স্টক রিপোর্ট</div>
                        </div>

                        <div style="display: flex; gap: 5px; width: 97%; margin: auto;margin-top:5px !important">
                            <?php if($agentCheck){ ?>
                                <div class="sub-box" style="background: #7F7F7F;" onclick="window.location.href='agent-product-repurchase.php'">গ্রাহক প্রোডাক্ট রি-অর্ডার</div>
                            <?php }else{ ?>
                                <div class="sub-box" style="background: #7F7F7F;">গ্রাহক প্রোডাক্ট রি-অর্ডার</div>
                            <?php } ?>
                            <div class="sub-box" style="background: #F26B6C;" onclick="window.location.href='agent-product-repurchase-report.php'">প্রোডাক্ট রি-অর্ডার রিপোর্ট</div>
                            <div class="sub-box" style="background: #7F7F7F;">আসছে</div>
                        </div>

                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
