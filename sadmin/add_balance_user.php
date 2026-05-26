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
        <h2>User</h2>
       
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
        <!-- Basic Form start -->
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
              <h5>Add Balance User</h5>
              <hr>
              
              <?php 
                if(isset($_POST['submit'])){
                    $time = time();
                    $username = $_POST['username'];
                    $amount = $_POST['amount'];
                    $note = $_POST['note'];
                    
                    $agent_id =  $queryBuilder->table('member')->where('username',$username)->first()->id;
                    
                    if($agent_id){
                    
                    $data = array(
                        'time' => $time,
                        'user_id' => $agent_id,
                        'cradit' => $amount,
                        'note' => $note,
                        'type' => 6
                    );
                    $insert = $queryBuilder->table('user_transection')->insert($data);
                    if($insert){
                        echo '<p class="alert alert-success">Balance Add OK;</p>';
                    }
                    
                    }else{
                        echo '<p class="alert alert-danger">The User ID is Invalid</p>';
                    }
                }
              ?>
              
                <form action="" method="post">
                    <table class="table table-bordered">
                        
                        <tr>
                            <td>
                                <p>Username</p>
                                <input type="text" name="username" class="form-control" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p>Amount</p>
                                <input type="number" name="amount" class="form-control" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p>Note</p>
                                <textarea class="form-control" name="note"></textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <input type="submit" name="submit" class="btn btn-danger" value="Add Balance User" />
                            </td>
                        </tr>
                        
                    </table>        
                
                    
                </form>
                
              
            </div>
          </div>
        </div>
        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>