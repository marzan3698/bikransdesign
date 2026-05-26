<?php 
require_once('header.php');
if(!isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1){
    header('Location: login.php');
    exit();
}
?>
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
            <style>
                .password-field {
                    position: relative;
                }

                .toggle-password {
                    position: absolute;
                    right: 0px;
                    top: 50%;
                    transform: translateY(-50%);
                    cursor: pointer;
                    user-select: none;
                } 
            </style>
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

            <div data-page="index" class="page homepage" style="background-color: #EEEEEE !important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <a href="home.php"><h1><span>Bi</span>krans</h1></a>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>

                    <nav class="main-nav"
                        style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222">
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

                                    // folder create if not exists
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
                                /* -------------------- Initialize -------------------- */
                            $photoPath = null;
                            $nidFrontPath = null;
                            $nidBackPath = null;
                            $nid = null;
                            $refer = '';
                            $phone = '';
                            $username = '';
                            $address = '';

                            /* -------------------- Handle Form -------------------- */
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                                $refer    = $_POST['refer_id'] ?? '';
                                $phone    = $_POST['phone'] ?? '';
                                $username = $_POST['username'] ?? '';

                                $photoPath    = uploadImage($_FILES['photo'] ?? null);
                                $nidFrontPath = uploadImage($_FILES['image'] ?? null);
                                $nidBackPath  = uploadImage($_FILES['nid_back'] ?? null);

                                if ($nidFrontPath && $nidBackPath) {

                                    $curl = curl_init();

                                    curl_setopt_array($curl, [
                                        CURLOPT_URL => "https://extractor.proshante.com/api/ocr/extract",
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_POST => true,
                                        CURLOPT_POSTFIELDS => [
                                            'nid_front' => new CURLFile(
                                                $nidFrontPath,
                                                mime_content_type($nidFrontPath),
                                                'nid_front.jpg'
                                            ),
                                            'nid_back' => new CURLFile(
                                                $nidBackPath,
                                                mime_content_type($nidBackPath),
                                                'nid_back.jpg'
                                            )
                                        ],
                                        CURLOPT_HTTPHEADER => [
                                            "Accept: application/json"
                                        ],
                                    ]);

                                    $response = curl_exec($curl);


                                    if (curl_errno($curl)) {
                                        echo "cURL Error: " . curl_error($curl);
                                    }

                                    curl_close($curl);

                                    $result = json_decode($response, true);

                                    // Debug করতে এটা যোগ করুন
                                    // echo "<pre>";
                                    // print_r($result);
                                    // echo "</pre>";
                                    // die();
                                    

                                    if (!empty($result) && isset($result['data'])) {
                                        $nid = $result['data']; 
                                        $refer = $_POST['refer_id']; 
                                        $phone = $_POST['phone']; 
                                        $username = $_POST['username']; 
                                        $address = $result['data']['address'] ?? ''; 
                                    }
                                }
                            }


                                if (isset($_POST['main_form_submit'])) {

                                    $refer = $_POST['refer'];
                                    $phone = $_POST['phone'];
                                    $name = $_POST['name'];
                                    $f_name = $_POST['f_name'];
                                    $m_name = $_POST['m_name'];
                                    $dob = $_POST['dob'];
                                    $nid_no = $_POST['nid_no'];
                                    $address = $_POST['address'];
                                    $password = $_POST['password'];
                                    $confirm_password = $_POST['confirm_password'];
                                    $username = $_POST['username'];
                                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                                    // username check
                                    $existingUser = QB::table('member')->where('username', $username)->first();
                                    if ($existingUser) {
                                        die('ইউজার আইডি ইতিমধ্যে ব্যবহৃত হচ্ছে।');
                                    }

                                    // password check
                                    if ($password !== $confirm_password) {
                                        die('পাসওয়ার্ড মিলেনি।');
                                    }

                                    if (!preg_match('/^[a-zA-Z0-9]+$/', $password)) {
                                        die('পাসওয়ার্ড শুধু ইংরেজি অক্ষর ও সংখ্যা হতে হবে।');
                                    }

                                    // refer check
                                    $referUser = QB::table('member')->where('username', $refer)->first();
                                    if (!$referUser) {
                                        die('রেফারেন্স ভুল হয়েছে।');
                                    }

                                    $refer_id = $referUser->id;

                                    // phone check
                                    $phoneCheck = QB::table('member')->where('phone', $phone)->first();
                                    if ($phoneCheck) {
                                        die('ফোন নম্বর আগে ব্যবহার হয়েছে।');
                                    }

                                    // insert
                                    $insert = QB::table('member')->insert([
                                    'joining_time' => time(),
                                    'name' => $name,
                                    'username' => $_POST['username'], // Unique Username
                                    'phone' => $phone,
                                    'f_name' => $f_name,
                                    'm_name' => $m_name,
                                    'dob' => $dob,
                                    'nid_no' => $nid_no,
                                    'address' => $address,
                                    'refer_id' => $refer_id,
                                    'password' => $hashedPassword, // Hash Password
                                    'show_password' => $password,

                                    // IMAGE PATHS
                                    'image' => $_POST['photo_path'],
                                    'p_nid_front' => $_POST['front_path'],
                                    'p_nid_back' => $_POST['back_path'],
                                    'register_userid' => $_SESSION['user_id'],
                                ]);

                                    if ($insert) {

                                        $insertedUser = QB::table('member')->where('username', $username)->first();
                                        $insertedUserId = $insertedUser->id;

                                        $order_id = $_GET['order_id'] ?? null;

                                        sms_send_joining($phone, $username, $password);

                                            echo '<h3 style="color: green; text-align:center;">✅ সফলভাবে নিবন্ধন হয়েছে</h3>';

                                            echo "<script>
                                                setTimeout(function(){
                                                    window.location.href = 'order-summary3.php?order_id={$order_id}';
                                                }, 1000);
                                            </script>";
                                        
                                    }

                                    die();
                                }
                            ?>
                        <div class="contactform p-3">
                            <form action="" method="post" autocomplete="off">
                                <div class="box">
                                    <div class="box-text-wrap">
                                        <div class="box-text">প্রতিনিধি <br> নিবন্ধন ফরম</div>
                                    </div>
                                    <div class="box-img-wrap">
                                        <div style="border: 1px solid #12d584;width: 154px;height: 192px;">
                                            <img src="<?= $photoPath ?>" alt="" class="box-img"
                                                style="display: block; width: 144px; height: 182px; border: 1px solid #12d584;; margin: auto; margin-top: 4px; background:white">
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">রেফারেন্স আইডিঃ-</span>
                                    <input type="text" name="refer" id="refer_id" value="<?= htmlspecialchars($refer) ?>">
                                </div>
                                <span id="refer_id_status" class="text-danger" style="font-weight: bold;text-align: center; margin-bottom: 10px; display: block;"></span>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">নতুন নিবন্ধিত মোবাইলঃ-</span>
                                    <input type="text" name="phone" id="phone" value="<?= $phone ?? '' ?>" required>
                                </div>
                                <span id="phone_validation" class="text-danger" style="font-weight: bold;text-align: center; margin-bottom: 10px; display: block;"></span>


                                    <div class="custom-form-group2 white-bg">
                                        <span class="inline-label">ইউজার আইডি-</span>
                                        <input type="text" id="username" name="username" value="<?= $username ?? '' ?>" readonly required>
                                    </div>
                           


                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">নামঃ-</span>
                                    <input type="text" name="name" value="<?= $nid['b_name'] ?? '' ?>" required>
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">পিতাঃ-</span>
                                    <input type="text" name="f_name" value="<?= $nid['f_name'] ?? '' ?>" >
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">মাতাঃ-</span>
                                    <input type="text" name="m_name" value="<?= $nid['m_name'] ?? '' ?>" >
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">জন্ম তারিখঃ-</span>
                                    <input type="text" name="dob" value="<?= $nid['dob'] ?? '' ?>" >
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">NID নম্বরঃ-</span>
                                    <input type="text" name="nid_no" value="<?= $nid['nid'] ?? '' ?>" >
                                </div>

                                <div class="custom-form-group3" style="background-color: white;">
                                    <span class="inline-label" style="display: block;text-align:center">বিস্তারিত
                                        ঠিকানাঃ-</span><br>
                                    <textarea name="address"
                                        style="display: block; width: 100%; background: transparent; border: none;"><?= $nid['address'] ?? '' ?></textarea>
                                </div>


                                <div class="custom-form-group image-box">
                                    <label class="image-label">
                                        <img class="previewImage" src="<?= $nidFrontPath ?>" style="display: block;" />
                                        <span class="placeholderText">জাতীয় পরিচয় পত্রের ফ্রন্ট সাইড আপলোড করুন</span>
                                    </label>
                                </div>

                                <div class="custom-form-group image-box">
                                    <label class="image-label">
                                        <img class="previewImage" src="<?= $nidBackPath ?>" style="display: block;" />
                                        <span class="placeholderText">জাতীয় পরিচয় পত্রের ব্যাক সাইড আপলোড করুন</span>
                                    </label>
                                </div>

                                <div class="custom-form-group2 white-bg password-wrapper">
                                    <span class="inline-label">পাসওয়ার্ড প্রদান করুন-</span>
                                    <div class="password-field">
                                        <input type="password" name="password" id="password" required>
                                        <span class="toggle-password" onclick="togglePassword('password', this)">👁</span>
                                    </div>
                                </div>

                                <div class="custom-form-group2 white-bg password-wrapper">
                                    <span class="inline-label">পুনরায় পাসওয়ার্ড লিখুন-</span>
                                    <div class="password-field">
                                        <input type="password" name="confirm_password" id="confirm_password" required>
                                        <span class="toggle-password" onclick="togglePassword('confirm_password', this)">👁</span>
                                    </div>
                                </div>
                                <div id="password-check" style="text-align: center;"></div>
                                <input type="hidden" name="photo_path" value="<?= $photoPath ?>">
                                <input type="hidden" name="front_path" value="<?= $nidFrontPath ?>">
                                <input type="hidden" name="back_path" value="<?= $nidBackPath ?>">

                                <p style="padding: 10px; color: #555; font-size: 13px">উপরোক্ত তথ্য যাচাইয়ে ভুল বা
                                    অস্পষ্টতা
                                    পাওয়া গেলে আইডি স্থগিত করা হতে পারে।</p>
                                <!-- <?php if (!empty($photoPath)): ?>
                                    <img src="<?= $photoPath ?>" width="120">
                                <?php endif; ?>

                                <?php if (!empty($nidFrontPath)): ?>
                                    <img src="<?= $nidFrontPath ?>" width="120">
                                <?php endif; ?>

                                <?php if (!empty($nidBackPath)): ?>
                                    <img src="<?= $nidBackPath ?>" width="120">
                                <?php endif; ?> -->

                                <button type="submit" name="main_form_submit" class="custom-submit-button4">
                                    সাবমিট করুন
                                </button>
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
    function togglePassword(id, el) {
        var input = document.getElementById(id);
        if (input.type === "password") {
            input.type = "text";
            el.textContent = "🙈";
        } else {
            input.type = "password";
            el.textContent = "👁";
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
    $("#password, #confirm_password").on("keyup", function () {
        var password = $("#password").val();
        var confirmPassword = $("#confirm_password").val();

        if (password.length === 0 && confirmPassword.length === 0) {
            $("#password-check").text("");
            return;
        }

        if (password !== confirmPassword) {
            $("#password-check").text("পাসওয়ার্ড মিলেনি।").css("color", "red");
        } else {
            $("#password-check").text("পাসওয়ার্ড মিলেছে।").css("color", "green");
        }
    });
</script>