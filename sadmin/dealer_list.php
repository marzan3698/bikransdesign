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
                        <h2> <i class="fas fa-unlock-alt"></i> Dealer</h2>
                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="widgets-container">

                                    <h5>Dealer list</h5>
                                    <hr>

                                    <?php

                                    if (isset($_POST['change_password'])) {
                                        $new_password = $_POST['new_password'];
                                        $id = $_POST['id'];
                                        $dealer_name = $_POST['dealer_name'];
                                        $address = $_POST['address'];
                                        $phone = $_POST['phone'];

                                        // Hash the new password
                                        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                                        // Prepare the SQL update statement to update all fields
                                        $stmt = $mysqli->prepare("UPDATE dealer SET dealer_name=?, address=?, phone=?, show_password=?, password=? WHERE id=?");
                                        if (!$stmt) {
                                            die("MySQL error: " . $mysqli->error);
                                        }

                                        // Bind parameters to the SQL statement
                                        $stmt->bind_param("sssssi", $dealer_name, $address, $phone, $new_password, $hashed_password, $id);

                                        // Execute the statement and check for errors
                                        if (!$stmt->execute()) {
                                            die("MySQL error: " . $stmt->error);
                                        }
                                    ?>
                                        <div role="alert" class="alert alert-success"> <strong>Well done!</strong> You successfully updated the dealer information and password. </div>
                                    <?php

                                        $stmt->close();
                                    }

                                    if (isset($_GET['id'])) {
                                        // Fetch the current dealer information from the database
                                        $stmt = $mysqli->prepare("SELECT dealer_name, address, phone, show_password FROM dealer WHERE id = ?");
                                        $stmt->bind_param("i", $_GET['id']);
                                        $stmt->execute();
                                        $stmt->bind_result($dealer_name, $address, $phone, $password);
                                        $stmt->fetch();
                                        $stmt->close();
                                    ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                                            <tr>
                                                <td>
                                                    <p>Dealer Name</p>
                                                    <input type="text" name="dealer_name" class="form-control" value="<?php echo $dealer_name; ?>" placeholder="Name" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Dealer address</p>
                                                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Address" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Dealer Phone</p>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" placeholder="Phone" />
                                                </td>
                                            </tr>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Password</label>
                                                <input required="" name="new_password" class="form-control m-t-xxs" id="exampleInputEmail1" value="<?php echo $password; ?>" placeholder="Enter Password" type="text">
                                            </div>

                                            <button name="change_password" type="submit" class="btn aqua m-t-xs bottom15-xs">Change Submit</button>
                                        </form>
                                        <hr />
                                    <?php
                                    }



                                    $results_per_page = 10;
                                    $current_page = isset($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;

                                    $start_index = ($current_page - 1) * $results_per_page;

                                    $count_query = "SELECT COUNT(*) AS total FROM dealer";
                                    $count_result = $mysqli->query($count_query);
                                    $count_row = $count_result->fetch_assoc();
                                    $total_rows = $count_row['total'];

                                    $total_pages = ceil($total_rows / $results_per_page);

                                    $query = "SELECT * FROM dealer ORDER BY id DESC  LIMIT ?, ?";
                                    $stmt = $mysqli->prepare($query);
                                    $stmt->bind_param("ii", $start_index, $results_per_page);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>SL</td>
                                                <td>Dealer Name</td>
                                                <td>Dealer Username</td>
                                                <td>Password</td>
                                                <td>Action</td>
                                            </tr>
                                            <?php
                                            $sl = $start_index + 1;
                                            if ($result->num_rows > 0) {
                                                foreach ($result as $row) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $sl++; ?></td>
                                                        <td><?php echo htmlspecialchars($row['dealer_name']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['dealer_username']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['show_password']); ?></td>
                                                        <td><a class="badge badge-warning" href="?id=<?php echo $row['id']; ?>"> <i class="fas fa-edit"></i> Edit</a></td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='4'>No results found</td></tr>";
                                            }
                                            ?>
                                        </table>
                                    </div>

                                    <?php
                                    if ($total_pages > 1) {
                                        echo '<nav aria-label="Page navigation example">';
                                        echo '<ul class="pagination">';

                                        if ($current_page > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page - 1) . '">Previous</a></li>';
                                        }

                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            if ($i == $current_page) {
                                                echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
                                            } else {
                                                echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                            }
                                        }

                                        if ($current_page < $total_pages) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page + 1) . '">Next</a></li>';
                                        }

                                        echo '</ul>';
                                        echo '</nav>';
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>





                    </div>
                </div>


                <?php require_once('footer.php'); ?>