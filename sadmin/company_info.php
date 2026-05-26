<?php
    require_once('header.php');
 ?>
<body class="page-header-fixed ">
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.php"> <img class="logo-default" alt="logo" src="<?php echo LOGO; ?>"> </a>
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
        <h2>Update Company Information</h2>
        
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
        <!-- Basic Form start -->
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
            
              <hr/>
              
              <?php
              
              if(isset($_POST['submit'])){
                
                
                $cname = $mysqli->real_escape_string($_POST['cname']);
                $cmail = $mysqli->real_escape_string($_POST['cmail']);
                $cphone = $mysqli->real_escape_string($_POST['cphone']);
                $cnotice = $mysqli->real_escape_string($_POST['cnotice']);
             
                
                  // Prepare the UPDATE statement
                $stmt = $mysqli->prepare("UPDATE `company_info` SET `cname` = ?, `cmail` = ?, `cphone` = ?, `cnotice` =? WHERE `id` = 1");
                if (!$stmt) {
                    die("Prepare failed: " . $mysqli->error);
                }
            
                // Bind parameters
                $stmt->bind_param("ssss", $cname, $cmail, $cphone, $cnotice);
            
                // Execute the statement
                if ($stmt->execute()) {
                    echo '<div role="alert" class="alert alert-success"> <strong>Well done!</strong> You successfully updated. </div>';
                } else {
                    echo "Execute failed: " . $stmt->error;
                }
            
                // Close the statement
                $stmt->close();
                
             
              }
              
                $sql="SELECT * FROM `company_info` WHERE `id` = 1";
                $query=$mysqli->query($sql);
                while($row=$query->fetch_array()){
               ?>
              <form action="" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Company Name</label>
                  <input value="<?php echo htmlspecialchars($row['cname']) ?>" name="cname" class="form-control m-t-xxs" placeholder="Enter Name" type="text">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Company Email</label>
                  <input value="<?php echo htmlspecialchars($row['cmail']) ?>" name="cmail" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter email" type="text">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Company Phone</label>
                  <input value="<?php echo htmlspecialchars($row['cphone']) ?>"  name="cphone" class="form-control m-t-xxs"  placeholder="Enter Phone" type="text">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Company Update Notice</label>
                  <input value="<?php echo htmlspecialchars($row['cnotice']) ?>"  name="cnotice" class="form-control m-t-xxs"  placeholder="Enter Notice" type="text">
                </div>
                
                
                <button name="submit" type="submit" class="btn aqua m-t-xs bottom15-xs">Submit</button>
              </form>
              <?php } ?>
              
              
            </div>
          </div>
        </div>
        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>