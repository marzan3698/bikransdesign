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

<!-- Add this CSS -->
<style>
  .table-wrapper {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    border-radius: 8px;
    border: 1px solid #0B2234;
    scrollbar-width: thin;
    scrollbar-color: #0B2234 transparent;
  }
  .table-wrapper::-webkit-scrollbar { height: 6px; }
  .table-wrapper::-webkit-scrollbar-track { background: transparent; }
  .table-wrapper::-webkit-scrollbar-thumb { background: #0B2234; border-radius: 6px; }

  .table3 {
    border-collapse: collapse;
    width: 100%;
    min-width: 620px; /* forces scroll on small screens */
    font-size: 14px;
  }
  .table3 thead tr { background: #0B2234; }
  .table3 thead th {
    border: 1px solid #0B2234;
    padding: 10px 14px;
    color: #fff;
    font-weight: 500;
    white-space: nowrap;
    text-align: center;
  }
  .table3 tbody tr:nth-child(even) { background: #e8f0f5; }
  .table3 tbody tr:nth-child(odd)  { background: #f7fafb; }
  .table3 tbody tr:hover { background: #d0e4ef; }
  .table3 tbody td {
    border: 1px solid #0B2234;
    color: #0B2234;
    text-align: center;
    padding: 9px 14px;
    white-space: nowrap;
  }

  .scroll-hint {
    display: none;
    font-size: 12px;
    color: #555;
    margin-bottom: 6px;
  }
  @media (max-width: 640px) {
    .scroll-hint { display: block; }
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
                    <nav class="main-nav"
                        style="margin-top: 60px !important; width: 95%; margin: auto; border: 1px solid #12D584; min-height:86vh;">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text" style="color: white;">এজেন্ট থেকে <br> বিক্রয় রিপোর্ট</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/68.png" alt="" class="box-img" style="width: 155px;">
                            </div>
                        </div>

                        <?php
                            // ── Pagination config ──────────────────────────────────────────
                        $perPage     = 10;
                        $currentPage = isset($_GET['page']) && (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;
                        $offset      = ($currentPage - 1) * $perPage;

                        // Total rows for this user
                        $totalRows = QB::table('order_items')
                                    ->where('agent_id', $_SESSION['user_id'])
                                    ->whereIn('type', ['agent-repurchase', 'agent-nibondhon']) 
                                    ->count();
                        $totalPages = (int)ceil($totalRows / $perPage);

                        // Clamp currentPage
                        if ($currentPage > $totalPages && $totalPages > 0) {
                            $currentPage = $totalPages;
                            $offset = ($currentPage - 1) * $perPage;
                        }
                        // ── Safe base URL ──────────────────────────────────────────────
                        $urlParts    = parse_url($_SERVER['REQUEST_URI']);
                        $scriptPath  = $urlParts['path'];
                        $queryParams = [];
                        if (!empty($urlParts['query'])) {
                            parse_str($urlParts['query'], $queryParams);
                        }
                        unset($queryParams['page']);   // ← remove 'page' before building baseUrl

                        $baseQuery = http_build_query($queryParams);
                        $baseUrl   = $scriptPath . '?' . ($baseQuery ? $baseQuery . '&' : '');


                            $data = QB::table('order_items')
                                        ->where('agent_id', $_SESSION['user_id'])
                                        ->whereIn('type', ['agent-repurchase', 'agent-nibondhon']) 
                                        ->orderBy('id', 'desc')
                                        ->limit($perPage)
                                        ->offset($offset)
                                        ->get();
                            $sl = $offset + 1;    
                        ?>
                        <div class="table-wrapper">
                            <table class="table3" style="border-collapse: collapse;">
                                <thead>
                                    <tr>
                                        <th style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">নং</th>
                                        <th style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">তারিখ ও সময়</th>
                                        <th style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">ইউজার</th>
                                        <th style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">ধরণ</th>
                                        <th style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">প্রোডাক্ট</th>
                                        <th style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">পরিমান</th>
                                        <th style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">দাম</th>
                                        <th style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">মোট দাম</th>
                                        <th style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">ভাউচার</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $sale): ?>
                                        <?php 
                                            $product = QB::table('product')->where('id', $sale->product_id)->first();
                                            $order = QB::table('order')->where('id', $sale->order_id)->first();
                                            $user = QB::table('member')->where('id', $sale->user_id)->first();
                                        ?>
                                        <tr>
                                            <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;"><?php echo $sl++ ?></td>
                                            <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;"><?php echo date('d-m-Y', $order->time); ?><br><?php echo date('h:i:A', $order->time); ?></td>
                                            <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">
                                                <?= $user->name ?? '--' ?>
                                            </td>
                                            
                                            <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">
                                                <?php 
                                                    if($sale->type == 'agent-repurchase'){
                                                        echo 'রি-অর্ডার';
                                                    }elseif($sale->type == 'agent-nibondhon'){
                                                        echo 'সদস্য নিবন্ধন';
                                                    }
                                                ?>
                                            </td>
                                            <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;"><?php echo $product ? $product->name : 'Product not found'; ?></td>
                                            <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;"><?php echo $sale->quantity; ?></td>
                                            <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;"><?php echo number_format($sale->price, 2); ?> ৳</td>
                                            <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;"><?php echo number_format($sale->price * $sale->quantity, 2); ?> ৳</td>
                                            <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;vertical-align:middle">
                                                <?= $sale->order_id ?>&nbsp;
                                                <img src="https://cdn-icons-png.flaticon.com/128/16794/16794942.png"
                                                    onclick="window.location.href='agent-order-summery.php?order_id=<?= $sale->order_id ?>'"
                                                    width="15px"
                                                    style="cursor:pointer;">                                            
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <?php require_once('pagination.php'); ?>
                        </div>

                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
    function previewPhoto(input) {
        const box = input.closest('.image-label');
        const preview = box.querySelector('.previewImage');
        const placeholder = box.querySelector('.placeholderText');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                placeholder.style.display = 'none';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>