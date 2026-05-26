<?php require_once('header.php'); ?>
<div class="statusbar-overlay"></div>

<div class="panel-overlay"></div>

<?php require_once('sidebar.php'); ?>
<div class="panel panel-right panel-reveal">
    <link href="css/custom2.css" rel="stylesheet">
    <div class="user_login_info">
        <style>
            .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    margin-top: 20px;
    flex-wrap: wrap;
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 8px 14px;
    font-size: 14px;
    text-decoration: none;
    border-radius: 6px;
    border: 1px solid #12d584;
    color: #12d584;
    background: #fff;
    transition: all 0.3s ease;
}

.pagination a:hover {
    background: #12d584;
    color: #fff;
}

.pagination .active {
    background: #12d584;
    color: #fff;
    font-weight: bold;
    pointer-events: none;
}

.pagination .disabled {
    opacity: 0.5;
    pointer-events: none;
}
        </style>
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

            <div data-page="index" class="page homepage" style="background-color: #0B2234!important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 60px !important; width: 95%; margin: auto; border: 1px solid #222; min-height:86vh;">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text" style="color: white;">প্রোডাক্ট  <br> স্টক তালিকা দেখুন</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/68.png" alt="" class="box-img" style="width: 155px;">
                            </div>
                        </div>

                        <?php
                            $stock = QB::table('product_stock')
                                ->select('product_id',
                                    QB::raw("SUM(CASE WHEN type = 'stock_in' THEN qty ELSE 0 END) as total_in"),
                                    QB::raw("SUM(CASE WHEN type = 'stock_out' THEN qty ELSE 0 END) as total_out")
                                )
                                ->where('user_id', $_SESSION['user_id'])
                                ->groupBy('product_id')
                                ->get();
                        ?>
                        <table class="table3">
                            <thead>
                                <tr>
                                    <th class="ash" style="border: 1px solid #12d584;">নং</th>
                                    <th class="ash" style="border: 1px solid #12d584;">ছবি</th>
                                    <th class="ash" style="border: 1px solid #12d584;">প্রোডাক্ট</th>
                                    <th class="ash" style="border: 1px solid #12d584;">স্টক</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($stock as $key => $value) {
                                    $product = QB::table('product')->where('id', $value->product_id)->first();
                                ?>

                                    <tr>
                                        <td style="color: #0B2234;"><?php echo $key + 1; ?></td>
                                        <td style="color: #0B2234;">
                                           <img src="https://nadmin.proshante.com/<?= $product->images ?>" alt="" width="50px">
                                        </td>
                                        <td style="color: #0B2234;"><?php echo htmlspecialchars($product->name); ?></td>
                                        <td style="color: #0B2234;">
                                            <?php
                                                $currentStock = $value->total_in - $value->total_out;
                                                echo $currentStock;
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>