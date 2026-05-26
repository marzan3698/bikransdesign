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
        <h2>  </h2>
       
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
        <!-- Basic Form start -->
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
              <h1>Account</h1>
              <hr>
              
              <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Summary</title>
    <style>
        table {
            width: 50%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

    <h2 style="text-align: center; font-size: 30px;"><strong>Business Summary</strong></h2>
    <table class="table table-bordered" style="font-size: 20px; color: black;">
      
        <tr>
            <td style="width: 30%;">Total Joining ID</td>
            <td><?php $member = $queryBuilder->table('member')->count('*');
            echo $member;
             ?></td>
        </tr>
        <tr>
            <td>Total Joining ID Sales</td>
            <td><?php
$total_sales = QB::query("SELECT SUM(total_price) AS total FROM purchase_package")->first()->total;
$total_sales = $total_sales;

echo $total_sales;
?>
</td>
        </tr>
        <tr>
            <td>Total Subscription ID</td>
            <td><?php $member_s = $queryBuilder->table('subscription')->count('*');
            echo $member_s;
             ?></td>
        </tr>
        <tr>
            <td>Total Subscription Sales</td>
            <td><?php
$total_sales_s = QB::query("SELECT SUM(purchase_amount) AS total FROM subscription")->first()->total;

echo $total_sales_s;

$total_sales = $total_sales + $total_sales_s;
?></td>
        </tr>
        <tr>
            <td>Total Sales Commission (24%)</td>
            <td><?php echo $total_24 = $total_sales/100*24; ?></td>
        </tr>
        <tr>
            <td>Total Sales Commission on ID</td>
            <td> <?php
            $totalCommission = QB::query("SELECT SUM(amount) AS total FROM gen_his")->first()->total;
            echo $totalCommission;
            ?></td>
        </tr>
        <tr>
            <td>Rest of Amount of Sales Commission</td>
            <td><?php echo $total_24-$totalCommission; ?></td>
        </tr>
        <tr>
            <td>Total Stockiest Commission (5%)</td>
            <td><?php echo $total_5 = $total_sales/100*5; ?></td>
        </tr>
        <tr>
            <td>Total Stockiest Commission on ID</td>
            <td><?php
$sto_totalCommission = QB::query("SELECT SUM(credit) AS total FROM agent_transection WHERE type = 1")->first()->total;
echo $sto_totalCommission;
?>
</td>
        </tr>
        <tr>
            <td>Total Rank Incentive (5%)</td>
            <td><?php echo $total_5 = $total_sales/100*5; ?></td>
        </tr>
        <tr>
            <td>Total Rank Incentive on ID</td>
            <td></td>
        </tr>
        <tr>
            <td>Rest of Amount of Rank Incentive</td>
            <td></td>
        </tr>
        <tr>
            <td>Total Commission on ID</td>
            <td><?php
$user_totalCommission = QB::query("SELECT SUM(cradit) AS total FROM user_transection WHERE type = 1")->first()->total;
echo $user_totalCommission;
?></td>
        </tr>
        <tr>
            <td>Total Withdraw Amount</td>
            <td><?php
$user_with = QB::query("SELECT SUM(amount) AS total FROM withdraw_request WHERE type = 1")->first()->total;
echo $user_with;
?></td>
        </tr>
        <tr>
            <td>Total Balance on ID</td>
            <td><?php echo $user_totalCommission-$user_with; ?></td>
        </tr>
        <tr>
            <td>Company Profit</td>
            <td></td>
        </tr>
    </table>


              
            </div>
          </div>
        </div>
        
      </div>
    </div>
    

<?php require_once('footer.php'); ?>