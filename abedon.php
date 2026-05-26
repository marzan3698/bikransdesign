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
            .submit-btn {
                width: 100%;
                padding: 8px;
                background: #27ae60;
                border: none;
                font-size: 16px;
                color: #fff;
            }

            .delete-btn {
                width: 100%;
                padding: 8px;
                background: #c0392b;
                border: none;
                font-size: 16px;
                color: #fff;
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
                    <nav class="main-nav" style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222; min-height:calc(100vh - 105px);">

                        <div class="withdrawal-container">
                            <div class="balance-header" style="border: 1px solid #12d584; padding: 50px 20px; color: #222 !important; margin-bottom: 5px;">
                                <div class="available-balance" style="font-size: 20px;">
                                    বিক্র্যান্স বিজনেস সদস্যপদ ও <br> অঙ্গীকারনামা আবেদন ফরম
                                </div>
                            </div>
                            <div class="balance-header" style="background-color: #0B2234;padding: 15px;">
                                <div class="available-balance" style="color: #fff;">
                                    স্বপ্ন পূরণের অভিযাত্রা ৩৬৫ দিন
                                </div>
                            </div>

                            <?php
                            if (isset($_POST['delete'])) {
                                $exists = QB::table('abedon')
                                    ->where('user_id', $_SESSION['user_id'])
                                    ->first();

                                if ($exists) {
                                    QB::table('abedon')
                                        ->where('user_id', $_SESSION['user_id'])
                                        ->delete();

                                    echo "<div style='color: red; text-align: center;'>আবেদন সফলভাবে ডিলেট হয়েছে</div>";
                                } else {
                                    echo "<div style='color: red; text-align: center;'>কোন আবেদন পাওয়া যায়নি</div>";
                                }
                            }
                            function uploadImage($file, $folder = 'uploads/abedon/')
                            {
                                if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
                                    return null;
                                }

                                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                                $allowed = ['jpg', 'jpeg', 'png', 'webp'];

                                if (!in_array(strtolower($ext), $allowed)) {
                                    return null;
                                }

                                $fileName = uniqid() . '.' . $ext;
                                $path = $folder . $fileName;

                                if (move_uploaded_file($file['tmp_name'], $path)) {
                                    return $path;
                                }

                                return null;
                            }
                            if (isset($_POST['formsubmit'])) {
                                $uploadedPath = uploadImage($_FILES['application_form']);
                                $checkExisting = QB::table('abedon')->where('user_id', $_SESSION['user_id'])->first();
                                if ($checkExisting) {
                                    echo "<div style='color: red; margin-top: 10px;text-align: center;'>❌❌আপনি ইতিমধ্যে একটি আবেদন জমা দিয়েছেন।❌❌</div>";
                                } else {
                                    $insert = QB::table('abedon')->insert([
                                        'user_id' => $_SESSION['user_id'],
                                        'time' => time(),
                                        'file_path' => $uploadedPath,
                                    ]);
                                    if ($insert) {
                                        echo "<div style='color: green; margin-top: 10px;text-align: center;'>✅✅আবেদন সফলভাবে হয়েছে✅✅</div>";
                                    } else {
                                        echo "<div style='color: red; margin-top: 10px;text-align: center;'>❌❌ফাইল আপলোড ব্যর্থ হয়েছে। অনুগ্রহ করে একটি বৈধ ছবি ফাইল নির্বাচন করুন।❌❌</div>";
                                    }
                                }
                            }
                            ?>
                            <?php
                            if ($member->update_status == 0) {
                                echo '<span style="color:red;text-align:center;display:block;margin:5px">❌আবেদন করার পূর্বে অনুগ্রহ করে <br> আপনার প্রোফাইল আপডেট করুন</span>';
                            } elseif ($member->update_status == 1) {
                            ?>
                                <div class="balance-header" style="display: flex; align-items: center; justify-content: space-between; background-color: #12E586; padding: 5px; margin-top: 5px; border: 2px solid #0B2234;">
                                    <div style="font-weight: 600;font-size: 18px; color: #222;">
                                        আপনার আবেদন আপলোড করুন
                                    </div>


                                    <form action="" method="post" enctype="multipart/form-data">

                                        <label for="application_form" style="cursor: pointer;">
                                            <img src="https://cdn-icons-png.flaticon.com/128/15480/15480917.png" width="50px">
                                        </label>
                                        <input type="file" name="application_form" id="application_form" style="display: none;">


                                </div>
                            <?php } ?>

                            <img src="images/custom/bikrans-logo.png" alt="Logo" style="width: 100%; margin-top: 10px;">
                            <?php
                            $submitedAbedon = QB::table('abedon')->where('user_id', $_SESSION['user_id'])->first();

                            if ($submitedAbedon && $submitedAbedon->status == 2) {
                                echo '<div style="padding: 8px; background: #c0392b; text-align: center; color: #fff; font-size: 18px;">আপনার আবেদন রিজেক্ট করা হয়েছে। অনুগ্রহ করে পুনরায় আবেদন করুন।  </div>';
                            }

                            if ($submitedAbedon) {
                                echo '<img src="' . $submitedAbedon->file_path . '" alt="Logo" id="previewImage" style="width: 100%; margin-top: 10px;">';
                            } else {
                                echo '<img src="" alt="Logo" id="previewImage" style="width: 100%; margin-top: 10px;display:none">';
                            }
                            ?>

                            <div style="display: flex; gap:10px;margin-bottom:20px">
                                <?php if (!$submitedAbedon) { ?>
                                <div style="width:100%">
                                    <button type="submit" name="formsubmit" class="submit-btn">সাবমিট করুন</button>
                                </div>
                                <?php } else { ?>
                                    <div style="width:50%">
                                        <button type="submit" name="formsubmit" class="submit-btn">সাবমিট করুন</button>
                                    </div>
                                    </form>
                                    <div style="width:50%">
                                          <form action="" method="post">
                                            <button type="submit" name="delete" class="delete-btn" onclick="return confirm('আপনি কি আপনার আবেদনটি ডিলেট করতে চান? ')">ডিলেট করুন</button>
                                          </form>
                                    </div>
                                <?php } ?>

                            </div>

                            


                        </div>
                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
    document.getElementById('application_form').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('previewImage');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    });
</script>