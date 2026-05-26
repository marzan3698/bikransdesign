<?php
require_once('../sadmin/config.php');
require_once('../sadmin/function.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'approve') {
            // Retrieve the invoice details to get the dealer_id
            $invoice_id = $_POST['invoice_id'];
            $invoice = QB::table('product_request')->where('invoice_id', $invoice_id)->first();

            // Check if invoice was found
            if (!$invoice) {
                echo "Invoice not found.";
                exit;
            } else {
                // Debugging: Print the invoice details
                print_r($invoice);
            }

            // Approve all product requests for the invoice
            $updated = QB::table('product_request')->where('invoice_id', $invoice_id)->update(['status' => 1]);

            if ($updated) {
                // Insert data into product_stock for each product in the request
                if (isset($_POST['products']) && is_array($_POST['products'])) {
                    foreach ($_POST['products'] as $product) {
                        // Assuming $product is an associative array with keys 'product_id' and 'qty'
                        QB::table('product_stock')->insert([
                            'product_id' => $product['product_id'],
                            'qty' => $product['qty'],
                            'type' => 'stock_in',
                            'dealer_id' => $invoice->dealar_id, // Use the dealer_id from the invoice
                            'stk_id' => null // Assuming you want to set stk_id to null
                        ]);
                    }
                }
                echo "All product requests have been approved and stock updated.";
            } else {
                echo "Failed to approve product requests.";
            }
            exit;
        }
    }
}
?>
