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
        <!-- Start page content wrapper -->
        
            <div class="page-content-wrapper animated fadeInRight">
  <div class="page-content" >
    <div class="row wrapper border-bottom page-heading">
      <div class="col-lg-12">
        <h2> Form Stuff </h2>
       
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
      
        <table class="table table-bordered text-center">
                        <tr class="bg-info">
                            <td>SL</td>
                            <td>Date</td>
                            <td>Username</td>
                            <td>Amount</td>
                        </tr>
                        
                        <?php
                                $query = $queryBuilder->table('user_transection')->where('his','95')->get();
                                $sl=1;
                                foreach($query as $row){ 
                                ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo date('Y-m-d H:i:s',$row->time);?></td>
                            <td><?php echo find_user_name($row->user_id); ?></td>
                            <td><?php echo $row->cradit; ?></td>
                        </tr>
                        <?php } ?>
                        
                    </table>
        
        
        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>