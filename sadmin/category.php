<?php
    require_once('header.php');
 ?>
<body class="page-header-fixed ">
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="index.php"> <img class="logo-default" alt="logo" src="assets/images/logo.png"> </a>
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
        <h2>Product Category</h2>
       
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
        <!-- Basic Form start -->
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
              <h5>Category</h5>
              <hr>
              
              <?php
                $target_dir = "uploads/";
                $uploadOk = 1;
               
                
                // Check if file was uploaded without errors
                if(isset($_POST["submit"])) {
                    $target_file = $target_dir . basename($_FILES["images"]["name"]);
                    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    
                    if ($_FILES["images"]["error"] !== UPLOAD_ERR_OK) {
                        echo "Error: " . $_FILES["images"]["error"] . "<br>";
                        $uploadOk = 0;
                    }
               
                
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "<p class='alert alert-danger'> Sorry, file already exists </p>";
                    $uploadOk = 0;
                }
                
                // Check file size (5MB limit)
                if ($_FILES["images"]["size"] > 5000000) {
                    echo "Sorry, your file is too large.<br>";
                    $uploadOk = 0;
                }
                
                // Allow certain file formats (optional)
                $allowed_types = ["jpg", "png", "jpeg", "gif", "pdf"];
                if(!in_array($fileType, $allowed_types)) {
                    echo "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed.<br>";
                    $uploadOk = 0;
                }
                
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "<p class='alert alert-danger'>Sorry, your file was not uploaded</p>";
                } else {
                    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
                        
                        echo "<p class='alert alert-success'> The file ". htmlspecialchars(basename($_FILES["images"]["name"])). " has been uploaded.</p>";
                        
                        // Prepare an insert statement
                        $stmt = $mysqli->prepare("INSERT INTO cat (name, images) VALUES (?, ?)");
                        $stmt->bind_param("ss", $filename, $filepath);
                        
                        // Set parameters and execute
                        $filename = $mysqli->real_escape_string($_POST['c_name']);
                        $filepath = $target_file;
                        if ($stmt->execute()) {
                            ?>
                            <p class="alert alert-success">File information saved to the database</p>
                            
                            <?php
                        } else {
                            echo "Error: " . $stmt->error . "<br>";
                        }
                        
                        $stmt->close();
                    } else {
                        echo "Sorry, there was an error uploading your file.<br>";
                    }
                }
               
               }
                $mysqli->close();
                
               ?>
              
              <form action="" method="post" runat="server" enctype="multipart/form-data">
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <input name="c_name" required="" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter Category" type="text"/>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Images</label>
                  <input id="imgInp" accept="image/*" name="images" class="password form-control m-t-xxs" type="file"/>
                  <hr />
                  <img style="width: 200px; border-radius: 10px;" src="<?php echo LOGO; ?>" id="blah" src="#" alt="your image" />
                </div>
                
                <button name="submit" type="submit" class="btn aqua m-t-xs bottom15-xs">Submit</button>
              </form>
              
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
  <script type="text/javascript">
        imgInp.onchange = evt => {
          const [file] = imgInp.files
          if (file) {
            blah.src = URL.createObjectURL(file)
          }else {
            blah.src = "<?php echo LOGO; ?>"; // Reset to default image if no file is selected
          }
        }
  </script>  

<?php require_once('footer.php'); ?>