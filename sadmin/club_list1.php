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
        
        <a href="club_list1.php" class="btn btn-danger">Club List 2</a>
        
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
              <h5>Club List</h5>
              <hr>
              
                <table class="table table-bordered">
                        <tr style="background-color: black; color: white;">
                            <td>SL</td>
                            <td>Date</td>
                            <td>Username</td>
                            <td>Amount</td>
                        </tr>
                        <?php
                        $query = $queryBuilder->table('board2')->get();
                        $sl = 1;
                        foreach ($query as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo date('Y-m-d H:i:s a', $row->time); ?></td>
                                <td><?php echo find_user_name($row->user_id) ?></td>
                                <td><?php echo $row->amount; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
              
            </div>
          </div>
        </div>
        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>