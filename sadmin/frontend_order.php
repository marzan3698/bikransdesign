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

                                    <h5>Frontend order List</h5>
                                    <hr />
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>SL</td>
                                            <td>Date</td>
                                            <td>Name</td>
                                            <td>Phone</td>
                                            <td>Email</td>
                                            <td>District</td>
                                            <td>Post Code</td>
                                            <td>Address</td>
                                            <td>Total Order Amount</td>
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

                                        $sql = "SELECT * FROM `product_orders`";
                                        $result = $mysqli->query($sql);
                                        $sl = 1;
                                        while ($row = $result->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $sl++; ?></td>
                                                <td><?php echo date('d-m-Y', $row['time']); ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['phone'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['district'] ?></td>
                                                <td><?php echo $row['post_code'] ?></td>
                                                <td><?php echo $row['address'] ?></td>
                                                <td><?php echo $row['total_amount'] ?></td>
                                                <td>
                                                    <a href="frontend_order_view.php?id=<?php echo $row['id'] ?>">View</a>
                                                </td>
                                                <!-- <td><a class="badge badge-warning">Edit</a> <a onclick="alert('Are you Sure To Delete')" href="?detele=<?php echo $row['id']; ?>" class="badge badge-danger">Delete</a></td> -->
                                            </tr>

                                        <?php } ?>

                                    </table>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('footer.php'); ?>