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
                        <h2> <i class="fas fa-users"></i>Number Withdraw Request </h2>
                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="widgets-container">

                                    <h5>Number Withdraw Request </h5>
                                    <hr />
                              
                                    <div class="table-responsive">
                                    
                                    <form action="" method="post">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>
                                                    <input type="number" name="number" class="form-control" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="submit" name="submit" class="btn btn-danger" /></td>
                                            </tr>
                                        </table>
                                    </form>
                                    
                                    <table class="table-bordered table">
                                        <tr>
                                            <td>Total User</td>
                                            <td>10</td>
                                        </tr>
                                        <tr>
                                            <td>Total Withdraw</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>5% cash amount</td>
                                            <td>95</td>
                                        </tr>
                                        <tr>
                                            <td>ইবাদত</td>
                                            <td>5</td>
                                        </tr>
                                    </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php require_once('footer.php'); ?>