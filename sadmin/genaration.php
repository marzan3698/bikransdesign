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
        <h2> <i class="fas fa-unlock-alt"></i> Genaration </h2>
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
      <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
            
              <h5>Genaration</h5>
              <hr>
              
              <?php
                    
                    if(isset($_POST['submit'])){
                        $data = array(
                            'gen1' => $_POST['gen1'],
                            'gen2' => $_POST['gen2'],
                            'gen3' => $_POST['gen3'],
                            'gen4' => $_POST['gen4'],
                            'gen5' => $_POST['gen5'],
                            'gen6' => $_POST['gen6'],
                            'gen7' => $_POST['gen7'],
                            'gen8' => $_POST['gen8'],
                            'gen9' => $_POST['gen9'],
                            'gen10' => $_POST['gen10'],
                            'gen11' => $_POST['gen11'],
                            'gen12' => $_POST['gen12'],
                            'gen13' => $_POST['gen13'],
                            'gen14' => $_POST['gen14'],
                            'gen15' => $_POST['gen15']
                            
                        );
                        
                        $update = $queryBuilder->table('genaration')->where('id', 1)->update($data);
                        
                        if($update){
                            echo '<p class="alert alert-success">Update Done;</p>';
                        }
                    }
                
              ?>
              
            
            <form action="" method="post">
         
         <?php
            $gen = $queryBuilder->table('genaration')->get();
            foreach($gen as $row){
          ?>
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <p>1st</p>
                            <input type="text" name="gen1" value="<?php echo $row->gen1; ?>" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>2nd</p>
                            <input value="<?php echo $row->gen2; ?>"type="text" name="gen2" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>3rd</p>
                            <input value="<?php echo $row->gen3; ?>" type="text" name="gen3" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>4th</p>
                            <input value="<?php echo $row->gen4; ?>" type="text" name="gen4" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>5th</p>
                            <input value="<?php echo $row->gen5; ?>" type="text" name="gen5" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>6th</p>
                            <input value="<?php echo $row->gen6; ?>" type="text" name="gen6" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>7th</p>
                            <input value="<?php echo $row->gen7; ?>" type="text" name="gen7" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>8th</p>
                            <input value="<?php echo $row->gen8; ?>" type="text" name="gen8" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>9th</p>
                            <input value="<?php echo $row->gen9; ?>"  type="text" name="gen9" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>10th</p>
                            <input value="<?php echo $row->gen10; ?>" type="text" name="gen10" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>11th</p>
                            <input value="<?php echo $row->gen11; ?>" type="text" name="gen11" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>12th</p>
                            <input value="<?php echo $row->gen12; ?>" type="text" name="gen12" class="form-control" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <p>13th</p>
                            <input value="<?php echo $row->gen13; ?>" type="text" name="gen13" class="form-control" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <p>14th</p>
                            <input value="<?php echo $row->gen14; ?>" type="text" name="gen14" class="form-control" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <p>15th</p>
                            <input value="<?php echo $row->gen15; ?>" type="text" name="gen15" class="form-control" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="submit" name="submit" class="btn btn-danger" />
                        </td>
                    </tr>
                    
                </table>
                <?php } ?>
                
         
         </form>
            
            </div>

            
          </div>
        </div>
    </div>
        
                        
        

        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>