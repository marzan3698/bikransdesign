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
            #input{
                width: 136px;
                background: transparent;
                border: none;
                color: #fff;
            }
            #input::placeholder{
                color: #fff;
            }
            option{
                background-color: #0B2234;
                color: #12D584;
            }
            .custom-submit-button6{
                width: 97%;
                margin-top: 20px !important;
                margin-bottom: 20px !important;
                padding: 10px;
                margin: auto;
                display: block;
                background: #12d584;
                border: none;
                font-weight: 600;
                letter-spacing: 1px;
                font-size: 16px;
                color: #fff;
                font-weight: normal;

            }
        </style>

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
                        style="margin-top: 60px !important; width: 95%; margin: auto; border: 1px solid #222; min-height:calc(100vh - 105px);">
                        
                        <div style="background-color: #12D584; width: 91%; display: block; margin: auto; padding: 10px; text-align: center; font-size: 20px; color: #fff;">
                            অফিশিয়াল নোটিশ
                        </div>
                        <div style="width: 93.5%; display: block; margin: auto; padding: 5px; color: #fff; border: 1px solid #12D584; margin-bottom: 10px;font-size:14px;padding-top:20px">
                            সম্মানিত বিক্রান্স বিজনেস গ্রাহক,<br>
                            আপনার আর্থিক নিরাপত্তার স্বার্থে অনুগ্রহ করে একটি নির্দিষ্ট অ্যাকাউন্ট নম্বর নির্বাচন করুন। ভবিষ্যতে বিক্রান্স বিজনেস থেকে আপনার সকল অর্থ প্রদান উক্ত অ্যাকাউন্টেই জমা করা হবে এবং সেই অ্যাকাউন্টকেই অফিসিয়াল লেনদেনের জন্য গণ্য করা হবে। <br><br>
                            পরবর্তী সময়ে অ্যাকাউন্ট নম্বর পরিবর্তনের ক্ষেত্রে নির্ধারিত চার্জ প্রযোজ্য হবে এবং লিখিত আবেদন প্রদান করতে হবে। <br><br>
                            অতএব অনুগ্রহ করে সঠিকভাবে আপনার অ্যাকাউন্ট নম্বর যুক্ত করুন। <br><br>
                            <span style="text-align:right;display:block">- কর্তৃপক্ষ <br> বিক্রান্স বিজনেস</span>
                            <?php
                                if(isset($_POST['submit'])){
                                    $user_id = $_SESSION['user_id'];

                                    $account_number = trim(strip_tags($_POST['account_number']));
                                    $account_name   = trim(strip_tags($_POST['account_name']));
                                    $account_type   = trim(strip_tags($_POST['account_type']));

                                    $exists = QB::table('bank_info')
                                        ->where('user_id', $user_id)
                                        ->where('account_type', $account_type)
                                        ->first();

                                    if($exists){
                                        echo "<span style='color:red;font-weight:600;text-align:center;'>❌❌ পূর্বে একাউন্ট আছে। এটা আপডেট যোগ্য নয় ❌❌</span>";
                                    }else{
                                        QB::table('bank_info')->insert([
                                            'time' => time(),
                                            'user_id' => $user_id,
                                            'account_number' => $account_number,
                                            'account_name' => $account_name,
                                            'account_type' => $account_type,
                                        ]);

                                        echo "<span style='color: #12D584; font-weight: 600; text-align: center; display: block; margin: 10px;'>✅✅ একাউন্ট তথ্য সফলভাবে যুক্ত হয়েছে ✅✅</span>";
                                    }
                                }
                                ?>
                            <form action="" method="POST">
                                <div class="custom-form-group2" style="background-color: #0B2234;margin-top:20px">
                                    <input style="color: white;" type="text" name="account_number" id="input" placeholder="ব্যাংক একাউন্ট নির্ধারণ করুন" required>
                                </div>
                                <div class="custom-form-group2" style="background-color: #0B2234;margin-top:20px">
                                    <input style="color: white;" type="text" name="account_name" id="input" placeholder="ব্যাংক অক্কোউন্টধারীর নাম নির্ধারণ করুন" >
                                </div>
                                <div class="custom-form-group2" style="background-color: #0B2234;margin-top:20px">
                                    <select name="account_type" id="" style="width: 100%; background: transparent; border: none; color: #fff;" required>
                                        <option value="">ব্যাংক নাম নির্ধারণ করুন</option>
                                        <option value="bkash">বিকাশ</option>
                                        <option value="nogod">নগদ</option>
                                        <option value="bank">ব্যাংক</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="custom-submit-button6">সাবমিট করুন</button>
                                
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
    $("#amount").on('keyup input', function(){
        var amount = $(this).val();
        $("#amountDisplay").text(amount);
    });
   $("#sendBtn").on('click', function(){
    var amount = $('#amount').val();
    $('.amountDisplay').text(amount);
    $("#voucher").show();
});

</script>