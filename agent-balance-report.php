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
                    <nav class="main-nav"
                        style="margin-top: 60px !important; width: 95%; margin: auto; min-height:86vh;">
                        <div style="background: #00CC99; padding: 12px; color: #fff; text-align: center; font-size: 22px;">এজেন্ট ব্যালেন্স রিপোর্ট</div>
                        <?php
                        // ── Pagination config ──────────────────────────────────────────
                        $perPage     = 10;
                        $currentPage = isset($_GET['page']) && (int)$_GET['page'] > 0 ? (int)$_GET['page'] : 1;
                        $offset      = ($currentPage - 1) * $perPage;

                        // Total rows for this user
                        $totalRows =  QB::table('agent_balance_reqest')->where('user_id', $_SESSION['user_id'])->count();
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


                        $data = QB::table('agent_balance_reqest')
                            ->where('user_id', $_SESSION['user_id'])
                            ->limit($perPage)
                            ->offset($offset)
                            ->get();
                        $sl = $offset + 1;    
                        ?>
                        <table style="border-collapse: collapse;">
                            <tr>
                                <td style="background: transparent;border:1px solid #fff">নং</td>
                                <td style="background: transparent;border:1px solid #fff">ব্যালেন্স গ্রহন তারিখ</td>
                                <td style="background: transparent;border:1px solid #fff">ব্যালেন্স পরিমান</td>
                                <td style="background: transparent;border:1px solid #fff">সফলভাবে জমা</td>
                                <td style="background: transparent;border:1px solid #fff">ভাউচার</td>
                            </tr>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td style="background: transparent;border:1px solid #fff;vertical-align:middle"><?= $sl++ ?></td>
                                    <td style="background: transparent;border:1px solid #fff;vertical-align:middle"><?= date('d-m-Y', strtotime($row->date)) ?> <br> Time-<?= date('h:i:A', strtotime($row->time2))  ?></td>
                                    <td style="background: transparent;border:1px solid #fff;vertical-align:middle">
                                        <?php
                                        if ($row->status == 1) {
                                            echo $row->approve_amount;
                                        } else {
                                            echo $row->amount;
                                        }
                                        ?>
                                    </td>
                                    <td style="background: transparent;border:1px solid #fff;vertical-align:middle">
                                        <?php
                                        if ($row->status == 1) {
                                            echo '<div style="color:green">অর্থ জমা হয়েছে</div>';
                                        } elseif ($row->status == 0) {
                                            echo '<div style="color:red">অর্থ জমা হয়নি</div>';
                                        } elseif ($row->status == 2) {
                                            echo '<div style="color:red">রিজেক্ট করা হয়েছে</div>';
                                        }
                                        ?>
                                    </td>
                                    <td style="background: transparent;border:1px solid #fff;vertical-align:middle">
                                        <img
                                            src="https://cdn-icons-png.flaticon.com/128/802/802067.png"
                                            class="viewVoucher"
                                            data-image="<?= $row->voucher_image ?>"
                                            width="20px"
                                            style="cursor:pointer">
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <?php require_once('pagination.php'); ?>


                    </nav>


                </div>
            </div>
        </div>
        <div id="nidModal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.7);">
            <div style="position:relative;width:400px;max-width:90%;margin:50px auto;background:#fff;padding:10px;border-radius:10px;text-align:center;">
                <span id="closeModal" style="position:absolute; top:10px; right:15px; font-size:25px; cursor:pointer;">&times;</span>
                <img id="nidImagePreview" src="" style="width:100%; border-radius:5px;">
            </div>
        </div>

    </div>
</div>
<?php require_once('footer.php'); ?>
<script>
$(document).on("click", ".viewVoucher", function () {
    let imgSrc = $(this).data("image");

    $("#nidImagePreview").attr("src", imgSrc);
    $("#nidModal").fadeIn();
});

$("#closeModal").on("click", function () {
    $("#nidModal").fadeOut();
});

$(window).on("click", function (e) {
    if ($(e.target).is("#nidModal")) {
        $("#nidModal").fadeOut();
    }
});
</script>