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
        
            <div class="page-content-wrapper animated fadeInRight">
  <div class="page-content" >
    <div class="row wrapper border-bottom page-heading">
      <div class="col-lg-12">
        <h2> Form Stuff </h2>
       
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
       
       <form action="" method="get">
        <div class="row">
          <div class="col-4">
            <label for="">select package</label>
            <select name="package" class="form-control">
                <option value="">Select Package</option>
                <option value="1">TBBP</option>
                <option value="2">ARRP</option>
                <option value="3">DBS</option>
            </select>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-danger">Search</button>
            <a href="deposit_list.php" class="btn btn-danger">Clear filter</a>
          </div>
        </div>
       </form>
       <table class="table table-bordered">
                                            
                                        <tr>
                                            <td>SL</td>
                                            <td>Date</td>
                                            <td>Package</td>
                                            <td>Username</td>
                                            <td>Amount</td>
                                            <td>Package</td>
                                            
                                        </tr>
                                    
                                    <?php
                                      if(isset($_GET['package'])){
                                        $query = $queryBuilder->table('deposite')->where('package', $_GET['package'])->get();
                                      }else{
                                        $query = $queryBuilder->table('deposite')->get();
                                      }
                                          $sl=1;
                                        foreach($query as $row){ 
                        
                                     ?>
                                     <tr>
                                        <td><?php echo $sl++; ?></td>
                                        <td><?php echo date('Y-m-d H:i:s a',$row->time); ?></td>
                                        <td>
                                          <?= Constant::PACKAGE[$row->package]['price'] ?? 0 ?>
                                        </td>
                                        <td><?php echo find_user_name($row->user_id); ?></td>
                                        
                                        <td><?php echo $row->amount; ?></td>
                                        <td>
                                          <?php
                                            if($row->package == 1){
                                              echo 'TBBP';
                                            }elseif($row->package == 2){
                                              echo 'ARRP';
                                            }elseif($row->package == 3){
                                              echo 'DBS';
                                            }
                                          ?>
                                        </td>
                                        
                                     </tr>
                                     <?php } ?>
                                    </table>
        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>