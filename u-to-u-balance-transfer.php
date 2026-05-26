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
            .custom-input {
                width: 97%;
                display: block;
                margin: auto;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 0;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                background: transparent;
            }

            .custom-button {
                background-color: #0B2234;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 0;
                cursor: pointer;
                width: 97%;
                display: block;
                margin: auto;
                margin-bottom: 20px;
            }
        </style>

        <div class="pages">

            <div data-page="index" class="page homepage" style="background-color: #EEEEEE !important;">
                <div class="page-content homepagecontent" style="overflow-x: hidden !important;">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222">
                        <div class="box" style="border:1px solid #12d584;width:90%; margin: 10px auto;">
                            <div class="box-text-wrap">
                                <div class="box-text">ব্যালেন্স ট্রান্সফার </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/add-payment.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <div class="date-wrapper2" style="gap: 1px;">
                            <h4>
                                আপনার নিজস্ব জমা ব্যালেন্স থেকে ট্রান্সফার সম্পন্ন করুন
                            </h4>
                        </div>
                        <div class="date-wrapper2" style="gap: 1px;">
                            <h4 style="display: flex; align-items: center; gap: 5px;">
                                ট্রান্সফারকৃত ব্যালেন্স পরিমান: <?= $member->jfund_balance ?>
                                <img src="https://cdn-icons-png.flaticon.com/128/624/624815.png" 
                                    id="balance" 
                                    data-balance=" <?= $member->jfund_balance ?>" 
                                    alt="" 
                                    width="20px" >
                            </h4>
                        </div>
                        <?php
                        $message = '';

                        if (isset($_POST['submit'])) {

                            $amount      = floatval($_POST['amount']);
                            $username    = trim($_POST['username']);
                            $user_id     = $_SESSION['user_id'];

                            // নিজের তথ্য
                            $user = QB::table('member')->where('id', $user_id)->first();

                            if (!$user) {
                                die("User পাওয়া যায়নি");
                            }

                            // যাকে ট্রান্সফার হবে
                            $receiver = QB::table('member')->where('username', $username)->first();

                            if (!$receiver) {
                                $message = "<div style='color:red;text-align:center'>❌ ইউজার আইডি সঠিক নয় ❌</div>";
                            }

                            // নিজের কাছে ট্রান্সফার বন্ধ
                            elseif ($receiver->id == $user_id) {
                                $message = "<div style='color:red;text-align:center'>❌ নিজের একাউন্টে ট্রান্সফার করা যাবে না ❌</div>";
                            }

                            // amount validation
                            elseif ($amount <= 0) {
                                $message = "<div style='color:red;text-align:center'>❌ সঠিক Amount দিন ❌</div>";
                            }

                            // available balance check
                            elseif ($amount > $user->jfund_balance) {
                                $message = "<div style='color:red;text-align:center'>❌ আপনার ব্যালেন্স কম আছে ❌</div>";
                            }

                            else {

                                // নতুন ব্যালেন্স
                                $senderNewBalance   = $user->jfund_balance - $amount;
                                $receiverNewBalance = $receiver->jfund_balance + $amount;



                                    // sender update
                                    QB::table('member')
                                        ->where('id', $user_id)
                                        ->update([
                                            'jfund_balance' => $senderNewBalance
                                        ]);

                                    // receiver update
                                    QB::table('member')
                                        ->where('id', $receiver->id)
                                        ->update([
                                            'jfund_balance' => $receiverNewBalance
                                        ]);

                                    // transfer history save
                                    QB::table('balance_transfer')->insert([
                                        'sender_id'       => $user_id,
                                        'receiver_id'     => $receiver->id,
                                        'receiver_username' => $receiver->username,
                                        'amount'          => $amount,
                                        'time'      => time(),
                                    ]);


                                    $message = "<div style='color:green;text-align:center'>✅ সফলভাবে ট্রান্সফার হয়েছে ✅</div>";

                                    echo "<script>
                                        setTimeout(function(){
                                            window.location.href='u-to-u-balance-transfer.php';
                                        },2000);
                                    </script>";

                            }
                        }
                        ?>
                        <?= $message ?>
                        <form action="" method="post" id="paymentForm">

                            <div class="date-wrapper2" style="gap:1px;margin-bottom:10px;">
                                <h4 style="flex:2;">
                                    ট্রান্সফার ব্যালেন্স পরিমান
                                </h4>

                                <h4>
                                    <input 
                                        type="number"
                                        name="amount"
                                        id="amount"
                                        min="1"
                                        step="0.01"
                                        required
                                        style="width:120px;background:transparent;border:1px solid #ccc;padding:5px;"
                                        autocomplete="off"
                                    >
                                </h4>
                            </div>

                            <div class="date-wrapper2" style="gap:1px;margin-bottom:10px;">
                                <h4 style="flex:2;">
                                    ইউজার আইডি লিখুন
                                </h4>

                                <h4>
                                    <input 
                                        type="text"
                                        name="username"
                                        id="refer_id"
                                        required
                                        style="width:120px;background:transparent;border:1px solid #ccc;padding:5px;"
                                        autocomplete="off"
                                    >
                                </h4>
                            </div>
                            <span id="refer_id_status" class="text-danger" style="font-weight: bold;text-align: center; margin-bottom: 10px; display: block;"></span>

                            <div class="date-wrapper2" style="gap:1px;">
                                <button 
                                    type="submit"
                                    name="submit"
                                    style="flex:1;padding:8px 14px;font-size:14px;border:1px solid #222;cursor:pointer;"
                                >
                                    ট্রান্সফার করুন
                                </button>
                                <a href="u-to-u-balance-transfer-report.php"
                                    style="flex:1;padding:8px 14px;font-size:14px;border:1px solid #222;color:#0B2234;cursor:pointer;"
                                >
                                    রিপোর্ট
                            </a>
                            </div>

                        </form>

                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
    $("#refer_id").on("keyup", function() {
            var refer_id = $(this).val();
    
            $.ajax({
                url: "ajax/check_refer_id.php",
                method: "POST",
                data: { refer_id: refer_id },
                dataType: "json",
                success: function(response) {                
                    if (response.exists) {
                        $("#refer_id_status").text("রেফারেন্স আইডি সঠিক, নামঃ " + response.name);
                        $("#refer_id_status").css("color", "green");
                    } else {
                        $("#refer_id_status").text("রেফারেন্স আইডি সঠিক নয়");
                        $("#refer_id_status").css("color", "red");
                    }
                }
            });
        });
</script>
<script>
    $("#balance").on('click', function(){
    var balance = $(this).data('balance'); 
    $('#amount').val(balance);
});
</script>