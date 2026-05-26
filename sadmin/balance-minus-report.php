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
        <h2>Agent Add </h2>
       
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
        <!-- Basic Form start -->
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
              <h5>Balacne Minus Report</h5>
              <hr>
              
            <table class="table table-bordered table-striped text-center">
                <tr>
                    <td style="background: #222; color:#fff">SL</td>
                    <td style="background: #222; color:#fff">Date</td>
                    <td style="background: #222; color:#fff">Amount</td>
                    <td style="background: #222; color:#fff">Description</td>
                </tr>
                <?php $query=$queryBuilder->table('balance_minus')->orderBy('id','desc')->get();
                    $sl=1;
                ?>
                <?php
                foreach($query as  $row){
                 ?>
                <tr>
                    <td><?php echo $sl++; ?></td>
                    <td><?php echo date('d-M-Y', $row->time) ?></td>
                    <td><?php echo $row->amount; ?></td>
                    <td><?php echo $row->description; ?></td>
                </tr>
               <?php  } ?>
            </table>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>