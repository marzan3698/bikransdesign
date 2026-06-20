<?php
require_once('header.php');
$banglaMonths = [
    'Jan' => 'জানুয়ারি',
    'Feb' => 'ফেব্রুয়ারি',
    'Mar' => 'মার্চ',
    'Apr' => 'এপ্রিল',
    'May' => 'মে',
    'Jun' => 'জুন',
    'Jul' => 'জুলাই',
    'Aug' => 'আগস্ট',
    'Sep' => 'সেপ্টেম্বর',
    'Oct' => 'অক্টোবর',
    'Nov' => 'নভেম্বর',
    'Dec' => 'ডিসেম্বর'
];
?>
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

            <div data-page="index" class="page homepage" style="background-color: #0B2234 !important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234 !important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav" style="margin-top: 55px !important; width: 95%; margin: auto;">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text" style="color: white;">নতুন সদস্য <br> নিবন্ধন তালিকা</div>
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
                        $totalRows = QB::table('member')->where('created_agent_id', $_SESSION['user_id'])->count();
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


                        $member = QB::table('member')
                        ->where('created_agent_id', $_SESSION['user_id'])
                        ->limit($perPage)
                        ->offset($offset)
                        ->get();
                        $sl = $offset + 1;    
                    ?>
                    </nav>


                    <section class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>তারিখ</th>
                                    <th>ছবি</th>
                                    <th>নাম</th>
                                    <th>ইউজারনেম</th>
                                    <th>মোবাইল</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($member as $item) {
                                ?>
                                    <tr>
                                        <td style="vertical-align: middle;"><?= date('d/m/Y', $item->joining_time) ?><br><?= date('h:i A', $item->joining_time) ?></td>
                                        <td style="vertical-align: middle;"><img src="<?= $item->image ?>" alt="" width="50" height="50" /></td>
                                        <td style="vertical-align: middle;"><?= $item->name ?></td>
                                        <td style="vertical-align: middle;"><?= $item->username ?></td>
                                        <td style="vertical-align: middle;"><?= $item->phone ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php require_once('pagination.php'); ?>
                    </section>
                </div>
            </div>

        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>