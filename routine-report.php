<?php
require_once('sadmin/config.php');
date_default_timezone_set('Asia/Dhaka');
$days = [
    'Sunday' => 'রবিবার',
    'Monday' => 'সোমবার',
    'Tuesday' => 'মঙ্গলবার',
    'Wednesday' => 'বুধবার',
    'Thursday' => 'বৃহস্পতিবার',
    'Friday' => 'শুক্রবার',
    'Saturday' => 'শনিবার'
];

$today = date('l'); // English day name
$banglaDay = $days[$today];
function banglaDay($day){
    $bn = [
        '01' => '০১', '02' => '০২', '03' => '০৩', '04' => '০৪',
        '05' => '০৫', '06' => '০৬', '07' => '০৭', '08' => '০৮',
        '09' => '০৯', '10' => '১০', '11' => '১১', '12' => '১২',
        '13' => '১৩', '14' => '১৪', '15' => '১৫', '16' => '১৬',
        '17' => '১৭', '18' => '১৮', '19' => '১৯', '20' => '২০',
        '21' => '২১', '22' => '২২', '23' => '২৩', '24' => '২৪',
        '25' => '২৫', '26' => '২৬', '27' => '২৭', '28' => '২৮',
        '29' => '২৯', '30' => '৩০', '31' => '৩১',
    ];

    return $bn[$day] ?? $day;
}
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

        select {
            background-color: transparent;
            border: none;
        }

        .table-responsive-custom {
            width: 100%;
            overflow-x: auto;
        }

        .custom-table {
            min-width: 800px;
            /* important for horizontal scroll */
            border-collapse: collapse;
        }

        .custom-table td {
            padding: 10px;
            border: 1px solid #ddd;
            white-space: nowrap;
            /* prevents word break */
            text-align: left;
        }

        .custom-table tr:nth-child(odd) td {
            background-color: #33CCCC;
        }

        .custom-table tr:nth-child(even) td {
            background-color: #CCCCFF;
        }

        select {
            width: 100%;
        }

        input {
            background: #fff;
            /* transparent background */
            border: 1px solid rgba(34, 34, 34, 0.3);
            /* হালকা border */
            border-radius: 5px;
            padding: 6px 10px !important;
            color: #0B2234;
            backdrop-filter: blur(4px);
            /* glass effect */
        }

        input::placeholder {
            color: rgba(11, 34, 52, 0.8);
        }

        .submit-btn {
            width: 100%;
            padding: 8px;
            background: #27ae60;
            border: none;
            font-size: 16px;
            color: #fff;
            margin-bottom: 20px;
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



            <div class="pages">

                <div data-page="index" class="page homepage" style="background-color: #fff !important;">
                    <div class="page-content homepagecontent">
                        <style>
                            .large-card{
                                margin-top: 10px;
                                text-align: center;
                                font-size: 20px;
                                color: #fff;
                                padding: 30px 20px;
                                border-radius: 10px;
                                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                                transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                                width: 50%;
                            }
                            .small-card{
                                margin-top: 10px;
                                text-align: center;
                                font-size: 20px;
                                color: #fff;
                                padding: 10px 20px;
                                border-radius: 10px;
                                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                                transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                                width: 50%;
                            }
                            .small-card2{
                                margin-top: 10px;
                                text-align: center;
                                color: #fff;
                                padding: 10px 20px;
                                font-size: 16px;
                            }
                           .time{
                                background: #fff;
                                color: #000;
                                padding: 5px;
                                border-radius: 5px;
                                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                                font-size: 14px;
                                white-space: nowrap;
                                width: 100%;
                            }
                            .top-bar{
                                display: flex;
                                align-items: center;
                                gap: 0px;
                                margin-top: 10px;
                            }

                        .time-box{
                            flex: 0 0 120px;
                            background: #00CC99;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            padding: 10px;
                        }

                        .date-box{
                            flex: 1;
                            background: #00CC99;
                            color: #fff;
                            font-size: 14px;
                            padding: 15px 10px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            text-align: center;
                        }

                        .time{
                            background: #fff;
                            color: #000;
                            padding: 5px 8px;
                            border-radius: 5px;
                            box-shadow: 0 1px 2px rgba(0,0,0,0.2);
                            font-size: 14px;
                            white-space: nowrap;
                            text-align: center;
                        }
                            textarea{
                                width: 100%;
                                border-radius: 0;
                                border: 1px solid #000;
                                padding: 10px;
                                box-sizing: border-box;
                            }
                            .submitBtn{
                                background-color: #666699;
                                width: 100%;
                                border: none;
                                padding: 10px;
                                font-size: 20px;
                                color: #fff;
                            }
                            table tr td{
                                background-color: #00CC99 !important;
                                padding: 10px;
                            }
                            table tr th{
                                background-color: #00CC99 !important;
                                padding: 10px;
                            }
                            .table-2 tr td{
                                background-color: #33CCCC !important;
                                padding: 10px;
                            }
                            .table-2 tr th{
                                background-color: #33CCCC !important;
                                padding: 10px;
                            }

                            .table-3 tr td{
                                background-color: #3399FF !important;
                                padding: 10px;
                            }
                            .table-3 tr th{
                                background-color: #3399FF !important;
                                padding: 10px;
                            }
                            #preloader {
                                position: fixed;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background: #ffffff;
                                z-index: 9999;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                transition: opacity 0.5s ease;
                            }

                            .loader-content {
                                text-align: center;
                            }

                            .loader-content img {
                                width: 120px;
                            }

                            .loader-text {
                                display: block;
                                margin-top: 15px;
                                font-size: 18px;
                                color: green;
                                font-weight: 600;
                            }

                            /* fade out */
                            #preloader.hide {
                                opacity: 0;
                                pointer-events: none;
                            }
                            
                        </style>



                        <nav class="main-nav" style="margin-top: 10px !important; width: 95%; margin: auto; border: 1px solid #0B2234; min-height:86vh;">
                            <div style="width: 95%;display:block;margin:auto;margin-top:10px">
                                <img src="images/custom/shopno.png" alt="" class="box-img" style="width: 100%;">
                                <?php if(!isset($_GET['daily']) && !isset($_GET['weekly']) && !isset($_GET['monthly'])){ ?>
                                <div id="div1" style="background: #808000; color: #fff; padding: 5px; font-size: 15px; margin-top: 8px; position: relative; text-align: center;">
                                    স্বপ্ন পূরণের জন্য টার্গেট জরুরী কেন
                                    <span style="position: absolute; right: 15px;"><img src="images/custom/angle-right-solid.svg" alt="" width="8px"></span>
                                </div>

                                <div id="div2" style="background: #CC9900; color: #fff; padding: 5px; font-size: 15px; margin-top: 8px; border-radius: 10px; position: relative; text-align: center;">
                                    স্বপ্ন পূরণের জন্য টার্গেট যেভাবে সম্পন্ন হয়
                                    <span style="position: absolute; right: 15px;"><img src="images/custom/angle-right-solid.svg" alt="" width="8px"></span>
                                </div>

                                <div id="div3" style="background: #A9C09A; color: #222; padding: 5px; font-size: 15px; margin-top: 8px; border-radius: 10px; position: relative; text-align: center;">
                                    স্বপ্ন পূরণের জন্য নির্ধারিত যে কাজ করবেন
                                    <span style="position: absolute; right: 15px;"><img src="images/custom/angle-right-solid.svg" alt="" width="8px"></span>
                                </div>
                                
                                <div style="display: flex;gap:10px">
                                    <div style="background: #00CC99" class="large-card" onclick="window.location.href='routine-report.php?daily'">
                                        প্রতিদিন
                                    </div>
                                    <div style="background: #33CCCC" class="large-card" onclick="window.location.href='routine-report.php?weekly'">
                                        সাপ্তাহিক
                                    </div>
                                </div>

                                <div style="display: flex;gap:10px">
                                    <div style="background: #00CC99" class="small-card">
                                        আজকের কাজ
                                    </div>
                                    <div style="background: #33CCCC" class="small-card">
                                        সাপ্তাহিক কাজ
                                    </div>
                                </div>

                                <div style="display: flex;gap:10px">
                                    <div style="background: #666699" class="large-card" onclick="window.location.href='routine-report.php?monthly'">
                                        মাসিক
                                    </div>
                                    <div style="background: #3399FF" class="large-card">
                                        বাৎসরিক
                                    </div>
                                </div>

                                <div style="display: flex;gap:10px">
                                    <div style="background: #00CC99" class="small-card">
                                        মাসিক কাজ
                                    </div>
                                    <div style="background: #33CCCC" class="small-card">
                                        বাৎসরিক কাজ
                                    </div>
                                </div>
                                <br><br>
                                <?php } ?>

                               <?php
                                if (isset($_POST['submit'])) {

                                    $time = time();
                                    $user_id = $_SESSION['user_id'];
                                    $note = $_POST['note'];
                                    $type = $_POST['type'];

                                    // আজকের start & end time
                                    $start = strtotime("today 00:00:00");
                                    $end   = strtotime("today 23:59:59");

                                    // আগে check করি আজকের কোনো data আছে কিনা
                                    $exists = QB::table('target')
                                        ->where('user_id', $user_id)
                                        ->where('type', $type)
                                        ->whereBetween('time', $start, $end)
                                        ->first();

                                    if ($exists) {
                                        echo "<div style='text-align: center; color: red; font-size: 20px;'>আজকের জন্য ইতিমধ্যে ডাটা দেয়া হয়েছে</div>";
                                    } else {

                                        $insert = QB::table('target')->insert([
                                            'time' => $time,
                                            'user_id' => $user_id,
                                            'type' => $type,
                                            'note' => $note,
                                        ]);

                                        if ($insert) {
                                            echo '<div id="preloader">
                                                    <div class="loader-content">
                                                        <img src="https://cdn-icons-gif.flaticon.com/17702/17702110.gif" alt="Loading...">
                                                        <span class="loader-text">তথ্য সফলভাবে সংরক্ষিত হয়েছে</span>
                                                    </div>
                                                </div>';

                                            echo "<script>
                                                    setTimeout(function () {
                                                        window.location.href = 'routine-report.php?$type';
                                                    }, 2000);
                                                </script>";
                                        }
                                    }
                                }
                                ?>
      
                                <?php if(isset($_GET['daily'])){ ?>
                                <!-- ========================================================== -->
                                <div style="display: flex;gap:10px">
                                    <div style="width:100%; background: #00CC99;border-radius:0px;padding:40px 10px" class="large-card">
                                        প্রতিদিন টার্গেট ২৪ ঘন্টা
                                    </div>
                                </div>

                                <div style="display: flex;gap:10px">
                                    <div style="width:100%; background: #00CC99;" class="small-card">
                                        অফিসিয়াল কাজের টার্গেট 
                                    </div>
                                </div>

                                <div style="display: flex;gap:10px">
                                    <div style="background: #00CC99" class="small-card">
                                        ইনভাইট ৩ জন
                                    </div>
                                    <div style="background: #00CC99" class="small-card">
                                        প্ল্যান শো - ২ জন
                                    </div>
                                </div>

                                <div style="display: flex;gap:10px">
                                    <div style="width:100%; background: #00CC99;" class="small-card">
                                        আজকের আয় - ১৯৬০ টাকা
                                    </div>
                                </div>

                                <div style="display: flex;gap:10px">
                                    <div style="width:100%; background: #666699;border-radius:0px" class="small-card">
                                        কাজের রিপোর্ট জমা দিন
                                    </div>
                                </div>

                                <div class="top-bar">
                                    <div class="time-box">
                                        <div class="time" id="countdown"></div>
                                    </div>
                                    <div class="date-box">
                                        আজ <?= $banglaDay ?> তারিখ <?= date('d-m-Y') ?>
                                    </div>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden" name="type" value="daily"> 
                                    <div style="display: flex;">
                                        <div style="width:100%;padding:0" class="small-card2">
                                            <textarea name="note" id="" rows="8" placeholder="নোট লিখুন............"></textarea>
                                        </div>  
                                    </div>
    
                                     <div style="display: flex;">
                                        <div style="width:100%;padding:0" class="small-card2">
                                            <button type="submit" name="submit" class="submitBtn">জমা দিন</button>
                                        </div>
                                    </div>
                                </form>
                                <div style="display: flex;">
                                    <div style="width:100%;padding:0" class="small-card2">
                                        <?php 
                                            $daily = QB::table('target')
                                                ->where('user_id', $_SESSION['user_id'])
                                                ->where('type', 'daily')
                                                ->get();

                                            $sl = 1;
                                            ?>

                                            <table>
                                                <tr>
                                                    <th>নং</th>
                                                    <th>বার</th>
                                                    <th>তারিখ</th>
                                                    <th>নোট</th>
                                                </tr>

                                                <?php foreach($daily as $row){ ?>
                                                    <tr>
                                                        <td><?= $sl++ ?></td>
                                                        <td>
                                                            <?php 
                                                                date_default_timezone_set('Asia/Dhaka');
                                                                $timestamp = (int) $row->time;
                                                                $days = [
                                                                    'Sunday' => 'রবিবার',
                                                                    'Monday' => 'সোমবার',
                                                                    'Tuesday' => 'মঙ্গলবার',
                                                                    'Wednesday' => 'বুধবার',
                                                                    'Thursday' => 'বৃহস্পতিবার',
                                                                    'Friday' => 'শুক্রবার',
                                                                    'Saturday' => 'শনিবার'
                                                                ];
                                                                $englishDay = date('l', $timestamp);
                                                                echo $days[$englishDay];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?= date('d-m-Y', (int)$row->time) ?>
                                                        </td>
                                                        <td style="text-align: justify;">
                                                            <?= $row->note ?>
                                                            <?php 
                                                                $replayList = QB::table('target_replay')->where('target_id', $row->id)->get();
                                                                $sl2 = 1;
                                                                if(count($replayList) > 0){
                                                            ?>
                                                            <hr>
                                                            <h5 style="padding-bottom: 0;">অ্যাডমিন রিপ্লাই</h5>
                                                                <?php foreach($replayList as $item){ ?>
                                                                    <span style="padding: 0;margin:0"><?= $sl2++ ?>. <?= $item->replay ?></span><br>
                                                                <?php } ?> 
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                    </div>
                                </div>
                                <?php } ?>

                                <?php if(isset($_GET['weekly'])){ ?>

                                <!-- ========================================================== -->
                                 <div style="display: flex;gap:10px">
                                     <div style="width:100%; background: #33CCCC;border-radius:0px;padding:40px 10px" class="large-card">
                                         সাপ্তাহিক টার্গেট ১৬৮ ঘন্টা
                                     </div>
                                 </div>
 
                                 <div style="display: flex;gap:10px">
                                     <div style="width:100%; background: #33CCCC;" class="small-card">
                                         অফিসিয়াল কাজের টার্গেট 
                                     </div>
                                 </div>
 
                                 <div style="display: flex;gap:10px">
                                     <div style="background: #33CCCC" class="small-card">
                                         ইনভাইট ২১ জন
                                     </div>
                                     <div style="background: #33CCCC" class="small-card">
                                         প্ল্যান শো - ১৪ জন
                                     </div>
                                 </div>
 
                                 <div style="display: flex;gap:10px">
                                     <div style="width:100%; background: #33CCCC;" class="small-card">
                                         সাপ্তাহিক আয়-১৩৮৬০ টাকা
                                     </div>
                                 </div>
 
                                 <div style="display: flex;gap:10px">
                                     <div style="width:100%; background: #33CCCC;border-radius:0px" class="small-card">
                                         কাজের রিপোর্ট জমা দিন
                                     </div>
                                 </div>
 
                                 <div class="top-bar">
                                    <div class="time-box">
                                        <div class="time" id="countdown"></div>
                                    </div>
                                    <div class="date-box">
                                        আজ <?= $banglaDay ?> তারিখ <?= date('d-m-Y') ?>
                                    </div>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden" name="type" value="weekly">
                                    <div style="display: flex;">
                                        <div style="width:100%;padding:0" class="small-card2">
                                            <textarea name="note" id="" rows="8" placeholder="নোট লিখুন............"></textarea>
                                        </div>  
                                    </div>
    
                                     <div style="display: flex;">
                                        <div style="width:100%;padding:0" class="small-card2">
                                            <button type="submit" name="submit" class="submitBtn">জমা দিন</button>
                                        </div>
                                    </div>
                                </form>
                                 <div style="display: flex;">
                                    <div style="width:100%;padding:0" class="small-card2">
                                        <?php 
                                            $monthly = QB::table('target')
                                                ->where('user_id', $_SESSION['user_id'])
                                                ->where('type', 'weekly')
                                                ->get();

                                            $sl2 = 1;
                                            ?>

                                            <table>
                                                <tr>
                                                    <th>নং</th>
                                                    <th>বার</th>
                                                    <th>তারিখ</th>
                                                    <th>নোট</th>
                                                </tr>

                                                <?php foreach($monthly as $row){ ?>
                                                    <tr>
                                                        <td><?= $sl2++ ?></td>
                                                        <td>
                                                            <?php 
                                                                date_default_timezone_set('Asia/Dhaka');
                                                                $timestamp = (int) $row->time;
                                                                $days = [
                                                                    'Sunday' => 'রবিবার',
                                                                    'Monday' => 'সোমবার',
                                                                    'Tuesday' => 'মঙ্গলবার',
                                                                    'Wednesday' => 'বুধবার',
                                                                    'Thursday' => 'বৃহস্পতিবার',
                                                                    'Friday' => 'শুক্রবার',
                                                                    'Saturday' => 'শনিবার'
                                                                ];
                                                                $englishDay = date('l', $timestamp);
                                                                echo $days[$englishDay];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?= date('d-m-Y', (int)$row->time) ?>
                                                        </td>
                                                        <td><?= $row->note ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                    </div>
                                </div>
                                <?php } ?>


                                 <?php if(isset($_GET['monthly'])){ ?>
                                 <!-- ========================================================== -->
                                 <div style="display: flex;gap:10px">
                                     <div style="width:100%; background: #3399FF;border-radius:0px;padding:40px 10px" class="large-card">
                                         মাসিক টার্গেট ৭২০ ঘন্টা
                                     </div>
                                 </div>
 
                                 <div style="display: flex;gap:10px">
                                     <div style="width:100%; background: #33CCCC;" class="small-card">
                                         অফিসিয়াল কাজের টার্গেট 
                                     </div>
                                 </div>
 
                                 <div style="display: flex;gap:10px">
                                     <div style="background: #666699" class="small-card">
                                         ইনভাইট ৯০ জন
                                     </div>
                                     <div style="background: #666699" class="small-card">
                                         প্ল্যান শো - ৬০ জন
                                     </div>
                                 </div>
 
                                 <div style="display: flex;gap:10px">
                                     <div style="width:100%; background: #666699;" class="small-card">
                                         মাসিক আয়-৫৫৪৪০ টাকা
                                     </div>
                                 </div>
 
                                 <div style="display: flex;gap:10px">
                                     <div style="width:100%; background: #3399FF;border-radius:0px" class="small-card">
                                         কাজের রিপোর্ট জমা দিন
                                     </div>
                                 </div>
 
                                 <div class="top-bar">
                                    <div class="time-box">
                                        <div class="time" id="countdown"></div>
                                    </div>
                                    <div class="date-box">
                                        আজ <?= $banglaDay ?> তারিখ <?= date('d-m-Y') ?>
                                    </div>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden" name="type" value="monthly">
                                    <div style="display: flex;">
                                        <div style="width:100%;padding:0" class="small-card2">
                                            <textarea name="note" id="" rows="8" placeholder="নোট লিখুন............"></textarea>
                                        </div>  
                                    </div>
    
                                     <div style="display: flex;">
                                        <div style="width:100%;padding:0" class="small-card2">
                                            <button type="submit" name="submit" class="submitBtn">জমা দিন</button>
                                        </div>
                                    </div>
                                </form>
                                 <div style="display: flex;">
                                    <div style="width:100%;padding:0" class="small-card2">
                                        <?php 
                                            $monthly = QB::table('target')
                                                ->where('user_id', $_SESSION['user_id'])
                                                ->where('type', 'monthly')
                                                ->get();

                                            $sl3 = 1;
                                            ?>

                                            <table>
                                                <tr>
                                                    <th>নং</th>
                                                    <th>বার</th>
                                                    <th>তারিখ</th>
                                                    <th>নোট</th>
                                                </tr>

                                                <?php foreach($monthly as $row){ ?>
                                                    <tr>
                                                        <td><?= $sl3++ ?></td>
                                                        <td>
                                                            <?php 
                                                                date_default_timezone_set('Asia/Dhaka');
                                                                $timestamp = (int) $row->time;
                                                                $days = [
                                                                    'Sunday' => 'রবিবার',
                                                                    'Monday' => 'সোমবার',
                                                                    'Tuesday' => 'মঙ্গলবার',
                                                                    'Wednesday' => 'বুধবার',
                                                                    'Thursday' => 'বৃহস্পতিবার',
                                                                    'Friday' => 'শুক্রবার',
                                                                    'Saturday' => 'শনিবার'
                                                                ];
                                                                $englishDay = date('l', $timestamp);
                                                                echo $days[$englishDay];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?= date('d-m-Y', (int)$row->time) ?>
                                                        </td>
                                                        <td><?= $row->note ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                    </div>
                                </div>
                                 <?php } ?>

                            </div>
                        </nav>

                       


                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php require_once('footer.php'); ?>
    <div class="time" id="countdown"></div>

<script>
function updateCountdown() {
    const now = new Date();

    // Set target time = today 12:00 PM
    let target = new Date();
    target.setHours(12, 0, 0, 0);

    // If time already passed 12 PM, set target to next day 12 PM
    if (now > target) {
        target.setDate(target.getDate() + 1);
    }

    const diff = target - now;

    const hours = Math.floor(diff / (1000 * 60 * 60));
    const minutes = Math.floor((diff / (1000 * 60)) % 60);
    const seconds = Math.floor((diff / 1000) % 60);

    document.getElementById("countdown").innerHTML =
        `${hours}h ${minutes}m ${seconds}s`;
}

// Update every second
setInterval(updateCountdown, 1000);
updateCountdown();
</script>