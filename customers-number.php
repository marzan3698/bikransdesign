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
                                <div class="box-text">গ্রাহক <br> সংক্রান্ত তথ্য
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/86.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <?php 
                        require_once('counting-level.php');
                        $totalCount = $counts[0] + $counts[1] + $counts[2] + $counts[3] + $counts[4];
                        ?>
                        <table class="table3" style="margin-bottom: 3px;;">
                            <thead>
                                <tr>
                                    <th class="black" style="color: #2ecc71"> সর্ব মোট গ্রাহক-  <?= $totalCount ?> </th>
                                    <th class="ash" style="color: #0B2234;" onclick="window.location.href='talika.php'">ব্যাক্তিগত রেফার তথ্য</th>

                                </tr>
                            </thead>
                        </table>

                        <table class="table4" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th class="ash" style="font-size: 12px;border: 1px solid #0B2234;border-right: 0px">স্তরভিত্তিক গ্রাহক </th>
                                    <th class="ash" style=" font-size: 12px;border: 1px solid #0B2234;border-right: 0px">গ্রাহক সংখ্যা</th>
                                    <th class="ash" style="font-size: 12px;border: 1px solid #0B2234;">তথ্য</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="color: black;">প্রথম বীজস্তর</td>
                                    <td style="color: black;"><?= $counts[0] ?></td>
                                    <td style="color: black;">তথ্য</td>
                                </tr>
                                <tr>
                                    <td style="color: black;">দ্বিতীয় বৃদ্ধিস্তর</td>
                                    <td style="color: black;"><?= $counts[1] ?></td>
                                    <td style="color: black;">তথ্য</td>
                                </tr>
                                <tr>
                                    <td style="color: black;">তৃতীয় ফলনস্তর</td>
                                    <td style="color: black;"><?= $counts[2] ?></td>
                                    <td style="color: black;">তথ্য</td>
                                </tr>
                                <tr>
                                    <td style="color: black;">চতুর্থ প্রবাহস্তর</td>
                                    <td style="color: black;"><?= $counts[3] ?></td>
                                    <td style="color: black;">তথ্য</td>
                                </tr>
                                <tr>
                                    <td style="color: black;">পঞ্চম সাফল্যস্তর</td>
                                    <td style="color: black;"><?= $counts[4] ?></td>
                                    <td style="color: black;">তথ্য</td>
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