<div class="top-menu">
<!--  TOP NAVIGATION MENU -->

                <div class="hor-menu  hor-menu-light hidden-sm hidden-xs">
            
                    <ul class="nav navbar-nav">
                    
                    <p style="padding:7px; color: white; font-size: 20px;"><?php echo date('l jS \of F Y h:i:s A'); ?> <?php echo $_SESSION['admin']; ?> : ID : <?php echo $_SESSION['admin_id']; ?></p>
                        <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
                        

                        <?php // require_once('mega_menu.php'); ?>
                        
                    </ul>

                </div>
                <!--  TOP NAVIGATION MENU -->
               
                <ul class="nav navbar-nav pull-right">
                
                <!-- Meessages Notification -->
                
                <?php /*
                
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle count-info"> <i class="fa fa-envelope"></i> <span class="badge badge-info">6</span> </a>
                        <ul class="dropdown-menu dropdown-messages menuBig">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="pull-left" href="profile.html"> <img src="assets/images/teem/placeholders.jpg" class="img-circle" alt="image"> </a>
                                    <div class="media-body"> <small class="pull-right">46h ago</small> <strong>Mike Loreipsum</strong> started following <strong>Olivia Wenscombe</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small> </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="pull-left" href="profile.html"> <img src="assets/images/teem/placeholders.jpg" class="img-circle" alt="image"> </a>
                                    <div class="media-body "> <small class="pull-right text-navy">5h ago</small> <strong> Alex Smith </strong> started following <strong>Olivia Wenscombe</strong>. <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small> </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="pull-left" href="profile.html"> <img src="assets/images/teem/placeholders.jpg" class="img-circle" alt="image"> </a>
                                    <div class="media-body "> <small class="pull-right">23h ago</small> <strong>Olivia Wenscombe</strong> love <strong>Sophie </strong>. <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small> </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html"> <i class="fa fa-envelope"></i> <strong>Read All Messages</strong> </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    
                    */ ?>
                    <!-- START USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user">
                        <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="javascript:;"> <img src="<?php echo FAV_ICON; ?>" class="img-circle" alt=""> <span class="username username-hide-on-mobile"> <?php echo TITLE; ?></span> <i class="fa fa-angle-down"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="company_info.php"> <i class="icon-user"></i>Company Profile</a>

                            </li>
                            <li>
                                <a href="setting.php"> <i class="icon-user"></i> Setting </a>
                            </li>
                          
                            <li>
                                <a href="logout.php"> <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>