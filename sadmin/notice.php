<?php
require_once('header.php');
check_logged_in_admin();
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.js"></script>

<body class="page-header-fixed ">
  <div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
      <!-- BEGIN LOGO -->
      <div class="page-logo">
        <a href="index.php"> <img class="logo-default" alt="logo" src="<?php echo LOGO ?>"> </a>
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
            <h2>Notice</h2>

          </div>
        </div>
        <div class="wrapper-content ">
        <?php
          if (isset($_POST['submit'])) {
              $id = QB::table('notice')->first()->id;
              $time = time();
              $body = $_POST['body'];
              
              // Data to update
              $data = array(
                  'time' => $time,
                  'body' => $body,
              );

              // Update the record
              $update = $queryBuilder->table('notice')->where('id', $id)->update($data);
              
              if ($update) {
                  echo '<p class="alert alert-success">Notice Updated Successfully!</p>';
              } else {
                  echo '<p class="alert alert-danger">Failed to Update Notice.</p>';
              }
          }
          ?>

          <form action="" method="post">
            <div class="row justify-content-center" style="justify-content: center;">
              <div class="col-12">
                <textarea id="summernote" name="body"><?php echo QB::table('notice')->first()->body;?></textarea>
              </div>
              <div class="col-6"><br>
                <br>
                <button type="submit" name="submit" class="btn btn-info" style="width: 400px; margin-top:30px;display:block;margin:auto">Update Notice</button>
              </div>
            </div>
          </form>
        </div>
        <script>
          $('#summernote').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 100
          });
        </script>

        <?php require_once('footer.php'); ?>