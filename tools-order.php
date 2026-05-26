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
                        style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text">প্রোডাক্ট <br> ক্রয় বিক্রয় হিসাব</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/22.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <form action="" method="post">
                            <div class="date-wrapper2">
                                <h4 style="border:#12D584 1px solid">
                                    প্রোডাক্ট পরিমান-২ </h4>
                                <h4 style="border:#12D584 1px solid">
                                    প্রোডাক্ট মূল্য-</h4>
                            </div>

                            <div class="product-row">
                                <div class="product-image">
                                    <img src="images/custom/product/5.png" alt="">
                                </div>

                                <div class="product-info">
                                    <div class="product-title2">রিপ্রেজেন্টিভ আইটি কার্ড</div>
                                    <div class="product-price2">মূল্য-৭৫৫ টাকা</div>

                                    <!-- Qty + Add to cart row -->
                                    <div class="product-action">
                                        <div class="qty-box">
                                            <button type="button" class="qty-btn">-</button>
                                            <input type="number" value="1" min="1">
                                            <button type="button" class="qty-btn">+</button>
                                        </div>

                                        <button class="add-cart">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="product-row">
                                <div class="product-image">
                                    <img src="images/custom/product/6.png" alt="">
                                </div>

                                <div class="product-info">
                                    <div class="product-title2">রিপ্রেজেন্টিভ ভিজিটিং কার্ড</div>
                                    <div class="product-price2">মূল্য-৭৫৫ টাকা</div>

                                    <!-- Qty + Add to cart row -->
                                    <div class="product-action">
                                        <div class="qty-box">
                                            <button type="button" class="qty-btn">-</button>
                                            <input type="number" value="1" min="1">
                                            <button type="button" class="qty-btn">+</button>
                                        </div>

                                        <button class="add-cart">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="product-row">
                                <div class="product-image">
                                    <img src="images/custom/product/7.png" alt="">
                                </div>

                                <div class="product-info">
                                    <div class="product-title2">জেনি টি শার্ট </div>
                                    <div class="product-price2">মূল্য-৭৫৫ টাকা</div>

                                    <!-- Qty + Add to cart row -->
                                    <div class="product-action">
                                        <div class="qty-box">
                                            <button type="button" class="qty-btn">-</button>
                                            <input type="number" value="1" min="1">
                                            <button type="button" class="qty-btn">+</button>
                                        </div>

                                        <button class="add-cart">Add to Cart</button>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>
                            <div class="product-row">
                                <div class="product-image">
                                    <img src="images/custom/product/8.png" alt="">
                                </div>

                                <div class="product-info">
                                    <div class="product-title2">জেনি ক্যাপ </div>
                                    <div class="product-price2">মূল্য-১৪৯০ টাকা</div>

                                    <!-- Qty + Add to cart row -->
                                    <div class="product-action">
                                        <div class="qty-box">
                                            <button type="button" class="qty-btn">-</button>
                                            <input type="number" value="1" min="1">
                                            <button type="button" class="qty-btn">+</button>
                                        </div>

                                        <button class="add-cart">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="main_form_submit" class="custom-submit-button4"
                                style="color: #fff;">সাবমিট করুন</button>
                        </form>

                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>