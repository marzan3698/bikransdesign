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
                        <h2> <i class="fas fa-unlock-alt"></i> Dealer Product Request</h2>
                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="widgets-container">

                                    <h5>Dealer Product Request</h5>
                                    <hr>
                                   <a href="dealer_product_request.php?pending" class="btn btn-danger">Pending</a>
                                   <a href="dealer_product_request.php?approved" class="btn btn-success">Approved</a>
                                    <?php
                                        if (isset($_GET['pending'])) {
                                            $status = 0;
                                        } else if(isset($_GET['approved'])) {
                                            $status = 1;
                                        }
                                        $productRequest = $queryBuilder->table('product_request')
                                        ->where('status', $status)
                                        ->whereNotNull('dealar_id')
                                        ->groupBy('invoice_id')
                                        ->get();
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <tr class="bg-dark">
                                                <th class="text-center">SL</th>
                                                <th class="text-center">Invoice NO</th>
                                                <th class="text-center">Dealer</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>

                                            <?php
                                            // Initialize a counter for SL column
                                            $sl = 1;

                                            // Check if there are any records
                                            if (count($productRequest) > 0) {
                                                // Loop through each record (use object property access)
                                                foreach ($productRequest as $request) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $sl++; ?></td>
                                                        <td>#<?php echo $request->invoice_id; ?></td>
                                                        <?php 
                                                            $delar = $queryBuilder->table('dealer')->where('id', $request->dealar_id)->first();
                                                        ?>
                                                        <td><?php echo $delar->dealer_name; ?></td>
                                                        <td><?php echo date('d-m-Y', $request->time); ?></td>
                                                        <td>
                                                            <?php 
                                                               if (isset($_GET['pending'])) {
                                                                   echo '<span class="badge" style="background:red">Pending</span>';
                                                                } else if(isset($_GET['approved'])) {
                                                                    echo '<span class="badge" style="background:green">Approved</span>';
                                                                }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="product_request_view.php?id=<?php echo $request->invoice_id; ?>" class="btn btn-info">View</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="6">No records found.</td>
                                                </tr>
                                            <?php
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