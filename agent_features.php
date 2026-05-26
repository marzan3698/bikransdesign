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


                        <form action="agent_register.php" method="post" enctype="multipart/form-data">
                            <div class="custom-form-group2" style="background-color: #0B2234;">
                                <span class="inline-label" style="color:#12d584;">রেফারেন্স আইডি লিখুন-</span>
                                <input style="color: white;" type="text" id="refer_id" name="refer_id" placeholder="" required>
                            </div>
                            <span id="refer_id_status" class="text-danger" style="font-weight: bold;text-align: center; margin-bottom: 10px; display: block;"></span>
                            <div class="custom-form-group2" style="background-color: #0B2234;">
                                <span class="inline-label" style="color:#12D584;">নতুন নিবন্ধিত মোবাইল নম্বরঃ-</span>
                                <input style="color: white;" type="text" class="form_input" id="phone" name="phone" required>
                            </div>
                            <span id="phone_validation" class="text-danger" style="font-weight: bold;text-align: center; margin-bottom: 10px; display: block;"></span>
                            <?php
                            // Generate a unique username
                            $username = 'BIK' . rand(100000, 999999);
                            ?>
                            <div class="custom-form-group2" style="background-color: #0B2234;">
                                <span class="inline-label" style="color:#12D584;">ইউজার আইডি-</span>
                                <input style="color: white;" type="text" class="form_input" id="username" name="username" value="<?= $username ?>" readonly required>
                            </div>
                            <span id="username_validation" class="text-danger" style="font-weight: bold;color:red;text-align: center; margin-bottom: 10px; display: block;">
                                <?php
                                    $exits_username = QB::table('member')->where('username', $username)->first();
                                    if ($exits_username) {
                                        echo "ইউজার আইডি ইতিমধ্যে ব্যবহৃত হচ্ছে, দয়া করে আবার চেষ্টা করুন।";
                                    }
                                ?>
                            </span>

                            <div class="image-box square">
                                <label class="image-label" style="background-color: #0B2234;">
                                    <img class="previewImage" />
                                    <span class="placeholderText" style="color:#12D584;">ছবি আপলোড করুন</span>
                                    <input type="file" name="photo" accept="image/*" required
                                        onchange="previewPhoto(this)">
                                </label>
                            </div>

                            <div class="image-box">
                                <label class="image-label">
                                    <img class="previewImage" />
                                    <span class="placeholderText" style="color: #12D584;">জাতীয় পরিচয় পত্রের ফন্ট সাইড
                                        ছবি <br> তুলুন অথবা
                                        আপলোড করুন
                                    </span>
                                    <input type="file" name="image" accept="image/*" required
                                        onchange="previewPhoto(this)">
                                </label>
                            </div>

                            <div class="image-box">
                                <label class="image-label">
                                    <img class="previewImage" />
                                    <span class="placeholderText" style="color: #12D584;">জাতীয় পরিচয় পত্রের ব্যাক
                                        সাইড
                                        ছবি <br> তুলুন অথবা
                                        আপলোড করুন</span>
                                    <input type="file" name="nid_back" accept="image/*" required
                                        onchange="previewPhoto(this)">
                                </label>
                            </div>
                            <!-- <p style="padding: 10px; color: #555; font-size: 15px">উপরোক্ত তথ্য যাচাইয়ে ভুল বা অস্পষ্টতা
                                পাওয়া গেলে আইডি স্থগিত করা হতে পারে।</p> -->
                            <?php
                                $exits_username = QB::table('member')->where('username', $username)->first();
                                if ($exits_username) { ?>
                                    <button style="margin-top: -12px !important;" type="submit" class="custom-submit-button4" disabled>সাবমিট করুন</button>
                            <?php }else{ ?>
                                    <button style="margin-top: -12px !important;" type="submit" class="custom-submit-button4">সাবমিট করুন</button>
                            <?php } ?>
                        </form>
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
