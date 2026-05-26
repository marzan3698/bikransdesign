<?php 
require_once('header.php');
$days = [
    'Sunday' => 'রবিবার',
    'Monday' => 'সোমবার',
    'Tuesday' => 'মঙ্গলবার',
    'Wednesday' => 'বুধবার',
    'Thursday' => 'বৃহস্পতিবার',
    'Friday' => 'শুক্রবার',
    'Saturday' => 'শনিবার'
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
                                <div class="box-text">টাকা উত্তোলন <br> সংক্রান্ত তথ্য
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/21.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <table class="table4">
                            <thead>
                                <tr>
                                    <?php
                                        $totalCashOut = QB::table('withdraw_request')
                                            ->select(QB::raw('SUM(amount) as total'))
                                            ->where('user_id', $_SESSION['user_id'])
                                            ->first();

                                        $totalCashOut = $totalCashOut->total ?? 0;
                                    ?>
                                    <th class="ash" style="border-right: white solid 1px;">এযাবৎ উত্তোলন টাকা-<?= $totalCashOut ?? 0 ?>
                                    </th>
                                    <th class="black">উত্তোলন যোগ্য টাকা-<?= $member->balance ?></th>

                                </tr>
                            </thead>
                        </table>
                        <?php
                            $data = QB::table('withdraw_request')->where('user_id', $_SESSION['user_id'])->get();
                        ?>
                        <table class="table4">
                            <thead>
                                <tr>
                                    <th class="black" style="font-size: 12px; border-right: white solid 1px;">তারিখ
                                    </th>
                                    <th class="ash" style=" font-size: 12px; border-right: white solid 1px;">দিন</th>
                                    <th class="ash" style=" font-size: 12px; border-right: white solid 1px;">আয়ের
                                        মাধ্যম</th>
                                    <th class="black" style="font-size: 12px; border-right: white solid 1px;"> স্টেটাস
                                        টাকা</th>
                                        <th class="black" style="font-size: 12px; border-right: white solid 1px;"> উত্তোলন</th>
                                    <th class="ash" style="font-size: 12px;">তথ্য</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($data as $key => $value) {
                                    $day = date('l', $value->time); 
                                    $bangla_day = $days[$day];
                                ?>   
                                    <tr>
                                        <td style="color:black;"><?= date('d-m-Y', $value->time) ?></td>
                                        <td style="color:black;"><?= $bangla_day ?></td>
                                        <td style="color:black;">
                                            <?php
                                                if($value->withdraw_type == 'bkash'){
                                                    echo 'বিকাশ';
                                                }elseif($value->withdraw_type == 'nogod'){
                                                    echo 'নগদ';
                                                }elseif($value->withdraw_type == 'bank'){
                                                    echo 'ব্যাংক';
                                                }
                                            ?>
                                        </td>
                                        <td style="color:black;"><?= $value->amount ?></td>
                                        <td style="color:black;">
                                            <?php
                                                if($value->status == 1){
                                                    echo 'পেন্ডিং';
                                                }elseif($value->status == 2){
                                                    echo 'অপ্প্রভ';
                                                }
                                            ?>
                                        </td>
                                        <td style="color:black;">
                                           <a href="withdraw-voucher.php?id=<?= $value->id ?>">তথ্য</a> 
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>