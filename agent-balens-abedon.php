<?php require_once('header.php'); ?>
<div class="statusbar-overlay"></div>
<div class="panel-overlay"></div>
<?php require_once('sidebar.php'); ?>

<div class="panel panel-right panel-reveal">
    <link href="css/custom2.css" rel="stylesheet">
    <div class="user_login_info">
        <div class="user_thumb">
            <div class="user_avatar"><img src="images/avatar.jpg" alt="" /></div>
            <div class="user_details"><p>Welcome <span>John Doe</span></p></div>
            <div class="user_social">
                <ul>
                    <li><a href="http://twitter.com/" class="external"><img src="images/icons/green/twitter.png" alt="" /></a></li>
                    <li><a href="http://www.facebook.com/" class="external"><img src="images/icons/green/facebook.png" alt="" /></a></li>
                    <li><a href="http://plus.google.com" class="external"><img src="images/icons/green/gplus.png" alt="" /></a></li>
                </ul>
            </div>
        </div>
        <nav class="user-nav">
            <ul>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/settings.png" alt="" /><span>Account Settings</span></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/briefcase.png" alt="" /><span>My Account</span></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/message.png" alt="" /><span>Messages</span><strong>12</strong></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/love.png" alt="" /><span>Favorites</span><strong>5</strong></a></li>
                <li><a href="index.php" class="close-panel"><img src="images/icons/green/lock.png" alt="" /><span>Logout</span></a></li>
            </ul>
        </nav>
    </div>
</div>

<div class="views">
    <div class="view view-main">
        <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            * { font-family: 'SolaimanLipi', sans-serif !important; }
            .cus-in-11 {
                width: 100%; padding: 10px; border: 1px solid #fff;
                margin-top: 3px; box-sizing: border-box; overflow-x: auto;
                white-space: nowrap; background: transparent; color: #fff;
            }
            .cus-in-11::placeholder { color: #fff; }
            input[type="radio"] {
                appearance: none; -webkit-appearance: none;
                width: 18px; height: 18px; border: 2px solid #fff;
                border-radius: 50%; background: transparent;
                display: inline-block; position: relative; cursor: pointer; vertical-align: middle;
            }
            input[type="radio"]:checked { border-color: #fff; }
            input[type="radio"]:checked::after {
                content: ""; width: 10px; height: 10px; background: #fff;
                border-radius: 50%; position: absolute;
                top: 50%; left: 50%; transform: translate(-50%, -50%);
            }
            label {
                color: #fff; font-size: 14px; cursor: pointer;
                display: flex; align-items: center; gap: 6px;
            }
            .img-preview {
                width: 90%; height: 155px; border: 1px solid #fff;
                color: #fff; font-weight: 600; padding: 5px;
                margin-top: 3px; text-align: center; position: relative;
            }
            .submit-btn {
                margin-bottom: 35px !important; display: block;
                margin: auto; padding: 10px 34px;
            }
            .alert-success { color: green; text-align: center; padding: 8px; }
            .alert-error   { color: red;   text-align: center; padding: 8px; }
        </style>

        <div class="pages">
            <div data-page="index" class="page homepage" style="background-color:#0B2234!important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" /></div>
                        </a>
                    </div>

                    <nav class="main-nav" style="margin-top:60px!important;width:95%;margin:auto;min-height:86vh;">

                        <?php
                        // ── Image upload helper ─────────────────────────────────
                        function uploadVoucher($file) {
                            $uploadDir = 'uploads/vouchers/';
                            if (!is_dir($uploadDir)) {
                                mkdir($uploadDir, 0755, true);
                            }
                            $ext      = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                            $allowed  = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                            if (!in_array($ext, $allowed)) return false;
                            if ($file['size'] > 5 * 1024 * 1024) return false; // 5 MB max

                            $fileName = uniqid('voucher_', true) . '.' . $ext;
                            $destPath = $uploadDir . $fileName;
                            return move_uploaded_file($file['tmp_name'], $destPath) ? $destPath : false;
                        }

                        // ── Form processing ─────────────────────────────────────
                        if (isset($_POST['submit'])) {

                            $user_id      = (int) trim($_POST['user_id']);
                            $amount       = trim($_POST['amount']);
                            $payment_type = trim($_POST['payment_type']);
                            $account_no   = trim($_POST['account_no']);
                            $date         = trim($_POST['date']);
                            $bank_name         = trim($_POST['bank_name']);
                            $mobile_bank_type         = trim($_POST['mobile_bank_type']);
                            $account_owner_name = $_POST['account_owner_name'];

                            // Basic validation
                            $errors = [];
                            if ($user_id <= 0)              $errors[] = 'ইউজার আইডি সঠিক নয়।';
                            if (!is_numeric($amount) || $amount <= 0) $errors[] = 'সঠিক টাকার পরিমান দিন।';
                            if (!in_array($payment_type, ['bank','mobile_bank','card'])) $errors[] = 'পেমেন্ট পদ্ধতি নির্বাচন করুন।';
                            if (empty($account_no))         $errors[] = 'একাউন্ট নম্বর দিন।';

                            // Handle image upload
                            $voucher_image = null;
                            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                                $voucher_image = uploadVoucher($_FILES['image']);
                                if (!$voucher_image) {
                                    $errors[] = 'ভাউচার ছবি আপলোড ব্যর্থ হয়েছে (শুধু jpg/png/gif, সর্বোচ্চ 5MB)।';
                                }
                            } else {
                                $errors[] = 'ভাউচার ছবি আপলোড করুন।';
                            }

                            if (empty($errors)) {
                                $insert = QB::table('agent_balance_reqest')->insert([
                                    'time'         => time(),
                                    'user_id'      => $user_id,
                                    'amount'       => $amount,
                                    'payment_type' => $payment_type,
                                    'account_no'   => $account_no,
                                    'voucher_image'=> $voucher_image,
                                    'status'       => 0,
                                    'date'         => $date,
                                    'bank_name'         => $bank_name,
                                    'mobile_bank_type'   => $mobile_bank_type,
                                    'time2'         => $_POST['time2'],
                                    'account_owner_name' => $account_owner_name,
                                ]);

                                if ($insert) {
                                    echo '<div class="alert-success">এজেন্ট ব্যালেন্স আবেদন সফলভাবে সম্পন্ন হয়েছে।</div>';
                                    echo '<script>setTimeout(function(){ window.location.href="agent-balens-abedon.php"; }, 1500);</script>';
                                } else {
                                    echo '<div class="alert-error">ডেটাবেজ সমস্যা হয়েছে, আবার চেষ্টা করুন।</div>';
                                }
                            } else {
                                foreach ($errors as $err) {
                                    echo '<div class="alert-error">' . htmlspecialchars($err) . '</div>';
                                }
                            }
                        }
                        ?>
                        <?php
                            $exitsCheck = QB::table('agent')->where('user_id', $_SESSION['user_id'])->first();
                            if($exitsCheck){
                                $exitsAgent = QB::table('member')->where('id', $exitsCheck->user_id)->first();
                            }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Hidden user id filled by AJAX -->
                            <input type="hidden" name="user_id" id="user_id" value="<?= $exitsCheck->user_id ?? '' ?>">

                            <div style="background:#00CC99;padding:12px;color:#fff;text-align:center;font-size:22px;">
                                এজেন্ট ব্যালেন্স আবেদন
                            </div>

                            <!-- User search row -->
                            <div style="display:flex;gap:10px;margin-top:10px">
                                <div style="width:60%;">
                                    <span id="userResult" style="color:red;font-size:13px;"></span>
                                    <input type="text" placeholder="আইডি অথবা নম্বর দিয়ে সার্চ করুন" id="userid" class="cus-in-11" autocomplete="off" value="<?= 'আইডি নাম্বার: '.$exitsAgent->username ?? '' ?>">
                                    <input type="text" name="" placeholder="এজেন্ট নামঃ"  id="name"       class="cus-in-11" autocomplete="off" value="<?= $exitsAgent->name ?? '' ?>">
                                    <input type="text" name="" placeholder="আইডি নম্বরঃ"  id="username"   class="cus-in-11" autocomplete="off" value="<?= 'মোবাইল নাম্বার: ' . $exitsAgent->username ?? '' ?>">
                                    <input type="text" name="" placeholder="এজেন্ট এরিয়া" id="agent_area" class="cus-in-11" autocomplete="off" value="<?= 'এরিয়া: ' . $exitsCheck->agent_area ?? '' ?>">
                                </div>
                                <div style="width:40%;">
                                    <div class="img-preview">
                                        <img id="previewImage"
                                             src="<?= $exitsAgent->image ?? 'https://static.vecteezy.com/system/resources/thumbnails/004/511/281/small/default-avatar-photo-placeholder-profile-picture-vector.jpg' ?>"
                                             alt="" style="width:100%;height:100%;object-fit:cover;">
                                    </div>
                                </div>
                            </div>

                            <!-- Payment method header -->
                            <div style="background:#00CC99;padding:12px;color:#fff;text-align:center;font-size:18px;margin-top:10px">
                                ব্যালেন্স এর জন্য নিম্নোক্ত পদ্ধতি অনুসরন করুন
                            </div>

                            <!-- Payment type radios -->
                            <div style="display:flex;gap:5px;margin-top:5px;align-items:center;">
                                <label style="font-size: 12px;">
                                    <input type="radio" name="payment_type" value="bank" required>
                                    ব্যাংক নির্ধারণ করুন
                                </label>
                                <label style="font-size: 12px;">
                                    <input type="radio" name="payment_type" value="mobile_bank">
                                    মোবাইল ব্যাংক নির্ধারণ
                                </label>
                                <label style="font-size: 12px;">
                                    <input type="radio" name="payment_type" value="card">
                                    ব্যাংক কার্ড
                                </label>
                            </div>

                            <div id="bank_voucher" style="background-color: #fff;padding:5px;margin-top:10px;display:none">
                                <div style="border: 1px solid #000;">
                                    <div style="background-color: #00CC99; font-size: 20px; color: #000; padding: 10px;">
                                        ব্যালেন্স পাঠানোর ব্যাংক একাউন্ট নম্বর
                                    </div>
                                    <div style="background-color: #fff; font-size: 16px; color: #000; padding: 10px;">
                                        ব্যাংক একাউন্ট নম্বর-  191-1030-121068
                                    </div>
                                    <div style="background-color: #00CC99; font-size: 16px; color: #000; padding: 10px;">
                                        ব্যাংক একাউন্ট নাম- Md. Mahbubur Rahman
                                    </div>
                                    <div style="background-color: #fff; font-size: 16px; color: #000; padding: 10px;">
                                       ব্যাংক রাউটিং নম্বর- 090271094
                                    </div>
                                    <div style="background-color: #fff; font-size: 16px; color: #000; padding: 10px;">
                                       ব্যাংক ব্রাঞ্চ- Bijoynagar
                                    </div>
                                    <div style="background-color: #fff; font-size: 16px; color: #000; padding: 10px;text-align:justify">
                                        সম্মানিত এজেন্ট,<br>
                                        আপনাকে জানানো যাচ্ছে যে নিম্নোক্ত অ্যাকাউন্ট নম্বরটি অফিসিয়ালভাবে প্রদান করা হলো। অনুগ্রহ করে উক্ত অ্যাকাউন্ট নম্বরে অর্থ প্রেরণ করে পেমেন্ট ভাউচার সংগ্রহ করুন এবং সেটি আপনার গ্যালারিতে সংরক্ষণ করুন।
                                        পরবর্তীতে ব্যালেন্স আবেদন করার সময় অবশ্যই উক্ত ভাউচারটি আপলোড করে জমা দিতে হবে।
                                    </div>
                                </div>
                            </div>

                            <div id="mobile_bank_voucher" style="background-color: #fff;padding:5px;margin-top:10px;display:none">
                                <div style="border: 1px solid #000;">
                                    <div style="background-color: #00CC99; font-size: 18px; color: #000; padding: 10px;">
                                        ব্যালেন্স পাঠানোর মোবাইল ব্যাংক একাউন্ট নম্বর
                                    </div>
                                    <div style="background-color: #fff; font-size: 16px; color: #000; padding: 10px;">
                                        মোবাইল ব্যাংক একাউন্ট নম্বর-  01911 054637
                                    </div>
                                    <div style="background-color: #00CC99; font-size: 16px; color: #000; padding: 10px;">
                                        মোবাইল ব্যাংক একাউন্ট (বিকাশ, নগদ)
                                    </div>
                                    <div style="background-color: #fff; font-size: 16px; color: #000; padding: 10px;">
                                       একাউন্ট ধরণ- পার্সোনাল
                                    </div>
                                    <div style="background-color: #fff; font-size: 16px; color: #000; padding: 10px;text-align:justify">
                                        সম্মানিত এজেন্ট,<br>
                                        আপনাকে জানানো যাচ্ছে যে নিম্নোক্ত অ্যাকাউন্ট নম্বরটি অফিসিয়ালভাবে প্রদান করা হলো। অনুগ্রহ করে উক্ত অ্যাকাউন্ট নম্বরে অর্থ প্রেরণ করে পেমেন্ট ভাউচার সংগ্রহ করুন এবং সেটি আপনার গ্যালারিতে সংরক্ষণ করুন।
                                        পরবর্তীতে ব্যালেন্স আবেদন করার সময় অবশ্যই উক্ত ভাউচারটি আপলোড করে জমা দিতে হবে।
                                    </div>
                                </div>
                            </div>

                            <!-- Amount & date -->
                            <div style="display:flex;gap:5px;margin-top:5px">
                                <div style="width:33.33%">
                                    <input type="number" name="amount" placeholder="টাকার পরিমান" class="cus-in-11" autocomplete="off" min="1" required>
                                </div>
                                <div style="width:33.33%">
                                    <input type="text" name="date" id="datePicker" placeholder="তারিখ সময় নির্ধারন" class="cus-in-11" autocomplete="off">
                                </div>
                                <div style="width:33.33%">
                                    <input type="time" name="time2" placeholder="সময়" class="cus-in-11" autocomplete="off">
                                </div>
                            </div>

                            <!-- Account number (placeholder changes by radio) -->
                            <div style="display:flex;gap:5px;margin-top:5px">
                                <div style="width:100%">
                                    <input type="text" id="account_no" name="account_no"
                                           placeholder="একাউন্ট টাইপ সিলেক্ট করুন"
                                           class="cus-in-11" autocomplete="off" required>
                                </div>
                            </div>

                            <!-- Mobile bank sub-options (বিকাশ, নগদ, রকেট) -->
                            <div id="mobile_bank_options" style="display:none; margin-top:10px;">
                                <label style="margin-right:10px;">
                                    <input type="radio" name="mobile_bank_type" value="bkash">
                                    বিকাশ
                                </label>
                                <label style="margin-right:10px;">
                                    <input type="radio" name="mobile_bank_type" value="nagad">
                                    নগদ
                                </label>
                                <label>
                                    <input type="radio" name="mobile_bank_type" value="rocket">
                                    রকেট
                                </label>
                            </div>

                            <!-- Bank name input -->
                            <div style="margin-top:10px;">
                                <input type="text" name="account_owner_name" id="account_owner_name" class="cus-in-11" placeholder="একাউন্টধারীর নাম  [আপনার নাম বা কোম্পানির নাম লিখুন]">
                            </div>

                            <!-- Bank name input -->
                            <div id="bank_name_options" style="display:none; margin-top:10px;">
                                <input type="text" name="bank_name" id="bank_name" class="cus-in-11" placeholder="ব্যাংকের নাম  [যেমন: ইসলামী ব্যাংক / ডাচ-বাংলা ব্যাংক ইত্যাদি]">
                            </div>


                            <!-- Voucher upload -->
                            <div class="image-box" style="margin-top:10px;height:400px !important">
                                <label class="image-label" style="width:100%!important;border:1px solid #fff!important;height:400px !important">
                                    <img class="previewImage" />
                                    <span class="placeholderText" style="color:#fff;">
                                        টাকা পাঠানোর ভাউচার <br> আপলোড করুন
                                    </span>
                                    <input type="file" name="image" accept="image/*" required onchange="previewPhoto(this)">
                                </label>
                            </div>

                            <!-- Submit -->
                            <div style="display:flex;gap:5px;margin-top:30px">
                                <div style="width:100%;color:#fff;font-size:14px;line-height:20px;">
                                    <button type="submit" name="submit" class="submit-btn">আবেদন সাবমিট করুন</button>
                                </div>
                            </div>
                        </form>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>

<!-- jQuery user-search AJAX -->
<script>
$("#userid").on("keyup input", function () {
    let username = $(this).val();
    $.ajax({
        type: "GET",
        url: "/ajax/fetch-agent.php",
        data: { username: username },
        dataType: "json",
        success: function (response) {

            if (response.success) {
                $("#userResult").hide();
                $("#user_id").val(response.data.user_id);
                $("#name").val(response.data.name).prop("readonly", true);
                $("#username").val(response.data.username).prop("readonly", true);
                $("#agent_area").val(response.data.agent_area).prop("readonly", true);
                if (response.image && response.image !== '') {
                    $("#previewImage").attr("src", response.image);
                }
            } else {
                $("#userResult").text('ইউজার আইডি সঠিক নয়').show();
                $("#name, #username, #agent_area").val('').prop("readonly", false);
                $("#previewImage").attr("src",
                    "https://static.vecteezy.com/system/resources/thumbnails/004/511/281/small/default-avatar-photo-placeholder-profile-picture-vector.jpg"
                );
            }
        }
    });
});
</script>

<!-- Flatpickr date picker -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
flatpickr("#datePicker", { dateFormat: "Y-m-d" });
</script>

<!-- Dynamic account_no placeholder by payment type -->
<script>
document.querySelectorAll('input[name="payment_type"]').forEach(function (radio) {
    radio.addEventListener('change', function () {
        const map = {
            mobile_bank : 'মোবাইল ব্যাংকিং একাউন্ট নম্বর-',
            bank        : 'ব্যাংক একাউন্ট নম্বর [এখানে সঠিক একাউন্ট নম্বরটি দিন]',
            card        : 'কার্ড নম্বর-'
        };

        // Placeholder update
        document.getElementById('account_no').placeholder = map[this.value] || 'একাউন্ট নম্বর-';

        // Show/hide mobile bank sub-options
        const mobileOptions = document.getElementById('mobile_bank_options');
        const mobile_bank_voucher = document.getElementById('mobile_bank_voucher');
        if (this.value === 'mobile_bank') {
            mobileOptions.style.display = 'block';
            mobile_bank_voucher.style.display = 'block';
        } else {
            mobileOptions.style.display = 'none';
            mobile_bank_voucher.style.display = 'none';
            // Clear selection when hidden
            document.querySelectorAll('input[name="mobile_bank_type"]').forEach(r => r.checked = false);
        }

        // Show/hide bank name input
        const bankNameOptions = document.getElementById('bank_name_options');
        const bank_voucher = document.getElementById('bank_voucher');
        if (this.value === 'bank') {
            bankNameOptions.style.display = 'block';
            bank_voucher.style.display = 'block';
        } else {
            bankNameOptions.style.display = 'none';
            bank_voucher.style.display = 'none';
            document.getElementById('bank_name').value = '';
        }
    });
});
</script>

<!-- Voucher image preview -->
<script>
function previewPhoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = input.closest('label').querySelector('.previewImage');
            img.src = e.target.result;
            img.style.display = 'block';
            input.closest('label').querySelector('.placeholderText').style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>