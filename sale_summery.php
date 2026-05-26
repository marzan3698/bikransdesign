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
            <?php
            if (!isset($_GET['sale_id'])) {
                echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ বিক্রয় আইডি পাওয়া যায়নি।</div>";
                die();
            }
            
            $sale = QB::table('product_sale')->where('id', $_GET['sale_id'])->first();
            if (!$sale) {
                echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ বিক্রয় পাওয়া যায়নি।</div>";
                die();
            }
            ?>
            <div data-page="index" class="page homepage" style="background-color: #EEEEEE !important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222; padding-top:7px; min-height:82vh; ">

                        <div class="text-box">
                            <h4
                                style="color:#ffff;background-color:#0C4AA0; padding:15px; text-align:right; font-weight:normal;font-size:15px;">
                               ইনভয়েস নং- #<?php echo $sale->id; ?>
                            </h4>
                        </div>
                        <div style="display:flex; " class="text-box">


                            <!-- Right Box  -->
                            <div
                                style="width:100%; display:flex; justify-content:space-between; padding:10px 3px; box-sizing:border-box; gap:5px; background-color:white">

                                <!-- Right Child 1 (50%) -->
                                <div style="
                                    width:50%;
                                    display:flex;
                                    flex-direction:column;
                                    gap:0px;
                                    padding-left:0px;
                                    align-items:end;
                                    ">
                                    <?php
                                    $customer = QB::table('member')->where('id', $sale->user_id)->first();
                                    ?>
                                    <span class="span-text" style="font-size: 25px !important;">বিক্রান্স</span>
                                </div>

                                <!-- Middle Divider -->
                                <div style="width:1.7px; background-color:blue; height:auto;"></div>

                                <!-- Right Child 2 (50%) -->
                                <div style="
                                    width:50%;
                                    display:flex;
                                    flex-direction:column;
                                    gap:0px;
                                    padding-left:0px;
                                    ">
                                    <?php
                                        $user = QB::table('member')->where('id', $sale->user_id)->first();   
                                    ?>
                                    <span class="span-text">বিক্রেতার নাম <?php echo $user->name; ?></span>
                                    <span class="span-text">বিক্রেতার ফোন-<?php echo $user->phone; ?></span>
                                </div>

                            </div>

                        </div>
                        <div style="display:flex; " class="text-box">


                            <!-- Right Box  -->
                            <div
                                style="width:100%; display:flex; justify-content:space-between; padding:10px 3px; box-sizing:border-box; gap:5px; background-color:white">

                                <!-- Right Child 1 (50%) -->
                                <div style="
                                    width:50%;
                                    display:flex;
                                    flex-direction:column;
                                    gap:0px;
                                    padding-left:0px;
                                    align-items:end;
                                    ">
                                    <?php
                                    $customer = QB::table('member')->where('id', $sale->user_id)->first();
                                    ?>
                                    <span class="span-text">নং #<?php echo $sale->id; ?></span>
                                    <span class="span-text">ক্রেতার নাম <?php echo $sale->customer_name ?></span>
                                    <span class="span-text">ক্রেতার ফোন <?php echo $sale->customer_phone ?: 'N/A'; ?></span>
                                </div>

                                <!-- Middle Divider -->
                                <div style="width:1.7px; background-color:blue; height:auto;"></div>

                                <!-- Right Child 2 (50%) -->
                                <div style="
                                    width:50%;
                                    display:flex;
                                    flex-direction:column;
                                    gap:0px;
                                    padding-left:0px;
                                    ">

                                    <span class="span-text">প্রোডাক্ট ক্রয় তারিখ <?php echo date('d-m-Y', $sale->time); ?></span>
                                    <span class="span-text">প্রোডাক্ট বিক্রয় তারিখ-<?php echo date('g:i A', $sale->time); ?></span>
                                </div>

                            </div>

                        </div>
                        <?php
                            $saleItems = QB::table('product_sale_item')->where('sale_id', $_GET['sale_id'])->get();
                        ?>
                        <table class="table3">
                            <thead>
                                <tr>
                                    <th class="black"> নং</th>
                                    <th class="black"> প্রোডাক্ট নাম</th>
                                    <th class="black"> পরিমান</th>
                                    <th class="black">বিক্রয়মূল্যে </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($saleItems as $index => $item): ?>
                                    <tr>
                                        <td style="color: #0B2234;"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></td>
                                        <td style="color: #0B2234;">
                                        <?php 
                                        $product = QB::table('product')->where('id', $item->product_id)->first();
                                        echo $product ? $product->name : 'Unknown Product'; 
                                        ?>
                                        </td>
                                        <td style="color: #0B2234;"><?php echo $item->quantity; ?>টি</td>
                                        <td style="color: #0B2234;"><?php echo number_format($item->price); ?> টাকা</td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="2" style="text-align: right; color: #0B2234; font-weight: bold;">মোট</td>
                                    <td style="color: #0B2234; font-weight: bold;"><?php echo number_format($sale->total_qty); ?> টি  </td>
                                    <td style="color: #0B2234; font-weight: bold;"><?php echo number_format($sale->total_price); ?> টাকা</td>
                                </tr>


                            </tbody>

                        </table>
                        <div class="text-box">
                            <h4
                                style="color:#ffff;background-color:#12D584; padding:7px; text-align:center;font-weight:normal;font-size:13px;">
                                www.bikrans.com</h4>
                        </div>


                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>