<?php
session_start();
$config = include __DIR__ . '/sslconfig.php';

$mysqli = new mysqli($config->db_host, $config->db_user, $config->db_pass, $config->db_name);

$val_id = $_POST['val_id'] ?? $_GET['val_id'] ?? null;
if (!$val_id) {
    die('কোনো val_id পাওয়া যায়নি।');
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
$error = curl_error($ch);
curl_close($ch);

if ($code == 200 && empty($error)) {
    $res = json_decode($result, true);
    if (!$res) { 
        die('ভ্যালিডেশন API থেকে অবৈধ JSON রেসপন্স পাওয়া গেছে'); 
    }
    
    $status = $res['status'] ?? '';
    $amount = $res['amount'] ?? 0;
    $tran_id = $res['tran_id'] ?? '';
    $currency = $res['currency'] ?? '';
    
    // নতুন ডেটা সংগ্রহ
    $card_type = $res['card_type'] ?? '';
    $card_no = $res['card_no'] ?? '';
    $bank_tran_id = $res['bank_tran_id'] ?? '';
    $card_issuer = $res['card_issuer'] ?? '';
    $card_brand = $res['card_brand'] ?? '';
    $card_issuer_country = $res['card_issuer_country'] ?? '';
    $card_issuer_country_code = $res['card_issuer_country_code'] ?? '';
    $store_amount = $res['store_amount'] ?? 0;
    $currency_type = $res['currency_type'] ?? '';
    $currency_amount = $res['currency_amount'] ?? 0;

    if ($status === 'VALID' || $status === 'VALIDATED') {
        $user_id = $res['value_a'] ?? 0;
        
        if ($user_id > 0) {
            if ($user_id > 0) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['logged_in'] = true; // আপনার login flag যা আছে
            }
            // Update member balance
            $stmt = $mysqli->prepare("UPDATE member SET jfund_balance = jfund_balance + ? WHERE id = ?");
            $stmt->bind_param("di", $amount, $user_id);
            $balance_updated = $stmt->execute();
            $stmt->close();

            // Insert payment record with additional information
            $stmt = $mysqli->prepare("INSERT INTO payments 
                (user_id, tran_id, amount, currency, status, 
                 card_type, card_no, bank_tran_id, card_issuer, 
                 card_brand, card_issuer_country, card_issuer_country_code, 
                 store_amount, currency_type, currency_amount, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
            
            $stmt->bind_param("isdsssssssssdds", 
                $user_id, $tran_id, $amount, $currency, $status,
                $card_type, $card_no, $bank_tran_id, $card_issuer,
                $card_brand, $card_issuer_country, $card_issuer_country_code,
                $store_amount, $currency_type, $currency_amount);
                
            $payment_recorded = $stmt->execute();
            $stmt->close();
        }
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>পেমেন্ট সফল হয়েছে</title>
    <style>
        /* আপনার CSS স্টাইল এখানে রাখুন */
        body {
            font-family: 'Segoe UI', 'SolaimanLipi', 'Verdana', sans-serif;
            background-color: #f5f9fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            padding: 30px;
            text-align: center;
        }
        .success-icon {
            color: #28a745;
            font-size: 60px;
            margin-bottom: 20px;
        }
        h1 {
            color: #28a745;
            margin-bottom: 20px;
        }
        .details {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            text-align: left;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .detail-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .btn {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #218838;
        }
        @media (max-width: 480px) {
            .container {
                width: 95%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✓</div>
        <h1>পেমেন্ট সফল হয়েছে!</h1>
        
        <p>আপনার পেমেন্টটি সফলভাবে সম্পন্ন হয়েছে এবং আপনার অ্যাকাউন্টে ব্যালেন্স যোগ করা হয়েছে।</p>
        
        <div class="details">
            <div class="detail-row">
                <span class="label">লেনদেন আইডি:</span>
                <span><?php echo htmlspecialchars($tran_id ?? 'N/A'); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">পরিমাণ:</span>
                <span><?php echo htmlspecialchars($amount ?? 0); ?> <?php echo htmlspecialchars($currency ?? 'BDT'); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">পেমেন্ট মেথড:</span>
                <span><?php echo htmlspecialchars($card_brand ?? 'N/A'); ?> (<?php echo htmlspecialchars($card_type ?? 'N/A'); ?>)</span>
            </div>
            <div class="detail-row">
                <span class="label">কার্ড/একাউন্ট নম্বর:</span>
                <span><?php echo htmlspecialchars($card_no ?? 'N/A'); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">ব্যাংক লেনদেন আইডি:</span>
                <span><?php echo htmlspecialchars($bank_tran_id ?? 'N/A'); ?></span>
            </div>
            <div class="detail-row">
                <span class="label">স্ট্যাটাস:</span>
                <span style="color: #28a745;">সফল</span>
            </div>
            <div class="detail-row">
                <span class="label">তারিখ:</span>
                <span><?php echo date('d-m-Y H:i:s'); ?></span>
            </div>
        </div>
        
        <p>আপনার অ্যাকাউন্টে টাকা যোগ হতে কোনো সমস্যা হলে আমাদের সাথে যোগাযোগ করুন।</p>

        <script>
            setTimeout(() => {
                window.location = "ssl_restore_session.php?uid=<?php echo urlencode($user_id); ?>&redirect=create-order.php";
            }, 1000);
        </script>

        <a href="ssl_restore_session.php?uid=<?php echo urlencode($user_id); ?>&redirect=create-order.php" class="btn">অর্ডার করুন</a>
    </div>
</body>
</html>