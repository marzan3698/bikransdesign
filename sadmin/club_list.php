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
              <h5>Club List</h5>
              <hr>
              <a href="club_list.php?board=board2" class="btn btn-danger">Club List 2</a>
              <a href="club_list.php?board=board3" class="btn btn-danger">Club List 3</a>
              <a href="club_list.php?board=board4" class="btn btn-danger">Club List 4</a>
              <a href="club_list.php?board=board5" class="btn btn-danger">Club List 5</a>
              <a href="club_list.php?board=board6" class="btn btn-danger">Club List 6</a>
              <a href="club_list.php?board=board7" class="btn btn-danger">Club List 7</a>
              <a href="club_list.php?board=board8" class="btn btn-danger">Club List 8</a>
              <a href="club_list.php?board=board9" class="btn btn-danger">Club List 9</a>
              <a href="club_list.php?board=board10" class="btn btn-danger">Club List 10</a>
              
                <table class="table table-bordered">
                        <tr style="background-color: black; color: white;">
                            <td>SL</td>
                            <td>Date</td>
                            <td>Username</td>
                            <td>Amount</td>
                        </tr>
                        <?php
                        //$query = $queryBuilder->table('board1')->get();
                        
                        if(isset($_GET['board'])){
                            $table = $_GET['board'];
                        }else{
                            $table = 'board1';
                        }
                        
                        
                        $query = $queryBuilder->table($table)->get();
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