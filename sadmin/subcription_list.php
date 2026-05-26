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

                                    <h5>Subcription List</h5>
                                    <hr />
                                    <!-- <form action="" method="post">
                                        <input type="text" name="search" class="form-control" placeholder="Search Username" style="width: 80%; display:inline" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">
                                        <button type="submit" class="btn btn-danger" style="width: 10%; display:inline">Search</button>
                                    </form> -->

                                    <?php
                                    // Capture search input
                                    $search = isset($_POST['search']) ? $_POST['search'] : '';

                                    // Build query with search condition if search term is provided
                                    if (!empty($search)) {
                                        $query = $queryBuilder->table('subscription')
                                            ->where('username', 'LIKE', '%' . $search . '%')
                                            ->orderBy('id', 'desc')
                                            ->get();
                                    } else {
                                        $query = $queryBuilder->table('subscription')
                                            ->orderBy('id', 'desc')
                                            ->get();
                                    }

                                    $sl = 1;
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="table-layout: fixed; width: 100%;">
                                            <tr>
                                                <td style="width: 40px;" class="text-center">SL</td>
                                                <td>User</td>
                                                <td style="width: 100px;">Date</td>
                                                <td>Subcription Amount</td>
                                            </tr>

                                            <?php
                                            // Display results
                                            foreach ($query as $row) {
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $sl++; ?></td>
                                                    <?php 
                                                        $member = QB::table('member')->where('id', $row->user_id)->first();
                                                    ?>
                                                    <td>
                                                        <strong>Name:</strong>  <?php echo $member->name; ?><br>
                                                        <strong>Username:</strong>  <?php echo $member->username; ?>
                                                    </td>
                                                    <td><strong><?php echo date('d-M-Y', $row->time); ?></strong></td>

                                                    <td><strong></strong> <?php echo $row->purchase_amount; ?></td>
                                                    
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <?php require_once('footer.php'); ?>