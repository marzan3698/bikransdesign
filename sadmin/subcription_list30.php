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
                        <h2> <i class="fas fa-users"></i> Subcription List </h2>
                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="widgets-container">

                                    <h5>30 Days Subcription List</h5>
                                    <hr />
                                   

                                    <?php
        
                                        $query = $queryBuilder->table('member')
                                            ->orderBy('id', 'desc')
                                            ->get();
                                   
                                    $sl = 1;
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="table-layout: fixed; width: 100%;">
                                            <tr>
                                                <td style="width: 40px;" class="text-center">SL</td>
                                                <td>Days</td>
                                                
                                                <td>Username</td>
                                                <td style="width: 100px;">Date</td>
                                                <td>Password</td>
                                                <td>Phone</td>
                                                <td>Refer ID</td>
                                                <td>Placement</td>
                                                <td>Action</td>
                                            </tr>

                                            <?php
                                            // Display results
                                            foreach ($query as $row) {
                                                
                                                $subscription = QB::table('subscription')->where('user_id', $row->id)->orderBy('time', 'desc')->first();

            if ($subscription) {
                $lastSubDate = is_numeric($subscription->time) ? date('Y-m-d', $subscription->time) : $subscription->time;
            } else {
                $lastSubDate = date('Y-m-d', $row->joining_time);
            }
            
            $today = date('Y-m-d');

            $lastSubDateObj = new DateTime($lastSubDate);
            $todayObj = new DateTime($today);
            $interval = $lastSubDateObj->diff($todayObj);
            $monthDays = 30;
            $remainingDate = $monthDays - $interval->days;
            
            if($remainingDate <= 0){
                                                
                                            ?>
                                                <tr>
                                                    <td class="text-center"> <?php echo $sl++; ?></td>
                                                    <td style="background-color: yellow; text-align: center;"><strong style="font-size: 20px; color: red;"><?php echo $remainingDate; ?></strong></td>
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
                                                    <td><a class="badge badge-danger"><i class="fas fa-edit"></i> Edit</a></td>
                                                </tr>
                                            <?php } } ?>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <?php require_once('footer.php'); ?>