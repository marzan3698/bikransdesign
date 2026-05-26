<?php
require_once('header.php');
check_logged_in_admin();
?>
<style>
    .table td:nth-child(3) {
        width: 100px;
    }
</style>
</head>

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
                        <h2> <i class="fas fa-users"></i> User </h2>
                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="widgets-container">

                                    <h5>User Edit List</h5>
                                    <hr />
                                    <?php

                                    if (isset($_POST['submit'])) {
                                        $user_id = $_GET['user_id']; // Get the user ID from the URL
                                        $old_data = QB::table('member')->where('id', $user_id)->first();

                                        // Retrieve form data or fallback to old data
                                        $name = $_POST['name'] ?? $old_data->name;
                                        $nid_no = $_POST['nid_no'] ?? $old_data->nid_no;
                                        $phone = $_POST['phone'] ?? $old_data->phone;
                                        $delivery_address = $_POST['delivery_address'] ?? $old_data->delivery_address;
                                        $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $old_data->password;

                                        // Handle file uploads
                                        $image = $old_data->image;
                                        if (!empty($_FILES['image']['name'])) {
                                            $image = '../uploads/' . basename($_FILES['image']['name']);
                                            move_uploaded_file($_FILES['image']['tmp_name'], $image);
                                        }

                                        $document_front = $old_data->document_front;
                                        if (!empty($_FILES['document_front']['name'])) {
                                            $document_front = '../uploads/' . basename($_FILES['document_front']['name']);
                                            move_uploaded_file($_FILES['document_front']['tmp_name'], $document_front);
                                        }

                                        $document_back = $old_data->document_back;
                                        if (!empty($_FILES['document_back']['name'])) {
                                            $document_back = '../uploads/' . basename($_FILES['document_back']['name']);
                                            move_uploaded_file($_FILES['document_back']['tmp_name'], $document_back);
                                        }

                                        // Update the database
                                        $updated = QB::table('member')->where('id', $user_id)->update([
                                            'name' => $name,
                                            'nid_no' => $nid_no,
                                            'phone' => $phone,
                                            'delivery_address' => $delivery_address,
                                            'password' => $password,
                                            'image' => $image,
                                            'document_front' => $document_front,
                                            'document_back' => $document_back,
                                            'rank_se' => $_POST['rank_se'],
                                            'rank_mm' => $_POST['rank_mm'],
                                            'point' => $_POST['point'],
                                        ]);

                                        // Redirect or show success message
                                        if ($updated) {
                                            echo "User updated successfully!";
                                        } else {
                                            echo "Failed to update user!";
                                        }
                                    }
                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <?php
                                        $editUser = QB::table('member')->where('id', $_GET['user_id'])->first();
                                        ?>
                                        <div class="row my-5 p-5">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($editUser->name); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">NID</label>
                                                    <input type="text" class="form-control" name="nid_no" value="<?php echo htmlspecialchars($editUser->nid_no); ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Point</label>
                                                    <input type="text" class="form-control" name="point" value="<?php echo htmlspecialchars($editUser->point); ?>">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Phone</label>
                                                    <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($editUser->phone); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <input type="text" class="form-control" name="delivery_address" value="<?php echo htmlspecialchars($editUser->delivery_address); ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Uddokta Founder</label>
                                                    <input type="text" class="form-control" name="rank_se" value="<?php echo htmlspecialchars($editUser->rank_se); ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Uddokta Shonirvor</label>
                                                    <input type="text" class="form-control" name="rank_mm" value="<?php echo htmlspecialchars($editUser->rank_mm); ?>">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Password</label>
                                                    <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($editUser->show_password); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Photo</label>
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">NID Front</label>
                                                    <input type="file" class="form-control" name="document_front">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">NID Back</label>
                                                    <input type="file" class="form-control" name="document_back">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" name="submit" class="btn btn-success">UPDATE</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <?php require_once('footer.php'); ?>