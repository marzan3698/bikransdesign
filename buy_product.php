<?php
require_once('header.php');
$banglaMonths = [
    'Jan' => 'জানুয়ারি',
    'Feb' => 'ফেব্রুয়ারি',
    'Mar' => 'মার্চ',
    'Apr' => 'এপ্রিল',
    'May' => 'মে',
    'Jun' => 'জুন',
    'Jul' => 'জুলাই',
    'Aug' => 'আগস্ট',
    'Sep' => 'সেপ্টেম্বর',
    'Oct' => 'অক্টোবর',
    'Nov' => 'নভেম্বর',
    'Dec' => 'ডিসেম্বর'
];
?>
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
                    <nav class="main-nav" style="margin-top: 55px !important; width: 95%; margin: auto;">
                        <div class="box" style="border: none;">
                            <!--  -->
                            <section class="chart">

                                <div class="bar-wrap">
                                    <div class="bar bar-1">
                                        <span class="bar-text">৩টি</span>
                                        <span class="label label-1"><span class="dot dot-1"
                                                style="background:#00586D;"></span>মাসিক ক্রয়</span>
                                    </div>
                                </div>

                                <div class="bar-wrap">
                                    <div class="bar bar-2">
                                        <span class="bar-text">৩টি</span>
                                        <span class="label label-2"><span class="dot dot-2"
                                                style="background-color: #CA8900;"></span>মাসিক ক্রয়</span>
                                    </div>
                                </div>

                                <div class="bar-wrap">
                                    <div class="bar bar-3">
                                        <span class="bar-text">৩টি</span>
                                        <span class="label label-3"><span class="dot dot-3"
                                                style="background:#00A167;"></span>মাসিক ক্রয়</span>
                                    </div>
                                </div>

                                <div class="bar-wrap">
                                    <div class="bar bar-4">
                                        <span class="bar-text">৩টি</span>
                                        <span class="label label-4"><span class="dot dot-4"
                                                style="background:#A33B44"></span>মাসিক ক্রয়</span>
                                    </div>
                                </div>
                            </section>
                        </div>
                        
                        <div class="withdrawal-container"s>
                            <div class="service-header-wrap" style="background: #fff; border: 3px solid #12d584; border-radius: 15px; padding: 5px;margin-bottom: 10px;">
                                <img src="https://cdn-icons-png.flaticon.com/128/50/50037.png" alt="" width="30px">
                                <div style="background-color: #12d584; width: 3px; height: 45px; margin-left: 10px;"></div>
                                <div class="service-title-text">
                                    মাসিক ক্রয় ব্যবস্থাপনা

                                    <?php


                                    $biz_time = $member2->biz_alert_time;
                                    //echo '<br/>';

                                     $daytime = $member2->biz_day+30;
                                   // echo '<br/>';

                                    $daytime = $daytime * 1;
                                    //echo '<br/>';

                                    $day30 = 86400 * $daytime;
                                    //echo '<br/>';

                                    $day_check = $biz_time + $day30;
                                    //echo '<br/>';

                                    echo "<script>var endTime = $day_check;</script>";



                                    ?>
                                    
                                    <?php
                                
                                
                      $orders = QB::table('order')->where('user_id', $_SESSION['user_id'])->get();
                            /*
                                $total_qty = 0;

                                foreach ($orders as $order) {
                                    $total_qty += $order->total_qty;
                                }
                                */

                    $total_qty = total_order_qty($_SESSION['user_id']);



                                    if ($member->biz_alert4 == 1) {
                                        $qtyb = 12 * $member->biz_day;
                                        //echo '<br/>';

                                        $res_product=($total_qty - $qtyb) - 7;
                                        
                                    }
                                    elseif($member->biz_alert3 == 1) {
                                        $qtyb = 10 * $member->biz_day;
                                        //echo '<br/>';

                                        $res_product=($total_qty - $qtyb) - 7;
                                        
                                    }
                                    elseif($member->biz_alert2 == 1) {
                                        $qtyb = 7 * $member->biz_day;
                                        //echo '<br/>';

                                        $res_product=($total_qty - $qtyb) - 7;
                                        
                                    }elseif($member->biz_alert == 1){
                                      $qtyb = 5 * $member->biz_day;
                                       // echo '<br/>';

                                        $res_product=($total_qty - $qtyb) - 7;  
                                    }else{
                                        echo $res_product=0;
                                        echo $qtyb=0;
                                    }
                                                                    //echo $total_qty-$qtyb; 
                                                                    ?>
                                                                    

                                    <div id="countdown" style="font-size:12px; font-weight:bold; color:red;"></div>
                                    <?php 
                                    if($member->biz_alert4==1){
                                        $qty = 3;
                                    }elseif($member->biz_alert3==1){
                                        $qty = 3;
                                    }
                                    elseif($member->biz_alert2==1){
                                        $qty = 1;
                                    }elseif($member->biz_alert==1){
                                        $qty = 3;
                                    } ?>

                                    <script>
                                    
                                        function updateCountdown() {
                                            var qty = <?php echo $qty; ?>;
                                            var now = Math.floor(Date.now() / 1000);
                                            var distance = endTime - now;

                                            if (distance > 0) {
                                                // ⏳ এখনও সময় আছে
                                                var days = Math.floor(distance / (60 * 60 * 24));
                                                var hours = Math.floor((distance % (60 * 60 * 24)) / (60 * 60));
                                                var minutes = Math.floor((distance % (60 * 60)) / 60);
                                                var seconds = Math.floor(distance % 60);

                                                document.getElementById("countdown").innerHTML =
                                                    "আয় চলমান রাখতে " + days + " দিন " + hours + " ঘন্টা " + minutes + " মিনিট " + seconds + " সেকেন্ড এর মাঝে  " + qty + "  টি প্রোডাক্ট অর্ডার করুন";

                                            } else {
                                                // ❌ সময় শেষ → কতদিন আগে শেষ হয়েছে
                                                var passed = Math.abs(distance);

                                                var days = Math.floor(passed / (60 * 60 * 24));
                                                var hours = Math.floor((passed % (60 * 60 * 24)) / (60 * 60));
                                                var minutes = Math.floor((passed % (60 * 60)) / 60);

                                                document.getElementById("countdown").innerHTML =
                                                    "⛔ Expired " + days + " দিন আগে (" + hours + " ঘন্টা " + minutes + " মিনিট)";
                                            }
                                        }

                                        setInterval(updateCountdown, 1000);
                                        updateCountdown();
                                    </script>

                                </div>
                                <div class="notification-icon-btn" style="color:black;margin-right:6px;background: #fff; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23); border-radius: 10px;">
                                    <a href="javascript::void(0)" onclick="window.location.href='create-order3.php'">
                                        অর্ডার করুন
                                    </a>
                                </div>
                            </div>
                            
                            <table class="table5"
                                style="width: 100%;border-spacing:0px;margin-top:4px; margin-bottom:5px;">
                                <thead>
                                    <tr>
                                        <th class="table-text"
                                            style="background-color:#12546E; cursor: pointer; border-right:#1D202D solid 2px; color:white; font-size:14px; width:25%; border-radius: 15px; vertical-align: middle;">
                                            বিজ এলার্ট - <?php echo $refer_count = refer_count_active($member->id);
                                                            if ($refer_count >= 5) {

                                                                $time = time();

                                                                if ($member->biz_alert == 1) {
                                                                } else {

                                                                    $sql = "UPDATE `member` SET `biz_alert_time` = '$time', `biz_alert` = '1' WHERE `member`.`id` = '$member->id'";
                                                                    $mysqli->query($sql);
                                                                }
                                                                //echo '<br/>';
                                                                //echo $member->name; 
                                                                //echo '<br/>';

                                                                if ($member->biz_alert_time >= 1) {
                                                                } else {

                                                                    $sql = "UPDATE `member` SET `biz_alert_time` = '$time', `biz_alert` = '1' WHERE `member`.`id` = '$member->id'";
                                                                    $mysqli->query($sql);
                                                                }



                                                                echo  ' <br/>' . date('d-m-y h:i A', $member2->biz_alert_time) .  ' - একটিভ';
                                                            }
                                                            ?>
                                        </th>
                                        <th class="sky table-text"
                                            style="background-color:#C08B18; cursor: pointer; border-right:#1D202D solid 2px; color:white; font-size:14px; width:25%; border-radius: 15px; vertical-align: middle;">
                                            বিজমাষ্টার- <?php echo $refer_count; ?> <br> <?php if ($refer_count >= 25) {
                                                                                                echo 'একটিভ';
                                                                                            } ?>
                                        </th>
                                        <th class="blue table-text"
                                            style="background-color:#149E6B; cursor: pointer; border-right:#1D202D solid 2px; color:white; font-size:14px; width:25%; border-radius: 15px; vertical-align: middle;">
                                            রির্জাভ প্রোডক্ট <br> <?php

                                                                    echo $res_product;
                                                                    ?>
                                        </th>
                                        <th class="green table-text"
                                            style="background-color:#954043; cursor: pointer; border-right:#1D202D solid 2px; color:white; font-size:14px; width:25%; border-radius: 15px; vertical-align: middle;">
                                            মাইনাস প্রোডাক্ট <br /> <?php echo $qtyb; ?>
                                        </th>

                                    </tr>
                                </thead>
                            </table>
                            <?php
                            require_once('counting-level.php');
                            $level1 = array_filter($level1_ids, function ($id) use ($member_info) {
                                return isset($member_info[$id]) && $member_info[$id]->biz_alert == 1;
                            });
                            $level2 = array_filter($level2_ids, function ($id) use ($member_info) {
                                return isset($member_info[$id]) && $member_info[$id]->biz_alert == 1;
                            });

                            $level3 = array_filter($level3_ids, function ($id) use ($member_info) {
                                return isset($member_info[$id]) && $member_info[$id]->biz_alert == 1;
                            });

                            $level4 = array_filter($level4_ids, function ($id) use ($member_info) {
                                return isset($member_info[$id]) && $member_info[$id]->biz_alert == 1;
                            });

                            $level5 = array_filter($level5_ids, function ($id) use ($member_info) {
                                return isset($member_info[$id]) && $member_info[$id]->biz_alert == 1;
                            });

                            $totalBizAlertCount = count($level1) + count($level2) + count($level3) + count($level4) + count($level5);
                            ?>

                            <!-- horizontal chart -->
                            <section class="steps">
                                <div class="step-wrapper">
                                    <div class="step step-1 color-cyan" style="color: white; background-color:#12556F;border-radius: 10px">
                                        বিজএলার্ট সংখ্যা-1-2
                                        <?php if ($totalBizAlertCount == 1 || $totalBizAlertCount == 2) {
                                            if ($member2->biz_alert2 == 1) {
                                            } else {

                                                $sql = "UPDATE `member` SET `biz_alert_time2` = '$time', `biz_alert2` = '1' WHERE `member`.`id` = '$member2->id'";
                                                $mysqli->query($sql);
                                            }

                                        ?>
                                            <img src="images/custom/checklist55.png" alt="" style="width: 20px; margin-left:10px">
                                        <?php } ?>
                                        <div class="sub-step color-cyan-sub" style=" background-color:#12556F;">বিস্তারিত
                                        </div>
                                    </div>
                                </div>
                                <div class="step-wrapper">
                                    <div class="step step-2 color-orange"
                                        style="color: white; background-color:#149E6B;border-radius: 10px">
                                        বিজএলার্ট সংখ্যা-3
                                        <?php if ($totalBizAlertCount == 3) {

                                            //echo $member->biz_alert2;

                                            if ($member2->biz_alert3 == 1) {
                                            } else {

                                                $sql = "UPDATE `member` SET `biz_alert_time3` = '$time', `biz_alert3` = '1' WHERE `member`.`id` = '$member2->id'";
                                                $mysqli->query($sql);
                                            }

                                        ?>
                                            <img src="images/custom/checklist55.png" alt="" style="width: 20px; margin-left:10px">
                                        <?php } ?>
                                        <div class="sub-step color-orange-sub" style=" background-color:#149E6B;">বিস্তারিত
                                        </div>
                                    </div>
                                </div>
                                <div class="step-wrapper">
                                    <div class="step step-3 color-brown"
                                        style="color: white; background-color:#954043;border-radius: 10px;">
                                        বিজএলার্ট সংখ্যা-4
                                        <?php

                                        echo $totalBizAlertCount;

                                        if ($totalBizAlertCount >= 4) {



                                            if ($member2->biz_alert4 == 1) {
                                            } else {

                                                $sql = "UPDATE `member` SET `biz_alert_time4` = '$time', `biz_alert4` = '1' WHERE `member`.`id` = '$member2->id'";
                                                $mysqli->query($sql);
                                            }

                                        ?>
                                            <img src="images/custom/checklist55.png" alt="" style="width: 20px; margin-left:10px">
                                        <?php } ?>
                                        <div class="sub-step color-brown-sub" style=" background-color:#954043;">বিস্তারিত
                                        </div>
                                    </div>
                                </div>

                            </section>
                        </div>




                    </nav>
                    <div class="header">
                        <div class="header-step">
                            ক্রয় ব্যবস্থাপনা
                        </div>
                    </div>


                    <section class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>তারিখ</th>
                                    <th>মাস</th>
                                    <th>পরিমান</th>
                                    <th>রিপোর্ট</th>
                                    <th>দেখুন</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($orders as $item) {
                                ?>
                                    <tr>
                                        <td><?= date('d/m/Y', $item->time) ?></td>
                                        <td><?= $banglaMonths[date('M', $item->time)] ?></td>
                                        <td><?= $item->total_qty ?></td>
                                        <td>সম্পর্ন</td>
                                       <td onclick="window.location.href='order-summary.php?order_id=<?= $item->id ?>'" style="cursor:pointer;">দেখুন</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>

        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>