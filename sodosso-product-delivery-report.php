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
            *{
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
            .submit-btn{
                margin-bottom: 35px !important; 
                display: block; 
                margin: auto; 
                padding: 10px 34px; 
                margin-top: 10px !important;
            }
            .submit-btn2{
                display: block;
                margin: auto;
                padding: 3px 15px;
                cursor: pointer;
                background: #00CC99;
                color: #fff;
                border: none;
            }
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
                        style="margin-top: 60px !important; width: 95%; margin: auto; min-height:86vh;">
                        <div style="background: #00CC99; padding: 12px; color: #fff; text-align: center; font-size: 22px;">সদস্য প্রোডাক্ট ডেলিভারি রিপোর্ট</div>
                        <?php 
                            if(isset($_POST['delivery_done'])){
                                $order_id = $_POST['order_id'];
                                QB::table('order')->where('id', $order_id)->update(['status' => 1]);
                                echo '<div style="color: #00CC99; text-align: center;">ডেলিভারি সম্পন্ন হয়েছে</div>';
                                echo '<script>
                                setTimeout(function(){
                                    window.location.href="sodosso-product-delivery-report.php"
                                }, 1000);
                                </script>';
                            }
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
                            $order = QB::table('order_items')
                                        ->where('agent_id', $_SESSION['user_id'])
                                        ->whereIn('type', ['agent-repurchase', 'agent-nibondhon']) 
                                        ->orderBy('id', 'desc')
                                        ->limit($perPage)
                                        ->offset($offset)
                                        ->get();
                         $sl = $offset + 1;    
                        ?>
                        <div class="table-wrapper">
                            <table class="table3" style="border-collapse:collapse; width: 100%; border:1px solid #fff; margin-top: 10px; text-align: center; color: #fff;">
                                <tr>
                                    <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">নং</td>
                                    <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">সদস্য</td>
                                    <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">তারিখ</td>
                                    <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">প্রোডাক্ট নাম</td>
                                    <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">ডেলিভারি তথ্য</td>
                                    <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">ভাউচার</td>
                                </tr>
                                <?php foreach($order as $row){ ?>
                                <?php 
                                    $order = QB::table('order')->where('id', $row->order_id)->first();
                                ?>
                                    <tr>
                                        <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;"><?= $sl++ ?></td>
                                        <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">
                                            <?php 
                                                $user = QB::table('member')->where('id', $row->user_id)->first();
                                                echo $user->name . '<br>';
                                                echo $user->username . '<br>';
                                            ?>
                                        </td>
                                        <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">
                                            <?= date('d-m-Y', $order->time) ?><br><?= date('h:i:A', $order->time) ?>
                                        </td>
                                        <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">
                                            <?php 
                                                $product = QB::table('product')->where('id', $row->product_id)->first();
                                                echo $product->name ?? 'N/A';
                                            ?>
                                        </td>
                                        <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">
                                            <?php
                                                $main_order = QB::table('order')->where('id', $row->order_id)->first();
                                                if($main_order->status == 1){
                                                    echo '<div style="color:green;">ডেলিভারি সম্পন্ন হয়েছে</div>';
                                                }elseif($main_order->status == 0){
                                            ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="order_id" value="<?= $main_order->id ?>">
                                                    <button type="submit" name="delivery_done" class="submit-btn2" onclick="return confirm('আপনি কি এই ডেলিভারিটিকে সম্পূর্ণ হিসেবে চিহ্নিত করতে নিশ্চিত?')">ডেলিভারি সম্পন্ন করুন</button>
                                                </form>
                                            <?php } ?>
                                        </td>
                                        <td style="border: 1px solid #fff;background: #0B2234; color:#fff; text-align: center;">
                                            <?= $row->order_id ?>&nbsp;
                                                <img src="https://cdn-icons-png.flaticon.com/128/16794/16794942.png"
                                                    onclick="window.location.href='agent-order-summery.php?order_id=<?= $row->order_id ?>'"
                                                    width="15px"
                                                    style="cursor:pointer;">  
                                        </td>
                                    </tr>
                                <?php } ?>
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