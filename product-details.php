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

            <div data-page="index" class="page homepage" style="background-color: #EEEEEE !important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222; min-height:83vh;">

                        <!--        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text">প্রোডাক্ট <br> বিক্রয় বিস্তারিত</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/5.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        -->
                        <div class="form-container" style="margin-top: 10px;">
                            <div class="form-header3">
                                প্রোডাক্ট বিক্রয় হিসাব বিস্তারিত তথ্য
                            </div>

                            <div class="form-body">
                                <div class="form-item">গ্রাহক নাম</div>
                                <div class="form-item">মোবাইল</div>
                                <div class="form-item">প্রোডাক্ট নাম</div>
                                <div class="form-item">প্রোডাক্ট বিক্রয় তারিখ</div>
                                <div class="form-item">প্রোডাক্ট বিক্রয় পরিমান</div>
                                <div class="form-item">প্রোডাক্ট বিক্রয় মূল্যে</div>
                                <div class="form-item">প্রোডাক্ট বিক্রয় টাকা</div>
                                <div class="form-item">প্রোডাক্ট বিক্রয় বকেয়া</div>
                                <div class="form-item">বকেয়া পরিশোধ</div>

                                <div class="parent" style="margin-top: 5px; width:100%;">
                                    <div class="child three"
                                        style="padding:10px 20px; background-color:#0B2234;color:#12d584">তারিখ</div>
                                    <div style="color: #BFBFBF;" class="child one">পরিশোধ পরিমান
                                    </div>
                                    <div class="child two" style="color: #ffff; background-color:#12d584;">পরিশোধ করুন
                                    </div>
                                </div>


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