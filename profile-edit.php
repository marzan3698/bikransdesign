<?php require_once('header.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
<div class="statusbar-overlay"></div>

<div class="panel-overlay"></div>

<?php require_once('sidebar.php'); ?>
<style>
    * {
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    .container {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
        text-align: center;
    }

    h2 {
        margin-top: 0;
        color: #333;
    }

    .img-container {
        max-height: 400px;
        margin: 20px 0;
        background: #f0f0f0;
        border-radius: 8px;
        overflow: hidden;
        display: none;
    }

    .img-container img {
        display: block;
        max-width: 100%;
    }

    .controls {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }

    button,
    input[type="file"]::file-selector-button {
        background: #4361ee;
        color: #fff;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        transition: background 0.2s;
    }

    button:hover,
    input[type="file"]::file-selector-button:hover {
        background: #3a52d4;
    }

    button:disabled {
        background: #aaa;
        cursor: not-allowed;
    }

    #cropBtn {
        background: #2ecc71;
    }

    #cropBtn:hover {
        background: #27ae60;
    }

    .message {
        margin-top: 15px;
        padding: 12px;
        border-radius: 6px;
        font-size: 14px;
        display: none;
    }

    .message.success {
        background: #d4edda;
        color: #155724;
        display: none;
    }

    .message.error {
        background: #f8d7da;
        color: #721c24;
        display: block;
    }



    .file-input-wrapper {
        margin-bottom: 10px;
    }

    .progress {
        width: 100%;
        background: #eee;
        border-radius: 5px;
        margin-top: 10px;
        display: none;
        height: 10px;
        overflow: hidden;
    }

    .progress-bar {
        height: 100%;
        width: 0%;
        background: #4361ee;
        transition: width 0.2s;
    }
</style>
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
                            $user_id = $_SESSION['user_id'];

                            $nid_no = $_POST['nid_no'] ?? '';
                            if($nid_no){
                                $exits = QB::table('member')
                                    ->where('nid_no', $nid_no)
                                    ->where('id', '!=', $user_id)
                                    ->first();
    
                                if ($exits) {
                                    echo '<span style="color:red;text-align:center">এই জাতীয় পরিচয় পত্র নম্বরটি ইতিমধ্যে ব্যবহৃত হয়েছে।</span>';
                                    exit;
                                }
                            }

                            $whatsapp = $_POST['whatsapp'] ?? '';
                            if($whatsapp){
                                $exits = QB::table('member')->where('whatsapp', $whatsapp)->whereNot('id',  $user_id)->first();
                                if ($exits) {
                                    echo '<span style="color:red;text-align:center">এই হোয়াটসঅ্যাপ নম্বরটি ইতিমধ্যে ব্যবহৃত হয়েছে।</span>';
                                    exit;
                                }
                            }

                            // পুরনো ডেটা নিন
                            $old = QB::table('member')->where('id', $user_id)->first();

                            $nidFrontPath = isset($_FILES['image'])    ? uploadImage($_FILES['image'])    : null;
                            $nidBackPath  = isset($_FILES['nid_back']) ? uploadImage($_FILES['nid_back']) : null;
                            $photoPath = $_POST['photo_cropped'] ?? '';
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
                                'whatsapp'         => $_POST['whatsapp'] ?? $old->whatsapp,
                                'nominee_name'     => $_POST['nominee_name'] ?? $old->nominee_name,
                                'nominee_relation' => $_POST['nominee_relation'] ?? $old->nominee_relation,
                                'nid_no'           => $_POST['nid_no'] ?? $old->nid_no,
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

                        <?php if (isset($_GET['all'])) { ?>
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
                                <div class="preview-result" id="resultPreview">
                                    <div class="image-box square preview-result">
                                        <label class="image-label" style="background-color: #0B2234;">
                                            <img id="resultImg" src="" style="width: 144px; height:182px;display:none" />
                                            <span class="placeholderText" id="placeholderText" style="color:#12D584;">ছবি আপলোড করুন</span>
                                            <input type="file" id="imageInput" name="photo_unused" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                                        </label>
                                        <input type="hidden" name="photo_cropped" id="photo_cropped">
                                    </div>
                                </div>

                                <div class="img-container" id="imgContainer">
                                    <img id="imagePreview" src="" alt="Preview">
                                </div>

                                <div class="controls" id="cropControls" style="display:none;">
                                    <button id="zoomInBtn">Zoom In</button>
                                    <button id="zoomOutBtn">Zoom Out</button>
                                    <button id="rotateLeftBtn">Rotate Left</button>
                                    <button id="rotateRightBtn">Rotate Right</button>
                                    <button id="resetBtn">Reset</button>
                                    <button id="cropBtn">Crop &amp; Upload</button>
                                </div>

                                <div class="progress" id="progressWrap">
                                    <div class="progress-bar" id="progressBar"></div>
                                </div>

                                <div class="message" id="messageBox"></div>

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
                        <?php }else{ ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php if(isset($_GET['whatsapp'])){ ?>
                                    <div class="custom-form-group2" style="background-color: #0B2234;">
                                        <span class="inline-label" style="color:#12D584;">হোয়াটসঅ্যাপ নম্বরঃ-</span>
                                        <input style="color: white;" type="text" class="form_input" id="whatsapp" name="whatsapp" value="<?= $member->whatsapp ?>" required>
                                    </div>
                                <?php } ?>
                                
                                <?php if(isset($_GET['nominee_name'])){ ?>
                                    <div class="custom-form-group2" style="background-color: #0B2234;">
                                        <span class="inline-label" style="color:#12D584;">নমিনী নাম-</span>
                                        <input style="color: white;" type="text" class="form_input" id="nominee_name" name="nominee_name" value="<?= $member->nominee_name ?>">
                                    </div>
                                    <div class="custom-form-group2" style="background-color: #0B2234;">
                                        <span class="inline-label" style="color:#12D584;">নমিনী সম্পর্ক-</span>
                                        <input style="color: white;" type="text" class="form_input" id="nominee_relation" name="nominee_relation" value="<?= $member->nominee_relation ?>">
                                    </div>
                                <?php } ?>


                                <?php if(isset($_GET['picture'])){ ?>
                                    <!-- প্রোফাইল ছবি -->
                                    <div class="preview-result" id="resultPreview">
                                        <div class="image-box square preview-result">
                                            <label class="image-label" style="background-color: #0B2234;">
                                                <img id="resultImg" src="" style="width: 144px; height:182px;display:none" />
                                                <span class="placeholderText" id="placeholderText" style="color:#12D584;">ছবি আপলোড করুন</span>
                                                <input type="file" id="imageInput" name="photo_unused" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                                            </label>
                                            <input type="hidden" name="photo_cropped" id="photo_cropped">
                                        </div>
                                    </div>

                                    <div class="img-container" id="imgContainer">
                                        <img id="imagePreview" src="" alt="Preview">
                                    </div>

                                    <div class="controls" id="cropControls" style="display:none;">
                                        <button id="zoomInBtn">জুম্ করুন</button>
                                        <button id="zoomOutBtn">জুম্ আউট করুন</button>
                                        <button id="rotateLeftBtn">বামদিকে ঘোরান</button>
                                        <button id="rotateRightBtn">ডানদিকে ঘোরান</button>
                                        <button id="resetBtn">রিসেট</button>
                                        <button id="cropBtn">ক্রপ করুন</button>
                                    </div>

                                    <div class="progress" id="progressWrap">
                                        <div class="progress-bar" id="progressBar"></div>
                                    </div>

                                    <div class="message" id="messageBox"></div>
                                <?php } ?>


                                <?php if(isset($_GET['nid_no'])){ ?>
                                    <div class="custom-form-group2" style="background-color: #0B2234;">
                                        <span class="inline-label" style="color:#12D584;">জাতীয় পরিচয় পত্র নম্বরঃ-</span>
                                        <input style="color: white;" type="text" class="form_input" id="nid_no" name="nid_no" required value="<?= $member->nid_no ?>">
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

                                <?php } ?>


                                <button style="margin-top: -12px !important;" type="submit" name="profile_update" class="custom-submit-button4">আপডেট করুন</button>

                            </form>
                        <?php } ?>
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
            data: {
                refer_id: refer_id
            },
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
            data: {
                phone: phone
            },
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
<script>
    const ALLOWED_TYPES = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
    const MAX_SIZE = 5 * 1024 * 1024; // 5MB

    const imageInput = document.getElementById('imageInput');
    const imgContainer = document.getElementById('imgContainer');
    const imagePreview = document.getElementById('imagePreview');
    const cropControls = document.getElementById('cropControls');
    const cropBtn = document.getElementById('cropBtn');
    const messageBox = document.getElementById('messageBox');
    const resultPreview = document.getElementById('resultPreview');
    const resultImg = document.getElementById('resultImg');
    const progressWrap = document.getElementById('progressWrap');
    const progressBar = document.getElementById('progressBar');
    const placeholderText = document.getElementById('placeholderText');
    const photo_cropped = document.getElementById('photo_cropped');

    let cropper = null;

    function showMessage(text, type) {
        messageBox.textContent = text;
        messageBox.className = 'message ' + type;
    }

    function resetUI() {
        messageBox.className = 'message';
        resultPreview.style.display = 'none';
        progressWrap.style.display = 'none';
        progressBar.style.width = '0%';
    }

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        resetUI();

        if (!file) return;

        // Validate type
        if (!ALLOWED_TYPES.includes(file.type)) {
            showMessage('Invalid file type. Only JPG, JPEG, PNG, and WEBP are allowed.', 'error');
            imageInput.value = '';
            return;
        }

        // Validate size
        if (file.size > MAX_SIZE) {
            showMessage('File is too large. Maximum size is 5MB.', 'error');
            imageInput.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(event) {
            imagePreview.src = event.target.result;
            imgContainer.style.display = 'block';
            cropControls.style.display = 'flex';

            if (cropper) cropper.destroy();

            cropper = new Cropper(imagePreview, {
                aspectRatio: NaN, // free aspect ratio
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 0.8,
                responsive: true,
                background: false,
            });
        };
        reader.readAsDataURL(file);
    });

    document.getElementById('zoomInBtn').addEventListener('click', () => cropper && cropper.zoom(0.1));
    document.getElementById('zoomOutBtn').addEventListener('click', () => cropper && cropper.zoom(-0.1));
    document.getElementById('rotateLeftBtn').addEventListener('click', () => cropper && cropper.rotate(-45));
    document.getElementById('rotateRightBtn').addEventListener('click', () => cropper && cropper.rotate(45));
    document.getElementById('resetBtn').addEventListener('click', () => cropper && cropper.reset());

    cropBtn.addEventListener('click', function() {
        if (!cropper) {
            showMessage('Please select an image first.', 'error');
            return;
        }

        resetUI();
        cropBtn.disabled = true;
        cropBtn.textContent = 'Processing...';

        const canvas = cropper.getCroppedCanvas({
            maxWidth: 4096,
            maxHeight: 4096,
            imageSmoothingQuality: 'high',
        });

        if (!canvas) {
            showMessage('Could not crop image. Try again.', 'error');
            cropBtn.disabled = false;
            cropBtn.textContent = 'Crop & Upload';
            return;
        }

        // Determine output type from original file
        const originalFile = imageInput.files[0];
        let outputType = originalFile.type;
        if (!ALLOWED_TYPES.includes(outputType)) outputType = 'image/jpeg';

        canvas.toBlob(function(blob) {
            if (!blob) {
                showMessage('Failed to generate image blob.', 'error');
                cropBtn.disabled = false;
                cropBtn.textContent = 'Crop & Upload';
                return;
            }

            const formData = new FormData();
            const ext = outputType.split('/')[1];
            formData.append('croppedImage', blob, 'cropped.' + ext);
            formData.append('mimeType', outputType);

            placeholderText.style.display = 'none';
            resultImg.style.display = 'block';

            uploadImage(formData);
        }, outputType, 0.9);
    });

    function uploadImage(formData) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'profile-image-upload.php', true);

        progressWrap.style.display = 'block';

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                const percent = (e.loaded / e.total) * 100;
                progressBar.style.width = percent + '%';
            }
        };

        xhr.onload = function() {
            cropBtn.disabled = false;
            cropBtn.textContent = 'Crop & Upload';
            progressWrap.style.display = 'none';



            let response;
            try {
                response = JSON.parse(xhr.responseText);
            } catch (err) {
                showMessage('Server returned an invalid response.', 'error');
                return;
            }



            if (xhr.status === 200 && response.status === 'success') {
                showMessage(response.message, 'success');
                resultImg.src = response.path;
                photo_cropped.value = response.path;
                resultPreview.style.display = 'block';
            } else {
                showMessage(response.message || 'Upload failed.', 'error');
            }
        };

        xhr.onerror = function() {
            cropBtn.disabled = false;
            cropBtn.textContent = 'Crop & Upload';
            progressWrap.style.display = 'none';
            showMessage('Network error. Please try again.', 'error');
        };

        xhr.send(formData);
    }
</script>