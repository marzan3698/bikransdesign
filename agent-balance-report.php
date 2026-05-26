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
                        <div style="background: #00CC99; padding: 12px; color: #fff; text-align: center; font-size: 22px;">এজেন্ট ব্যালেন্স রিপোর্ট</div>
                        <?php
                            $data = QB::table('agent_balance_reqest')->where('user_id', $_SESSION['user_id'])->get();
                            $sl = 1;
                        ?>                       
                        <table>
                            <tr>
                                <td style="background: transparent;border:1px solid #fff">নং</td>
                                <td style="background: transparent;border:1px solid #fff">ব্যালেন্স গ্রহন তারিখ</td>
                                <td style="background: transparent;border:1px solid #fff">ব্যালেন্স পরিমান</td>
                                <td style="background: transparent;border:1px solid #fff">সফলভাবে জমা</td>
                            </tr>
                            <?php foreach($data as $row){ ?>
                                <tr>
                                    <td style="background: transparent;border:1px solid #fff"><?= $sl++ ?></td>
                                    <td style="background: transparent;border:1px solid #fff"><?= date('d-m-Y', strtotime($row->date)) ?> Time-<?= date('h:i:A', strtotime($row->time2))  ?></td>
                                    <td style="background: transparent;border:1px solid #fff"><?= $row->amount ?></td>
                                    <td style="background: transparent;border:1px solid #fff">
                                        <?php 
                                            if($row->status == 1){
                                                echo '<div style="color:green">অর্থ জমা হয়েছে</div>';
                                            }elseif($row->status == 0){
                                                echo '<div style="color:red">অর্থ জমা হয়নি</div>';
                                            }elseif($row->status == 2){
                                                echo '<div style="color:red">রিজেক্ট করা হয়েছে</div>';
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