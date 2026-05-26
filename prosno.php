<?php
    require_once('sadmin/config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
    <link href="images/apple-touch-startup-image-320x460.png" media="(device-width: 320px)"
        rel="apple-touch-startup-image">
    <link href="images/apple-touch-startup-image-640x920.png"
        media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/framework7.css">
    <link rel="stylesheet" href="style.css">
    <link href="css/buy_product.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/swipebox.css" />
    <link type="text/css" rel="stylesheet" href="css/animations.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">

    <style>
        * {
            font-family: 'SolaimanLipi', sans-serif !important;
        }
    </style>
</head>

<body id="mobile_wrap">
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
    <style>
        /* .main-nav {
    overflow-x: auto;
    white-space: nowrap;
    min-width: 700px; 
}

.main-nav > div {
    white-space: normal; 
} */
        .cus-in-11 {
            width: 100%;
            padding: 10px;
            border: 1px solid #4E87A7;
            margin-top: 3px;
            box-sizing: border-box;
            overflow-x: auto;
            white-space: nowrap;
            text-overflow: clip;
        }
        .input-scroll-wrapper {
            overflow-x: auto;
            white-space: nowrap;
            width: 100%;
        }
        .cus-select-111{
            width: 100%;
            padding: 10px;
            border: 1px solid #4E87A7;
            margin-top: 3px;
            box-sizing: border-box;
            font-size: 14px;
            white-space: nowrap;
            overflow-x: auto;
            text-overflow: clip;
        }
        .img-preview{
            width: 90%;
            height: 150px;
            border: 1px solid #4E87A7;
            color: #4E87A7;
            font-weight: 600;
            padding: 5px;
            margin-top: 3px;
            text-align: center;
            position: relative;
        }
    </style>
    <style>
        
    </style>


        <div class="pages">

            <div data-page="index" class="page homepage" style="background-color: #fff !important;">
                <div class="page-content homepagecontent">

                    <nav class="main-nav" style="margin-top: 10px !important; width: 95%; margin: auto; border: 1px solid #0B2234; min-height:86vh;">
                        <div style="width: 95%;display:block;margin:auto;margin-top:10px">

                            <div id="div1" style="background: #4E87A7; color: #fff; padding: 8px; font-size: 18px; margin-top: 8px; position: relative; text-align: center;">
                                 অর্থের দুশ্চিন্তা মুক্ত হোন
                            </div>
                            <br>
                            <?php
                                if(isset($_POST['submit'])){
                                    $user_id = $_POST['user_id'];
                                    $exitsCheck = QB::table('question')->where('user_id', $user_id)->first();
                                    if($exitsCheck){
                                        echo "<p style='color: red;'>আপনি ইতিমধ্যে তথ্য জমা দিয়েছেন</p>";
                                        die();
                                    } 
                                    if(empty($user_id)){
                                        echo "<p style='color: red;'>বিক্র্যান্স আইডি অথবা ফোন নম্বর দিয়ে তথ্য লোড করুন</p>";
                                    } else {
                                    // Save to database
                                    QB::table('question')->insert([
                                        'user_id' => $user_id,
                                        'time' => time(),
                                        'a1' => $_POST['a1'],
                                        'a2' => $_POST['a2'],
                                        'a3' => $_POST['a3'],
                                        'a4' => $_POST['a4'],
                                        'a5' => $_POST['a5'],
                                        'a6' => $_POST['a6'],
                                        'a7' => $_POST['a7'],
                                        'a8' => $_POST['a8'],
                                        'a9' => $_POST['a9'],
                                        'a10' => $_POST['a10'],
                                        'a11' => $_POST['a11'],
                                        'a12' => $_POST['a12'],
                                        'a13' => $_POST['a13'],
                                        'a14' => $_POST['a14'],
                                        'a15' => $_POST['a15'],
                                        'a16' => $_POST['a16'],
                                        'a17' => $_POST['a17'],
                                        'a18' => $_POST['a18'],
                                        'a19' => $_POST['a19'],
                                        'a20' => $_POST['a20'],
                                        'a21' => $_POST['a21'],
                                        'a22' => $_POST['a22'],
                                        'a23' => $_POST['a23'],
                                        'a24' => $_POST['a24'],
                                        'a25' => $_POST['a25'],
                                        'a26' => $_POST['a26'],
                                        'a27' => $_POST['a27'],
                                        'a28' => $_POST['a28'],
                                        'a29' => $_POST['a29'],
                                        'a30' => $_POST['a30'],
                                        'a31' => $_POST['a31'],
                                        'a35' => $_POST['a35'],
                                        'a36' => $_POST['a36'],
                                        'a37' => $_POST['a37'],
                                        'a38' => $_POST['a38'],
                                        'a39' => $_POST['a39'],
                                        'a40' => $_POST['a40'],
                                        'a41' => $_POST['a41'],
                                        'a42' => $_POST['a42'],
                                        'a43' => $_POST['a43'],
                                        'a44' => $_POST['a44'],
                                        'a45' => $_POST['a45'],
                                        'a46' => $_POST['a46'],
                                        'a47' => $_POST['a47'],
                                        'a48' => $_POST['a48'],
                                        'a49' => $_POST['a49'],
                                        'a50' => $_POST['a50'],
                                        'a51' => $_POST['a51'],
                                        'a52' => $_POST['a52'],
                                        'a53' => $_POST['a53'],
                                        'a54' => $_POST['a54'],
                                        'a55' => $_POST['a55'],
                                        'a56' => $_POST['a56'],
                                        'a57' => $_POST['a57'],
                                        'a58' => $_POST['a58'],
                                        'a59' => $_POST['a59'],
                                        'a60' => $_POST['a60'],
                                        'a61' => $_POST['a61'],
                                        'a62' => $_POST['a62'],
                                        'a63' => $_POST['a63'],
                                    ]);
                                    echo "<p style='color: green;'>তথ্য সফলভাবে সংরক্ষণ করা হয়েছে</p>";
                                    }
                                }
                            ?>
                            <form action="" method="post">
                                <?php
                                    $member = QB::table('member')->where('id', $_SESSION['user_id'])->first();
                                ?>
                                <input type="hidden" name="user_id" id="user_id" value="<?= $member->id ?>" required readonly>
                                <div style="display: flex;gap: 10px;">
                                    <div style="width: 60%;">
                                        <span id="userResult"></span>
                                        <input type="text" name="" placeholder="নাম :" id="name" value="<?= $member->name ?>" class="cus-in-11" autocomplete="off" readonly>
                                        <input type="text" name="" placeholder="আইডি :" id="bikransID" value="<?= $member->username ?>" class="cus-in-11" autocomplete="off" readonly>
                                        <input type="text" name="" placeholder="হোয়াটসাব নম্বর" id="number" value="<?= $member->whatsapp ?>" class="cus-in-11" autocomplete="off" readonly>
                                        <div style="display: flex; gap: 10px;">
                                            <div style="width: 50%;">
                                                <select name="a1" class="cus-select-111">
                                                    <option value="">লিঙ্গ :</option>
                                                    <option value="নারী">নারী</option>
                                                    <option value="পুরুষ">পুরুষ</option>
                                                </select>
                                            </div>
                                            <div style="width: 50%;">
                                                <select name="a2" class="cus-select-111">
                                                    <option value="">বৈবাহিক :</option>
                                                    <option value="বিবাহিত">বিবাহিত</option>
                                                    <option value="অবিবাহিত">অবিবাহিত</option>
                                                    <option value="ডিভোর্স">ডিভোর্স</option>
                                                    <option value="ডিভোর্সড">ডিভোর্সড</option>
                                                    <option value="বিপত্নীক">বিপত্নীক</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width: 40%;">
                                        <div class="img-preview">
                                            <img id="previewImage" src="<?= $member->image ?>" alt="" style="width:100%; height:100%; object-fit:cover;">
                                        </div>
                                    </div>
                                </div>
                                <div style="width: 100%;height: 2px;background: #4E87A7;margin:10px 0"></div>
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a3" placeholder="বয়স :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 25%;">
                                        <input type="text" name="a4" placeholder="উচ্চতা" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 25%;">
                                        <input type="text" name="a5" placeholder="ওজন" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>
                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a6" placeholder="শিক্ষা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a7" placeholder="স্কিল :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>
                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a8" placeholder="ট্রেনিং :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a9" placeholder="স্থায়ী ঠিকানা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>
                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a10" placeholder="বর্তমান ঠিকানা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 25%;">
                                        <input type="text" name="a11" placeholder="পূর্ব পেশা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 25%;">
                                        <input type="text" name="a12" placeholder="বর্তমান পেশা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>
                                <!-- ========================================================================
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a13" placeholder="পেশাগত প্রশিক্ষণ যদি থাকে" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a14" placeholder="স্থায়ী ঠিকানা" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div> -->
                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a15" placeholder="পূর্ব আয় :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a16" placeholder="বর্তমান আয় :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>
                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a17" placeholder="মাসিক ব্যয় :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a18" placeholder="ব্যয় ট্র্যাকিং :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>
                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a19" placeholder="পূর্ব সঞ্চয় :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a20" placeholder="সঞ্চয় পরিমাণ :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>
                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a21" placeholder="বর্তমান সঞ্চয় :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a22" placeholder="পূর্ব ঋণ :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a23" placeholder="বর্তমান ঋণ" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a24" placeholder="স্থায়ী কোন ইনকাম" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a25" placeholder="পরিশোধ পদ্ধতি :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a26" placeholder="সম্পদ :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a27" placeholder="স্থায়ী আয় :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a28" placeholder="পারিবারিক দায়িত্ব :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a29" placeholder="সন্তান সংখ্যা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 25%;">
                                        <input type="text" name="a30" placeholder="সন্তান বয়স :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 25%;">
                                        <input type="text" name="a35" placeholder="সন্তান শিক্ষা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <!-- <div style="width: 25%;">
                                        <input type="text" name="a31" placeholder="ছেলে সন্তানের বয়স" class="cus-in-11" autocomplete="off">
                                    </div> -->
                                </div>


                                 <!-- ======================================================================== -->
                                <!-- <div style="display: flex;gap: 2px;">
                                    
                                    <div style="width: 25%;">
                                        <input type="text" name="a36" placeholder="মেয়ে সন্তানের ক্লাস" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 25%;">
                                        <input type="text" name="a37" placeholder="ছেলে সন্তানের ক্লাস" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div> -->

                                 <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a38" placeholder="অতিরিক্ত সহায়তা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a39" placeholder="কাজ সময় :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                 <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a40" placeholder="ঘুম সময় :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a41" placeholder="স্ক্রিন টাইম ব্যয়:" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                 <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a42" placeholder="ব্যায়াম :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a43" placeholder="ইবাদত :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                 <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a44" placeholder="মেডিটেশন :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a45" placeholder="অতিরিক্ত আয় :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                 <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a46" placeholder="মানসিক অবস্থা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a47" placeholder="শারীরিক সমস্যা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                 <!-- ======================================================================== -->
                                <!-- <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a48" placeholder="মানসিক অবস্থা (চিন্তা/স্ট্রেস/সুখ/দুঃখ)" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a49" placeholder="শারীরিক সমস্যা/রোগ আছে কি" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div> -->

                                 <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a50" placeholder="অভ্যাস/আসক্তি :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a51" placeholder="অন্যান্য সমস্যা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                 <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a52" placeholder="অভ্যাস/(ধূমপান/মদ/ড্রাগ/অন্য)" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a53" placeholder="বই পড়া :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                 <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a54" placeholder="সামাজিক অবস্থান :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a55" placeholder="সন্তান ভবিষ্যৎ :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a56" placeholder="বার্ষিক আয়:" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a57" placeholder="আয় বৃদ্ধি ইচ্ছা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a58" placeholder="আর্থিক লক্ষ্য :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a59" placeholder="অর্থ পরিকল্পনা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a60" placeholder="দৈনিক ফোকাস :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a61" placeholder="নিজেকে কতটা উন্নত করতে চান" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                <!-- ======================================================================== -->
                                <div style="display: flex;gap: 2px;">
                                    <div style="width: 50%;">
                                        <input type="text" name="a62" placeholder="১০ ঘন্টা কর্ম পরিকল্পনা :" class="cus-in-11" autocomplete="off">
                                    </div>
                                    <div style="width: 50%;">
                                        <input type="text" name="a63" placeholder="মন্তব্য :" class="cus-in-11" autocomplete="off">
                                    </div>
                                </div>

                                <button type="submit" name="submit" style="width: 100%; border: none; padding: 10px; margin: 20px 0; background: #12E586;">সাবমিট করুন</button>
                                
                            </form>


                        </div>
                      
                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>

