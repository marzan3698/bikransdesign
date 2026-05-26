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
        <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">
        <style>
            *{
                font-family: 'SolaimanLipi', sans-serif !important;
            }
            .cus-in-11 {
                width: 100%;
                padding: 10px;
                border: 1px solid #fff;
                margin-top: 3px;
                box-sizing: border-box;
                overflow-x: auto;
                white-space: nowrap;
                text-overflow: clip;
                background: transparent;
                color: #fff;
            }

            .cus-in-11::placeholder {
                color: #fff;
            }

            .input-scroll-wrapper {
                overflow-x: auto;
                white-space: nowrap;
                width: 100%;
            }

           .cus-select-111 {
                width: 100%;
                padding: 10px;
                border: 1px solid #fff;
                margin-top: 3px;
                box-sizing: border-box;
                font-size: 14px;
                white-space: nowrap;
                overflow-x: auto;
                text-overflow: clip;
                background: transparent;
                color: #fff;
            }

            /* Option background dark */
            .cus-select-111 option {
                background: #222;
                color: #fff;
            }

            .img-preview {
                width: 90%;
                height: 155px;
                border: 1px solid #fff;
                color: #fff;
                font-weight: 600;
                padding: 5px;
                margin-top: 3px;
                text-align: center;
                position: relative;
            }
            .submit-btn{
                margin-bottom: 35px !important; 
                display: block; 
                margin: auto; 
                padding: 10px 34px; 
                margin-top: 10px !important;
            }
        </style>

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
                        style="margin-top: 60px !important; width: 95%; margin: auto; min-height:86vh;">
                        <div style="background: #00CC99; padding: 12px; color: #fff; text-align: center; font-size: 22px;">এজেন্ট নিবন্ধন আবেদন</div>
                            <?php
                                if(isset($_POST['submit'])){

                                    $user_id = trim($_POST['user_id']);
                                    $name = trim($_POST['name']);
                                    $username = trim($_POST['username']);
                                    $agent_area = trim($_POST['agent_area']);
                                    $village = trim($_POST['village']);
                                    $description = trim($_POST['description']);
                                    $division_id = $_POST['division_id'];
                                    $district_id = $_POST['district_id'];
                                    $upazila_id = $_POST['upazila_id'];
                                    $number = $_POST['number'] ?? null;

                                    $exitsCheck = QB::table('agent')
                                        ->where('user_id', $user_id)
                                        ->first();

                                    if($exitsCheck){

                                        echo '<div style="color:red;text-align:center">
                                                আপনার ইতিপূর্বে এজেন্ট করা হয়েছে।
                                            </div>';
                                        echo "<script>
                                                setTimeout(function(){
                                                    window.location.href = 'agent_nibondhon.php';
                                                }, 1000);
                                            </script>";

                                    } else {
                                            $insert = QB::table('agent')->insert([
                                                'time' => time(),
                                                'user_id' => $user_id,
                                                'name' => $name,
                                                'username' => $username,
                                                'agent_area' => $agent_area,
                                                'village' => $village,
                                                'description' => $description,
                                                'division_id' => $division_id,
                                                'district_id' => $district_id,
                                                'upojela_id' => $upazila_id,
                                                'number' => $number,
                                                'status' => 0,
                                            ]);

                                            if($insert){

                                                echo '<div style="color:green;text-align:center">
                                                        এজেন্ট রিকোয়েস্ট সফলভাবে করা হয়েছে।
                                                    </div>';

                                                echo "<script>
                                                setTimeout(function(){
                                                        window.location.href = 'agent_nibondhon.php';
                                                    }, 1000);
                                                </script>";

                                            } else {

                                                echo '<div style="color:red;text-align:center">
                                                        এজেন্ট রিকোয়েস্ট ব্যর্থ হয়েছে।
                                                    </div>';
                                                echo "<script>
                                                    setTimeout(function(){
                                                            window.location.href = 'agent_nibondhon.php';
                                                        }, 1000);
                                                    </script>";
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
                        <form action="" method="post">
                            <input type="hidden" name="user_id" id="user_id">
                            <input type="hidden" name="number" id="number">
                            <div style="display: flex;gap: 10px;margin-top:10px">
                                <div style="width: 60%;">
                                    <span id="userResult" style="color: red;"></span>
                                    <input type="text" name="" placeholder="আইডি অথবা নম্বর দিয়ে সার্চ করুন" id="userid" class="cus-in-11" autocomplete="off" value="<?= $exitsAgent->username ?? '' ?>">
                                    <input type="text" name="name" placeholder="এজেন্ট নামঃ" id="name" class="cus-in-11" autocomplete="off" value="<?= $exitsAgent->name ?? '' ?>">
                                    <input type="text" name="username" placeholder="আইডি নম্বরঃ" id="username" class="cus-in-11" autocomplete="off" value="<?= $exitsAgent->phone ?? '' ?>">
                                    <input type="text" name="agent_area" placeholder="এজেন্ট এরিয়া" id="agent_area"  class="cus-in-11" autocomplete="off" readonly value="<?= $exitsCheck->agent_area ?? '' ?>">
                                </div>
                                <div style="width: 40%;">
                                    <div class="img-preview">
                                        <img id="previewImage"
                                            src="<?= $exitsAgent->image ?? 'https://static.vecteezy.com/system/resources/thumbnails/004/511/281/small/default-avatar-photo-placeholder-profile-picture-vector.jpg' ?>"
                                            alt=""
                                            style="width:100%; height:100%; object-fit:cover;">
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex;gap: 5px;margin-top:5px">
                                <div style="width: 50%;">
                                    <input type="text" name="village" placeholder="গ্রামঃ" id="village" class="cus-in-11" autocomplete="off" value="<?= $exitsCheck->village ?? '' ?>">
                                </div>

                                <div style="width: 50%; position: relative;">
                                    <input type="text" name="" placeholder="এনআইডি দেখুন" id="nid_no" class="cus-in-11" autocomplete="off" value="<?= $exitsAgent->nid_no ?? '' ?>">

                                    <!-- Eye Icon -->
                                    <span id="viewNid"
                                        style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer;">
                                        👁️
                                    </span>
                                </div>
                            </div>

                            <!-- Popup Modal -->
                            <div id="nidModal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.7);
                            ">
                                <div style="position:relative;width:400px;max-width:90%;margin:50px auto;background:#fff;padding:10px;border-radius:10px;text-align:center;
                                ">
                                    <span id="closeModal" style="position:absolute; top:10px; right:15px; font-size:25px; cursor:pointer;">
                                        &times;
                                    </span>

                                    <img id="nidImagePreview"
                                        src=""
                                        style="width:100%; border-radius:5px;">
                                    <img id="nidImagePreview2"
                                        src=""
                                        style="width:100%; border-radius:5px;">
                                </div>
                            </div>
                            <div style="display: flex;gap: 5px;margin-top:5px">
                                <div style="width: 33.33%;">
                                    <select name="division_id" class="cus-select-111" id="division_id" required>
                                        <option value="">বিভাগঃ </option>
                                        <?php 
                                        $divisions = QB::table('divisions')->orderBy('id', 'asc')->get();
                                        foreach($divisions as $item){ ?>
                                            <option value="<?= $item->id ?>"><?= $item->bn_name ?></option>
                                        <?php } ?>
                                    </select>
                                    
                                </div>
                                <div style="width: 33.33%;">
                                    <select name="district_id" class="cus-select-111" id="district_id" required>
                                        <option value="">জেলাঃ</option>
                                    </select>
                                </div>
                                <div style="width: 33.33%;">
                                    <select name="upazila_id" class="cus-select-111" id="upazila_id" required>
                                        <option value="">উপজেলাঃ</option>
                                    </select>
                                </div>
                            </div>
                            <div style="display: flex;gap: 5px;margin-top:5px">
                                <div style="width: 100%;">
                                    <input type="text" name="description" placeholder="" id="name" class="cus-in-11" autocomplete="off">
                                </div>
                            </div>
    
                            <div style="display: flex;gap: 5px;margin-top:5px">
                                <div style="width: 100%; color: #fff; font-size: 14px; line-height: 20px;">
                                    বিক্রান্স ডিসেন্ট্রালাইজড বিজনেস <br>
                                     ডিলারশিপ আবেদন ও অঙ্গীকারপত্র<br>
                                    বরাবর, <br>
                                    কর্তৃপক্ষ<br>
                                    বিক্রান্স ডিসেন্ট্রালাইজড বিজনেস<br>
                                    বিষয়ঃ বিক্রান্স বিজনেসে ডিলার হিসেবে যুক্ত হওয়ার আবেদন। <br>
                                    জনাব,<br>
                                    বিনীত নিবেদন এই যে, আমি আপনাদের প্রতিষ্ঠানের একজন দায়িত্বশীল ও নীতিনিষ্ঠ ডিলার হিসেবে কাজ করার আগ্রহ প্রকাশ করছি। বিক্রান্স বিজনেসের সকল নিয়মনীতি, নৈতিকতা ও অফিসিয়াল নির্দেশনা যথাযথভাবে মেনে ব্যবসা পরিচালনার অঙ্গীকার করছি।<br>
                                    আমি প্রতিশ্রুতি দিচ্ছি যে—<br>
                                    • সততা, ভরসা, ন্যায়নীতি ও আদর্শকে সর্বোচ্চ গুরুত্ব দিয়ে ব্যবসা পরিচালনা করব।<br>
                                    • কখনো অনিয়ম, আন্ডার রেট বা বাজারে বিশৃঙ্খল পরিবেশ সৃষ্টি করব না ।<br>
                                    • কোম্পানির অনুমোদিত নিয়মের বাহিরে কোনো প্রোডাক্ট সরবরাহ করব না। বিক্রান্সের সুনাম, শৃঙ্খলা ও ব্যবসায়িক মূল্যবোধ অক্ষুণ্ণ রাখব।<br>
                                    • কোম্পানির প্রতিটি সিদ্ধান্ত ও নির্দেশনাকে সম্মান ও অনুসরণ করব।<br>
                                    অতএব, আমাকে আপনাদের প্রতিষ্ঠানে একজন অনুমোদিত ডিলার হিসেবে কাজ করার সুযোগ প্রদানের জন্য আন্তরিকভাবে আবেদন জানাচ্ছি।
                                </div>
                            </div>
                            <?php if($exitsAgent){ ?>
                                <div style="display: flex;gap: 5px;margin-top:5px">
                                    <div style="width: 100%; color: #fff; font-size: 14px; line-height: 20px;">
                                        <button class="submit-btn">আবেদন কমপ্লিট</button>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div style="display: flex;gap: 5px;margin-top:5px">
                                    <div style="width: 100%; color: #fff; font-size: 14px; line-height: 20px;">
                                        <button type="submit" name="submit" class="submit-btn">আবেদন সাবমিট করুন</button>
                                    </div>
                                </div>
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
        $("#userid").on("keyup input", function () {
            let username = $(this).val();

            $.ajax({
                type: "GET",
                url: "/ajax/fetch-user.php",
                data: {
                    username: username
                },
                dataType: "json",

                success: function (response) {
                    if (response.success == 1) {
                        $("#userResult").hide();
                        $("#user_id").val(response.data.id);

                        $("#name").val(response.data.name).prop("readonly", true);
                        $("#username").val(response.data.username).prop("readonly", true);
                        $("#nid_no").val(response.data.nid_no).prop("readonly", true);
                        $("#agent_area").val(response.agent_area).prop("readonly", true);
                        $("#village").val(response.data.address).prop("readonly", true);
                        $("#number").val(response.data.phone).prop("readonly", true);

                        $("#nidImagePreview").attr("src", response.data.p_nid_front);
                        $("#nidImagePreview2").attr("src", response.data.p_nid_back);

                        // Show image if exists
                        if (response.data.image && response.data.image !== '') {
                            $("#previewImage").attr("src", response.data.image);
                        }
                    } else {
                        $("#userResult").text('ইউজার আইডি সঠিক নয়').show();
                        $("#name").val('').prop("readonly", false);
                        $("#username").val('').prop("readonly", false);
                        $("#nid_no").val('').prop("readonly", false);
                        $("#agent_area").val('').prop("readonly", false);
                        $("#village").val('').prop("readonly", false);

                        $("#nidImagePreview").attr("src", "");
                        $("#nidImagePreview2").attr("src", "");

                        // Default image
                        $("#previewImage").attr(
                            "src",
                            "https://static.vecteezy.com/system/resources/thumbnails/004/511/281/small/default-avatar-photo-placeholder-profile-picture-vector.jpg"
                        );
                    }
                },
            });
        });
    </script>
    <script>
        $(document).ready(function(){

            // Division → District
            $('#division_id').change(function(){
                var division_id = $(this).val();

                $('#district_id').html('<option>Loading...</option>');
                $('#upazila_id').html('<option value="">উপজেলা</option>');

                if(division_id != ''){
                    $.ajax({
                        url: "get_districts.php",
                        type: "POST",
                        data: { division_id: division_id },
                        success: function(data){
                            $('#district_id').html(data);
                        }
                    });
                }
            });

            // District → Upazila
            $('#district_id').change(function(){
                var district_id = $(this).val();

                $('#upazila_id').html('<option>Loading...</option>');

                if(district_id != ''){
                    $.ajax({
                        url: "get_upazilas.php",
                        type: "POST",
                        data: { district_id: district_id },
                        success: function(data){
                            $('#upazila_id').html(data);
                        }
                    });
                }
            });

        });
    </script>
    <script>
        // Open Modal
        $("#viewNid").on("click", function () {

            let imgSrc = $("#nidImagePreview").attr("src");

            if (imgSrc != '') {
                $("#nidModal").fadeIn();
            } else {
                alert("NID Image পাওয়া যায়নি");
            }
        });

        // Close Modal
        $("#closeModal").on("click", function () {
            $("#nidModal").fadeOut();
        });

        // বাইরে ক্লিক করলে close
        $(window).on("click", function (e) {
            if ($(e.target).is("#nidModal")) {
                $("#nidModal").fadeOut();
            }
        });
    </script>
    <?php if($exitsCheck){ ?>
        <script>
            $(document).ready(function(){
                var div_id = "<?= $exitsCheck->division_id ?>";
                var dis_id = "<?= $exitsCheck->district_id ?>";
                var upo_id = "<?= $exitsCheck->upojela_id ?>";
                setTimeout(() => {
                    $("#division_id").val(div_id).trigger('change');
                }, 500);
                setTimeout(() => {
                    $("#district_id").val(dis_id).trigger('change');
                }, 1000);
                setTimeout(() => {
                    $("#upazila_id").val(upo_id).trigger('change');
                }, 1500);
            });
        </script>
    <?php } ?>