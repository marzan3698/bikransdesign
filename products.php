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

                .people-card{
                    display:flex;
                    flex-direction: column;
                    width:25%;
                    gap:5px;
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
                .people-arrow-right{
                    right: -5px;
                    position: absolute;
                }
                .people-arrow-left{
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
                        <div style="height: 950px;" class="swiper-container swiper-init" data-effect="slide"
                            data-parallax="true" data-pagination=".swiper-pagination" data-paginationClickable="true">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" data-bg="#0B2234">
                                    <!-- <img src="images/slider/slider5.jpeg" style="height: 63px;" alt="" title="" /> -->
                                </div>
                            </div>

                        </div>
                        <div class="video-slider-section">




                            <!-- text section -->
                            <div class="text-section">
                                <h4 style="color: #fff; border-bottom: 1px solid #fff; padding-bottom: 0px; text-align: center; width: 245px; display: block; margin: auto;margin-bottom:20px">
                                    যে সকল প্রোডাক্ট অবজারভেশনে রয়েছে
                                </h4>
                            </div>
                            <!-- Product Section - Start -->
                            <section class="product-section">
                                <div class="product-container">
                                    <div class="product-grid">
                                        <!-- Product 1: Z-DIA -->
                                        <div class="product-card">
                                            <img src="" class="product-image">
                                            <h3 class="product-title">গ্যানোডার্মা লুসিডাম</h3>
                                            <p class="price-info" style="font-size: 12px;">প্রোডাক্ট নামঃ নিউরো মাশুম</p>
                                            <p class="price-info" style="font-size: 14.3px;">প্রোডাক্ট মূল্যঃ 00 টাকা</p>
                                            <p class="price-info">প্রোডাক্ট কোডঃ BK.... 7</p>
                                            <a href="#" class="details-link">
                                                বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                    src="images/icons/arrow.png" alt="">
                                            </a>
                                        </div>

                                        <!-- Product 2: Sugar Balance -->
                                        <div class="product-card">
                                            <img src="" class="product-image">
                                            <h3 class="product-title">প্রাকৃতিক পুষ্টিসমৃদ্ধ</h3>
                                            <p class="price-info">প্রোডাক্টঃ মাশুম ক্যাপসুল</p>
                                            <p class="price-info" style="font-size: 14px;">প্রোডাক্ট মূল্যঃ 00 টাকা</p>
                                            <p class="price-info">প্রোডাক্ট কোডঃ BK.....8</p>
                                            <a href="#" class="details-link">
                                                বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                    src="images/icons/arrow.png" alt="">
                                            </a>
                                        </div>

                                        <!-- Product 3: Vita Force -->
                                        <div class="product-card">
                                            <img src="" class="product-image">
                                            <h3 class="product-title" style="font-size: 15.8px;">মন্মথাভ্র রস আয়ুর্বেদিক</h3>
                                            <p class="price-info">প্রোডাক্ট নামঃ জেড-পি-৩৫</p>
                                            <p class="price-info" style="font-size: 15px;">প্রোডাক্ট মূল্যঃ 00 টাকা</p>
                                            <p class="price-info" style="font-size: 14px;">প্রোডাক্ট কোডঃ BK.....9</p>
                                            <a href="#" class="details-link">
                                                বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                    src="images/icons/arrow.png" alt="">
                                            </a>
                                        </div>

                                        <!-- Product 4: Leucon -->
                                        <div class="product-card">
                                            <img src="" class="product-image">
                                            <h3 class="product-title" style="font-size: 13px;">ভিটামিন আয়রন ক্যাসিয়াম</h3>
                                            <p class="price-info" style="font-size: 12px;">প্রোডাক্টঃ জেড এক্স - ওয়াই</p>
                                            <p class="price-info" style="font-size: 14px;">প্রোডাক্ট মূল্যঃ 00 টাকা</p>
                                            <p class="price-info" style="font-size: 12px;">প্রোডাক্ট কোডঃ BK.....10</p>
                                                <a href="#" class="details-link">
                                                    বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                        src="images/icons/arrow.png" alt="">
                                                </a>
                                        </div>
                                        <!-- 5 -->
                                        <div class="product-card">
                                            <img src="" class="product-image">
                                            <h3 class="product-title" style="font-size: 15px;">আয়ুর্বেদিক হেয়ার অয়েল</h3>
                                            <p class="price-info" style="font-size: 12px;">প্রোডাক্ট মমতাজ হেয়ার অয়েল</p>
                                            <p class="price-info" style="font-size: 13px; letter-spacing: 1.5px;">প্রোডাক্ট মূল্যঃ 00 টাকা</p>
                                            <p class="price-info" style="font-size:13px;">প্রোডাক্ট কোডঃ BK.....11</p>
                                            <a href="#" class="details-link">
                                                বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                    src="images/icons/arrow.png" alt="">
                                            </a>
                                        </div>
                                        <!-- 6 -->
                                        <div class="product-card">
                                            <img src="" class="product-image">
                                            <h3 class="product-title">পাইলস কেয়ার প্লাস</h3>
                                            <p class="price-info" style="font-size: 16px;">প্রোডাক্টঃ..............</p>
                                            <p class="price-info" style="font-size: 14px;">প্রোডাক্ট মূল্যঃ 00 টাকা</p>
                                            <p class="price-info" style="font-size: 12px;">প্রোডাক্ট কোডঃ BK.....12</p>
                                            <a href="#" class="details-link">
                                                বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                    src="images/icons/arrow.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Product Section - End -->


                        
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