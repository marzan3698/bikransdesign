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
                        <h2> <i class="fas fa-unlock-alt"></i> Dealer Product Request</h2>
                    </div>
                </div>
                <div class="wrapper-content ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="widgets-container">

                                    <h5>Dealer Product Request</h5>
                                    <hr>

                                    <?php
                                    if (isset($_GET['id'])) {
                                        $invoice_id = $_GET['id'];
                                        // Fetch the invoice details using the invoice ID
                                        $productRequest = QB::table('product_request')->where('invoice_id', $invoice_id)->get();
                                        $invoice = QB::table('product_request')->where('invoice_id', $invoice_id)->first();

                                        // Check if invoice is found
                                        if (!$productRequest) {
                                            echo "Invoice not found.";
                                            exit;
                                        }
                                    } else {
                                        echo "No invoice ID provided.";
                                        exit;
                                    }

                                    // Approve and Delete functionality handling

                                    ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Invoice ID:</th>
                                                    <th># <?php echo $invoice->invoice_id; ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Dealer Name:</th>
                                                    <th>
                                                        <?php
                                                        echo $queryBuilder->table('dealer')->where('id', $invoice->dealar_id)->first()->dealer_name;
                                                        ?>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Dealer Username:</th>
                                                    <th>
                                                        <?php
                                                        echo $queryBuilder->table('dealer')->where('id', $invoice->dealar_id)->first()->dealer_username;
                                                        ?>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Dealer Contact no:</th>
                                                    <th>
                                                        <?php
                                                        echo $queryBuilder->table('dealer')->where('id', $invoice->dealar_id)->first()->phone;
                                                        ?>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Dealer Address:</th>
                                                    <th>
                                                        <?php
                                                        echo $queryBuilder->table('dealer')->where('id', $invoice->dealar_id)->first()->address;
                                                        ?>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Date:</th>
                                                    <th><?php echo date('d-m-Y', $invoice->time); ?></th>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <h3>Are you willing to approve the dealer's product request?</h3>
                                            <?php
                                            if ($invoice->status == 0) {
                                                echo '<button id="approveBtn" class="btn btn-danger btn-lg">Approve</button>';
                                            } elseif ($invoice->status == 1) {
                                                echo '<button class="btn btn-danger btn-lg disabled">Already Approved</button>';
                                            }
                                            ?>
                                            <!-- <button id="deleteBtn" class="btn btn-danger">Delete</button> -->
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center table-striped">
                                                    <tr class="bg-dark">
                                                        <th class="text-center">SL</th>
                                                        <th class="text-center">Product</th>
                                                        <th class="text-center">TP</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                    <?php
                                                    // Initialize a counter for SL column and total amount
                                                    $sl = 1;
                                                    $grandTotal = 0;
                                                    $totalQty = 0;
                                                    $totalTP = 0;

                                                    // Check if there are any records
                                                    if (count($productRequest) > 0) {
                                                        // Loop through each record
                                                        foreach ($productRequest as $request) {
                                                            $product = $queryBuilder->table('product')->where('id', $request->product_id)->first();
                                                            $total = $request->qty * $request->point; 
                                                            $grandTotal += $total; 
                                                            $totalQty += $request->qty; 
                                                            $totalTP += $request->point; 
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $sl++; ?></td>
                                                                <td><?php echo $product->name; ?></td>
                                                                <td><?php echo $request->point; ?></td>
                                                                <td><?php echo $request->qty; ?></td>
                                                                <td><?php echo $total; ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="5">No records found.</td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                    <tr class="bg-light">
                                                        <td colspan="2" class="text-right"><strong>Grand Total:</strong></td>
                                                        <td><?php echo $totalTP  ?></td>
                                                        <td><?php echo $totalQty  ?></td>
                                                        <td><?php echo $grandTotal; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        $(document).ready(function() {
                                            // Approve button click handler
                                            $('#approveBtn').on('click', function() {
                                                Swal.fire({
                                                    title: 'Are you sure?',
                                                    text: "You won't be able to revert this!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Yes, approve it!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var invoiceId = "<?php echo $invoice_id; ?>";
                                                        var products = [];

                                                        // Collect product IDs and quantities for insertion
                                                        <?php foreach ($productRequest as $request) { ?>
                                                            products.push({
                                                                product_id: "<?php echo $request->product_id; ?>",
                                                                qty: "<?php echo $request->qty; ?>"
                                                            });
                                                        <?php } ?>

                                                        $.ajax({
                                                            url: 'approve_request.php', // Same page
                                                            type: 'POST',
                                                            data: {
                                                                action: 'approve',
                                                                invoice_id: invoiceId,
                                                                products: products
                                                            },
                                                            success: function(response) {
                                                                Swal.fire({
                                                                    title: "",
                                                                    text: "Product Request accepted",
                                                                    icon: "success",
                                                                }).then(function() {
                                                                    // Reload the page after the SweetAlert is closed
                                                                    location.reload();
                                                                });
                                                            }
                                                        });
                                                    }
                                                });
                                            });




                                            // Delete button click handler
                                            $('#deleteBtn').on('click', function() {
                                                if (confirm('Are you sure you want to delete this invoice request?')) {
                                                    var invoiceId = "<?php echo $invoice_id; ?>";
                                                    $.ajax({
                                                        url: 'approve_request.php', // Same page
                                                        type: 'POST',
                                                        data: {
                                                            action: 'delete',
                                                            invoice_id: invoiceId
                                                        },
                                                        success: function(response) {
                                                            alert(response); // Display success message
                                                            window.location.href = 'dealer_product_request.php'; // Redirect to invoice list page
                                                        }
                                                    });
                                                }
                                            });
                                        });
                                    </script>



                                </div>
                            </div>
                        </div>





                    </div>
                </div>


                <?php require_once('footer.php'); ?>