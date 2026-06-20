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
            .table4{
                border-collapse: collapse;
                border-spacing: 0;
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
                                <div class="box-text">রেফার কমিশন <br> সংক্রান্ত তথ্য
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/16.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <table class="table4">
                            <thead>
                                <tr>
                                    <th class="ash"></th>
                                    <th class="black">মোট আয়- <?php $total = QB::query("
                                            SELECT IFNULL(SUM(cradit),0) as total_credit
                                            FROM user_transection
                                            WHERE user_id = '{$_SESSION['user_id']}'
                                            AND his = 571
                                        ")->first();

                                    echo $total->total_credit; ?></th>

                                </tr>
                            </thead>
                        </table>

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
        $countSql  = "SELECT COUNT(*) AS total FROM `user_transection` 
                      WHERE `user_id` = '{$_SESSION['user_id']}' AND `his` = 571";
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
        $sql = "SELECT * FROM `user_transection` 
                WHERE `user_id` = '{$_SESSION['user_id']}' AND `his` = 571 
                ORDER BY id DESC 
                LIMIT $perPage OFFSET $offset";
        $result = $mysqli->query($sql);

        while ($row = $result->fetch_assoc()) {
            $day        = date('l', $row['time']);
            $bangla_day = $days[$day];
    ?>
        <tr style="color: black;">
            <td style="color: black;"><?php echo date('F j, Y g:i a', $row['time']); ?></td>
            <td style="color: black;"><?php echo $bangla_day; ?></td>
            <td style="color: black;">
                নাম: <?php echo find_user_fname($row['from_id']); ?><br>
                ইউজার আইডি: <?php echo find_user_name($row['from_id']); ?>
            </td>
            <td style="color: black;"><?php echo number_format($row['cradit'], 2); ?></td>
            <td style="color: black;">তথ্য</td>
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