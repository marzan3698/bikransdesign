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
                <a href="index.php"> <img style="width: 30px;" class="logo-default" alt="logo" src="<?php echo LOGO; ?>"> </a>
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
        <h2> <i class="fas fa-unlock-alt"></i> Change Admin Password </h2>
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
      <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
            
              <h5>Change Password</h5>
              <hr>
              
            <?php
            
            if(isset($_POST['change_password'])){
                $new_password = $_POST['new_password'];
                $id = $_POST['id'];
                $password = $_POST['new_password'];
                
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $stmt = $mysqli->prepare("UPDATE setting SET password=?, main_password = ? WHERE id = ?");
                    if (!$stmt) {
                        die("MySQL error: " . $mysqli->error);
                    }
            
                    $stmt->bind_param("ssi", $password, $hashed_password, $id);
                    if (!$stmt->execute()) {
                        die("MySQL error: " . $stmt->error);
                    }
            ?>
            <div role="alert" class="alert alert-success"> <strong>Well done!</strong> You successfully Password updated. </div>
            <?php
            
                    $stmt->close();
            }
            
            if(isset($_GET['id'])){
                ?>
                <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input required="" name="new_password" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter Password" type="text">
                </div>
               
                <button name="change_password" type="submit" class="btn aqua m-t-xs bottom15-xs">Change Submit</button>
              </form>
                <hr />
                <?php
            }
                
              
        
        // Pagination variables
        $results_per_page = 10; // Number of results per page
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number, default is 1
        
        // Calculate the starting point of the results
        $start_index = ($current_page - 1) * $results_per_page;
        
        // Query to fetch total number of rows
        $count_query = "SELECT COUNT(*) AS total FROM setting";
        $count_result = $mysqli->query($count_query);
        $count_row = $count_result->fetch_assoc();
        $total_rows = $count_row['total'];
        
        // Calculate total number of pages
        $total_pages = ceil($total_rows / $results_per_page);
        
        // Query to fetch paginated data
        $query = "SELECT * FROM setting LIMIT ?, ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ii", $start_index, $results_per_page);
        $stmt->execute();
        $result = $stmt->get_result();
    ?>
        <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td>SL</td>
                <td>Username</td>
                <td>Password</td>
                <td>Action</td>
            </tr>
            <?php
            $sl=1;
            if ($result->num_rows > 0) {
            // Output data of each row using foreach loop
            foreach ($result as $row) {
            ?>
            <tr>
                <td><?php echo $sl++; ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td><?php echo htmlspecialchars($row['password']); ?></td>
                <td><a class="badge badge-warning" href="?id=<?php echo $row['id']; ?>"> <i class="fas fa-edit"></i> Edit</a></td>
            </tr>
            <?php 
            }
        } else {
            echo "<tr><td colspan='3'>No results found</td></tr>";
        }
            ?>
            
        </table>
        
            </div>

            
          </div>
        </div>
    </div>
        
                        
        

        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>