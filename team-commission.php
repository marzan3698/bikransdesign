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
        /* Pagination Container */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 20px;
}

/* Pagination Buttons */
.pagination-wrapper .btn {
    min-width: 40px;
    height: 40px;
    border-radius: 8px;
    border: none;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

/* Normal Button */
.pagination-wrapper .btn-info {
    background: #f1f5f9;
    color: #334155;
}

.pagination-wrapper .btn-info:hover {
    background: #12D584;
    color: #fff;
    transform: translateY(-2px);
}

/* Active Page */
.pagination-wrapper .btn-success,
.pagination-wrapper .active {
    background: #12D584 !important;
    color: #fff !important;
    box-shadow: 0 3px 10px rgba(13, 110, 253, 0.3);
    cursor: default;
}

/* First, Last, Prev, Next */
.pagination-wrapper .btn:first-child,
.pagination-wrapper .btn:last-child {
    padding: 0 15px;
}

/* Mobile */
@media (max-width: 576px) {
    .pagination-wrapper .btn {
        min-width: 35px;
        height: 35px;
        font-size: 13px;
    }
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
                                <div class="box-text">টিম কমিশন <br> সংক্রান্ত তথ্য
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/17.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <table class="table4">
                            <thead>
                                <tr>

                                    <th class="ash">মোট টিম কর্মী সংখ্যা- <?php $refer_count = refer_count_active($member->id);
                                    echo $refer_count;
                                    
                                    
                                    
                                     ?></th>
                                    <th class="black">মোট টিম আয়- 
                                    
                                     <?php
                                        $result = $queryBuilder->table('gen_his')
                                            ->where('type', 2)
                                            ->where('to_id', $_SESSION['user_id'])
                                            ->select($queryBuilder->raw('SUM(amount) as total_amount'))
                                            ->first();

                                        $totalAmount = $result->total_amount ?? 0;

                                        echo number_format($totalAmount,2);

                    ?> /
                                    
                                    <?php 
                                    $balance = $member->balance_team;
                                    echo $balance; 
                                    
                                    if($refer_count>=5){
                                                                        
                                    if($member->profit4==0){
                                                                        
                                    $sql1 = "UPDATE `member` SET `balance` = `balance` + '$balance', `profit4` = '1', `balance_team` = '0' WHERE `member`.`id` = '$member->id';";
                                    $mysqli->query($sql1);
                                    
                                        }
                                    }
                                    
                                    ?></th>

                                </tr>
                            </thead>
                        </table>

                        <table class="table4">
                            <thead>
                                <tr>
                                    <th class="ash" style="font-size: 12px; border: 1px solid #0B2234;border-right: 0px">তারিখ</th>
                                    <th class="ash" style="font-size: 12px; border: 1px solid #0B2234;border-right: 0px">বার</th>
                                    <th class="ash" style=" font-size: 12px; border: 1px solid #0B2234;border-right: 0px">যারা আয় দিয়েছে</th>
                                    <th class="ash" style="font-size: 12px; border: 1px solid #0B2234;border-right: 0px">টাকা</th>
                                    <th class="ash" style="font-size: 12px; border: 1px solid #0B2234;">তথ্য</th>
                                </tr>
                            </thead>
                            <tbody style="color: black;">
                            
                                <?php
        // Configuration
        $perPageLimit = 10;
        $type = 2;
        $userId = $_SESSION['user_id'] ?? 0;

        // Step 1: Get Total Record Count
        $totalData = QB::table('gen_his')
            ->where('to_id', $userId)
            ->where('type', $type);

        $totalRecords = $totalData->count();

        // Step 2: Current Page
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

        // Step 3: Paginated Data
        $data = QB::table('gen_his')
            ->where('to_id', $userId)
            ->where('type', $type)
            ->orderBy('id', 'desc')
            ->offset(($page - 1) * $perPageLimit)
            ->limit($perPageLimit);

        $results = $data->get();

        // Step 4: Display Rows
        foreach ($results as $i => $row) {
            $day = date('l', $row->time); 
            $bangla_day = $days[$day];
            $serial = (($page - 1) * $perPageLimit) + ($i + 1);
            $user = QB::table('member')->where('id', $row->from_id)->first();
            // $username = QB::table('member')->where('id', $row->from_id)->first()->username ?? 'N/A';
            echo "<tr style='color: black;'>
                    <td style='color: black;'>" . date('d M Y h:i:sa', $row->time) . "</td>
                    <td style='color: black;'>{$bangla_day}</td>
                    <td style='color: black;'>নাম: {$user->name} <br> ইউজারনেম: {$user->username}</td>
                    <td style='color: black;'>{$row->amount} </td>
                    <td style='color: black;'>{$row->gen} প্রজন্ম</td>
                  </tr>";
        }

        if (empty($results)) {
            echo "<tr><td colspan='5' style='text-align:center;'>কোনো তথ্য পাওয়া যায়নি।</td></tr>";
        }
      ?>
                                
                            </tbody>
                        </table>
                        
                         <?php if ($totalRecords > $perPageLimit): ?>
    <div class="pagination-wrapper">
      <?php
        $pages = ceil($totalRecords / $perPageLimit);

        if ($page > 1) {
            echo "<a class='btn btn-sm btn-info' href='gen.php?page=" . ($page - 1) . "&type={$type}'>Prev</a> ";
            echo "<a class='btn btn-sm btn-info' href='gen.php?page=1&type={$type}'>First</a> ";
        }

        $startPage = max(1, $page - 2);
        $endPage = min($startPage + 4, $pages);

        for ($x = $startPage; $x <= $endPage; $x++) {
            $btnClass = ($x == $page) ? 'btn-success active' : 'btn-info';
            echo "<a class='btn btn-sm {$btnClass}' href='gen.php?page={$x}&type={$type}'>{$x}</a> ";
        }

        if ($page < $pages) {
            echo "<a class='btn btn-sm btn-info' href='gen.php?page={$pages}&type={$type}'>Last</a> ";
            echo "<a class='btn btn-sm btn-info' href='gen.php?page=" . ($page + 1) . "&type={$type}'>Next</a>";
        }
      ?>
    </div>
  <?php endif; ?>
  
                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>