<?php
$user_id = $_POST['user_id'];

// $_SESSION['userid'] = $user_id; // session new user id
session_start();
// Set longer session lifetime for payment process
ini_set('session.gc_maxlifetime', 3600); // 1 hour
session_set_cookie_params(3600);

$config = include __DIR__ . '/sslconfig.php';

// Read and validate amount
$amount = isset($_POST['amount']) ? (float) $_POST['amount'] : 0;
if ($amount < 10.00) {
    die('Amount must be at least 10.00 BDT.');
}
$_SESSION['userid'] = $_POST['user_id'];
$_SESSION['payment_amount'] = $amount;

// Store customer information
$_SESSION['cus_name'] = $_POST['cus_name'] ?? 'Customer';
$_SESSION['cus_email'] = $_POST['cus_email'] ?? 'customer@example.com';

// Build unique transaction id
$tran_id = 'TRX_'.time().'_'.substr(uniqid(),-6);

// Choose endpoint
$api_url = $config->is_live ? $config->live_api : $config->sandbox_api;

// Prepare POST data (per SSLCOMMERZ docs)
$post_data = [];
$post_data['store_id'] = $config->store_id;
$post_data['store_passwd'] = $config->store_passwd;
$post_data['total_amount'] = number_format($amount, 2, '.', '');
$post_data['currency'] = $config->currency;
$post_data['tran_id'] = $tran_id;
$post_data['product_category'] = 'General';
$post_data['success_url'] = $config->success_url;
$post_data['fail_url'] = $config->fail_url;
$post_data['cancel_url'] = $config->cancel_url;
$post_data['ipn_url'] = $config->ipn_url;

// CUSTOMER INFO
$post_data['cus_name'] = $_SESSION['cus_name'];
$post_data['cus_email'] = $_SESSION['cus_email'];
$post_data['value_a'] = $_SESSION['userid']; 
$post_data['cus_add1'] = 'Dhaka';
$post_data['cus_city'] = 'Dhaka';
$post_data['cus_country'] = 'Bangladesh';
$post_data['cus_phone'] = '01700000000';

// PRODUCT INFO
$post_data['product_name'] = 'Fund Load';
$post_data['product_profile'] = 'general';
$post_data['cart'] = '[{"name":"Fund Load","amount":'.$amount.'}]';

// Send to SSLCOMMERZ
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo "cURL error: " . curl_error($ch);
    curl_close($ch);
    exit;
}

$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($code == 200 && !curl_errno($ch)){
    curl_close($ch);
    $sslcz = json_decode($response, true);
    if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != ""){
        // Store transaction ID in session for validation
        $_SESSION['tran_id'] = $tran_id;
        
        // Redirect user to SSLCOMMERZ hosted payment page
        header("Location: ".$sslcz['GatewayPageURL']);
        exit;
    } else {
        echo "JSON parse error or GatewayPageURL not found. Response: <pre>".htmlspecialchars($response)."</pre>";
    }
} else {
    curl_close($ch);
    echo "Failed to connect with SSLCOMMERZ API. HTTP code: $code";
}
?>