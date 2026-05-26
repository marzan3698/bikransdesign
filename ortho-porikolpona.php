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
    <link href="css/buy_product.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/swipebox.css" />
    <link type="text/css" rel="stylesheet" href="css/animations.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">

    <style>
        * {
            font-family: 'SolaimanLipi', sans-serif !important;
        }
    </style>
</head>

<body id="mobile_wrap">
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

            <div data-page="index" class="page homepage" style="background-color: #fff !important;">
                <div class="page-content homepagecontent">

                    <nav class="main-nav" style="margin-top: 10px !important; width: 95%; margin: auto; border: 1px solid #0B2234; min-height:86vh;">
                        <div style="width: 95%;display:block;margin:auto;margin-top:10px">
                            <img src="images/custom/ortho-toiri.png" alt="" class="box-img" style="width: 100%;">
                            <div style="background: #0B2234; color: #fff; padding: 10px; font-size: 25px; position: relative; text-align: center;">
                                অর্থ তৈরির প্রাকৃতিক নিয়ম
                            </div>

                            <div id="div1" style="background: #97AACB; color: #fff; padding: 5px; font-size: 15px; margin-top: 8px; border-radius: 10px; position: relative; text-align: center;">
                                অর্থ- মানুষ যখন অর্থের কথা ভাবে
                                <span style="position: absolute; right: 15px;"><img src="images/custom/angle-right-solid.svg" alt="" width="8px"></span>
                            </div>

                            <div id="div2" style="background: #88E9C1; color: #fff; padding: 5px; font-size: 15px; margin-top: 8px; border-radius: 10px; position: relative; text-align: center;">
                                মানুষের জীবনেও সমৃদ্ধির সম্ভাবনা সব সময় থাকে
                                <span style="position: absolute; right: 15px;"><img src="images/custom/angle-right-solid.svg" alt="" width="8px"></span>
                            </div>

                            <div id="div11">
                                <h3 style="margin-top: 20px;font-weight:900">অর্থ- মানুষ যখন অর্থের কথা ভাবে</h3>
                                <p style="text-align: justify; font-size: 16px; line-height: 25px;">
                                    
                                    জীবন কখনোই একটি সরল সমীকরণ নয়। এটি কোনো নির্দিষ্ট নিয়মে বাঁধা গল্প নয়, যেখানে শুরু থেকে শেষ পর্যন্ত সবকিছু আগে থেকেই লেখা থাকে। জীবন হলো এক বিস্তৃত নদীর মতো—যে নদী কখনো শান্ত, কখনো উত্তাল, কখনো গভীর, আবার কখনো অগভীর। সেই নদীর স্রোতে ভেসেই মানুষ তার অস্তিত্বের গল্প লিখে চলে। প্রতিটি মানুষের জীবন যেন এক একটি অদেখা বই—যার পৃষ্ঠাগুলোতে লেখা থাকে সংগ্রাম, আশা, ভাঙন, পুনর্জন্ম আর নতুন করে দাঁড়িয়ে ওঠার কাহিনি। পৃথিবীর বিশাল জনসমুদ্রে আমরা সবাই পাশাপাশি হাঁটি, কিন্তু প্রত্যেকের ভেতরের পৃথিবী আলাদা। বাইরে থেকে কাউকে দেখলে মনে হতে পারে তার জীবন খুব সুন্দর, খুব সহজ, খুব সুশৃঙ্খল। কিন্তু সেই মানুষের ভেতরের অজানা গল্পটি আমরা দেখতে পাই না। আমরা তার হাসি দেখি, কিন্তু সেই হাসির আড়ালে লুকিয়ে থাকা কান্না দেখতে পাই না। আমরা তার সাফল্যের ছবি দেখি, কিন্তু সেই সাফল্যের পেছনে কত রাতের নির্ঘুম অশ্রু আছে—তা আমরা জানি না। মানুষের জীবন আসলে অনেকটা নীরব যুদ্ধের মতো। এই যুদ্ধের কোনো শব্দ নেই, কোনো শোরগোল নেই, কিন্তু এর তীব্রতা অসীম। প্রতিদিন মানুষ নিজের ভেতরের ভয়, হতাশা, ব্যর্থতা আর দায়িত্বের সঙ্গে লড়াই করে। কখনো সে জিতে যায়, কখনো হেরে যায়, আবার কখনো শুধু টিকে থাকে। কিন্তু এই টিকে থাকাটাই অনেক সময় সবচেয়ে বড় বিজয়। সমাজ আমাদের দেখে, কিন্তু আমাদের অনুভব করে না। সমাজ আমাদের মূল্যায়ন করে আমাদের বাহ্যিক অবস্থান দিয়ে—আমাদের পোশাক, আমাদের পরিচয়, আমাদের অর্থনৈতিক অবস্থান, আমাদের সামাজিক মর্যাদা দিয়ে। অথচ মানুষের আসল পরিচয় এসবের ভেতরে নয়। মানুষের আসল পরিচয় তার হৃদয়ের ভেতরে—তার মানবিকতা, তার ভালোবাসা, তার ত্যাগ আর তার দায়িত্ববোধে। প্রতিদিন অসংখ্য মানুষ পৃথিবীর সামনে শক্ত থাকার অভিনয় করে। তারা হয়তো ভেতরে ভেতরে ক্লান্ত, কিন্তু বাইরে থেকে দৃঢ় থাকার চেষ্টা করে। তারা হয়তো ভেঙে পড়েছে, কিন্তু তবুও হাসিমুখে বলে—“আমি ভালো আছি।” এই পৃথিবীতে “আমি ভালো আছি” বাক্যটি অনেক সময় সত্য নয়, বরং একটি ঢাল—যার আড়ালে মানুষ তার দুর্বলতা লুকিয়ে রাখে। ভোরের প্রথম আলো যখন আকাশে ছড়িয়ে পড়ে, তখন অসংখ্য মানুষ ঘর থেকে বের হয়ে যায় জীবিকার সন্ধানে। তাদের চোখে ঘুমের ক্লান্তি, কিন্তু মনে দায়িত্বের দৃঢ়তা। তারা জানে আজ তাদের থামার সুযোগ নেই। কারণ তাদের ঘরে অপেক্ষা করছে পরিবার, সন্তানের ভবিষ্যৎ, মায়ের ওষুধ, বাবার প্রয়োজন, সংসারের অসংখ্য ছোট বড় চাহিদা। একজন বাবা হয়তো সারাদিন পরিশ্রম করে রাতে ক্লান্ত শরীরে ঘরে ফেরে, কিন্তু সন্তানকে দেখে হাসে। একজন মা হয়তো নিজের ইচ্ছা ত্যাগ করে পরিবারের সুখের জন্য নীরবে ত্যাগ স্বীকার করে। এই ছোট ছোট ত্যাগগুলোই আসলে জীবনের সবচেয়ে বড় মহত্ত্ব। <br><br>
                                    
                                    জীবন আমাদের প্রতিনিয়ত শেখায়। কখনো কষ্ট দিয়ে, কখনো আনন্দ দিয়ে, কখনো হারিয়ে দিয়ে আবার কখনো নতুন করে কিছু দিয়ে। জীবনের এই ওঠানামার মাঝেই মানুষ ধীরে ধীরে উপলব্ধি করতে শেখে জীবন শুধু অর্থ উপার্জনের নাম নয়। জীবন হলো অর্থপূর্ণ হওয়ার নাম। একটা সময় মানুষ বুঝতে শুরু করে টাকা প্রয়োজন, কিন্তু টাকা সবকিছু নয়। অর্থ মানুষকে আরাম দিতে পারে, কিন্তু শান্তি দিতে পারে না। মানুষকে সম্মান দিতে পারে, কিন্তু ভালোবাসা কিনে দিতে পারে না। মানুষ শেষ পর্যন্ত মনে রাখে না আপনার ব্যাংকে কত টাকা ছিল। মানুষ মনে রাখে আপনি কেমন মানুষ ছিলেন। আপনার সততা, আপনার দায়িত্ববোধ, আপনার সহমর্মিতা—এসবই মানুষের হৃদয়ে জায়গা করে নেয়। কিন্তু আজকের পৃথিবীর বাস্তবতা অনেক কঠিন। আজ মানুষ দৌড়াচ্ছে—অবিরাম দৌড়াচ্ছে। সাফল্যের পেছনে, অর্থের পেছনে, স্বপ্নের পেছনে। কিন্তু এই দৌড়ের মাঝেই অনেক মানুষ নিজের ভেতরের শান্তিকে হারিয়ে ফেলছে। আজ অনেক মানুষ আছে যারা বাহ্যিকভাবে সফল, কিন্তু ভেতরে ভেতরে ক্লান্ত। অনেক মানুষ আছে যারা মানুষের ভিড়ে থেকেও একা হয়ে গেছে। অনেক পরিবার আছে যারা একই ছাদের নিচে থাকে, কিন্তু তাদের হৃদয়ের দূরত্ব দিন দিন বাড়ছে।বর্তমান সময়ের আরেকটি বড় বাস্তবতা হলো অর্থনৈতিক চাপ। আজ পৃথিবীর অসংখ্য পরিবার আর্থিক অনিশ্চয়তার মধ্যে দিন কাটাচ্ছে। মাসের শুরুতে যে হিসাব করা হয়, মাসের মাঝামাঝি এসে সেই হিসাব ভেঙে পড়ে। বাজারে গিয়ে দাম শুনে অনেক মানুষের বুক ধড়ফড় করে। বাবা-মা অনেক সময় নিজের প্রয়োজনকে চাপা দিয়ে সন্তানের প্রয়োজন পূরণ করে। একজন মা হয়তো নিজের নতুন কাপড় না কিনে সন্তানের স্কুল ফি দেয়। একজন বাবা হয়তো নিজের স্বপ্ন ত্যাগ করে সংসারের দায়িত্ব পালন করে। অনেক মানুষ রাতে ঘুমাতে পারে না—কারণ তার মাথায় ঘুরতে থাকে আগামী দিনের চিন্তা। কিভাবে সংসার চলবে, কিভাবে দায়িত্ব পূরণ হবে—এই প্রশ্নগুলো তাকে তাড়া করে। এই বাস্তবতার মাঝেও মানুষ বাঁচে, লড়ে, এগিয়ে যায়। কারণ মানুষের ভেতরে আছে এক অদম্য শক্তি—বেঁচে থাকার শক্তি। জীবনের সবচেয়ে বড় রহস্য হলো—মানুষ যতবার ভাঙে, ততবারই আবার গড়ে ওঠার ক্ষমতা রাখে। মানুষ যতবার অন্ধকারে পড়ে, ততবারই আলো খুঁজে পাওয়ার সম্ভাবনা থাকে। পরিবর্তনের শুরু হয় মানুষের ভেতর থেকে। যখন মানুষের মন পরিষ্কার হয়, তখন তার চিন্তা পরিষ্কার হয়। যখন মানুষের দৃষ্টি ইতিবাচক হয়, তখন সে প্রতিটি সমস্যার মাঝেও সুযোগ দেখতে পারে। মানুষের ভেতরের আত্মা যখন জেগে ওঠে, তখন তার জীবনের পথও আলোকিত হতে শুরু করে। তখন সে বুঝতে পারে জীবন শুধু টিকে থাকার জন্য নয়, জীবন এগিয়ে যাওয়ার জন্য।জীবনের পথ কখনোই একা চলার পথ নয়। মানুষ মানুষের জন্যই সবচেয়ে বড় শক্তি। একে অপরকে সহযোগিতা করা, একে অপরকে এগিয়ে নেওয়া— এই মানবিক সম্পর্কই জীবনের সৌন্দর্যকে পূর্ণতা দেয়। কারণ শেষ পর্যন্ত জীবন শুধু রুটি-রুজির গল্প নয়। জীবন হলো আশা, দায়িত্ব, ভালোবাসা এবং মানুষের ভেতরের অসীম সম্ভাবনার গল্প। যে মানুষ এই সত্যকে উপলব্ধি করতে পারে তার কাছে জীবন আর বোঝা মনে হয় না। জীবন তখন হয়ে ওঠে এক নতুন সম্ভাবনার দরজা যেখানে প্রতিটি দিন একটি নতুন শুরু, প্রতিটি অভিজ্ঞতা একটি নতুন শিক্ষা আর প্রতিটি মানুষ একটি নতুন আলোর উৎস।
                                </p>
                            </div><br>
                            <div id="div22" style="display: none;">
                                <h3 style="margin-top: 20px;font-weight:900">মানুষের জীবনেও সমৃদ্ধির সম্ভাবনা সব সময় থাকে</h3>
                                <p style="text-align: justify; font-size: 16px; line-height: 25px;">
                                    
                                    প্রকৃতিতে যেমন সূর্য প্রতিদিন ওঠে, নদী প্রবাহিত হয় গাছ বড় হয়—তেমনি মানুষের জীবনেও সমৃদ্ধির সম্ভাবনা সবসময় থাকে। কিন্তু সেই সম্ভাবনাকে বাস্তবে রূপ দিতে হলে মানুষকে প্রকৃতির নিয়ম বুঝতে হয়। তাকে বুঝতে হয় অর্থ শুধু সংগ্রহ করার বস্তু নয় অর্থ হলো সৃষ্টি করার ফল। যে মানুষ এই সত্যকে উপলব্ধি করতে পারে, তার কাছে অর্থ তৈরির পথ আর রহস্য থাকে না। তখন সে জানে—চিন্তার স্বচ্ছতা, পরিশ্রমের ধারাবাহিকতা, সততার ভিত্তি, মানুষের উপকার এবং ইতিবাচক মানসিকতার সমন্বয়ই প্রকৃত সমৃদ্ধির চাবিকাঠি।তাই পরিকল্পনা করুন, পরিশ্রম করুন, নিজের উপর অটুট বিশ্বাস রাখুন এবং লক্ষ্যের পথে দৃঢ়ভাবে এগিয়ে যান। একদিন আপনি নিজেই বিস্মিত হয়ে দেখবেন যে অর্থ একসময় আপনার কাছে কেবল স্বপ্ন ছিল সেটিই আপনার জীবনের বাস্তবতা হয়ে উঠেছে। আর তখন আপনার জীবনই হয়ে উঠবে একটি উদাহরণ যা প্রমাণ করে দেয় একটি চিরন্তন সত্য— অর্থের যাত্রা শুরু হয় মানুষের মনের ভেতর থেকে, সমৃদ্ধির বীজ জন্ম নেয় চিন্তার গভীরে। আর যে মানুষ সেই বীজ বপন করতে জানে তার জীবনেই একদিন সমৃদ্ধির বন জন্ম নেয়। কারণ প্রকৃতির একটি অদৃশ্য নিয়ম আছে যেখানে সৃষ্টি আছে, সেখানে সমৃদ্ধি আসে। যেখানে মূল্য আছে, সেখানে অর্থ আসে। আর যেখানে সৎ প্রচেষ্টা আছে সেখানে সফলতা একদিন না একদিন অবশ্যই জন্ম নেয়।
                                </p>
                            </div><br>



                        </div>
                      
                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
    $("#div1").on('click', function() {
        $("#div11").show();
        $("#div22").hide();
        $("#div33").hide();
    });
    $("#div2").on('click', function() {
        $("#div11").hide();
        $("#div22").show();
        $("#div33").hide();
    });
</script>