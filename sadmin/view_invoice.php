<?php
    require_once('header.php');
    // Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $invoice_id = $_GET['id'];

    // Fetch the invoice details using the invoice ID
    $invoice = QB::table('order')->where('id', $invoice_id)->first();

    // Check if invoice is found
    if (!$invoice) {
        echo "Invoice not found.";
        exit;
    }
} else {
    echo "No invoice ID provided.";
    exit;
}
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
        
        
        
            <div class="page-content-wrapper animated fadeInRight">
  <div class="page-content" >
    <div class="row wrapper border-bottom page-heading">
      <div class="col-lg-12">
        <h2>User</h2>
       
      </div>
    </div>
    <div class="wrapper-content ">
      <div class="row">
        <!-- Basic Form start -->
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="widgets-container">
              <h5>Invoice List</h5>
              <hr>
              <div class="card-section">
                <div class="tf-container">
                    <div class="tf-balance-box">
                        <div class="balance">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Invoice View</h3>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="javascript::void(0)" class="btn btn-primary btn-sm" onclick="printDiv('printableArea')">Print Invoice</a>
                                    <a href="invoice_list.php" class="btn btn-secondary btn-sm">Back to Invoices</a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 printableArea" id="printableArea">
                            <div class="col-12">
                                <div class="container mt-3">
                                    <?php
                                    $user = QB::table('member')->where('id', $invoice->user_id)->first();
                                    ?>
                                    <?php
                                    // Retrieve the agent ID from the order based on the invoice ID
                                    $orderFirstData = QB::table('order')->where('invoice_id', $invoice_id)->first();
                                    ?>

                                    <div class="row">
                                        <div class="col-12 my-3">
                                            <h1 style="text-align: center; padding: 10px;">INVOICE</h1>
                                        </div>
                                        <div class="col-5">
                                            <table class="table table-2">
                                                <tr>
                                                    <th style="border: 1px solid #ccc;">Customer Name</th>
                                                    <th style="border: 1px solid #ccc;"><?php echo $invoice->name ?></th>
                                                </tr>
                                                <tr>
                                                    <th style="border: 1px solid #ccc;">Phone Number</th>
                                                    <th style="border: 1px solid #ccc;"><?php echo $invoice->phone ?></th>
                                                </tr>
                                                <tr>
                                                    <th style="border: 1px solid #ccc;">Email</th>
                                                    <th style="border: 1px solid #ccc;"><?php echo $invoice->email ?></th>
                                                </tr>
                                                <tr>
                                                    <th style="border: 1px solid #ccc;">Address</th>
                                                    <th style="border: 1px solid #ccc;">
                                                        Country: <?php echo $invoice->Country ?> <br>
                                                        Post Code: <?php echo $invoice->post_code ?> <br>
                                                        Address Details: <?php echo $invoice->address ?> <br>
                                                        Division: <?php echo $invoice->division ?> <br>
                                                        District: <?php echo $invoice->district ?> <br>
                                                        Upazilla: <?php echo $invoice->upazilla ?> <br>
                                                        Union: <?php echo $invoice->union ?> <br>
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-2"></div>
                                        <div class="col-5">
                                            <table class="table table-3">
                                                <tr>
                                                    <th style="border: 1px solid #ccc;">Invoice NO </th>
                                                    <th style="border: 1px solid #ccc;">#<?php echo $invoice->id; ?></th>
                                                </tr>
                                                <tr>
                                                    <th style="border: 1px solid #ccc;">Invoice Date </th>
                                                    <th style="border: 1px solid #ccc;"><?php echo date('d-M-Y', $invoice->date); ?></th>
                                                </tr>
                                                <tr>
                                                    <th style="border: 1px solid #ccc;">Invoice Time </th>
                                                    <th style="border: 1px solid #ccc;"><?php echo date('h:i:A', $invoice->date); ?></th>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                            <table class="table table-striped mt-0 text-center item-table">
                                                <thead style="background: #222;color:#fff">
                                                    <tr>
                                                        <th style="border: 1px solid #222; text-align:center">SL</th>
                                                        <th style="border: 1px solid #222; text-align:center">Product</th>
                                                        <th style="border: 1px solid #222; text-align:center">Quantity</th>
                                                        <th style="border: 1px solid #222; text-align:center">TP</th>
                                                        <th style="border: 1px solid #222; text-align:center">Total TP</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $items = QB::table('order_items')->where('order_id', $invoice_id)->get();
                                                    $grandTotal = 0; // Initialize grand total
                                                    if (!empty($items)) {
                                                        $sl = 1; // Serial number
                                                        foreach ($items as $item) {
                                                            $total = $item->qty * $item->point; // Calculate total for each item
                                                            $grandTotal += $total; // Add to grand total
                                                    ?>
                                                            <tr>
                                                                <td style="border: 1px solid #222; text-align:center"><?= $sl++ ?></td>
                                                                <td style="border: 1px solid #222; text-align:center">
                                                                    <?php
                                                                    $product = QB::table('product')->where('id', $item->product_id)->first();
                                                                    ?>
                                                                    <?= $product->name ?>
                                                                </td>
                                                                <td style="border: 1px solid #222; text-align:center"><?= $item->quantity ?></td>
                                                                <td style="border: 1px solid #222; text-align:center"><?= number_format($item->point, 2) ?></td>
                                                                <td style="border: 1px solid #222; text-align:center"><?= number_format($total, 2) ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="5" style="border: 1px solid #222; text-align:center">No items found</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr style="background: #ccc;">
                                                        <td colspan="4" style="border: 1px solid #222; text-align:center"><strong>Total Bill</strong></td>
                                                        <td style="border: 1px solid #222; text-align:center"><strong><?= number_format($grandTotal, 2) ?></strong></td>
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
        </div>
        
      </div>
    </div>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            // Create a new window for printing
            var printWindow = window;
            printWindow.document.write('<html><head><title>Print Invoice</title>');

            // Add the print-specific styles
            printWindow.document.write(`
            <style>
                @media print {
                .item-table{
                    margin-top:20px;
                    width:100% !important;
                }
                    .table-2{
                    width:50% !important;
                    float:left !important;
                }
                    .table-2{
                    width:50% !important;
                    float:right !important;
                }
                    table td{
                        padding:5px;
                        border:1px solid #222;
                    }
                        table th{
                        padding:5px;
                        border:1px solid #222;
                    }
              
            }
        </style>
    `);

            printWindow.document.write('</head><body>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.focus();

            window.onafterprint = function() {
                window.location.reload();
            };
            // Print the new window
            printWindow.print();
            printWindow.close();

            // Restore the original document content
            document.body.innerHTML = originalContents;
        }
    </script>

<?php require_once('footer.php'); ?>