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
            <style>
                .table4{
                    border-collapse: collapse;
                    border-spacing: 0;
                }
            </style>

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
                                <div class="box-text">মোট কমিশন<br> সংক্রান্ত তথ্য
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/18.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <input type="text" placeholder="ইনকাম জানতে তারিখ মাস নম্বর দিয়ে সার্চ করুন" style="padding: 10px; width: 90%; display: block; margin: auto; background: transparent; border: 1px solid #2ecc71; text-align: center; margin-bottom: 10px;">
                        <table class="table4">
                            <thead>
                                <tr>

                                    <th class="ash">মোট টিম কর্মী সংখ্যা-900 </th>
                                    <th class="black">সর্ব  মোট আয়- <?php $total = QB::query("
    SELECT IFNULL(SUM(cradit),0) as total_credit
    FROM user_transection
    WHERE user_id = '{$_SESSION['user_id']}'
    AND his = 51
")->first();

$total2 = QB::query("
    SELECT IFNULL(SUM(cradit),0) as total_credit
    FROM user_transection_biz_a
    WHERE user_id = '{$_SESSION['user_id']}'
    AND his = 659
")->first();

$result = $queryBuilder->table('gen_his')
    ->where('type', 2)
    ->where('to_id', $_SESSION['user_id'])
    ->select($queryBuilder->raw('SUM(amount) as total_amount'))
    ->first();

$totalAmount = $result->total_amount ?? 0;


echo number_format($total->total_credit+$totalAmount+$total2->total_credit,2); ?></th>

                                </tr>
                            </thead>
                        </table>

                        <table class="table4">
                            <thead>
                                <tr>
                                    <th class="ash" style="font-size: 12px; border: 1px solid #0B2234;border-right: 0px">তারিখ </th>
                                    <th class="ash" style=" font-size: 12px; border: 1px solid #0B2234;border-right: 0px">দিন</th>
                                    <th class="ash" style=" font-size: 12px; border: 1px solid #0B2234;border-right: 0px">মাস</th>
                                    <th class="ash" style=" font-size: 12px; border: 1px solid #0B2234;border-right: 0px">আয়</th>
                                    <th class="ash" style="font-size: 12px; border: 1px solid #0B2234">তথ্য</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="color:black;">7-8-2026</td>
                                    <td style="color:black;">শনিবার</td>
                                    <td style="color:black;">মার্চ</td>
                                    <td style="color:black;">70032</td>
                                    <td style="color:black;">তথ্য</td>
                                </tr>
                            </tbody>
                        </table>
                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>