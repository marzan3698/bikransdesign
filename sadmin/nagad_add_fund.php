.<?php
require_once('header.php');
check_logged_in_admin();
?>

<body class="page-header-fixed ">
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.php"> <img style="width: 30px;" class="logo-default" alt="logo" src="<?php echo LOGO; ?>"> </a>
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
                        <h2> <i class="fas fa-users"></i> Addfund Request List </h2>
                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="widgets-container">
 <style>
.modal-backdrop {
  background-color: transparent !important;
}
</style>                               
<!-- jQuery & Bootstrap 3.3.6 JS/CSS -->
<!-- ?? ????? ???? ?????? ????? ??? -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

                                    <h5>Addfund Request List</h5>
                                    <hr />
                                    <?php
                                    if (isset($_POST['approved'])) {
                                        $id = $_POST['id'];

                                        $sql_update_withdraw = "UPDATE addfund SET status = 2 WHERE id = $id";
                                        $mysqli->query($sql_update_withdraw);

                                        $sql_select_trans_id = "SELECT * FROM addfund WHERE id = $id LIMIT 1";
                                        $result = $mysqli->query($sql_select_trans_id);

                                        if ($result && $result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $time = time();
                                           $data = array(
                                                'time' => $time,
                                                'user_id' => $row['user_id'],
                                                'cradit' => $row['dollor'],
                                                'note' => '1',
                                                'type' => 7
                                            );
                                            $insert = $queryBuilder->table('user_transection')->insert($data);
                                            if($insert){
                                                echo '<p class="alert alert-success">Balance Add OK;</p>';
                                                ?>
                                                <script type="text/javascript">
                                                    window.location='nagad_add_fund.php';
                                                </script>
                                                <?php
                                            }
                                           
                                        } else {
                                            echo "No record found for the provided ID.";
                                        }
                                    }
                                    
                                    
                                        if (isset($_POST['cancel'])) {
                                        $id = $_POST['id'];

                                        $sql_update_withdraw = "UPDATE addfund SET status = 3 WHERE id = $id";
                                        if($mysqli->query($sql_update_withdraw)){
                                            ?>
                                                <script type="text/javascript">
                                                    window.location='add_fund.php';
                                                </script>
                                                <?php
                                        }
                                    }
                                    ?>

                                    <?php
                                        $where = "WHERE `type`='2'";

// check if date filtering applied
if (!empty($_GET['from']) && !empty($_GET['to'])) {
    $from = $_GET['from'] . " 00:00:00";
    $to   = $_GET['to']   . " 23:59:59";

    // convert to timestamp
    $from_time = strtotime($from);
    $to_time   = strtotime($to);

    $where .= " AND time BETWEEN $from_time AND $to_time";
}

$sql = "SELECT * FROM addfund $where ORDER BY id DESC";
$result = $mysqli->query($sql);
                                  

                                    $sl = 0;
                                    ?>
                                    <form method="GET" action="" class="row mb-3">
                                        <div class="col-md-3">
                                            <label>From Date</label>
                                            <input type="text" name="from" id="from" class="form-control" value="<?= isset($_GET['from']) ? $_GET['from'] : '' ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label>To Date</label>
                                            <input type="text" name="to" id="to" class="form-control" value="<?= isset($_GET['to']) ? $_GET['to'] : '' ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label>&nbsp;</label><br>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                            <a href="?" class="btn btn-secondary">Reset</a>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>SL</td>
                                                <td>Time</td>
                                                <td>Username</td>
                                                <td>Amount</td>
                                                
                                                <td>Sender Number</td>
                                                <td>Gateway </td>
                                                <td>TrxID</td>
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
                                                        <td><?php echo $sl; ?> #<?php echo $row['id']; ?></td>
                                                        <td><?php echo date('d/M/y',$row['time']); ?><br />
                                                        <?php echo date('h:i:sa',$row['time']); ?></td>
                                                        <td>
                                                            <strong>Username :</strong> <?php echo $member->username; ?><br />
                                                            <strong>Fullname :</strong> <?php echo $member->name; ?>
                                                        </td>
                                                        
                                            <td><?php echo $row['dollor']; ?></td>
                                                        <td>
                                                            <?php echo $row['number']; ?>
                                                        </td>
                                                        <td><?php echo $row['payment_method']; ?></td>
                                                        <td><?php echo $row['trxid']; ?></td>

                                                        <td>
                                                            <?php
                                                            if ($row['status'] == 2) {
                                                                echo '<span class="badge badge-danger">Approved </span> ';
                                                            }elseif($row['status'] == 3){
                                                                 echo '<span class="btn btn-warning">Cancel </span> ';
                                                            }
                                                             else {
                                                                echo '<span class="badge badge-success">Pending</span> ';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row['status'] == 2) {
                                                              ?>
                                                              <button type="submit" class="btn btn-success">Approve</button>
                                                              <?php
                                                            }elseif($row['status'] == 3){
                                                                echo '<span class="btn btn-warning">Cancel </span> ';
                                                            } else {
                                                                echo '<form method="POST" action="" style="display:inline;">
                                                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                                                    <button type="submit" name="approved" class="btn btn-danger">Pending</button>
                                                                </form>';
                                                                
                                                                 echo '<form method="POST" action="" style="display:inline;">
                                                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                                                    <button type="submit" name="cancel" class="btn btn-warning">cancel</button>
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


                <?php //require_once('footer.php'); ?>
                <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
                <script>
                    $(function() {
                        $("#from, #to").datepicker({
                            dateFormat: "yy-mm-dd"
                        });
                    });
                </script>