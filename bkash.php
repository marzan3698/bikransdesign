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
            #amount{
                width: 136px;
                background: transparent;
                border: none;
                color: #fff;
            }
            #amount::placeholder{
                color: #fff;
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
                        <div class="box" style="padding: 38px 10px;">
                            <div class="box-text-wrap">
                                <div class="box-text"><span style="color: #17D286;">বিকাশ</span> <br> <span
                                        style="color: #17D286;">ক্যাশ আউট</span>
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/14.svg" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <?php
                            $account = QB::table('bank_info')->where('user_id', $_SESSION['user_id'])->where('account_type', 'bkash')->first();
                            if(!$account){
                        ?>
                        <div style="background-color: #12D584; width: 91%; display: block; margin: auto; padding: 10px; text-align: center; font-size: 20px; color: #fff;">
                            গুরুত্বপূর্ণ নোটিশ
                        </div>
                        <div style="width: 93.5%; display: block; margin: auto; padding: 5px; color: #fff; border: 1px solid #12D584; margin-bottom: 10px;">
                            সম্মানিত গ্রাহক,<br>
                            অর্থ উত্তোলনের পূর্বে অনুগ্রহ করে আপনার প্রোফাইলে প্রবেশ করে ব্যাংক তথ্য অপশনে সকল তথ্য সঠিকভাবে যাচাই করুন। প্রয়োজনে তথ্য সংশোধন ও নিশ্চিতকরণ সম্পন্ন করার পরই উত্তোলনের অনুরোধ করুন।<br>
                            সঠিক তথ্য যাচাই করা হলে লেনদেন প্রক্রিয়া দ্রুত ও নিরাপদভাবে সম্পন্ন করা সম্ভব হবে। <br>
                            <span style="text-align:right;display:block">- বিক্রান্স বিজনেস কৰ্তৃপক্ষ</span>

                            <a href="javascript::void(0)" onclick="window.location.href='profile.php'" style="color: #12D584;">প্রোফাইল আপডেট করুন</a>
                        </div>
                        <?php }else{ ?>
                            <table class="table3" style="margin-bottom: 3px;width:98%;">
                                <thead>
                                    <tr>
                                        <th class="ash" style="width: 49%;border:none"> উত্তোলনযোগ্য ব্যালেন্স <br>
                                            <?php echo $member->balance; ?>
                                        </th>
                                        <th class="ash" style="border: none;">ক্যাশ নম্বর <br> <?= $account->account_number ?? '' ?></th>
                                    </tr>
                                </thead>
                            </table>
                            <form action="bkash2.php" method="post">
                                <table class="table4" style="margin-bottom: 3px; ">
                                    <thead>
                                        <tr>
                                            <th style="border:#12D584 solid 5px; color:white; border-right:#12D584 2px solid;">
                                                <input type="number" name="amount" id="amount" placeholder="ক্যাশ আউড পরিমান লিখুন-" required> 
                                            </th>
                                            <th style="border: none; border-top:#12D584 solid 5px;border-bottom:#12D584 solid 5px; color:white;border-right:#12D584 2px solid"><span id="amountDisplay">0</span></th>
                                            <th style="border: none;border-top:#12D584 solid 5px;border-bottom:#12D584 solid 5px;border-right:#12D584 solid 5px;color:white;" id="sendBtn">
                                                <button type="submit" name="submit" style="background: transparent; border: none; color: #fff;">
                                                    সেন্ট করুন
                                                </button>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </form>


                            <table class="table3"
                                style="margin:auto;margin-bottom: 2px;padding:0px; width:97%;border-spacing: 0px;">
                                <thead>
                                    <tr>
                                        <th class="ash" style="border:none; border-right:#0B2234 solid 2px;padding:10px 3px;">
                                            <a href="withdraw-money.php" style="color: #fff;">
                                                ক্যাশ আউট রিপোর্ট দেখুন
                                            </a>
                                        </th>
                                        <th class="ash" style="border: none;padding:10px 3px;">প্রোডাক্ট বা জয়েনিং করাতে
                                            পারেন
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            
                        <?php } ?>

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
</script>