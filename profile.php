<?php require_once('header.php'); ?>

<div class="statusbar-overlay"></div>
<div class="panel-overlay"></div>

<div class="views">
    <div class="view view-main">
        <div class="pages">
            <div data-page="profile" class="page">
                <div class="page-content" style="background-color: #0B2234;">
                    <style>
                        .switch {
                            position: relative;
                            display: inline-block;
                            width: 40px;
                            height: 20px;
                            float: right;
                            margin-right: 22px;
                        }
                        .user_avatar img{
                            width: 120px;
                            height: 120px;
                            border-radius: 50%;
                        }
                    </style>
                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <div class="user_login_info" style="margin-top: 50px;">
                        <div class="user_thumb" style="padding-top: 30px;">
                            <?php
                                if($member->image != null){
                                    $pp = $member->image;
                                }else{
                                    $pp = 'https://static.vecteezy.com/system/resources/previews/024/766/958/non_2x/default-male-avatar-profile-icon-social-media-user-free-vector.jpg';
                                }
                            ?>
                            <div class="user_avatar"><img src="<?= $pp ?>" alt="" title="" /></div>
                            <div class="user_details">
                                <p style="color: #12D584;">Welcome <span style="color: #12D584; "><?php echo $member->name; ?></span></p>
                            </div>
                            <div class="user_social">
                                <p style="font-size:18px; color:white">আপনার উপর শান্তি বর্ষিত হোক</p>
                            </div>
                        </div>

                        <nav class="user-nav" style="margin-bottom: 20px;background:#0B2234;width:110%;margin-left:-10%">
                            <ul>
                                <li style="padding-bottom: 13px;" onclick="window.location.href='profile-edit.php'">
                                    <span style="color: #12D584;">নামঃ  <?php echo $member->name; ?></span>
                                </li>
                                <li style="padding-bottom: 13px;">
                                    <span style="color: #12D584;">আইডিঃ <?php echo $member->username; ?></span>
                                </li>
                                <li style="padding-bottom: 13px;">
                                    <span style="color: #12D584;">মোবাইলঃ <?php echo $member->phone; ?></span>
                                </li>
                                <li style="padding-bottom: 13px;" onclick="window.location.href='profile-edit.php'">
                                    <span style="color: #12D584;">হোয়াটসঅ্যাপ নম্বর: <?= $member->whatsapp ?></span>
                                </li>
                                <li style="padding-bottom: 13px;">
                                    <span style="color: #12D584;">পাসওয়ার্ড <div style="display: inline-block;" id="passwordText">••••••••</div>&nbsp; </span>
                                    <img 
                                    id="togglePasswordBtn"
                                    src="https://cdn-icons-png.flaticon.com/128/822/822102.png" 
                                    width="20px" 
                                    alt="Show Password"
                                    style="cursor: pointer;"
                                    onclick="togglePassword('<?php echo htmlspecialchars($member->show_password); ?>')"
                                    >
                                    <label class="switch" onclick="window.location.href='password-change.php'"><input type="checkbox"><span class="slider"></span></label>
                                </li>
                                
                                <li style="padding-bottom: 13px;" >
                                    <span style="color: #12D584;">জয়েনিং তারিখঃ <?php echo date('d M Y, h:i A', $member->joining_time); ?></span>
                                    <label class="switch"><input type="checkbox"><span class="slider"></span></label>
                                </li>
                                 <li style="padding-bottom: 13px;"><span style="color: #12D584;">ছবি তথ্য</span> <label
                                        class="switch"><input type="checkbox"><span class="slider"></span></label></li>
                                <li style="padding-bottom: 13px;" onclick="window.location.href='profile-edit.php'">
                                    <span style="color: #12D584;">জাতীয় পরিচয় পত্র: <?php echo $member->nid_no ?? 'নাই'; ?></span>
                                    <label class="switch"><input type="checkbox"><span class="slider"></span></label>
                                </li>
                                <li style="padding-bottom: 13px;" onclick="window.location.href='profile-edit.php'">
                                    <span style="color: #12D584;">নমিনি তথ্য: 
                                        <br>নমিনি নাম: <?php echo $member->nominee_name ?? 'নাই'; ?><br>
                                        নমিনি সম্পর্ক: <?php echo $member->nominee_relation ?? 'নাই'; ?>
                                    <br>
                                 </span>
                                    <label class="switch"><input type="checkbox"><span class="slider"></span></label>
                                </li>
                               
                                <li style="padding-bottom: 13px;" onclick="window.location.href='profile-edit.php'">
                                    <span style="color: #12D584;">ব্যাক্তিগত বিস্তারিত
                                        তথ্য</span> <?= $member->short_desc ?>
                                        <label class="switch"><input type="checkbox">
                                        <span class="slider"></span></label>
                                        </li>
                                <li style="padding-bottom: 13px;" onclick="window.location.href='profile-edit.php'"><span style="color: #12D584;">গুরুত্বপূর্ণ
                                        সেটিং</span> <label class="switch"><input type="checkbox"><span
                                            class="slider"></span></label></li>
                                
                                <li style="padding-bottom: 2px;" onclick="window.location.href='profile-edit.php'"><span style="color: #12D584;">তথ্য
                                        হালনাগাদ</span>
                                    <label
                                        class="switch"><input type="checkbox"><span class="slider"></span></label>
                                </li>
                                <li style="padding-bottom: 2pxpx;" onclick="window.location.href='account-settings.php'"><span style="color: #12D584;">কমিশন ব্যাংক/বিকাশ আপডেট আবেদন</span>
                                    <label
                                        class="switch"><input type="checkbox"><span class="slider"></span></label>
                                </li>
                                <li style="padding-bottom: 2pxpx;" onclick="window.location.href='profile-edit.php'"><span style="color: #12D584;">যেকোনো তথ্য আপডেট আবেদন</span>
                                    <label
                                        class="switch"><input type="checkbox"><span class="slider"></span></label>
                                </li>
                                
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
<script>
let isPasswordVisible = false;

function togglePassword(actualPassword) {
    const passwordText = document.getElementById('passwordText');
    const toggleBtn = document.getElementById('togglePasswordBtn');

    if (isPasswordVisible) {
        // Hide password
        passwordText.textContent = '••••••••';
        toggleBtn.src = 'https://cdn-icons-png.flaticon.com/128/822/822102.png'; // eye icon
        toggleBtn.alt = 'Show Password';
    } else {
        // Show password
        passwordText.textContent = actualPassword;
        toggleBtn.src = 'https://cdn-icons-png.flaticon.com/128/709/709612.png'; // eye-slash icon
        toggleBtn.alt = 'Hide Password';
    }

    isPasswordVisible = !isPasswordVisible;
}
</script>
