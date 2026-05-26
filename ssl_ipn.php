<?php
// ipn.php
$config = include __DIR__ . '/sslconfig.php';
$post = $_POST;

// Log raw IPN for debugging (do not leave verbose logs in prod)
file_put_contents(__DIR__.'/sslcz_ipn_raw.log', date('c')." ".print_r($post, true)."\n", FILE_APPEND);

// Prefer val_id to validate
$val_id = $post['val_id'] ?? null;
if (!$val_id) {
    // you can try sessionkey or tran_id as alternate
    die("No val_id in IPN");
}

$validate_base = $config->is_live ? $config->live_validate : $config->sandbox_validate;
$requested_url = $validate_base . "?val_id=" . urlencode($val_id) .
                 "&store_id=" . urlencode($config->store_id) .
                 "&store_passwd=" . urlencode($config->store_passwd) .
                 "&v=1&format=json";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $requested_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if ($code == 200 && !curl_errno($ch)) {
    $res = json_decode($result, true);
    $status = $res['status'] ?? '';
    if ($status === 'VALID' || $status === 'VALIDATED') {
        // Update your DB: set order as paid using $res['tran_id'], $res['amount'] ...
        file_put_contents(__DIR__.'/sslcz_ipn.log', date('c')." VALID IPN: ".json_encode($res)."\n", FILE_APPEND);
        // IMPORTANT: Respond with any HTTP 200 and optionally some text
        http_response_code(200);
        echo "IPN received and validated";
        exit;
    } else {
        file_put_contents(__DIR__.'/sslcz_ipn.log', date('c')." INVALID IPN: ".json_encode($res)."\n", FILE_APPEND);
        http_response_code(400);
        echo "IPN validation failed";
        exit;
    }
} else {
    file_put_contents(__DIR__.'/sslcz_ipn.log', date('c')." IPN validation request failed HTTP:$code\n", FILE_APPEND);
    http_response_code(500);
    echo "IPN validation error";
    exit;
}
