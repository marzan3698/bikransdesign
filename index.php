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
    <link rel="apple-touch-icon" href="https://bikrans.com/bik.png" />
    <link href="https://bikrans.com/bik.png" media="(device-width: 320px)"
        rel="apple-touch-startup-image">
    <link href="https://bikrans.com/bik.png"
        media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/framework7.css">
    <link rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="css/swipebox.css" />
    <link type="text/css" rel="stylesheet" href="css/animations.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://bikrans.com/bik.png">
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
    overflow: hidden;
}

               .people-slider-container {
    width: 100%;
    overflow: hidden;
}

                .people-slider {
    display: flex;
    width: max-content;
    animation: marqueeScroll 40s linear infinite;
}

.people-slider:hover {
    animation-play-state: paused;
}
@keyframes marqueeScroll {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.people-card {
    display: flex;
    flex-direction: column;
    width: 120px;
    min-width: 120px;
    gap: 5px;
    margin-right: 10px;
}

.people-card img {
    width: 100%;
    height: 100px;
    display: block;
    border: 1px solid #12D584;
    padding: 3px;
    object-fit: cover;
    box-sizing: border-box;
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
                    font-size: 15px;
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

                <div data-page="index" class="page" style="background-color:#052135;">
                    <div class="page-content homepagecontent"
                        style="overflow-x: hidden; overflow-y:auto; margin-right:2px;">

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
                                <a href="javascript::void(0)" onclick="window.location.href='products.php'">
                                    <span style="color: #ffff;  font-size: 13px;">Product</span>
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
                                <!-- <button class="notification"></button> -->

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
                        <div class="swiper-container swiper-init" data-effect="slide" data-parallax="true"
                            data-pagination=".swiper-pagination" data-paginationClickable="true">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" data-bg="#0B2234">
                                    <!-- <img src="images/slider/slider5.jpeg" style="height: 63px;" alt="" title="" /> -->
                                </div>
                            </div>
                        </div>
                        <div class="video-slider-section">
                            <style>
                                .marquee {
                                    width: 100%;
                                    overflow: hidden;
                                    background: #fff;
                                    padding: 10px 0;
                                }

                                .marquee-content {
                                    display: flex;
                                    width: max-content;
                                    animation: scroll 20s linear infinite;
                                    gap: 0; /* important */
                                }


                                .marquee-content img {
                                    width: 160px;
                                    height: 150px;
                                    flex-shrink: 0;
                                    display: block; /* গুরুত্বপূর্ণ */
                                    margin: 0;
                                    padding: 0;
                                }

                                /* smooth infinite scroll */
                                @keyframes scroll {
                                    0% {
                                        transform: translateX(0);
                                    }
                                    100% {
                                        transform: translateX(-50%);
                                    }
                                }
                            </style>
                            <div class="marquee">
                                <div class="marquee-content">
                                    <!-- original -->
                                    <img src="images/custom/home2/1.svg">
                                    <img src="images/custom/home2/2.svg">
                                    <img src="images/custom/home2/3.svg">
                                    <img src="images/custom/home2/4.svg">
                                    <img src="images/custom/home2/5.svg">
                                    <img src="images/custom/home2/6.svg">
                                    <!-- <img src="images/custom/home2/7.svg"> -->
                                    <!-- <img src="images/custom/home2/8.svg"> -->
                                    <img src="images/custom/home2/9.svg">

                                    <!-- duplicate for seamless loop -->
                                    <img src="images/custom/home2/1.svg">
                                    <img src="images/custom/home2/2.svg">
                                    <img src="images/custom/home2/3.svg">
                                    <img src="images/custom/home2/4.svg">
                                    <img src="images/custom/home2/5.svg">
                                    <img src="images/custom/home2/6.svg">
                                    <!-- <img src="images/custom/home2/7.svg"> -->
                                    <!-- <img src="images/custom/home2/8.svg"> -->
                                    <img src="images/custom/home2/9.svg">
                                </div>
                            </div>
                            <!-- <div class="slider-container">
                                <div class="video-wrapper" id="videoWrapper">

                                    <div class="video-slide">
                                        <video id="firstVideo" src="video/home-video.mp4" muted loop playsinline>
                                        </video>
                                    </div>
                                    <div class="video-slide">
                                        <video src="video/home-video2.mp4" controls playsinline autoplay></video>
                                    </div>
                                    <div class="video-slide">
                                        <video src="video/home-video2.mp4" controls playsinline autoplay></video>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="slider-dots">
                                <span class="dot active" onclick="goToSlide(0)"></span>
                                <span class="dot" onclick="goToSlide(1)" style="display: none;"></span>
                                <span class="dot" onclick="goToSlide(2)"></span>
                            </div> -->
                            <div class="live-ticker" style="margin-left: -1.8%;">
                                <img src="images/custom/62.png" alt="LIVE" class="live-icon">
                                <img src="images/custom/63.png" alt="LIVE" class="live-icon">
                                <img src="images/custom/64.png" alt="LIVE" class="live-icon">
                                <img src="images/custom/65.png" alt="LIVE" class="live-icon">
                                <img src="images/icons/live.png" alt="LIVE" class="live-icon"
                                    style="height: 40px; width: auto;">
                                <div class="ticker-text">
                                    <span>সর্বশেষ আপডেট পেতে বিক্রান্স বিজনেসের সাথে থাকুন</span>
                                </div>
                            </div>
                            <section class="info-section">
                                <div class="info-container">
                                    <div class="info-layout">
                                        <div class="info-menu">
                                            <a href="#" class="info-menu-item">
                                                <div class="info-icon-wrapper" style="margin-left: -0.9%;">
                                                    <img src="images/custom/1010.svg" alt="Icon 1">
                                                </div>
                                                <span class="info-menu-text">জীবন কর্ম ভবিষ্যতের চিন্তা</span>

                                                <div class="info-icon-arrow" onclick="window.location.href='jibon-kormo-vobissot.php'">
                                                    <img src="images/icons/arrow.png" alt="Icon 1">
                                                </div>
                                            </a>
                                            <div style="width: 98.6%;height:1px;background-color: #12D584;"></div>

                                            <a href="#" class="info-menu-item">
                                                <div class="info-icon-wrapper" style="margin-left: -1.5%;">
                                                    <img src="images/custom/22.svg" alt="Icon 2">
                                                </div>
                                                <span class="info-menu-text">বিক্রান্স বিজনেস পরিকল্পনা</span>
                                                <div class="info-icon-arrow" onclick="window.location.href='bikrans-business-porikolpona.php'">
                                                    <img src="images/icons/arrow.png" alt="Icon 1">
                                                </div>
                                            </a>
                                            <div style="width: 98.6%;height:1px;background-color: #12D584;"></div>

                                            <a href="#" class="info-menu-item">
                                                <div class="info-icon-wrapper" style="margin-left: -1.5%;">
                                                    <img src="images/custom/33.svg" alt="Icon 3">
                                                </div>
                                                <span class="info-menu-text">অর্থ তৈরীর প্রাকৃতিক নিয়ম</span>
                                                <div class="info-icon-arrow" onclick="window.location.href='ortho-porikolpona.php'">
                                                    <img src="images/icons/arrow.png" alt="Icon 1">
                                                </div>
                                            </a>
                                        </div>

                                        <div class="info-card">
                                            <div class="info-card-image">
                                                <img id="sliderImage" src="images/custom/44.svg" alt="স্লাইড"
                                                    style="margin-top: 18.5px;">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <p class="info-banner-text" style="padding: 5px 0;">প্রকৃতপক্ষে যাঁরা 'অর্থ সচেতন' থাকেন তাঁরাই ধনী হয়ে ওঠেন</p>
                           <style>
                                .section-aaa .container2 {
                                    display: flex;  
                                    flex-direction: row;
                                    flex-wrap: nowrap;
                                    justify-content: center;
                                    align-items: flex-start;
                                    gap: 10px;
                                    margin-top: 20px;
                                }

                                .section-aaa .item1 {
                                    width: 165px;
                                }

                                .section-aaa .item2 {
                                    width: 100px;
                                }

                                .section-aaa .item3 {
                                    width: 100px;
                                }
                                </style>

                                <div class="section-aaa">
                                    <div class="container2">
                                        <div class="item1">
                                            <img src="images/custom/56.svg" style="width: 100%;">
                                            <p style="color: #fff;text-align:justify;margin:0 4px">প্রত্যেকটি মানুষই যখন সে (জীবনে) অর্থের মূল্য বোঝার বয়সে উপনীত হয়, (তখনই) সে এটা (অর্থ) পেতে চায়। কিন্তু চাইলেই তো আর ধনী হওয়া যায় না। যে পদ্ধতিতে ধনী হওয়ার আকাঙ্ক্ষা
                                                <a href="#" style="color:#12D584; text-decoration: none; font-size: 13px;display:inline">বিস্তারিত</a>
                                            </p>
                                        </div>
                                        <div class="item2">
                                            <div class="img-wrapper">
                                                <img src="images/custom/66.svg" alt="" class="technology-img">
                                                <h5 class="tech-title">এআই ইন্টেলিজেন্স</h5>
                                            </div>
                                            <p style="text-align: justify; color:#fff;margin:0 4px">
                                                আজকের ডিজিটাল যুগে Artificial Intelligence (AI) কেবল একটি প্রযুক্তি নয়। এটি আমাদের ব্যবসা, জীবন ও সম্ভাবনার দিক পরিবর্তন করে দেওয়ার এক শক্তিশালী হাতিয়ার।
                                                <a href="#" style="color:#12D584; text-decoration: none; font-size: 13px;display:inline">বিস্তারিত</a>
                                            </p>
                                        </div>
                                        <div class="item3">
                                            <div class="img-wrapper">
                                                <img src="images/custom/55.svg" alt="" class="technology-img">
                                                <h5 class="tech-title">চিন্তায় ধনী হোন</h5>
                                            </div>
                                            <p style="text-align: justify; color:#fff;margin:0 4px">
                                                সত্যিই, 'চিন্তা' এমন এক শক্তিশালী বিষয়, যখন তারা নির্দিষ্ট উদ্দেশ্য, অধ্যবসায় এবং তীব্র আকাঙ্ক্ষার সাথে সংযুক্ত হয়, তখন তা ধন-সম্পদ বা অন্য কোনো বিষয়ে পরিণত হয়।
                                                <a href="#" style="color:#12D584; text-decoration: none; font-size: 13px;display:inline">বিস্তারিত</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            
                            <!-- text section -->
                            <div class="text-section">
                                <h2>বিজনেস টিম থেকে আয়</h2>
                                <div style="width: 213px;height:1px;background:#12D584;display:block;margin:auto;margin-bottom: 20px"></div>
                                <p style="color: #ffff;font-size:12.2px;margin-bottom:20px">
                                    পৃথিবীর ইতিহাসে সফল ব্যবসায়ীরা মূলত তারাই, যারা অন্যের মেধা, দক্ষতা ও শ্রমকে সঠিকভাবে সমন্বয় করে একটি শক্তিশালী টিম গড়ে তুলতে সক্ষম হয়েছেন। কার্যকর টিমওয়ার্কের মাধ্যমে কাজের গতি বৃদ্ধি পায় এবং ব্যবসার পরিধি বিস্তৃত হয়।এই ব্যবসায় টিম গঠনের মাধ্যমেই আর্থিক উন্নয়নকে সহজ ও বাস্তবসম্মত করা সম্ভব। শক্তিশালী টিমওয়ার্কের ফলে নিয়মিত আয়ের একটি স্থিতিশীল ব্যবস্থা তৈরি হয়। এমনকি একজন ব্যক্তি সরাসরি কাজ থেকে অবসর নিলেও আয়ের প্রবাহ পুরোপুরি বন্ধ হয় না, কারণ তার গড়ে তোলা টিম ব্যবসার কার্যক্রম চালিয়ে যেতে থাকে।</p>
                            </div>
                            <!--people slider  -->

                            <div class="people-slider-wrapper">
                                <div class="people-slider-container">
                                    <div class="people-slider" id="peopleSlider">
                                        <?php
                                        $withdrawList = "SELECT m.name, m.image, w.user_id, SUM(w.amount) AS total_amount
                                                        FROM withdraw_request w
                                                        JOIN member m ON m.id = w.user_id
                                                        GROUP BY w.user_id
                                                        ORDER BY total_amount DESC
                                                        LIMIT 20";

                                        $result = $mysqli->query($withdrawList);
                                        $cards = [];

                                        if ($result && $result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $referCount = QB::table('member')->where('refer_id', $row['user_id'])->count();

                                                $podobi = '';
                                                if ($referCount >= 1 && $referCount <= 24) {
                                                    $podobi = 'বীজ এলার্ট';
                                                } elseif ($referCount >= 25) {
                                                    $podobi = 'বীজ মাস্টার';
                                                }

                                                if ($row['image'] == null || $row['image'] == '') {
                                                    $row['image'] = 'images/avatar.jpg';
                                                }

                                                $cards[] = [
                                                    'image'        => $row['image'],
                                                    'name'         => $row['name'],
                                                    'total_amount' => $row['total_amount'],
                                                    'podobi'       => $podobi,
                                                ];
                                            }
                                        }

                                        // Seamless loop এর জন্য cards দুইবার print করুন
                                        $allCards = array_merge($cards, $cards);

                                        foreach ($allCards as $card) {
                                            echo '
                                            <div class="people-card">
                                            '; ?>
                                            
                                                <div style="width:100%; height:110px; overflow:hidden; border-radius:5px;">
    <img 
        src="<?php echo htmlspecialchars($card['image']) ?>" 
        alt="Person"
        style="
            width:100%;
            height:100%;
            object-fit:contain;
            display:block;
            background:#fff;
        "
    />
</div>
                                                <?php 
                                                
                                                echo '
                                                
                                                <div class="people-card-info">
                                                    <div class="people-card-title">' . htmlspecialchars($card['name']) . '</div>
                                                    <div class="people-card-subtitle">মোট আয়: ' . htmlspecialchars($card['total_amount']) . '</div>
                                                    <div class="people-card-subtitle">পদবি: ' . htmlspecialchars($card['podobi']) . '</div>
                                                </div>
                                            </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- text section -->
                            <div class="text-section">
                                <h3>ভালো থাকার এক অন্তর্গত অনুভূতি</h3>
                                <div style="width: 238px;height:1px;background:#12D584;display:block;margin:auto;margin-bottom: 20px"></div>                                
                                <p style="color: #ffff;font-size:12.2px;margin-bottom:20px">
                                    সুস্থ থাকতে চাই আমরা সবাই। কারণ সুস্থতাই স্বাভাবিক আর অসুস্থতা অস্বাভাবিক। আর সুস্বাস্থ্য বলতে কেবল শারীরিক সুস্থতাকেই বোঝায় না; বরং শরীর-মন সব মিলেই আমাদের সত্যিকারের সুস্বাস্থ্য। এ কারণেই স্বাস্থ্যের সংজ্ঞা দিতে গিয়ে বিশেষজ্ঞরা শারীরিক সুস্থতার পাশাপাশি মানসিক, আত্মিক ও সামাজিক স্বাস্থ্যের কথাও উল্লেখ করেছেন।</p>
                            </div>
                            <!-- Product Section - Start -->
                            <section class="product-section">
                                <div class="product-container">
                                    <div class="product-grid">
                                        <!-- Product 1: Z-DIA -->
                                        <div class="product-card">
                                            <img src="images/custom/product/14.png" alt="Sugar Balance"
                                                class="product-image">
                                            <h3 class="product-title">ডায়াবেটিস নিরাময়</h3>
                                            <p class="price-info" style="font-size: 11.5px;">প্রোডাক্ট নাম:&nbsp; জেড ডায়া</p>
                                            <p class="price-info" style="font-size: 11px;">প্রোডাক্ট মূল্য: 1155 টাকা</p>
                                            <p class="price-info" style="font-size: 10.8px;">প্রোডাক্ট কোডঃ BKJD01</p>
                                            <a href="product-details2.php" class="details-link" >
                                                বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                    src="images/icons/arrow.png" alt="">
                                            </a>
                                        </div>

                                        <!-- Product 2: Sugar Balance -->
                                        <div class="product-card">
                                            <img src="images/custom/product/Sugar Balance.png" alt="Sugar Balance"
                                                class="product-image">
                                            <h3 class="product-title">ডায়াবেটিস নিরাময়</h3>
                                            <p class="price-info" style="font-size: 10px;">প্রোডাক্ট নাম:&nbsp; সুগার ব্যালেন্স</p>
                                            <p class="price-info" style="font-size: 11px;">প্রোডাক্ট মূল্য: 1155 টাকা</p>
                                            <p class="price-info" style="font-size: 10.8px;">প্রোডাক্ট কোডঃ BKSB02</p>
                                            <a href="product-details3.php" class="details-link" >
                                                বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                    src="images/icons/arrow.png" alt="">
                                            </a>
                                        </div>

                                        <!-- Product 3: Vita Force -->
                                        <div class="product-card">
                                            <img src="images/custom/product/Vita force.png" alt="Sugar Balance"
                                                class="product-image">
                                            <h3 class="product-title" style="font-size: 17px;">ন্যাচারাল সাপোর্ট</h3>
                                            <p class="price-info" style="font-size: 11.5px;">প্রোডাক্ট নাম: ভিটা ফোর্স</p>
                                            <p class="price-info" style="font-size: 10.5px;">প্রোডাক্ট মূল্য: 1490 টাকা</p>
                                            <p class="price-info" style="font-size: 10.8px;">প্রোডাক্ট কোডঃ BKBF03</p>
                                            <a href="#" class="details-link" >
                                                বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                    src="images/icons/arrow.png" alt="">
                                            </a>
                                        </div>

                                        <!-- Product 4: Leucon -->
                                        <div class="product-card">
                                            <img src="images/custom/product/15.png" alt="Sugar Balance"
                                                class="product-image">
                                            <h3 class="product-title" style="font-size: 17px;">নারীদের সুস্থতায়</h3>
                                                <p class="price-info" style="font-size: 10.4px;">প্রোডাক্ট নাম: জেড লিউকন</p>
                                                <p class="price-info" style="font-size: 10.5px;">প্রোডাক্ট মূল্য: 1155 টাকা</p>
                                                <p class="price-info" style="font-size: 10.8px;">প্রোডাক্ট কোডঃ BKLK04</p>
                                                <a href="#" class="details-link">
                                                    বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                        src="images/icons/arrow.png" alt="">
                                                </a>
                                        </div>
                                        <!-- 5 -->
                                        <div class="product-card">
                                            <img src="images/custom/product/Spirliuna.png" alt="Sugar Balance"
                                                class="product-image">
                                            <h3 class="product-title" style="font-size: 17.5px;">উচ্চ পুষ্টিকর ফুড</h3>
                                            <p class="price-info" style="font-size: 12px;">প্রোডাক্ট নাম:স্পিরুলিনা</p>
                                            <p class="price-info" style="font-size: 11px;">প্রোডাক্ট মূল্য: 1155 টাকা</p>
                                            <p class="price-info" style="font-size: 10.5px;">প্রোডাক্ট কোডঃ BKSM05</p>
                                            <a href="#" class="details-link" >
                                                বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                    src="images/icons/arrow.png" alt="">
                                            </a>
                                        </div>
                                        <!-- 6 -->
                                        <div class="product-card">
                                            <img src="images/custom/product/16.png" alt="Sugar Balance"
                                                class="product-image">
                                            <h3 class="product-title" style="font-size: 17px;">ন্যাচারাল সাপোর্ট</h3>
                                            <p class="price-info" style="font-size: 11px;">প্রোডাক্ট নাম: কামিস্কা প্লাস</p>
                                            <p class="price-info" style="font-size: 11px;">প্রোডাক্ট মূল্য: 2499 টাকা</p>
                                            <p class="price-info" style="font-size: 10.8px;">প্রোডাক্ট কোডঃ BKBF06</p>
                                            <a href="#" class="details-link" >
                                                বিস্তারিত <img style="height:14px; width:14px; object-fit:contain"
                                                    src="images/icons/arrow.png" alt="">
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <!-- Product Section - End -->

                            <!-- text section -->
                            <div class="text-section" style="text-align: center; padding:10px;">
                                <a href="products.php" class="all-product-link" style="color: #fff;">
                                    অনান্য প্রোডাক্ট দেখতে ক্লিক করুন
                                </a>
                            </div>
                            <img src="images/custom/ssl666.jpeg" alt="" style="width: 100%;display:block;margin:auto;border-radius: 10px;">
                            <div class="text-section" style="text-align: center; padding-bottom:60px">
                                <a href="javascript::void(0)" class="all-product-link">
                                    <img src="images/custom/65.png" alt="" width="20px"> &nbsp;যোগাযোগ
                                </a>
                                <p style="display: block; text-align: center; font-size: 14px;">ওয়েব - www.bikrans.com ইমেইল- bikrans@gmail.com</p>
                            </div>
                        </div>
                        <div style="background: #12D584; position: fixed; bottom: 0; width: 100%; padding: 10px; display: block;z-index:9999;text-align:center">
                            © <?= date('Y') ?> bikransBusiness. All rights reserved
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

    // Drag / Swipe variables
    let isDragging = false;
    let startX = 0;
    let currentX = 0;
    let diffX = 0;

    function updatePeopleArrows() {
        if (peoplePrevBtn) {
            currentPeopleSlide === 0
                ? peoplePrevBtn.classList.add('hidden')
                : peoplePrevBtn.classList.remove('hidden');
        }
        if (peopleNextBtn) {
            currentPeopleSlide === totalPeopleSlides - 1
                ? peopleNextBtn.classList.add('hidden')
                : peopleNextBtn.classList.remove('hidden');
        }
    }

    function goToSlide(index) {
        if (index < 0) index = 0;
        if (index >= totalPeopleSlides) index = totalPeopleSlides - 1;
        currentPeopleSlide = index;
        peopleSlider.style.transition = 'transform 0.4s ease';
        peopleSlider.style.transform = `translateX(-${currentPeopleSlide * 100}%)`;
        updatePeopleArrows();
    }

    function movePeopleSlide(direction) {
        goToSlide(currentPeopleSlide + direction);
    }

    // ─── Mouse Events (Desktop Drag) ───────────────────────────
    peopleSlider.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.clientX;
        peopleSlider.style.transition = 'none';
        peopleSlider.style.cursor = 'grabbing';
    });

    document.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        diffX = e.clientX - startX;
        const baseOffset = currentPeopleSlide * 100;
        const dragPercent = (diffX / peopleSlider.offsetWidth) * 100;
        peopleSlider.style.transform = `translateX(calc(-${baseOffset}% + ${diffX}px))`;
    });

    document.addEventListener('mouseup', () => {
        if (!isDragging) return;
        isDragging = false;
        peopleSlider.style.cursor = 'grab';
        const threshold = peopleSlider.offsetWidth * 0.2;
        if (diffX < -threshold) {
            goToSlide(currentPeopleSlide + 1);
        } else if (diffX > threshold) {
            goToSlide(currentPeopleSlide - 1);
        } else {
            goToSlide(currentPeopleSlide); // snap back
        }
        diffX = 0;
    });

    // ─── Touch Events (Mobile Swipe) ───────────────────────────
    peopleSlider.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        peopleSlider.style.transition = 'none';
    }, { passive: true });

    peopleSlider.addEventListener('touchmove', (e) => {
        diffX = e.touches[0].clientX - startX;
        const baseOffset = currentPeopleSlide * 100;
        peopleSlider.style.transform = `translateX(calc(-${baseOffset}% + ${diffX}px))`;
    }, { passive: true });

    peopleSlider.addEventListener('touchend', () => {
        const threshold = peopleSlider.offsetWidth * 0.2;
        if (diffX < -threshold) {
            goToSlide(currentPeopleSlide + 1);
        } else if (diffX > threshold) {
            goToSlide(currentPeopleSlide - 1);
        } else {
            goToSlide(currentPeopleSlide);
        }
        diffX = 0;
    });

    // ─── Cursor style ───────────────────────────────────────────
    peopleSlider.style.cursor = 'grab';

    // ─── Initialize ─────────────────────────────────────────────
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
    <script>
(function () {
    const slider = document.getElementById('peopleSlider');
    const slides = slider.querySelectorAll('.people-slide');
    const total = slides.length;
    let current = 0;
    let autoSlideTimer = null;

    // Touch/swipe variables
    let touchStartX = 0;
    let touchEndX = 0;
    let isDragging = false;

    function goToSlide(index) {
        current = (index + total) % total;
        slider.style.transform = `translateX(-${current * 100}%)`;
    }

    function nextSlide() {
        goToSlide(current + 1);
    }

    function prevSlide() {
        goToSlide(current - 1);
    }

   

    function stopAutoSlide() {
        if (autoSlideTimer) {
            clearInterval(autoSlideTimer);
            autoSlideTimer = null;
        }
    }

    // Touch events (mobile swipe)
    slider.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
        isDragging = true;
        stopAutoSlide();
    }, { passive: true });

    slider.addEventListener('touchend', (e) => {
        if (!isDragging) return;
        touchEndX = e.changedTouches[0].screenX;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > 50) {
            diff > 0 ? nextSlide() : prevSlide();
        }

        isDragging = false;
    }, { passive: true });

    // Mouse drag (desktop)
    slider.addEventListener('mousedown', (e) => {
        touchStartX = e.screenX;
        isDragging = true;
        stopAutoSlide();
    });

    window.addEventListener('mouseup', (e) => {
        if (!isDragging) return;
        touchEndX = e.screenX;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > 50) {
            diff > 0 ? nextSlide() : prevSlide();
        }

        isDragging = false;
    });

    // Start auto sliding
})();
</script>

    <?php require_once('footer.php'); ?>