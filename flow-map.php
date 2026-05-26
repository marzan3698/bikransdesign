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
                        style="margin-top: 65px !important; width: 95%; margin: auto; border: 1px solid #222; min-height:calc(100vh - 105px);">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text" style="color: white;">বিজনেস <br> প্রবাহ ম্যাপ
                                </div>
                            </div>
                            <div class="box-img-wrap"">
                                <img src=" images/custom/89.svg" alt="" class="box-img"
                                style="width: 120px; height:auto; padding:15px 5px; ">
                            </div>
                        </div>
                        <?php require_once('counting-level.php'); ?>

                        <table class="table5">
                            <thead>
                                <tr>
                                    <th class="table-text"
                                        style="background:#009999;color:#fff;font-size:14px;cursor:pointer; border-right:#0B2234 solid 1px; color:black">
                                         প্রথম প্রজন্ম <br><?= $counts[0] ?>
                                    </th>
                                    <th class="table-text" style="background:#F26C6D;font-size:14px;cursor:pointer; border-right:#0B2234 solid 1px;">
                                        দ্বিতীয় প্রজন্ম <br><?= $counts[1] ?>
                                    </th>
                                    <th class="table-text" style="background:#8E8E93;font-size:14px;cursor:pointer; border-right:#0B2234 solid 1px;">
                                        তৃতীয় প্রজন্ম <br><?= $counts[2] ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="table-text" style="background:#9966FF;cursor:pointer;font-size:14px; border-right:#0B2234 solid 1px;">
                                        চতুর্থ প্রজন্ম <br><?= $counts[3] ?>
                                    </th>
                                    <th class="table-text" style="background:#CC9900;cursor:pointer;font-size:14px;">
                                        পঞ্চম প্রজন্ম <br><?= $counts[4] ?>
                                    </th>
                                    <th class="table-text"
                                        style="background:#343399;color:#fff !important;cursor:pointer;font-size:14px; border-right:#0B2234 solid 1px; color:black">
                                        ষষ্ঠ প্রজন্ম <br><?= $counts[5] ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="table-text" style="background:#01CB99;cursor:pointer;font-size:14px; border-right:#0B2234 solid 1px;">
                                        সপ্তম প্রজন্ম <br><?= $counts[6] ?>
                                    </th>
                                    <th class="table-text" style="background:#8F8E93;cursor:pointer;font-size:14px; border-right:#0B2234 solid 1px;">
                                        অষ্টম প্রজন্ম <br><?= $counts[7] ?>
                                    </th>
                                    <th class="table-text" style="background:#F16B6C;cursor:pointer;font-size:14px; border-right:#0B2234 solid 1px;">
                                        নবম প্রজন্ম <br><?= $counts[8] ?>
                                    </th>
                                </tr>
                            </thead>
                        </table>

                        <div class="div" style="width: 100%; ">
                            <img style=" width: 40%; height:auto;margin:10vw auto;margin-top:20px; display:block"
                                src="images/custom/88.svg" alt="">
                        </div>
                        <!--bg -->
                        <div class="flow-wrapper ">
                            <div class="flow-frame">
                                <!-- the bg -->
                                <img src="images/custom/probaho-map-222.svg" alt="" class="flow-bg">

                                <!-- 1st -->
                                <div
                                    style="position: absolute; top: 0.7%; left: 50%; color: #12d584;  transform: translateX(-50%);line-height: 1.2;">
                                    <span class="title"> প্রথম প্রজন্ম </span><br>
                                    <span class="title"> ৪০ টাকা কমিশন</span><br>
                                    <span class="sub-text"> প্রতিটি প্যাকেজ বিক্রয়ের বিপরীতে
                                    </span><br>
                                </div>
                                <!-- header -->
                                <a class="my-text"
                                    style="position: absolute; top:5.4%; left: 10%;  color: #0B2234;  transform: translateX(-50%); ">
                                    ১ম প্রজন্ম
                                </a>

                                <a style="position: absolute; top:6.9%; left: 92.4%;  color: white;  transform: translateX(-50%); font-size:13px;"
                                    href="protokkho.php">
                                    দেখুন
                                </a>
                                <!-- 2nd -->
                                <div
                                    style="position: absolute; top: 11.5%; left: 50%; color: #12d584;  transform: translateX(-50%);line-height: 1.2;">
                                    <span class="title"> দ্বিতীয় প্রজন্ম </span><br>
                                    <span class="title"> ৩৫ টাকা কমিশন</span><br>
                                    <span class="sub-text"> প্রতিটি প্যাকের বিক্রয়ের বিপরীতে
                                    </span><br>
                                </div>
                                <a class="my-text"
                                    style="position: absolute; top:16.9%; left: 10%;  color: #0B2234;  transform: translateX(-50%); ">
                                    ২য় প্রজন্ম
                                </a>
                                <a style="position: absolute; top:18.3%; left: 92.4%;  color: white;  transform: translateX(-50%); font-size:13px;"
                                    href="porokkho.php">
                                    দেখুন
                                </a>

                                <!-- 3rd -->
                                <div
                                    style="position: absolute; top: 22.7%; left: 50%; color: #12d584;  transform: translateX(-50%);line-height: 1.2;">
                                    <span class="title"> তৃতীয় প্রজন্ম </span><br>
                                    <span class="title"> ৩০ টাকা কমিশন</span><br>
                                    <span class="sub-text"> প্রতিটি প্যাকের বিক্রয়ের বিপরীতে
                                    </span><br>
                                </div>
                                <a class="my-text"
                                    style="position: absolute; top:28.5%; left: 10%;  color: #0B2234;  transform: translateX(-50%); ">
                                    ৩য় প্রজন্ম
                                </a>
                                <a style="position: absolute; top:29.7%; left: 92.4%;  color: white;  transform: translateX(-50%); font-size:13px;"
                                    href="porobotti.php">
                                    দেখুন
                                </a>
                                <!-- 4th -->
                                <div
                                    style="position: absolute; top: 34.3%; left: 50%; color: #12d584;  transform: translateX(-50%);line-height: 1.2;">
                                    <span class="title"> ৪র্থ প্রজন্ম </span><br>
                                    <span class="title"> ১০ টাকা কমিশন</span><br>
                                    <span class="sub-text"> প্রতিটি প্যাকের বিক্রয়ের বিপরীতে
                                    </span><br>
                                </div>
                                <a class="my-text"
                                    style="position: absolute; top:40.1%; left: 10%;  color: #0B2234;  transform: translateX(-50%); ">
                                    ৪র্থ প্রজন্ম
                                </a>
                                <a style="position: absolute; top:41.8%; left: 92.4%;  color: white;  transform: translateX(-50%); font-size:13px;"
                                    href="probahontor.php">
                                    দেখুন
                                </a>

                                <!-- 5th -->
                                <div
                                    style="position: absolute; top: 46.1%; left: 50%; color: #12d584;  transform: translateX(-50%);line-height: 1.2;">
                                    <span class="title"> ৫ম প্রজন্ম </span><br>
                                    <span class="title"> ১০ টাকা কমিশন</span><br>
                                    <span class="sub-text"> প্রতিটি প্যাকের বিক্রয়ের বিপরীতে
                                    </span><br>
                                </div>
                                <a class="my-text"
                                    style="position: absolute; top:51.7%; left: 10%;  color: #0B2234;  transform: translateX(-50%); ">
                                    ৫ম প্রজন্ম
                                </a>
                                <a style="position: absolute; top:53.3%; left: 92.4%;  color: white;  transform: translateX(-50%); font-size:13px;"
                                    href="safollontor.php">
                                    দেখুন
                                </a>

                                <!-- 6th -->
                                <div
                                    style="position: absolute; top: 57.9%; left: 50%; color: #12d584;  transform: translateX(-50%);line-height: 1.2;">
                                    <span class="title"> ৬ষ্ঠ প্রজন্ম </span><br>
                                    <span class="title"> ১০ টাকা কমিশন</span><br>
                                    <span class="sub-text"> প্রতিটি প্যাকের বিক্রয়ের বিপরীতে
                                    </span><br>
                                </div>
                                <a class="my-text"
                                    style="position: absolute; top:65%; left: 10%;  color: #0B2234;  transform: translateX(-50%); ">
                                    ৬ষ্ঠ প্রজন্ম
                                </a>
                                <a style="position: absolute; top:64.9%; left: 92.4%;  color: white;  transform: translateX(-50%); font-size:13px;"
                                    href="6th.php">
                                    দেখুন
                                </a>

                                <!-- 7th -->
                                <div
                                    style="position: absolute; top: 69.4%; left: 50%; color: #12d584;  transform: translateX(-50%);line-height: 1.2;">
                                    <span class="title"> ৭ম প্রজন্ম </span><br>
                                    <span class="title"> ১০ টাকা কমিশন</span><br>
                                    <span class="sub-text"> প্রতিটি প্যাকের বিক্রয়ের বিপরীতে
                                    </span><br>
                                </div>
                                <a class="my-text"
                                    style="position: absolute; top:74.9%; left: 10%;  color: #0B2234;  transform: translateX(-50%); ">
                                    ৭ম প্রজন্ম
                                </a>
                                <a style="position: absolute; top: 76.4%; left: 92.4%;  color: white;  transform: translateX(-50%); font-size:13px;"
                                    href="7th.php">
                                    দেখুন
                                </a>

                                <!-- 8th -->
                                <div
                                    style="position: absolute; top: 81%; left: 50%; color: #12d584;  transform: translateX(-50%);line-height: 1.2;">
                                    <span class="title"> অষ্টম প্রজন্ম </span><br>
                                    <span class="title"> ১০ টাকা কমিশন</span><br>
                                    <span class="sub-text"> প্রতিটি প্যাকের বিক্রয়ের বিপরীতে
                                    </span><br>
                                </div>
                                <a class="my-text"
                                    style="position: absolute; top:86.6%; left: 10%;  color: #0B2234;  transform: translateX(-50%); ">
                                    ৮ম প্রজন্ম
                                </a>
                                <a style="position: absolute; top: 87.9%; left: 92.4%;  color: white;  transform: translateX(-50%); font-size:13px;"
                                    href="8th.php">
                                    দেখুন
                                </a>

                                <!-- 9th -->
                                <div
                                    style="position: absolute; top: 92.3%; left: 50%; color: #12d584;  transform: translateX(-50%);line-height: 1.2;">
                                    <span class="title"> নবম প্রজন্ম </span><br>
                                    <span class="title"> ১০ টাকা কমিশন</span><br>
                                    <span class="sub-text"> প্রতিটি প্যাকের বিক্রয়ের বিপরীতে
                                    </span><br>
                                </div>
                                <a class="my-text"
                                    style="position: absolute; top:98.1%; left: 10%;  color: #0B2234;  transform: translateX(-50%); ">
                                    ৯ম প্রজন্ম
                                </a>
                                <a style="position: absolute; top:99.5%; left: 92.4%;  color: white;  transform: translateX(-50%); font-size:13px;"
                                    href="9th.php">
                                    দেখুন
                                </a>


                            </div>


                        </div>


                        <!-- footer -->
                        <div style=" width: 85%; margin:auto;padding:25px 3px">
                            <p class="footer-subtitle" style="text-align: center;color:white;">
                                বীজস্তরের সাহস থেকে বৃদ্ধিস্তরের বিকাশ, ফলনস্তরের প্রাচুর্য পেরিয়ে প্রবাহন্তরের
                                ধারাবাহিকতা—এই পথেই সফল্যস্তর হয় নিশ্চিত, অদম্য আর অনিবার্য।</-><br>

                        </div>
                        <style>
                            .flow-wrapper {
                                display: flex;
                                justify-content: center;
                                margin: 20px 0;
                            }

                            .flow-frame {
                                position: relative;
                                width: 90%;
                                max-width: 600px;
                            }

                            .flow-bg {
                                width: 100%;
                                height: auto;
                                display: block;
                            }


                            /* header */
                            .header {
                                font-size: 11.7px;
                                color: #0B2234;
                            }

                            /* all icons and text */
                            .header-icon {
                                position: absolute;
                                top: 10.5%;
                                left: 41%;
                                width: 13vw;
                                min-width: 28px;
                            }

                            .header-text {
                                position: absolute;
                                top: 14%;
                                left: 48.5%;
                                transform: translateX(-50%);
                                text-align: center;
                                width: 40%;
                            }

                            .flow-icon {
                                position: absolute;
                                top: 31%;
                                left: 20%;
                                width: 5vw;
                                min-width: 14px;

                            }

                            .flow-text {
                                position: absolute;
                                top: 10%;
                                left: 12%;
                                transform: translateX(-50%);
                                text-align: center;
                                width: 40%;
                                color: #12d584;
                            }

                            .flow-icon2 {
                                position: absolute;
                                top: 50%;
                                left: 21%;
                                width: 5vw;
                                min-width: 14px;

                            }

                            .flow-text2 {
                                position: absolute;
                                top: 31%;
                                left: 12%;
                                transform: translateX(-50%);
                                text-align: center;
                                width: 40%;
                                color: #12d584;
                            }

                            .flow-icon3 {
                                position: absolute;
                                top: 70%;
                                left: 20%;
                                width: 5vw;
                                min-width: 14px;

                            }

                            .flow-text3 {
                                position: absolute;
                                top: 53%;
                                left: 12%;
                                transform: translateX(-50%);
                                text-align: center;
                                width: 40%;
                                color: #12d584;
                            }

                            .flow-text4 {
                                position: absolute;
                                top: 75%;
                                left: 12%;
                                transform: translateX(-50%);
                                text-align: center;
                                width: 40%;
                                color: #12d584;
                            }

                            .flow-text5 {
                                position: absolute;
                                top: 97%;
                                left: 12%;
                                transform: translateX(-50%);
                                text-align: center;
                                width: 40%;
                                color: #12d584;
                            }




                            .title {
                                font-size: 5.2vw;
                                font-weight: bold;

                            }

                            .sub-text {
                                font-size: 3.2vw;
                                color: #f8eaea;
                            }

                            .subtitle {
                                font-size: 3vw;
                                font-weight: normal;


                            }

                            .footer-subtitle {
                                font-size: 2.5vw;
                                font-weight: normal;
                                color: white;
                                line-height: 1.3;

                            }

                            @media (min-width: 768px) {
                                .title {
                                    font-size: 18px;
                                }

                                .subtitle {
                                    font-size: 14px;
                                }

                                .footer-subtitle {
                                    font-size: 14px;
                                }

                            }

                            .my-text {
                                font-size: 3vw;
                            }
                        </style>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>