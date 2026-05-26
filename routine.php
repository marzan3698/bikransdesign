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
        select{
            background-color: transparent;
            border: none;
        }
        .table-responsive-custom {
            width: 100%;
            overflow-x: auto;
        }

        .custom-table {
            min-width: 800px; /* important for horizontal scroll */
            border-collapse: collapse;
        }

        .custom-table td {
            padding: 10px;
            border: 1px solid #ddd;
            white-space: nowrap; /* prevents word break */
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
       input{
            background: #fff; /* transparent background */
            border: 1px solid rgba(34,34,34,0.3); /* হালকা border */
            border-radius: 5px;
            padding: 6px 10px !important;
            color: #0B2234;
            backdrop-filter: blur(4px); /* glass effect */
        }

        input::placeholder{
            color: rgba(11,34,52,0.8);
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

                    <?php


// Assuming user is logged in and user_id is in session
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; // For testing, you should implement proper login
}

// Function to check if user ইতিমধ্যে জমা দেওয়া হয়েছে data
function hasSubmittedMorning($mysqli, $user_id) {
    $query = "SELECT id FROM morning_routine WHERE user_id = ?";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $count = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    return $count > 0;
}

function hasSubmittedAfternoon($mysqli, $user_id) {
    $query = "SELECT id FROM afternoon_routine WHERE user_id = ?";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $count = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    return $count > 0;
}

function hasSubmittedEvening($mysqli, $user_id) {
    $query = "SELECT id FROM evening_routine WHERE user_id = ?";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $count = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    return $count > 0;
}

// Handle Morning Form Submission
if (isset($_POST['submit1'])) {
    $user_id = $_SESSION['user_id'];
    
    if (!hasSubmittedMorning($mysqli, $user_id)) {
        $gratitude_status = isset($_POST['gratitude_status']) ? (int)$_POST['gratitude_status'] : 0;
        $wakeup_time = !empty($_POST['wakeup_time']) ? $_POST['wakeup_time'] : null;
        $fajr_prayer_status = isset($_POST['fajr_prayer_status']) ? (int)$_POST['fajr_prayer_status'] : 0;
        $zikir_status = isset($_POST['zikir_status']) ? (int)$_POST['zikir_status'] : 0;
        $exercise_status = isset($_POST['exercise_status']) ? (int)$_POST['exercise_status'] : 0;
        $meditation_status = isset($_POST['meditation_status']) ? (int)$_POST['meditation_status'] : 0;
        $knowledge_duration = !empty($_POST['knowledge_duration']) ? $_POST['knowledge_duration'] : null;
        $healthy_breakfast_status = isset($_POST['healthy_breakfast_status']) ? (int)$_POST['healthy_breakfast_status'] : 0;
        $productive_time = !empty($_POST['productive_time']) ? $_POST['productive_time'] : null;
        $leave_time = !empty($_POST['leave_time']) ? $_POST['leave_time'] : null;
        $plan_show_count = !empty($_POST['plan_show_count']) ? $_POST['plan_show_count'] : null;
        $business_invite_count = !empty($_POST['business_invite_count']) ? $_POST['business_invite_count'] : null;
        $distributor_meeting_info = !empty($_POST['distributor_meeting_info']) ? $_POST['distributor_meeting_info'] : null;
        $truth_call_info = !empty($_POST['truth_call_info']) ? $_POST['truth_call_info'] : null;
        $virtual_plan_show_info = !empty($_POST['virtual_plan_show_info']) ? $_POST['virtual_plan_show_info'] : null;
        $virtual_invite_info = !empty($_POST['virtual_invite_info']) ? $_POST['virtual_invite_info'] : null;
        
        $query = "INSERT INTO morning_routine (user_id, gratitude_status, wakeup_time, fajr_prayer_status, zikir_status, exercise_status, meditation_status, knowledge_duration, healthy_breakfast_status, productive_time, leave_time, plan_show_count, business_invite_count, distributor_meeting_info, truth_call_info, virtual_plan_show_info, virtual_invite_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, "iisiiiiississssss", $user_id, $gratitude_status, $wakeup_time, $fajr_prayer_status, $zikir_status, $exercise_status, $meditation_status, $knowledge_duration, $healthy_breakfast_status, $productive_time, $leave_time, $plan_show_count, $business_invite_count, $distributor_meeting_info, $truth_call_info, $virtual_plan_show_info, $virtual_invite_info);
        
        if (mysqli_stmt_execute($stmt)) {
            $success_message = "সকালের রুটিনের ডেটা সফলভাবে সংরক্ষণ করা হয়েছে!";
        } else {
            $error_message = "Error: " . mysqli_error($mysqli);
        }
        mysqli_stmt_close($stmt);
    } else {
        $error_message = "আপনি ইতিমধ্যেই সকালের রুটিনের তথ্য জমা দিয়েছেন!";
    }
}

// Handle Afternoon Form Submission
if (isset($_POST['submit2'])) {
    $user_id = $_SESSION['user_id'];
    
    if (!hasSubmittedAfternoon($mysqli, $user_id)) {
        $digital_invite_status = isset($_POST['digital_invite_status']) ? (int)$_POST['digital_invite_status'] : 0;
        $digital_invite_count = !empty($_POST['digital_invite_count']) ? $_POST['digital_invite_count'] : null;
        $new_plan_show_status = isset($_POST['new_plan_show_status']) ? (int)$_POST['new_plan_show_status'] : 0;
        $direct_meeting_info = !empty($_POST['direct_meeting_info']) ? $_POST['direct_meeting_info'] : null;
        $virtual_meeting_info = !empty($_POST['virtual_meeting_info']) ? $_POST['virtual_meeting_info'] : null;
        $financial_knowledge_info = !empty($_POST['financial_knowledge_info']) ? $_POST['financial_knowledge_info'] : null;
        $seminar_video_info = !empty($_POST['seminar_video_info']) ? $_POST['seminar_video_info'] : null;
        $relative_financial_info = !empty($_POST['relative_financial_info']) ? $_POST['relative_financial_info'] : null;
        
        $query = "INSERT INTO afternoon_routine (user_id, digital_invite_status, digital_invite_count, new_plan_show_status, direct_meeting_info, virtual_meeting_info, financial_knowledge_info, seminar_video_info, relative_financial_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, "iiissssss", $user_id, $digital_invite_status, $digital_invite_count, $new_plan_show_status, $direct_meeting_info, $virtual_meeting_info, $financial_knowledge_info, $seminar_video_info, $relative_financial_info);
        
        if (mysqli_stmt_execute($stmt)) {
            $success_message = "বিকালের রুটিনের ডেটা সফলভাবে সংরক্ষণ করা হয়েছে!";
        } else {
            $error_message = "Error: " . mysqli_error($mysqli);
        }
        mysqli_stmt_close($stmt);
    } else {
        $error_message = "আপনি ইতিমধ্যেই সকালের রুটিনের তথ্য জমা দিয়েছেন!";
    }
}

// Handle Evening Form Submission
if (isset($_POST['submit3'])) {
    $user_id = $_SESSION['user_id'];
    
    if (!hasSubmittedEvening($mysqli, $user_id)) {
        $daily_analysis = !empty($_POST['daily_analysis']) ? $_POST['daily_analysis'] : null;
        $next_day_plan = !empty($_POST['next_day_plan']) ? $_POST['next_day_plan'] : null;
        $healthy_food_activity = !empty($_POST['healthy_food_activity']) ? $_POST['healthy_food_activity'] : null;
        $training_link_shared = isset($_POST['training_link_shared']) ? (int)$_POST['training_link_shared'] : 0;
        $training_notes = !empty($_POST['training_notes']) ? $_POST['training_notes'] : null;
        $work_roadmap = !empty($_POST['work_roadmap']) ? $_POST['work_roadmap'] : null;
        $expense_calculation = !empty($_POST['expense_calculation']) ? $_POST['expense_calculation'] : null;
        $final_report = !empty($_POST['final_report']) ? $_POST['final_report'] : null;
        
        $query = "INSERT INTO evening_routine (user_id, daily_analysis, next_day_plan, healthy_food_activity, training_link_shared, training_notes, work_roadmap, expense_calculation, final_report) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, "isssissss", $user_id, $daily_analysis, $next_day_plan, $healthy_food_activity, $training_link_shared, $training_notes, $work_roadmap, $expense_calculation, $final_report);
        
        if (mysqli_stmt_execute($stmt)) {
            $success_message = "সান্ধ্যকালীন রুটিনের তথ্য সফলভাবে সংরক্ষণ করা হয়েছে!";
        } else {
            $error_message = "Error: " . mysqli_error($mysqli);
        }
        mysqli_stmt_close($stmt);
    } else {
        $error_message = "আপনি ইতিমধ্যে সান্ধ্যকালীন রুটিনের তথ্য জমা দিয়েছেন!";
    }
}

// Check submission status for displaying disabled forms
$morning_disabled = hasSubmittedMorning($mysqli, $_SESSION['user_id']);
$afternoon_disabled = hasSubmittedAfternoon($mysqli, $_SESSION['user_id']);
$evening_disabled = hasSubmittedEvening($mysqli, $_SESSION['user_id']);
?>

<!-- Display Messages -->
<?php if (isset($success_message)): ?>
    <div style="background: #4CAF50; color: white; padding: 10px; margin: 10px 0; border-radius: 5px;">
        <?php echo $success_message; ?>
    </div>
<?php endif; ?>

<?php if (isset($error_message)): ?>
    <div style="background: #f44336; color: white; padding: 10px; margin: 10px 0; border-radius: 5px;">
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>

<nav class="main-nav" style="margin-top: 10px !important; width: 95%; margin: auto; border: 1px solid #0B2234; min-height:86vh;">
    <div style="width: 95%;display:block;margin:auto;margin-top:10px">
        <img src="images/custom/artik.png" alt="" class="box-img" style="width: 100%;">

        <div id="div1" style="background: #149E6B; color: #fff; padding: 5px; font-size: 15px; margin-top: 8px; border-radius: 10px; position: relative; text-align: center;">
            আর্থিক রুটিন কেন প্রয়োজন?
            <span style="position: absolute; right: 15px;"><img src="images/custom/angle-right-solid.svg" alt="" width="8px"></span>
        </div>

        <div id="div2" style="background: #4E87A7; color: #fff; padding: 5px; font-size: 15px; margin-top: 8px; border-radius: 10px; position: relative; text-align: center;">
            রুটিন অনুসরণ করলে কি লাভ হবে?  
            <span style="position: absolute; right: 15px;"><img src="images/custom/angle-right-solid.svg" alt="" width="8px"></span>
        </div>

        <div id="div3" style="background: #C08C14; color: #222; padding: 5px; font-size: 15px; margin-top: 8px; border-radius: 10px; position: relative; text-align: center;">
            রুটিন অনুসরণ না করলে কি হবে?  
            <span style="position: absolute; right: 15px;"><img src="images/custom/angle-right-solid.svg" alt="" width="8px"></span>
        </div>

        <img src="images/custom/routine1.png" alt="" class="box-img" style="width: 100%;margin-top:20px">

        <div style="background: #33CCCC; color: #222; padding: 10px; font-size: 15px; margin-top: 8px; border-radius: 10px; position: relative; text-align: left;">
            সকাল ৫:০০ AM - ১১:০০ AM পর্যন্ত
            <span style="position: absolute; right: 15px; background: #33CCCC; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23); padding: 3px; border-radius: 10px; top: 6px;">রুটিন চেক</span>
        </div>

        <div style="padding: 10px; font-size: 15px; margin-top: 8px; border-radius: 10px; border:1px solid #222; position: relative; text-align: justify;">
            ঘুম থেকে জাগার সাথে সাথেই বিছানা ছাড়ার পূর্বে ৩ থেকে ৫ মিনিট গভীর কৃতজ্ঞতায় ভরে তুলুন মন:“আলহামদুলিল্লাহ! প্রভু, তোমাকে অসীম ধন্যবাদ নতুন এক শুভ দিন উপহার দেয়ার জন্য, যা দিয়ে তোমার অশেষ নিয়ামতের সাহায্য আমি আমার জীবনকে অর্থপূর্ণ করে তুলবো।”<br>
            ধর্মীয় ইবাদত সম্পূর্ণ করা (৫:১০ AM - ৫.৫৫ AM)* ফজরের নামাজ আদায়* কোরআন তেলাওয়াত* যিকির ও ধ্যান (অন্যান্য ধর্মাবলম্বীরা নিজ নিজ প্রার্থনায় মনোনিবেশ করবেন)
        </div>

        <form action="" method="post">
            <div class="table-responsive-custom" style="margin-top: 20px;">
                <table class="custom-table">
                    <tr>
                        <td>সকাল ৫.১০am-৫.৫৫am পর্যন্ত</td>
                        <td>5.10 am-5.15 (5 মিনিট)</td>
                        <td>5.20am-5.45am (25 মিনিট)</td>
                        <td>5.45am-5.55am (10 মিনিট)</td>
                    </tr>
                    <tr>
                        <td>
                            <select name="gratitude_status" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                                <option value="">কৃতজ্ঞতা প্রকাশ</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="0">না</option>
                            </select>
                        </td>
                        <td style="color: #222;">ঘুম থেকে উঠেছেন কখন
                            <input type="time" name="wakeup_time" style="background: transparent;border:1px solid #222;border-radius:5px" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td>
                            <select name="fajr_prayer_status" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                                <option value="">ফজর নামাজ/উপাসনা</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="0">না</option>
                            </select>
                        </td>
                        <td>
                            <select name="zikir_status" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                                <option value="">প্রভুর স্মরণে জিকির</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="0">না</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>6.00am-6.20am (20 মিনিট)</td>
                        <td>6.25am-6.55am (30 মিনিট)</td>
                        <td>7.00am-7.10am (10 মিনিট)</td>
                        <td>7.15am-7.30am (15 মিনিট)</td>
                    </tr>
                    <tr>
                        <td>
                            <select name="exercise_status" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                                <option value="">শরীরিক চর্চা করেছেন</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="0">না</option>
                            </select>
                        </td>
                        <td>
                            <select name="meditation_status" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                                <option value="">মেডিটেশন করেছেন</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="0">না</option>
                            </select>
                        </td>
                        <td style="color: #222;">
                            <select name="knowledge_duration" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                                <option value="">জ্ঞান চর্চা কত মিনিট করেছেন</option>
                                <option value="৫ মিনিট">৫ মিনিট</option>
                                <option value="১০ মিনিট">১০ মিনিট</option>
                                <option value="১৫ মিনিট">১৫ মিনিট</option>
                                <option value="২০ মিনিট">২০ মিনিট</option>
                            </select>
                        </td>

                        <td>
                            <select name="healthy_breakfast_status" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                                <option value="">স্বাস্থ্যসম্মত নাস্তা করেছেন</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="0">না</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background: #fff;color:#222">পরিবারের অনান্য কাজ যেমন মা বাবা স্ত্রী সন্তানদের সময় দিয়া, পরিচ্ছন্নতার দিকে নজর দেয়া, বাজার করা, বাচ্চা কে স্কুলে নিয়ে যাওয়া, পরিবারে অন্যান্য কাজ করা</td>
                    </tr>
                    <tr>
                        <td style="background: #33CCCC;">সময় (৯:০০ AM - 1:00PM)</td>
                        <td style="background: #33CCCC;">৯ টার মাঝে কাজে বের হওয়া</td>
                        <td style="background: #33CCCC;">বিক্রান্ত প্লান-শো</td>
                        <td style="background: #33CCCC;">বিজনেস আমন্ত্রন</td>
                    </tr>
                    <tr>
                        <td style="background:#CCCCFF;color: #222">
                            উৎপাদনশীল সময়
                            <input type="time" name="productive_time" placeholder="" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="background:#CCCCFF;color: #222">
                            আজ কয়টায় বের হয়েছেন
                            <input type="time" name="leave_time" placeholder="" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="color: #222;background:#CCCCFF">
                            <input type="text" name="plan_show_count" placeholder="যাদের প্লান দেখিয়েছেন" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                        </td>

                        <td style="background:#CCCCFF;color: #222">
                            <input type="text" name="business_invite_count" placeholder="সরাসরি ইনভাইট" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td style="background: #33CCCC;">ডিস্ট্রিবিউটর মিটিং</td>
                        <td style="background: #33CCCC;">সত্যকর্মের আহবান</td>
                        <td style="background: #33CCCC;">ভার্চুয়াল প্লান- শো</td>
                        <td style="background: #33CCCC;">ভার্চুয়াল ইনভাইট</td>
                    </tr>
                    <tr>
                        <td style="background:#CCCCFF;color: #222">
                            <input type="text" name="distributor_meeting_info" placeholder="ডিস্ট্রিবিউটর মিটিং তথ্যদিন" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="background:#CCCCFF;color: #222">
                            <input type="text" name="truth_call_info" placeholder="ভাল কথা/বীজ/গাছ ছরিয়ে দিন" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="color: #222;background:#CCCCFF">
                            <input type="text" name="virtual_plan_show_info" placeholder="সেমিনার ভিডিও সেয়ার তথ্য" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                        </td>

                        <td style="background:#CCCCFF;color: #222">
                            <input type="text" name="virtual_invite_info" placeholder="বিজনেস আমন্ত্রনের তথ্য" <?php echo $morning_disabled ? 'disabled' : ''; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background: #fff;color:#222">দুপুর ১টা থেকে ২টা ৩০ মিনিট নামাজ ও জিকির, খাবার গ্রহণ এবং স্বল্প বিশ্রামের মাধ্যমে আত্মিক ও শারীরিক ভারসাম্য বজায় রাখুন।</td>
                    </tr>
                </table>
                <?php if (!$morning_disabled): ?>
                    <button type="submit" name="submit1" class="submit-btn">সাবমিট করুন</button>
                <?php else: ?>
                    <button type="button" class="submit-btn" disabled style="background: #ccc;">ইতিমধ্যে জমা দেওয়া হয়েছে</button>
                <?php endif; ?>
            </div>
        </form>

        <!-- Afternoon Section -->
        <img src="images/custom/routine2.png" alt="" class="box-img" style="width: 100%;margin-top:20px">

        <div style="background: #41688B; color: #fff; padding: 10px; font-size: 15px; margin-top: 8px; border-radius: 10px; position: relative; text-align: left;">
            দুপুরের বিরতি (১:০০PM - ২:৩০PM) 
            <span style="position: absolute; right: 15px; background: #41688B; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23); padding: 3px; border-radius: 10px; top: 6px;">রুটিন চেক</span>
        </div>

        <div style="padding: 10px; font-size: 15px; margin-top: 8px; border-radius: 10px; border:1px solid #222; position: relative; text-align: justify;">
            দুপুর ১টা থেকে ২টা ৩০ মিনিট পর্যন্ত সময়সূচি: <br>
            এই সময়টুকু আমি আত্মিক ও শারীরিক প্রশান্তির জন্য নির্ধারণ করি। প্রথমে নামাজ আদায় করি এবং কিছু সময় জিকিরে ব্যয় করি, যা মনকে শান্ত ও স্থির করে।এরপর দুপুরের খাবার গ্রহণ করি, যাতে শরীরের প্রয়োজনীয় শক্তি ফিরে পাই।সবশেষে কিছু সময় বিশ্রাম নেই, যাতে পরবর্তী কাজগুলোতে নতুন উদ্যমে মনোযোগ দিতে পারি। এই সময়টা আমার জন্য এক ধরনের ভারসাম্য–ইবাদত, পুষ্টি ও বিশ্রামের সমন্বয়।
        </div>

        <form action="" method="post">
            <div class="table-responsive-custom">
                <table class="custom-table" style="margin-top: 20px;">
                    <tr>
                        <td style="background: #666699;">দুপুর ২:৩০মিঃ থেকে</td>
                        <td style="background: #666699;">ভার্চুয়াল ইনভাইট</td>
                        <td style="background: #666699;">নতুন ব্যাক্তিকে প্লান-শো</td>
                        <td style="background: #666699;">সরাসর ডিস্ট্রিবিউটর মিটিং</td>
                    </tr>
                    <tr>
                        <td style="background: #E5FFFF;">
                            <select name="digital_invite_status" <?php echo $afternoon_disabled ? 'disabled' : ''; ?>>
                                <option value="">ডিজিটাল ইনভাইট করা</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="0">না</option>
                            </select>
                        </td>
                        <td style="background: #E5FFFF;">
                            <select name="digital_invite_count" <?php echo $afternoon_disabled ? 'disabled' : ''; ?>>
                                <option value="">ডিজিটাল ইনভাইট কত জন</option>
                                <option value="১ জন">১ জন</option>
                                <option value="২ জন">২ জন</option>
                                <option value="৩ জন">৩ জন</option>
                            </select>
                        </td>
                        <td style="background: #E5FFFF;">
                            <select name="new_plan_show_status" <?php echo $afternoon_disabled ? 'disabled' : ''; ?>>
                                <option value="">নতুনদের প্লান দেখিয়েছেন</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="0">না</option>
                            </select>
                        </td>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="direct_meeting_info" placeholder="সরাসরি মিটিং তথ্য দিন" <?php echo $afternoon_disabled ? 'disabled' : ''; ?>>
                        </td>
                    </tr>

                    <tr>
                        <td style="background: #666699;">ভার্চুয়াল ডিস্ট্রিবিউটর মিটিং</td>
                        <td style="background: #666699;">নতুন মানুষ কে অর্থ জ্ঞান দিন</td>
                        <td style="background: #666699;">ভার্চুয়াল প্লান- শো</td>
                        <td style="background: #666699;">আত্বীয়/পরিচিত অর্থের জ্ঞান</td>
                    </tr>
                    <tr>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="virtual_meeting_info" placeholder="ভার্চুয়াল মিটিং তথ্য দিন" <?php echo $afternoon_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="financial_knowledge_info" placeholder="নতুন ব্যাক্তিকে অর্থ জ্ঞান দিন" <?php echo $afternoon_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="seminar_video_info" placeholder="সেমিনার ভিডিও সেয়ার তথ্য" <?php echo $afternoon_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="relative_financial_info" placeholder="আত্বীয় পরিচিত অর্থ তথদিন" <?php echo $afternoon_disabled ? 'disabled' : ''; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background: #666699;">আসর নামাজ মসজিদে আদায় করে নামাজ শেষে কিছু সময় জিকির করুন এবং আল্লাহর কাছে আর্থিক উন্নতির জন্য আন্তরিকভাবে দোয়া করুন।</td>
                    </tr>
                </table>
                <?php if (!$afternoon_disabled): ?>
                    <button type="submit" name="submit2" class="submit-btn">সাবমিট করুন</button>
                <?php else: ?>
                    <button type="button" class="submit-btn" disabled style="background: #ccc;">ইতিমধ্যে জমা দেওয়া হয়েছে</button>
                <?php endif; ?>
            </div>
        </form>

        <!-- Evening Section -->
        <img src="images/custom/routine3.png" alt="" class="box-img" style="width: 100%;margin-top:20px">

        <div style="background: #149E6B; color: #fff; padding: 10px; font-size: 15px; margin-top: 8px; border-radius: 10px; position: relative; text-align: left;">
            সন্ধ্যা ৬.টা থেকে ১০.৩০ মিনিটের 
            <span style="position: absolute; right: 15px; background: #41688B; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23); padding: 3px; border-radius: 10px; top: 6px;">রুটিন চেক</span>
        </div>

        <div style="padding: 10px; font-size: 15px; margin-top: 8px; border-radius: 10px; border:1px solid #222; position: relative; text-align: justify;">
            সন্ধ্যা ৬:০০ - ৬:৩০ মিনিট* <br>
            মাগরিবের নামাজ আদায় ( অন্যান্য ধর্মাবলম্বীরা নিজ নিজ উপাসনা করবে)* যিকির করা ও প্রজ্ঞাবানদের শিক্ষণীয় বক্তব্য গ্রহণ করা • সন্ধ্যা ৬:৩০ – সন্ধ্যা ৭:০০ টা পর্যন্ত * বাড়ি ফেরা ও পথে প্রতিবেশীদের খোঁজ- খবর নেওয়া • সন্ধ্যা ৭:০০ রাত ৮:টার মাঝে রাতের স্বাস্থ্য সম্মত খাবার গ্রহণ করা* এশার নামাজ আদায় করা, পরিবারকে সময় দেওয়া* হালকা হাঁটাহাটি (৫ মিনিট) রাত ৯ টায় বিক্রান্তের প্রোগ্রাম অংশ নিয়া সারাদিনের রিপোর্ট প্রদান করা প্রার্থনা সৃষ্টিকর্তার স্বরণে কৃতজ্ঞতায় গভীর ঘুমে নিম্ন হন
        </div>

        <form action="" method="post">
            <div class="table-responsive-custom">
                <table class="custom-table" style="margin-top: 20px;">
                    <tr>
                        <td style="background: #149E6B;">সন্ধা ৬টা থেকে ১০.৩০ পর্যন্ত</td>
                        <td style="background: #149E6B;">পরিবারের সাথে দিন</td>
                        <td style="background: #149E6B;">রাতের খাবার ইবাদত করুন</td>
                        <td style="background: #149E6B;">রাতের যোগাযোগ ও প্রোগ্রাম</td>
                    </tr>
                    <tr>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="daily_analysis" placeholder="আজকের বিশ্লেষণ" <?php echo $evening_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="next_day_plan" placeholder="আগামি কালের পরিকল্পনা করুন" <?php echo $evening_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="healthy_food_activity" placeholder="স্বাস্থসম্মত খাবার হাটা হাটি" <?php echo $evening_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="background: #E5FFFF;">
                            <select name="training_link_shared" <?php echo $evening_disabled ? 'disabled' : ''; ?>>
                                <option value="">ট্রিনিং লিংক সেয়ার করেছেন</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="0">না</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="background: #149E6B;">নিজের ট্রেনিং গ্রহন</td>
                        <td style="background: #149E6B;">আগামিকালে কাজের নকশা</td>
                        <td style="background: #149E6B;">আয় ব্যায়ের হিসাব করুন</td>
                        <td style="background: #149E6B;">রিপোর্ট চেক কৃতজ্ঞতা প্রকাশ</td>
                    </tr>
                    <tr>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="training_notes" placeholder="ট্রেনিং নোট এনালাইসিস" <?php echo $evening_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="work_roadmap" placeholder="কাজের রোডম্যাপ জমা দিন" <?php echo $evening_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="expense_calculation" placeholder="আজকের খরচ আয় সঞ্চয়" <?php echo $evening_disabled ? 'disabled' : ''; ?>>
                        </td>
                        <td style="background: #E5FFFF;">
                            <input type="text" name="final_report" placeholder="রিপোর্ট দিন সৃষ্টাসরণে ঘুমিয়ে পরুন" <?php echo $evening_disabled ? 'disabled' : ''; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background: #149E6B;">রাতের কাজ বিশেষ তাৎপর্যপূর্ণ, প্রতিটি কাজ যথাযথ করুন, মোবাইল বন্ধ রাখুন, সৃষ্টিকর্তার স্বরণে কৃতজ্ঞতায় গভীর ঘুমে নিম্ন হন।</td>
                    </tr>
                </table>
                <?php if (!$evening_disabled): ?>
                    <button type="submit" name="submit3" class="submit-btn">সাবমিট করুন</button>
                <?php else: ?>
                    <button type="button" class="submit-btn" disabled style="background: #ccc;">ইতিমধ্যে জমা দেওয়া হয়েছে</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</nav>

<?php
// Close database connection
mysqli_close($mysqli);
?>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
