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
            *{
                font-family: 'SolaimanLipi', sans-serif !important;
            }
            .cus-in-11 {
                width: 100%;
                padding: 10px;
                border: 1px solid #fff;
                margin-top: 3px;
                box-sizing: border-box;
                overflow-x: auto;
                white-space: nowrap;
                text-overflow: clip;
                background: transparent;
                color: #fff;
            }

            .cus-in-11::placeholder {
                color: #fff;
            }

            .input-scroll-wrapper {
                overflow-x: auto;
                white-space: nowrap;
                width: 100%;
            }

            .cus-select-111 {
                width: 100%;
                padding: 10px;
                border: 1px solid #fff;
                margin-top: 3px;
                box-sizing: border-box;
                font-size: 14px;
                white-space: nowrap;
                overflow-x: auto;
                text-overflow: clip;
            }

            .img-preview {
                width: 90%;
                height: 155px;
                border: 1px solid #fff;
                color: #fff;
                font-weight: 600;
                padding: 5px;
                margin-top: 3px;
                text-align: center;
                position: relative;
            }
            .submit-btn{
                margin-bottom: 35px !important; 
                display: block; 
                margin: auto; 
                padding: 10px 34px; 
                margin-top: 10px !important;
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
                        style="margin-top: 60px !important; width: 95%; margin: auto; min-height:86vh;">
                        <div style="background: #00CC99; padding: 12px; color: #fff; text-align: center; font-size: 22px;">গ্রাহক প্রোডাক্ট রি-অর্ডার</div>
                        <?php 
                            $order = QB::table('order_items')->where('agent_id', $_SESSION['user_id'])->where('type', 'agent-repurchase')->orderBy('id', 'desc')->get();
                            $sl = 1
                        ?>
                        <table>
                            <tr>
                                <td style="background: transparent;border:1px solid #fff">নং</td>
                                <td style="background: transparent;border:1px solid #fff">সদস্য নাম</td>
                                <td style="background: transparent;border:1px solid #fff">আইডি</td>
                                <td style="background: transparent;border:1px solid #fff">প্রোডাক্ট নাম</td>
                                <td style="background: transparent;border:1px solid #fff">ডেলিভারি তথ্য</td>
                            </tr>
                            <?php foreach($order as $row){ ?>
                                <tr>
                                    <td style="background: transparent;border:1px solid #fff"><?= $sl++ ?></td>
                                    <td style="background: transparent;border:1px solid #fff">
                                        <?php 
                                            $user = QB::table('member')->where('id', $row->user_id)->first();
                                            echo $user->name;
                                        ?>
                                    </td>
                                    <td style="background: transparent;border:1px solid #fff"><?= $user->username ?></td>
                                    <td style="background: transparent;border:1px solid #fff">
                                        <?php 
                                            $product = QB::table('product')->where('id', $row->product_id)->first();
                                            echo $product->name ?? 'N/A';
                                        ?>

                                    </td>
                                    <td style="background: transparent;border:1px solid #fff">
                                        <?php
                                            $main_order = QB::table('order')->where('id', $row->order_id)->first();
                                            if($main_order->status == 1){
                                                echo '<div style="color:green;">ডেলিভারি সম্পন্ন হয়েছে</div>';
                                            }elseif($main_order->status == 0){
                                                echo '<div style="color:red;">ডেলিভারি সম্পন্ন হয়নি</div>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>


                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>