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
              <h5>Basic Form </h5>
              <hr>
           <?php
if (isset($_POST['submit'])) {
    // Get the form data
    $agent_username = $_POST['a_code'];
    
    // Check if the agent username already exists in the database
    $existingAgent = $queryBuilder->table('agent')->where('agent_username', $agent_username)->first();
    
    if ($existingAgent) {
        // Username already exists, show an error message
        echo '<p class="alert alert-danger">Agent Username already exists. Please choose a different username.</p>';
    } else {
        // Username is unique, proceed with the insertion
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $data = array(
            'agent_name' => $_POST['agent_name'],
            'agent_username' => $agent_username,
            'show_password' => $_POST['password'],
            'password' => $hashedPassword
        );
        
        // Insert the new agent into the database
        $insertId = $queryBuilder->table('agent')->insert($data);

        if ($insertId) {
            echo '<p class="alert alert-success">Agent Added Successfully.</p>';
        }
    }
}
?>
            
                <form action="" method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <p>Agent Name</p>
                                <input type="text" name="agent_name" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Agent Username/Code</p>
                                <input type="text" name="a_code" class="form-control" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p>Agent Password</p>
                                <input type="text" name="password" class="form-control" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td><input type="submit" name="submit" class="btn btn-danger" /> </td>
                            
                        </tr>
                    </table>
                </form>
            
            </div>
          </div>
        </div>
        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>