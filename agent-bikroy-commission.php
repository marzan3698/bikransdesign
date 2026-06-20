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
                        style="margin-top: 60px !important; width: 95%; margin: auto; border: 1px solid #12D584; min-height:86vh;">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text" style="color: white;">এজেন্ট <br> বিক্রয় কমিশন</div>
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
                        $totalRows = QB::table('user_transection')->where('user_id', $_SESSION['user_id'])->where('his', 561)->count();
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


                        $data = QB::table('user_transection')
                            ->where('user_id', $_SESSION['user_id'])
                            ->where('his', 561)
                            ->limit($perPage)
                            ->offset($offset)
                            ->orderBy('id', 'desc')
                            ->get();
                        $sl = $offset + 1;    
                        ?>
                        <table class="table3" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th class="ash" style="border: 1px solid #0B2234;font-size:20px" colspan="4">
                                        এজেন্ট বিক্রয় কমিশন-  <?php $total = QB::query("
                                            SELECT IFNULL(SUM(cradit),0) as total_credit
                                            FROM user_transection
                                            WHERE user_id = '{$_SESSION['user_id']}'
                                            AND his = 561
                                        ")->first();

                                        echo $total->total_credit; ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="ash" style="border: 1px solid #0B2234;">নং</th>
                                    <th class="ash" style="border: 1px solid #0B2234;">তারিখ ও সময়</th>
                                    <th class="ash" style="border: 1px solid #0B2234;">ইউজার</th>
                                    <th class="ash" style="border: 1px solid #0B2234;">টাকার পরিমান</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $row){ ?>
                                <tr>
                                    <td  style="color: #0B2234;border: 1px solid #12D584;"><?= $sl++ ?></td>
                                    <td  style="color: #0B2234;border: 1px solid #12D584;">
                                        তারিখ: <?= date('d-m-Y', $row->time) ?><br>
                                        সময়: <?= date('h:i:A', $row->time) ?><br>
                                    </td>
                                    
                                    <td  style="color: #0B2234;border: 1px solid #12D584;">
                                        <?php
                                            $user = QB::table('member')->where('id', $row->from_id)->first();
                                            if($user){
                                                echo 'নাম: ' . $user->name . '<br>';
                                                echo 'ইউজার আইডি: ' . $user->username;
                                            }
                                        ?>
                                    </td>
                                    <td  style="color: #0B2234;border: 1px solid #12D584;"><?= $row->cradit ?></td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <?php require_once('pagination.php'); ?>

                       
                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>