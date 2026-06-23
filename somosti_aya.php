<?php 
require_once('header.php'); 
$days = [
    'Sunday' => 'রবিবার',
    'Monday' => 'সোমবার',
    'Tuesday' => 'মঙ্গলবার',
    'Wednesday' => 'বুধবার',
    'Thursday' => 'বৃহস্পতিবার',
    'Friday' => 'শুক্রবার',
    'Saturday' => 'শনিবার'
];
$referQuery = "SELECT COUNT(*) as total FROM member WHERE refer_id = $user_id";
$totalReferResult = $mysqli->query($referQuery);
$totalRefer = $totalReferResult->fetch_assoc();
$totalReferCount = $totalRefer['total'];
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

        <style>
            .table-responsive{
                overflow-x: auto;
                width: 97%;
                margin: 0 auto;
                padding: 0;
            }

            .table4{
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
            }

            .table4 th,
            .table4 td{
                white-space: nowrap;
            }
        </style>

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
                        style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222; min-height:calc(100vh - 105px);">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text"> সমষ্টি আয় <br> সংক্রান্ত তথ্য
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/16.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <div style="display: flex; gap: 0; background: #223765; width: 97%; margin: auto;">
                            <div style="padding: 5px;width: 25%;color:#fff;text-align:center;border-right:1px solid #fff">রেফারেন্স- <?= $totalReferCount ?? 0; ?></div>
                            <div style="padding: 5px;width: 25%;color:#fff;text-align:center;border-right:1px solid #fff">বীজ এলার্ট</div>
                            <div style="padding: 5px;width: 50%;color:#fff;text-align:center;">সমষ্টি আয় জমা- 
                                <?php $total = QB::query("
                                        SELECT IFNULL(SUM(cradit),0) as total_credit
                                        FROM user_transection_biz_a
                                        WHERE user_id = '{$_SESSION['user_id']}'
                                        AND `his` IN (659, 669)
                                    ")->first();

                                    echo number_format($total->total_credit,2); 
                                ?></div>
                        </div>
                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table4">
                                <thead>
                                    <tr>
                                        <th class="ash" style="font-size: 12px;border: 1px solid #0B2234;border-right: 0px">তারিখ</th>
                                        <th class="ash" style="font-size: 12px;border: 1px solid #0B2234;border-right: 0px">বার</th>
                                        <th class="ash" style="font-size: 12px;border: 1px solid #0B2234;border-right: 0px">নাম</th>
                                        <th class="ash" style="font-size: 12px;border: 1px solid #0B2234;border-right: 0px">টাকা</th>
                                        <th class="ash" style="font-size: 12px;border: 1px solid #0B2234;">তথ্য</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    // ── Pagination config ──────────────────────────────────────────
                                    $perPage     = 10;
                                    $currentPage = isset($_GET['page']) && (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;
    
                                    // ── Get total rows ─────────────────────────────────────────────
                                    $countSql  = "SELECT COUNT(*) AS total FROM `user_transection_biz_a` 
                                                WHERE `user_id` = '{$_SESSION['user_id']}' AND `his` IN (659, 669)";
                                    $countResult = $mysqli->query($countSql);
                                    $totalRows   = $countResult ? (int)$countResult->fetch_assoc()['total'] : 0;
                                    $totalPages  = (int)ceil($totalRows / $perPage);
    
                                    // ── Clamp currentPage ──────────────────────────────────────────
                                    if ($currentPage > $totalPages && $totalPages > 0) {
                                        $currentPage = $totalPages;
                                    }
                                    $offset = ($currentPage - 1) * $perPage;
    
                                    // ── Safe base URL ──────────────────────────────────────────────
                                    $urlParts    = parse_url($_SERVER['REQUEST_URI']);
                                    $scriptPath  = $urlParts['path'];
                                    $queryParams = [];
                                    if (!empty($urlParts['query'])) {
                                        parse_str($urlParts['query'], $queryParams);
                                    }
                                    unset($queryParams['page']);
                                    $baseQuery = http_build_query($queryParams);
                                    $baseUrl   = $scriptPath . '?' . ($baseQuery ? $baseQuery . '&' : '');
    
                                    // ── Fetch paginated rows ───────────────────────────────────────
                                    $sql = "SELECT * FROM `user_transection_biz_a` 
                                            WHERE `user_id` = '{$_SESSION['user_id']}' AND `his` IN (659, 669)
                                            ORDER BY id DESC 
                                            LIMIT $perPage OFFSET $offset";
                                    $result = $mysqli->query($sql);
    
                                    while ($row = $result->fetch_assoc()) {
                                        $day        = date('l', $row['time']);
                                        $bangla_day = $days[$day];
                                ?>
                                    <tr style="color: black;">
                                        <td style="color: black; vertical-align: middle; white-space: nowrap;">
                                            <?php echo date('F j, Y g:i a', $row['time']); ?>
                                        </td>
                                        <td style="color: black;vertical-align:middle"><?php echo $bangla_day; ?></td>
                                        <td style="color: black; vertical-align: middle; white-space: nowrap;">
                                            <?php echo find_user_fname($row['from_id']); ?>
                                            <?php echo find_user_name($row['from_id']); ?>
                                        </td>
                                        <td style="color: black;vertical-align:middle"><?php echo number_format($row['cradit'], 2); ?></td>
                                        <td style="color: black;vertical-align:middle">তথ্য</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php require_once('pagination.php'); ?>
                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>