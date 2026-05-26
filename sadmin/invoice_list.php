<?php
    require_once('header.php');
 ?>
<body class="page-header-fixed ">
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.php"> <img class="logo-default" alt="logo" src="<?php echo LOGO ?>"> </a>
            </div>
            <div class="library-menu"> <span class="one">-</span> <span class="two">-</span> <span class="three">-</span> </div><div class="top-nev-mobile-togal"><i class="glyphicon glyphicon-cog"></i></div>
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
        
        
        
            <div class="page-content-wrapper animated fadeInRight">
  <div class="page-content" >
    <div class="row wrapper border-bottom page-heading">
      <div class="col-lg-12">
        <h2>User</h2>
       
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
        <!-- Basic Form start -->
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
              <h5>Invoice List</h5>
              <hr>
              <div class="row mt-5">
                    <div class="col-md-12">
                        <?php
                            // Fetching the invoice data based on user_id
                            $invoice = QB::table('order')
                                ->where('user_id', $_SESSION['user_id'])
                                ->orderBy('id', 'desc')
                                ->get();
                        ?>
                        <table class="table table-bordered text-center table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="background-color: #222;color: #fff; text-align:center">SL</th>
                                    <th style="background-color: #222;color: #fff; text-align:center">Invoice No</th>
                                    <th style="background-color: #222;color: #fff; text-align:center">User</th>
                                    <th style="background-color: #222;color: #fff; text-align:center">Date</th>
                                    <th style="background-color: #222;color: #fff; text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($invoice)) {
                                    $sl = 1; // Serial number
                                    foreach ($invoice as $inv) {
                                ?>
                                        <tr>
                                            <td><?php echo $sl++; ?></td>
                                            <td>#<?php echo $inv->id ?></td>
                                            <td>
                                                <?php
                                                    $user = QB::table('member')->where('id', $inv->user_id)->first();
                                                    echo $user->name;
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo date('d-M-Y', $inv->date); ?><br>
                                                <?php echo date('h:i:A', $inv->date); ?>
                                            </td>
                                            <td>
                                                <!-- Action buttons such as view or delete -->
                                                <a href="view_invoice.php?id=<?php echo $inv->id; ?>" class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No records found</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>