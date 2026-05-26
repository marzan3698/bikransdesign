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


        <style>
            .cus-inp{
                width: 93.5%;
                padding: 10px;
                text-align: center;
                display: block;
                margin: auto;
                border-radius: 0;
                border: 1px solid #222;
            }
            .cus-inp2{
                width: 93.5%;
                padding: 10px;
                text-align: center;
                display: block;
                margin: auto;
                border-radius: 0;
                border: 1px solid #222;
                border-top: 0;
            }
            .cus-inp3{
                width: 100%;
                padding: 10px;
                text-align: center;
                display: block;
                margin: auto;
                border-radius: 0;
                border: 1px solid #222;
                border-top: 0;
            }
            .submtbtn{
                width: 100%;
                padding: 5px;
                text-align: center;
                display: block;
                margin: auto;
                border-radius: 0;
                background-color: #7F7F7F;
                color: #fff;
                margin-top: 10px;
                border: none;
            }
            .submtbtn2{
                width: 100%;
                padding: 5px;
                text-align: center;
                display: block;
                margin: auto;
                border-radius: 0;
                background-color: #9F6C75;
                color: #fff;
                margin-top: 10px;
                border: none;
            }
            
        </style>
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
                                <div class="box-text" style="font-size: 18px;">সম্ভাব্য বিজনেস <br> ডিস্ট্রিবিউটর তালিকা
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/11.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <div class="withdrawal-container">
                            <div class="balance-header" style="background-color: #2F5596;padding: 10px;">
                                <div class="available-balance" style="color: #fff;">
                                    সম্ভাব্য বিজনেস ডিস্ট্রিবিউটর তালিকা
                                </div>
                            </div>
                            <?php
                                if(isset($_POST['dist_submit'])){
                                    $name = $_POST['name'];
                                    $phone = $_POST['phone'];
                                    $occupation = $_POST['occupation'];
                                    $relationship = $_POST['relationship'];
                                    $address = $_POST['address'];

                                    if(empty($name) || empty($phone) || empty($occupation) || empty($relationship) || empty($address)){
                                        echo '<div class="alert alert-danger">সব তথ্য পূরণ করুন</div>';
                                        exit;
                                    }

                                    $checkPhone = QB::table('distributor')->where('phone', $phone)->first();
                                    if($checkPhone){
                                        echo '<div style="color: red;text-align: center;margin: 10px 0;">❌এই নম্বরটি ইতিমধ্যে তালিকায় আছে❌</div>';
                                        exit();
                                    }

                                    $insert = QB::table('distributor')->insert([
                                        'user_id' => $_SESSION['user_id'],
                                        'time' => time(),
                                        'name' => $name,
                                        'phone' => $phone,
                                        'occupation' => $occupation,
                                        'relationship' => $relationship,
                                        'address' => $address,
                                    ]);
                                    if($insert){
                                        echo '<div style="color: green;text-align: center;margin: 10px 0;">✅ডিস্ট্রিবিউটর তালিকায় সফলভাবে যোগ করা হয়েছে✅</div>';
                                        echo '<script>
                                            setTimeout(() => {
                                                window.location = \'distributor-list.php\';
                                            }, 1000);
                                        </script>';
                                    }
                                }
                            ?>
                            
                           <form action="" method="post">
                                <input type="text" name="name" class="cus-inp" placeholder="সম্ভাব্য নতুন ডিস্ট্রিবিউটর এর নাম লিখুন">
                                <input type="text" name="phone" class="cus-inp2" placeholder="সম্ভাব্য নতুন ডিস্ট্রিবিউটর এর নম্বর লিখুন">
                                <input type="text" name="occupation" class="cus-inp2" placeholder="সম্ভাব্য নতুন ডিস্ট্রিবিউটর এর পেশা লিখুন">
                                <input type="text" name="relationship" class="cus-inp2" placeholder="সম্ভাব্য নতুন ডিস্ট্রিবিউটর এর সাথে সম্পর্ক লিখুন">
                                <input type="text" name="address" class="cus-inp2" placeholder="সম্ভাব্য নতুন ডিস্ট্রিবিউটর এর ঠিকনা লিখুন">
                                <button type="submit" name="dist_submit" class="submtbtn">আপডেট করুন</button>
                           </form>
                        </div>

                        <div class="withdrawal-container">
                            <div class="balance-header" style="background-color: #32CCCC;padding: 10px;">
                                <div class="available-balance" style="color: #fff;">
                                    সম্ভাব্য বিজনেস ডিস্ট্রিবিউটর ইনভাইট
                                </div>
                            </div>
                            <?php
                                if(isset($_POST['invite_submit'])){
                                    $dist_id = $_POST['dist_id'];
                                    $name = $_POST['name'];
                                    $plan_share = $_POST['plan_share'];
                                    $date = $_POST['date'];

                                    if(empty($dist_id)){
                                        echo '<div class="alert alert-danger">ডিস্ট্রিবিউটর নম্বর সঠিক নয়</div>';
                                        exit;
                                    }

                                    $insert = QB::table('distributor_invite')->insert([
                                        'user_id' => $_SESSION['user_id'],
                                        'dist_id' => $dist_id,
                                        'time' => time(),
                                        'name' => $name,
                                        'number' => $_POST['number'],
                                        'plan_share' => $plan_share,
                                        'date' => $date,
                                    ]);
                                    if($insert){
                                        
                                        echo '<div style="color: green;text-align: center;margin: 10px 0;">✅ডিস্ট্রিবিউটরকে সফলভাবে ইনভাইট করা হয়েছে✅</div>';
                                        echo '<script>
                                            setTimeout(() => {
                                                window.location = \'invite-list.php\';
                                            }, 1000);
                                        </script>';
                                    }
                                }
                            ?>
                           <form action="" method="post">
                                <input type="hidden" name="dist_id" id="dist_id" value="">
                                <input type="text" name="number" id="invite-no" class="cus-inp" placeholder="তালিকা থেকে নম্বর দিন-">
                                <input type="text" name="name" id="invite-name" class="cus-inp2" placeholder="সম্ভাব্য নতুন ডিস্ট্রিবিউটর নাম-">
                                <select name="plan_share" class="cus-inp3">
                                    <option value="">সম্ভাব্য নতুন ডিস্ট্রিবিউটর সাথে সাক্ষাৎ</option>
                                    <option value="1">সরাসরি প্ল্যান শেয়ার</option>
                                    <option value="2">অনলাইন প্ল্যান শেয়ার</option>
                                    <option value="3">ভিডিও মাধ্যমে প্ল্যান শেয়ার</option>
                                </select>
                                <input type="date" name="date" class="cus-inp2" placeholder="সম্ভাব্য নতুন ডিস্ট্রিবিউটর কে প্ল্যান শেয়ার দিন ও সময়">

                                <button type="submit" name="invite_submit" class="submtbtn2">আপডেট করুন</button>
                           </form>
                        </div>

                        <div class="withdrawal-container">
                            <div class="balance-header" style="background-color: #6599FF;padding: 10px;">
                                <div class="available-balance" style="color: #fff;">
                                    সম্ভাব্য বিজনেস ডিস্ট্রিবিউটর ফলোআপ
                                </div>
                            </div>

                            <?php
                                if(isset($_POST['follow_up_submit'])){
                                    $dist_id = $_POST['dist_id'];
                                    $name = $_POST['name'];
                                    $follow_up_type = $_POST['follow_up_type'];

                                    if(empty($dist_id)){
                                        echo '<div class="alert alert-danger">ডিস্ট্রিবিউটর নম্বর সঠিক নয়</div>';
                                        exit;
                                    }

                                    $insert = QB::table('distributor_follow_up')->insert([
                                        'user_id' => $_SESSION['user_id'],
                                        'dist_id' => $dist_id,
                                        'time' => time(),
                                        'name' => $name,
                                        'number' => $_POST['number'],
                                        'follow_up_type' => $follow_up_type,
                                        'follow_up_process' => $_POST['follow_up_process'],
                                        'is_joined' => $_POST['is_joined'],
                                        'follow_up_time' => $_POST['follow_up_time'],
                                    ]);
                                    if($insert){
                                        echo '<div style="color: green;text-align: center;margin: 10px 0;">✅ডিস্ট্রিবিউটরকে সফলভাবে ফলোআপ করা হয়েছে✅</div>';
                                        echo '<script>
                                            setTimeout(() => {
                                                window.location = \'followup-list.php\';
                                            }, 1000);
                                        </script>';
                                    }
                                }
                            ?>

                           <form action="" method="post">
                                <input type="hidden" name="dist_id" id="dist_id2" value="">
                                <input type="text" name="number" id="follow-up-no" class="cus-inp" placeholder="তালিকা থেকে নম্বর দিন-">
                                <input type="text" name="name" id="follow-up-name" class="cus-inp2" placeholder="সম্ভাব্য ফলোআপকৃত ডিস্ট্রিবিউটর নাম-">
                                <select name="follow_up_type" id="follow_up_type" class="cus-inp3">
                                    <option value="">সম্ভাব্য ফলোআপকৃত ডিস্ট্রিবিউটর সাথে সাক্ষাৎ-</option>
                                    <option value="1">প্রথম ফলোআপ</option>
                                    <option value="2">দ্বিতীয় ফলোআপ</option>
                                    <option value="3">তৃতীয় ফলোআপ</option>
                                </select>

                                <select name="follow_up_time" id="follow_up_type" class="cus-inp3">
                                    <option value="">সম্ভাব্য ডিস্ট্রিবিউটর ফলোআপ ফলাফল কত ঘন্টা-</option>
                                    <option value="সময়-১২ ঘন্টা">সময়-১২ ঘন্টা</option>
                                    <option value="সময়-২৪ ঘন্টা">সময়-২৪ ঘন্টা</option>
                                    <option value="সময়-৭২ ঘন্টা">সময়-৭২ ঘন্টা</option>
                                </select>

                                <select name="follow_up_process" class="cus-inp3">
                                    <option value="">সম্ভাব্য ডিস্ট্রিবিউটর ফলোআপ চালিয়ে যাবেন-</option>
                                    <option value="1">হ্যাঁ</option>
                                    <option value="0">কামিং</option>
                                </select>

                                <select name="is_joined" id="" class="cus-inp3">
                                    <option value="">সম্ভাব্য ডিস্ট্রিবিউটর জয়েন করেছেন</option>
                                    <option value="1">হ্যাঁ</option>
                                    <option value="0">কামিং</option>
                                </select>
                                <button type="submit" name="follow_up_submit" class="submtbtn2" style="background-color: #8FAADC;">আপডেট করুন</button>
                           </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
    $("#invite-no").on("keyup  input", function() {
        var phone = $(this).val();
        $.ajax({
            url: "ajax/check-distributor.php",
            method: "POST",
            data: {
                invite_no: phone
            },
            success: function(response) {
                var res = JSON.parse(response);
                if (res.data) {
                    $('#dist_id').val(res.data.id);
                    $('#invite-name').val(res.data.name);
                }
            }
        });
    });
    $("#follow-up-no").on("keyup  input", function() {
        var phone = $(this).val();
        $.ajax({
            url: "ajax/check-distributor.php",
            method: "POST",
            data: {
                invite_no: phone
            },
            success: function(response) {
                var res = JSON.parse(response);
                if (res.data) {
                    $('#dist_id2').val(res.data.id);
                    $('#follow-up-name').val(res.data.name);
                }
            }
        });
    });
    
</script>