<?php require_once('header.php'); ?>

<div class="statusbar-overlay"></div>

<div class="panel-overlay"></div>

<?php require_once('sidebar.php'); ?>

<div class="panel panel-right panel-reveal">
    <div class="user_login_info">
        <style>
            .notification {
                    background: url(images/custom/77.svg) no-repeat center;
                    background-size: 19px;
                    width: 20px;
                    height: 25px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    background-color: transparent;
                }
                .swiper-slide img{
                    opacity: 1 !important;
                }
        </style>
        <div class="user_thumb">
            <div class="user_avatar"><img src="images/avatar.jpg" alt="" title="" /></div>
            <div class="user_details">
                <p>Welcome <span>John Doe</span></p>
            </div>
            <div class="user_social">
                <p style="color: white; font-size:18px;"> আপনার উপর শান্তি বর্ষিত হোক</p>

            </div>
        </div>

        <nav class="user-nav">
            <ul>
                <li><span style="color: white;">নামঃ শহিদুল ইসলাম চৌধুরী</span></li>
                <li><span style="color: white;">আইডিঃ BK56789</span></li>
                <li><span style="color: white;">জয়েনিং তারিখঃ </span> <label class="switch"><input
                            type="checkbox"><span class="slider"></span></label></li>
                <li><span style="color: white;">মোবাইলঃ 01711111111</span></li>
                <li><span style="color: white;">ব্যাক্তিগত বিস্তারিত তথ্য</span> <label class="switch"><input
                            type="checkbox"><span class="slider"></span></label></li>
                <li><span style="color: white;">গুরুত্বপূর্ণ সেটিং</span> <label class="switch"><input
                            type="checkbox"><span class="slider"></span></label></li>
                <li><span style="color: white;">পাসওয়ার্ড</span> <label class="switch"><input type="checkbox"><span
                            class="slider"></span></label></li>
                <li><span style="color: white;">নামিনী তথ্য</span> <label class="switch"><input type="checkbox"><span
                            class="slider"></span></label></li>
                <li><span style="color: white;">ছবি তথ্য</span> <label class="switch"><input type="checkbox"><span
                            class="slider"></span></label></li>
                <li><span style="color: white;">তথ্য হালনাগাদ</span> <span class="mail-icon">✉</span></li>
                <li><span style="color: white;">তথ্য সংষধন আবেদন</span> <span class="mail-icon">✉</span></li>
            </ul>
        </nav>
    </div>
</div>

<div class="views">

    <div class="view view-main">



        <div class="pages">

            <div data-page="index" class="page homepage" style="background-color: #0B2234;">
                <div class="page-content homepagecontent" >

                    <!-- <div class="homenavbar" style="background: #0B2234;">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div> -->
                    <div class="homenavbar2"
                            style="display: flex; align-items: center; justify-content: space-between; width: 100%; box-sizing: border-box;padding-top:15px;padding-bottom:15px;">
                            <!-- Left side -->
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <a href="javascript::void(0)" onclick="window.location.href='home.php'">
                                    <span style="color: #13D188; font-size: 16px; border-right: 1px solid #13D188; padding-right: 5px;">বিক্রান্স</span>
                                </a>
                                <a href="javascript::void(0)">
                                    <span style="color: #13D188; font-size: 16px; border-right: 1px solid #13D188; padding-right: 5px;">প্রশিক্ষণ</span>
                                </a>
                                <a href="javascript::void(0)">
                                    <span style="color: #13D188; font-size: 16px; border-right: 1px solid #13D188; padding-right: 5px;">সৎকর্ম</span>
                                </a>
                                <a href="javascript::void(0)">
                                    <span style="color: #13D188; font-size: 16px; border-right: 1px solid #13D188; padding-right: 5px;">প্রকাশনা</span>
                                </a>
                                <a href="javascript::void(0)">
                                    <span style="color: #13D188; font-size: 16px; border-right: 1px solid #13D188; padding-right: 5px;">ডাউনলোড</span>
                                </a>
                                <a href="javascript::void(0)">
                                    <span style="color: #13D188; font-size: 16px;">আরো</span>
                                </a>
                            </div>
                            <!-- Right side -->
                            <div style="display: flex; align-items: center; gap: 6px; margin-left: auto;">
                                <button class="notification"></button>
                                <!-- Menu Icon -->
                                <a href="index.php" data-panel="left" class="open-panel" style="padding-right: 10px;">
                                    <img style="width: 20px; height: auto; display: block;" src="images/custom/99.svg"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    

                    <!-- Slider -->
                    <div class="swiper-container swiper-init" data-effect="slide" data-parallax="true"
                        data-pagination=".swiper-pagination" data-paginationClickable="true">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide" data-bg="#0B2234" style="background-color: #0B2234;">
                                <img src="images/slider/slider4.jpeg" alt="" title="" />
                                <div class="slider-caption">
                                    <img src="images/custom/BIKRANS FINAL.png" alt="" style="width: 200px; position: absolute; top: -236px; left: 180px;">
                                    <!-- <h2 data-swiper-parallax="-100%">FRESH STYLE</h2>
                                    <span class="subtitle" data-swiper-parallax="-60%">WEB AND NATIVE</span>
                                    <p data-swiper-parallax="-30%">You can design and create, and build the most
                                        wonderful place in the world. But it takes people to make the dream a reality.
                                    </p>
                                    <span style="color: yellow;">BALANCE: <?php echo $member->jfund_balance; ?> BDT</span> -->
                                </div>
                            </div>
                            <div class="swiper-slide" data-bg="#233A6C">
                                <img src="images/slider/slider6.jpeg" alt="" title="" />
                                <div class="slider-caption">
                                    <img src="images/custom/BIKRANS FINAL.png" alt="" style="width: 200px; position: absolute; top: -236px; left: 180px;">
                                </div>
                            </div>
                            <div class="swiper-slide" data-bg="#fff">
                                <img src="images/slider/slider5.jpeg" alt="" title="" />
                                <div class="slider-caption">
                                    <img src="images/custom/BIKRANS FINAL.png" alt="" style="width: 200px; position: absolute; top: -236px; left: 180px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>

                    <nav class="main-nav">
                        <ul>
                            <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='services.php'"><img
                                        src="images/custom/home/Porisheba.svg" alt="" title="" /></a>
                            </li>
                            <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='talika.php'"><img src="images/custom/home/Talika.svg"
                                        alt="" title="" /></a></li>
                            <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='pre_register.php'"><img
                                        src="images/custom/home/Nibondhon.svg" alt="" title="" /></a>
                            </li>

                            <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='bikroi.php'"><img src="images/custom/home/Bikroy.svg"
                                        alt="" title="" /></a></li>
                            <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='agent.php'"><img src="images/custom/home/Agent.svg"
                                        alt="" title="" /></a></li>
                            <!-- <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='hishab.php'"><img src="images/custom/home/Hisab.svg"
                                        alt="" title="" /></a></li> -->
                            <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='create-order3.php'"><img
                                        src="images/custom/home/Order.svg" alt="" title="" /></a>
                            </li>


                            <li><a style="font-size: 16px !important" href="javascript:void(0)"><img
                                        src="images/custom/home/Babstapona.svg" alt=""
                                        onclick="window.location.href='babostha.php'" title="" /></a></li>
                            <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='transaction.php'"><img
                                        src="images/custom/home/Lenden.svg" alt="" title="" /></a></li>
                            <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='withdraw.php'"> <img
                                        src="images/custom/home/Uttalon.svg" alt="" title="" /></a>
                            </li>
                            <li><a style="font-size: 16px !important" href="javascript:void(0)"><img
                                        onclick="window.location.href='logout.php'" src="images/custom/home/Logout.svg"
                                        alt="" title="" /></a>
                            </li>
                            <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='profile.php'"><img
                                        src="images/custom/home/Profile.svg" alt="" title="" /></a>
                            </li>
                            <li><a style="font-size: 16px !important" href="javascript:void(0)"><img
                                        onclick="window.location.href='communication.php'"
                                        src="images/custom/home/Contact.svg" alt="" title="" /></a>
                            </li>
                            
                            
                            <!-- <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='add-fund.php'"><img
                                        src="images/custom/fund.png" alt="" title="" /></a>
                            </li>
                            <li><a style="font-size: 16px !important" href="javascript:void(0)"
                                    onclick="window.location.href='stock.php'"><img
                                        src="images/custom/in-stock.png" alt="" title="" /></a>
                            </li> -->

                            


                        </ul>
                    </nav>

                </div>
            </div>
        </div>


    </div>
</div>


<!-- Login Popup -->
<div class="popup popup-login">
    <div class="content-block">
        <h4>LOGIN</h4>
        <div class="loginform">
            <form id="LoginForm" method="post">
                <input type="text" name="Username" value="" class="form_input required" placeholder="username" />
                <input type="password" name="Password" value="" class="form_input required" placeholder="password" />
                <div class="forgot_pass"><a href="#" data-popup=".popup-forgot" class="open-popup">Forgot Password?</a>
                </div>
                <input type="submit" name="submit" class="form_submit" id="submit" value="SIGN IN" />
            </form>
            <div class="signup_bottom">
                <p>Don't have an account?</p>
                <a href="#" data-popup=".popup-signup" class="open-popup">SIGN UP</a>
            </div>
        </div>
        <div class="close_popup_button">
            <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
        </div>
    </div>
</div>

<!-- Register Popup -->
<div class="popup popup-signup">
    <div class="content-block">
        <h4>REGISTER</h4>
        <div class="loginform">
            <form id="RegisterForm" method="post">
                <input type="text" name="Username" value="" class="form_input required" placeholder="Username" />
                <input type="text" name="Email" value="" class="form_input required" placeholder="Email" />
                <input type="password" name="Password" value="" class="form_input required" placeholder="Password" />
                <input type="submit" name="submit" class="form_submit" id="submit" value="SIGN UP" />
            </form>
            <h5>- OR REGISTER WITH A SOCIAL ACCOUNT -</h5>
            <div class="signup_social">
                <a href="http://www.facebook.com/" class="signup_facebook external">FACEBOOK</a>
                <a href="http://www.twitter.com/" class="signup_twitter external">TWITTER</a>
            </div>
        </div>
        <div class="close_popup_button">
            <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
        </div>
    </div>
</div>

<!-- Forgot Password Popup -->
<div class="popup popup-forgot">
    <div class="content-block">
        <h4>FORGOT PASSWORD</h4>
        <div class="loginform">
            <form id="ForgotForm" method="post">
                <input type="text" name="Email" value="" class="form_input required" placeholder="email" />
                <input type="submit" name="submit" class="form_submit" id="submit" value="RESEND PASSWORD" />
            </form>
            <div class="signup_bottom">
                <p>Check your email and follow the instructions to reset your password.</p>
            </div>
        </div>
        <div class="close_popup_button">
            <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
        </div>
    </div>
</div>

<!-- Social Icons Popup -->
<div class="popup popup-social">
    <div class="content-block">
        <h4>Social Share</h4>
        <p>Share icons solution that allows you share and increase your social popularity.</p>
        <ul class="social_share">
            <li><a href="http://twitter.com/" class="external"><img src="images/icons/black/twitter.png" alt=""
                        title="" /><span>TWITTER</span></a></li>
            <li><a href="http://www.facebook.com/" class="external"><img src="images/icons/black/facebook.png" alt=""
                        title="" /><span>FACEBOOK</span></a></li>
            <li><a href="http://plus.google.com" class="external"><img src="images/icons/black/gplus.png" alt=""
                        title="" /><span>GOOGLE</span></a></li>
            <li><a href="http://www.dribbble.com/" class="external"><img src="images/icons/black/dribbble.png" alt=""
                        title="" /><span>DRIBBBLE</span></a></li>
            <li><a href="http://www.linkedin.com/" class="external"><img src="images/icons/black/linkedin.png" alt=""
                        title="" /><span>LINKEDIN</span></a></li>
            <li><a href="http://www.pinterest.com/" class="external"><img src="images/icons/black/pinterest.png" alt=""
                        title="" /><span>PINTEREST</span></a></li>
        </ul>
        <div class="close_popup_button"><a href="#" class="close-popup"><img src="images/icons/black/menu_close.png"
                    alt="" title="" /></a></div>
    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
    // Wait for page to fully load
    window.addEventListener('load', function() {

        // Target element - try multiple selectors
        const homepage = document.querySelector('.homepage') ||
            document.querySelector('.page') ||
            document.querySelector('body');

        const navbar2 = document.querySelector('.homenavbar2');
            

        // Function to change background
        function changeBackground(color) {
            if (color && homepage) {
                homepage.style.backgroundColor = color;
                homepage.style.transition = 'background-color 0.6s ease';
                navbar2.style.backgroundColor = color;
            }
        }

        // Method 1: Direct Swiper initialization
        const swiperEl = document.querySelector('.swiper-container');

        if (swiperEl && typeof Swiper !== 'undefined') {
            const mySwiper = new Swiper('.swiper-container', {
                effect: 'slide',
                parallax: true,
                speed: 600,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                on: {
                    init: function() {
                        const slide = this.slides[this.activeIndex];
                        const bg = slide.getAttribute('data-bg');
                        changeBackground(bg);
                    },
                    slideChange: function() {
                        const slide = this.slides[this.activeIndex];
                        const bg = slide.getAttribute('data-bg');
                        changeBackground(bg);
                    }
                }
            });
        }

        // Method 2: If using Framework7 or swiper is already initialized
        setTimeout(function() {
            const swiper = document.querySelector('.swiper-container')?.swiper;

            if (swiper) {

                // Set initial background
                const activeSlide = swiper.slides[swiper.activeIndex];
                const initialBg = activeSlide?.getAttribute('data-bg');
                changeBackground(initialBg);

                // Listen to slide changes
                swiper.on('slideChange', function() {
                    const slide = this.slides[this.activeIndex];
                    const bg = slide.getAttribute('data-bg');
                    changeBackground(bg);
                });
            }
        }, 500);

        // Method 3: Manual event listening (fallback)
        const slides = document.querySelectorAll('.swiper-slide');
        if (slides.length > 0) {
            // Set initial background from first slide
            const firstBg = slides[0].getAttribute('data-bg');
            changeBackground(firstBg);

            // Use MutationObserver to detect slide changes
            const observer = new MutationObserver(function() {
                const activeSlide = document.querySelector('.swiper-slide-active');
                if (activeSlide) {
                    const bg = activeSlide.getAttribute('data-bg');
                    changeBackground(bg);
                }
            });

            const swiperWrapper = document.querySelector('.swiper-wrapper');
            if (swiperWrapper) {
                observer.observe(swiperWrapper, {
                    attributes: true,
                    attributeFilter: ['class'],
                    subtree: true
                });
            }
        }
    });
</script>
<script>
    function previewImage(input, previewId) {
        const file = input.files[0];
        const preview = document.getElementById(previewId);

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>