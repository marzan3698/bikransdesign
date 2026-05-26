<?php
require_once('header.php');
check_logged_in_admin();
?>

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
                        <h2> <i class="fas fa-users"></i> Withdraw Request List </h2>
                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="widgets-container">

                                    <h5>Withdraw Request List</h5>
                                    <hr />
                                    <?php
                                    if (isset($_POST['approved'])) {
                                        $id = $_POST['id'];

                                        $sql_update_withdraw = "UPDATE withdraw_request SET status = " . Constant::WITHDRAW_STATUS['approved'] . " WHERE id = $id";
                                        $mysqli->query($sql_update_withdraw);

                                        $sql_select_trans_id = "SELECT trans_id FROM withdraw_request WHERE id = $id LIMIT 1";
                                        $result = $mysqli->query($sql_select_trans_id);

                                        if ($result && $result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $trans_id = $row['trans_id'];

                                            $sql_update_transection = "UPDATE user_transection SET status = " . Constant::WITHDRAW_STATUS['approved'] . " WHERE id = $trans_id";
                                            $mysqli->query($sql_update_transection);

                                            echo '<p class="alert alert-success">Withdraw Request Updated<strong></strong></p>';
                                        } else {
                                            echo "No record found for the provided ID.";
                                        }
                                    }
                                    if (isset($_POST['pending'])) {
                                        $id = $_POST['id'];

                                        $sql_update_withdraw = "UPDATE withdraw_request SET status = " . Constant::WITHDRAW_STATUS['pending'] . " WHERE id = $id";
                                        $mysqli->query($sql_update_withdraw);

                                        $sql_select_trans_id = "SELECT trans_id FROM withdraw_request WHERE id = $id LIMIT 1";
                                        $result = $mysqli->query($sql_select_trans_id);

                                        if ($result && $result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $trans_id = $row['trans_id'];

                                            $sql_update_transection = "UPDATE user_transection SET status = " . Constant::WITHDRAW_STATUS['pending'] . " WHERE id = $trans_id";
                                            $mysqli->query($sql_update_transection);

                                            echo '<p class="alert alert-success">Withdraw Request Updated<strong></strong></p>';
                                        } else {
                                            echo "No record found for the provided ID.";
                                        }
                                    }

                                    ?>

                                    <?php
                                    $sql = "SELECT withdraw_request.* FROM withdraw_request ORDER BY withdraw_request.id DESC";

                                    $result = $mysqli->query($sql);
                                    $sl = 0;
                                    ?>
                                    <?php
                                    // TODAY DATE START (00:00:00)
                                    $todayStart = strtotime("today");

                                    // 1. Total Withdraw
                                    $result_total = $mysqli->query("SELECT SUM(amount) as total FROM withdraw_request");
                                    $totalWithdraw = $result_total->fetch_assoc()['total'] ?? 0;

                                    // 2. Today Withdraw
                                    $result_today = $mysqli->query("SELECT SUM(amount) as total FROM withdraw_request WHERE time >= $todayStart");
                                    $todayWithdraw = $result_today->fetch_assoc()['total'] ?? 0;

                                    // 3. Pending Withdraw
                                    $result_pending = $mysqli->query("
                                        SELECT SUM(amount) as total 
                                        FROM withdraw_request 
                                        WHERE status = " . Constant::WITHDRAW_STATUS['pending']
                                    );
                                    $pendingWithdraw = $result_pending->fetch_assoc()['total'] ?? 0;

                                    // 4. Approved Withdraw
                                    $result_approved = $mysqli->query("
                                        SELECT SUM(amount) as total 
                                        FROM withdraw_request 
                                        WHERE status = " . Constant::WITHDRAW_STATUS['approved']
                                    );
                                    $approvedWithdraw = $result_approved->fetch_assoc()['total'] ?? 0;
                                    ?>
                                    <div class="row" style="margin-bottom:20px;">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="card bg-primary text-white p-3" style="padding: 10px;border-radius: 20px">
                                                <h4>Total Withdraw</h4>
                                                <h2><?php echo number_format($totalWithdraw); ?> ৳</h2>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6">
                                            <div class="card bg-primary text-white p-3" style="padding: 10px;border-radius: 20px">
                                                <h4>Today Withdraw</h4>
                                                <h2><?php echo number_format($todayWithdraw); ?> ৳</h2>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6">
                                            <div class="card bg-primary text-white p-3" style="padding: 10px;border-radius: 20px">
                                                <h4>Pending Withdraw</h4>
                                                <h2><?php echo number_format($pendingWithdraw); ?> ৳</h2>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-6">
                                            <div class="card bg-primary text-white p-3" style="padding: 10px;border-radius: 20px">
                                                <h4>Approved Withdraw</h4>
                                                <h2><?php echo number_format($approvedWithdraw); ?> ৳</h2>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>SL</td>
                                                <td>Time</td>
                                                <td>Username</td>
                                                <td>Type</td>
                                                <td>Account Number</td>
                                                <td>Gateway</td>
                                                <td>Amount</td>
                                                <td>Status</td>
                                                <td>Action</td>
                                            </tr>

                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $member = QB::table('member')->where('id', $row['user_id'])->first();

                                                    $sl++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td><?php echo date('d/M/y',$row['time']); ?><br />
                                                        <?php echo date('h:i:sa',$row['time']); ?></td>
                                                        <td>
                                                            <strong>Username :</strong> <?php echo $member->username; ?><br />
                                                            <strong>Fullname :</strong> <?php echo $member->name; ?>
                                                        </td>
                                                        <td>
                                                          <?php
															if ($row['type'] == Constant::WITHDRAW_TYPE['bcash']) {
																echo '<span class="badge badge-primary">Bkash</span>&nbsp;';
																echo '<span class="badge badge-primary">' . 																									htmlspecialchars($row['account_type']) . '</span>';
															} elseif ($row['type'] == Constant::WITHDRAW_TYPE['nagad']) {
																echo '<span class="badge badge-primary">Nagad</span>&nbsp;';
																echo '<span class="badge badge-primary">' . 																									htmlspecialchars($row['account_type']) . '</span>';
															} elseif ($row['type'] == Constant::WITHDRAW_TYPE['rocket']) {
																echo '<span class="badge badge-primary">Rocket</span>&nbsp;';
																echo '<span class="badge badge-primary">' . 																									htmlspecialchars($row['account_type']) . '</span>';
															} elseif ($row['type'] == Constant::WITHDRAW_TYPE['bank']) {
																echo '<span class="badge badge-primary">Bank</span>&nbsp;'; 
																echo '<span class="badge badge-primary">' . 																									htmlspecialchars($row['bank_name']) . '</span>';
															} else {
																echo '<span class="badge badge-primary">Trc20</span>';
															}
															?>

                                                        </td>
                                                        <td><?php echo $row['account_number']; ?></td>
                                                        <td>
                                                             <?php
															if ($row['type'] == Constant::WITHDRAW_TYPE['bcash']) {
																echo '<span class="badge badge-primary">Bkash</span>&nbsp;';																									htmlspecialchars($row['account_type']) . '</span>';
															} elseif ($row['type'] == Constant::WITHDRAW_TYPE['nagad']) {
																echo '<span class="badge badge-primary">Nagad</span>&nbsp;';																									htmlspecialchars($row['account_type']) . '</span>';
															} elseif ($row['type'] == Constant::WITHDRAW_TYPE['rocket']) {
																echo '<span class="badge badge-primary">Rocket</span>&nbsp;';																									htmlspecialchars($row['account_type']) . '</span>';
															} elseif ($row['type'] == Constant::WITHDRAW_TYPE['bank']) {
																echo '<span class="badge badge-primary">Bank</span>&nbsp;'; 																									htmlspecialchars($row['bank_name']) . '</span>';
															} else {
																echo '<span class="badge badge-primary">Trc20</span>';
															}
															?>
                                                        </td>
                                                        <td><?php echo $row['amount']; ?><br />
                                                        <p style="font-size: 16px !important;" class="btn btn-success"><?php $per = $row['amount']/100*5;
                                                        
                                                            echo $amount = $row['amount']-$per;
                                                        
                                                         ?></p>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['status'] == Constant::WITHDRAW_STATUS['pending']) {
                                                                echo '<span class="badge badge-danger">Pending</span> ';
                                                            } else {
                                                                echo '<span class="badge badge-success">Approved</span> ';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['status'] == Constant::WITHDRAW_STATUS['pending']) {
                                                                echo '<form method="POST" action="" style="display:inline;">
                                                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                                                    <button type="submit" name="approved" class="btn btn-success">Approve</button>
                                                                </form>';
                                                            } else {
                                                                echo '<form method="POST" action="" style="display:inline;">
                                                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                                                    <button type="submit" name="pending" class="btn btn-danger">Pending</button>
                                                                </form>';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='7'>No records found</td></tr>";
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php require_once('footer.php'); ?>