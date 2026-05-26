<?php
require_once('sadmin/config.php');
require_once('sadmin/function.php');
check_logged_in_user();
$user_id = $_SESSION['user_id'];
$member = QB::table('member')->where('id', $user_id)->first();
$member2 = QB::table('member')->where('id', $user_id)->first();
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
    <link href="css/buy_product.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/swipebox.css" />
    <link type="text/css" rel="stylesheet" href="css/animations.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://bikrans.com/bik.png">

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
            background-color: #12D584;
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