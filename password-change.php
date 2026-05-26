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
                                <div class="box-text" style="color:#12D584;">পাসওয়ার্ড <br> পরিবর্তন করুন</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/68.png" alt="" class="box-img">
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['password_change'])){
                                $old_password = $_POST['old_password'];
                                $new_password = $_POST['new_password'];
                                $confirm_password = $_POST['confirm_password'];

                                // Check empty
                                if(empty($old_password) || empty($new_password) || empty($confirm_password)){
                                    echo "<script>alert('সব ফিল্ড পূরণ করুন');</script>";
                                }

                                // Verify old password (hashed)
                                elseif(!password_verify($old_password, $member->password)){
                                    echo "<script>alert('পুরাতন পাসওয়ার্ড সঠিক নয়');</script>";
                                }

                                // Check new password match
                                elseif($new_password !== $confirm_password){
                                    echo "<script>alert('নতুন পাসওয়ার্ড এবং নিশ্চিত পাসওয়ার্ড মিলছে না');</script>";
                                }

                                else {
                                    // Hash new password
                                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                                    // Update password
                                    $update = $mysqli->prepare("UPDATE member SET password = ?, show_password = ? WHERE id = ?");
                                    $update->execute([$hashed_password, $new_password, $member->id]);

                                    echo '<span style="color:green">পাসওয়ার্ড সফলভাবে পরিবর্তন হয়েছে।</span>';

                                    echo "<script>
                                            setTimeout(() => {
                                                window.location.href='home.php';
                                            }, 1000);
                                        </script>";
                                }
                            }
                            ?>

                        <form action="" method="post">
                            <div class="custom-form-group2" style="background-color: #0B2234;">
                                <span class="inline-label" style="color:#12D584;"> পুরাতন পাসওয়ার্ড লিখুন-</span>
                                <input style="color: white;" type="password" class="form_input" id="old_password" name="old_password" required>
                            </div>
                            <div class="custom-form-group2" style="background-color: #0B2234;">
                                <span class="inline-label" style="color:#12D584;"> নতুন পাসওয়ার্ড লিখুন-</span>
                                <input style="color: white;" type="password" class="form_input" id="new_password" name="new_password" required>
                            </div>
                            <div class="custom-form-group2" style="background-color: #0B2234;">
                                <span class="inline-label" style="color:#12D584;"> নতুন পাসওয়ার্ড নিশ্চিত করুন-</span>
                                <input style="color: white;" type="password" class="form_input" id="confirm_password" name="confirm_password" required>
                            </div>

                            <button style="margin-top: -12px !important;" type="submit" name="password_change"
                                class="custom-submit-button4">পাসওয়ার্ড পরিবর্তন করুন</button>

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
                    $("#refer_id_status").text("রেফারেন্স আইডি সঠিক");
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
