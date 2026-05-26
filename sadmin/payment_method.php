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
        <h2>Agent</h2>
       
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
        <!-- Basic Form start -->
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
              <h5>Payment Method Management System</h5>
              <hr>
              <?php if(isset($_GET['create'])){ ?>
    <?php
        if (isset($_POST['payment_add'])) {

            $name = $_POST['name'];
            $number = $_POST['number'];
            $account_type = $_POST['account_type'];

            // -----------------------
            // IMAGE UPLOAD START
            // -----------------------
            $image = null;
            if (!empty($_FILES['image']['name'])) {
                $allowed_ext = ['jpg','jpeg','png','gif'];
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                if (in_array(strtolower($ext), $allowed_ext)) {
                    $image_name = time() . '_' . rand(1000,9999) . '.' . $ext;
                    $upload_path = "uploads/payment_method/" . $image_name;
                    move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
                    $image = $image_name;
                }
            }
            // -----------------------
            // IMAGE UPLOAD END
            // -----------------------

            QB::table('payment_method')->insert([
                'time' => time(),
                'name' => $name,
                'number' => $number,
                'account_type' => $account_type,
                'image' => $image,
            ]);

            echo '<script>window.location = "payment_method.php?success=1";</script>';
        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <label>Payment Method Name</label>
      <input type="text" class="form-control" name="name" required>
      <br>

      <label>Account Number</label>
      <input type="text" class="form-control" name="number" required>
      <br>

      <label>Account Type</label>
      <select name="account_type" class="form-control">
          <option value="Personal">Personal</option>
          <option value="Agent">Agent</option>
      </select>
      <br>

      <label>Image (jpg, jpeg, png, gif)</label>
      <input type="file" name="image" class="form-control">
      <br>

      <button type="submit" name="payment_add" class="btn btn-success w-100">Add</button>
    </form>

<?php } else if(isset($_GET['edit_id'])){ ?>

    <?php
        $old_data = QB::table('payment_method')->where('id', $_GET['edit_id'])->first();    

        if (isset($_POST['payment_update'])) {

            $id = $_GET['edit_id'];
            $name = $_POST['name'];
            $number = $_POST['number'];
            $account_type = $_POST['account_type'];

            // -----------------------
            // IMAGE UPDATE START
            // -----------------------
            $image = $old_data->image;

            if (!empty($_FILES['image']['name'])) {
                $allowed_ext = ['jpg','jpeg','png','gif'];
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                if (in_array(strtolower($ext), $allowed_ext)) {

                    // old image delete
                    if (!empty($image) && file_exists("uploads/payment_method/" . $image)) {
                        unlink("uploads/payment_method/" . $image);
                    }

                    // upload new
                    $image_name = time() . '_' . rand(1000,9999) . '.' . $ext;
                    $upload_path = "uploads/payment_method/" . $image_name;
                    move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);

                    $image = $image_name;
                }
            }
            // -----------------------
            // IMAGE UPDATE END
            // -----------------------

            QB::table('payment_method')->where('id', $id)->update([
                'time' => time(),
                'name' => $name,
                'number' => $number,
                'account_type' => $account_type,
                'image' => $image,
            ]);

            echo '<script>window.location = "payment_method.php?success=2";</script>';
        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <label>Payment Method Name</label>
      <input type="text" class="form-control" name="name" value="<?= $old_data->name ?>" required>
      <br>

      <label>Account Number</label>
      <input type="text" class="form-control" name="number" value="<?= $old_data->number ?>" required>
      <br>

      <label>Account Type</label>
      <select name="account_type" class="form-control">
          <option value="Personal" <?= $old_data->account_type=='Personal'?'selected':'' ?>>Personal</option>
          <option value="Agent" <?= $old_data->account_type=='Agent'?'selected':'' ?>>Agent</option>
      </select>
      <br>

      <label>Image (jpg, jpeg, png, gif)</label>
      <input type="file" name="image" class="form-control">
      <br>

      <?php if(!empty($old_data->image)){ ?>
          <img src="uploads/payment_method/<?= $old_data->image ?>" height="80"><br><br>
      <?php } ?>

      <button type="submit" name="payment_update" class="btn btn-success w-100">Update</button>
    </form>

<?php } else { ?>

    <a href="payment_method.php?create" class="btn btn-success">
        <i class="fa fa-plus"></i> Add New
    </a>

    <?php if(isset($_GET['success']) && $_GET['success']==1){ ?>
        <div class="alert alert-success">Payment Method added successfully!</div>
    <?php } ?>

    <?php if(isset($_GET['success']) && $_GET['success']==2){ ?>
        <div class="alert alert-warning">Payment Method updated successfully!</div>
    <?php } ?>

    <?php if(isset($_GET['success']) && $_GET['success']==3){ ?>
        <div class="alert alert-danger">Payment Method deleted successfully!</div>
    <?php } ?>

    <?php  
        if(isset($_POST['delete'])){
            $id = $_POST['deleted_id'];

            // delete old image
            $del = QB::table('payment_method')->where('id', $id)->first();
            if(!empty($del->image) && file_exists("uploads/payment_method/" . $del->image)){
                unlink("uploads/payment_method/" . $del->image);
            }

            QB::table('payment_method')->where('id', $id)->delete();
            echo '<script>window.location = "payment_method.php?success=3";</script>';
        }

        $data = QB::table('payment_method')->orderBy('id', 'desc')->get();
        $sl = 1;
    ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Payment Method</th>
                <th>Account Type</th>
                <th>Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $row){ ?>
            <tr>
                <td><?= $sl++ ?></td>

                <td>
                    <?php if(!empty($row->image)){ ?>
                        <img src="uploads/payment_method/<?= $row->image ?>" height="50">
                    <?php } else { ?>
                        No Image
                    <?php } ?>
                </td>

                <td><?= $row->name ?></td>
                <td><?= $row->account_type ?></td>
                <td><?= $row->number ?></td>

                <td>
                    <a href="payment_method.php?edit_id=<?= $row->id ?>" class="btn btn-info btn-sm">Edit</a>

                    <form action="" method="post" style="display:inline-block;">
                        <input type="hidden" name="deleted_id" value="<?= $row->id ?>">
                        <button type="submit" name="delete" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure delete this payment method??')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php } ?>

         
                
              
            </div>
          </div>
        </div>
        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>