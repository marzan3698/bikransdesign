<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/framework7.css">
    <link rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="css/swipebox.css" />
    <link type="text/css" rel="stylesheet" href="css/custom2.css" />
    <link type="text/css" rel="stylesheet" href="css/animations.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">

    <style>
        * {
            font-family: 'SolaimanLipi', sans-serif !important;
        }
    </style>
</head>

<body id="mobile_wrap" style="overflow-y: auto !important; height: auto !important;">

    <div class="hero-sec">
        <div class="homenavbar1">
            <h1><span>Bi</span>krans</h1>
            <a href="home.php">
                <h4 class="header-menus">Home
                </h4>
            </a>
            <a href="about.php">
                <h4 class="header-menus2">About
                </h4>
            </a>
            <a href="home.php">
                <h4 class="header-menus">Login
                </h4>
            </a>

            <div class="search-box">
                <input type="text">
                <button class="search-icon"></button>
            </div>

            <a href="welcome.php" data-panel="left" class="open-panel">
                <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" />
                </div>
            </a>
        </div>

        <!-- video slider -->
        <div class="video-slider-section">
            <div class="slider-container">
                <div class="video-wrapper" id="videoWrapper">
                    <!-- Video 1 -->
                    <div class="video-slide">
                        <iframe
                            src="https://www.youtube.com/embed/dQw4w9WgXcQ?controls=1&modestbranding=1&rel=0&showinfo=0"
                            allowfullscreen></iframe>
                    </div>
                    <!-- Video 2 -->
                    <div class="video-slide">
                        <iframe
                            src="https://www.youtube.com/embed/zBoAFR0lPIA?si=49-Awhul37VilzZW&controls=1&modestbranding=1&rel=0&showinfo=0"
                            allowfullscreen></iframe>
                    </div>
                    <!-- Video 3 -->
                    <div class="video-slide">
                        <iframe
                            src="https://www.youtube.com/embed/dQw4w9WgXcQ?controls=1&modestbranding=1&rel=0&showinfo=0"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <div class="homenavbar">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
    <!-- Dots -->
    <div class="main-veiw">
        <div class="slider-dots">
            <span class="dot active" onclick="goToSlide(0)"></span>
            <span class="dot" onclick="goToSlide(1)"></span>
            <span class="dot" onclick="goToSlide(2)"></span>
        </div>
        <div class="live-ticker">
            <img src="images/custom/32.png" alt="LIVE" class="live-icon">
            <div class="ticker-text">
                <span>মানুষের কল্যাণকর উন্নয়নই সৎকর্মকল্যাণইরউন্নয়ন</span>
            </div>
        </div>
        <section class="info-section">
            <div class="info-container">
                <div class="info-layout">
                    <!-- Left Menu -->
                    <div class="info-menu">
                        <!-- Menu Item 1 -->
                        <a href="#" class="info-menu-item">
                            <div class="info-icon-wrapper">
                                <img src="images/custom/33.png" alt="Icon 1">
                            </div>
                            <span class="info-menu-text">জীবন কর্ম ভবিষ্যৎ</span>

                            <div class="info-icon-arrow">
                                <img src="images/custom/35.png" alt="Icon 1">
                            </div>
                        </a>

                        <!-- Menu Item 2 -->
                        <a href="#" class="info-menu-item">
                            <div class="info-icon-wrapper">
                                <img src="images/custom/34.png" alt="Icon 2">
                            </div>
                            <span class="info-menu-text">বিকাশ বিজ্ঞান</span>
                            <div class="info-icon-arrow">
                                <img src="images/custom/35.png" alt="Icon 1">
                            </div>
                        </a>

                        <!-- Menu Item 3 -->
                        <a href="#" class="info-menu-item">
                            <div class="info-icon-wrapper">
                                <img src="images/custom/40.png" alt="Icon 3">
                            </div>
                            <span class="info-menu-text">আর্থিক উন্নয়ন</span>
                            <div class="info-icon-arrow">
                                <img src="images/custom/35.png" alt="Icon 1">
                            </div>
                        </a>
                    </div>

                    <!-- Right Card -->
                    <div class="info-card">
                        <div class="info-card-image">
                            <img src="images/custom/36.png" alt="মানুষের বৈঠক">
                        </div>
                        <div class="info-card-footer">
                            <h3 class="info-card-title">মানুষের কল্যাণকর<br>উন্নয়নই সৎকর্ম</h3>
                        </div>
                    </div>
                </div>

                <!-- Bottom Banner -->
                <div class="info-banner">
                    <p class="info-banner-text">মানুষের উন্নয়নই সৎকর্ম মানুষের উন্নয়নই সৎকর্ম</p>
                </div>
            </div>
        </section>
        <!-- fetures -->
        <!-- <div class="feture-layout">
            
            <div class="feture-menu">

                <div class="image-box2">
                    <img src="images/custom/41.png" alt="Business">
                </div>
            </div>

            
            <div class="feture-card">
                <div class="card">
                    <div class="card-icon">
                        <img src="network-icon.png" alt="icon">
                    </div>
                    <h2>টেকনোলজি</h2>
                    <p>বাংলাদেশের প্রেক্ষাপটে ইন্টারন্যাশনাল ওয়েবসাইটে সাপোর্ট নেওয়ার খাতে, সেগুলো সহজ করে বলাই
                        বাংলাদেশ থেকে চালানো ইন্টারন্যাশনাল ওয়েবসাইটে থাকেবাংলাদেশি চালানো ইন্টারন্যাশনাল</p>
                </div>

                <div class="card">
                    <div class="card-icon">
                        <img src="cloud-icon.png" alt="icon">
                    </div>
                    <h2>টেকনোলজি</h2>
                    <p>বাংলাদেশের প্রেক্ষাপটে ইন্টারন্যাশনাল ওয়েবসাইটে সাপোর্ট নেওয়ার খাতে, সেগুলো সহজ করে বলাই
                        বাংলাদেশ থেকে চালানো ইন্টারন্যাশনাল ওয়েবসাইটে থাকে চালানো ইন্টারন্যাশনাল</p>
                </div>
            </div>
        </div> -->




    </div>



    <script>
        let currentSlideIndex = 0;
        const slides = document.querySelectorAll('.video-slide');
        const dots = document.querySelectorAll('.dot');
        const wrapper = document.getElementById('videoWrapper');
        const sliderSection = document.querySelector('.video-slider-section');

        let touchStartX = 0;
        let touchEndX = 0;

        function updateSlider() {
            dots.forEach(d => d.classList.remove('active'));
            dots[currentSlideIndex].classList.add('active');

            // Change the calculation
            const slideWidth = slides[0].offsetWidth;
            wrapper.style.transform = `translateX(-${currentSlideIndex * slideWidth}px)`;
        }

        function goToSlide(index) {
            currentSlideIndex = index;
            updateSlider();
        }

        function nextSlide() {
            currentSlideIndex = (currentSlideIndex + 1) % 3;
            updateSlider();
        }

        function prevSlide() {
            currentSlideIndex = (currentSlideIndex - 1 + 3) % 3;
            updateSlider();
        }

        // Touch events for swipe
        sliderSection.addEventListener('touchstart', (e) => {
            touchStartX = e.touches[0].clientX;
        });

        sliderSection.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].clientX;
            handleSwipe();
        });

        // Mouse events for desktop swipe
        let mouseDown = false;
        let startX = 0;

        sliderSection.addEventListener('mousedown', (e) => {
            mouseDown = true;
            startX = e.clientX;
        });

        sliderSection.addEventListener('mouseup', (e) => {
            if (mouseDown) {
                mouseDown = false;
                const endX = e.clientX;
                const diff = startX - endX;

                if (diff > 50) {
                    nextSlide();
                } else if (diff < -50) {
                    prevSlide();
                }
            }
        });

        sliderSection.addEventListener('mouseleave', () => {
            mouseDown = false;
        });

        function handleSwipe() {
            const swipeDistance = touchStartX - touchEndX;

            if (swipeDistance > 50) {
                nextSlide();
            } else if (swipeDistance < -50) {
                prevSlide();
            }
        }
    </script>

    <?php require_once('footer.php'); ?>
</body>

</html>