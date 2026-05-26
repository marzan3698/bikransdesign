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

            <div data-page="index" class="page homepage" style="background-color: #0B2234!important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 65px !important; width: 95%; margin: auto; border: 1px solid #222">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text" style="color:#12D584;">প্রতিনিধি <br> নিবন্ধন করুন</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/68.png" alt="" class="box-img">
                            </div>
                        </div>

                        <div class="box">
                            <div style="width: 100%;">
                                <div class="box-text" style="color:#fff;">নিবন্ধন করতে তিনটি ধাপ অনুসরণ করুন</div>
                            </div>
                        </div>
                        


                        <div style="display: flex;width: 96.5%; margin: auto;margin-top:10px !important">
                            <div style="width: 15%;background: #fff; text-align: center;padding:5px;font-size:16px;font-weight:900">
                                ১
                            </div>
                            <?php if(isset($_GET['refer_id'])){ ?>    
                                <div style="width: 60%;border:1px solid #fff; text-align: center;padding:5px;color:#fff;font-size:16px">
                                    রেফারেন্স আইডি দিন 👉
                                </div>                            
                            <?php }else{ ?>
                                <div style="width: 60%;border:1px solid #fff; text-align: center;padding:5px;color:#fff;font-size:16px" onclick="window.location.href='features.php'">
                                    রেফারেন্স আইডি দিন 👉
                                </div>
                            <?php } ?>
                            <div style="width: 25%;background: #fff; text-align: center;padding:5px;font-size:14px; margin-left:5px;">
                                <?php
                                if(isset($_GET['username_id'])){
                                    $status_info = QB::table('status_info')->where('register_user_id', $_GET['username_id'])->first();
                                    if($status_info->reference_status == 1){
                                        echo '<span style="color:green">সম্পন্ন হয়েছে<span>';
                                    }else{
                                        echo '<span style="color:red">অসম্পূর্ণ রয়েছে<span>';
                                    }
                                }else{
                                    echo '<span style="color:red">অসম্পূর্ণ রয়েছে<span>';
                                }
                            ?>  
                            </div>
                        </div>

                        <div style="display: flex;width: 96.5%; margin: auto;margin-top:10px !important">
                            <div style="width: 15%;background: #fff; text-align: center;padding:5px;font-size:16px;font-weight:900">
                                ২
                            </div>
                            <?php if(isset($_GET['username_id'])){ ?>    
                                <div style="width: 60%;border:1px solid #fff; text-align: center;padding:5px;color:#fff;font-size:16px" onclick="window.location.href='create-order.php?username_id=<?php echo $_GET['username_id']; ?>'">
                                    প্রোডাক্ট অর্ডার করুন 👉
                                </div>
                            <?php }else{ ?>
                                <div style="width: 60%;border:1px solid #fff; text-align: center;padding:5px;color:#fff;font-size:16px">
                                    প্রোডাক্ট অর্ডার করুন 👉
                                </div>
                            <?php } ?>
                            <div style="width: 25%;background: #fff; text-align: center;padding:5px;font-size:14px; margin-left:5px;">
                                <?php
                                    if(isset($_GET['username_id'])){
                                        $check = QB::table('status_info')->where('register_user_id', $_GET['username_id'])->orderBy('id', 'desc')->first();
                                        if($check->order_status == 1){
                                            echo '<span style="color:green">সম্পন্ন হয়েছে<span>';
                                        }else{
                                            echo '<span style="color:red">অসম্পূর্ণ রয়েছে<span>';
                                        }
                                    }else{
                                        echo '<span style="color:red">অসম্পূর্ণ রয়েছে<span>';
                                    }
                                ?>
                                
                            </div>
                        </div>

                        <div style="display: flex;width: 96.5%; margin: auto;margin-top:10px !important">
                            <div style="width: 15%;background: #fff; text-align: center;padding:5px;font-size:16px;font-weight:900">
                                ৩
                            </div>
                            <div style="width: 60%;border:1px solid #fff; text-align: center;padding:5px;color:#fff;font-size:16px">
                                 <?php
                                if(isset($_GET['username_id'])){
                                    $referID = $_GET['username_id'];
                                    $order = QB::table('status_info')->where('register_user_id', $referID)->orderBy('id', 'desc')->first();
                                    $orderId = $order->order_id ?? 0;
                                    echo '<span style="cursor:pointer;" onclick="window.location.href=\'order-summary2.php?order_id='.$orderId.'\'">ডেলিভারির ঠিকানা দিন 👉</span>';
                                }else{
                                    echo 'ডেলিভারির ঠিকানা দিন 👉';
                                }
                                ?>
                                
                            </div>
                            <div style="width: 25%;background: #fff; text-align: center;padding:5px;font-size:14px; margin-left:5px;">
                                <?php
                                    if(isset($_GET['username_id'])){
                                        $check = QB::table('status_info')->where('register_user_id', $_GET['username_id'])->orderBy('id', 'desc')->first();
                                        if($check->delivery_status == 1){
                                            echo '<span style="color:green">সম্পন্ন হয়েছে<span>';
                                        }else{
                                            echo '<span style="color:red">অসম্পূর্ণ রয়েছে<span>';
                                        }
                                    }else{
                                        echo '<span style="color:red">অসম্পূর্ণ রয়েছে<span>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                            if(isset($_GET['username_id'])){
                                if($status_info->reference_status == 1){
                                    echo '<div style="text-align: center; color: #fff; font-size: 20px; margin-top: 20px;">
                                        সফল ভাবে নিবন্ধন সম্পন্ন হয়েছে   
                                    </div>';
                                }
                            }
                        ?> 
                        <?php 
                            if(isset($_GET['username_id'])){
                                if($status_info->order_status == 1 && $status_info->reference_status == 1 && $status_info->delivery_status == 1){ 
                        ?>
                            <div style="text-align: center; color: #fff; font-size: 14px; margin-top: 22px; background: #00CC99; padding: 10px;" onclick="window.location.href='profile-edit2.php?user_id=<?= $status_info->register_user_id ?>'">
                                এই পর্যায়ে প্রোফাইল আপলোড করে বিজনেস শুরু করুন
                            </div>
                        <?php 
                                }
                            }
                        ?>



                        
                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
    function previewPhoto(input) {
        const box = input.closest('.image-label');
        const preview = box.querySelector('.previewImage');
        const placeholder = box.querySelector('.placeholderText');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                placeholder.style.display = 'none';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
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

    $("#phone").on("keyup", function() {
        var phone = $(this).val();

        $.ajax({
            url: "ajax/check_phone.php",
            method: "POST",
            data: { phone: phone },
            dataType: "json",
            success: function(response) {
                if (response.exists) {
                    $("#phone_validation").text("এই মোবাইল নম্বরটি ইতিমধ্যে নিবন্ধিত");
                    $("#phone_validation").css("color", "red");
                } else {
                    $("#phone_validation").text("");
                }
            }
        });
    });
</script>
