<?php
require_once('header.php');
?>
<style>
    .footer {
        display: none;
    }
</style>

<body class="page-header-fixed ">
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.php"> <img class="logo-default" alt="logo" src="<?php echo LOGO ?>"> </a>
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
                        <h2>Dealer</h2>

                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row">
                        <!-- Basic Form start -->
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="widgets-container">
                                    <div class="wrapper-content ">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="ibox float-e-margins">
                                                    <div class="widgets-container">

                                                        <h5>Dealer Balance Report</h5>
                                                        <hr>


                                                        <?php
                                                        // Include database connection file if not included
                                                        // require_once('db_connection.php');

                                                        // Number of records to show per page
                                                        $limit = 50;

                                                        // Get the current page or set default to 1
                                                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                                        if ($page < 1) $page = 1;

                                                        // Get the selected date range from the form
                                                        $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
                                                        $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

                                                        // Calculate the starting record for the query
                                                        $offset = ($page - 1) * $limit;

                                                        // Build the WHERE clause based on the date filters and type condition
                                                        $where = "dealer_transection.type = 0 AND dealer_transection.credit > 0";  // Default condition to only get records where type = 0 and credit > 0

                                                        // Add date range filtering if dates are provided
                                                        if (!empty($start_date) && !empty($end_date)) {
                                                            $start_timestamp = strtotime($start_date);
                                                            $end_timestamp = strtotime($end_date . ' 23:59:59'); // Include the entire end date
                                                            $where .= " AND dealer_transection.time >= $start_timestamp AND dealer_transection.time <= $end_timestamp";
                                                        }

                                                        // Get total records count for pagination
                                                        $total_sql = "SELECT COUNT(*) as total FROM dealer_transection WHERE $where";
                                                        $total_result = $mysqli->query($total_sql);
                                                        $total_row = $total_result->fetch_assoc();
                                                        $total_records = $total_row['total'];
                                                        $total_pages = ceil($total_records / $limit);

                                                        // Get the paginated records
                                                        $sql = "SELECT dealer_transection.* FROM dealer_transection WHERE $where ORDER BY dealer_transection.id DESC LIMIT $limit OFFSET $offset";
                                                        $result = $mysqli->query($sql);

                                                        $sl = $offset;
                                                        ?>

                                                        <!-- Filter Form -->
                                                        <form method="GET" action="">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="start_date">Start Date:</label>
                                                                    <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo htmlspecialchars($start_date); ?>">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="end_date">End Date:</label>
                                                                    <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo htmlspecialchars($end_date); ?>">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>&nbsp;</label>
                                                                    <button type="submit" class="btn btn-primary btn-block">Filter</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tr style="background: #222;">
                                                                    <td class="text-white">SL</td>
                                                                    <td class="text-white">Dealer</td>
                                                                    <td class="text-white">Amount</td>
                                                                    <td class="text-white">Time</td>
                                                                    <td class="text-white">Note</td>
                                                                </tr>

                                                                <?php
                                                                if ($result->num_rows > 0) {
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        // Assuming QB::table is used for fetching the Dealer details (you can replace it with your own query method)
                                                                        $dealer = QB::table('dealer')->where('id', $row['dealer_id'])->first();

                                                                        $sl++;
                                                                ?>
                                                                        <tr>
                                                                            <td><?php echo $sl; ?></td>
                                                                            <td>
                                                                                <strong>Username :</strong> <?php echo $dealer->dealer_username; ?><br />
                                                                                <strong>Fullname :</strong> <?php echo $dealer->dealer_name; ?>
                                                                            </td>
                                                                            <td><?php echo $row['credit']; ?></td>
                                                                            <td><?php echo date('d-M-Y', $row['time']); ?></td>
                                                                            <td><?php echo $row['note'] ?? '--'; ?></td>
                                                                        </tr>
                                                                <?php
                                                                    }
                                                                } else {
                                                                    echo "<tr><td colspan='5'>No records found</td></tr>";
                                                                }
                                                                ?>
                                                            </table>
                                                        </div>

                                                        <!-- Pagination Links -->
                                                        <nav aria-label="Page navigation">
                                                            <ul class="pagination">
                                                                <?php if ($page > 1): ?>
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="?page=<?php echo $page - 1; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" aria-label="Previous">
                                                                            <span aria-hidden="true">&laquo;</span>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>

                                                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                                                        <a class="page-link" href="?page=<?php echo $i; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>"><?php echo $i; ?></a>
                                                                    </li>
                                                                <?php endfor; ?>

                                                                <?php if ($page < $total_pages): ?>
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="?page=<?php echo $page + 1; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" aria-label="Next">
                                                                            <span aria-hidden="true">&raquo;</span>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>
                                                            </ul>
                                                        </nav>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <?php require_once('footer.php'); ?>