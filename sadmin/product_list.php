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
                <a href="index.php"> <img class="logo-default" alt="logo" src="<?php echo LOGO; ?>"> </a>
            </div>
            <div class="library-menu"> <span class="one">-</span> <span class="two">-</span> <span class="three">-</span> </div>
            <div class="top-nev-mobile-togal"><i class="glyphicon glyphicon-cog"></i></div>
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
            <div class="page-content">
                <div class="row wrapper border-bottom page-heading">
                    <div class="col-lg-12">
                        <h2> <i class="fas fa-unlock-alt"></i> Product</h2>
                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                               
                                <div class="widgets-container">
                                    <h5>Product List</h5>
                                    <hr />
                                    <?php
                                    if (isset($_POST['update_product'])) {
                                        $p_name = $_POST['p_name'];
                                        $p_unit = $_POST['p_unit'];
                                        $p_des = $_POST['p_des'];
                                        $g_id = $_POST['g_id'];
                                        $edit_id = $_GET['edit_id'];
                                        $price = $_POST['price'];
                                        $main_price = $_POST['main_price'];
                                        $point = $_POST['point'];
                                        
                                      
                                    
                                        // Fetch existing image path
                                        $editdata = QB::table('product')->where('id', $edit_id)->first();
                                        $old_image = $editdata->images;
                                    
                                        // Handle new image upload
                                        if (!empty($_FILES['images']['name'])) {
                                            $target_dir = "uploads/";
                                            $new_image = $target_dir . basename($_FILES["images"]["name"]);
                                            move_uploaded_file($_FILES["images"]["tmp_name"], $new_image);
                                        } else {
                                            $new_image = $old_image; // Keep old image if no new file uploaded
                                        }
                                    
                                        // Update product using QB::table
                                        $update = QB::table('product')
                                            ->where('id', $edit_id)
                                            ->update([
                                                'name' => $p_name,
                                                'images' => $new_image,
                                                'unit' => $p_unit,
                                                'des' => $p_des,
                                                'cat_id' => $g_id,
                                                'price' => $price,
                                                'main_price' => $main_price,
                                                'point' => $point
                                                
                                            ]);
                                    
                                        if ($update) {
                                            echo "<script>alert('Product updated successfully!');window.location.href='product_list.php';</script>";
                                        } else {
                                            echo "<script>alert('Error updating product!');</script>";
                                        }
                                    }
                                ?>
                                    <?php
                                    if (isset($_GET['edit_id'])) {
                                        $editdata = QB::table('product')->where('id', $_GET['edit_id'])->first();
                                    ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Name</label>
                                                <input required="" name="p_name" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter Product Name" type="text" value="<?= $editdata->name ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Images</label>
                                                <input id="imgInp" accept="image/*" name="images" class="password form-control m-t-xxs" type="file" />
                                                <hr />

                                                <img style="width: 150px; height:150px  border-radius: 10px;" src="<?php echo $editdata->images ?>" id="blah" src="#" alt="your image" />
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Price</label>
                                                <input required="" name="price" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter Product Price" type="text" value="<?= $editdata->price ?>">
                                            </div>
                                            
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Product Main Price</label>
                                                <input required="" name="main_price" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter Product Main Price" type="text" value="<?= $editdata->main_price ?>">
                                            </div>
                                            

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Unit</label>
                                                <input required="" name="p_unit" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter Product Unit" type="text" value="<?= $editdata->unit ?>">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product point</label>
                                                <input required="" name="point" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter point" type="text" value="<?= $editdata->point ?>">
                                            </div>
                                            
                                            

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Description</label>
                                                <input required="" name="p_des" class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter Product Description" type="text" value="<?= $editdata->des ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Category</label>
                                                <select class="form-control" name="g_id">
                                                    <?php
                                                    $sql = "SELECT * FROM `cat`";
                                                    $query = $mysqli->query($sql);
                                                    while ($row = $query->fetch_array()) {
                                                        $selected = ($row['id'] == $editdata->g_id) ? 'selected' : '';
                                                    ?>
                                                        <option value="<?php echo $row['id'] ?>" <?php echo $selected; ?>><?php echo $row['name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>


                                            <button name="update_product" type="submit" class="btn aqua m-t-xs bottom15-xs">Update Product</button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>SL</td>
                                                <td>Name</td>
                                                <td>Price</td>
                                                <td>Images</td>
                                                <td>Action</td>
                                            </tr>

                                            <?php

                                            if (isset($_GET['detele'])) {
                                                $d_id = $_GET['detele'];

                                                $file_id = $d_id;
                                                $stmt = $mysqli->prepare("SELECT images FROM product WHERE id = ?");
                                                $stmt->bind_param("i", $file_id);
                                                $stmt->execute();
                                                $stmt->bind_result($filepath);
                                                $stmt->fetch();
                                                $stmt->close();

                                                if ($filepath && file_exists($filepath)) {
                                                    if (unlink($filepath)) {
                                                        $stmt = $mysqli->prepare("DELETE FROM product WHERE id = ?");
                                                        $stmt->bind_param("i", $file_id);
                                                        if ($stmt->execute()) {
                                                            $success_message = "The file has been deleted.<br>";
                                                        } else {
                                                            $error_message .= "Error: " . $stmt->error . "<br>";
                                                        }
                                                        $stmt->close();
                                                    } else {
                                                        $error_message .= "Error: Unable to delete the file from the server.<br>";
                                                    }
                                                } else {
                                                    $error_message .= "Error: File does not exist.<br>";
                                                }
                                                // $mysqli->close();
                                            }

                                            $sql = "SELECT * FROM `product`";
                                            $result = $mysqli->query($sql);
                                            $sl = 1;
                                            while ($row = $result->fetch_array()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $sl++; ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td>Price : <?php echo $row['price'] ?>
                                                        <br />Main Price : <?php echo $row['main_price'] ?>
                                                        <br />Point : <?php echo $row['point']; ?>
                                                        
                                                    </td>
                                                    <td><img style="width: 50px; border-radius: 10px;" src="<?php echo $row['images']; ?>" /></td>
                                                    <td>
                                                        <a href="product_list.php?edit_id=<?= $row['id'] ?>" class="badge badge-warning">Edit</a>
                                                        <a onclick="alert('Are you Sure To Delete')" href="?detele=<?php echo $row['id']; ?>" class="badge badge-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php require_once('footer.php'); ?>