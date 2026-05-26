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
       
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
        <!-- Basic Form start -->
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
              <h4>User purchase package management system</h4>
              <hr>
              <a href="purchase_package.php?status=0" class="btn btn-danger">Pending</a>
              <a href="purchase_package.php?status=1" class="btn btn-success">Approved</a>
              <?php
              if (isset($_POST['approve'])) {
    $id = $_POST['data_id'];

    QB::table('purchase_package2')
        ->where('id', $id)
        ->update([
            'status' => 1,
        ]);

    echo 'Approve successfully';

    echo '<script>
            window.location = "purchase_package.php?status=0";
          </script>';
}

                $data = QB::table('purchase_package2')->where('status', $_GET['status'])->orderBy('id', 'desc')->get();
                $sl = 1;
              ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>User</th>
                            <th>Qty</th>
                            <th>Total Point</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $row){ ?>
                            <tr>
                                <td><?= $sl++ ?></td>
                                <td><?= date('d/m/Y', $row->date) ?></td>
                                <td>
                                    <?php 
                                        $user = QB::table('member')->where('id', $row->user_id)->first();
                                        echo $user->username; 
                                    ?>
                                </td>
                                <td><?= $row->qty ?></td>
                                <td><?= $row->bonus ?></td>
                                <td>
                                    <?php if($row->status == 0){ ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="data_id" value="<?php echo $row->id ?>">
                                            <button type="submit" class="btn btn-danger" name="approve" onclick="return confirm('Are you sure approve this purchase?')">Approve</button>
                                        </form>
                                    <?php }else{ ?>
                                        <span class="badge" style="background-color: green;">Approved</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>