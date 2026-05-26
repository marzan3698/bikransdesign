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
                                <div class="box-text" style="color:#12D584;">প্রোফাইল <br> আপডেট করুন</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/68.png" alt="" class="box-img">
                            </div>
                        </div>

                        <?php
                            function uploadImage($file, $folder = 'uploads/profile/')
                            {
                                if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
                                    return null;
                                }

                                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                                $allowed = ['jpg', 'jpeg', 'png', 'webp'];

                                if (!in_array($ext, $allowed)) {
                                    return null;
                                }

                                if (!is_dir($folder)) {
                                    mkdir($folder, 0777, true);
                                }

                                $fileName = uniqid() . '.' . $ext;
                                $path = $folder . $fileName;

                                if (move_uploaded_file($file['tmp_name'], $path)) {
                                    return $path;
                                }

                                return null;
                            }

                            if (isset($_POST['profile_update'])) {
                                $user_id = $_GET['user_id'];

                                $nid_no = $_POST['nid_no'];
                                $exits = QB::table('member')->where('nid_no', $nid_no)->where('id', '!=', $user_id)->first();
                                if ($exits) {
                                    echo '<span style="color:red;text-align:center">এই জাতীয় পরিচয় পত্র নম্বরটি ইতিমধ্যে ব্যবহৃত হয়েছে।</span>';
                                    exit;
                                }

                                $whatsapp = $_POST['whatsapp'];
                                $exits = QB::table('member')->where('whatsapp', $whatsapp)->where('id', '!=', $user_id)->first();
                                if ($exits) {
                                    echo '<span style="color:red;text-align:center">এই হোয়াটসঅ্যাপ নম্বরটি ইতিমধ্যে ব্যবহৃত হয়েছে।</span>';
                                    exit;
                                }

                                // পুরনো ডেটা নিন
                                $old = QB::table('member')->where('id', $user_id)->first();

                                $photoPath    = uploadImage($_FILES['photo']);
                                $nidFrontPath = uploadImage($_FILES['image']);
                                $nidBackPath  = uploadImage($_FILES['nid_back']);

                                // ভ্যালিডেশন: ছবি, NID ফ্রন্ট, NID ব্যাক — নতুন বা পুরনো থাকতে হবে
                                $hasPhoto    = $photoPath || $old->image;
                                $hasNidFront = $nidFrontPath || $old->p_nid_front;
                                $hasNidBack  = $nidBackPath || $old->p_nid_back;

                                if (!$hasPhoto || !$hasNidFront || !$hasNidBack) {
                                    $missing = [];
                                    if (!$hasPhoto)    $missing[] = 'ছবি';
                                    if (!$hasNidFront) $missing[] = 'জাতীয় পরিচয় পত্রের ফ্রন্ট সাইড';
                                    if (!$hasNidBack)  $missing[] = 'জাতীয় পরিচয় পত্রের ব্যাক সাইড';

                                    echo '<span style="color:red;text-align:center">অনুগ্রহ করে নিম্নলিখিত ফাইলগুলো আপলোড করুন: ' . implode(', ', $missing) . '</span>';
                                    exit;
                                }

                                $data = [
                                    'whatsapp'         => $_POST['whatsapp'],
                                    'nominee_name'     => $_POST['nominee_name'],
                                    'nominee_relation' => $_POST['nominee_relation'],
                                    'nid_no'           => $_POST['nid_no'],
                                    'update_status'    => 1,
                                ];

                                if ($photoPath)    $data['image']       = $photoPath;
                                if ($nidFrontPath) $data['p_nid_front'] = $nidFrontPath;
                                if ($nidBackPath)  $data['p_nid_back']  = $nidBackPath;

                                QB::table('member')->where('id', $user_id)->update($data);

                                echo '<span style="color:green;text-align:center">প্রোফাইল তথ্য সফলভাবে আপডেট হয়েছে।</span>';
                                echo "<script>setTimeout(() => { window.location.href='profile.php'; }, 1000);</script>";
                            }
                            ?>

                            <span id="refer_id_status" class="text-danger" style="font-weight: bold;text-align: center; margin-bottom: 10px; display: block;"></span>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="custom-form-group2" style="background-color: #0B2234;">
                                    <span class="inline-label" style="color:#12D584;">হোয়াটসঅ্যাপ নম্বরঃ-</span>
                                    <input style="color: white;" type="text" class="form_input" id="whatsapp" name="whatsapp" value="<?= $member->whatsapp ?>" required>
                                </div>

                                <div class="custom-form-group2" style="background-color: #0B2234;">
                                    <span class="inline-label" style="color:#12D584;">জাতীয় পরিচয় পত্র নম্বরঃ-</span>
                                    <input style="color: white;" type="text" class="form_input" id="nid_no" name="nid_no" required value="<?= $member->nid_no ?>">
                                </div>

                                <div class="custom-form-group2" style="background-color: #0B2234;">
                                    <span class="inline-label" style="color:#12D584;">নমিনী নাম-</span>
                                    <input style="color: white;" type="text" class="form_input" id="nominee_name" name="nominee_name" value="<?= $member->nominee_name ?>">
                                </div>

                                <div class="custom-form-group2" style="background-color: #0B2234;">
                                    <span class="inline-label" style="color:#12D584;">নমিনী সম্পর্ক-</span>
                                    <input style="color: white;" type="text" class="form_input" id="nominee_relation" name="nominee_relation" value="<?= $member->nominee_relation ?>">
                                </div>

                                <!-- প্রোফাইল ছবি -->
                                <div class="image-box square">
                                    <label class="image-label" style="background-color: #0B2234;">
                                        <img class="previewImage" src="<?= $member->image ?>" />
                                        <span class="placeholderText" style="color:#12D584;">ছবি আপলোড করুন</span>
                                        <input type="file" name="photo" accept="image/*" onchange="previewPhoto(this)">
                                    </label>
                                </div>

                                <!-- NID ফ্রন্ট: আগে না থাকলে দেখাবে -->
                                
                                    <div class="image-box">
                                        <label class="image-label">
                                            <img class="previewImage" />
                                            <span class="placeholderText" style="color: #12D584;">জাতীয় পরিচয় পত্রের ফন্ট সাইড ছবি <br> তুলুন অথবা আপলোড করুন</span>
                                            <input type="file" name="image" accept="image/*" onchange="previewPhoto(this)">
                                        </label>
                                    </div>
                                

                                <!-- NID ব্যাক: আগে না থাকলে দেখাবে -->
                              
                                    <div class="image-box">
                                        <label class="image-label">
                                            <img class="previewImage" />
                                            <span class="placeholderText" style="color: #12D584;">জাতীয় পরিচয় পত্রের ব্যাক সাইড ছবি <br> তুলুন অথবা আপলোড করুন</span>
                                            <input type="file" name="nid_back" accept="image/*" onchange="previewPhoto(this)">
                                        </label>
                                    </div>
                        

                                <button style="margin-top: -12px !important;" type="submit" name="profile_update" class="custom-submit-button4">আপডেট করুন</button>

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
