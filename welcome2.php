<?php
require_once('sadmin/config.php');
require_once('sadmin/function.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
    <link href="images/apple-touch-startup-image-320x460.png" media="(device-width: 320px)"
        rel="apple-touch-startup-image">
    <link href="images/apple-touch-startup-image-640x920.png"
        media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/framework7.css">
    <link rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="css/swipebox.css" />
    <link type="text/css" rel="stylesheet" href="css/animations.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">

    <style>
        * {
            font-family: 'SolaimanLipi', sans-serif !important;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
            float: right;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 20px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #1657b7;
        }

        input:checked+.slider:before {
            transform: translateX(20px);
        }

        .mail-icon {
            float: right;
            font-size: 22px;
            color: white;

            border-radius: 6px;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 24px;
        }
    </style>
</head>

<body id="mobile_wrap">

    <div class="statusbar-overlay"></div>

    <div class="panel-overlay"></div>

    <?php require_once('sidebar.php'); ?>

    <div class="panel panel-right panel-reveal">
        <div class="user_login_info">
            <style>
                .swiper-container {
                    border-bottom-left-radius: 0% 0%;
                }

                .navbar_right {
                    width: 45px;
                }

                .navbar_right.search-item {
                    width: auto;
                }

                .search-box {
                    position: relative;
                    display: flex;
                    align-items: center;
                    padding: 0;
                }

                .search-box input {
                    background: transparent;
                    border: 2px solid #12d584;
                    border-radius: 5px;
                    padding: 0px -17px 6px 10px;
                    color: #000;
                    outline: none;
                    width: 60px;
                    font-size: 12px;
                    height: 8px;
                }

                .search-box .search-icon {
                    position: absolute;
                    background: url(images/icons/green/search.png) no-repeat center;
                    background-size: 14px;
                    width: 20px;
                    height: 20px;
                    border: none;
                    cursor: pointer;
                    top: 2px;
                    border-left: 2px solid #12d584;
                    border-radius: 0px;
                }

                /* Video Slider Styles */
                .video-slider-section {
                    position: absolute;
                    bottom: 0px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 97%;
                    max-width: 600px;
                    top: 60px;
                    z-index: 9999;
                    background-color: #8795A4;
                }

                .slider-container {
                    overflow: hidden;
                    /* background: white; */
                    /* padding: 5px; */
                    border: 5px solid white;
                }

                .video-wrapper {
                    display: flex;
                    transition: transform 0.4s ease;
                    width: 100%;
                }

                .video-slide {
                    width: 100%;
                    flex-shrink: 0 !important;
                }

                .video-slide iframe {
                    width: 100% !important;
                    height: 200px;
                    border: none;
                    display: block;
                }

                /* Dots Indicator */
                .slider-dots {
                    text-align: center;
                    margin-top: 15px;
                    background-color: transparent;
                    padding: 5px;
                    padding-bottom: 0px;
                    margin: 0px;
                    z-index: 9999;
                    top: 400px;
                }

                .dot {
                    display: inline-block;
                    width: 9px;
                    height: 9px;
                    margin: 0 5px;
                    background: rgba(255, 255, 255, 0.5);
                    border-radius: 50%;
                    cursor: pointer;
                    transition: all 0.3s;
                }

                .dot.active {
                    background: #12d584;
                    transform: scale(1.2);
                }

                .dot2 {
                    display: inline-block;
                    width: 9px;
                    height: 9px;
                    margin: 0 5px;
                    background: rgba(255, 255, 255, 0.5);
                    border-radius: 50%;
                    cursor: pointer;
                    transition: all 0.3s;
                }

                .dot2.active {
                    background: #13D484;
                    transform: scale(1.2);
                }

                .dot3 {
                    display: inline-block;
                    width: 9px;
                    height: 9px;
                    margin: 0 5px;


                    background: white;
                    border-radius: 50%;
                    cursor: pointer;
                    transition: all 0.3s;
                }

                .dot3.active {
                    background: #13D484;
                    transform: scale(1.2);
                }



                .live-ticker {
                    display: flex;
                    align-items: center;
                    background-color: #8795a4;
                    padding: 0px;
                    overflow: hidden;
                }

                .live-icon {
                    width: 50px;
                    height: auto;
                    margin: 0 10px;
                    flex-shrink: 0;
                    backdrop-filter: blur(4.5px);
                    -webkit-backdrop-filter: blur(4.5px);
                    user-select: none;
                    transition: 0.5s;
                }

                .ticker-text {
                    flex: 1;
                    overflow: hidden;
                    white-space: nowrap;
                }

                .ticker-text span {
                    display: inline-block;
                    color: white;
                    font-size: 13px;
                    padding-left: 100%;
                    animation: scroll-left 20s linear infinite;
                    letter-spacing: 3px;
                    opacity: 0.7;
                }

                @keyframes scroll-left {
                    0% {
                        transform: translateX(0);
                    }

                    100% {
                        transform: translateX(-100%);
                    }
                }

                /*  */
                .info-section {
                    background: #8795a4;
                    padding: 13px;
                    padding-left: 7px;
                    padding-right: 8px;
                }

                .info-container {
                    max-width: 900px;
                    margin: 0 auto;
                }

                .info-layout {
                    display: flex;
                    gap: 0px;
                    align-items: stretch;
                }

                .info-menu {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    gap: 15px;
                    padding-top: 25px;
                }

                .info-menu-item {
                    padding: 10px 0px;
                    display: flex;
                    align-items: center;
                    gap: 5px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    text-decoration: none;
                }

                .info-icon-wrapper {
                    width: 43px;
                    height: 43px;

                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                }

                .info-icon-wrapper img {
                    width: 43px;
                    height: 43px;
                    object-fit: contain;
                }

                .info-icon-arrow {
                    width: 32px;
                    height: 32px;

                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                }

                .info-icon-arrow img {
                    width: 35px;
                    height: 35px;
                    object-fit: contain;
                }

                .info-menu-text {
                    color: white;
                    font-size: 13px;
                    flex: 1;
                    letter-spacing: -0.2px;
                }

                .info-arrow {
                    color: #7dd3c0;
                    font-size: 24px;
                    font-weight: bold;
                }

                .info-card {
                    flex: 1.2;
                    background: white;
                    border: 3px solid black;
                    box-shadow:
                        0 0 0 3px #7e7f7f,
                        0 0 0 4px #00cc01,
                        0 10px 30px rgba(0, 0, 0, 0.3);
                    overflow: hidden;
                }

                .info-card-image {
                    width: 100%;
                    height: 180px;
                    background: white;
                    overflow: hidden;
                }

                .info-card-image img {
                    width: 100%;
                    height: 100%;
                }

                .info-card-footer {
                    background: #66C6B9;
                    padding: 0px;
                    text-align: center;
                    padding-top: 10px;
                }

                .info-card-title {
                    color: #2d4a4a;
                    font-size: 20px;
                    font-weight: bold;
                    line-height: 1.4;
                    letter-spacing: 0.5px;
                }

                .info-banner {
                    background: #66C6B9;
                    padding: 3px;
                    text-align: center;
                    margin-top: 20px;
                }

                .info-banner-text {
                    color: #2d4a4a;
                    font-size: 15px;
                }

                .main-veiw {
                    margin: 0px;
                    padding: 0px;
                    overflow-y: auto;
                }

                .swiper-container {
                    height: 2050px;
                }

                .row {
                    display: flex;
                    flex-wrap: wrap;
                    margin-left: -0.75rem;
                    margin-right: -0.75rem;
                }

                [class^="col"] {
                    padding-left: 0.75rem;
                    padding-right: 0.75rem;
                    box-sizing: border-box;
                }

                .col {
                    flex: 1 0 0%;
                }

                /* column widths */
                .col-1 {
                    width: 8.333333%;
                }

                .col-2 {
                    width: 16.666667%;
                }

                .col-3 {
                    width: 25%;
                }

                .col-4 {
                    width: 33.333333%;
                }

                .col-5 {
                    width: 41.666667%;
                }

                .col-6 {
                    width: 50%;
                }

                .col-7 {
                    width: 58.333333%;
                }

                .col-8 {
                    width: 66.666667%;
                }

                .col-9 {
                    width: 75%;
                }

                .col-10 {
                    width: 83.333333%;
                }

                .col-11 {
                    width: 91.666667%;
                }

                .col-12 {
                    width: 100%;
                }

                /* offset columns */
                .offset-1 {
                    margin-left: 8.333333%;
                }

                .offset-2 {
                    margin-left: 16.666667%;
                }

                .offset-3 {
                    margin-left: 25%;
                }

                .offset-4 {
                    margin-left: 33.333333%;
                }

                .offset-5 {
                    margin-left: 41.666667%;
                }

                .offset-6 {
                    margin-left: 50%;
                }

                .offset-7 {
                    margin-left: 58.333333%;
                }

                .offset-8 {
                    margin-left: 66.666667%;
                }

                .offset-9 {
                    margin-left: 75%;
                }

                .offset-10 {
                    margin-left: 83.333333%;
                }

                .offset-11 {
                    margin-left: 91.666667%;
                }

                .technology-img {
                    width: 35px;
                    display: block;
                    margin: auto;
                    background: #fff;
                    padding: 5px 20px;
                    margin-bottom: 5px;
                    border-radius: 10px;
                    border: 1px solid #00cc01;
                }

                .technology-text {
                    color: #FFFFFF;
                    opacity: .8;
                    text-align: justify;
                    font-size: 8px;
                    line-height: 16px;
                }

                .team-wrapper {
                    background: rgba(255, 255, 255, 0.95);
                    border-radius: 20px;
                    padding: 60px 40px;
                    max-width: 900px;
                    width: 100%;
                    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                    text-align: center;
                }

                .heading-text {
                    font-size: 48px;
                    font-weight: 700;
                    color: #2d3748;
                    margin-bottom: 30px;
                    letter-spacing: 1px;
                }

                .info-paragraph {
                    font-size: 18px;
                    line-height: 1.8;
                    color: #4a5568;
                    max-width: 800px;
                    margin: 0 auto;
                }

                /*  */
                .text-section {
                    width: 70%;
                    margin: 0 auto;
                    padding: 15px;
                    padding-top: 0px;
                    margin-top: 0px;
                }

                .text-section h2 {
                    text-align: center;
                    color: #FFFFFF;
                    margin-bottom: 0px;
                    padding-bottom: 0px;

                }

                .text-section p {
                    text-align: center;
                    color: #FFFFFF;
                    font-size: 8px;
                    line-height: 1.2;
                    padding: 0px;
                    margin: 0px;
                    margin-top: -3px;

                }

                /* people image slider */
                .people-slider-wrapper {
                    max-width: 950px;
                    margin: 0px auto;
                    padding: 0px;
                    display: flex;
                    align-items: center;
                    gap: 2px;
                }

                .people-slider-container {
                    flex: 1;
                    overflow: hidden;
                }

                .people-slider {
                    display: flex;
                    transition: transform 0.3s ease;
                }

                .people-slide {
                    min-width: 100%;
                    display: flex;
                    gap: 0;
                }

                .people-card {
                    flex: 1;
                    background: transparent;
                    margin-right: 3px;
                    text-align: center;
                }

                .people-card:last-child {
                    border-right: none;
                }

                .people-card img {
                    width: 100%;
                    height: 80px;
                    object-fit: contain;
                    display: block;

                }

                .people-card-info {
                    padding: 2px;

                    color: white;
                }

                .people-card-title {
                    font-size: 13px;

                }

                .people-card-subtitle {
                    font-size: 9px;
                    opacity: 0.9;
                }

                .people-arrow {
                    background-color: transparent;
                    border: none;
                    width: 18px;
                    height: 18px;
                    cursor: pointer;
                    padding: 2px;
                }

                .people-arrow.hidden {
                    visibility: hidden;
                }

                /* products */
                .product-section {

                    padding: 0px 8px;

                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .product-container {
                    max-width: 520px;
                    width: 100%;
                }

                /* Grid/Flex */
                .product-grid {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                    justify-content: center;
                }

                /* Card */
                .product-card {
                    flex: 0 1 calc(50% - 15px);
                    min-width: 100px;

                    border-radius: 20px;
                    padding: 0px;
                    text-align: center;
                    transition: all 0.3s ease;
                }

                /* image */

                .product-image {
                    width: 130px;
                    height: 130px;
                    display: block;
                    margin: 5px auto 0;

                    border-radius: 50%;
                    border: 8px solid #66C6B9;

                    background: radial-gradient(circle, #8795A4, #f7f8f9);

                    object-fit: contain;
                }



                /* Text */
                .product-title {
                    color: white;
                    font-size: 15px;
                    font-weight: 600;
                    margin: 0px;
                    padding: 0px;
                    padding-top: 5px;
                }

                .price-info {
                    color: rgba(255, 255, 255, 0.85);
                    font-size: 9px;

                    line-height: 1.6;
                    margin: 0px;
                    padding: 0px;
                }

                /* Link */
                .details-link {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    color: white;
                    font-size: 10px;
                    text-decoration: none;
                    margin: 0px;

                }

                .all-product-link {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    color: white;
                    font-size: 20px;
                    text-decoration: none;
                    margin: 0px;

                }


                .arrow {
                    font-size: 16px;
                    transition: transform 0.3s ease;
                }

                .details-link:hover .arrow {
                    transform: translateX(4px);
                }

                /* footer nav */
                .nav-section {

                    padding: 20px;
                }

                .nav-container {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    max-width: 500px;
                    margin: 0 auto;
                }

                /* Nav Item */
                .nav-item {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    gap: 0px;
                    text-decoration: none;
                    color: white;
                    transition: transform 0.3s ease;
                }

                .nav-item:hover {
                    transform: translateY(-3px);
                }

                /* Icon */
                .icon-wrapper {
                    width: 60px;
                    height: 60px;

                    display: flex;
                    align-items: center;
                    justify-content: center;


                }

                .icon-wrapper img {
                    width: 100%;
                    height: 100%;
                    object-fit: contain;
                }

                /* Text */
                .nav-text {
                    font-size: 16px;
                    color: white;
                    margin-top: -6px;
                }

                .my-text {
                    background-color: #66C6B9;
                    padding-left: 40px;
                    display: flex;
                    align-items: center;
                    color: #fff;
                    font-weight: 600;
                }

                .my-text img {
                    vertical-align: middle;
                    width: 20px;
                    margin-left: 30px;
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
        </div>
    </div>

    <div class="views">

        <div class="view view-main">
            <div class="pages">

                <div data-page="index" class="page">
                    <div class="page-content homepagecontent">

                        <div class="homenavbar">
                            <h1><span>Bi</span>krans</h1>
                            <a href="javascript::void(0)" data-panel="left" class="open-panel">
                                <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" />
                                </div>
                            </a>
                            <a href="javascript::void(0)" data-panel="left" class="open-panel">
                                <div class="navbar_right" style="margin-right: 30px; margin-top: 9px;">
                                    <div class="search-box">
                                        <input type="text">
                                        <button class="search-icon"></button>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript::void(0)" onclick="window.location.href='login.php'" data-panel="left"
                                class="open-panel">
                                <div class="navbar_right" style="padding:12px 0 0 0;color: #000;font-weight: 600">Login
                                </div>
                            </a>
                            <a href="javascript::void(0)" data-panel="left" class="open-panel">
                                <div class="navbar_right" style="padding:12px 0 0 0;color: #13D188;font-weight: 600">
                                    About
                                </div>
                            </a>
                            <a href="javascript::void(0)" onclick="window.location.href='index.php'" data-panel="left"
                                class="open-panel">
                                <div class="navbar_right" style="padding:12px 0 0 0;color: #000;font-weight: 600">Home
                                </div>
                            </a>
                        </div>

                        <!-- Slider -->
                        <div class="swiper-container swiper-init" data-effect="slide" data-parallax="true"
                            data-pagination=".swiper-pagination" data-paginationClickable="true">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" data-bg="#0B2234">
                                    <img src="images/slider/slide3.jpg" alt="" title="" />
                                </div>
                            </div>
                            <div class="video-slider-section">
                                <div class="slider-container">
                                    <div class="video-wrapper" id="videoWrapper">
                                        <!-- Video 1 -->
                                        <div class="video-slide">
                                            <iframe src="video/home-video.mp4" allowfullscreen></iframe>
                                        </div>
                                        <!-- Video 2 -->
                                        <div class="video-slide">
                                            <iframe src="video/home-video2.mov" allowfullscreen></iframe>
                                        </div>
                                        <!-- Video 3 -->
                                        <div class="video-slide">
                                            <iframe src="video/home-video2.mp4" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
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
                                                    <img id="sliderImage" src="images/custom/36.png" alt="স্লাইড">
                                                </div>
                                                <div class="info-card-footer" style="padding: 0px;">
                                                    <div class="slider-dots">
                                                        <span class="dot2 active" onclick="changeSlide(0)"></span>
                                                        <span class="dot2" onclick="changeSlide(1)"></span>
                                                        <span class="dot2" onclick="changeSlide(2)"></span>
                                                    </div>
                                                    <h3 class="info-card-title">মানুষের কল্যাণকর<br>উন্নয়নই সৎকর্ম</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Bottom Banner -->
                                        <div class="info-banner">
                                            <p class="info-banner-text" style="color: #000;">মানুষের উন্নয়নই সৎকর্ম
                                                মানুষের
                                                উন্নয়নই সৎকর্ম</p>
                                        </div>
                                    </div>
                                </section>

                                <div class="feature-layout" style="margin: 10px;">
                                    <div class="row">
                                        <div class="col-6" style="padding: 5px;">

                                            <div class="image-box2">
                                                <p class="my-text">
                                                    সংস্থাতার সূত্র
                                                    <img src="images/custom/55.png" alt="Business">
                                                </p>
                                                <img id="sliderImage2" src="images/custom/41.png" alt="Business"
                                                    style="width: 100%;">
                                            </div>
                                            <div class="slider-dots" style="margin-top: -9px; ">

                                                <span class="dot3 active" onclick="changeSlide2(0)"
                                                    style="margin: 1px;"></span>
                                                <span onclick="changeSlide2(1)" class="dot3"
                                                    style="margin: 1px;"></span>
                                                <span onclick="changeSlide2(2)" class="dot3"
                                                    style="margin: 1px;"></span>

                                            </div>
                                        </div>
                                        <div class="col-6" style="padding: 5px;">
                                            <div class="row">
                                                <div class="col-6" style="padding-right: 5px">
                                                    <img src="https://cdn-icons-png.flaticon.com/128/1793/1793151.png"
                                                        alt="" class="technology-img">
                                                    <h5 style="text-align: center;color:#fff;padding-bottom:5px">
                                                        টেকনোলজি
                                                    </h5>
                                                    <p class="technology-text">বাংলাদেশের প্রেক্ষাপটে ইন্টারন্যাশনাল
                                                        ওয়েবসাইটে সাপোর্ট নেওয়ার খাতে, সেগুলো সহজ করে বলাই
                                                        বাংলাদেশ থেকে চালানো ইন্টারন্যাশনাল ওয়েবসাইটে থাকেবাংলাদেশি
                                                        চালানো
                                                        ইন্টারন্যাশনাল</p>
                                                </div>
                                                <div class="col-6" style="padding-left: 5px">
                                                    <img src="https://cdn-icons-png.flaticon.com/128/1793/1793151.png"
                                                        alt="" class="technology-img">
                                                    <h5 style="text-align: center;color:#fff;padding-bottom:5px">
                                                        টেকনোলজি
                                                    </h5>
                                                    <p class="technology-text">বাংলাদেশের প্রেক্ষাপটে ইন্টারন্যাশনাল
                                                        ওয়েবসাইটে সাপোর্ট নেওয়ার খাতে, সেগুলো সহজ করে বলাই
                                                        বাংলাদেশ থেকে চালানো ইন্টারন্যাশনাল ওয়েবসাইটে থাকেবাংলাদেশি
                                                        চালানো
                                                        ইন্টারন্যাশনাল</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- text section -->
                                <div class="text-section">
                                    <h2>বিজেনস টিম</h2>
                                    <p>কাজ ভাগ হয়ে যায় দ্রুত ও দক্ষভাবে কাজ হয় বিভিন্ন দক্ষতার মানুহ পাওয়া যায় ভালো
                                        সিদ্ধান্ত নেওয়া যায় বিজেনস দ্রুত গ্রো করে ক্লায়েন্টের বিশ্বাস বাড়ে চাপ ও
                                        বুাঁক
                                        কমে </p>
                                </div>
                                <!--people slider  -->
                                <div class="people-slider-wrapper">
                                    <button class="people-arrow people-arrow-left" id="peoplePrevBtn"
                                        onclick="movePeopleSlide(-1)">‹</button>

                                    <div class="people-slider-container">
                                        <div class="people-slider" id="peopleSlider">
                                            <!-- Slide 1 -->
                                            <div class="people-slide">
                                                <div class="people-card">
                                                    <img src="images/custom/45.png" alt="Person 1">
                                                    <div class="people-card-info">
                                                        <div class="people-card-title">টেকনোলজি</div>
                                                        <div class="people-card-subtitle">পদবীসহ</div>
                                                    </div>
                                                </div>
                                                <div class="people-card">
                                                    <img src="images/custom/46.png" alt="Person 2">
                                                    <div class="people-card-info">
                                                        <div class="people-card-title">টেকনোলজি</div>
                                                        <div class="people-card-subtitle">পদবীসহ</div>
                                                    </div>
                                                </div>
                                                <div class="people-card">
                                                    <img src="images/custom/45.png" alt="Person 3">
                                                    <div class="people-card-info">
                                                        <div class="people-card-title">টেকনোলজি</div>
                                                        <div class="people-card-subtitle">পদবীসহ</div>
                                                    </div>
                                                </div>
                                                <div class="people-card">
                                                    <img src="images/custom/47.png" alt="Person 4">
                                                    <div class="people-card-info">
                                                        <div class="people-card-title">টেকনোলজি</div>
                                                        <div class="people-card-subtitle">পদবীসহ</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Slide 2 -->
                                            <div class="people-slide">
                                                <div class="people-card">
                                                    <img src="images/custom/46.png" alt="Person 2">
                                                    <div class="people-card-info">
                                                        <div class="people-card-title">টেকনোলজি</div>
                                                        <div class="people-card-subtitle">পদবীসহ</div>
                                                    </div>
                                                </div>
                                                <div class="people-card">
                                                    <img src="images/custom/45.png" alt="Person 1">
                                                    <div class="people-card-info">
                                                        <div class="people-card-title">টেকনোলজি</div>
                                                        <div class="people-card-subtitle">পদবীসহ</div>
                                                    </div>
                                                </div>

                                                <div class="people-card">
                                                    <img src="images/custom/45.png" alt="Person 3">
                                                    <div class="people-card-info">
                                                        <div class="people-card-title">টেকনোলজি</div>
                                                        <div class="people-card-subtitle">পদবীসহ</div>
                                                    </div>
                                                </div>
                                                <div class="people-card">
                                                    <img src="images/custom/47.png" alt="Person 4">
                                                    <div class="people-card-info">
                                                        <div class="people-card-title">টেকনোলজি</div>
                                                        <div class="people-card-subtitle">পদবীসহ</div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <button class="people-arrow people-arrow-right" id="peopleNextBtn"
                                        onclick="movePeopleSlide(1)"><img
                                            style="height:100%; width:100%; object-fit:contain"
                                            src="images/custom/44.png" alt=""></button>
                                </div>
                                <!-- text section -->
                                <div class="text-section">
                                    <h2>প্রোডাক্ট সেবা</h2>
                                    <p>কাজ ভাগ হয়ে যায় দ্রুত ও দক্ষভাবে কাজ হয় বিভিন্ন দক্ষতার মানুহ পাওয়া যায় ভালো
                                        সিদ্ধান্ত নেওয়া যায় বিজেনস দ্রুত গ্রো করে ক্লায়েন্টের বিশ্বাস বাড়ে চাপ ও
                                        বুাঁক
                                        কমে </p>
                                </div>
                                <!-- Product Section - Start -->
                                <section class="product-section">
                                    <div class="product-container">
                                        <div class="product-grid">
                                            <!-- Product 1: Z-DIA -->
                                            <div class="product-card">
                                                <img src="images/custom/product/11.png" alt="Sugar Balance"
                                                    class="product-image">
                                                <h3 class="product-title">ডায়াবেটিস নিরাময়</h3>
                                                <p class="price-info">প্রোডাক্ট নাম: কোড জানা</p>
                                                <p class="price-info">প্রোডাক্ট মূল্য: ১৫০০ টাকা</p>
                                                <a href="#" class="details-link">
                                                    বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                        src="images/custom/44.png" alt="">
                                                </a>
                                            </div>

                                            <!-- Product 2: Sugar Balance -->
                                            <div class="product-card">
                                                <img src="images/custom/product/12.png" alt="Sugar Balance"
                                                    class="product-image">
                                                <h3 class="product-title">ডায়াবেটিস নিরাময়</h3>
                                                <p class="price-info">প্রোডাক্ট নাম: কোড জানা</p>
                                                <p class="price-info">প্রোডাক্ট মূল্য: ১৮০০ টাকা</p>
                                                <a href="#" class="details-link">
                                                    বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                        src="images/custom/44.png" alt="">
                                                </a>
                                            </div>

                                            <!-- Product 3: Vita Force -->
                                            <div class="product-card">
                                                <img src="images/custom/product/13.png" alt="Sugar Balance"
                                                    class="product-image">
                                                <h3 class="product-title">লিকুরিয়া নিরাময়</h3>
                                                <p class="price-info">প্রোডাক্ট নাম: ভিটা ফোর্স</p>
                                                <p class="price-info">প্রোডাক্ট মূল্য: ১৪৫০ টাকা</p>
                                                <a href="#" class="details-link">
                                                    বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                        src="images/custom/44.png" alt="">
                                                </a>
                                            </div>

                                            <!-- Product 4: Leucon -->
                                            <div class="product-card">
                                                <img src="images/custom/product/14.png" alt="Sugar Balance"
                                                    class="product-image">
                                                <h3 class="product-title">ডায়াবেটিস নিরাময়</h3>
                                                <p class="price-info">প্রোডাক্ট নাম: লিড লিউকন</p>
                                                <p class="price-info">প্রোডাক্ট মূল্য: ১৫৫০ টাকা</p>
                                                <a href="#" class="details-link">
                                                    বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                        src="images/custom/44.png" alt="">
                                                </a>
                                            </div>
                                            <div class="product-card">
                                                <img src="images/custom/product/15.png" alt="Sugar Balance"
                                                    class="product-image">
                                                <h3 class="product-title">ডায়াবেটিস নিরাময়</h3>
                                                <p class="price-info">প্রোডাক্ট নাম: লিড লিউকন</p>
                                                <p class="price-info">প্রোডাক্ট মূল্য: ১৫৫০ টাকা</p>
                                                <a href="#" class="details-link">
                                                    বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                        src="images/custom/44.png" alt="">
                                                </a>
                                            </div>
                                            <div class="product-card">
                                                <img src="images/custom/product/16.png" alt="Sugar Balance"
                                                    class="product-image">
                                                <h3 class="product-title">ডায়াবেটিস নিরাময়</h3>
                                                <p class="price-info">প্রোডাক্ট নাম: লিড লিউকন</p>
                                                <p class="price-info">প্রোডাক্ট মূল্য: ১৫৫০ টাকা</p>
                                                <a href="#" class="details-link">
                                                    বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                        src="images/custom/44.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Product Section - End -->

                                <!-- text section -->
                                <div class="text-section" style="text-align: center; padding:10px">
                                    <a href="#" class="all-product-link">
                                        সমস্ত প্রোডাক্ট <img style="height:14px; width:14px; object-fit:contain"
                                            src="images/custom/44.png" alt="">
                                    </a>

                                </div>
                                <!-- Navigation Section - Start -->
                                <section class="nav-section">
                                    <nav class="nav-container">
                                        <!-- Left Item -->
                                        <a href="#" onclick="window.location.href='index.php'" class="nav-item">
                                            <div class="icon-wrapper">
                                                <img src="images/custom/37.png" alt="হোম">
                                            </div>
                                            <span class="nav-text">হোম</span>
                                        </a>

                                        <!-- Middle Item -->
                                        <a href="" onclick="window.location.href='login.php'" class="nav-item">
                                            <div class="icon-wrapper">
                                                <img src="images/custom/38.png" alt="লগইন">
                                            </div>
                                            <span class="nav-text">লগইন</span>
                                        </a>

                                        <!-- Right Item -->
                                        <a href="#" class="nav-item">
                                            <div class="icon-wrapper">
                                                <img src="images/custom/39.png" alt="সাইনইন">
                                            </div>
                                            <span class="nav-text">সাইনইন</span>
                                        </a>
                                    </nav>
                                </section>
                                <!-- Navigation Section - End -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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
    <script>
        let currentPeopleSlide = 0;
        const peopleSlider = document.getElementById('peopleSlider');
        const totalPeopleSlides = document.querySelectorAll('.people-slide').length;
        const peoplePrevBtn = document.getElementById('peoplePrevBtn');
        const peopleNextBtn = document.getElementById('peopleNextBtn');

        function updatePeopleArrows() {
            if (currentPeopleSlide === 0) {
                peoplePrevBtn.classList.add('hidden');
            } else {
                peoplePrevBtn.classList.remove('hidden');
            }

            if (currentPeopleSlide === totalPeopleSlides - 1) {
                peopleNextBtn.classList.add('hidden');
            } else {
                peopleNextBtn.classList.remove('hidden');
            }
        }

        function movePeopleSlide(direction) {
            currentPeopleSlide += direction;

            if (currentPeopleSlide >= totalPeopleSlides) {
                currentPeopleSlide = totalPeopleSlides - 1;
            } else if (currentPeopleSlide < 0) {
                currentPeopleSlide = 0;
            }

            peopleSlider.style.transform = `translateX(-${currentPeopleSlide * 100}%)`;
            updatePeopleArrows();
        }

        // Initialize
        updatePeopleArrows();
    </script>

    <!-- images slider 1 -->
    <script>
        const images = ['images/custom/36.png', 'images/custom/50.png', 'images/custom/51.png'];
        const mydot = document.querySelectorAll('.dot2');

        function changeSlide(index) {
            document.getElementById('sliderImage').src = images[index];
            mydot.forEach((dot, i) => dot.classList.toggle('active', i === index));
        }
    </script>
    <!-- images slider 2 -->
    <script>
        const images2 = ['images/custom/41.png', 'images/custom/50.png', 'images/custom/51.png'];
        const mydot2 = document.querySelectorAll('.dot3');

        function changeSlide2(index) {
            document.getElementById('sliderImage2').src = images2[index];
            mydot2.forEach((dot, i) => dot.classList.toggle('active', i === index));
        }
    </script>

    <?php require_once('footer.php'); ?>