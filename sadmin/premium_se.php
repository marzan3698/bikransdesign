<?php
require_once('header.php');
check_logged_in_admin();
?>
<style>
    .table td:nth-child(3) {
        width: 100px;
    }
</style>
</head>

<body class="page-header-fixed ">
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.php"> <img class="logo-default" alt="logo" src="<?php echo LOGO; ?>"> </a>
            </div>
            <div class="library-menu"> <span class="one">-</span> <span class="two">-</span> <span class="three">-</span> </div>
            <div class="top-nev-mobile-togal"><i class="glyphicon glyphicon-cog"></i></div>
            <!-- END LOGO -->
            <?php require_once('top_menu.php'); ?>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <div class="clearfix"> </div>
    <div class="page-container">
        <!-- Start page sidebar wrapper -->
        <?php require_once('sidebar.php'); ?>
        <!-- End page sidebar wrapper -->
        <!-- Start page content wrapper -->

        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row wrapper border-bottom page-heading">
                    <div class="col-lg-12">
                        <h2> <i class="fas fa-users"></i> User </h2>
                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="widgets-container">

                                    <h5>User List</h5>
                                    <hr />
                                     <?php
                                        $rows = QB::table('member')->get(); 
                                        $arrp = array_sum(array_column($rows, 'profit2'));
                                    ?>
                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card bg-primary text-white p-3" style="border-radius: 20px;padding: 10px">
                                                <h4>Total ARRP</h4>
                                                <h2><?php echo number_format($arrp); ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="" method="post">
                                        <input type="text" name="search" class="form-control" placeholder="Search Username" style="width: 80%; display:inline" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
                                        <button type="submit" class="btn btn-danger" style="width: 10%; display:inline">Search</button>
                                    </form>

                                    <?php
                                    // Set records per page
                                    $recordsPerPage = 50;

                                    // Capture the current page number from the request (default to 1)
                                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                    $page = max($page, 1); // Ensure the page is at least 1

                                    // Calculate offset
                                    $offset = ($page - 1) * $recordsPerPage;

                                    // Capture search input
                                    $search = isset($_POST['search']) ? $_POST['search'] : '';

                                    // Base query
                                    $queryBuilder = $queryBuilder->table('member');

                                    // Apply search condition if search term is provided
                                    if (!empty($search)) {
                                        $queryBuilder = $queryBuilder->where('username', 'LIKE', '%' . $search . '%');
                                    }

                                    // Get total record count for pagination
                                    $totalRecords = $queryBuilder->count();
                                    $totalPages = ceil($totalRecords / $recordsPerPage);

                                    // Fetch paginated results
                                    $query = $queryBuilder->where('prank_se', 1)
                                        ->orderBy('id', 'desc')
                                        ->limit($recordsPerPage)
                                        ->offset($offset)
                                        ->get();

                                    $sl = $offset + 1;
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="table-layout: fixed; width: 100%;">
                                            <tr>
                                                <td style="width: 40px;" class="text-center">SL</td>
                                                <td>Username</td>
                                                <td style="width: 100px;">Date</td>
                                                <td>Password</td>
                                                <td>Phone</td>
                                                <td>Refer ID</td>
                                                <td>Placement</td>
                                                <td>Sales Commission</td>
                                                <td>Rank Incentive</td>
                                                <td>Total Income</td>
                                                <td>Withdraw</td>
                                                <td>Balance</td>
                                                <td>Action</td>
                                            </tr>

                                            <?php
                                            // Display results
                                            foreach ($query as $row) {
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $sl++; ?></td>
                                                    <td><strong>Username :</strong> <?php echo $row->username; ?><br />
                                                        <strong>Fullname :</strong> <?php echo $row->name; ?>
                                                    </td>
                                                    <td><?php echo date('d/m/Y', $row->date) ?></td>
                                                    <td><?php echo $row->show_password; ?></td>
                                                    <td><?php echo $row->phone; ?><br />
                                                        <?php echo $row->email; ?>
                                                    </td>
                                                    <td><?php $refer = $queryBuilder->table('member')->where('id', $row->refer_id)->first();
                                                        echo $refer ? $refer->username : 'No Refer ID';
                                                        ?></td>
                                                    <td><?php $placement = $queryBuilder->table('member')->where('id', $row->position_id)->first();
                                                        echo $placement ? $placement->username : 'No Refer ID';
                                                        ?></td>
                                                    <td>
                                                        <?php
                                                        $totalCommission = QB::table('gen_his')->where('to_id', $row->id)->get();
                                                        $totalCommissionAmount = array_sum(array_column($totalCommission, 'amount'));
                                                        echo '৳ ' . $totalCommissionAmount;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $result = QB::table('user_transection')
                                                            ->where('user_id', $row->id)
                                                            ->where('type', 9)
                                                            ->where('his', 9)
                                                            ->get(['SUM(credit) as total']); // Change here

                                                        $totalRankCommission = $result[0]->total ?? 0;

                                                        echo '৳ ' . $totalRankCommission;
                                                        ?>
                                                    </td>
                                                    <td>৳ <?php echo balancee_ck_user_income($row->id); ?></td>
                                                    <td>৳ <?php echo withdraw_sum($row->id); ?></td>
                                                    <td>৳ <?php echo balancee_ck_user($row->id); ?></td>
                                                    <td>
                                                        <a class="badge badge-danger" href="edit-user.php?user_id=<?php echo $row->id ?>">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>

                                    <!-- Pagination Links -->
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            <?php
                                            // Define the range of pages to show
                                            $range = 2; // Number of pages to show on either side of the current page

                                            // Show the "Previous" button
                                            if ($page > 1) {
                                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
                                            }

                                            // Loop through pages
                                            for ($i = 1; $i <= $totalPages; $i++) {
                                                if ($i == 1 || $i == $totalPages || ($i >= $page - $range && $i <= $page + $range)) {
                                                    // Show the first page, last page, and pages within the range
                                                    echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
                                                    echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
                                                    echo '</li>';
                                                } elseif ($i == $page - $range - 1 || $i == $page + $range + 1) {
                                                    // Show ellipsis when there's a gap in pages
                                                    echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                                                }
                                            }

                                            // Show the "Next" button
                                            if ($page < $totalPages) {
                                                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <?php require_once('footer.php'); ?>