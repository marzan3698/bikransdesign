<?php
require_once('header.php');
check_logged_in_admin();
$inv_id = $_GET['id'];
$invoice = QB::table('product_orders')->where('id', $inv_id)->first();
$items = QB::table('order_items')->where('order_id', $invoice->id)->get();
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

                                    <h5>Invoice</h5>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table">
                                                        <tr>
                                                            <th style="border: 1px solid #222;">Customer Name</th>
                                                            <th style="border: 1px solid #222;"><?= $invoice->name ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: 1px solid #222;">Customer Phone</th>
                                                            <th style="border: 1px solid #222;"><?= $invoice->phone ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: 1px solid #222;">Customer email</th>
                                                            <th style="border: 1px solid #222;"><?= $invoice->email ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: 1px solid #222;">District</th>
                                                            <th style="border: 1px solid #222;"><?= $invoice->district ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: 1px solid #222;">Post Code</th>
                                                            <th style="border: 1px solid #222;"><?= $invoice->post_code ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: 1px solid #222;">Address</th>
                                                            <th style="border: 1px solid #222;"><?= $invoice->address ?></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-5">
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table">
                                                        <tr>
                                                            <th style="border: 1px solid #222;">Invoice ID</th>
                                                            <th style="border: 1px solid #222;">#<?= $invoice->id ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: 1px solid #222;">Invoice Date</th>
                                                            <th style="border: 1px solid #222;"><?= date('d-m-Y', $invoice->time); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: 1px solid #222;">Total Amount</th>
                                                            <th style="border: 1px solid #222;"><?= $invoice->total_amount ?></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table text-center table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th style="background-color: #222;color:#fff;text-align:center">SL</th>
                                                                <th style="background-color: #222;color:#fff;text-align:center">Image</th>
                                                                <th style="background-color: #222;color:#fff;text-align:center">Product</th>
                                                                <th style="background-color: #222;color:#fff;text-align:center">Quantity</th>
                                                                <th style="background-color: #222;color:#fff;text-align:center">Price</th>
                                                                <th style="background-color: #222;color:#fff;text-align:center">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sl = 1;
                                                            $totalQuantity = 0;
                                                            $totalPrice = 0;
                                                            $grandTotal = 0;
                                                            foreach ($items as $item) {
                                                                $product = QB::table('product')->where('id', $item->product_id)->first();
                                                                $lineTotal = $item->price * $item->quantity;
                                                                $totalQuantity += $item->quantity;
                                                                $totalPrice += $item->price;
                                                                $grandTotal += $lineTotal;
                                                            ?>
                                                                <tr>
                                                                    <td><?= $sl++ ?></td>
                                                                    <td>
                                                                        <img src="<?= $product->images ?>" alt="Product Image" width="30" height="30">
                                                                    </td>
                                                                    <td><?= $product->name ?></td>
                                                                    <td><?= $item->quantity ?></td>
                                                                    <td><?= number_format($item->price, 2) ?></td>
                                                                    <td><?= number_format($lineTotal, 2) ?></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th colspan="3" style="text-align:center; background-color: #333; color: #fff;">Total:</th>
                                                                <th style="background-color: #333; color: #fff;text-align:center"><?= $totalQuantity ?></th>
                                                                <th style="background-color: #333; color: #fff;text-align:center"><?= number_format($totalPrice, 2) ?></th>
                                                                <th style="background-color: #333; color: #fff;text-align:center"><?= number_format($grandTotal, 2) ?></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('footer.php'); ?>