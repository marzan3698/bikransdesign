<?php
    require_once('config.php');
    require_once('function.php');

    if(isset($_SESSION['admin'])){
        if(!isset($_SESSION['admin_session'])){ ?>
            <script>
                window.location.href = <?=$doaminName?>+"/master/logout.php";
            </script>
        <?php }
    }
    
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo TITLE; ?></title>
    <!-- Bootstrap -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo FAV_ICON; ?>" type="image/x-icon">
        
    <link href="assets/css/morris.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- slimscroll -->
    <link href="assets/css/jquery.slimscroll.css" rel="stylesheet">
    <!-- Fontes -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/simple-line-icons.css" rel="stylesheet">
    <!-- all buttons css -->
    <link href="assets/css/buttons.css" rel="stylesheet">
    <!-- animate css -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <!-- top nev css -->
    <link href="assets/css/page-header.css" rel="stylesheet">
    <!-- adminui main css -->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- red green theme css -->
    <link href="assets/css/red-green.css" rel="stylesheet">
    <!-- media css for responsive  -->
    <link href="assets/css/main.media.css" rel="stylesheet">
    
    <link href="css/b_css.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7ccc22197a.js" crossorigin="anonymous"></script>
    
    
   </head>
