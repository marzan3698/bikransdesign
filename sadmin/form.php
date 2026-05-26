<?php
    require_once('header.php');
 ?>
<body class="page-header-fixed ">
<div class="page-header navbar navbar-fixed-top">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner ">
    <!-- BEGIN LOGO -->
    <div class="page-logo"> <a href="index.html"> <img class="logo-default" alt="logo" src="assets/images/logo.png"> </a> </div>
    <!-- END LOGO -->
    <div class="library-menu"> <span class="one">-</span> <span class="two">-</span> <span class="three">-</span> </div><div class="top-nev-mobile-togal"><i class="glyphicon glyphicon-cog"></i></div>
    <!-- BEGIN TOP NAVIGATION MENU -->
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
        <h2> Form Stuff </h2>
        <ol class="breadcrumb">
          <li> <a href="index.html">Home</a> </li>
          <li> <a>UI Features</a> </li>
          <li class="active"> <strong> Form Stuff </strong> </li>
        </ol>
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
        <!-- Basic Form start -->
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
              <h5>Basic Form </h5>
              <hr>
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input class="form-control m-t-xxs" id="exampleInputEmail1" placeholder="Enter email" type="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input name="password" class="password form-control m-t-xxs" id="exampleInputPassword1" placeholder="Password" type="password">
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                  <input class="form-check-input iCheck" type="checkbox">
                  Check me out </label>
                </div>
                <button type="submit" class="btn aqua m-t-xs bottom15-xs">Submit</button>
              </form>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
<!-- start footer -->
<div class="footer">
      <div class="pull-right">
        <ul class="list-inline">
          <li><a title="" href="index.html">Dashboard</a></li>
          <li><a title="" href="mailbox.html"> Inbox </a></li>
          <li><a title="" href="blog.html">Blog</a></li>
          <li><a title="" href="contacts.html">Contacts</a></li>
        </ul>
      </div>
      <div> <strong>Copyright</strong> AdminUI Company &copy; 2017 </div>
    </div>
  </div>
</div>
<!-- Go top -->
<a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
<!-- Go top -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/vendor/jquery.min.js"></script>
<script src="assets/js/vendor/validator.js"></script>
<!-- icheck -->
<script src="assets/js/vendor/icheck.js"></script>
<!-- bootstrap js -->
<script src="assets/js/vendor/bootstrap.min.js"></script>
<!-- slimscroll js -->
<script type="text/javascript" src="assets/js/vendor/jquery.slimscroll.js"></script>
<!-- pace js -->
<script src="assets/js/vendor/pace/pace.min.js"></script>
<!-- Sparkline -->
<script src="assets/js/vendor/jquery.sparkline.min.js"></script>
<!-- main js -->
<script src="assets/js/main.js"></script>

</body>
</html>
