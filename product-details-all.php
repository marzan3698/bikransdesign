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
    <link href="https://fonts.cdnfonts.com/css/]" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">
    <style>
        * {
            font-family: 'SolaimanLipi', sans-serif !important;
        }

        body {
            background: #052135 !important;
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

<body id="mobile_wrap" class="products-page">

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

                .search-wrapper {
                    position: relative;
                    display: flex;
                    align-items: center;
                }

                .search-input {
                    width: 30px;
                    /* আগে ছিল 0, এখন fixed width */
                    opacity: 1;
                    /* আগে ছিল 0 */
                    background: transparent;
                    border: none;
                    border-radius: 5px;
                    /* right side flat */
                    color: #fff;
                    outline: none;
                    font-size: 9px;
                    height: 18px;
                    padding: 0 8px;

                    /* আগে ছিল 0 */
                    /* transition সরিয়ে দিন - দরকার নেই */
                }

                .search-btn {
                    border-radius: 0 5px 5px 0;
                    /* left side flat */
                }

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

                /* Video Slider Styles */
                .video-slider-section {
                    position: absolute;
                    bottom: 0px;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 95%;
                    max-width: 600px;
                    top: 68px;
                    z-index: 9999;

                    /*   background-color: #8795A4; */
                }

                .slider-container {
                    overflow: hidden;
                    border: 1px solid #12D584;
                    border-radius: 20px;
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

                .video-slide video {
                    width: 100% !important;
                    /*  height: 200px; */
                    border: none;
                    display: block;
                }

                /* Dots Indicator */
                .slider-dots {
                    text-align: center;
                    margin-top: 15px;
                    background-color: #052135;
                    padding: 0px;
                    padding-bottom: 0px;
                    margin: 0px;
                    z-index: 9999;
                    top: 400px;
                }

                .dot {
                    display: inline-block;
                    width: 5px;
                    height: 5px;
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
                    width: 5px;
                    height: 5px;
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
                    width: 5px;
                    height: 5px;
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
                    background-color: #052135;
                    padding: 0px;
                    overflow: hidden;
                }

                .live-icon {
                    width: 19px;
                    height: auto;
                    margin: 0 2.5px;
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
                    color: #12D584;
                }

                #firstVideo {
                    cursor: pointer;
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
                    background: #052135;
                    width: 95%;
                    margin: auto;
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
                    flex: 0 0 60%;
                    display: flex;
                    flex-direction: column;
                    gap: 17px;
                    padding-top: 15px;
                    padding-right: 3px;
                }

                .info-menu-item {
                    padding: 10px 0px;
                    display: flex;
                    align-items: center;
                    gap: 3px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    text-decoration: none;
                }

                .info-icon-wrapper {
                    width: 36px;
                    height: 36px;

                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                }

                .info-icon-wrapper img {
                    width: 40px;
                    height: 40px;
                    object-fit: contain;
                    border: 1px solid #48DE7F;
                    padding: 4px;
                    border-radius: 10px 10px 0px 10px;
                }

                .info-icon-arrow {
                    width: 22px;
                    height: 32px;

                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                }

                .info-icon-arrow img {
                    width: 20px;
                    height: 20px;
                    object-fit: contain;
                }

                .info-menu-text {
                    color: #12D584;
                    font-size: 12.2px;
                    flex: 1;
                    letter-spacing: -0.2px;
                    padding-left: 12px;
                }

                .info-arrow {
                    color: #5EB389;
                    font-size: 24px;
                    font-weight: bold;
                }

                .info-card {
                    flex: 0 0 50%;
                    overflow: hidden;
                }

                .info-card-image {
                    width: 120px;
                    overflow: hidden;
                    position: absolute;
                    right: 0px;
                }

                .info-card-image img {
                    width: 100%;
                    height: 100%;
                }

                .info-card-footer {
                    background: #12D584;
                    padding: 0px;
                    text-align: center;
                    padding-top: 10px;
                }

                .info-card-title {
                    color: #000;
                    font-size: 9px;
                    text-align: left;
                    padding: 20px 0 20px 7px;
                    word-spacing: 1px;

                }

                .info-banner {
                    background: #12D584;
                    text-align: center;
                    margin-top: 20px;
                }

                .info-banner-text {
                    color: #000;
                    font-size: 15px;
                    width: 100%;
                    display: block;
                    margin: auto;
                    background: #12D584;
                    margin-top: 20px;
                    padding: 5px;
                    text-align: center;
                }

                .main-veiw {
                    margin: 0px;
                    padding: 0px;
                    overflow-y: auto;
                }

                /* Default (small devices) */
                .swiper-container {
                    height: 2085px;
                }

                /* Devices above 430px */
                @media (min-width: 430px) {
                    .swiper-container {
                        height: 2100px;
                    }
                }

                /* Devices above 470px */
                @media (min-width: 470px) {
                    .swiper-container {
                        height: 2115px;
                    }
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

                .img-wrapper {
                    position: relative;
                    text-align: center;
                }

                .technology-img {
                    width: 100px;
                    display: block;
                    margin: auto;
                    margin-bottom: 10px;
                }

                .tech-title {
                    position: absolute;
                    bottom: -18px;
                    left: 50%;
                    transform: translateX(-50%);
                    color: #12D584;
                    font-size: 12px;
                    white-space: nowrap;
                }

                .technology-text {
                    color: white;
                    opacity: .8;
                    text-align: justify;
                    font-size: 10px;
                    line-height: 16px;
                    display: inline;
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
                    width: 100%;
                    margin: 0 auto;
                    /* padding: 15px; */
                    padding-top: 0px;
                    margin-top: 15px;
                }

                .text-section h2 {
                    text-align: center;
                    color: #12D584;
                    margin-bottom: 0px;
                    padding-bottom: 0px;
                }

                .text-section h3 {
                    text-align: center;
                    color: #12D584;
                    margin-bottom: 0px;
                    padding-bottom: 0px;
                }

                .text-section p {
                    text-align: justify;
                    color: #12D584;
                    font-size: 10px;
                    line-height: 1.4;
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
                    gap: 5px;
                }

                .people-card {
                    display: flex;
                    flex-direction: column;
                    width: 25%;
                    gap: 5px;
                }

                .people-card:last-child {
                    border-right: none;
                }

                .people-card img {
                    width: 90%;
                    height: 100px;
                    display: block;
                    border: 1px solid #12D584;
                    padding: 3px;
                }

                .people-card-info {
                    padding: 2px;
                    color: white;
                }

                .people-card-title {
                    font-size: 13px;
                    color: #12D584;
                    text-align: center;

                }

                .people-card-subtitle {
                    font-size: 9px;
                    opacity: 0.9;
                    text-align: center;
                }

                .people-arrow {
                    background-color: transparent;
                    border: none;
                    width: 18px;
                    height: 18px;
                    cursor: pointer;
                    padding: 2px;
                    position: absolute;
                }

                .people-arrow-right {
                    right: -5px;
                    position: absolute;
                }

                .people-arrow-left {
                    left: -5px;
                }

                .people-arrow.hidden {
                    visibility: hidden;
                }

                /* products */
                .product-section {
                    padding: 0px;
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
                    color: #12D584;
                    font-size: 17px;
                    font-weight: 600;
                    margin: 0px;
                    padding: 0px;
                    padding-top: 5px;
                }

                .price-info {
                    color: rgba(255, 255, 255, 0.85);
                    /* font-size: 10px; */

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
                    color: #12D584;

                }

                .all-product-link {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    color: white;
                    font-size: 20px;
                    text-decoration: none;
                    margin: 0px;
                    color: #12D584;

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

                /* Default: 370px এর নিচের screen */
                .search-box2 {
                    width: 50px !important;
                }

                /* 370px এর উপরের screen */
                @media (min-width: 371px) {
                    .search-box2 {
                        width: 60px !important;
                    }
                }

                @media (min-width: 385px) {
                    .search-box2 {
                        width: 68px !important;
                    }
                }

                .swiper-slide {
                    background: #052135 !important;
                }
            </style>

            <style>
                * {
                    font-family: 'SolaimanLipi', sans-serif !important;
                }

                h1,
                h2,
                h3,
                h4,
                h5,
                h6,
                p {
                    font-family: 'SolaimanLipi', sans-serif !important;
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

                        <div class="homenavbar2"
                            style="display: flex; align-items: center; justify-content: space-between; width: 100%; box-sizing: border-box;padding-top:15px;">
                            <!-- Left side -->
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <h1 style="padding: 0px;"><span>Bi</span>krans</h1>
                                <a href="javascript::void(0)" onclick="window.location.href='index.php'">
                                    <span style="color: #13D188;  font-size: 13px;">Home</span>
                                </a>
                                <a href="javascript::void(0)">
                                    <span style="color: #13D188;  font-size: 13px;">About</span>
                                </a>
                                <a href="javascript::void(0)" onclick="window.location.href='login.php'">
                                    <span style="color: #ffff;  font-size: 13px;">Join</span>
                                </a>
                                <a href="javascript::void(0)" onclick="window.location.href='login.php'">
                                    <span style="color: #ffff;  font-size: 13px;">Login</span>
                                </a>
                            </div>
                            <!-- Right side -->
                            <div style="display: flex; align-items: center; gap: 6px; margin-left: auto;">
                                <button class="notification"></button>

                                <div class="search-wrapper"
                                    style="border: #12D584 1px solid;padding:1px; padding-right:6px; border-radius:5px;">
                                    <input type="text" class="search-input" style="margin-right: 4px;">
                                    <img src="images/custom/1111.svg" alt="" width="13px" class="search-btn">
                                </div>

                                <!-- Menu Icon -->
                                <a href="index.php" data-panel="left" class="open-panel" style="padding-right: 10px;">
                                    <img style="width: 20px; height: auto; display: block;" src="images/custom/99.svg"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Slider -->

                        <div class="video-slider-section">
                            <nav class="main-nav" style="margin-top: 10px !important; width: 95%; margin: auto; border: 1px solid #0B2234; min-height:86vh;">
                                <div style="width: 95%;display:block;margin:auto;margin-top:10px">
                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'almojin') { ?>
                                        <img src="images/custom/product/banner/almojin.jpg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            <strong>Amlojin – Complete Piles & Digestive Care Formula</strong> <br>
                                            গ্যাস্ট্রিক, কোষ্ঠকাঠিন্য, পাইলস, হজম সমস্যা ও শরীরের টক্সিন দূর করার প্রাকৃতিক সমাধান।<br>

                                            আপনি কি এসব সমস্যায় ভুগছেন?<br>

                                            👉দীর্ঘদিনের গ্যাস্ট্রিক ও অম্বল<br>
                                            👉পেট ফাঁপা, গ্যাস ও বদহজম<br>
                                            👉কোষ্ঠকাঠিন্য<br>
                                            👉অনিয়মিত পায়খানা<br>
                                            👉খাবার হজমে সমস্যা<br>
                                            👉শরীরে বিষাক্ত বর্জ্য (Toxins) জমে থাকা<br>
                                            👉পাইলসের কারণে ব্যথা, জ্বালাপোড়া বা রক্তপাত।<br>

                                            যদি উত্তর "হ্যাঁ" হয়, তাহলে Amlojin হতে পারে আপনার জন্য একটি কার্যকর প্রাকৃতিক সমাধান।<br>

                                            Amlojin কী?<br>
                                            Amlojin একটি সম্পূর্ণ প্রাকৃতিক Piles & Digestive Care Formula, যা একসাথে পাচনতন্ত্র, অন্ত্র, লিভার ও রক্ত পরিশোধনের উপর কাজ করে।<br>
                                            এতে রয়েছে আমলকি, হরিতকি, বহেরা, সোনাপাতা, হলুদ, কেশুত, নাগদানা, কালোজিরা, জিরা, পিপুল, ইসবগুলের ভুসি, নিম পাতা, ভৃঙ্গরাজসহ বহু ভেষজ উপাদানের সমন্বয়।<br>
                                            এই শক্তিশালী ভেষজ ফর্মুলা শুধু উপসর্গ কমায় না, বরং সমস্যার মূল কারণের উপর কাজ করতে সাহায্য করে।<br>
                                            গ্যাস্ট্রিকের উপর Amlojin-এর কার্যকারিতা<br>
                                            ✅ অতিরিক্ত গ্যাস কমাতে সাহায্য করে<br>
                                            পাকস্থলীতে জমে থাকা অতিরিক্ত গ্যাস বের হতে সাহায্য করে এবং গ্যাস তৈরির প্রবণতা কমায়।<br>
                                            ✅ অম্বল ও বুকজ্বালা প্রশমিত করে<br>
                                            পাকস্থলীর এসিডের ভারসাম্য রক্ষা করে বুকজ্বালা ও টক ঢেকুরের সমস্যা কমাতে সাহায্য করে।<br>
                                            ✅ পেট ফাঁপা দূর করে<br>
                                            খাবার দীর্ঘক্ষণ পেটে জমে থাকার কারণে যে অস্বস্তি তৈরি হয়, তা কমাতে সহায়তা করে।<br>
                                            ✅ খাবার হজমে সহায়তা করে<br>
                                            হজমশক্তি বৃদ্ধি করে খাবারকে সহজে ভাঙতে ও শোষণ করতে সাহায্য করে।<br>
                                            কোষ্ঠকাঠিন্যের উপর কার্যকারিতা<br>
                                            ✅ মলকে নরম করতে সাহায্য করে<br>
                                            ইসবগুলের ভুসি ও অন্যান্য প্রাকৃতিক উপাদান মলকে নরম ও স্বাভাবিক রাখতে সাহায্য করে।<br>
                                            ✅ নিয়মিত পায়খানা নিশ্চিত করতে সহায়তা করে<br>
                                            অন্ত্রের স্বাভাবিক কার্যক্রম উন্নত করে প্রতিদিন স্বাভাবিকভাবে মলত্যাগে সাহায্য করে।<br>
                                            ✅ দীর্ঘদিনের কোষ্ঠকাঠিন্য কমাতে সহায়ক<br>
                                            শুকনো ও শক্ত মল নরম করে পায়খানার সময় অতিরিক্ত চাপ কমাতে সাহায্য করে।<br>
                                            ✅ পাইলসের ঝুঁকি কমাতে সাহায্য করে<br>
                                            কোষ্ঠকাঠিন্য পাইলসের অন্যতম কারণ। নিয়মিত মলত্যাগ নিশ্চিত হওয়ার ফলে পাইলসের চাপও কমতে পারে।<br>
                                            হজম শক্তি বৃদ্ধিতে Amlojin-এর ভূমিকা<br>
                                            ✅ দুর্বল হজমশক্তি উন্নত করতে সহায়ক<br>
                                            খাবার থেকে প্রয়োজনীয় পুষ্টি শোষণে সাহায্য করে।<br>
                                            ✅ ক্ষুধা বাড়াতে সাহায্য করে<br>
                                            হজম প্রক্রিয়া উন্নত হওয়ার ফলে স্বাভাবিক ক্ষুধা ফিরে আসতে পারে।<br>
                                            ✅ বদহজম কমাতে সহায়ক<br>
                                            ভারী খাবার খাওয়ার পর অস্বস্তি, ঢেকুর, পেট ভারী লাগা ইত্যাদি কমাতে সাহায্য করে।<br>
                                            ✅ অন্ত্রের কার্যকারিতা উন্নত করে পরিপাকতন্ত্রকে সক্রিয় রেখে সুস্থ অন্ত্র গঠনে সহায়তা করে। টক্সিন রিমুভ ও শরীর পরিষ্কারে কার্যকারিতা<br>
                                            বর্তমান সময়ে অনিয়মিত খাদ্যাভ্যাস, ফাস্টফুড, রাসায়নিকযুক্ত খাবার ও কম পানি পান করার কারণে শরীরে বিভিন্ন ধরনের বর্জ্য জমতে পারে। <br>
                                            Amlojin-এর ভেষজ উপাদানগুলো—<br>
                                            ✅ শরীরের প্রাকৃতিক Detox প্রক্রিয়াকে সহায়তা করে<br>
                                            ✅ অন্ত্রে জমে থাকা বর্জ্য বের হতে সাহায্য করে<br>
                                            ✅ রক্ত পরিশোধনে সহায়ক ভেষজ উপাদান সরবরাহ করে<br>
                                            ✅ লিভারের স্বাভাবিক কার্যক্রমকে সমর্থন করে<br>
                                            ✅ শরীরকে ভেতর থেকে পরিষ্কার রাখতে সহায়তা করে<br>
                                            ফলে শরীর হালকা লাগে, সতেজতা বৃদ্ধি পায় এবং সার্বিক সুস্থতা বজায় রাখতে সাহায্য করে।<br>
                                            পাইলস রোগীদের জন্য কেন উপকারী?<br>
                                            Amlojin শুধুমাত্র পাইলসের লক্ষণ নয়, পাইলসের প্রধান কারণগুলোর উপরও কাজ করতে সাহায্য করে।<br>
                                            ✔️ মলত্যাগ সহজ করে<br>
                                            ✔️ রক্তপাত কমাতে সহায়তা করে<br>
                                            ✔️ ব্যথা ও জ্বালাপোড়া কমাতে সাহায্য করে<br>
                                            ✔️ পাইলসের পুনরাবৃত্তির ঝুঁকি কমাতে সহায়ক<br>
                                            ✔️ মলদ্বারের উপর চাপ কমাতে সাহায্য করে<br>
                                            কারা Amlojin সেবন করতে পারেন?<br>
                                            ✅ যাদের গ্যাস্ট্রিকের সমস্যা আছে<br>
                                            ✅ যাদের নিয়মিত কোষ্ঠকাঠিন্য হয়<br>
                                            ✅ যাদের পেট ফাঁপা ও গ্যাসের সমস্যা আছে<br>
                                            ✅ যাদের খাবার হজমে সমস্যা হয়<br>
                                            ✅ যাদের ক্ষুধামন্দা আছে<br>
                                            ✅ যাদের পাইলসের সমস্যা রয়েছে<br>
                                            ✅ যারা শরীরকে প্রাকৃতিকভাবে Detox রাখতে চান<br>
                                            ✅ যারা সুস্থ ও পরিচ্ছন্ন পরিপাকতন্ত্র বজায় রাখতে চান<br>
                                            Amlojin-এর বিশেষ বৈশিষ্ট্য<br>
                                            🌿 ১০০% প্রাকৃতিক ভেষজ উপাদান<br>
                                            🌿 গ্যাস্ট্রিক, কোষ্ঠকাঠিন্য ও হজম—একসাথে তিনটি বিষয়ে কাজ করে<br>
                                            🌿 অন্ত্র পরিষ্কার রাখতে সহায়ক<br>
                                            🌿 শরীরের প্রাকৃতিক Detox প্রক্রিয়াকে সমর্থন করে<br>
                                            🌿 দীর্ঘমেয়াদে পরিপাকতন্ত্রের সুস্থতা বজায় রাখতে সহায়ক<br>
                                            🌿 পাইলস রোগীদের জন্য বিশেষভাবে উপযোগী<br>
                                            স্লোগান
                                            "গ্যাস, কোষ্ঠকাঠিন্য, বদহজম ও শরীরের জমে থাকা বর্জ্যের বিরুদ্ধে প্রাকৃতিক শক্তি—Amlojin"
                                            "সুস্থ হজম, পরিষ্কার অন্ত্র, স্বস্তির জীবন"
                                        </div><br>
                                    <?php } ?>

                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'asheet') { ?>
                                        <img src="images/custom/product/banner/asheet.jpeg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            <strong>🌿 ASHTEET (HALEET)</strong><br>
                                            ক্ষুধা বাড়ায় • হজমশক্তি উন্নত করে • দুর্বল শরীরকে স্বাস্থ্যবান হতে সহায়তা করে<br>

                                            ❝শুধু বেশি খাওয়া নয়, খাওয়া খাবার শরীরে লাগাটাই আসল কথা।❞<br>

                                            অনেক মানুষ আছেন যারা নিয়মিত খাবার খেলেও শরীর স্বাস্থ্যবান হয় না। শরীর থাকে হালকা, পাতলা, দুর্বল ও লিকলিকে। একটু পরিশ্রম করলেই ক্লান্তি আসে, মুখের উজ্জ্বলতা কমে যায়, শরীরে শক্তি ও কর্মক্ষমতা থাকে না।<br>

                                            এর প্রধান কারণ অনেক সময় খাবারের অভাব নয়, বরং দুর্বল হজমশক্তি ও পুষ্টি শোষণের ঘাটতি।<br>

                                            এই সমস্যার সমাধানে বিশেষ ইউনানী ফর্মুলা ASHTEET (HALEET) কাজ করে ক্ষুধা বৃদ্ধি, হজমশক্তি উন্নয়ন এবং শরীরকে ভেতর থেকে শক্তিশালী করার লক্ষ্যে।<br><br>

                                            🌿 Ashteet (Haleet)<br>
                                            ক্ষুধামন্দা, দুর্বল হজমশক্তি ও অপুষ্টিজনিত দুর্বলতার প্রাকৃতিক সমাধান<br>

                                            "ভালো হজমই ভালো স্বাস্থ্যের ভিত্তি"<br><br>

                                            আপনি কি খাবার খেলেও শরীরে শক্তি পান না? ক্ষুধা লাগে না? অল্প খেলেই পেট ভরে যায়? গ্যাস, বদহজম, অরুচি এবং শারীরিক দুর্বলতায় ভুগছেন?<br>

                                            তাহলে Ashteet (Haleet) হতে পারে আপনার সুস্থ ও প্রাণবন্ত জীবনের বিশ্বস্ত সঙ্গী।<br>

                                            বিশেষভাবে নির্বাচিত ইউনানী উপাদানের সমন্বয়ে তৈরি এই ফর্মুলা শুধু ক্ষুধা বাড়ায় না, বরং হজমশক্তির উন্নতির মাধ্যমে শরীরকে খাবারের প্রকৃত পুষ্টি গ্রহণে সহায়তা করে, যা দীর্ঘমেয়াদে স্বাস্থ্য, শক্তি ও কর্মক্ষমতা বৃদ্ধিতে ভূমিকা রাখে।<br><br>

                                            🔥 কেন ASHTEET আলাদা?<br><br>

                                            ✅ হজমশক্তিকে শক্তিশালী করে<br>

                                            একটি সুস্থ শরীরের মূল ভিত্তি হলো সুস্থ হজমতন্ত্র।<br>

                                            খাবার যদি সঠিকভাবে হজম না হয়, তাহলে শরীর পর্যাপ্ত পুষ্টি পায় না। ফলে—<br>

                                            ❌ শরীর দুর্বল থাকে<br>
                                            ❌ ওজন বাড়তে চায় না<br>
                                            ❌ খাওয়ার রুচি কমে যায়<br>
                                            ❌ ক্লান্তি ও অবসাদ দেখা দেয়<br>

                                            ASHTEET হজমশক্তিকে সক্রিয় ও শক্তিশালী করতে সহায়তা করে, ফলে শরীর খাবারের প্রকৃত পুষ্টি গ্রহণের সুযোগ পায়।<br><br>

                                            🔥 Ashteet-এর প্রধান কার্যকারিতাঃ<br><br>

                                            ✅ ক্ষুধা বৃদ্ধি করেঃ<br><br>

                                            অনেকেই দীর্ঘদিন ক্ষুধামন্দা বা অরুচির সমস্যায় ভোগেন। ফলে পর্যাপ্ত খাবার খেতে পারেন না এবং শরীর ধীরে ধীরে দুর্বল হয়ে পড়ে।<br>

                                            Ashteet—<br>

                                            ✔️ ক্ষুধা উদ্রেক করতে সহায়তা করে<br>
                                            ✔️ খাবারের প্রতি আগ্রহ বাড়াতে সাহায্য করে<br>
                                            ✔️ নিয়মিত ও পর্যাপ্ত খাদ্য গ্রহণে সহায়ক ভূমিকা রাখে<br><br>

                                            ✅ হজমশক্তি উন্নত করেঃ <br><br>

                                            শুধু বেশি খাওয়া যথেষ্ট নয়; খাবার ঠিকমতো হজম হওয়াও জরুরি।<br>

                                            Ashteet-এর অন্যতম গুরুত্বপূর্ণ কাজ হলো—<br>

                                            ✔️ হজম প্রক্রিয়াকে সক্রিয় করতে সহায়তা করা<br>
                                            ✔️ খাদ্য ভাঙা ও শোষণে সহায়ক পরিবেশ তৈরি করা<br>
                                            ✔️ বদহজম, অস্বস্তি ও হজমজনিত দুর্বলতা কমাতে সাহায্য করা<br><br>

                                            ✅ খাবারের পুষ্টিগুণ শরীরে কাজে লাগাতে সাহায্য করেঃ<br><br>

                                            অনেক মানুষ প্রচুর খাবার খেলেও শরীরে শক্তি পান না। কারণ খাবারের পুষ্টি যথাযথভাবে শোষিত হয় না।<br>

                                            হজমশক্তির উন্নতির মাধ্যমে Ashteet—<br>

                                            ✔️ খাদ্যের পুষ্টি গ্রহণে সহায়তা করে<br>
                                            ✔️ শরীরের স্বাভাবিক পুষ্টির ভারসাম্য রক্ষায় ভূমিকা রাখে<br>
                                            ✔️ দীর্ঘমেয়াদে স্বাস্থ্য উন্নয়নে সহায়ক হতে পারে<br><br>

                                            ✅ হালকা, পাতলা ও দুর্বল শরীরকে পুষ্টি গ্রহণে সহায়তা করেঃ<br><br>

                                            যারা দীর্ঘদিন ধরে—<br>

                                            ✔️ হ্যাংলা-পাতলা<br>
                                            ✔️ দুর্বল<br>
                                            ✔️ ওজন কম<br>
                                            ✔️ শক্তিহীন<br>

                                            তাদের অনেকের ক্ষেত্রেই মূল সমস্যা থাকে দুর্বল হজমশক্তি।<br>

                                            ASHTEET খাবার হজম ও পুষ্টি গ্রহণে সহায়তা করে, যা শরীরকে ধীরে ধীরে সুস্থ, সবল ও কর্মক্ষম হতে সাহায্য করে।<br><br>

                                            ✅ গ্যাস ও পেট ফাঁপা কমাতে সহায়ক<br>

                                            গ্যাস, ঢেকুর, পেট ফাঁপা ও অস্বস্তি অনেকের দৈনন্দিন সমস্যা।<br>

                                            Ashteet—<br>

                                            ✔️ অতিরিক্ত গ্যাস কমাতে সাহায্য করে<br>
                                            ✔️ পেটের ভারীভাব দূর করতে সহায়তা করে<br>
                                            ✔️ আরামদায়ক হজমে ভূমিকা রাখে<br><br>

                                            ✅ দুর্বল শরীরকে শক্তিশালী ও কর্মক্ষম রাখতে সহায়কঃ<br><br>

                                            যখন ক্ষুধা কমে যায় এবং হজম দুর্বল হয়ে পড়ে, তখন শরীর পর্যাপ্ত পুষ্টি পায় না।<br>

                                            ফলে দেখা দেয়—<br>

                                            ❌ দুর্বলতা<br>
                                            ❌ ক্লান্তি<br>
                                            ❌ কর্মক্ষমতা হ্রাস<br>
                                            ❌ ওজন কমে যাওয়া<br>

                                            Ashteet হজম ও ক্ষুধার উন্নতির মাধ্যমে শরীরের স্বাভাবিক শক্তি ও কর্মক্ষমতা ফিরিয়ে আনতে সহায়ক ভূমিকা পালন করে।<br><br>

                                            ✅ শরীরের স্বাভাবিক শক্তি ও কর্মক্ষমতা বৃদ্ধি করতে সহায়কঃ<br><br>

                                            যখন শরীর পর্যাপ্ত পুষ্টি পেতে শুরু করে, তখন—<br>

                                            🌟 কর্মক্ষমতা বাড়ে<br>
                                            🌟 দুর্বলতা কমে<br>
                                            🌟 প্রাণশক্তি বৃদ্ধি পায়<br>
                                            🌟 শরীর সতেজ ও সক্রিয় থাকে<br>
                                            🌟 দৈহিক সৌন্দর্য বৃদ্ধি পায়<br>
                                            🌟 মুখমণ্ডলের লাবণ্য ও উজ্জ্বলতা বৃদ্ধি পায়<br><br>

                                            🌱 স্থায়ী স্বাস্থ্য উন্নয়নে কেন Ashteet?<br>

                                            অনেকেই সাময়িকভাবে ক্ষুধা বাড়ানোর চেষ্টা করেন, কিন্তু প্রকৃত সমাধান হলো হজমশক্তির উন্নতি।<br>

                                            Ashteet-এর মূল দর্শন:<br>

                                            👉 "ভালো হজম = ভালো পুষ্টি = ভালো স্বাস্থ্য"<br>

                                            যখন—<br>

                                            ✔️ ক্ষুধা বাড়ে<br>
                                            ✔️ খাবার ভালোভাবে হজম হয়<br>
                                            ✔️ পুষ্টি ভালোভাবে শোষিত হয়<br>

                                            তখন শরীর স্বাভাবিকভাবেই শক্তিশালী, সুস্থ ও কর্মক্ষম হয়ে ওঠে।<br>

                                            এ কারণেই Ashteet শুধুমাত্র একটি Appetizer নয়; এটি একটি Health Restorative Formula।<br><br>

                                            👥 কারা Ashteet সেবন করে উপকৃত হতে পারেন?<br>

                                            ✅ যারা দীর্ঘমেয়াদে সুস্থ ও স্বাস্থ্যবান থাকতে চান<br>
                                            ✅ ক্ষুধামন্দায় ভুগছেন যারা<br>
                                            ✅ অরুচির কারণে পর্যাপ্ত খাবার খেতে পারেন না<br>
                                            ✅ গ্যাস ও বদহজমের সমস্যা রয়েছে<br>
                                            ✅ দুর্বল হজমশক্তির কারণে কষ্ট পান<br>
                                            ✅ শারীরিক দুর্বলতা ও ক্লান্তি অনুভব করেন<br>
                                            ✅ রোগভোগের পর দুর্বল হয়ে পড়েছেন<br>
                                            ✅ কম খাওয়ার কারণে ওজন ও শক্তি কমে যাচ্ছে<br>
                                            ✅ দিনদিন রোগা হয়ে যাচ্ছে<br>
                                            ✅ চেহারার সৌন্দর্য নষ্ট হয়ে যাচ্ছে<br>
                                            ✅ খাবার খায় কিন্তু শরীরে কাজে লাগে না।<br>
                                            ✅ যাদের খাওয়ার রুচি কম<br><br>

                                            🌿 বিশেষ উপাদানের শক্তিশালী সমন্বয়<br>

                                            প্রডাক্টটিতে রয়েছে—<br>

                                            ✔️ হিং (Ferula foetida)<br>
                                            ✔️ আদা (Zingiber officinale)<br>
                                            ✔️ সোডিয়াম বোরেট<br>
                                            ✔️ সোডিয়াম ক্লোরাইড<br>

                                            এই উপাদানগুলো ঐতিহ্যগতভাবে হজমশক্তি বৃদ্ধি, গ্যাস নিরসন, ক্ষুধা বৃদ্ধি এবং পাকস্থলীর স্বাভাবিক কার্যক্রমে সহায়ক হিসেবে ব্যবহৃত হয়ে আসছে।<br><br>

                                            ⭐ কেন Ashteet বেছে নেবেন?<br>

                                            ✔️ ক্ষুধা বৃদ্ধি করতে সহায়ক<br>
                                            ✔️ হজমশক্তি উন্নত করতে সহায়ক<br>
                                            ✔️ গ্যাস ও পেট ফাঁপা কমাতে সাহায্য করে<br>
                                            ✔️ খাবারের পুষ্টি গ্রহণে সহায়তা করে<br>
                                            ✔️ দুর্বলতা কমিয়ে কর্মক্ষমতা বৃদ্ধিতে ভূমিকা রাখে<br>
                                            ✔️ দীর্ঘমেয়াদে স্বাস্থ্য উন্নয়নের সহায়ক<br>
                                            ✔️ ইউনানী ফর্মুলার বিশ্বস্ত সমন্বয়<br><br>

                                            🌟 Ashteet (Haleet)<br>

                                            "ক্ষুধা বাড়ায়, হজমশক্তি উন্নত করে, সুস্থ জীবনের ভিত্তি গড়ে তোলে"<br><br>

                                            আপনার শরীরকে সুস্থ, সবল ও প্রাণবন্ত রাখতে শুধু বেশি খাবার নয়, প্রয়োজন সঠিক হজম ও পুষ্টি গ্রহণ।<br>

                                            Ashteet সেই লক্ষ্যেই তৈরি একটি বিশেষ ইউনানী ফর্মুলা, যা ক্ষুধা বৃদ্ধি, হজমশক্তির উন্নতি, গ্যাস নিরসন এবং দীর্ঘমেয়াদে স্বাস্থ্য ও কর্মক্ষমতা বৃদ্ধিতে সহায়ক।<br><br>

                                            🌿 ভালো হজমের মাধ্যমে গড়ে তুলুন স্থায়ী সুস্বাস্থ্য।<br>
                                            🌿 Ashteet — স্বাস্থ্য পুনর্গঠনের প্রাকৃতিক সহযাত্রী।<br><br>

                                            ⭐ ASHTEET<br>

                                            "ভালো হজম, ভালো পুষ্টি, ভালো স্বাস্থ্য"<br><br>

                                            যারা হালকা, পাতলা, দুর্বল শরীর থেকে বেরিয়ে এসে একটি সুস্থ, সবল ও কর্মক্ষম জীবন গড়তে চান, তাদের জন্য ASHTEET হতে পারে একটি কার্যকর সহায়ক।<br><br>

                                            🌿 ক্ষুধা বাড়ায়<br>
                                            🌿 হজমশক্তি উন্নত করে<br>
                                            🌿 পুষ্টি গ্রহণে সহায়তা করে<br>
                                            🌿 দুর্বল শরীরকে স্বাস্থ্যবান হতে সহায়তা করে<br>
                                            🌿 দীর্ঘমেয়াদে সুস্থ ও কর্মক্ষম জীবন গঠনে ভূমিকা রাখে<br><br>

                                            ASHTEET (HALEET) — সুস্থ হজমের মাধ্যমে স্থায়ী সুস্বাস্থ্যের পথে।<br><br>

                                            সেবনবিধি: প্রাপ্তবয়স্কদের জন্য ১-২টি ট্যাবলেট দৈনিক ১-৩ বার অথবা নিবন্ধিত চিকিৎসকের পরামর্শ অনুযায়ী।
                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'asushaba') { ?>
                                        <img src="images/custom/product/banner/asushaba.jpg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            <strong>🌟 রোগমুক্ত সুস্থ ত্বকের প্রাকৃতিক সমাধান: ASH-USHBA 🌟</strong><br><br>

                                            আপনি কি দীর্ঘদিনের ত্বকের সমস্যায় ভুগছেন?<br>

                                            অ্যালার্জি, অনবরত চুলকানি, কিংবা যন্ত্রণাদায়ক খোসপাঁচড়া—এই সমস্যাগুলো শুধু আমাদের ত্বকেরই ক্ষতি করে না, বরং আমাদের দৈনন্দিন শান্তি ও আত্মবিশ্বাসও কেড়ে নেয়। বাজারে অনেক সাময়িক সমাধান থাকলেও, ভেতর থেকে রোগ নির্মূল করার প্রাকৃতিক ও স্থায়ী সমাধান পাওয়া কঠিন।<br>

                                            আপনার এই কষ্টের অবসান ঘটাতে আশরাফুল ল্যাবরেটরিজ নিয়ে এসেছে বিক্রান্সের জন্য বিশেষভাবে প্রস্তুতকৃত সম্পূর্ণ ইউনানী ফর্মুলার নির্ভরযোগ্য ট্যাবলেট ASH-USHBA (আশ-উশবা)। বাংলাদেশ জাতীয় ইউনানী ফর্মুলারী (কুরছ উশবা) অনুসরণ করে তৈরি এই ওষুধটি আপনার রক্তকে বিশুদ্ধ করে ত্বকের রোগগুলোকে গোড়া থেকে দূর করতে সাহায্য করে।<br><br>

                                            কেন আপনি ASH-USHBA সেবন করবেন?<br>
                                            (প্রধান কার্যকারিতা)<br><br>

                                            এই প্রডাক্টটি মূলত একটি শক্তিশালী রক্তশোধক (Blood purifier) হিসেবে কাজ করে। আপনার ত্বকের নানাবিধ সমস্যায় এর কার্যকারিতা নিচে দেওয়া হলো:<br><br>

                                            ✅ অ্যালার্জি ও চুলকানি থেকে স্থায়ী মুক্তি:<br>

                                            এটি শরীরের ভেতরের রক্তদূষণ দূর করে, যা অ্যালার্জি এবং তীব্র চুলকানির (Pruritis) প্রধান কারণ। এটি সেবনে ত্বক ভেতর থেকে শান্ত হয় এবং চুলকানি দ্রুত কমে আসে।<br><br>

                                            ✅ খোসপাঁচড়া ও একজিমা নির্মূল:<br>

                                            খোসপাঁচড়া (Scabies) এবং একজিমার (Eczema) মতো জেদি ও ছোঁয়াচে ত্বকের রোগ দূর করতে এই ট্যাবলেটটি অত্যন্ত কার্যকরী। এটি ত্বকের ইনফেকশন শুকাতে এবং নতুন সুস্থ ত্বক গঠনে সাহায্য করে।<br><br>

                                            ✅ রক্তদুষ্টি দূরীকরণ:<br>

                                            রক্তে জমে থাকা ক্ষতিকর উপাদান বা টক্সিন পরিষ্কার করে এটি আপনার ত্বককে সুস্থ ও সতেজ রাখে।<br><br>

                                            ✅ বাতের ব্যথা ও জয়েন্টের যন্ত্রণায় আরাম:<br>

                                            শুধু ত্বকই নয়, এটি গেঁটে বাত (Gout) এবং আর্থ্রাইটিস বা সন্ধি-বেদনার যন্ত্রণাদায়ক উপশমেও দারুণ কাজ করে।<br><br>

                                            ♻️ কাদের জন্য এই প্রডাক্টটি কার্যকরী?<br><br>

                                            যদি আপনি বা আপনার পরিবারের কেউ নিচের সমস্যাগুলোতে ভুগে থাকেন, তবে ASH-USHBA তাদের জন্য একটি আদর্শ সমাধান:<br><br>

                                            ➡️ যাঁরা দীর্ঘদিনের অ্যালার্জি বা হঠাৎ হওয়া তীব্র চুলকানির সমস্যায় অতিষ্ঠ।<br><br>

                                            ➡️ যাঁরা খোসপাঁচড়া বা একজিমার কারণে ত্বকের ঘা ও যন্ত্রণায় ভুগছেন।<br><br>

                                            ➡️ যাঁদের রক্তদূষণের কারণে প্রায়শই ত্বকে নানাবিধ সমস্যা দেখা দেয়।<br><br>

                                            ➡️ যাঁরা গেঁটে বাত, জয়েন্টের ব্যথা বা আমবাতের (Rheumatism) সমস্যায় ভুগছেন।<br><br>

                                            ♂️♂️ কেন এই প্রডাক্টটি অনন্য ও সম্পূর্ণ নিরাপদ?<br><br>

                                            ✅ ১০০% প্রাকৃতিক উপাদান:<br>

                                            এতে রয়েছে সানা (Cassia angustifolia), চন্দন (Santalum album), গোলাপ ফুল (Rosa damascenes), দারুচিনি (Cinnamomum zeylanicum) সহ আরও ১৫টিরও বেশি মূল্যবান প্রাকৃতিক ভেষজ উপাদান।<br><br>

                                            ✅ অনুমোদিত ও নির্ভরযোগ্য:<br>

                                            এটি বাংলাদেশ জাতীয় ইউনানী ফর্মুলারী (Qurs Ushba) অনুযায়ী তৈরি এবং ড্রাগ অ্যাডমিনিস্ট্রেশন (D.A Reg. No. U-110-A-054) দ্বারা অনুমোদিত।<br><br>

                                            ✅ নির্ধারিত মাত্রায় কোনো কৃত্রিম পার্শ্বপ্রতিক্রিয়া নেই:<br>

                                            সম্পূর্ণ ভেষজ উপাদানে তৈরি হওয়ায় এটি শরীরের অন্যান্য অঙ্গের ক্ষতি না করে অত্যন্ত নিরাপদভাবে রোগ নিরাময় করে।<br><br>

                                            ♻️ কারা অবশ্যই বিবেচনা করবেন?<br><br>

                                            আপনি যদি—<br>

                                            🔹 বারবার এলার্জিতে আক্রান্ত হন<br>
                                            🔹 দীর্ঘদিন ধরে চুলকানিতে ভোগেন<br>
                                            🔹 খোসপাঁচড়ার সমস্যায় কষ্ট পান<br>
                                            🔹 একজিমার কারণে অস্বস্তিতে থাকেন<br>
                                            🔹 ত্বককে ভেতর থেকে সুস্থ রাখতে চান<br><br>

                                            তাহলে ASH-USHBA আপনার জন্য একটি উপযুক্ত প্রাকৃতিক সাপোর্ট হতে পারে।<br><br>

                                            🌿 রোগীরা কেন বারবার ASH-USHBA বেছে নিচ্ছেন❓<br><br>

                                            কারণ তারা খুঁজছেন—<br><br>

                                            ✅ স্বস্তি<br>
                                            ✅ আরাম<br>
                                            ✅ আত্মবিশ্বাস<br>
                                            ✅ সুস্থ ত্বক<br>
                                            ✅ ভেষজ সমাধান<br><br>

                                            🍽️🥃 সেবন বিধি (Dosage)<br><br>

                                            প্রাপ্তবয়স্কদের জন্য ১ থেকে ২ টি ট্যাবলেট প্রতিদিন ১-৩ বার (রোগের তীব্রতা অনুযায়ী)।<br>

                                            অথবা রেজিস্টার্ড চিকিৎসকের পরামর্শ অনুযায়ী সেব্য।<br><br>

                                            পরিশেষে,<br><br>

                                            ➡️ যদি এলার্জি, খোসপাঁচড়া ও চুলকানি আপনার জীবনের স্বাভাবিকতা কেড়ে নেয়...<br>

                                            ➡️ যদি আপনি শুধু সাময়িক আরাম নয়, বরং ত্বকের সার্বিক সুস্থতা চান...<br>

                                            ➡️ যদি আপনি হারবাল ও ইউনানি ঐতিহ্যের শক্তির উপর আস্থা রাখেন...<br><br>

                                            তাহলে আজই বেছে নিন—<br><br>

                                            🌿 ASH-USHBA 🌿<br><br>

                                            "চুলকানি নয়, স্বস্তির অনুভূতি।"<br><br>

                                            "এলার্জির অস্বস্তি থেকে আত্মবিশ্বাসী জীবনের পথে।"<br><br>

                                            "ত্বকের যত্নে প্রকৃতির শক্তি, ASH-USHBA।"<br><br>

                                            আপনার সুস্থ ত্বক, আপনার আত্মবিশ্বাস, আপনার স্বস্তি—ASH-USHBA-এর সাথে।

                                        </div><br>
                                    <?php } ?>

                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'brocil') { ?>
                                        <img src="images/custom/product/banner/brocil.jpg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            <strong>BROCIL (MADAR)</strong>-<br><br>

                                            এ্যাজমা, হাপানি ও শ্বাসকষ্টে প্রাকৃতিক সহায়ক সমাধান<br>

                                            “প্রতিটি শ্বাস হোক স্বস্তির, প্রতিটি দিন হোক প্রাণবন্ত।”<br><br>

                                            BROCIL MADAR একটি ইউনানি ফর্মুলেশন, যা বিশেষভাবে এ্যাজমা (Asthma), হাপানি, শ্বাসকষ্ট, বুকে চাপ অনুভব করা এবং শ্বাসনালীর দুর্বলতা দূর করতে সহায়ক হিসেবে তৈরি করা হয়েছে। প্রাচীন ইউনানি জ্ঞানের সঙ্গে আধুনিক উৎপাদন প্রক্রিয়ার সমন্বয়ে তৈরি এই ফর্মুলাটি শ্বাসতন্ত্রকে স্বাভাবিক রাখতে গুরুত্বপূর্ণ ভূমিকা পালন করে।<br><br>

                                            কেন BROCIL (MADAR)<br><br>

                                            বর্তমান সময়ে ধুলাবালি, ধোঁয়া, অ্যালার্জি, আবহাওয়ার পরিবর্তন ও দূষণের কারণে অনেকেই দীর্ঘদিন ধরে শ্বাসকষ্ট, হাপানি ও এ্যাজমার সমস্যায় ভুগছেন। এসব সমস্যার কারণে—<br>

                                            ✔️ সামান্য হাঁটলেই হাঁপিয়ে যাওয়া<br>
                                            ✔️ রাতে ঘুমের মধ্যে শ্বাসকষ্ট হওয়া<br>
                                            ✔️ বুকে চাপ অনুভব করা<br>
                                            ✔️ সাঁই সাঁই শব্দ করে শ্বাস নেওয়া<br>
                                            ✔️ মৌসুমি পরিবর্তনে কষ্ট বেড়ে যাওয়া<br>
                                            ✔️ কাশি ও কফ জমে থাকা<br><br>

                                            এসব কারণে দৈনন্দিন জীবন দুর্বিষহ হয়ে ওঠে।<br><br>

                                            BROCIL (MADAR) শ্বাসতন্ত্রকে শক্তিশালী করে এবং স্বাভাবিক শ্বাস-প্রশ্বাসে সহায়তা করতে কাজ করে।<br><br>

                                            উপাদানসমূহঃ<br><br>

                                            প্রতি ৫০০ মি.গ্রা ট্যাবলেটে রয়েছে—<br><br>

                                            ১. Aconitum Heterophyllum (১৮৮.৬৪ মি.গ্রা)<br>

                                            এই ভেষজটি ইউনানি চিকিৎসায় দীর্ঘদিন ধরে ব্যবহৃত হয়ে আসছে।<br>

                                            সম্ভাব্য উপকারিতা:<br>

                                            শ্বাসনালীর প্রদাহ কমাতে সহায়ক<br>
                                            কাশি ও শ্বাসকষ্টে আরাম দিতে সাহায্য করে<br>
                                            শ্বাসতন্ত্রের স্বাভাবিক কার্যক্রম বজায় রাখতে ভূমিকা রাখে<br><br>

                                            ২. Calotropis Gigantea (৩৩৩.৩৬ মি.গ্রা)<br>

                                            শ্বাসতন্ত্রের জন্য বহুল ব্যবহৃত একটি গুরুত্বপূর্ণ ভেষজ।<br>

                                            সম্ভাব্য উপকারিতা:<br>

                                            শ্বাসনালী পরিষ্কার রাখতে সহায়তা করে<br>
                                            জমে থাকা কফ বের হতে সাহায্য করে<br>
                                            হাপানি ও বুকে ভারীভাব কমাতে ভূমিকা রাখতে পারে<br>
                                            ফুসফুসের কার্যকারিতা উন্নত করতে সহায়ক<br><br>

                                            ৩. Curcuma Amada (আম আদা)<br>

                                            প্রাকৃতিক অ্যান্টিঅক্সিডেন্ট ও প্রদাহনাশক বৈশিষ্ট্যসম্পন্ন।<br>

                                            সম্ভাব্য উপকারিতা:<br>

                                            শ্বাসনালীর জ্বালাপোড়া কমাতে সহায়ক<br>
                                            রোগ প্রতিরোধ ক্ষমতা শক্তিশালী করতে সাহায্য করে<br>
                                            মৌসুমি সর্দি-কাশির ঝুঁকি কমাতে ভূমিকা রাখে।<br><br>

                                            BROCIL (MADAR) কিভাবে কাজ করে?<br><br>

                                            ✓ 🌟 শ্বাসনালীকে স্বাভাবিক রাখতে সহায়তা করে<br>

                                            এটি শ্বাসনালীর অস্বস্তি ও সংকোচন কমাতে সহায়ক ভূমিকা রাখতে পারে, ফলে শ্বাস গ্রহণ সহজ অনুভূত হতে পারে।<br><br>

                                            ✓ 🌟 কফ জমাট কমাতে সাহায্য করে<br>

                                            বুকে জমে থাকা কফ শ্বাসপ্রশ্বাসকে কঠিন করে তোলে। BROCIL MADAR কফ নির্গমনে সহায়ক ভূমিকা রাখতে পারে।<br><br>

                                            ✓ 🌟 হাঁপানি ও শ্বাসকষ্টের পুনরাবৃত্তি কমাতে সহায়ক<br>

                                            নিয়মিত ব্যবহারে শ্বাসতন্ত্রকে শক্তিশালী রাখতে সাহায্য করতে পারে, যা মৌসুমি সমস্যার সময় অতিরিক্ত সহায়ক হতে পারে।<br><br>

                                            ✓ 🌟 ফুসফুসের কার্যকারিতা উন্নত করতে সহায়তা করে<br>

                                            ফুসফুসে পর্যাপ্ত বাতাস চলাচলে সহায়ক পরিবেশ তৈরি করতে সাহায্য করে।<br><br>

                                            ✓ 🌟 কাশি ও বুকের অস্বস্তি কমাতে সহায়ক<br>

                                            দীর্ঘদিনের কাশি, বুক ভারী লাগা ও শ্বাস নিতে কষ্ট হওয়ার মতো সমস্যায় আরাম দিতে সাহায্য করতে পারে।<br><br>

                                            কারা BROCIL MADAR সেবন করতে পারেন?<br><br>

                                            ✅ এ্যাজমা রোগী<br>
                                            ✅ হাপানি রোগী<br>
                                            ✅ দীর্ঘদিনের শ্বাসকষ্টে ভুগছেন যারা<br>
                                            ✅ অ্যালার্জিজনিত শ্বাসকষ্ট আছে যাদের<br>
                                            ✅ ধুলাবালি বা আবহাওয়া পরিবর্তনে শ্বাসকষ্ট বেড়ে যায় যাদের<br>
                                            ✅ বারবার কাশি ও কফ জমার সমস্যায় ভোগেন যারা<br>
                                            ✅ দুর্বল ফুসফুসের কার্যকারিতা উন্নত করতে চান যারা<br><br>

                                            রোগীরা কেন BROCIL MADAR বেছে নেবেন?<br><br>

                                            ✔️ প্রাকৃতিক ইউনানি ফর্মুলেশন<br>

                                            ভেষজ উপাদানের সমন্বয়ে প্রস্তুত।<br><br>

                                            ✔️ শ্বাসতন্ত্রের বহুমুখী সাপোর্ট<br>

                                            শুধু শ্বাসকষ্ট নয়, কাশি, কফ ও ফুসফুসের দুর্বলতার দিকেও কাজ করে।<br><br>

                                            ✔️ দীর্ঘমেয়াদী ব্যবস্থাপনায় সহায়ক<br>

                                            শ্বাসতন্ত্রকে শক্তিশালী রাখতে সহায়তা করতে পারে।<br><br>

                                            ✔️ সহজ সেবনযোগ্য<br>

                                            ট্যাবলেট আকারে হওয়ায় সহজে বহন ও সেবন করা যায়।<br><br>

                                            ✔️ বিশ্বস্ত উৎপাদনঃ<br>

                                            Ashraful Laboratories কর্তৃক উৎপাদিত এবং Bikrans-এর জন্য বিশেষভাবে প্রস্তুতকৃত।<br><br>

                                            ব্যবহারবিধিঃ<br>

                                            প্রতিদিন ১–২ টি ট্যাবলেট খাবারের পরে অথবা নিবন্ধিত চিকিৎসকের পরামর্শ অনুযায়ী সেবন করতে হবে।<br><br>

                                            শ্বাস নিতে কষ্ট হয়? সামান্য পরিশ্রমেই হাঁপিয়ে যান? রাতের ঘুম নষ্ট করে দেয় এ্যাজমা ও হাপানি?<br>

                                            তাহলে আপনার শ্বাসতন্ত্রের যত্নে হতে পারে BROCIL (MADAR)।<br>

                                            🌿 প্রাকৃতিক ভেষজ শক্তি<br>
                                            🌿 শ্বাসকষ্টে সহায়ক<br>
                                            🌿 হাপানি ও এ্যাজমায় উপকারী সহায়ক ফর্মুলেশন<br>
                                            🌿 কাশি ও কফ নিয়ন্ত্রণে সহায়ক<br>
                                            🌿 ফুসফুসের সুস্থতায় সহায়ক<br><br>

                                            BROCIL (MADAR) — স্বস্তির শ্বাস, সুস্থ জীবনের প্রত্যাশা।

                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'sretsukra') { ?>
                                        <img src="images/custom/product/banner/sretsukra.jpg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            🌸 নিজেকে ভালোবাসুন, নিজেকে গড়ুন শ্বেতশুক্রা’র সাথে 🌸<br>

                                            নারীর সুস্থতা, সৌন্দর্য ও আত্মবিশ্বাসের প্রাকৃতিক সমাধান — *শ্বেতশুক্রা 💖<br><br>

                                            লিকুরিয়া (সাদাস্রাব), দুর্বলতা, মুখে অরুচি, শরীরের ফিটনেস ও সৌন্দর্য নিয়ে চিন্তিত? এখনই বেছে নিন প্রাকৃতিক উপাদানে সমৃদ্ধ শ্বেতশুক্রা ✨<br><br>

                                            "সুরক্ষা, স্বস্তি, আত্মবিশ্বাস"<br><br>

                                            🌿 এতে রয়েছে:<br>

                                            ✔️ অশোকছাল<br>
                                            ✔️ মহুরি<br>
                                            ✔️ মেথি<br>
                                            ✔️ অশ্বগন্ধা<br>
                                            ✔️ আমলকি<br>
                                            ✔️ শাপলা<br>
                                            ✔️ ধনিয়া<br>
                                            ✔️ সয়া প্রোটিন<br>

                                            সহ আরও কার্যকরী প্রাকৃতিক উপাদান।<br><br>

                                            💎 শ্বেতশুক্রা নিয়মিত সেবনে সহায়ক:<br>

                                            ✅ লিকুরিয়া ও সাদাস্রাব সমস্যা কমাতে<br>
                                            ✅ অনিয়মিত ঋতুস্রাব ও পেটব্যাথা সমাধান হবে<br>
                                            ✅ অতিরিক্ত রক্তক্ষরণ ও কালো কালো ছোপযুক্ত ক্ষরণ সমস্যার সমাধান হবে।<br>
                                            ✅ চুলকানি ও জ্বালাপোড়া দূর করবে।<br>
                                            ✅ গর্ভধারণে সহায়তা করে<br>
                                            ✅ মুখে রুচি বৃদ্ধি করতে<br>
                                            ✅ চেহারায় লাবণ্য ফিরিয়ে আনবে।<br>
                                            ✅ শরীরের ফিটনেস সুন্দর রাখতে<br>
                                            ✅ চুল পড়া রোধে সহায়তা করতে<br>
                                            ✅ ব্রণের সমস্যার সমাধান করবে।<br>
                                            ✅ চুল পড়া রোধে সহায়তা করে<br>
                                            ✅ নখ মজবুত রাখতে<br>
                                            ✅ ত্বক উজ্জ্বল ও প্রাণবন্ত করতে<br>
                                            ✅ নারীদের সৌন্দর্য ও আত্মবিশ্বাস বাড়াতে<br><br>

                                            🌸 সুস্থ নারী, সুন্দর জীবন 🌸<br><br>

                                            📞 অর্ডার করতে-<br>

                                            ভিজিট করুনঃ (http://www.bikrans.com)<br><br>

                                            🏢 BIKRANS<br>

                                            ✨ The truth will be Revealed

                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'hemorid') { ?>
                                        <img src="images/custom/product/banner/hemorid.jpg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            <strong>🔴 HEMORID (HABB-E-MUQIL)</strong><br>

                                            অর্শ (পাইলস), কোষ্ঠকাঠিন্য ও মলত্যাগজনিত কষ্টে স্বস্তির একটি শক্তিশালী ইউনানী ফর্মুলা<br>

                                            ❝পাইলস শুধু একটি রোগ নয়, এটি প্রতিদিনের অস্বস্তি, ব্যথা ও মানসিক যন্ত্রণার আরেক নাম।❞<br><br>

                                            মলত্যাগের সময় ব্যথা, জ্বালাপোড়া, রক্তপাত, কোষ্ঠকাঠিন্য, গ্যাস ও পেট ফাঁপার সমস্যায় ভুগতে ভুগতে অনেকেই স্বাভাবিক জীবনযাপন করতে পারেন না। এই ধরনের সমস্যার জন্যই ইউনানী চিকিৎসা বিজ্ঞানের ঐতিহ্যবাহী ও পরীক্ষিত ফর্মুলা থেকে তৈরি হয়েছে HEMORID (HABB-E-MUQIL)।<br><br>

                                            🎯 HEMORID-এর প্রধান কার্যকারিতা<br><br>

                                            ✅ মুকিল মুছাফফা, রসৌত মুছাফফা, আবে বর্গে নীম ও আবে বর্গে তুরব এবং বিভিন্ন ভেষজ উপাদান সমন্বয়ে গঠিত ট্যাবলেট হেমোরিড কোষ্ঠকাঠিন্য, মলত্যাগের সময় ব্যথা, রেক্টাম থেকে রক্ত যাওয়া বন্ধ করে, মলদ্বারে ফাটল ও চুলকানী প্রতিকারে অত্যন্ত কার্যকর।<br><br>

                                            ✅ পাইলসের ব্যথা ও অস্বস্তি কমাতে সহায়ক<br>

                                            পাইলসের কারণে মলত্যাগের সময় যে তীব্র ব্যথা, জ্বালাপোড়া ও অস্বস্তি সৃষ্টি হয়, HEMORID-এর হারবাল উপাদানসমূহ তা প্রশমিত করতে সহায়তা করে।<br>

                                            👉 ফলে রোগী ধীরে ধীরে স্বস্তি অনুভব করতে পারেন।<br><br>

                                            ✅ রক্তস্রাবযুক্ত অর্শে সহায়ক<br>

                                            অনেক রোগীর ক্ষেত্রে পাইলসের কারণে মলত্যাগের সময় রক্তপাত দেখা যায়।<br>

                                            HEMORID-এর উপাদানসমূহ আক্রান্ত অংশের স্বাভাবিক অবস্থার উন্নতিতে সহায়তা করে এবং অর্শজনিত সমস্যার তীব্রতা কমাতে ভূমিকা রাখতে পারে।<br><br>

                                            ✅ কোষ্ঠকাঠিন্যের মূল সমস্যাকে টার্গেট করে<br>

                                            পাইলসের অন্যতম প্রধান কারণ হলো দীর্ঘদিনের কোষ্ঠকাঠিন্য।<br>

                                            যখন মল শক্ত হয়ে যায়, তখন মলত্যাগের সময় অতিরিক্ত চাপ সৃষ্টি হয় এবং অর্শের সমস্যা আরও বেড়ে যায়।<br>

                                            HEMORID—<br>

                                            ✔️ মলত্যাগ সহজ করতে সহায়তা করে<br>
                                            ✔️ অতিরিক্ত চাপ কমাতে সাহায্য করে<br>
                                            ✔️ পুনঃপুন কোষ্ঠকাঠিন্যের প্রবণতা হ্রাসে সহায়ক ভূমিকা পালন করে<br><br>

                                            ✅ পেট ফাঁপা ও গ্যাসের সমস্যা কমাতে সহায়ক<br>

                                            অনেক পাইলস রোগীরই গ্যাস, বদহজম ও পেট ফাঁপার সমস্যা থাকে।<br>

                                            HEMORID—<br>

                                            ✔️ অতিরিক্ত গ্যাস কমাতে সহায়তা করে<br>
                                            ✔️ পেটের অস্বস্তি দূর করতে সাহায্য করে<br>
                                            ✔️ হজম প্রক্রিয়াকে স্বাভাবিক রাখতে ভূমিকা রাখে<br><br>

                                            ✅ প্রদাহ ও ফোলা কমাতে সহায়ক<br>

                                            পাইলসের কারণে আক্রান্ত স্থানে প্রদাহ, ফোলা ও জ্বালাপোড়া তৈরি হতে পারে।<br>

                                            HEMORID-এর উপাদানসমূহ প্রদাহ প্রশমনে সহায়ক ভূমিকা পালন করে, যা রোগীর আরাম বৃদ্ধি করতে সাহায্য করে।<br><br>

                                            🌿 কেন HEMORID অন্যদের থেকে আলাদা?<br><br>

                                            🔹 দ্বৈত কার্যকারিতা<br>

                                            শুধু পাইলস নয়, এর মূল কারণগুলোর দিকেও কাজ করতে সহায়তা করে—<br>

                                            ✔️ কোষ্ঠকাঠিন্য<br>
                                            ✔️ গ্যাস<br>
                                            ✔️ পেট ফাঁপা<br>
                                            ✔️ হজমের সমস্যা<br><br>

                                            🔹 ঐতিহ্যবাহী ইউনানী ফর্মুলা<br>

                                            বাংলাদেশ জাতীয় ইউনানী ফর্মুলারির সুপরিচিত "হাব্বে মুকিল" ফর্মুলার ভিত্তিতে প্রস্তুত।<br><br>

                                            🔹 হারবাল উপাদানের সমন্বয়<br>

                                            মুকিল, রসৌত, নিম ও অন্যান্য প্রাকৃতিক উপাদানের সমন্বয়ে তৈরি।<br><br>

                                            👥 কারা HEMORID সেবন করে উপকৃত হতে পারেন?<br><br>

                                            ✅ পাইলসের রোগী<br>
                                            ✅ মলত্যাগে কষ্ট হয় যাদের<br>
                                            ✅ দীর্ঘদিন কোষ্ঠকাঠিন্যে ভুগছেন<br>
                                            ✅ গ্যাস ও পেট ফাঁপার সমস্যায় ভোগেন<br>
                                            ✅ অর্শের কারণে ব্যথা ও অস্বস্তিতে ভুগছেন<br>
                                            ✅ নাকের পলি পাসে যার ভুগছেন<br><br>

                                            ⭐ রোগীরা কেন HEMORID পছন্দ করছেন?<br><br>

                                            ✔️ মলত্যাগকে সহজ করতে সহায়ক<br>
                                            ✔️ পাইলসের অস্বস্তি কমাতে সহায়ক<br>
                                            ✔️ কোষ্ঠকাঠিন্যের প্রবণতা কমাতে সাহায্য করে<br>
                                            ✔️ গ্যাস ও পেট ফাঁপা কমাতে সহায়ক<br>
                                            ✔️ হজমের স্বাভাবিক কার্যক্রমে সহায়তা করে<br>
                                            ✔️ হারবাল ও ইউনানী ফর্মুলা<br><br>

                                            🔴 HEMORID<br>

                                            "স্বস্তির মলত্যাগ, আরামদায়ক জীবন"<br><br>

                                            পাইলসের যন্ত্রণা, কোষ্ঠকাঠিন্য ও হজমজনিত অস্বস্তি যদি আপনার প্রতিদিনের জীবনের অংশ হয়ে যায়, তাহলে সমস্যাকে অবহেলা না করে সময়মতো সঠিক যত্ন নিন।<br><br>

                                            HEMORID (HABB-E-MUQIL) — পাইলস, কোষ্ঠকাঠিন্য, গ্যাস ও হজমজনিত সমস্যায় একটি বিশ্বস্ত ইউনানী সহায়ক সমাধান।<br><br>

                                            🌿 স্বস্তির অনুভূতি ফিরে পান, আত্মবিশ্বাসের সাথে জীবন উপভোগ করুন।

                                        </div>
                                    <?php } ?>
                                    
                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'sugarbalnace') { ?>
                                        <img src="images/custom/product/banner/sugarbalens.jpg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            🌿✨ “সুগার ব্যালেন্স প্লাস — প্রকৃতির শক্তিতে ডায়াবেটিসের স্থায়ী সমাধান”<br><br>

                                            আজকের পৃথিবীতে ডায়াবেটিস এমন এক নীরব ঘাতক,<br>
                                            যা কাউকে একদিনে মারে না, কিন্তু ধীরে ধীরে শরীরের প্রতিটি কোষকে দুর্বল করে দেয়।<br><br>

                                            আপনি হয়তো ভাবছেন— “আমি তো নিয়মিত ওষুধ খাই, তাহলে চিন্তা কী?”<br>
                                            কিন্তু বাস্তবতা হলো—<br>
                                            রাসায়নিক ওষুধ কেবল সাময়িকভাবে রক্তে সুগার কমায়,<br>
                                            মূল সমস্যা — প্যানক্রিয়াসের ইনসুলিন উৎপাদন ক্ষমতা — ঠিক করে না।<br><br>

                                            ফলে বছর ঘুরতে না ঘুরতেই শুরু হয়—<br>
                                            চোখের দৃষ্টি ঝাপসা হওয়া, হাত-পায়ে জ্বালা করা, ক্লান্তি, ঘা না শুকানো,<br>
                                            এমনকি কিডনি ও হার্ট পর্যন্ত আক্রান্ত হয়।<br><br>

                                            এটাই হলো ডায়াবেটিসের ভয়াবহ চক্র —<br>
                                            যেখান থেকে বেরিয়ে আসতে হলে শরীরকে ভিতর থেকে সুস্থ করতে হয়।<br><br>

                                            🌱 এই জায়গাতেই কাজ করে — সুগার ব্যালেন্স প্লাস<br><br>

                                            এটি কোনো কেমিক্যাল নয়,<br>
                                            এটি সম্পূর্ণ অর্গানিক, প্রাকৃতিক ফর্মুলা,<br>
                                            যা মূল টার্গেট করে শরীরের ভিতরের প্যানক্রিয়াসকে।<br><br>

                                            🧬 কাজের ধাপগুলো বৈজ্ঞানিকভাবে প্রমাণিত ও বাস্তবে ফলপ্রসূঃ<br><br>

                                            1️⃣ প্যানক্রিয়াস পুনর্গঠন ও সক্রিয়করণ:<br>
                                            👉 প্যানক্রিয়াসের বিটা কোষগুলোকে পুনরায় সচল করে প্রাকৃতিকভাবে ইনসুলিন উৎপাদন বাড়ায়।<br><br>

                                            2️⃣ ইনসুলিন রেজিস্ট্যান্স হ্রাস:<br>
                                            👉 শরীরের কোষগুলোকে ইনসুলিনে সংবেদনশীল করে, যাতে সুগার সহজে কোষে প্রবেশ করে শক্তিতে রূপান্তরিত হয়।<br><br>

                                            3️⃣ লিভার ও কিডনি প্রটেকশন:<br>
                                            👉 ডায়াবেটিসে ক্ষতিগ্রস্ত অঙ্গগুলোকে টক্সিনমুক্ত করে পুনরুজ্জীবিত করে।<br><br>

                                            4️⃣ নার্ভ ও ব্লাড সার্কুলেশন উন্নতি:<br>
                                            👉 হাত-পা জ্বালা, অসাড়তা ও দুর্বলতা কমায়, রক্ত চলাচল স্বাভাবিক রাখে।<br><br>

                                            5️⃣ হরমোন ব্যালেন্স ও এনার্জি বুস্টার:<br>
                                            👉 সারাদিনের ক্লান্তি ও মানসিক চাপ কমিয়ে শরীরে নতুন প্রাণশক্তি এনে দেয়।<br><br>

                                            🌿 প্রকৃতির আশ্চর্য উপাদানসমূহঃ<br><br>

                                            করলা এক্সট্র্যাক্ট (Bitter Melon): প্রাকৃতিক ইনসুলিনের বিকল্প হিসেবে কাজ করে।<br><br>

                                            জিমনেমা সিলভেস্ট্রে: মিষ্টি খাবারের আকর্ষণ কমায়, রক্তে শর্করা শোষণ রোধ করে।<br><br>

                                            ফেনুগ্রিক (মেথি): ইনসুলিন সেনসিটিভিটি বৃদ্ধি করে।<br><br>

                                            চিরতা: রক্ত পরিশোধন ও ইনসুলিন কার্যকারিতা উন্নতি<br><br>

                                            জামবীজ: রক্তে শর্করার শোষণ রোধ<br><br>

                                            আমলকি: লিভার ও স্নায়ু সুরক্ষা, অ্যান্টিঅক্সিডেন্ট<br><br>

                                            কালোজিরা: ইনসুলিন রেজিস্ট্যান্স হ্রাস<br><br>

                                            সমরাজ: প্যানক্রিয়াস সচল রাখে<br><br>

                                            গুলঞ্চ: টক্সিন অপসারণ, রোগপ্রতিরোধ ক্ষমতা বাড়ায়<br><br>

                                            গুরমার: মিষ্টি আকর্ষণ কমায়<br><br>

                                            ডুমুর: হজম ভালো রাখে, সুগার ব্যালান্সে সহায়ক<br><br>

                                            রসুন: হার্ট ও কোলেস্টেরল নিয়ন্ত্রণে<br><br>

                                            তুলসী পাতা: হরমোন ব্যালান্স ও মানসিক প্রশান্তি<br><br>

                                            দারুচিনি: রক্তে গ্লুকোজ নিয়ন্ত্রণে সহায়ক<br><br>

                                            আলফালফা: শক্তি ও ভিটামিন সমৃদ্ধ<br><br>

                                            সয়া পাউডার: ইনসুলিন কার্যকারিতা ও প্রোটিন উৎস<br><br>

                                            তুলসী ও হলুদ এক্সট্র্যাক্ট: অ্যান্টি-ইনফ্ল্যামেটরি ও অ্যান্টিঅক্সিডেন্ট প্রভাব ফেলে<br><br>

                                            অশ্বগন্ধা ও গোকশুরা: মানসিক চাপ কমায়, শক্তি ও হরমোনের ভারসাম্য রক্ষা করে<br><br>

                                            অন্যান্য সহায়ক উপাদান<br><br>

                                            প্রতিটি উপাদান বিশ্বজুড়ে স্বীকৃত এবং বৈজ্ঞানিকভাবে প্রমাণিত<br>
                                            যে এটি রক্তে গ্লুকোজ নিয়ন্ত্রণে বাস্তব ফল দেয়।<br><br>

                                            ⚖️ রাসায়নিক ওষুধ বনাম সুগার ব্যালেন্স প্লাস<br><br>

                                            বিষয়ঃ<br>
                                            রাসায়নিক ওষুধ বনাম সুগার ব্যালেন্স প্লাস এর তুলনামূক আলোচনা-<br><br>

                                            🟢 প্রভাবঃ রাসায়নিক ওষুধের প্রভাব সাময়িক। সুগার ব্যালেন্স প্লাসের প্রভাব দীর্ঘস্থায়ী ও প্রাকৃতিক।<br><br>

                                            🟢 কাজের জায়গাঃ রাসায়নিক ওষুধ শুধুমাত্র রক্তে সুগার নিয়ে কাজ করে।<br>
                                            সুগার ব্যালেন্স প্লাস প্যানক্রিয়াস, লিভার, কিডনি ও নার্ভে কাজ করে।<br><br>

                                            🟢 পার্শ্বপ্রতিক্রিয়াঃ রাসায়নিক ওষুধের পার্শ্বপ্রতিক্রিয়া অনেক সময় মারাত্মক। সুগার ব্যালেন্স প্লাস সম্পূর্ণ পার্শ্বপ্রতিক্রিয়ামুক্ত।<br><br>

                                            🟢 নির্ভরতাঃ রাসায়নিক ওষুধ আজীবন চালিয়ে যেতে হয়।<br>
                                            সুগার ব্যালেন্স প্লাস সেবনে ধীরে ধীরে প্রাকৃতিকভাবে ডায়বেটিস নামক ভয়াবহত থেকে মুক্তি পাওয়া যায় এবং একসময় সুস্থ স্বাভাবিক জীবনযাপন করা সম্ভব হয়।<br><br>

                                            ✅ উদ্দেশ্যঃ সুগার ব্যালেন্স প্লাস সুগার কন্ট্রোল করে এবং একইসাথে শরীরের ভেতর থেকে স্থায়ী সমাধান করে।<br><br>

                                            💚 কেনো এই প্রোডাক্টে আস্থা রাখবেন?<br><br>

                                            👉 কারণ এটি শুধু লক্ষণ নয়,<br>
                                            মূল কারণের চিকিৎসা করে।<br><br>

                                            👉 এটি শরীরের প্রাকৃতিক ইনসুলিন উৎপাদন ক্ষমতা ফিরিয়ে আনে।<br><br>

                                            👉 এটি আপনার লিভার, কিডনি ও নার্ভকে সুরক্ষিত রাখে।<br><br>

                                            👉 আর সবচেয়ে বড় কথা —<br>
                                            এটি রাসায়নিক নয়, প্রকৃতির তৈরি নিরাপদ সমাধান।<br><br>

                                            📊 Blood Sugar Reducing Level (Regular Use)<br><br>

                                            সময়কাল — গ্লুকোজের মাত্রা (mmol/l)<br><br>

                                            ৩০ দিন — ৯.০<br>
                                            ৬০ দিন — ৭.০<br>
                                            ৯০–১২০ দিন — ৬.০ পর্যন্ত নিয়ন্ত্রণে<br><br>

                                            🧾 নিউট্রিশনাল ফ্যাক্টস (প্রতি ২৫ গ্রাম)<br><br>

                                            Energy: 430 kcal<br>
                                            Protein: 39.60 gm<br>
                                            Carbohydrate: 41.20 gm<br>
                                            Fat: 14.25 gm<br>
                                            Fiber: 6.58 gm<br>
                                            Vitamin C: 410 mg<br>
                                            Iron: 14.90 mg<br>
                                            Calcium: 155 mg<br>
                                            Potassium: 8.89 mg<br>
                                            Vitamin D: 310 IU<br>
                                            Arsenic, Lead, Mercury: Nil<br><br>

                                            🧠 Sugar Balance Plus কেন অপরিহার্য<br><br>

                                            🔹 আধুনিক জীবনে ডায়াবেটিসের ঝুঁকি প্রতিনিয়ত বাড়ছে।<br>
                                            🔹 কেমিক্যাল ওষুধে সাময়িক উপশম মিললেও স্থায়ী সমাধান মেলে না।<br>
                                            🔹 Sugar Balance Plus একমাত্র এমন একটি প্রাকৃতিক সাপ্লিমেন্ট যা —<br><br>

                                            শরীরের ইনসুলিন কার্যকারিতা স্বাভাবিক করে,<br>
                                            অতিরিক্ত গ্লুকোজকে শক্তিতে রূপান্তর করে,<br>
                                            ওজন, কোলেস্টেরল ও হৃদযন্ত্র সুরক্ষায় সাহায্য করে।<br><br>

                                            🍽️ ব্যবহারবিধিঃ<br>
                                            🌿 সুগার ব্যালেন্স প্লাস – খাওয়ার নিয়ম<br><br>

                                            ডায়াবেটিস রোগী ও সুস্থ মানুষ – সবার জন্য প্রাকৃতিক নিরাপদ উপাদান<br><br>

                                            ✅ ১. সুস্থ ও স্বাভাবিক মানুষ<br><br>

                                            ➡️ প্রতিদিন ১ চা–চামচ (৫ গ্রাম)<br>
                                            ➡️ খালি পেটে বা খাবারের পরে যে কোনো সময় সেবন করতে পারবেন।<br><br>

                                            ✅ ২. নতুন ডায়াবেটিস ধরা পড়েছে (কোনো ওষুধ/ইনসুলিন নেই)<br><br>

                                            ➡️ সকালে খালি পেটে ১ চা–চামচ (৫ গ্রাম)<br>
                                            ➡️ রাতে ঘুমানোর আগে ১ চা–চামচ (৫ গ্রাম)<br><br>

                                            ✅ ৩. যারা ডায়াবেটিসের ওষুধ/ইনসুলিন ব্যবহার করেন<br><br>

                                            তাদের জন্য সম্পূর্ণ নিয়ম:<br><br>

                                            🔹 সকালের নিয়ম<br><br>

                                            1️⃣ সকালে ঘুম থেকে উঠেই যখন ওষুধ বা ইনসুলিন নেবেন,<br>
                                            তখনই ১০০ মি.লি. অথবা আধা গ্লাস পানিতে ১ চা–চামচ সুগার ব্যালেন্স প্লাস ভিজিয়ে রাখুন।<br>
                                            (৩০–৬০ মিনিট ভিজিয়ে রাখা উত্তম)<br><br>

                                            2️⃣ নিয়ম অনুযায়ী ওষুধ/ইনসুলিন নিন*<br>
                                            3️⃣ নাস্তা করুন<br>
                                            4️⃣ নাস্তার ৩০ মিনিট পরে<br>
                                            ➡️ ভিজিয়ে রাখা সুগার ব্যালেন্স প্লাস সেবন করুন<br>
                                            5️⃣ শেষে ১ গ্লাস পানি পান করুন<br><br>

                                            🔹 রাতের নিয়ম<br><br>

                                            ➡️ রাতের খাবারের ৩০ মিনিট পরে ১ চা–চামচ (৫ গ্রাম)<br>
                                            ➡️ এরপর ১ গ্লাস পানি পান করুন<br><br>

                                            ✅ ৪. যারা শুধু ইনসুলিন ব্যবহার করেন (Special Guidance)<br><br>

                                            1️⃣ প্রথম দিন থেকেই ইনসুলিন নেওয়ার আগে সুগার পরিমাপ করুন<br>
                                            2️⃣ সুগার ব্যালেন্স প্লাস ১৫ দিন নিয়মিত সেবনের পর আবার সুগার পরীক্ষা করুন<br>
                                            3️⃣ যদি নিয়ন্ত্রণে আসে, তাহলে ইনসুলিন ধীরে ধীরে কমাতে পারবেন<br><br>

                                            🔽 ইনসুলিন কমানোর উদাহরণ<br><br>

                                            আগে:<br>
                                            ➡️ সকাল: ১০ ইউনিট<br>
                                            ➡️ রাত: ১২ ইউনিট<br><br>

                                            ১৫ দিন পরে নিয়ন্ত্রণ এলে:<br>
                                            ➡️ সকাল: ৮ ইউনিট<br>
                                            ➡️ রাত: ১০ ইউনিট<br><br>

                                            এভাবে ধাপে ধাপে ইনসুলিন কমানো যাবে ইনশাআল্লাহ।<br>
                                            ❗ হঠাৎ বন্ধ করা যাবে না।<br><br>

                                            🌟 ৫. সুস্থতার জন্য অতিরিক্ত নির্দেশনা<br><br>

                                            ✔️ প্রতিদিন নিয়মিত ২০–৩০ মিনিট হাঁটা/ব্যায়াম<br>
                                            ✔️ প্রতিদিন ৬–৮ ঘণ্টা পর্যাপ্ত ঘুম<br>
                                            ✔️ চিনি, ময়দা, ভাত, কোমল পানীয় পরিহার করুন<br>
                                            ✔️ সবজি, সালাদ, ডাল, মাছ ও হালকা খাবার বেশি খান<br>
                                            ✔️ প্রতিদিন ৩–৪ লিটার পানি পান করুন<br><br>

                                            💚 আপনি যদি নিয়মিতভাবে—<br>
                                            ✔️ সময়মতো সুগার ব্যালেন্স প্লাস সেবন করেন<br>
                                            ✔️ স্বাস্থ্যকর খাবারের নিয়ম মানেন<br>
                                            ✔️ ব্যায়াম ও ঘুম ঠিক রাখেন<br><br>

                                            তাহলে ৩ থেকে ৬ মাসের মধ্যে—<br>
                                            ➡️ ওষুধ কমে যাবে<br>
                                            ➡️ ইনসুলিন কমে যাবে<br>
                                            ➡️ সুগার নিয়ন্ত্রণে আসবে<br>
                                            ➡️ ধীরে ধীরে আপনি ওষুধ ও ইনসুলিন মুক্ত, স্বাভাবিক সুস্থ জীবনযাপন করতে পারবেন—<br>
                                            ইনশাআল্লাহ।<br><br>

                                            বিঃদ্রঃ ★★★সুগার ব্যালেন্স প্লাস সম্পূর্ণ প্রাকৃতিক ভেষজ উপাদানে তৈরি। তাই এটি সেবনের সময় কিছুটা তিতা স্বাদ অনুভব হতে পারে। তাই আধা গ্লাস পানিতে ভিজিয়ে রাখুন এবং সেবনের পরে এক গ্লাস পানি পান করুন।★★★<br><br>

                                            🌟 আপনার জন্য বা আপনার প্রিয়জনের জন্য সবচেয়ে বড় উপহার হতে পারে এই একটি সিদ্ধান্ত —<br><br>

                                            আজই সুগার ব্যালেন্স প্লাস সেবন শুরু করুন,<br>
                                            কারণ প্রতিদিনের ছোট একটি প্রাকৃতিক পদক্ষেপ<br>
                                            আপনাকে ফিরিয়ে দিতে পারে ডায়াবেটিসমুক্ত, স্বাভাবিক, উদ্যমী জীবন।<br><br>

                                            🎯 স্মরণ রাখুন:<br>
                                            "ডায়াবেটিসকে জয় করা সম্ভব —<br>
                                            যদি আপনি প্রকৃতির শক্তিকে বিশ্বাস করেন।"<br><br>

                                            সুগার ব্যালেন্স প্লাস — প্রকৃতির ভরসা, সুস্থ জীবনের প্রতিশ্রুতি। 🌿

                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'zdia') { ?>
                                        <img src="images/custom/product/banner/z-dia.jpg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            🌿জেড-ডায়া (Z-DIA) ডায়াবেটিস নিয়ন্ত্রণে প্রাকৃতিক আস্থা, সুস্থ জীবনের প্রতিশ্রুতি. (Exclusively Formulated for BIKRANS)<br><br>

                                            জেড-ডায়া (Z-DIA)<br>
                                            বহু মূত্রান্তক হার্বাল রস<br><br>

                                            🌿 আয়ুর্বেদিক ও প্রাকৃতিক উপাদানে প্রস্তুত<br><br>

                                            🎯 লক্ষ্য:<br>
                                            রক্তে শর্করার ভারসাম্য রক্ষা<br>
                                            সুস্থ ও কর্মক্ষম জীবন নিশ্চিত করা এবং<br>
                                            ডায়াবেটিস ব্যবস্থাপনায় সহায়ক ভূমিকা রাখা<br><br>

                                            BIKRANS "The truth will be revealed"<br><br>

                                            👹 ডায়াবেটিস কেন ভয়ংকর?<br><br>

                                            বর্তমানে বিশ্বজুড়ে দ্রুত বৃদ্ধি পাওয়া নীরব ঘাতক রোগগুলোর মধ্যে ডায়াবেটিস অন্যতম।<br>
                                            অনিয়ন্ত্রিত ডায়াবেটিসের ঝুঁকি:<br>
                                            ❌ কিডনি জটিলতা<br>
                                            ❌ চোখের সমস্যা<br>
                                            ❌ হৃদরোগ<br>
                                            ❌ স্নায়ু ক্ষতি<br>
                                            ❌ স্ট্রোক<br>
                                            ❌ ক্ষত শুকাতে বিলম্ব<br>
                                            ❌ শারীরিক দুর্বলতা ও কর্মক্ষমতা হ্রাস<br><br>

                                            তাই প্রয়োজন<br>
                                            ✔️ দ্রুত শনাক্তকরণ<br>
                                            ✔️ নিয়মিত পর্যবেক্ষণ<br>
                                            ✔️ সঠিক জীবনযাপন<br>
                                            ✔️ কার্যকর সহায়ক সমাধান<br><br>

                                            জেড-ডায়া কী?<br><br>

                                            জেড-ডায়া একটি আয়ুর্বেদিক হার্বাল ফর্মুলেশন যা বাংলাদেশ জাতীয় আয়ুর্বেদিক ফর্মুলার আলোকে প্রস্তুত।<br><br>

                                            বিশেষত্ব<br>
                                            ✅ প্রাকৃতিক উপাদান<br>
                                            ✅ ঐতিহ্যবাহী আয়ুর্বেদিক ফর্মুলা<br>
                                            ✅ দীর্ঘমেয়াদে সেবনযোগ্য<br>
                                            ✅ স্বাস্থ্য সচেতন ব্যক্তিদের জন্য উপযোগী<br>
                                            ✅ Exclusively Formulated for BIKRANS<br><br>

                                            জেড-ডায়ার উপাদানসমূহ<br>
                                            প্রতি ট্যাবলেটে-<br><br>

                                            🌿 রস সিন্দুর – ৩৫.৭১ মি.গ্রা.<br>
                                            🌿 লৌহ – ৩৫.৭১ মি.গ্রা.<br>
                                            🌿 বশ – ৩৫.৭১ মি.গ্রা.<br>
                                            🌿 অহিফেন – ৩৫.৭১ মি.গ্রা.<br>
                                            🌿 যষ্টিমধুর বীজ – ৩৫.৭১ মি.গ্রা.<br>
                                            🌿 বিল্বমূল – ৩৫.৭১ মি.গ্রা.<br>
                                            🌿 কাবাব চিনি – ৩৫.৭১ মি.গ্রা.<br><br>

                                            ♻️ জেড-ডায়া কীভাবে কাজ করে?<br><br>

                                            ধাপে ধাপে কার্যপ্রক্রিয়া<br>
                                            ① শরীরের বিপাকীয় কার্যক্রমে সহায়তা করে<br>
                                            ⬇️<br>
                                            ② গ্লুকোজ ব্যবস্থাপনায় সহায়ক ভূমিকা রাখে<br>
                                            ⬇️<br>
                                            ③ শরীরের শক্তি ব্যবহারের সক্ষমতা উন্নত করতে সহায়তা করে<br>
                                            ⬇️<br>
                                            ④ সুস্থ জীবনযাপনের অংশ হিসেবে রক্তে শর্করা নিয়ন্ত্রণে সহযোগিতা করে<br>
                                            ⬇️<br>
                                            ⑤ কর্মশক্তি ও স্বাভাবিক জীবনধারা বজায় রাখতে সহায়তা করে<br><br>

                                            🎯 জেড-ডায়ার সম্ভাব্য উপকারিতাঃ<br><br>

                                            নিয়মিত সেবনে👇<br>
                                            ✔️ রক্তে শর্করা ব্যবস্থাপনায় সহায়ক<br>
                                            ✔️ শরীরে ইনসুলিন উৎপাদন বৃদ্ধি করে<br>
                                            ✔️ ইনসুলিন নির্ভরতা কমিয়ে দেয়<br>
                                            ✔️ অতিরিক্ত তৃষ্ণা কমাতে সহায়ক<br>
                                            ✔️ অতিরিক্ত প্রস্রাবের প্রবণতা হ্রাসে সহায়ক<br>
                                            ✔️ দুর্বলতা ও অবসাদ কমাতে সহায়ক<br>
                                            ✔️ দৈনন্দিন কর্মক্ষমতা বজায় রাখতে সহায়ক<br>
                                            ✔️ সুস্থ জীবনধারা গঠনে সহায়ক<br>
                                            ✔️ সার্বিক সুস্থতা উন্নয়নে সহায়ক<br><br>

                                            🌿 কারা সেবন করতে পারেন?<br>
                                            উপযোগী হতে পারে<br>
                                            ✔️ টাইপ-২ ডায়াবেটিস রোগী<br>
                                            ✔️ প্রি-ডায়াবেটিক ব্যক্তি<br>
                                            ✔️ রক্তে শর্করার ভারসাম্য রক্ষায় সচেতন ব্যক্তি<br>
                                            ✔️ পরিবারে ডায়াবেটিসের ইতিহাস রয়েছে এমন ব্যক্তি<br>
                                            ✔️ স্বাস্থ্যকর জীবনযাপন অনুসরণকারী ব্যক্তি<br><br>

                                            ❓ কেন জেড-ডায়া? ❓<br>
                                            অন্যান্য সমাধানের তুলনায়<br><br>

                                            🌿 প্রাকৃতিক উপাদান<br>
                                            🌿 আয়ুর্বেদিক ফর্মুলেশন<br>
                                            🌿 দীর্ঘমেয়াদে ব্যবহারের উপযোগী<br>
                                            🌿 মান নিয়ন্ত্রিত উৎপাদন<br>
                                            🌿 অভিজ্ঞ ফর্মুলেশনের সমন্বয়<br><br>

                                            ♂️ BIKRANS-এর জন্য বিশেষভাবে প্রস্তুত ♂️<br><br>

                                            🍽️ সেবনবিধিঃ<br><br>

                                            প্রস্তাবিত ব্যবহার<br>
                                            🕘 ১–২ ট্যাবলেট<br>
                                            🌞 সকালে<br>
                                            🌙 রাতে<br>
                                            🍽️ খাবারের ৩০-৬০ মিনিট পর<br>
                                            অথবা<br>
                                            👨‍⚕️ চিকিৎসকের পরামর্শ অনুযায়ী<br><br>

                                            ⚠️ সতর্কতাঃ<br><br>

                                            ⚠️ শিশুদের নাগালের বাইরে রাখুন<br>
                                            ⚠️ গর্ভবতী ও স্তন্যদানকারী মায়েরা চিকিৎসকের পরামর্শ নিন<br>
                                            ⚠️ নির্ধারিত মাত্রার বেশি সেবন করবেন না<br>
                                            ⚠️ এটি কোনো জরুরি চিকিৎসার বিকল্প নয়<br>
                                            ⚠️ ডায়াবেটিসের ওষুধ বা ইনসুলিন ব্যবহারকারীরা চিকিৎসকের পরামর্শ অনুযায়ী সেবন করবেন<br><br>

                                            ⭐ জীবনধারা ও ডায়াবেটিস নিয়ন্ত্রণে জেড-ডায়ার পাশাপাশি-<br><br>

                                            🥗 সুষম খাদ্য<br>
                                            🚶 নিয়মিত হাঁটা<br>
                                            💧 পর্যাপ্ত পানি পান<br>
                                            😴 পর্যাপ্ত ঘুম<br>
                                            🩺 নিয়মিত সুগার পরীক্ষা<br>
                                            🚭 ধূমপান পরিহার<br><br>

                                            এই অভ্যাসগুলো ডায়াবেটিস ব্যবস্থাপনায় গুরুত্বপূর্ণ ভূমিকা রাখে।<br><br>

                                            ♻️ জেড-ডায়া<br>
                                            প্রাকৃতিক উপাদানে প্রস্তুত একটি আয়ুর্বেদিক হার্বাল ফর্মুলেশন<br><br>

                                            🌿 সুস্থ জীবনযাপনের সহযাত্রী<br>
                                            🌿 স্বাস্থ্য সচেতন মানুষের আস্থার প্রতীক<br>
                                            🌿 Exclusively Formulated for BIKRANS<br><br>

                                            যোগাযোগ<br>
                                            📞 01715-987974<br>
                                            🌐 [www.bikrans.com] <br>(http://www.bikrans.com)<br><br>

                                            BIKRANS - The truth will be revealed.

                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'kamiska') { ?>
                                        <img src="images/custom/product/banner/kamiska.jpg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            💥 Kamiska Plus শুধুমাত্র একটি প্রডাক্ট নয় —<br>
                                            এটি এক পুরুষত্বের পুনর্জাগরণ,<br>
                                            একটি শক্তির বিস্ময়,<br>
                                            এর নাম — Kamiska Plus ! 🌿<br><br>

                                            🌿 ভূমিকা (Introduction):<br><br>

                                            আজকের ব্যস্ত জীবনে, মানসিক চাপ, অনিয়মিত ঘুম, দূষিত খাদ্যাভ্যাস ও অতিরিক্ত পরিশ্রমের কারণে<br>
                                            অনেক পুরুষই হারাচ্ছেন তাদের প্রাকৃতিক শক্তি, আত্মবিশ্বাস ও স্ট্যামিনা।<br>
                                            অনেকেই মনে করছেন — “এটাই হয়তো স্বাভাবিক বার্ধক্যের অংশ!”<br><br>

                                            কিন্তু সত্যিটা হলো —<br>
                                            শরীরের শক্তি কমে না, শক্তি ঘুমিয়ে যায়। আর সেই শক্তিকে জাগিয়ে তোলার নাম — Kamiska Plus<br><br>

                                            Kamiska Plus গঠিত হয়েছে অনেকগুলো শক্তিশালী উপাদান দিয়ে,<br>
                                            যেগুলো শত শত বছর ধরে আয়ুর্বেদ ও প্রাচীন চিকিৎসায় ব্যবহৃত হয়ে আসছে।<br><br>

                                            ---

                                            ⚙️ কাজ করার প্রক্রিয়াঃ<br><br>

                                            Kamiska Plus শরীরে কাজ করে পাঁচ ধাপে —<br><br>

                                            1️⃣ টেস্টোস্টেরন বৃদ্ধি করে — পুরুষ হরমোনের ভারসাম্য ফিরিয়ে আনে।<br>
                                            2️⃣ নার্ভ ও টিস্যু শক্তিশালী করে — দুর্বলতা দূর করে।<br>
                                            3️⃣ রক্ত সঞ্চালন উন্নত করে — শক্তিশালী ও স্থায়ী ইরেকশন তৈরি করে।<br>
                                            4️⃣ সেল রিজেনারেশন করে — পুরোনো কোষকে নতুন শক্তি দেয়।<br>
                                            5️⃣ মন ও শরীরের প্রশান্তি আনে — মানসিক চাপ দূর করে আত্মবিশ্বাস বাড়ায়।<br><br>

                                            ---

                                            💪 ফলাফল (Result):<br><br>

                                            ✅ যৌনশক্তি ও স্ট্যামিনা বৃদ্ধি<br>
                                            ✅ টেস্টোস্টেরন প্রাকৃতিকভাবে বৃদ্ধি<br>
                                            ✅ বীর্য ঘনত্ব ও পরিমাণ উন্নত<br>
                                            ✅ ইরেকশন শক্তিশালী ও স্থায়ী হয়<br>
                                            ✅ ক্লান্তি ও মানসিক চাপ কমে যায়<br>
                                            ✅ আত্মবিশ্বাস ও পুরুষত্ব ফিরে আসে<br><br>

                                            🌟 এক কথায়:<br><br>

                                            👉 Kamiska Plus আপনাকে ফিরিয়ে দেবে সেই পুরনো তারুণ্য,<br>
                                            যেখানে থাকবে শক্তি, স্থায়িত্ব, আত্মবিশ্বাস আর পূর্ণ পুরুষত্বের আনন্দ।<br><br>

                                            ---

                                            🕒 সেবনবিধি:<br><br>

                                            কামিস্কা প্লাস ব্যবহারের নিয়ম<br>
                                            প্রথম দিন (সন্ধ্যায়):<br>
                                            ১. প্রথমে খাবারের আগে একটি গ্যাস্ট্রিকের ওষুধ সেবন করুন।<br>
                                            ২. এরপর পছন্দমতো স্বাস্থ্যকর খাবার গ্রহণ করুন।<br><br>

                                            ৩. খাবার শেষ হওয়ার পর ১ চা-চামচ (বা রোগীর শারীরিক অবস্থার ভিত্তিতে আধা চা-চামচ) কামিস্কা প্লাস মুখে নিয়ে চেটে খান।<br>
                                            ৪. প্রয়োজনে রোগী এই পরিমাণ কিছুটা কম বা বেশি করতে পারবেন চিকিৎসকের পরামর্শ অনুযায়ী।<br><br>

                                            পরবর্তী সেবন:<br>
                                            প্রথম ব্যবহারের ২-৩ দিন পর আবার একইভাবে সেবন করুন।<br>
                                            প্রয়োজনে একই পদ্ধতিতে নির্দিষ্ট বিরতিতে ওষুধ সেবন চালিয়ে যেতে পারেন।<br><br>

                                            ⚠️ সতর্কতা ও পরামর্শ<br><br>

                                            ডায়াবেটিস, উচ্চ রক্তচাপ বা হৃদরোগে আক্রান্ত রোগীরা এই ওষুধ সেবন করবেন না।<br>
                                            ওষুধ সেবনের সময় পুষ্টিকর খাদ্য যেমন দুধ, ডিম, তাজা ফলমূল, সবজি, ও সালাদ বেশি করে খাওয়া উচিত, যা দ্রুত সুস্থতায় সহায়ক হবে।<br><br>

                                            নিয়মিত সেবনে আপনি নিজেই অনুভব করবেন পরিবর্তন।<br><br>

                                            Kamiska Plus কেবল একটি প্রডাক্ট নয়, এটি একটি প্রতিশ্রুতি<br><br>

                                            🌿 Kamiska Plus 🌿<br><br>

                                            🔥 শক্তি – স্থায়িত্ব – আত্মবিশ্বাস 🔥

                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'vitaforce') { ?>
                                        <img src="images/custom/product/banner/vita-force.jpg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            🌟 VitaForce — Real-Time Power. Long-Term Strength. True Masculinity.<br><br>

                                            ---<br><br>

                                            > এই সময়টা আমাদের শরীরের সবচেয়ে বড় শত্রু — ক্লান্তি, চাপ, আর নিঃশেষ হয়ে যাওয়া শক্তি।<br><br>

                                            আমরা প্রতিদিন দৌড়াচ্ছি সফলতার পেছনে —<br>
                                            কিন্তু হারিয়ে ফেলছি শরীরের প্রাণশক্তি, আত্মবিশ্বাস, ও পুরুষত্বের প্রকৃত রূপ।<br><br>

                                            মানসিক স্ট্রেস, অনিদ্রা, ক্যামিকেল যুক্ত খাদ্য দ্রব্য, ফাস্টফুড, ইন্টারনেট আসক্তি আর দূষিত পরিবেশ —<br>
                                            ধীরে ধীরে নিঃশেষ করছে শরীরের প্রাকৃতিক টেস্টোস্টেরন, স্পার্ম কোয়ালিটি ও রক্তসঞ্চালন।<br><br>

                                            ফলাফল? 😔<br><br>

                                            ক্লান্তি আর মানসিক অস্থিরতা<br><br>

                                            আগের মতো আগ্রহ বা এনার্জি নেই<br><br>

                                            দ্রুত বীর্যপাত, যৌন দুর্বলতা<br><br>

                                            আত্মবিশ্বাসের ঘাটতি ও অনিয়ন্ত্রিত স্ট্রেস<br><br>

                                            এভাবেই নীরবে হারিয়ে যাচ্ছে “True Masculinity”।<br><br>

                                            ⚡ The Modern Problem<br><br>

                                            আজকের পুরুষ (এবং নারী) বাহ্যিকভাবে ফিট দেখালেও ভিতরে হয়ে যাচ্ছে “Energy Deficient”।<br>
                                            হরমোনাল ভারসাম্য নষ্ট হচ্ছে, স্নায়ু দুর্বল হচ্ছে, টিস্যু শুকিয়ে যাচ্ছে —<br>
                                            ফলে জীবনের আনন্দ, আত্মবিশ্বাস আর সক্ষমতা ক্রমে হারিয়ে যাচ্ছে।<br><br>

                                            তুমি হয়তো কাজের চাপে নিজেকে হারিয়ে ফেলছো,<br>
                                            অথবা রাতের ঘুম কমে যাচ্ছে, মেজাজ খিটখিটে হয়ে উঠছে —<br>
                                            এগুলো কেবল স্ট্রেস নয়,<br>
                                            👉 এগুলো শরীরের ভেতরের "Warning Signal" —<br><br>

                                            এখন সময় এসেছে শক্তি ফিরিয়ে আনার।<br><br>

                                            🌿 Introducing VitaForce<br><br>

                                            > VitaForce – Real-Time Power. Long-Term Strength. True Masculinity.<br><br>

                                            এটি শুধু একটি সাপ্লিমেন্ট নয় —<br>
                                            এটি তোমার শরীর, মন এবং আত্মবিশ্বাস পুনরুদ্ধারের একটি “Natural Revolution”।<br><br>

                                            👉 VitaForce তোমাকে দেয়:<br><br>

                                            শরীরের ভেতরের হরমোনাল ব্যালান্স পুনরুদ্ধার<br><br>

                                            পুরুষত্বের মূল শক্তি ফিরিয়ে আনে<br><br>

                                            মস্তিষ্ক ও স্নায়ুকে করে শান্ত ও ফোকাসড<br><br>

                                            শক্তিশালী ইরেকশন ও দীর্ঘস্থায়ী স্ট্যামিনা প্রদান<br><br>

                                            প্রজননক্ষমতা ও আত্মবিশ্বাস বহুগুণে বৃদ্ধি<br><br>

                                            ---<br><br>

                                            🔬 Why You Need It Now<br><br>

                                            আজকের জীবনযাত্রায় প্রতিদিন আমাদের শরীর হারাচ্ছে:<br><br>

                                            প্রতিদিন ৩–৪% টেস্টোস্টেরন নষ্ট হচ্ছে মানসিক চাপ ও অনিদ্রার কারণে<br><br>

                                            স্পার্ম কাউন্ট ৪০% পর্যন্ত কমছে খাদ্যদূষণ ও কেমিক্যাল ফুডের কারণে<br><br>

                                            হরমোনাল ইমব্যালান্স সৃষ্টি করছে ডিপ্রেশন, মোটা হয়ে যাওয়া ও দুর্বল ইরেকশন<br><br>

                                            👉 যদি এখনই ব্যবস্থা না নাও,<br>
                                            এই ক্ষয় দ্রুততর হয়ে শরীরের ভেতরের “Real Man Power” কে নিঃশেষ করে দেয়।<br><br>

                                            🌟 VitaForce – Nature’s Science for True Vitality<br><br>

                                            VitaForce তৈরি হয়েছে ২২+ প্রিমিয়াম ভেষজ ও পুষ্টিকর উপাদানে —<br>
                                            যা শতাব্দীর আয়ুর্বেদিক জ্ঞান ও আধুনিক বিজ্ঞানকে একত্র করেছে।<br><br>

                                            💪 Why VitaForce Is Different<br><br>

                                            ২২+ বিশ্বমানের ভেষজ উপাদানের অনন্য সমন্বয়<br><br>

                                            আধুনিক বিজ্ঞান ও প্রাচীন আয়ুর্বেদের শক্তিশালী সংমিশ্রণ<br><br>

                                            ১০০% ন্যাচারাল No Chemical, No Side Effects<br><br>

                                            Tested, Trusted & Truly Transformative Formula<br><br>

                                            🌟 VitaForce – Key Ingredients :<br>
                                            “Real-Time Power. Long-Term Strength. True Masculinity.”<br><br>

                                            Ashwagandha — টেস্টোস্টেরন বৃদ্ধি, মানসিক চাপ কমানো, লিবিডো বৃদ্ধি<br>
                                            Safed Musli — টিস্যু পুনর্গঠন, স্পার্ম কোয়ালিটি উন্নত করা<br>
                                            Biryamani — প্রজনন ক্ষমতা উন্নত, স্ট্যামিনা ও শক্তি বৃদ্ধি<br>
                                            Mucuna Pruriens — ইরেকশন শক্তিশালী করা, টেস্টোস্টেরন বৃদ্ধি<br>
                                            Vidarikand — দীর্ঘমেয়াদি শক্তি, মানসিক ফোকাস বৃদ্ধি<br>
                                            Shatavari — হরমোন ব্যালান্স ঠিক রাখা, ক্লান্তি কমানো<br>
                                            Shimulmul — প্রজনন অঙ্গ শক্তিশালী করা, স্পার্ম কন্ডিশন উন্নত করা<br>
                                            Talmakhana — স্পার্ম কাউন্ট ও মোবিলিটি বৃদ্ধি<br>
                                            Date Powder — দৈনন্দিন শক্তি ও স্ট্যামিনা বৃদ্ধি<br>
                                            Licorice — মানসিক চাপ কমানো, যৌন শক্তি বৃদ্ধি<br>
                                            Ginger — রক্ত সঞ্চালন বৃদ্ধি, এনার্জি বুস্ট<br>
                                            Cinnamon — হরমোন ব্যালান্স, শক্তি বৃদ্ধি<br>
                                            Clove — তাত্ক্ষণিক লিবিডো বুস্ট, শক্তি বৃদ্ধি<br>
                                            Nutmeg — যৌন ক্ষমতা বৃদ্ধি, ইরেকশন সাহায্য<br>
                                            Tamarind Seed Powder — প্রজনন অঙ্গ শক্তিশালী করা, স্পার্ম উন্নত করা<br>
                                            Tribulus Terrestris — টেস্টোস্টেরন, লিবিডো ও স্পার্ম কোয়ালিটি বৃদ্ধি<br>
                                            Korean Red Ginseng — তাত্ক্ষণিক শক্তি, স্ট্যামিনা ও লিবিডো বুস্ট<br>
                                            Soya Protein — দৈনন্দিন শক্তি, পেশি সহায়তা ও স্ট্যামিনা বৃদ্ধি<br>
                                            Psyllium Husk + Katira Gum — হজম উন্নত, টক্সিন দূর, টিস্যু পুনর্গঠন<br><br>

                                            VitaForce – Key Benefits<br>
                                            “Real-Time Power. Long-Term Strength. True Masculinity.”<br><br>

                                            Benefits:<br><br>

                                            1. টেস্টোস্টেরন লেভেল ৪৪%-৫০% পর্যন্ত বৃদ্ধি<br><br>

                                            2. দ্রুত বীর্যপাত রোধ করে দীর্ঘস্থায়ী ইন্টারকোর্সে সহায়তা<br><br>

                                            3. ইরেকশনকে শক্তিশালী, ঘন ও স্থায়ী করে<br><br>

                                            4. বীর্য উৎপাদন বহুগুণ বৃদ্ধি করে<br><br>

                                            5. স্পার্ম কাউন্ট ও স্পার্ম মোবিলিটি উন্নত করে<br><br>

                                            6. বীর্যকে ঘন, সাদা ও গাঢ় করে প্রজননক্ষমতা বৃদ্ধি<br><br>

                                            7. মানসিক চাপ ও কর্টিসল হরমোন কমিয়ে যৌনশক্তি বৃদ্ধি করে<br><br>

                                            8. মানসিক ক্লান্তি, স্নায়ু দুর্বলতা দূর করে<br><br>

                                            9. দৈনন্দিন শক্তি, মনোযোগ ও আত্মবিশ্বাস বাড়ায়<br><br>

                                            10. হরমোন ব্যালান্স ঠিক রাখে ও লিবিডো বৃদ্ধি করে<br><br>

                                            11. নিয়মিত ব্যবহারে পুরুষত্বের প্রকৃত শক্তি ফিরিয়ে আনে<br><br>

                                            12. নিস্তেজ হয়ে যাওয়া পেনিসকে সতেজ করে<br><br>

                                            13. শুকিয়ে যাওয়া পেনিয়াল টিস্যু পুনঃগঠন ও শক্তিশালী করে<br><br>

                                            14. অতিরিক্ত স্বপ্নদোষ ও বদঅভ্যাসের কারণে ছোট ও কুঁচকে যাওয়া লিঙ্গকে সতেজ ও সবল করে<br><br>

                                            15. সেক্সুয়াল স্ট্যামিনা ও ফার্টিলিটি উন্নত করে<br><br>

                                            16. সামগ্রিকভাবে Power + Stamina + Libido একসাথে বুস্ট করে<br><br>

                                            ---<br><br>

                                            💪 VitaForce Works in several Dynamic Phases<br><br>

                                            ✅ Real-Time Boost:<br><br>

                                            প্রথম সপ্তাহেই Energy ও Libido তে পার্থক্য টের পাবেন।<br><br>

                                            ✅ Hormonal Rebalance:<br>
                                            শরীরের হরমোন ও রক্তসঞ্চালন নিয়ন্ত্রণে আসে<br><br>

                                            ✅ Hormonal Rebalance:<br>
                                            হরমোন, টেস্টোস্টেরন ও রক্তসঞ্চালন স্বাভাবিক হয়।<br><br>

                                            ✅ Long-Term Rejuvenation:<br>
                                            টিস্যু পুনর্গঠন, স্পার্ম উন্নয়ন, ও স্থায়ী পুরুষত্ব পুনঃস্থাপন।<br><br>

                                            ✅ Long-Term Regeneration:<br>
                                            পুরুষত্বের প্রকৃত শক্তি ফিরে আসে স্থায়ীভাবে।<br><br>

                                            💢 ব্যবহারবিধি ও ডোজ নির্দেশনাঃ 💢<br><br>

                                            💝 স্বাভাবিক নিয়ম 💝<br>
                                            প্রতিদিন রাতে খাবারের এক ঘন্টা আগে অথবা এক ঘন্টা পরে ১ চা-চামচ Vita Force কুসুম গরম দুধ/কুসুম গরম পানির সাথে ভালোভাবে মিশিয়ে সেবন করুন। অতিরিক্ত ফলাফলের জন্য ২ টেবিল চামচ মধু মেশাতে পারেন।<br><br>

                                            🙋‍♂️ তবে বিশেষ দুর্বল/বেশি চাহিদা সম্পন্ন হলে একই নিয়মে কিছুদিন সকালে ও রাতে দুইবার সেবন করতে পারবেন।<br>
                                            🌙 ২১ দিনে দৃশ্যমান ফলাফল,<br>
                                            👌 ৬০ দিনে গভীর উন্নতি,<br>
                                            💪 ৯০ দিন সেবনে দীর্ঘমেয়াদী স্থায়ী পরিবর্তন।<br><br>

                                            পার্শ্বপ্রতিক্রিয়াঃ<br>
                                            সম্পূর্ণ প্রাকৃতিক উপাদান থাকায় নির্ধারিত মাত্রায় সেবনে এই খাদ্য পরিপূরক সম্পূর্ণ নিরাপদ ও পার্শ্বপ্রতিক্রিয়ামুক্ত।<br><br>

                                            ঘোষণাঃ এটি একটি কেমিক্যালমুক্ত প্রাকৃতিক ভেষজ খাদ্য পরিপূরক। এতে ব্যবহৃত উপাদানসমূহ বাংলাদেশ ড্রাগ এডমিনিস্ট্রেশন এর আওতামুক্ত। এটি মূলত খাদ্য পরিপূরক, এটি কোন ঔষধ বা ঔষধ হিসাবে ব্যবহারের জন্য নয়।<br><br>

                                            > “তুমি বাইরে যত সফলই হও,<br>
                                            যদি শরীর ও আত্মবিশ্বাস নিঃশেষ হয়ে যায় — সফলতা অর্থহীন।”<br><br>

                                            সময় এসেছে শক্তি ফিরিয়ে আনার, আত্মবিশ্বাস পুনর্গঠনের,<br>
                                            এবং তোমার মধ্যে থাকা True Masculinity আবার জাগিয়ে তোলার।<br><br>

                                            এটি শুধু একটি সাপ্লিমেন্ট নয়<br><br>

                                            ← এটি একটি Complete Masculine Wellness Formula<br><br>

                                            VitaForce-💪 Confidence. Control. Power.<br><br>

                                            🔥 VitaForce – Let Your Food Be Your Medicine.

                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'zlucon') { ?>
                                        <img src="images/custom/product/banner/zlucon.jpg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            জেড-লিউকন (Z-Leucon)<br>
                                            নারীর সুস্থতা, আত্মবিশ্বাস ও সৌন্দর্যের বিশ্বস্ত সহচর<br><br>

                                            ভূমিকা<br>
                                            নারীর শারীরিক সুস্থতা শুধু তার নিজের জন্য নয়, বরং পুরো পরিবার ও সমাজের জন্য অত্যন্ত গুরুত্বপূর্ণ। বিশেষ করে শ্বেতপ্রদর, জরায়ুর অস্বস্তি, বিভিন্ন ধরনের স্রাব, চুলকানি ও দুর্বলতার মতো সমস্যাগুলো অনেক নারীর দৈনন্দিন জীবনকে প্রভাবিত করে।<br>
                                            জেড-লিউকন একটি ঐতিহ্যবাহী ইউনানী/আয়ুর্বেদিক ফর্মুলেশন, যা নারীদের বিভিন্ন শারীরিক সমস্যায় সহায়ক ভূমিকা রাখার উদ্দেশ্যে প্রস্তুত করা হয়েছে।<br><br>

                                            জেড-লিউকনের বিশেষ উপাদানসমূহ<br>
                                            প্রতিটি ৫০০ মি.গ্রা. ট্যাবলেটে রয়েছে:<br>
                                            ✔️ শোধিত লৌহ<br>
                                            ✔️ শোধিত অভ্র<br>
                                            ✔️ শোধিত তাম্র<br>
                                            ✔️ শোধিত কড়ি<br>
                                            ✔️ শোধিত হরিতাল<br>
                                            প্রতিটি উপাদান ঐতিহ্যগতভাবে শরীরের শক্তি বৃদ্ধি, রক্তের গুণগত মান উন্নয়ন এবং নারীদের বিভিন্ন শারীরিক সমস্যায় সহায়ক হিসেবে ব্যবহৃত হয়ে আসছে।<br><br>

                                            জেড-লিউকন কারা সেবন করতে পারেন?<br>
                                            যেসব নারীরা ভুগছেন—<br>
                                            ✓ শ্বেতপ্রদর (সাদা স্রাব)<br>
                                            ✓ রক্তপ্রদর<br>
                                            ✓ জরায়ুর অস্বস্তি<br>
                                            ✓ দুর্গন্ধযুক্ত স্রাব<br>
                                            ✓ হলুদ, সবুজ বা অন্যান্য বর্ণের স্রাব<br>
                                            ✓ জরায়ুর প্রদাহজনিত সমস্যা<br>
                                            ✓ চুলকানি ও অস্বস্তি<br>
                                            ✓ দীর্ঘদিনের শারীরিক দুর্বলতা<br>
                                            ✓ ত্বকের মেছতা ও কালো দাগ<br>
                                            ✓ পুরাতন আমাশয়ের সমস্যা<br><br>

                                            কেন জেড-লিউকন সেবন করবেন?<br><br>

                                            ১. শ্বেতপ্রদর নিয়ন্ত্রণে সহায়ক<br>
                                            অতিরিক্ত সাদা স্রাব নারীদের দুর্বলতা, মাথা ঘোরা, কোমর ব্যথা এবং মানসিক অস্বস্তির কারণ হতে পারে। জেড-লিউকন এই সমস্যায় সহায়ক ভূমিকা রাখতে পারে।<br><br>

                                            ২. জরায়ুর স্বাস্থ্য রক্ষায় সহায়ক<br>
                                            জরায়ুর প্রদাহ, চুলকানি এবং অস্বাভাবিক স্রাবের কারণে অনেক নারী দীর্ঘদিন কষ্ট ভোগ করেন। জেড-লিউকন এসব সমস্যায় উপকারী হতে পারে।<br><br>

                                            ৩. নারীর আত্মবিশ্বাস ফিরিয়ে আনে<br>
                                            গোপন শারীরিক সমস্যার কারণে অনেক নারী আত্মবিশ্বাস হারিয়ে ফেলেন। নিয়মিত সেবনে স্বাভাবিক ও স্বস্তিদায়ক জীবনযাপনে সহায়তা করতে পারে।<br><br>

                                            ৪. ত্বকের সৌন্দর্য বৃদ্ধি<br>
                                            ত্বকের কালো দাগ, মেছতা এবং রুক্ষতা কমাতে সহায়ক ভূমিকা রাখতে পারে, ফলে ত্বকের স্বাভাবিক উজ্জ্বলতা বজায় রাখতে সাহায্য করে।<br><br>

                                            ৫. শারীরিক দুর্বলতা কমাতে সহায়ক<br>
                                            ঐতিহ্যগত উপাদানসমূহ শরীরের শক্তি ও কর্মক্ষমতা বৃদ্ধিতে সহায়ক হিসেবে বিবেচিত।<br><br>

                                            জেড-লিউকনের সম্ভাব্য উপকারিতা<br>
                                            ✅ শ্বেতপ্রদর নিয়ন্ত্রণে সহায়ক<br>
                                            ✅ জরায়ুর অস্বস্তি কমাতে সহায়ক<br>
                                            ✅ চুলকানি ও প্রদাহ হ্রাসে সহায়ক<br>
                                            ✅ বিভিন্ন বর্ণের স্রাব কমাতে সহায়ক<br>
                                            ✅ শারীরিক দুর্বলতা কমাতে সহায়ক<br>
                                            ✅ ত্বকের উজ্জ্বলতা বৃদ্ধিতে সহায়ক<br>
                                            ✅ পুরাতন আমাশয়ের সমস্যায় সহায়ক<br><br>

                                            অন্যান্য প্রডাক্টের তুলনায় জেড-লিউকনের বিশেষত্ব<br><br>

                                            বহুমুখী কার্যকারিতা<br>
                                            অনেক প্রডাক্ট শুধুমাত্র শ্বেতপ্রদরের জন্য ব্যবহৃত হলেও জেড-লিউকন একাধিক সমস্যায় সহায়ক হিসেবে ব্যবহৃত হয়।<br><br>

                                            ঐতিহ্যবাহী ফর্মুলেশন<br>
                                            দীর্ঘদিনের প্রচলিত ও পরিচিত উপাদানসমূহের সমন্বয়ে প্রস্তুত।<br><br>

                                            নারীদের জন্য বিশেষভাবে পরিকল্পিত<br>
                                            নারীর গোপন স্বাস্থ্য, জরায়ুর যত্ন এবং সামগ্রিক সুস্থতার বিষয়কে গুরুত্ব দিয়ে তৈরি।<br><br>

                                            সহজ সেবন পদ্ধতি<br>
                                            ট্যাবলেট আকারে হওয়ায় বহন ও সেবন করা সহজ।<br><br>

                                            সেবন বিধি<br>
                                            ১-২টি ট্যাবলেট সকালে ও রাতে আহারের পর সেবন করতে হবে।<br>
                                            অথবা<br>
                                            চিকিৎসকের পরামর্শ অনুযায়ী সেবন করুন।<br><br>

                                            সংরক্ষণ বিধি<br>
                                            ✔️ শুষ্ক ও ঠান্ডা স্থানে রাখুন।<br>
                                            ✔️ সরাসরি সূর্যালোক থেকে দূরে রাখুন।<br>
                                            ✔️ শিশুদের নাগালের বাইরে রাখুন।<br><br>

                                            সুস্থ নারী, সুখী পরিবার<br>
                                            নারীর সুস্থতাই পরিবারের শক্তি। শ্বেতপ্রদর, জরায়ুর অস্বস্তি ও নারীর অন্যান্য সাধারণ সমস্যায় সহায়ক সমাধান হিসেবে জেড-লিউকন হতে পারে আপনার বিশ্বস্ত সঙ্গী।<br>
                                            জেড-লিউকন — নারীর সুস্থতা, স্বস্তি ও আত্মবিশ্বাসের প্রতীক।

                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET['product']) && $_GET['product'] == 'zkua') { ?>
                                        <img src="images/custom/product/banner/zkua.jpeg" alt="" class="box-img" style="width: 100%;margin-bottom:20px">
                                        <div id="div11">
                                            ব্যথার স্থায়ী বিদায়, জয়েন্টের রাজকীয় পুনর্গঠন: Z-KUA<br><br>

                                            হাঁটু ব্যথা, বাতব্যথা, কোমর-মেরুদণ্ডের তীব্র কষ্ট আর জয়েন্টের অসহ্য অস্বস্তিতে কি আপনার জীবন থমকে গেছে? সাময়িক পেইনকিলার দিয়ে আর কতদিন?<br><br>

                                            শত বছরের বিশ্বস্ত আয়ুর্বেদিক জ্ঞানে সমৃদ্ধ ‘Z-KUA’ নিয়ে এলো স্থায়ী সমাধান। শোধিত কজ্জলী, অভ্র ও স্বর্ণের রাজকীয় এবং এলিট ফর্মুলায় তৈরি এই জয়েন্ট-কেয়ার সলিউশনটি কোনো প্রকার কেমিক্যাল ছাড়াই হাড়ের সংযোগস্থলের পিচ্ছিলতা (Synovial Fluid) বাড়িয়ে অস্থি-সন্ধি প্রাকৃতিকভাবে মজবুত করে।<br><br>

                                            ✅ কেন Z-KUA আপনার জন্য অনন্য?<br>
                                            ▪️আর্থ্রাইটিস ও বাতব্যথার স্থায়ী সমাধান: হাঁটু, কোমর, ঘাড় ও গোড়ালির দীর্ঘমেয়াদী জেদি বাতব্যথা এবং তীব্র প্রদাহ দূর করতে এটি অত্যন্ত কার্যকরী।<br><br>

                                            ▪️হাড়ের ক্ষয় ও ক্যালসিয়াম ঘাটতি পূরণ: হাড়ের ক্ষয় রোধ করে এবং প্রয়োজনীয় ক্যালসিয়ামের অভাব দূর করে শরীরকে ভেতর থেকে করে তোলে শক্তিশালী।<br><br>

                                            ▪️গেঁটে বাত (Gout) নিরাময়: জয়েন্টে ইউরিক এসিড জমার কারণে সৃষ্ট ফোলাভাব ও তীব্র কষ্ট কমিয়ে প্রাকৃতিকভাবে নমনীয়তা ফিরিয়ে আনে।<br><br>

                                            ▪️স্বাভাবিক গতিশীলতা (Mobility) পুনরুদ্ধার: মাংসপেশীর শক্তি ও জয়েন্টের কার্যক্ষমতা বাড়িয়ে দৈনন্দিন চলাফেরা এবং স্বাধীনভাবে কাজ করার গতি ফিরিয়ে দেয়।<br><br>

                                            ➡️ সেবনবিধি: প্রাপ্তবয়স্ক: সকালে ও বিকেলে আহারের পর ১-২টি ট্যাবলেট (অথবা রেজিস্টার্ড চিকিৎসকের পরামর্শ অনুযায়ী সেব্য)।<br><br>

                                            "সাময়িক আরাম নয়, বেছে নিন ভেতর থেকে স্থায়ী সুস্থতা। Z-KUA-এর স্পর্শে ফিরে পান আপনার গতিশীল ও প্রাণবন্ত জীবন।"

                                        </div>
                                    <?php } ?>


                                </div>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const firstVideo = document.getElementById('firstVideo');

            // পেজ লোড হওয়ার সাথে সাথে অটো চলবে
            firstVideo.play();

            // ক্লিক করলে pause/play টগল হবে
            firstVideo.addEventListener('click', function() {
                if (firstVideo.paused) {
                    firstVideo.play();
                } else {
                    firstVideo.pause();
                }
            });
        });
    </script>
    <script>
        const searchWrapper = document.querySelector('.search-wrapper');
        const notification = document.querySelector('.notification');
        const searchBtn = document.querySelector('.search-btn');

        searchBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            searchWrapper.classList.toggle('active');
            if (searchWrapper.classList.contains('active')) {
                searchWrapper.querySelector('.search-input').focus();
            }
        });

        notification.addEventListener('click', function(e) {
            e.stopPropagation();
            notification.style.display = 'none';
        });

        document.addEventListener('click', function() {
            searchWrapper.classList.remove('active');
        });
    </script>


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