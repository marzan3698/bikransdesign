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
        <link href="https://fonts.cdnfonts.com/css/solaimanlipi" rel="stylesheet">
        <style>
            * {
                font-family: 'SolaimanLipi', sans-serif !important;
            }

            .cus-in-11 {
                width: 100%;
                padding: 10px;
                border: 1px solid #fff;
                margin-top: 3px;
                box-sizing: border-box;
                overflow-x: auto;
                white-space: nowrap;
                text-overflow: clip;
                background: transparent;
                color: #fff;
            }

            .cus-in-11::placeholder {
                color: #fff;
            }

            .input-scroll-wrapper {
                overflow-x: auto;
                white-space: nowrap;
                width: 100%;
            }

            .cus-select-111 {
                width: 100%;
                padding: 10px;
                border: 1px solid #fff;
                margin-top: 3px;
                box-sizing: border-box;
                font-size: 14px;
                white-space: nowrap;
                overflow-x: auto;
                text-overflow: clip;
            }

            .img-preview {
                width: 90%;
                height: 155px;
                border: 1px solid #fff;
                color: #fff;
                font-weight: 600;
                padding: 5px;
                margin-top: 3px;
                text-align: center;
                position: relative;
            }

            .submit-btn {
                margin-bottom: 35px !important;
                display: block;
                margin: auto;
                padding: 10px 34px;
                margin-top: 10px !important;
            }
        </style>

        <div class="pages">

            <div data-page="index" class="page homepage" style="background-color: #0B2234!important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav" style="margin-top: 60px !important; width: 95%; margin: auto; min-height:86vh;">
                        <div style="background: #00CC99; padding: 12px; color: #fff; text-align: center; font-size: 22px;">এজেন্ট প্রোডাক্ট স্টক</div>
                        <?php
                        // ── Fetch all products and calculate stock ──────────────────────
                        $allProducts = QB::table('product')->orderBy('id', 'asc')->get();

                        $validProducts = [];
                        foreach ($allProducts as $product) {
                            $stockIn = QB::table('agent_product_stock')
                                ->where('user_id', $_SESSION['user_id'])
                                ->where('product_id', $product->id)
                                ->where('type', 'stock_in')
                                ->get();

                            $stockOut = QB::table('agent_product_stock')
                                ->where('user_id', $_SESSION['user_id'])
                                ->where('product_id', $product->id)
                                ->where('type', 'stock_out')
                                ->get();

                            $totalIn = 0;
                            foreach ($stockIn as $row) {
                                $totalIn += $row->qty ?? 0;
                            }

                            $totalOut = 0;
                            foreach ($stockOut as $row) {
                                $totalOut += $row->qty ?? 0;
                            }

                            $stock = $totalIn - $totalOut;

                            if ($stock > 0) {
                                $product->stock = $stock;
                                $validProducts[] = $product;
                            }
                        }

                        // ── Pagination config ───────────────────────────────────────────
                        $perPage     = 10;
                        $totalRows   = count($validProducts);
                        $totalPages  = (int)ceil($totalRows / $perPage);
                        $currentPage = isset($_GET['page']) && (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;

                        // Clamp currentPage
                        if ($currentPage > $totalPages && $totalPages > 0) {
                            $currentPage = $totalPages;
                        }

                        $offset       = ($currentPage - 1) * $perPage;
                        $pagedProducts = array_slice($validProducts, $offset, $perPage);
                        $sl           = $offset + 1;

                        // ── Safe base URL ───────────────────────────────────────────────
                        $urlParts    = parse_url($_SERVER['REQUEST_URI']);
                        $scriptPath  = $urlParts['path'];
                        $queryParams = [];
                        if (!empty($urlParts['query'])) {
                            parse_str($urlParts['query'], $queryParams);
                        }
                        unset($queryParams['page']);
                        $baseQuery = http_build_query($queryParams);
                        $baseUrl   = $scriptPath . '?' . ($baseQuery ? $baseQuery . '&' : '');
                        ?>

                        <table style="border-collapse: collapse; width:100%;">
                            <tr>
                                <td style="background: transparent; border:1px solid #fff">নং</td>
                                <td style="background: transparent; border:1px solid #fff">প্রোডাক্ট নাম</td>
                                <td style="background: transparent; border:1px solid #fff">দাম</td>
                                <td style="background: transparent; border:1px solid #fff">স্টক পরিমান</td>
                            </tr>
                            <?php foreach ($pagedProducts as $product): ?>
                                <tr>
                                    <td style="background: transparent; border:1px solid #fff"><?= $sl++ ?></td>
                                    <td style="background: transparent; border:1px solid #fff"><?= $product->name ?? '' ?></td>
                                    <td style="background: transparent; border:1px solid #fff"><?= $product->main_price ?? '' ?></td>
                                    <td style="background: transparent; border:1px solid #fff"><?= $product->stock ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>

                        <?php require_once('pagination.php'); ?>
                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>