<?php

function output($data)
{
    echo json_encode($data);
}



function total_order_qty($user_id){
    
    $result = QB::table('order')
        ->where('user_id', $user_id)
        ->select(QB::raw('SUM(total_qty) as total_qty'))
        ->first();

    return $result->total_qty ?? 0;
}


function send_sms($data)
{
    $apiKey = "f9539314c903950c1212342419661b";

    $apiBasePath = 'https://billing.softhostit.com';

    $url = "{$apiBasePath}/api/send-message";
    $queryParams = [
        'mobile_number' => $data['mobile'],
        'message_body' => $data['message_body'],
        'customer_api_key' => $apiKey,
    ];

    $fullUrl = $url . '?' . http_build_query($queryParams);

    $ch = curl_init($fullUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }
    curl_close($ch);
    return $response; // Return the response directly, instead of response()->json($response)
}

function sms_send_joining($phone, $otp, $name) {

    // ---- ????? API ???? ----
    $api_key   = "DE1EWJmWsz6BeZpn7ab4mAMhgkjqek";
    $sender_id = "8809617611342";
    // -------------------------

    // NULL-SAFE: ?????? ??? string ? ?????
    $phone = (string)$phone;
    $name  = (string)$name;
    $otp   = (string)$otp;

    // Manual "trim" using preg_replace (no trim() used)
    $phone = preg_replace('/^\s+|\s+$/u', '', $phone);
    $name  = preg_replace('/^\s+|\s+$/u', '', $name);
    $otp   = preg_replace('/^\s+|\s+$/u', '', $otp);

    // Phone validation
    if ($phone === '') {
        return "Invalid Phone: empty";
    }

    // Just digits check (optional)
    $digits = preg_replace('/\D/', '', $phone);
    if (strlen($digits) < 10) {
        return "Invalid Phone: too short";
    }

    // Build message
    $message = "বিক্রান্স বিজনেসে আপনাকে স্বাগতম!, ইউজার আইডি: {$otp}, পাসওয়ার্ড: {$name} . লগইন: bikrans.com";

    // Build API parameters safely
    $params = http_build_query([
        'api_key'       => $api_key,
        'sender_id'     => $sender_id,
        'phone_numbers' => $phone,
        'type'          => 'text',
        'message'       => $message,
    ]);

    $url = "https://bulksmspro.net/api/sms-send?" . $params;

    // cURL Request
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);

    $response = curl_exec($ch);
    $err      = curl_error($ch);

    curl_close($ch);

    if ($err) {
        return "cURL Error: " . $err;
    }

    return $response;
}



function sms_send($phone, $otp, $name) {

    // ---- ????? API ???? ----
    $api_key   = "DE1EWJmWsz6BeZpn7ab4mAMhgkjqek";
    $sender_id = "8809617611342";
    // -------------------------

    // NULL-SAFE: ?????? ??? string ? ?????
    $phone = (string)$phone;
    $name  = (string)$name;
    $otp   = (string)$otp;

    // Manual "trim" using preg_replace (no trim() used)
    $phone = preg_replace('/^\s+|\s+$/u', '', $phone);
    $name  = preg_replace('/^\s+|\s+$/u', '', $name);
    $otp   = preg_replace('/^\s+|\s+$/u', '', $otp);

    // Phone validation
    if ($phone === '') {
        return "Invalid Phone: empty";
    }

    // Just digits check (optional)
    $digits = preg_replace('/\D/', '', $phone);
    if (strlen($digits) < 10) {
        return "Invalid Phone: too short";
    }

    // Build message
    $message = "Sir, {$name} {$otp}.";

    // Build API parameters safely
    $params = http_build_query([
        'api_key'       => $api_key,
        'sender_id'     => $sender_id,
        'phone_numbers' => $phone,
        'type'          => 'text',
        'message'       => $message,
    ]);

    $url = "https://bulksmspro.net/api/sms-send?" . $params;

    // cURL Request
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);

    $response = curl_exec($ch);
    $err      = curl_error($ch);

    curl_close($ch);

    if ($err) {
        return "cURL Error: " . $err;
    }

    return $response;
}






function getSmsStatus($apiResponse)
{
    $responseData = json_decode($apiResponse, true);
    if ($responseData && isset($responseData['enough_balance'])) {
        return $responseData['enough_balance'];
    } else {
        return 'Success'; // Return null or some default value if the response is not as expected
    }
}

function check_logged_in_admin()
{
    if (!isset($_SESSION['admin'])) {
        header("Location: login.php");
        exit;
    }
}

function refer_count_active($id){
    global $queryBuilder;
    return $queryBuilder->table('member')->where('refer_id',$id)->where('is_premium',1)->count();
}

function refer_count_sales_refer($id) {
    global $queryBuilder;

    $row = $queryBuilder->table('user_trx_joining')
        ->where('user_id', (int)$id)
        ->select($queryBuilder->raw('COALESCE(SUM(`package`+0), 0) AS total'))
        ->first();

    return (float)($row->total ?? 0);
}

function refer_count_sales_all() {
    global $queryBuilder;

    $row = $queryBuilder->table('user_trx_joining')
        ->select($queryBuilder->raw('COALESCE(SUM(`package`+0), 0) AS total'))
        ->first();

    return (float)($row->total ?? 0);
}

function gen_his_torongo_all() {
    global $queryBuilder;

    $row = $queryBuilder->table('gen_his_torongo')
        ->select($queryBuilder->raw('COALESCE(SUM(`amount`+0), 0) AS total'))
        ->first();

    return (float)($row->total ?? 0);
}

function gen_his_torongo_all_type() {
    global $queryBuilder;

    $row = $queryBuilder->table('gen_his')
        ->where('type','6')
        ->select($queryBuilder->raw('COALESCE(SUM(`amount`+0), 0) AS total'))
        ->first();

    return (float)($row->total ?? 0);
}

function gen_his_torongo_all_type2() {
    global $queryBuilder;

    $row = $queryBuilder->table('gen_his')
        ->where('type','2')
        ->select($queryBuilder->raw('COALESCE(SUM(`amount`+0), 0) AS total'))
        ->first();

    return (float)($row->total ?? 0);
}



function short_text($text, $limit = 20) {
    return mb_strlen($text, 'UTF-8') > $limit 
        ? mb_substr($text, 0, $limit, 'UTF-8') . '..' 
        : $text;
}

function refer_count($id){
    global $queryBuilder;
    return $queryBuilder->table('member')->where('referer_id',$id)->count();
}


function check_logged_in_user()
{
    if (!isset($_SESSION['user_login'])) {
        header("Location: index.php");
        exit;
    }
}

function find_board_id_win($start, $end, $number1, $number2)
{
    global $mysqli;
    
    $sql = "SELECT * FROM `board1` WHERE `id` BETWEEN $start AND $end AND `number` IN ($number1,$number2) and `win_status` = 0"; 
    
    $result = $mysqli->query($sql);
    
    while($row=$result->fetch_assoc()){
        add_balance_user_cirkel($row['user_id'], 50000);
        $mysqli->query("UPDATE `board1` SET `amount` = '50000' WHERE `id` = {$row['id']};");
        give_generation_circle_aff($row['user_id'], 50000);
    }            
}



function find_board_id($user_id, $start, $end)
{
    global $queryBuilder;

    // whereBetween() ???????? ???? ?????????? ??????
    $result = $queryBuilder->table('board1')
        ->select('number')
        ->where('number', $user_id)       // 'number' ?????? ??? $user_id ?? ???? ??? ???
        ->where('id', '>=', $start)
        ->where('id', '<=', $end)    // 'id' ?????? ??? $start ??? $end ?? ????? ??? ???
        ->first();                        // ????? ???????? ???? ????

    return $result ? $result->number : null;  // ??? ??????? ????? ???, ????? number ???? ????, ?? ??? null
}



function millionaire_income_fund($total_point){
    global $mysqli;
    $millionaire1 =  $total_point/100*10;
    $millionaire2 =  $total_point/100*6;
    $millionaire3 =  $total_point/100*4;
    $millionaire4 =  $total_point/100*3;
    $millionaire5 =  $total_point/100*1.5;
    $millionaire6 =  $total_point/100*1;
    $millionaire7 =  $total_point/100*1;
    $millionaire8 =  $total_point/100*1;
    $millionaire9 =  $total_point/100*1;
    $millionaire10 =  $total_point/100*1;
    
    $sql="UPDATE `millionaire_incom` SET `millionaire01` = `millionaire01` + '$millionaire1', `millionaire02` = `millionaire02` + '$millionaire2', `millionaire03` = `millionaire03` + '$millionaire3', `millionaire04` = `millionaire04` + '$millionaire4', `millionaire05` = `millionaire05` + '$millionaire5', `millionaire06` = `millionaire06` + '$millionaire6', `millionaire07` = `millionaire07` + '$millionaire7', `millionaire08` = `millionaire08` + '$millionaire8', `millionaire09` = `millionaire09` + '$millionaire9', `millionaire10` = `millionaire10` + '$millionaire10' WHERE `millionaire_incom`.`id` = 1;";
    $mysqli->query($sql);
}

function check_logged_in_agent()
{
    if (!isset($_SESSION['agent_login'])) {
        header("Location: login.php");
        exit;
    }
}

function check_logged_in_dealer()
{
    if (!isset($_SESSION['dealer_login'])) {
        header("Location: login.php");
        exit;
    }
}



function cehck_login_time()
{
    if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > timeout_duration) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }

    $_SESSION['login_time'] = time();
}


function balancee_ck($id)
{

    global $queryBuilder;

    $cragit = $queryBuilder->table('agent_transection')
        ->select($queryBuilder->raw('SUM(credit) AS total_credit'))
        ->where('agent_id', $id)
        ->first();

    $debit = $queryBuilder->table('agent_transection')
        ->select($queryBuilder->raw('SUM(debit) AS total_debit'))
        ->where('agent_id', $id)
        ->first();

    $cragitSum = $cragit->total_credit ?? 0;
    $debitSum = $debit->total_debit ?? 0;

    $balance = $cragitSum - $debitSum;
    return $balance;
}

function withdraw_sum($id)
{
    global $queryBuilder;

    $cragit = $queryBuilder->table('user_transection')
        ->select($queryBuilder->raw('SUM(debit) AS total_debit'))
        ->where('user_id', $id)
        ->where('type', 10)
        ->first();
    return $cragit->total_debit;
}

function withdraw_sum_pending($id)
{
    global $queryBuilder;

    $cragit = $queryBuilder->table('withdraw_request')
        ->select($queryBuilder->raw('SUM(amount) AS total_debit'))
        ->where('user_id', $id)
        ->where('status', 1)
        ->first();
    return $cragit->total_debit;
}

function rank_check($id)
{
    global $queryBuilder;
    $user = $queryBuilder->table('member')->where('id', $id)->first();

    if ($user) {
        if ($user->rank_gm === 1) {
            return 'GM';
        } elseif ($user->rank_dgm === 1) {
            return 'DGM';
        } elseif ($user->rank_agm === 1) {
            return 'AGM';
        } elseif ($user->rank_rm === 1) {
            return 'Rezonal Manager';
        } elseif ($user->rank_am === 1) {
            return 'Area Manager';
        } elseif ($user->rank_mm === 1) {
            return 'Marketing Manager';
        } elseif ($user->rank_se === 1) {
            return 'Sales Executive';
        } else {
            return 'No Rank';
        }
    } else {
        return "Rank not found!";
    }
}


function balancee_ck_user($id)
{

    global $queryBuilder;

    $cragit = $queryBuilder->table('user_transection')
        ->select($queryBuilder->raw('SUM(cradit) AS total_credit'))
        ->where('user_id', $id)
        ->whereNotIn('type', [3, 6]) // Exclude types 3 and 6
        ->first();

    $debit = $queryBuilder->table('user_transection')
        ->select($queryBuilder->raw('SUM(debit) AS total_debit'))
        ->where('user_id', $id)
        ->whereNotIn('type', [3, 6]) // Exclude types 3 and 6
        ->first();

    $cragitSum = $cragit->total_credit ?? 0;
    $debitSum = $debit->total_debit ?? 0;

    $balance = $cragitSum - $debitSum;
    return $balance;
}


function balancee_ck_user_club($id)
{

    global $queryBuilder;

    $cragit = $queryBuilder->table('user_transection')
        ->select($queryBuilder->raw('SUM(cradit) AS total_credit'))
        ->where('user_id', $id)
        ->where('type', '=', 6)
        ->first();

    $debit = $queryBuilder->table('user_transection')
        ->select($queryBuilder->raw('SUM(debit) AS total_debit'))
        ->where('user_id', $id)
        ->where('type', '=', 6)
        ->first();

    $cragitSum = $cragit->total_credit ?? 0;
    $debitSum = $debit->total_debit ?? 0;

    $balance = $cragitSum - $debitSum;
    return $balance;
}



function refer_income($user_id, $amount)
{
    $note = '1';
    global $queryBuilder;

    $sponsor1 = find_sponsor($user_id);

    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $sponsor1,
        'cradit' => $amount,
        'note' => $note,
        'type' => 4
    );
    $insert = $queryBuilder->table('user_transection')->insert($data);
}

function balancee_ck_user_type($id, $type)
{

    global $queryBuilder;

    $cragit = $queryBuilder->table('user_transection')
        ->select($queryBuilder->raw('SUM(cradit) AS total_credit'))
        ->where('user_id', $id)
        ->where('type', $type)
        ->first();

    $debit = $queryBuilder->table('user_transection')
        ->select($queryBuilder->raw('SUM(debit) AS total_debit'))
        ->where('user_id', $id)
        ->where('type', $type)
        ->first();

    $cragitSum = $cragit->total_credit ?? 0;
    $debitSum = $debit->total_debit ?? 0;

    $balance = $cragitSum - $debitSum;
    return $balance;
}


function balancee_ck_agent_type($id, $type)
{

    global $queryBuilder;

    $cragit = $queryBuilder->table('agent_transection')
        ->select($queryBuilder->raw('SUM(credit) AS total_credit'))
        ->where('agent_id', $id)
        ->where('type', $type)
        ->first();

    $debit = $queryBuilder->table('agent_transection')
        ->select($queryBuilder->raw('SUM(debit) AS total_debit'))
        ->where('agent_id', $id)
        ->where('type', $type)
        ->first();

    $cragitSum = $cragit->total_credit ?? 0;
    $debitSum = $debit->total_debit ?? 0;

    $balance = $cragitSum - $debitSum;
    return $balance;
}

function balancee_ck_dealer_type($id, $type)
{

    global $queryBuilder;

    $cragit = $queryBuilder->table('dealer_transection')
        ->select($queryBuilder->raw('SUM(credit) AS total_credit'))
        ->where('dealer_id', $id)
        ->where('type', $type)
        ->first();

    $debit = $queryBuilder->table('dealer_transection')
        ->select($queryBuilder->raw('SUM(debit) AS total_debit'))
        ->where('dealer_id', $id)
        ->where('type', $type)
        ->first();

    $cragitSum = $cragit->total_credit ?? 0;
    $debitSum = $debit->total_debit ?? 0;

    $balance = $cragitSum - $debitSum;
    return $balance;
}


function total_point()
{

    global $queryBuilder;

        $debit = $queryBuilder->table('order')
            ->select($queryBuilder->raw('SUM(point) AS total_debit'))
            ->first()->total_debit;
    
    return $debit;
}




function stk_withdraw($id)
{

    global $queryBuilder;

        $debit = $queryBuilder->table('withdraw_request')
            ->select($queryBuilder->raw('SUM(amount) AS total_debit'))
            ->where('user_id', $id)
            ->first()->total_debit;
    
    return $debit;
}



function balancee_withdraw_ck_user_type($id, $type, $status)
{

    global $queryBuilder;
    if ($status != null) {
        $debit = $queryBuilder->table('user_transection')
            ->select($queryBuilder->raw('SUM(debit) AS total_debit'))
            ->where('user_id', $id)
            ->where('type', $type)
            ->where('status', $status)
            ->first();
    } else {
        $debit = $queryBuilder->table('user_transection')
            ->select($queryBuilder->raw('SUM(debit) AS total_debit'))
            ->where('user_id', $id)
            ->where('type', $type)
            ->first();
    }
    $debitSum = $debit->total_debit ?? 0;

    $balance = $debitSum;
    return $balance;
}



function balancee_ck_user_income($id)
{

    global $queryBuilder;

    $cragit = $queryBuilder->table('user_transection')
        ->select($queryBuilder->raw('SUM(cradit) AS total_credit'))
        ->where('user_id', $id)
        ->where('type', 'not like', '0')
        ->where('type', 'not like', '3')
        ->first();

    /*   $debit = $queryBuilder->table('user_transection')
                              ->select($queryBuilder->raw('SUM(debit) AS total_debit'))
                              ->where('user_id', $id)
                              ->first();
         */

    $cragitSum = $cragit->total_credit ?? 0;
    //    $debitSum = $debit->total_debit ?? 0;

    // $balance = $cragitSum - $debitSum;
    return $cragitSum;
}

function total_gen_income($user_id)
{

    global $queryBuilder;

    $total_gen = $queryBuilder->table('gen_his')
        ->select($queryBuilder->raw('SUM(amount) as total_amount'))
        ->where('to_id', $user_id)
        ->first();

    return $total_gen->total_amount;
}



function blance_minus($amount, $user_id, $agent_id)
{
    $time = time();
    global $queryBuilder;
    $data = array(
        'time' => $time,
        'agent_id' => $agent_id,
        'user_id' => $user_id,
        'debit' => $amount
    );
    $insert_data = $queryBuilder->table('agent_transection')->insert($data);
    if ($insert_data) {
        echo '<p class="alert alert-success">Order Balance Adjust</p>';
    }
}
function delar_blance_minus($amount, $dealer_id)
{
    $time = time();
    global $queryBuilder;
    $data = array(
        'time' => $time,
        'dealer_id' => $dealer_id,
        'debit' => $amount
    );
    $insert_data = $queryBuilder->table('dealer_transection')->insert($data);
    if ($insert_data) {
        echo '<p class="alert alert-success">Order Balance Adjust</p>';
    }
}

function user_exsist($username)
{
    $member = QB::table('member')->where('username', $username)->first();
    if ($member) {
        echo "<span  style='font-weight: 600;font-size: 14px; color: green'>Username Correct</span>";
    } else {
        echo "<span  style='color: red !important;font-weight: 500;font-size: 12px;'>Username Not available</span>";
        die();
    }
}

function blance_minus_user($amount, $user_id, $type)
{
    $time = time();
    global $queryBuilder;
    $data = array(
        'time' => $time,
        'user_id' => $user_id,
        'debit' => $amount,
        'type' => $type
    );
    $insert_data = $queryBuilder->table('user_transection')->insert($data);
    if ($insert_data) {
        echo '<p class="alert alert-success">OK</p>';
    }
}

function blance_minus_agent($amount, $user_id, $type, $ruser_id)
{
    $time = time();
    global $queryBuilder;
    $data = array(
        'time' => $time,
        'agent_id' => $user_id,
        'user_id' => $ruser_id,
        'debit' => $amount,
        'type' => $type
    );
    $insert_data = $queryBuilder->table('agent_transection')->insert($data);
    if ($insert_data) {
        //echo '<p class="alert alert-success">OK</p>';
    }
}

function blance_add_agent($amount, $user_id, $type, $ruser_id)
{
    $time = time();
    global $queryBuilder;
    $data = array(
        'time' => $time,
        'agent_id' => $user_id,
        'user_id' => $ruser_id,
        'credit' => $amount,
        'type' => $type
    );
    $insert_data = $queryBuilder->table('agent_transection')->insert($data);
    if ($insert_data) {
        //echo '<p class="alert alert-success">OK</p>';
    }
}



function withdraw_blance_user($amount, $user_id, $type, $address)
{
    $time = time();
    global $queryBuilder;
    $data = array(
        'time' => $time,
        'user_id' => $user_id,
        'debit' => $amount,
        'type' => $type,
        'note' => 'Withdraw Request',
        'status' => 1,
    );
    $insert_data = $queryBuilder->table('user_transection')->insert($data);
    if ($insert_data) {
        $last_inserted_row = $queryBuilder->table('user_transection')
            ->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->first();

        // Output the last inserted ID for this user
        withraw_request_store($user_id, $last_inserted_row->id, $amount, $address);
    }
    // if ($insert_data) {
    //     echo '<p class="alert alert-success">OK</p>';
    // }
}

function withdraw_blance_agent($amount, $user_id, $type, $withdraw_type, $address, $agent_code, $account_type, $account_number, $bank_name)
{
    $time = time();
    global $queryBuilder;
    $data = array(
        'time' => $time,
        'agent_id' => $user_id,
        'debit' => $amount,
        'type' => $type,
        'note' => 'Withdraw Request',
        'status' => Constant::WITHDRAW_STATUS['pending'],
    );
    $insert_data = $queryBuilder->table('agent_transection')->insert($data);
    if ($insert_data) {
        $last_inserted_row = $queryBuilder->table('agent_transection')
            ->where('agent_id', $user_id)
            ->orderBy('id', 'desc')
            ->first();

        // Output the last inserted ID for this user
        withraw_request_store_agent($user_id, $last_inserted_row->id, $amount, $withdraw_type, $address, $agent_code, $account_type, $account_number, $bank_name);
    }
    // if ($insert_data) {
    //     echo '<p class="alert alert-success">OK</p>';
    // }
}
function withraw_request_store_agent($user_id, $trans_id, $amount, $type, $address, $agent_code, $account_type, $account_number, $bank_name)
{
    $time = time();
    global $queryBuilder;
    $data = array(
        'time' => $time,
        'user_id' => $user_id,
        'trans_id' => $trans_id,
        'amount' => $amount,
        'type' => $type,
        'address' => $address,
        'agent_code' => $agent_code,
        'account_type' => $account_type,
        'account_number' => $account_number,
        'bank_name' => $bank_name,
        'status' => Constant::WITHDRAW_STATUS['pending']
    );
    $insert_data = $queryBuilder->table('withdraw_request_agent')->insert($data);
    if ($insert_data) {
        echo '<p class="alert alert-success">OK</p>';
    }
}

function blance_minus_user_transfer($amount, $user_id, $type, $to_user)
{
    $time = time();
    global $queryBuilder;
    $data = array(
        'time' => $time,
        'user_id' => $user_id,
        'debit' => $amount,
        'type' => $type,
        'from_id' => $to_user,
        'his' => 2
    );
    $insert_data = $queryBuilder->table('user_transection')->insert($data);
    if ($insert_data) {
        echo '<p class="alert alert-success">OK</p>';
    }
}
function withraw_request_store($user_id, $trans_id, $amount, $address)
{
    $time = time();
    global $queryBuilder;
    $data = array(
        'time' => $time,
        'user_id' => $user_id,
        'trans_id' => $trans_id,
        'amount' => $amount,
        'type' => 5,
        'address' => $address,
        'agent_code' => 1,
        'account_type' => 1,
        'account_number' => 1,
        'bank_name' => 1,
        'status' => 1
    );
    $insert_data = $queryBuilder->table('withdraw_request')->insert($data);
    if ($insert_data) {
        echo '<p class="alert alert-success">OK</p>';
    }
}

function get_total_balance($mysqli) {
    $sql = "SELECT SUM(balance) AS total_balance FROM member";
    $result = $mysqli->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        return $row['total_balance'] ?? 0;
    } else {
        return 0;
    }
}

function get_total_jbalance($mysqli) {
    $sql = "SELECT SUM(jfund_balance) AS total_balance FROM member";
    $result = $mysqli->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        return $row['total_balance'] ?? 0;
    } else {
        return 0;
    }
}

function getUserCreditSum($userId, $his = 33)
{
    global $queryBuilder;

    $result = $queryBuilder->table('user_transection')
        ->where('user_id', $userId)
        ->where('his', $his)
        ->select($queryBuilder->raw('SUM(cradit) as total_cradit'))
        ->first();

    return $result->total_cradit ?? 0;
}


function blance_plus_user($amount, $user_id, $type, $to_user)
{
    $time = time();
    global $queryBuilder;
    $data = array(
        'time' => $time,
        'user_id' => $user_id,
        'cradit' => $amount,
        'type' => $type,
        'from_id' => $to_user,
        'his' => 2
    );
    $insert_data = $queryBuilder->table('user_transection')->insert($data);
    if ($insert_data) {
        echo '<p class="alert alert-success">OK</p>';
    }
}

function find_user_id($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('id')->where('username', $user_id)->first();
    return $result ? $result->id : null;
}

function find_user_name($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('username')->where('id', $user_id)->first();
    return $result ? $result->username : 'Admin';
}

function find_user_fname($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('name')->where('id', $user_id)->first();
    return $result ? $result->name : null;
}


function find_user_package($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('package')->where('id', $user_id)->first();
    return $result ? $result->package : null;
}


function find_user_phone($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('email')->where('id', $user_id)->first();
    return $result ? $result->email : null;
}

function find_user_images($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('profile_pic')->where('id', $user_id)->first();
    return $result ? $result->profile_pic : null;
}



function order_invoice($user_id, $agent_id, $qty, $p_id, $price, $point, $invoice_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $user_id,
        'agent_id' => $agent_id,
        'product_id' => $p_id,
        'qty' => $qty,
        'price' => $price,
        'point' => $point,
        'invoice_id' => $invoice_id
    );
    $invoice = $queryBuilder->table('order')->insert($data);
    if ($invoice) {
        echo '<p class="alert alert-success">Order Confirm</p>';
    }
}
function product_request($dealar_id, $qty, $p_id, $price, $point, $invoice_id, $stk_id, $to_dealer)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'dealar_id' => $dealar_id,
        'product_id' => $p_id,
        'qty' => $qty,
        'price' => $price,
        'point' => $point,
        'invoice_id' => $invoice_id,
        'stk_id' => $stk_id,
        'to_dealer' => $to_dealer,
    );
    $invoice = $queryBuilder->table('product_request')->insert($data);
    // if ($invoice) {
    //     echo '<p class="alert alert-success">Order Confirm</p>';
    // }
}

function find_sponsor_refer($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('referer_id')->where('id', $user_id)->first();
    return $result ? $result->referer_id : null;
}


function find_sponsor($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('refer_id')->where('id', $user_id)->first();
    return $result ? $result->refer_id : null;
}

function find_sponsor_agent($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('agent')->select('reference_agent_id')->where('user_id', $user_id)->first();
    return $result ? $result->reference_agent_id : null;
}

function find_sponsor_agent1($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('agent')->select('user_id')->where('id', $user_id)->first();
    return $result ? $result->user_id : null;
}



function find_sponsor_placement($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('refer_id')->where('id', $user_id)->first();
    return $result ? $result->refer_id : null;
}


function find_millionaire01()
{
    global $queryBuilder;
    $result = $queryBuilder->table('millionaire_incom')->select('millionaire01')->where('id', '1')->first();
    return $result ? $result->millionaire01 : null;
}

function find_millionaire02()
{
    global $queryBuilder;
    $result = $queryBuilder->table('millionaire_incom')->select('millionaire02')->where('id', '1')->first();
    return $result ? $result->millionaire02 : null;
}

function find_millionaire03()
{
    global $queryBuilder;
    $result = $queryBuilder->table('millionaire_incom')->select('millionaire03')->where('id', '1')->first();
    return $result ? $result->millionaire03 : null;
}

function find_millionaire04()
{
    global $queryBuilder;
    $result = $queryBuilder->table('millionaire_incom')->select('millionaire04')->where('id', '1')->first();
    return $result ? $result->millionaire04 : null;
}


function member_status($user_id)
{
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('is_premium')->where('id', $user_id)->first();
    return $result ? $result->is_premium : null;
}

function biz_master_count_active(){
    global $queryBuilder;
    return $queryBuilder->table('member')->where('biz_alert',1)->count();
}

function biz_master_count_active_m(){
    global $queryBuilder;
    return $queryBuilder->table('member')->where('biz_alertm',1)->count();
}



function add_balance_user_biz_alert($refer, $com, $his, $user_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 1,
        'his' => $his,
        'from_id' => $user_id
    );
    try {
        $query = $queryBuilder->table('user_transection_biz_a')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}



function biz_alert_all($amount,$user_id){

global $mysqli;

$result = $mysqli->query("SELECT * FROM member WHERE biz_alert = 1 and biz_alertm = 0");

while ($row = $result->fetch_assoc()) {
    
    echo $row['username'];
    
    $sql1 = "UPDATE `member` SET `balance` = `balance` + '$amount' WHERE `member`.`id` = '{$row['id']}';";
    $mysqli->query($sql1);
    
    add_balance_user_biz_alert($row['id'],$amount,659,$user_id);
}

}

function biz_alert_allm($amount,$user_id){

global $mysqli;

$result = $mysqli->query("SELECT * FROM member WHERE biz_alertm = 1");

while ($row = $result->fetch_assoc()) {
    
    echo $row['username'];
    
    $sql1 = "UPDATE `member` SET `balance` = `balance` + '$amount' WHERE `member`.`id` = '{$row['id']}';";
    $mysqli->query($sql1);
    
    add_balance_user_biz_alert($row['id'],$amount,669,$user_id);
}

}



function biz_alert_active($user_id){
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('biz_alert')->where('id', $user_id)->first();
    return $result ? $result->biz_alert : null;
}

function biz_alert_active2($user_id){
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('biz_alert2')->where('id', $user_id)->first();
    return $result ? $result->biz_alert2 : null;
}

function biz_alert_active3($user_id){
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('biz_alert3')->where('id', $user_id)->first();
    return $result ? $result->biz_alert3 : null;
}

function biz_alert_active4($user_id){
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('biz_alert4')->where('id', $user_id)->first();
    return $result ? $result->biz_alert4 : null;
}

function biz_alert_active_time($user_id){
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('biz_alert_time')->where('id', $user_id)->first();
    return $result ? $result->biz_alert_time : null;
}

function biz_alert_active_time_day($user_id){
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('biz_day')->where('id', $user_id)->first();
    return $result ? $result->biz_day : null;
}


function find_package($user_id){
    global $queryBuilder;
    $result = $queryBuilder->table('member')->select('package')->where('id', $user_id)->first();
    return $result ? $result->package : null;
}


function add_balance_user_m_board($refer, $com, $user_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 68,
        'his' => 1,
        'from_id' => $user_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}

function add_balance_user_m_cashback($refer, $com, $user_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 19,
        'his' => 1,
        'from_id' => $user_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}

function add_balance_user_m_boost($refer, $com, $user_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 29,
        'his' => 1,
        'from_id' => $user_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}


function add_balance_post_refer($refer, $com, $gen, $user_id, $his)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 1,
        'gen' => $gen,
        'his' => $his,
        'from_id' => $user_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}

function add_balance_user_coments($refer, $com, $gen, $user_id, $post_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 1,
        'gen' => $gen,
        'his' => 52,
        'from_id' => $user_id,
        'post_id' => $post_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}
function add_balance_user_coments2($refer, $com, $gen, $user_id, $post_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 1,
        'gen' => $gen,
        'his' => 53,
        'from_id' => $user_id,
        'post_id' => $post_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}

function add_balance_user_refer($refer, $com, $gen, $user_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 1,
        'gen' => $gen,
        'his' => 51,
        'from_id' => $user_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}

function add_balance_user_refer_agent($refer, $com, $gen, $user_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 1,
        'gen' => $gen,
        'his' => 561,
        'from_id' => $user_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}


function add_balance_agent_refer_agent($refer, $com, $gen, $user_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 1,
        'gen' => $gen,
        'his' => 571,
        'from_id' => $user_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}


function add_balance_user_gen_type3($refer, $com, $gen, $user_id)
{
    global $mysqli;
     $sql1 = "UPDATE `member` SET `balance` = `balance` + '$com', `shongo_aye` = `shongo_aye`+'$com' WHERE `member`.`id` = '$refer';";
     $mysqli->query($sql1);
     
   /*  $des = 3;
            QB::table('notifications')->insert([
                'time' => time(),
                'user_id' => $refer,
                'event' => 'à¦¸à¦‚à¦˜',
                'description' => $des,
                'is_seen' => 0,
                'amount' => $com,
            ]);
            */
                                          
    /*global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 1,
        'gen' => $gen,
        'his' => 40,
        'from_id' => $user_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
    */
    
}

function add_balance_user_gen($refer, $com, $gen, $user_id)
{
    global $mysqli;
    
    if(biz_alert_active($refer)==1){
                                                
                                                $total_qty=total_order_qty($refer);
                                                $total_qty = $total_qty-3;
                                                 
                                                    if($total_qty<3){
                                                         $sql1 = "UPDATE `member` SET `bonchito_tk` = `bonchito_tk` + '$com' WHERE `member`.`id` = '$refer';";
                                                         $mysqli->query($sql1);
                                                    }else{
                                                         $sql1 = "UPDATE `member` SET `balance` = `balance` + '$com' WHERE `member`.`id` = '$refer';";
                                                         $mysqli->query($sql1);
                                                    }
                                                    
                                                }else{
    
    
    $sponsor_count = refer_count_active($refer);
     if 
    ( $sponsor_count > 5 ){
    
    global $mysqli;
     $sql1 = "UPDATE `member` SET `balance` = `balance` + '$com' WHERE `member`.`id` = '$refer';";
     $mysqli->query($sql1);
    }else{
        
        global $mysqli;
     $sql1 = "UPDATE `member` SET `balance_team` = `balance_team` + '$com' WHERE `member`.`id` = '$refer';";
     $mysqli->query($sql1);
        
    }
    
    }
    
}

function add_balance_user_gen_refer($refer, $com, $gen, $user_id)
{
        $sponsor_count = refer_count_active($refer);
    $package_id = find_package($refer);
        
        if (
    ( $package_id == 0 && $sponsor_count > 9 ) ||
    ( $package_id != 1 && $package_id != 9 && $package_id != 0 && ($sponsor_count == 0 || $sponsor_count > 9) )
) {
    global $mysqli;
     $sql1 = "UPDATE `member` SET `balance` = `balance` + '$com' WHERE `member`.`id` = '$refer';";
     $mysqli->query($sql1);
    }
}

function add_balance_user_gentoringo($refer, $com, $gen, $user_id)
{
    $sponsor_count = refer_count_active($refer);
    $package_id = find_package($refer);
        
        if 
    ( $sponsor_count >= 5 ){
        
        
    global $mysqli;
     $sql1 = "UPDATE `member` SET `balance` = `balance` + '$com', `torong_s_songo_aye` = `torong_s_songo_aye`+'$com' WHERE `member`.`id` = '$refer';";
     $mysqli->query($sql1);
     
    }
}

function add_balance_user_cirkel($refer, $com)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 1,
        'gen' => 0,
        'his' => 71
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}



function add_balance_user($refer, $com, $gen, $user_id, $post_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 1,
        'gen' => $gen,
        'his' => 51,
        'from_id' => $user_id,
        'post_id' => $post_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}

function total_income_comments($user_id){

        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection`
                WHERE his = '53'
                AND user_id = $user_id
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}

function total_income_view($user_id){

        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection`
                WHERE his = '52'
                AND user_id = $user_id
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}

function all_total_income($user_id){

        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection`
                WHERE user_id = $user_id and `type` != 6 and `his` != 40
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}

function update_total_income_aff($user_id){

        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection`
                WHERE user_id = $user_id and `type` != 6 and `his` = 40
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}

function all_total_income_aff($user_id){

        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection`
                WHERE user_id = $user_id and `his` IN ('12','13','14')
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}

function all_total_income_all($user_id){

        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection`
                WHERE user_id = $user_id and `type` != 6
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}

function total_income($user_id){

        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection`
                WHERE his = '51'
                AND user_id = $user_id
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found

}

function total_income_a($user_id,$his){

        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection`
                WHERE his = '$his'
                AND user_id = $user_id
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found

}

function total_his_type_dibit($user_id,$type,$his){

        $sql = "SELECT SUM(debit) as total_amount 
                FROM `user_transection`
                WHERE type = '$type'
                AND user_id = $user_id
                and his = $his
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}

function total_his_type($user_id,$type){

        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection`
                WHERE type = '$type'
                AND user_id = $user_id
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}

function total_his_history($user_id,$type){

        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection`
                WHERE his = '$type'
                AND user_id = $user_id
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}

function daily_comments_income($user_id){
    
$myDate = date('m/d/Y');
$date=strtotime($myDate);
$date_to = $date + 86399; // Adding seconds to the date to cover the entire day

        // SQL for specific day range
        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection` 
                WHERE time >= $date 
                AND time <= $date_to 
                AND his = '53'
                AND user_id = $user_id
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}


function daily_view_income($user_id){
    
$myDate = date('m/d/Y');
$date=strtotime($myDate);
$date_to = $date + 86399; // Adding seconds to the date to cover the entire day

        // SQL for specific day range
        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection` 
                WHERE time >= $date 
                AND time <= $date_to 
                AND his = '52'
                AND user_id = $user_id
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}



function daily_income($user_id){
    
$myDate = date('m/d/Y');
$date=strtotime($myDate);
$date_to = $date + 86399; // Adding seconds to the date to cover the entire day

        // SQL for specific day range
        $sql = "SELECT SUM(cradit) as total_amount 
                FROM `user_transection` 
                WHERE time >= $date 
                AND time <= $date_to 
                AND his = '51'
                AND user_id = $user_id
                ";
                
                $result = QB::query($sql)->first();
    return $result ? $result->total_amount : 0; // Return total amount, or 0 if no result found


}


function add_balance_user_won($refer, $com, $gen, $user_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $refer,
        'cradit' => $com,
        'type' => 15,
        'gen' => $gen,
        'his' => 11,
        'from_id' => $user_id
    );
    try {
        $query = $queryBuilder->table('user_transection')->insert($data);
        return $query;
    } catch (Exception $e) {
        error_log('Error in add_balance: ' . $e->getMessage());
        return false;
    }
}

function deduction_manual_percent($credit, $percent)
{
    $deduction = ($credit * $percent) / 100;
    return $deduction;
}

function gen_his_refer($user_id, $from_id, $commission, $gen, $type)
{
       $sponsor_count = refer_count_active($user_id);
    $package_id = find_package($user_id);
        
        if (
    ( $package_id == 0 && $sponsor_count > 9 ) ||
    ( $package_id != 1 && $package_id != 9 && $package_id != 0 && ($sponsor_count == 0 || $sponsor_count > 9) )
) {
        
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'from_id' => $from_id,
        'to_id' => $user_id,
        'amount' => $commission,
        'gen' => $gen,
        'type' => $type
    );
    $insert = $queryBuilder->table('gen_his')->insert($data);
    
    }
    
}

function gen_his($user_id, $from_id, $commission, $gen, $type)
{
   // if(find_package($user_id)!=9){
        
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'from_id' => $from_id,
        'to_id' => $user_id,
        'amount' => $commission,
        'gen' => $gen,
        'type' => $type
    );
    $insert = $queryBuilder->table('gen_his')->insert($data);
    
   // }
    
}

function gen_his_torongo($user_id, $from_id, $commission, $gen, $type)
{
           $sponsor_count = refer_count_active($user_id);
    $package_id = find_package($user_id);
        
        if (
    ( $package_id == 0 && $sponsor_count > 9 ) ||
    ( $package_id != 1 && $package_id != 9 && $package_id != 0 && ($sponsor_count == 0 || $sponsor_count > 9) )
) {
        
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'from_id' => $from_id,
        'to_id' => $user_id,
        'amount' => $commission,
        'gen' => $gen,
        'type' => $type
    );
    $insert = $queryBuilder->table('gen_his_torongo')->insert($data);
    
    }
    
}


function give_generation_club($username, $money)
{
    // echo '2';

    global $queryBuilder;
    //1st person
    $user_id = $username;

    $sponsor1 = find_sponsor($user_id);
    if ($sponsor1) {
        $commission1 = 30;
        add_balance_user($sponsor1, $commission1, 1, $user_id);
        gen_his($sponsor1, $user_id, $commission1, 1);
    }

    //echo '3';

    //2nd person
    $sponsor2 = find_sponsor($sponsor1);
    if ($sponsor2) {
        $commission2 = 20;
        add_balance_user($sponsor2, $commission2, 2, $user_id);
        gen_his($sponsor2, $user_id, $commission2, 2);
    }


    //3rd person
    $sponsor3 = find_sponsor($sponsor2);
    if ($sponsor3) {
        $commission3 = 10;
        add_balance_user($sponsor3, $commission3, 3, $user_id);
        gen_his($sponsor3, $user_id, $commission3, 3);
    }


    //4th person
    $sponsor4 = find_sponsor($sponsor3);
    if ($sponsor4) {
        $commission4 = 5;
        add_balance_user($sponsor4, $commission4, 4, $user_id);
        gen_his($sponsor4, $user_id, $commission4, 4);
    }


    //5th person
    $sponsor5 = find_sponsor($sponsor4);
    if ($sponsor5) {
        $commission5 = 5;
        add_balance_user($sponsor5, $commission5, 5, $user_id);
        gen_his($sponsor5, $user_id, $commission5, 5);
    }

    //6th person
    $sponsor6 = find_sponsor($sponsor5);
    if ($sponsor6) {
        $commission6 = 5;
        add_balance_user($sponsor6, $commission6, 6, $user_id);
        gen_his($sponsor6, $user_id, $commission6, 6);
    }

    //7th person
    $sponsor7 = find_sponsor($sponsor6);
    if ($sponsor7) {
        $commission7 = 5;
        add_balance_user($sponsor7, $commission7, 7, $user_id);
        gen_his($sponsor7, $user_id, $commission7, 7);
    }

/*
    //8th person
    $sponsor8 = find_sponsor($sponsor7);
    if ($sponsor8) {
        $commission8 = $money / 100 * 0.5;
        add_balance_user($sponsor8, $commission8, 8, $user_id);
        gen_his($sponsor8, $user_id, $commission8, 8);
    }

    //9th person
    $sponsor9 = find_sponsor($sponsor8);
    if ($sponsor9) {
        $commission9 = $money / 100 * 0.5;
        add_balance_user($sponsor9, $commission9, 9, $user_id);
        gen_his($sponsor9, $user_id, $commission9, 9);
    }

    //10th person
    $sponsor10 = find_sponsor($sponsor9);
    if ($sponsor10) {
        $commission10 = $money / 100 * 0.5;
        add_balance_user($sponsor10, $commission10, 10, $user_id);
        gen_his($sponsor10, $user_id, $commission10, 10);
    }


    //11th person
    $sponsor11 = find_sponsor($sponsor10);
    if ($sponsor11) {
        $commission11 = $money / 100 * 0.5;
        add_balance_user($sponsor11, $commission11, 11, $user_id);
        gen_his($sponsor11, $user_id, $commission11, 11);
    }


    //12th person
    $sponsor12 = find_sponsor($sponsor11);
    if ($sponsor12) {
        $commission12 = $money / 100 * 0.5;
        add_balance_user($sponsor12, $commission12, 12, $user_id);
        gen_his($sponsor12, $user_id, $commission12, 12);
    }

    /*   //13th person
    $sponsor13 = find_sponsor($sponsor12);
    if ($sponsor13) {
        $commission13 = deduction_manual_percent($money, GEN13);
        add_balance_user($sponsor13, $commission13, 13, $user_id);
        gen_his($sponsor13, $user_id, $commission13, 13);
    }

    //14th person
    $sponsor14 = find_sponsor($sponsor13);
    if ($sponsor14) {
        $commission14 = deduction_manual_percent($money, GEN14);
        add_balance_user($sponsor14, $commission14, 14, $user_id);
        gen_his($sponsor14, $user_id, $commission14, 14);
    }

    //15th person
    $sponsor15 = find_sponsor($sponsor14);
    if ($sponsor15) {
        $commission15 = deduction_manual_percent($money, GEN15);
        add_balance_user($sponsor15, $commission15, 15, $user_id);
        gen_his($sponsor15, $user_id, $commission15, 15);
    }

    /*    //16th person
        $sponsor16=find_sponsor($sponsor15);
        if(is_up_sponsor_found($sponsor15)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor16,0.05);
        add_generation_history($sponsor16,'16',$username,0.05,$purpose);   
        }
        
            //17th person
        $sponsor17=find_sponsor($sponsor16);
        if(is_up_sponsor_found($sponsor16)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor17,0.05);
        add_generation_history($sponsor17,'17',$username,0.05,$purpose);   
        }
        
            //18th person
        $sponsor18=find_sponsor($sponsor17);
        if(is_up_sponsor_found($sponsor17)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor18,0.05);
        add_generation_history($sponsor18,'18',$username,0.05,$purpose);   
        }
        
            //19th person
        $sponsor19=find_sponsor($sponsor18);
        if(is_up_sponsor_found($sponsor18)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor19,0.05);
        add_generation_history($sponsor19,'19',$username,0.05,$purpose);   
        }
        
            //19th person
        $sponsor20=find_sponsor($sponsor19);
        if(is_up_sponsor_found($sponsor19)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor20,0.05);
        add_generation_history($sponsor20,'20',$username,0.05,$purpose);   
        }
        */
}


function give_generation_circle_aff($username, $money)
{
    // echo '2';

    global $queryBuilder;
    //1st person
    $user_id = $username;

    $sponsor1 = find_sponsor($user_id);
    
    if ($sponsor1) {
        
        if(member_status($sponsor1) == 1 ){
        
        $commission1 = $money/100*5;
        add_balance_user_gen($sponsor1, $commission1, 1, $user_id);
        gen_his($sponsor1, $user_id, $commission1, 1, 4);
        
        }
    }

    //echo '3';

    //2nd person
    $sponsor2 = find_sponsor($sponsor1);
    if ($sponsor2) {
        
        if(member_status($sponsor2) == 1 ){
            
        $commission2 = $money/100*2.5;
        add_balance_user_gen($sponsor2, $commission2, 2, $user_id);
        gen_his($sponsor2, $user_id, $commission2, 2, 4);
        
        }
    }


    //3rd person
    $sponsor3 = find_sponsor($sponsor2);
    if ($sponsor3) {
        
        if(member_status($sponsor3) == 1 ){
            
        $commission3 = $money/100*2.5;
        add_balance_user_gen($sponsor3, $commission3, 3, $user_id);
        gen_his($sponsor3, $user_id, $commission3, 3, 4);
        
        }
    }

}



function give_generation_circle($username, $money)
{
    // echo '2';

    global $queryBuilder;
    //1st person
    $user_id = $username;

    $sponsor1 = find_sponsor($user_id);
    
    if ($sponsor1) {
        
        if(member_status($sponsor1) == 1 ){
        
        $commission1 = 1500;
        add_balance_user_gen($sponsor1, $commission1, 1, $user_id);
        gen_his($sponsor1, $user_id, $commission1, 1, 3);
        
        }
    }

    //echo '3';

    //2nd person
    $sponsor2 = find_sponsor($sponsor1);
    if ($sponsor2) {
        
        if(member_status($sponsor2) == 1 ){
            
        $commission2 = 1000;
        add_balance_user_gen($sponsor2, $commission2, 2, $user_id);
        gen_his($sponsor2, $user_id, $commission2, 2, 3);
        
        }
    }


    //3rd person
    $sponsor3 = find_sponsor($sponsor2);
    if ($sponsor3) {
        
        if(member_status($sponsor3) == 1 ){
            
        $commission3 = 300;
        add_balance_user_gen($sponsor3, $commission3, 3, $user_id);
        gen_his($sponsor3, $user_id, $commission3, 3, 3);
        
        }
    }


    //4th person
    $sponsor4 = find_sponsor($sponsor3);
    if ($sponsor4) {
        
        if(member_status($sponsor4) == 1 ){
            
        $commission4 = 100;
        add_balance_user_gen($sponsor4, $commission4, 4, $user_id);
        gen_his($sponsor4, $user_id, $commission4, 4, 3);
        
        }
    }


    //5th person
    $sponsor5 = find_sponsor($sponsor4);
    if ($sponsor5) {
        
        if(member_status($sponsor5) == 1 ){
            
        $commission5 = 100;
        add_balance_user_gen($sponsor5, $commission5, 5, $user_id);
        gen_his($sponsor5, $user_id, $commission5, 5, 3);
        
        }
    }


}


function give_generation_task($username, $money)
{
    /* //echo '2';

    global $queryBuilder;
    //1st person
    $user_id = $username;

    $sponsor1 = find_sponsor($user_id);
    
    if ($sponsor1) {
      //  echo '3';
        if(member_status($sponsor1) == 1 ){
       // echo '6';
        $commission1 = $money/100*1;
        
        if(find_package($sponsor1)!=9 && find_package($sponsor1) != 1){
        add_balance_user_gen_type3($sponsor1, $commission1, 1, $user_id);
        
        //echo '4';
        
        gen_his($sponsor1, $user_id, $commission1, 1, 3);
        }
        
        }
    }

    //echo '3';

    //2nd person
    $sponsor2 = find_sponsor($sponsor1);
    if ($sponsor2) {
        
        if(member_status($sponsor2) == 1 ){
            
        $commission2 = $money/100*0.65;
        if(find_package($sponsor2)!=9 && find_package($sponsor2) != 1){
        add_balance_user_gen_type3($sponsor2, $commission2, 2, $user_id);
        gen_his($sponsor2, $user_id, $commission2, 2, 3);
        }
        
        }
    }


    //3rd person
    $sponsor3 = find_sponsor($sponsor2);
    if ($sponsor3) {
        
        if(member_status($sponsor3) == 1 ){
            
        $commission3 = $money/100*0.5;
        if(find_package($sponsor3)!=9 && find_package($sponsor3) != 1){
        add_balance_user_gen_type3($sponsor3, $commission3, 3, $user_id);
        gen_his($sponsor3, $user_id, $commission3, 3, 3);
        }
        
        }
    }


    //4th person
    $sponsor4 = find_sponsor($sponsor3);
    if ($sponsor4) {
        
        if(member_status($sponsor4) == 1 ){
            
        $commission4 = $money/100*0.25;
        if(find_package($sponsor4)!=9 && find_package($sponsor4) != 1){
        add_balance_user_gen_type3($sponsor4, $commission4, 4, $user_id);
        gen_his($sponsor4, $user_id, $commission4, 4, 3);
        }
        
        }
    }


    //5th person
    $sponsor5 = find_sponsor($sponsor4);
    if ($sponsor5) {
        
        if(member_status($sponsor5) == 1 ){
            
        $commission5 = $money/100*0.2;
        if(find_package($sponsor5)!=9 && find_package($sponsor5) != 1){
        add_balance_user_gen_type3($sponsor5, $commission5, 5, $user_id);
        gen_his($sponsor5, $user_id, $commission5, 5, 3);
        }
        
        }
    }


    //6th person
    $sponsor6 = find_sponsor($sponsor5);
    if ($sponsor6) {
        if(member_status($sponsor6) == 1 ){
        $commission6 = $money/100*0.12;
        if(find_package($sponsor6)!=9 && find_package($sponsor6) != 1){
        add_balance_user_gen_type3($sponsor6, $commission6, 6, $user_id);
        gen_his($sponsor6, $user_id, $commission6, 6, 3);
        }
        
        }
    }

    //7th person
    $sponsor7 = find_sponsor($sponsor6);
    if ($sponsor7) {
        if(member_status($sponsor7) == 1 ){
        $commission7 = $money/100*0.1;
        if(find_package($sponsor7)!=9 && find_package($sponsor7) != 1){
        add_balance_user_gen_type3($sponsor7, $commission7, 7, $user_id);
        gen_his($sponsor7, $user_id, $commission7, 7, 3);
        }
        }
    }

    //8th person
    $sponsor8 = find_sponsor($sponsor7);
    if ($sponsor8) {
        if(member_status($sponsor8) == 1 ){
        $commission8 = $money/100*0.1;
        if(find_package($sponsor8)!=9 && find_package($sponsor8) != 1){
        add_balance_user_gen_type3($sponsor8, $commission8, 8, $user_id);
        gen_his($sponsor8, $user_id, $commission8, 8, 3);
        }
        }
    }

    //9th person
    $sponsor9 = find_sponsor($sponsor8);
    if ($sponsor9) {
        if(member_status($sponsor9) == 1 ){
        $commission9 = $money/100*0.08;
        if(find_package($sponsor9)!=9 && find_package($sponsor9) != 1){
        add_balance_user_gen_type3($sponsor9, $commission9, 9, $user_id);
        gen_his($sponsor9, $user_id, $commission9, 9, 3);
        }
        
        }
    }

/*
    //10th person
    $sponsor10 = find_sponsor($sponsor9);
    if ($sponsor10) {
        if(member_status($sponsor10) == 1 ){
        $commission10 = 5;
        add_balance_user_gen($sponsor10, $commission10, 10, $user_id);
        gen_his($sponsor10, $user_id, $commission10, 10, 2);
        }
    }


    //11th person
    $sponsor11 = find_sponsor($sponsor10);
    if ($sponsor11) {
        if(member_status($sponsor11) == 1 ){
        $commission11 = 3;
        add_balance_user_gen($sponsor11, $commission11, 11, $user_id);
        gen_his($sponsor11, $user_id, $commission11, 11, 2);
        }
    }


    //12th person
    $sponsor12 = find_sponsor($sponsor11);
    if ($sponsor12) {
        if(member_status($sponsor12) == 1 ){
        $commission12 = 3;
        add_balance_user_gen($sponsor12, $commission12, 12, $user_id);
        gen_his($sponsor12, $user_id, $commission12, 12, 2);
        }
    }

       //13th person
    $sponsor13 = find_sponsor($sponsor12);
    if ($sponsor13) {
        if(member_status($sponsor13) == 1 ){
        $commission13 = 3;
        add_balance_user_gen($sponsor13, $commission13, 13, $user_id);
        gen_his($sponsor13, $user_id, $commission13, 13, 2);
        }
    }

    //14th person
    $sponsor14 = find_sponsor($sponsor13);
    if ($sponsor14) {
        if(member_status($sponsor14) == 1 ){
        $commission14 = 3;
        add_balance_user_gen($sponsor14, $commission14, 14, $user_id);
        gen_his($sponsor14, $user_id, $commission14, 14, 2);
        }
    }

    //15th person
    $sponsor15 = find_sponsor($sponsor14);
    if ($sponsor15) {
        if(member_status($sponsor15) == 1 ){
        $commission15 = 2;
        add_balance_user_gen($sponsor15, $commission15, 15, $user_id);
        gen_his($sponsor15, $user_id, $commission15, 15, 2);
        }
    }

    /*    //16th person
        $sponsor16=find_sponsor($sponsor15);
        if(is_up_sponsor_found($sponsor15)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor16,0.05);
        add_generation_history($sponsor16,'16',$username,0.05,$purpose);   
        }
        
            //17th person
        $sponsor17=find_sponsor($sponsor16);
        if(is_up_sponsor_found($sponsor16)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor17,0.05);
        add_generation_history($sponsor17,'17',$username,0.05,$purpose);   
        }
        
            //18th person
        $sponsor18=find_sponsor($sponsor17);
        if(is_up_sponsor_found($sponsor17)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor18,0.05);
        add_generation_history($sponsor18,'18',$username,0.05,$purpose);   
        }
        
            //19th person
        $sponsor19=find_sponsor($sponsor18);
        if(is_up_sponsor_found($sponsor18)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor19,0.05);
        add_generation_history($sponsor19,'19',$username,0.05,$purpose);   
        }
        
            //19th person
        $sponsor20=find_sponsor($sponsor19);
        if(is_up_sponsor_found($sponsor19)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor20,0.05);
        add_generation_history($sponsor20,'20',$username,0.05,$purpose);   
        }
        */
}





function give_generation_post($username, $money, $his)
{
    // echo '2';

    global $queryBuilder;
    //1st person
    $user_id = $username;

    $sponsor1 = find_sponsor($user_id);
    
    if ($sponsor1) {
        
       // if(member_status($sponsor1) == 1 ){
        
        add_balance_post_refer($sponsor1, $money, 1, $user_id, $his);
        gen_his($sponsor1, $user_id, $money, 1, 1);
        
        //}
    }

    //echo '3';

    //2nd person
    $sponsor2 = find_sponsor($sponsor1);
    if ($sponsor2) {
        
        //if(member_status($sponsor2) == 1 ){
            
        add_balance_post_refer($sponsor2, $money, 2, $user_id, $his);
        gen_his($sponsor2, $user_id, $money, 2, 1);
        
       // }
    }


    //3rd person
    $sponsor3 = find_sponsor($sponsor2);
    if ($sponsor3) {
        
       // if(member_status($sponsor3) == 1 ){
            
        add_balance_post_refer($sponsor3, $money, 3, $user_id, $his);
        gen_his($sponsor3, $user_id, $money, 3, 1);
        
      //  }
    }

    //4th person
    $sponsor4 = find_sponsor($sponsor3);
    if ($sponsor4) {
        
       // if(member_status($sponsor4) == 1 ){
            
        add_balance_post_refer($sponsor4, $money, 4, $user_id, $his);
        gen_his($sponsor4, $user_id, $money, 4, 1);
        
      //  }
    }


    //5th person
    $sponsor5 = find_sponsor($sponsor4);
    if ($sponsor5) {
        
      //  if(member_status($sponsor5) == 1 ){
            
        add_balance_post_refer($sponsor5, $money, 5, $user_id, $his);
        gen_his($sponsor5, $user_id, $money, 5, 1);
        
     //   }
    }
    
/*

    //6th person
    $sponsor6 = find_sponsor($sponsor5);
    if ($sponsor6) {
        $commission6 = $money / 100 * 0.5;
        add_balance_user($sponsor6, $commission6, 6, $user_id);
        gen_his($sponsor6, $user_id, $commission6, 6);
    }

    //7th person
    $sponsor7 = find_sponsor($sponsor6);
    if ($sponsor7) {
        $commission7 = $money / 100 * 0.5;
        add_balance_user($sponsor7, $commission7, 7, $user_id);
        gen_his($sponsor7, $user_id, $commission7, 7);
    }
/*
    //8th person
    $sponsor8 = find_sponsor($sponsor7);
    if ($sponsor8) {
        $commission8 = $money / 100 * 0.5;
        add_balance_user($sponsor8, $commission8, 8, $user_id);
        gen_his($sponsor8, $user_id, $commission8, 8);
    }

    //9th person
    $sponsor9 = find_sponsor($sponsor8);
    if ($sponsor9) {
        $commission9 = $money / 100 * 0.5;
        add_balance_user($sponsor9, $commission9, 9, $user_id);
        gen_his($sponsor9, $user_id, $commission9, 9);
    }

    //10th person
    $sponsor10 = find_sponsor($sponsor9);
    if ($sponsor10) {
        $commission10 = $money / 100 * 0.5;
        add_balance_user($sponsor10, $commission10, 10, $user_id);
        gen_his($sponsor10, $user_id, $commission10, 10);
    }


    //11th person
    $sponsor11 = find_sponsor($sponsor10);
    if ($sponsor11) {
        $commission11 = $money / 100 * 0.5;
        add_balance_user($sponsor11, $commission11, 11, $user_id);
        gen_his($sponsor11, $user_id, $commission11, 11);
    }


    //12th person
    $sponsor12 = find_sponsor($sponsor11);
    if ($sponsor12) {
        $commission12 = $money / 100 * 0.5;
        add_balance_user($sponsor12, $commission12, 12, $user_id);
        gen_his($sponsor12, $user_id, $commission12, 12);
    }
*/
    /*   //13th person
    $sponsor13 = find_sponsor($sponsor12);
    if ($sponsor13) {
        $commission13 = deduction_manual_percent($money, GEN13);
        add_balance_user($sponsor13, $commission13, 13, $user_id);
        gen_his($sponsor13, $user_id, $commission13, 13);
    }

    //14th person
    $sponsor14 = find_sponsor($sponsor13);
    if ($sponsor14) {
        $commission14 = deduction_manual_percent($money, GEN14);
        add_balance_user($sponsor14, $commission14, 14, $user_id);
        gen_his($sponsor14, $user_id, $commission14, 14);
    }

    //15th person
    $sponsor15 = find_sponsor($sponsor14);
    if ($sponsor15) {
        $commission15 = deduction_manual_percent($money, GEN15);
        add_balance_user($sponsor15, $commission15, 15, $user_id);
        gen_his($sponsor15, $user_id, $commission15, 15);
    }

    /*    //16th person
        $sponsor16=find_sponsor($sponsor15);
        if(is_up_sponsor_found($sponsor15)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor16,0.05);
        add_generation_history($sponsor16,'16',$username,0.05,$purpose);   
        }
        
            //17th person
        $sponsor17=find_sponsor($sponsor16);
        if(is_up_sponsor_found($sponsor16)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor17,0.05);
        add_generation_history($sponsor17,'17',$username,0.05,$purpose);   
        }
        
            //18th person
        $sponsor18=find_sponsor($sponsor17);
        if(is_up_sponsor_found($sponsor17)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor18,0.05);
        add_generation_history($sponsor18,'18',$username,0.05,$purpose);   
        }
        
            //19th person
        $sponsor19=find_sponsor($sponsor18);
        if(is_up_sponsor_found($sponsor18)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor19,0.05);
        add_generation_history($sponsor19,'19',$username,0.05,$purpose);   
        }
        
            //19th person
        $sponsor20=find_sponsor($sponsor19);
        if(is_up_sponsor_found($sponsor19)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor20,0.05);
        add_generation_history($sponsor20,'20',$username,0.05,$purpose);   
        }
        */
}


function give_generation_refer($username, $money)
{
     //echo '2';

    global $queryBuilder;
    //1st person
    $user_id = $username;

   $sponsorm = find_sponsor_refer($user_id);
    
  
    
    $sponsor1 = $sponsorm;
    
    if ($sponsor1) {
      //  echo '3';
        if(member_status($sponsor1) == 1 ){
            
          
                
       // echo '6';
       $commission1 = $money/100*1;
          //die();
          
     
            
        add_balance_user_gen_refer($sponsor1, $commission1, 1, $user_id);
        
        //echo '4';
        
        gen_his_refer($sponsor1, $user_id, $commission1, 1, 6);
        
    
        
        }
    }

    //echo '3';

    //2nd person
    $sponsor2 = find_sponsor_refer($sponsor1);
    if ($sponsor2) {
        
        if(member_status($sponsor2) == 1 ){
            
        $commission2 = $money/100*0.5;
   
        add_balance_user_gen_refer($sponsor2, $commission2, 2, $user_id);
        gen_his_refer($sponsor2, $user_id, $commission2, 2, 6);
      
        }
    }


    //3rd person
    $sponsor3 = find_sponsor_refer($sponsor2);
    if ($sponsor3) {
        
        if(member_status($sponsor3) == 1 ){
            
        $commission3 = $money/100*0.25;
     
        add_balance_user_gen_refer($sponsor3, $commission3, 3, $user_id);
        gen_his_refer($sponsor3, $user_id, $commission3, 3, 6);
      
        }
    }


    //4th person
    $sponsor4 = find_sponsor_refer($sponsor3);
    if ($sponsor4) {
        
        if(member_status($sponsor4) == 1 ){
            
        $commission4 = $money/100*0.25;
        
        add_balance_user_gen_refer($sponsor4, $commission4, 4, $user_id);
        gen_his_refer($sponsor4, $user_id, $commission4, 4, 6);
      
        }
    }


    //5th person
    $sponsor5 = find_sponsor_refer($sponsor4);
    if ($sponsor5) {
        
        if(member_status($sponsor5) == 1 ){
            
        $commission5 = $money/100*0.25;
       
        add_balance_user_gen_refer($sponsor5, $commission5, 5, $user_id);
        gen_his_refer($sponsor5, $user_id, $commission5, 5, 6);
       
        }
    }


    //6th person
    $sponsor6 = find_sponsor_refer($sponsor5);
    if ($sponsor6) {
        if(member_status($sponsor6) == 1 ){
        $commission6 = $money/100*0.25;

        add_balance_user_gen_refer($sponsor6, $commission6, 6, $user_id);
        gen_his_refer($sponsor6, $user_id, $commission6, 6, 6);

        }
    }

    //7th person
    $sponsor7 = find_sponsor_refer($sponsor6);
    if ($sponsor7) {
        if(member_status($sponsor7) == 1 ){
        $commission7 = $money/100*0.25;
        
        add_balance_user_gen_refer($sponsor7, $commission7, 7, $user_id);
        gen_his_refer($sponsor7, $user_id, $commission7, 7, 6);
       
        }
    }

    //8th person
    $sponsor8 = find_sponsor_refer($sponsor7);
    if ($sponsor8) {
        if(member_status($sponsor8) == 1 ){
        $commission8 = $money/100*0.25;
    
        add_balance_user_gen_refer($sponsor8, $commission8, 8, $user_id);
        gen_his_refer($sponsor8, $user_id, $commission8, 8, 6);
   
        }
    }

    //9th person
    $sponsor9 = find_sponsor_refer($sponsor8);
    if ($sponsor9) {
        if(member_status($sponsor9) == 1 ){
        $commission9 = $money/100*0.25;
       
        add_balance_user_gen_refer($sponsor9, $commission9, 9, $user_id);
        gen_his_refer($sponsor9, $user_id, $commission9, 9, 6);
      
        }
    }

    //10th person
    $sponsor10 = find_sponsor_refer($sponsor9);
    if ($sponsor10) {
        if(member_status($sponsor10) == 1 ){
        $commission10 = $money/100*0.25;
        
        add_balance_user_gen_refer($sponsor10, $commission10, 10, $user_id);
        gen_his_refer($sponsor10, $user_id, $commission10, 10, 6);
      
        }
    }


    //11th person
    $sponsor11 = find_sponsor_refer($sponsor10);
    if ($sponsor11) {
        if(member_status($sponsor11) == 1 ){
        $commission11 = $money/100*0.25;
      
        add_balance_user_gen_refer($sponsor11, $commission11, 11, $user_id);
        gen_his_refer($sponsor11, $user_id, $commission11, 11, 6);
      
        }
    }


    //12th person
    $sponsor12 = find_sponsor_refer($sponsor11);
    if ($sponsor12) {
        if(member_status($sponsor12) == 1 ){
        $commission12 = $money/100*0.25;
      
        add_balance_user_gen_refer($sponsor12, $commission12, 12, $user_id);
        gen_his_refer($sponsor12, $user_id, $commission12, 12, 6);
     
        }
    }

       //13th person
    $sponsor13 = find_sponsor_refer($sponsor12);
    if ($sponsor13) {
        if(member_status($sponsor13) == 1 ){
        $commission13 = $money/100*0.15;
    
        add_balance_user_gen_refer($sponsor13, $commission13, 13, $user_id);
        gen_his_refer($sponsor13, $user_id, $commission13, 13, 6);
     
        }
    }

    //14th person
    $sponsor14 = find_sponsor_refer($sponsor13);
    if ($sponsor14) {
        if(member_status($sponsor14) == 1 ){
        $commission14 = $money/100*0.15;
      
        add_balance_user_gen_refer($sponsor14, $commission14, 14, $user_id);
        gen_his_refer($sponsor14, $user_id, $commission14, 14, 6);
     
        }
    }

    //15th person
    $sponsor15 = find_sponsor_refer($sponsor14);
    if ($sponsor15) {
        if(member_status($sponsor15) == 1 ){
        $commission15 = $money/100*0.10;
     
        add_balance_user_gen_refer($sponsor15, $commission15, 15, $user_id);
        gen_his_refer($sponsor15, $user_id, $commission15, 15, 6);
     
        }
    }

        //16th person
        $sponsor16=find_sponsor_refer($sponsor15);
        if($sponsor16){
            $commission15 = $money/100*0.10;
        
        add_balance_user_gen_refer($sponsor16, $commission15, 16, $user_id);
        gen_his_refer($sponsor16, $user_id, $commission15, 16, 6);
    
        }
        
            //17th person
        $sponsor17=find_sponsor_refer($sponsor16);
        if($sponsor17){
            $commission15 = $money/100*0.10;
           
        add_balance_user_gen_refer($sponsor17, $commission15, 17, $user_id);
        gen_his_refer($sponsor17, $user_id, $commission15, 17, 6);
      
        }
        
            //18th person
        $sponsor18=find_sponsor_refer($sponsor17);
        if($sponsor18){
            $commission15 = $money/100*0.10;
        
        add_balance_user_gen_refer($sponsor18, $commission15, 18, $user_id);
        gen_his_refer($sponsor18, $user_id, $commission15, 18, 6);
      
        }
        
            //19th person
        $sponsor19=find_sponsor_refer($sponsor18);
        if($sponsor19){
            $commission15 = $money/100*0.10;
       
        add_balance_user_gen_refer($sponsor19, $commission15, 19, $user_id);
        gen_his_refer($sponsor19, $user_id, $commission15, 19, 6);
      
        }
        
            //20th person
        $sponsor20=find_sponsor_refer($sponsor19);
        if($sponsor20){
            $commission15 = $money/100*0.10;

        add_balance_user_gen_refer($sponsor20, $commission15, 20, $user_id);
        gen_his_refer($sponsor20, $user_id, $commission15, 20, 6); 
    
        }
        
             //21th person
        $sponsor21=find_sponsor_refer($sponsor20);
        if($sponsor21){
           $commission15 = $money/100*0.10;

        add_balance_user_gen_refer($sponsor21, $commission15, 21, $user_id);
        gen_his_refer($sponsor21, $user_id, $commission15, 21, 6);  

        }
        
        
}

function give_generation_441($username, $money)
{
     //echo '2';
    global $queryBuilder;
    //1st person
    $user_id = $username;
    $sponsorm = find_sponsor_placement($user_id);
    $sponsor1 = $sponsorm;
    if ($sponsor1) {
      //  echo '3';
        if(member_status($sponsor1) == 1 ){
       // echo '6';
        $commission1 = $money/100*1;
        
        add_balance_user_gentoringo($sponsor1, $commission1, 1, $user_id);
        //echo '4';
        gen_his_torongo($sponsor1, $user_id, $commission1, 1, 2);
        
        
        }
    }

    //echo '3';

    //2nd person
    $sponsor2 = find_sponsor($sponsor1);
    if ($sponsor2) {
        if(member_status($sponsor2) == 1 ){
        $commission2 = $money/100*0.5;
        add_balance_user_gentoringo($sponsor2, $commission2, 2, $user_id);
        gen_his_torongo($sponsor2, $user_id, $commission2, 2, 2);
        }
    }


    //3rd person
    $sponsor3 = find_sponsor($sponsor2);
    if ($sponsor3) {
        
        if(member_status($sponsor3) == 1 ){
            
        $commission3 = $money/100*0.25;
        add_balance_user_gentoringo($sponsor3, $commission3, 3, $user_id);
        gen_his_torongo($sponsor3, $user_id, $commission3, 3, 2);
        
        }
    }


    //4th person
    $sponsor4 = find_sponsor($sponsor3);
    if ($sponsor4) {
        
        if(member_status($sponsor4) == 1 ){
            
        $commission4 = $money/100*0.25;
        add_balance_user_gentoringo($sponsor4, $commission4, 4, $user_id);
        gen_his_torongo($sponsor4, $user_id, $commission4, 4, 2);
        
        }
    }


    //5th person
    $sponsor5 = find_sponsor($sponsor4);
    if ($sponsor5) {
        
        if(member_status($sponsor5) == 1 ){
            
        $commission5 = $money/100*0.25;
        add_balance_user_gentoringo($sponsor5, $commission5, 5, $user_id);
        gen_his_torongo($sponsor5, $user_id, $commission5, 5, 2);
        
        }
    }


    //6th person
    $sponsor6 = find_sponsor($sponsor5);
    if ($sponsor6) {
        if(member_status($sponsor6) == 1 ){
        $commission6 = $money/100*0.25;
        add_balance_user_gentoringo($sponsor6, $commission6, 6, $user_id);
        gen_his_torongo($sponsor6, $user_id, $commission6, 6, 2);
        
        }
    }

    //7th person
    $sponsor7 = find_sponsor($sponsor6);
    if ($sponsor7) {
        if(member_status($sponsor7) == 1 ){
        $commission7 = $money/100*0.25;
        add_balance_user_gentoringo($sponsor7, $commission7, 7, $user_id);
        gen_his_torongo($sponsor7, $user_id, $commission7, 7, 2);
        }
    }

    //8th person
    $sponsor8 = find_sponsor($sponsor7);
    if ($sponsor8) {
        if(member_status($sponsor8) == 1 ){
        $commission8 = $money/100*0.25;
        add_balance_user_gentoringo($sponsor8, $commission8, 8, $user_id);
        gen_his_torongo($sponsor8, $user_id, $commission8, 8, 2);
        }
    }

    //9th person
    $sponsor9 = find_sponsor($sponsor8);
    if ($sponsor9) {
        if(member_status($sponsor9) == 1 ){
        $commission9 = $money/100*0.25;
        add_balance_user_gentoringo($sponsor9, $commission9, 9, $user_id);
        gen_his_torongo($sponsor9, $user_id, $commission9, 9, 2);
        }
    }

    //10th person
    $sponsor10 = find_sponsor($sponsor9);
    if ($sponsor10) {
        if(member_status($sponsor10) == 1 ){
        $commission10 = $money/100*0.25;
        add_balance_user_gentoringo($sponsor10, $commission10, 10, $user_id);
        gen_his_torongo($sponsor10, $user_id, $commission10, 10, 2);
        }
    }


    //11th person
    $sponsor11 = find_sponsor($sponsor10);
    if ($sponsor11) {
        if(member_status($sponsor11) == 1 ){
        $commission11 = $money/100*0.25;
        add_balance_user_gentoringo($sponsor11, $commission11, 11, $user_id);
        gen_his_torongo($sponsor11, $user_id, $commission11, 11, 2);
        }
    }


    //12th person
    $sponsor12 = find_sponsor($sponsor11);
    if ($sponsor12) {
        if(member_status($sponsor12) == 1 ){
        $commission12 = $money/100*0.25;
        add_balance_user_gentoringo($sponsor12, $commission12, 12, $user_id);
        gen_his_torongo($sponsor12, $user_id, $commission12, 12, 2);
        }
    }

       //13th person
    $sponsor13 = find_sponsor($sponsor12);
    if ($sponsor13) {
        if(member_status($sponsor13) == 1 ){
        $commission13 = $money/100*0.15;
        add_balance_user_gentoringo($sponsor13, $commission13, 13, $user_id);
        gen_his_torongo($sponsor13, $user_id, $commission13, 13, 2);
        }
    }

    //14th person
    $sponsor14 = find_sponsor($sponsor13);
    if ($sponsor14) {
        if(member_status($sponsor14) == 1 ){
        $commission14 = $money/100*0.15;
        add_balance_user_gentoringo($sponsor14, $commission14, 14, $user_id);
        gen_his_torongo($sponsor14, $user_id, $commission14, 14, 2);
        }
    }

    //15th person
    $sponsor15 = find_sponsor($sponsor14);
    if ($sponsor15) {
        if(member_status($sponsor15) == 1 ){
        $commission15 = $money/100*0.10;
        add_balance_user_gentoringo($sponsor15, $commission15, 15, $user_id);
        gen_his_torongo($sponsor15, $user_id, $commission15, 15, 2);
        }
    }

        //16th person
        $sponsor16=find_sponsor($sponsor15);
        if($sponsor16){
            $commission15 = $money/100*0.10;
        add_balance_user_gentoringo($sponsor16, $commission15, 16, $user_id);
        gen_his_torongo($sponsor16, $user_id, $commission15, 16, 2);
        }
        
            //17th person
        $sponsor17=find_sponsor($sponsor16);
        if($sponsor17){
            $commission15 = $money/100*0.10;
        add_balance_user_gentoringo($sponsor17, $commission15, 17, $user_id);
        gen_his_torongo($sponsor17, $user_id, $commission15, 17, 2);
        }
        
            //18th person
        $sponsor18=find_sponsor($sponsor17);
        if($sponsor18){
            $commission15 = $money/100*0.10;
        add_balance_user_gentoringo($sponsor18, $commission15, 18, $user_id);
        gen_his_torongo($sponsor18, $user_id, $commission15, 18, 2);
        }
        
            //19th person
        $sponsor19=find_sponsor($sponsor18);
        if($sponsor19){
            $commission15 = $money/100*0.10;
        add_balance_user_gentoringo($sponsor19, $commission15, 19, $user_id);
        gen_his_torongo($sponsor19, $user_id, $commission15, 19, 2);
        }
        
            //20th person
        $sponsor20=find_sponsor($sponsor19);
        if($sponsor20){
            $commission15 = $money/100*0.10;
        add_balance_user_gentoringo($sponsor20, $commission15, 20, $user_id);
        gen_his_torongo($sponsor20, $user_id, $commission15, 20, 2); 
        }
        
             //21th person
        $sponsor21=find_sponsor($sponsor20);
        if($sponsor21){
           $commission15 = $money/100*0.10;
        add_balance_user_gentoringo($sponsor21, $commission15, 21, $user_id);
        gen_his_torongo($sponsor21, $user_id, $commission15, 21, 2);  
        }
        
        
}




function give_generation2($username, $money, $total_price)
{
     //echo '2';
    global $queryBuilder;
    //1st person
    $user_id = $username;
    $sponsorm = find_sponsor_placement($user_id);
    $sponsor1 = $sponsorm;
    if ($sponsor1) {
      //  echo '3';
        if(member_status($sponsor1) == 1 ){
       // echo '6';
        $commission1 = 40*$total_price;
        
        add_balance_user_gen($sponsor1, $commission1, 1, $user_id);
        //echo '4';
        gen_his($sponsor1, $user_id, $commission1, 1, 2);
        
       // give_generation_441($sponsor1, $commission1);
        
        }
    }

    //echo '3';

    //2nd person
    $sponsor2 = find_sponsor($sponsor1);
    
    if ($sponsor2) {
        
        if(member_status($sponsor2) == 1 ){
            
        $commission2 = 35*$total_price;
        
        add_balance_user_gen($sponsor2, $commission2, 2, $user_id);
        
        gen_his($sponsor2, $user_id, $commission2, 2, 2);
        
        //give_generation_441($sponsor2, $commission2);
        
        }
    }


    //3rd person
    $sponsor3 = find_sponsor($sponsor2);
    if ($sponsor3) {
        
        if(member_status($sponsor3) == 1 ){
            
        $commission3 = 30*$total_price;
        add_balance_user_gen($sponsor3, $commission3, 3, $user_id);
        gen_his($sponsor3, $user_id, $commission3, 3, 2);
        
       // give_generation_441($sponsor3, $commission3);
        
        }
    }


    //4th person
    $sponsor4 = find_sponsor($sponsor3);
    if ($sponsor4) {
        
        if(member_status($sponsor4) == 1 ){
            
        $commission4 = 10*$total_price;
        add_balance_user_gen($sponsor4, $commission4, 4, $user_id);
        gen_his($sponsor4, $user_id, $commission4, 4, 2);
        //give_generation_441($sponsor4, $commission4);
        
        }
    }


    //5th person
    $sponsor5 = find_sponsor($sponsor4);
    if ($sponsor5) {
        
        if(member_status($sponsor5) == 1 ){
            
        $commission5 = 10*$total_price;
        add_balance_user_gen($sponsor5, $commission5, 5, $user_id);
        gen_his($sponsor5, $user_id, $commission5, 5, 2);
       // give_generation_441($sponsor5, $commission5);
        
        }
    }


    //6th person
    $sponsor6 = find_sponsor($sponsor5);
    if ($sponsor6) {
        if(member_status($sponsor6) == 1 ){
        $commission6 = 10*$total_price;
        add_balance_user_gen($sponsor6, $commission6, 6, $user_id);
        gen_his($sponsor6, $user_id, $commission6, 6, 2);
       // give_generation_441($sponsor6, $commission6);
        
        }
    }

    //7th person
    $sponsor7 = find_sponsor($sponsor6);
    if ($sponsor7) {
        if(member_status($sponsor7) == 1 ){
        $commission7 = 10*$total_price;
        add_balance_user_gen($sponsor7, $commission7, 7, $user_id);
        gen_his($sponsor7, $user_id, $commission7, 7, 2);
       // give_generation_441($sponsor7, $commission7);
        }
    }

    //8th person
    $sponsor8 = find_sponsor($sponsor7);
    if ($sponsor8) {
        if(member_status($sponsor8) == 1 ){
        $commission8 = 10*$total_price;
        add_balance_user_gen($sponsor8, $commission8, 8, $user_id);
        gen_his($sponsor8, $user_id, $commission8, 8, 2);
        //give_generation_441($sponsor8, $commission8);
        }
    }

    //9th person
    $sponsor9 = find_sponsor($sponsor8);
    if ($sponsor9) {
        if(member_status($sponsor9) == 1 ){
        $commission9 = 10*$total_price;
        add_balance_user_gen($sponsor9, $commission9, 9, $user_id);
        gen_his($sponsor9, $user_id, $commission9, 9, 2);
        //give_generation_441($sponsor9, $commission9);
        }
    }
/*
    //10th person
    $sponsor10 = find_sponsor($sponsor9);
    if ($sponsor10) {
        if(member_status($sponsor10) == 1 ){
        $commission10 = $money/100*0.321;
        add_balance_user_gen($sponsor10, $commission10, 10, $user_id);
        gen_his($sponsor10, $user_id, $commission10, 10, 2);
       // give_generation_441($sponsor10, $commission10);
        }
    }


    //11th person
    $sponsor11 = find_sponsor($sponsor10);
    if ($sponsor11) {
        if(member_status($sponsor11) == 1 ){
        $commission11 = $money/100*0.321;
        add_balance_user_gen($sponsor11, $commission11, 11, $user_id);
        gen_his($sponsor11, $user_id, $commission11, 11, 2);
       // give_generation_441($sponsor11, $commission11);
        }
    }


    //12th person
    $sponsor12 = find_sponsor($sponsor11);
    if ($sponsor12) {
        if(member_status($sponsor12) == 1 ){
        $commission12 = $money/100*0.321;
        add_balance_user_gen($sponsor12, $commission12, 12, $user_id);
        gen_his($sponsor12, $user_id, $commission12, 12, 2);
        //give_generation_441($sponsor12, $commission12);
        }
    }

       //13th person
    $sponsor13 = find_sponsor($sponsor12);
    if ($sponsor13) {
        if(member_status($sponsor13) == 1 ){
        $commission13 = $money/100*0.321;
        add_balance_user_gen($sponsor13, $commission13, 13, $user_id);
        gen_his($sponsor13, $user_id, $commission13, 13, 2);
        //give_generation_441($sponsor13, $commission13);
        }
    }

    //14th person
    $sponsor14 = find_sponsor($sponsor13);
    if ($sponsor14) {
        if(member_status($sponsor14) == 1 ){
        $commission14 = $money/100*0.321;
        add_balance_user_gen($sponsor14, $commission14, 14, $user_id);
        gen_his($sponsor14, $user_id, $commission14, 14, 2);
        //give_generation_441($sponsor14, $commission14);
        }
    }

    //15th person
    $sponsor15 = find_sponsor($sponsor14);
    if ($sponsor15) {
        if(member_status($sponsor15) == 1 ){
        $commission15 = $money/100*0.321;
        add_balance_user_gen($sponsor15, $commission15, 15, $user_id);
        gen_his($sponsor15, $user_id, $commission15, 15, 2);
        //give_generation_441($sponsor15, $commission15);
        }
    }

        //16th person
        $sponsor16=find_sponsor($sponsor15);
        if($sponsor16){
            $commission15 = $money/100*0.321;
        add_balance_user_gen($sponsor16, $commission15, 16, $user_id);
        gen_his($sponsor16, $user_id, $commission15, 16, 2);
        //give_generation_441($sponsor16, $commission15);
        }
        
            //17th person
        $sponsor17=find_sponsor($sponsor16);
        if($sponsor17){
            $commission15 = $money/100*0.321;
        add_balance_user_gen($sponsor17, $commission15, 17, $user_id);
        gen_his($sponsor17, $user_id, $commission15, 17, 2);
        //give_generation_441($sponsor17, $commission15);
        }
        
            //18th person
        $sponsor18=find_sponsor($sponsor17);
        if($sponsor18){
            $commission15 = $money/100*0.321;
        add_balance_user_gen($sponsor18, $commission15, 18, $user_id);
        gen_his($sponsor18, $user_id, $commission15, 18, 2);
        //give_generation_441($sponsor18, $commission15);
        }
        
            //19th person
        $sponsor19=find_sponsor($sponsor18);
        if($sponsor19){
            $commission15 = $money/100*0.321;
        add_balance_user_gen($sponsor19, $commission15, 19, $user_id);
        gen_his($sponsor19, $user_id, $commission15, 19, 2);
       // give_generation_441($sponsor19, $commission15);
        }
        
            //20th person
        $sponsor20=find_sponsor($sponsor19);
        if($sponsor20){
            $commission15 = $money/100*0.321;
        add_balance_user_gen($sponsor20, $commission15, 20, $user_id);
        gen_his($sponsor20, $user_id, $commission15, 20, 2); 
        //give_generation_441($sponsor20, $commission15);
        }
        
             //21th person
        $sponsor21=find_sponsor($sponsor20);
        if($sponsor21){
           $commission15 = $money/100*0.321;
        add_balance_user_gen($sponsor21, $commission15, 21, $user_id);
        gen_his($sponsor21, $user_id, $commission15, 21, 2);  
        //give_generation_441($sponsor21, $commission15);
        }
        */
        
}



function give_generation($username, $money)
{
     //echo '2';

    global $queryBuilder;
    //1st person
    $user_id = $username;

    $sponsorm = find_sponsor($user_id);
    
    $sponsor1 = find_sponsor($sponsorm);
    
    if ($sponsor1) {
      //  echo '3';
        if(member_status($sponsor1) == 1 ){
       // echo '6';
        $commission1 = $money/100*0.67;
        
        add_balance_user_gen($sponsor1, $commission1, 1, $user_id);
        
        //echo '4';
        
        gen_his($sponsor1, $user_id, $commission1, 1, 2);
        
        }
    }

    //echo '3';

    //2nd person
    $sponsor2 = find_sponsor($sponsor1);
    if ($sponsor2) {
        
        if(member_status($sponsor2) == 1 ){
            
        $commission2 = $money/100*0.47;
        add_balance_user_gen($sponsor2, $commission2, 2, $user_id);
        gen_his($sponsor2, $user_id, $commission2, 2, 2);
        
        }
    }


    //3rd person
    $sponsor3 = find_sponsor($sponsor2);
    if ($sponsor3) {
        
        if(member_status($sponsor3) == 1 ){
            
        $commission3 = $money/100*0.47;
        add_balance_user_gen($sponsor3, $commission3, 3, $user_id);
        gen_his($sponsor3, $user_id, $commission3, 3, 2);
        
        }
    }


    //4th person
    $sponsor4 = find_sponsor($sponsor3);
    if ($sponsor4) {
        
        if(member_status($sponsor4) == 1 ){
            
        $commission4 = $money/100*0.47;
        add_balance_user_gen($sponsor4, $commission4, 4, $user_id);
        gen_his($sponsor4, $user_id, $commission4, 4, 2);
        
        }
    }


    //5th person
    $sponsor5 = find_sponsor($sponsor4);
    if ($sponsor5) {
        
        if(member_status($sponsor5) == 1 ){
            
        $commission5 = $money/100*0.33;
        add_balance_user_gen($sponsor5, $commission5, 5, $user_id);
        gen_his($sponsor5, $user_id, $commission5, 5, 2);
        
        }
    }


    //6th person
    $sponsor6 = find_sponsor($sponsor5);
    if ($sponsor6) {
        if(member_status($sponsor6) == 1 ){
        $commission6 = $money/100*0.33;
        add_balance_user_gen($sponsor6, $commission6, 6, $user_id);
        gen_his($sponsor6, $user_id, $commission6, 6, 2);
        
        }
    }

    //7th person
    $sponsor7 = find_sponsor($sponsor6);
    if ($sponsor7) {
        if(member_status($sponsor7) == 1 ){
        $commission7 = $money/100*0.33;
        add_balance_user_gen($sponsor7, $commission7, 7, $user_id);
        gen_his($sponsor7, $user_id, $commission7, 7, 2);
        }
    }

    //8th person
    $sponsor8 = find_sponsor($sponsor7);
    if ($sponsor8) {
        if(member_status($sponsor8) == 1 ){
        $commission8 = $money/100*0.33;
        add_balance_user_gen($sponsor8, $commission8, 8, $user_id);
        gen_his($sponsor8, $user_id, $commission8, 8, 2);
        }
    }

    //9th person
    $sponsor9 = find_sponsor($sponsor8);
    if ($sponsor9) {
        if(member_status($sponsor9) == 1 ){
        $commission9 = $money/100*0.33;
        add_balance_user_gen($sponsor9, $commission9, 9, $user_id);
        gen_his($sponsor9, $user_id, $commission9, 9, 2);
        }
    }

    //10th person
    $sponsor10 = find_sponsor($sponsor9);
    if ($sponsor10) {
        if(member_status($sponsor10) == 1 ){
        $commission10 = $money/100*0.33;
        add_balance_user_gen($sponsor10, $commission10, 10, $user_id);
        gen_his($sponsor10, $user_id, $commission10, 10, 2);
        }
    }


    //11th person
    $sponsor11 = find_sponsor($sponsor10);
    if ($sponsor11) {
        if(member_status($sponsor11) == 1 ){
        $commission11 = $money/100*0.20;
        add_balance_user_gen($sponsor11, $commission11, 11, $user_id);
        gen_his($sponsor11, $user_id, $commission11, 11, 2);
        }
    }


    //12th person
    $sponsor12 = find_sponsor($sponsor11);
    if ($sponsor12) {
        if(member_status($sponsor12) == 1 ){
        $commission12 = $money/100*0.20;
        add_balance_user_gen($sponsor12, $commission12, 12, $user_id);
        gen_his($sponsor12, $user_id, $commission12, 12, 2);
        }
    }

       //13th person
    $sponsor13 = find_sponsor($sponsor12);
    if ($sponsor13) {
        if(member_status($sponsor13) == 1 ){
        $commission13 = $money/100*0.20;
        add_balance_user_gen($sponsor13, $commission13, 13, $user_id);
        gen_his($sponsor13, $user_id, $commission13, 13, 2);
        }
    }

    //14th person
    $sponsor14 = find_sponsor($sponsor13);
    if ($sponsor14) {
        if(member_status($sponsor14) == 1 ){
        $commission14 = $money/100*0.20;
        add_balance_user_gen($sponsor14, $commission14, 14, $user_id);
        gen_his($sponsor14, $user_id, $commission14, 14, 2);
        }
    }

    //15th person
    $sponsor15 = find_sponsor($sponsor14);
    if ($sponsor15) {
        if(member_status($sponsor15) == 1 ){
        $commission15 = $money/100*0.14;
        add_balance_user_gen($sponsor15, $commission15, 15, $user_id);
        gen_his($sponsor15, $user_id, $commission15, 15, 2);
        }
    }

    /*    //16th person
        $sponsor16=find_sponsor($sponsor15);
        if(is_up_sponsor_found($sponsor15)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor16,0.05);
        add_generation_history($sponsor16,'16',$username,0.05,$purpose);   
        }
        
            //17th person
        $sponsor17=find_sponsor($sponsor16);
        if(is_up_sponsor_found($sponsor16)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor17,0.05);
        add_generation_history($sponsor17,'17',$username,0.05,$purpose);   
        }
        
            //18th person
        $sponsor18=find_sponsor($sponsor17);
        if(is_up_sponsor_found($sponsor17)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor18,0.05);
        add_generation_history($sponsor18,'18',$username,0.05,$purpose);   
        }
        
            //19th person
        $sponsor19=find_sponsor($sponsor18);
        if(is_up_sponsor_found($sponsor18)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor19,0.05);
        add_generation_history($sponsor19,'19',$username,0.05,$purpose);   
        }
        
            //19th person
        $sponsor20=find_sponsor($sponsor19);
        if(is_up_sponsor_found($sponsor19)==1){
            $commission14=deduction_manual_percent($money,NINE_GENRE);
        add_balance($sponsor20,0.05);
        add_generation_history($sponsor20,'20',$username,0.05,$purpose);   
        }
        */
}


function update_boost_update_amount($user_id, $amount, $user_idmy)
{
  global $mysqli;
  $sql = "UPDATE `purchase_package` SET `total_amount` = `total_amount` + '$amount' WHERE `purchase_package`.`id` = '$user_id';";
  $mysqli->query($sql);
  
  
}

function update_cashback_update_amount($user_id, $amount, $user_idmy)
{
  global $mysqli;
  $sql = "UPDATE `m_board` SET `amount20` = `amount20` + '$amount' WHERE `m_board`.`id` = '$user_id';";
  $mysqli->query($sql);
  
  
}


function update_01_board_update_amount($user_id, $amount, $user_idmy)
{
  global $mysqli;
  $sql = "UPDATE `m_board` SET `amount` = `amount` + '$amount' WHERE `m_board`.`id` = '$user_id';";
  $mysqli->query($sql);
  
  global $queryBuilder;
  $result = $queryBuilder->table('m_board')->select('amount')->where('id', $user_id)->first()->amount;
  
  if($result>=2000){
    $sql = "UPDATE `m_board` SET `win_status` = '1' WHERE `m_board`.`id` = '$user_id';";
    $mysqli->query($sql);
  
    board_id_m2($user_idmy);
    
    
    
  }
  
}


function update_01_board_update_amount2($user_id, $amount, $user_idmy)
{
  global $mysqli;
  $sql = "UPDATE `m_board2` SET `amount` = `amount` + '$amount' WHERE `m_board2`.`id` = '$user_id';";
  $mysqli->query($sql);
  
  global $queryBuilder;
  $result = $queryBuilder->table('m_board2')->select('amount')->where('id', $user_id)->first()->amount;
  
  if($result>=5000){
    $sql = "UPDATE `m_board2` SET `win_status` = '1' WHERE `m_board2`.`id` = '$user_id';";
    $mysqli->query($sql);
  
    board_id_m3($user_idmy);
    
    
    
  }
  
}


function update_01_board_update_amount3($user_id, $amount, $user_idmy)
{
  global $mysqli;
  $sql = "UPDATE `m_board3` SET `amount` = `amount` + '$amount' WHERE `m_board3`.`id` = '$user_id';";
  $mysqli->query($sql);
  
  global $queryBuilder;
  $result = $queryBuilder->table('m_board3')->select('amount')->where('id', $user_id)->first()->amount;
  
  if($result>=10000){
    $sql = "UPDATE `m_board3` SET `win_status` = '1' WHERE `m_board3`.`id` = '$user_id';";
    $mysqli->query($sql);
  
    board_id_m4($user_idmy);
    
    
    
  }
  
}


function update_01_board_update_amount4($user_id, $amount, $user_idmy)
{
  global $mysqli;
  $sql = "UPDATE `m_board4` SET `amount` = `amount` + '$amount' WHERE `m_board4`.`id` = '$user_id';";
  $mysqli->query($sql);
  
  global $queryBuilder;
  $result = $queryBuilder->table('m_board4')->select('amount')->where('id', $user_id)->first()->amount;
  
  if($result>=20000){
    $sql = "UPDATE `m_board4` SET `win_status` = '1' WHERE `m_board4`.`id` = '$user_id';";
    $mysqli->query($sql);
  
    board_id_m5($user_idmy);
    
  }
  
}


function update_01_board($user_id, $amount)
{
    global $queryBuilder;
    $data = array(
        'win_status' => 1,
        'amount' => $amount
    );

    $query =  $queryBuilder->table('board1')->where('id', $user_id)->update($data);
}


function board_01id_add_balance($user_id, $amount, $status)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $user_id,
        'cradit' => $amount,
        'type' => $status
    );
    $insert = $queryBuilder->table('user_transection')->insert($data);
}


function update_02_board($user_id, $amount)
{
    global $queryBuilder;

    $data = array(
        'win_status' => 1,
        'amount' => $amount
    );

    $query =  $queryBuilder->table('board2')->where('id', $user_id)->update($data);
}

function update_03_board($user_id, $amount)
{
    global $queryBuilder;

    $data = array(
        'win_status' => 1,
        'amount' => $amount
    );

    $query =  $queryBuilder->table('board3')->where('id', $user_id)->update($data);
}


function insert_3rd_board($user_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $user_id
    );
    $query = $queryBuilder->table('board3')->insert($data);

    $count1 =  $queryBuilder->table('board3')->count();
    $board_con_01 = $count1 / 2;
    $find_board_01_id = $queryBuilder->table('board3')->where('id', $board_con_01)->first()->user_id;
    board_01id_add_balance($find_board_01_id, 1500, 7);
    update_03_board($board_con_01, 1500);
    // insert_3rd_board($find_board_01_id);
}

function insert_2nd_board($user_id)
{
    global $queryBuilder;
    $time = time();
    $data = array(
        'time' => $time,
        'user_id' => $user_id
    );
    $query = $queryBuilder->table('board2')->insert($data);

    $count1 =  $queryBuilder->table('board2')->count();
    $board_con_01 = $count1 / 3;
    $find_board_01_id = $queryBuilder->table('board2')->where('id', $board_con_01)->first()->user_id;
    board_01id_add_balance($find_board_01_id, 1000, 6);
    update_02_board($board_con_01, 1000);
    insert_3rd_board($find_board_01_id);
}

function board_id_m($user_id)
{

    global $queryBuilder;

    $time = time();

    $data = array(
        'time' => $time,
        'user_id' => $user_id
    );
    $query = $queryBuilder->table('m_board')->insert($data);

}

function board_id_m2($user_id)
{

    global $queryBuilder;

    $time = time();

    $data = array(
        'time' => $time,
        'user_id' => $user_id
    );
    $query = $queryBuilder->table('m_board2')->insert($data);

}

function board_id_m3($user_id)
{

    global $queryBuilder;

    $time = time();

    $data = array(
        'time' => $time,
        'user_id' => $user_id
    );
    $query = $queryBuilder->table('m_board3')->insert($data);

}

function board_id_m4($user_id)
{

    global $queryBuilder;

    $time = time();

    $data = array(
        'time' => $time,
        'user_id' => $user_id
    );
    $query = $queryBuilder->table('m_board4')->insert($data);

}


function board_id_m5($user_id)
{

    global $queryBuilder;

    $time = time();

    $data = array(
        'time' => $time,
        'user_id' => $user_id
    );
    $query = $queryBuilder->table('m_board5')->insert($data);

}

function cashback_income($point,$user_id){
    
    global $mysqli;
    
    
    $sql ="SELECT * FROM `m_board` WHERE `amount20` < 20000";
    $query = $mysqli->query($sql);

    while($row=$query->fetch_assoc()){ 
       $user_idmy = $row['user_id'];
       
        $amount1 = $row['amount20'];
        
        $amount =  $amount1 + $point;
        
        if($amount>20000){
            
          $point = 20000-$amount1;
          
        }else{
            $point = $point;
        }
         //echo '555';
       
        add_balance_user_m_cashback($user_idmy,$point,$user_id); 
        
        update_cashback_update_amount($row['id'],$point,$user_idmy);
        
    }
    
}


function board_income($point,$user_id,$main_balance){
    
    global $mysqli;
    //echo '555';
    
    $sql ="SELECT * FROM `m_board` WHERE `amount` < 2001 and `win_status` != 1 limit 10";
    $query = $mysqli->query($sql);
    $total_m = 0;
    $balance_ad = 0;
    while($row=$query->fetch_assoc()){ 
        $total_m = $total_m + $main_balance;
        $user_idmy = $row['user_id'];  
        
        $amount1 = $row['amount'];
        
        $amount =  $amount1 + $point;
        
        if($amount>2001){
          $point = 2000-$amount1;  
          $rest_of_amount = $amount-2000;
          
        }else{
            $point = $point;
        }
        add_balance_user_m_board($user_idmy,$point,$user_id); 
        
        update_01_board_update_amount($row['id'],$point,$user_idmy);
          
        $balance_ad = $balance_ad + $rest_of_amount;
       
    }
    
    $total_m = $total_m + $balance_ad;
    
    $sql = "UPDATE `millionaire_incom` SET `millionaire01` = '$total_m' WHERE `millionaire_incom`.`id` = 1;";
    $mysqli->query($sql);
    
    
}


function board_income2($point,$user_id,$main_balance){
    
    global $mysqli;
    //echo '555';
    
    $sql ="SELECT * FROM `m_board2` WHERE `amount` < 5001 and `win_status` != 1 limit 10";
    $query = $mysqli->query($sql);
    $total_m = 0;
    $balance_ad = 0;
    while($row=$query->fetch_assoc()){ 
        $total_m = $total_m + $main_balance;
        $user_idmy = $row['user_id'];  
        
        $amount1 = $row['amount'];
        
        $amount =  $amount1 + $point;
        
        if($amount>5001){
          $point = 5000-$amount1;  
          $rest_of_amount = $amount-5000;
          
        }else{
            $point = $point;
        }
        add_balance_user_m_board($user_idmy,$point,$user_id); 
        
        update_01_board_update_amount2($row['id'],$point,$user_idmy);
          
        $balance_ad = $balance_ad + $rest_of_amount;
       
    }
    
    $total_m = $total_m + $balance_ad;
    
    $sql = "UPDATE `millionaire_incom` SET `millionaire02` = '$total_m' WHERE `millionaire_incom`.`id` = 1;";
    $mysqli->query($sql);
    
    
}


function board_income3($point,$user_id,$main_balance){
    
    global $mysqli;
    //echo '555';
    
    $sql ="SELECT * FROM `m_board3` WHERE `amount` < 10001 and `win_status` != 1 limit 10";
    $query = $mysqli->query($sql);
    $total_m = 0;
    $balance_ad = 0;
    while($row=$query->fetch_assoc()){ 
        $total_m = $total_m + $main_balance;
        $user_idmy = $row['user_id'];  
        
        $amount1 = $row['amount'];
        
        $amount =  $amount1 + $point;
        
        if($amount>10001){
          $point = 10000-$amount1;  
          $rest_of_amount = $amount-10000;
          
        }else{
            $point = $point;
        }
        add_balance_user_m_board($user_idmy,$point,$user_id); 
        
        update_01_board_update_amount3($row['id'],$point,$user_idmy);
          
        $balance_ad = $balance_ad + $rest_of_amount;
       
    }
    
    $total_m = $total_m + $balance_ad;
    
    $sql = "UPDATE `millionaire_incom` SET `millionaire03` = '$total_m' WHERE `millionaire_incom`.`id` = 1;";
    $mysqli->query($sql);
    
    
}

function board_income4($point,$user_id,$main_balance){
    
    global $mysqli;
    //echo '555';
    
    $sql ="SELECT * FROM `m_board4` WHERE `amount` < 20001 and `win_status` != 1 limit 10";
    $query = $mysqli->query($sql);
    $total_m = 0;
    $balance_ad = 0;
    while($row=$query->fetch_assoc()){ 
        $total_m = $total_m + $main_balance;
        $user_idmy = $row['user_id'];  
        
        $amount1 = $row['amount'];
        
        $amount =  $amount1 + $point;
        
        if($amount>20001){
          $point = 20000-$amount1;  
          $rest_of_amount = $amount-20000;
          
        }else{
            $point = $point;
        }
        add_balance_user_m_board($user_idmy,$point,$user_id); 
        
        update_01_board_update_amount4($row['id'],$point,$user_idmy);
          
        $balance_ad = $balance_ad + $rest_of_amount;
       
    }
    
    $total_m = $total_m + $balance_ad;
    
    $sql = "UPDATE `millionaire_incom` SET `millionaire04` = '$total_m' WHERE `millionaire_incom`.`id` = 1;";
    $mysqli->query($sql);
    
    
}


function board_id($user_id)
{

    global $queryBuilder;

    $time = time();

    $data = array(
        'time' => $time,
        'user_id' => $user_id
    );
    $query = $queryBuilder->table('board1')->insert($data);

    $count1 =  $queryBuilder->table('board1')->count();

    echo $board_con_01 = $count1 / 4;

    $find_board_01_id = $queryBuilder->table('board1')->where('id', $board_con_01)->first()->user_id;

    board_01id_add_balance($find_board_01_id, 500, 5);

    update_01_board($board_con_01, 500);

    insert_2nd_board($find_board_01_id);
}


function purchase_package($user_id, $package_id, $price, $bonus, $qty)
{
    $total_price = $price * $qty;
    $data = [
        'user_id' => $user_id,
        'package_id' => $package_id,
        'price' => $price,
        'bonus' => $bonus,
        'qty' => $qty,
        'total_price' => $total_price,
        'date' => time(),
        'status' => Constant::STATUS['active'],
        'commision_status' => Constant::COMMISSION_STATUS['no'],
    ];

    $insert = QB::table('purchase_package')->insert($data);
    if ($insert) {
        return true;
    } else {
        return false;
    }
}



function isValidUsername($username)
{
    //return preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username);

}

function setKey($data)
{
    $arr = [];
    foreach ($data as $item) {
        $arr[$item->id] = $item;
    }
    return $arr;
}

function binaryTree($user, $users)
{
    $tree = buildNode($user, $users);
    return $tree;
}

// function buildNode($currentUser, $allUsers){
//     $nodes = [];
//     // Base case: if current depth exceeds max depth, stop recursion

//     // Initialize the node
//     $node = [
//         'user' => $currentUser,
//         'left' => null,
//         'right' => null
//     ];

//     // Store the node
//     $nodes[$currentUser->id] = $node;

//     // Find children (users referred by this user)
//     $children = array_filter($allUsers, function ($u) use ($currentUser) {
//         return $u->position_id == $currentUser->id;
//     });

//     // Convert to an indexed array
//     $children = array_values($children);

//     // Recursively build left and right children if they exist
//     if (count($children) > 0) {
//         // Set the left child
//         $node['left'] = buildNode($children[0], $allUsers);
//     }

//     if (count($children) > 1) {
//         // Set the right child
//         $node['right'] = buildNode($children[1], $allUsers);
//     }

//     return $node;
// }

function buildNode($currentUserId, $allUsers)
{
    $currentUser = $allUsers[$currentUserId];
    $nodes = [];
    // Base case: if current depth exceeds max depth, stop recursion

    // Initialize the node
    $node = [
        'user' => $currentUser,
        'left' => null,
        'middle' => null,
        'right' => null,
    ];

    // Store the node
    $nodes[$currentUser->id] = $node;

    // // Find children (users referred by this user)
    // $children = array_filter($allUsers, function ($u) use ($currentUser) {
    //     return $u->position_id == $currentUser->id;
    // });

    // // Convert to an indexed array
    // $children = array_values($children);

    // Recursively build left and right children if they exist
    if ($currentUser->position_aid != null) {
        // Set the left child
        $node['left'] = buildNode($currentUser->position_aid, $allUsers);
    }

    if ($currentUser->position_bid != null) {
        // Set the right child
        $node['middle'] = buildNode($currentUser->position_bid, $allUsers);
    }

    if ($currentUser->position_cid != null) {
        // Set the right child
        $node['right'] = buildNode($currentUser->position_cid, $allUsers);
    }

    return $node;
}

function levelBinaryTree($user, $users, $maxDepth)
{
    $tree = buildNodeForLevel($user, $users, 0, $maxDepth);
    return $tree;
}

function buildNodeForLevel($currentUserId, $allUsers, $currentDepth, $maxDepth)
{
    $currentUser = $allUsers[$currentUserId];
    $nodes = [];

    // Base case: if current depth exceeds max depth, stop recursion
    if ($currentDepth > $maxDepth) {
        return null;
    }

    // Initialize the node
    $node = [
        'user' => $currentUser,
        'left' => null,
        'middle' => null,
        'right' => null,
    ];

    // Store the node
    $nodes[$currentUser->id] = $node;

    // // Find children (users referred by this user)
    // $children = array_filter($allUsers, function ($u) use ($currentUser) {
    //     return $u->position_id == $currentUser->id;
    // });

    // // Convert to an indexed array
    // $children = array_values($children);

    // Recursively build left and right children if they exist
    if ($currentUser->position_aid != null) {
        // Set the left child
        $node['left'] = buildNodeForLevel($currentUser->position_aid, $allUsers, $currentDepth + 1, $maxDepth);
    }

    if ($currentUser->position_bid != null) {
        // Set the right child
        $node['middle'] = buildNodeForLevel($currentUser->position_bid, $allUsers, $currentDepth + 1, $maxDepth);
    }

    if ($currentUser->position_cid != null) {
        // Set the right child
        $node['right'] = buildNodeForLevel($currentUser->position_cid, $allUsers, $currentDepth + 1, $maxDepth);
    }

    return $node;
}

function directTotalReferUsers($user, $users)
{
    $count = 0;
    $referUsers = [];
    foreach ($users as $item) {
        if (is_object($item) && isset($item->refer_id) && isset($item->id)) {
            if ($item->refer_id == $user->id) {
                $referUsers[$item->id] = $item;
                $count++;
            }
        }
    }

    $result = [
        'count' => $count,
        'data' => $referUsers,
    ];

    return $result;
}

function userWithPurchase($user, $allPurchases, $BinaryPointDistribution, $date = null)
{
    $result = [];
    $user_id = $user->id;
    $filteredRecords = array_filter($allPurchases, function ($data) use ($user_id) {
        return $data->user_id == $user_id;
    });

    if ($date != null) {
        // Filter purchases made by this user within the specific date range
        $CurrentfilteredRecords = array_filter($allPurchases, function ($data) use ($user_id, $date) {
            return ($data->user_id == $user_id) && ($data->date >= $date['startDate']) && ($data->date <= $date['endDate']);
        });
    }

    $CurrentPointDistributionRecords = array_filter($BinaryPointDistribution, function ($data) use ($user_id, $date) {
        return ($data->user_id == $user_id) && ($data->date >= strtotime(date('d M Y 00:00:00', time()))) && ($data->date <= strtotime(date('d M Y 23:59:59', time())));
    });


    $user->package_purchases = array_values($filteredRecords);
    if ($date != null) {
        $user->yesterday_package_purchases = array_values($CurrentfilteredRecords);
    }

    $user->current_distribution_data = array_values($CurrentPointDistributionRecords) ?? null;

    $result[] = $user;

    return $result;
}

function makeUsersWithPurchase($allUsers, $allPurchases, $BinaryPointDistribution, $date = null)
{

    $result = [];
    foreach ($allUsers as $user) {
        $user_id = $user->id;

        // Filter all purchases made by this user
        $filteredRecords = array_filter($allPurchases, function ($data) use ($user_id) {
            return $data->user_id == $user_id;
        });

        if ($date != null) {
            // Filter purchases made by this user within the specific date range
            $CurrentfilteredRecords = array_filter($allPurchases, function ($data) use ($user_id, $date) {
                return ($data->user_id == $user_id) && ($data->date >= $date['startDate']) && ($data->date <= $date['endDate']);
            });
        }

        $CurrentPointDistributionRecords = array_filter($BinaryPointDistribution, function ($data) use ($user_id, $date) {
            return ($data->user_id == $user_id) && ($data->date >= strtotime(date('d M Y 00:00:00', time()))) && ($data->date <= strtotime(date('d M Y 23:59:59', time())));
        });

        $PreviusPointDistributionRecords = array_filter($BinaryPointDistribution, function ($data) use ($user_id, $date) {
            return ($data->user_id === $user_id);
        });

        // Store filtered results in the user object
        $user->package_purchases = array_values($filteredRecords);

        if ($date != null) {
            $user->yesterday_package_purchases = array_values($CurrentfilteredRecords);
        }

        $user->current_distribution_data = array_values($CurrentPointDistributionRecords) ?? null;
        $user->previus_distribution_data = array_values($PreviusPointDistributionRecords) ?? null;


        $result[] = $user;
    }

    return $result;
}

function sumOfYesterdayPackagePurchases($node)
{
    $sum = 0;
    $count = 0;
    $active_user_count = 0;
    $inactive_user_count = 0;
    $total_package_purchase_price = 0;
    $total_package_purchase_bonus = 0;

    // If the node has a user and yesterday_package_purchases, sum their total_price
    if (isset($node['user']) && isset($node['user']->yesterday_package_purchases)) {
        foreach ($node['user']->yesterday_package_purchases as $purchase) {
            $sum += (float)$purchase->bonus;
            $count++;
        }
        foreach ($node['user']->package_purchases as $purchase2) {
            $total_package_purchase_price += (float)$purchase2->total_price;
            $total_package_purchase_bonus += (float)$purchase2->bonus ?? 0;
        }
    }

    if (isset($node['user'])) {
        if ($node['user']->status == 1) {
            $active_user_count++;
        }
        if ($node['user']->status == 0) {
            $inactive_user_count++;
        }
    }

    // Recursively check left and right nodes
    if (isset($node['left']) && $node['left'] !== null) {
        $leftResult = sumOfYesterdayPackagePurchases($node['left']);
        $sum += $leftResult['point'];
        $count += $leftResult['count'];
        $active_user_count += $leftResult['active_user_count'];
        $inactive_user_count += $leftResult['inactive_user_count'];
        $total_package_purchase_price += $leftResult['total_package_purchase_price'];
        $total_package_purchase_bonus += $leftResult['total_package_purchase_bonus'];
    }

    if (isset($node['middle']) && $node['middle'] !== null) {
        $middleResult = sumOfYesterdayPackagePurchases($node['middle']);
        $sum += $middleResult['point'];
        $count += $middleResult['count'];
        $active_user_count += $middleResult['active_user_count'];
        $inactive_user_count += $middleResult['inactive_user_count'];
        $total_package_purchase_price += $middleResult['total_package_purchase_price'];
        $total_package_purchase_bonus += $middleResult['total_package_purchase_bonus'];
    }

    if (isset($node['right']) && $node['right'] !== null) {
        $rightResult = sumOfYesterdayPackagePurchases($node['right']);
        $sum += $rightResult['point'];
        $count += $rightResult['count'];
        $active_user_count += $rightResult['active_user_count'];
        $inactive_user_count += $rightResult['inactive_user_count'];
        $total_package_purchase_price += $rightResult['total_package_purchase_price'];
        $total_package_purchase_bonus += $rightResult['total_package_purchase_bonus'];
    }

    return [
        'point' => $sum,
        'count' =>  $count,
        'active_user_count' =>  $active_user_count,
        'inactive_user_count' =>  $inactive_user_count,
        'total_package_purchase_price' =>  $total_package_purchase_price,
        'total_package_purchase_bonus' =>  $total_package_purchase_bonus,
    ];
}

function getUserTeamCurrentPurchasePoint($users, $user)
{
    $result = [];
    $left = [];
    $middle = [];
    $right = [];
    $left_total_point = 0;
    $middle_total_point = 0;
    $right_total_point = 0;

    if ($users[$user] != null) {
        // Calculate left placement user total point
        if ($users[$user]->position_aid != null) {
            $leftTreeData = binaryTree($users[$users[$user]->position_aid]->id, $users);
            // $leftTreeData = levelBinaryTree($users[$users[$user]->position_aid], $users, 3);
            $left_total_point = sumOfYesterdayPackagePurchases($leftTreeData) ?? 0;

            $left = [
                'id' => $users[$users[$user]->position_aid]->id,
                'name' => $users[$users[$user]->position_aid]->name,
                'username' => $users[$users[$user]->position_aid]->username,
                'total_point' => $left_total_point,
                'total_active_inactive_user' => $left_total_point,
                'total_package_purchase_price' => $left_total_point,
                'total_package_purchase_bonus' => $left_total_point,
            ];
        }

        // Calculate Middle placement user total point
        if ($users[$user]->position_bid != null) {
            $rightTreeData = binaryTree($users[$users[$user]->position_bid]->id, $users);
            // $rightTreeData = levelBinaryTree($users[$users[$user]->position_bid], $users, 3);
            $middle_total_point = sumOfYesterdayPackagePurchases($rightTreeData) ?? 0;

            $middle = [
                'id' => $users[$users[$user]->position_bid]->id,
                'name' => $users[$users[$user]->position_bid]->name,
                'username' => $users[$users[$user]->position_bid]->username,
                'total_point' => $middle_total_point,
                'total_active_inactive_user' => $middle_total_point,
                'total_package_purchase_price' => $middle_total_point,
                'total_package_purchase_bonus' => $middle_total_point,
            ];
        }

        // Calculate right placement user total point
        if ($users[$user]->position_cid != null) {
            $cidTreeData = binaryTree($users[$users[$user]->position_cid]->id, $users);
            // $cidTreeData = levelBinaryTree($users[$users[$user]->position_cid], $users, 3);
            $right_total_point = sumOfYesterdayPackagePurchases($cidTreeData) ?? 0;

            $right = [
                'id' => $users[$users[$user]->position_cid]->id,
                'name' => $users[$users[$user]->position_cid]->name,
                'username' => $users[$users[$user]->position_cid]->username,
                'total_point' => $right_total_point,
                'total_active_inactive_user' => $right_total_point,
                'total_package_purchase_price' => $right_total_point,
                'total_package_purchase_bonus' => $right_total_point,
            ];
        }

        $message = 'Successfully Calculated';
    } else {
        $message = 'Current User Not Found!';
    }


    $result = [
        'left' => $left,
        'middle' => $middle,
        'right' => $right,
        'message' => $message,
    ];

    return $result;
}

function calculateDistributionPoint($users, $user_id, $check_for = null)
{
    $left_point = 0;
    $middle_point = 0;
    $right_point = 0;
    $left_carry = 0;
    $middle_carry = 0;
    $right_carry = 0;
    $result = [];
    $user = $users[$user_id];
    $own_purchaseCount = 0;


    if ($user != null) {
        if ($user->package_purchases != null) {
            $own_purchaseCount = count($user->package_purchases);
        }
        if ($check_for == 'datacount') {
            $own_purchaseCount = 1;
        }

        if ($own_purchaseCount > 0) {
            $getPoint = getUserTeamCurrentPurchasePoint($users, $user_id);


            // return $getPoint;
            // left 
            $l_carry = 0;
            if ($user->previus_distribution_data != null) {
                $l_carry = $user->previus_distribution_data[0]->left_carry;
            }
            // middle  
            $m_carry = 0;
            if ($user->previus_distribution_data != null) {
                $c_carry = $user->previus_distribution_data[0]->middle_carry;
            }
            // right 
            $r_carry = 0;
            if ($user->previus_distribution_data != null) {
                $r_carry = $user->previus_distribution_data[0]->right_carry;
            }


            // left calculate
            $left_point = ($getPoint['left']['total_point']['point'] ?? 0) + $l_carry;
            $left_active_user = $getPoint['left']['total_active_inactive_user']['active_user_count'] ?? 0;
            $left_inactive_user = $getPoint['left']['total_active_inactive_user']['inactive_user_count'] ?? 0;
            $left_total_package_purchase_price = $getPoint['left']['total_package_purchase_price']['total_package_purchase_price'] ?? 0;
            $left_total_package_purchase_bonus = $getPoint['left']['total_package_purchase_bonus']['total_package_purchase_bonus'] ?? 0;

            // middle calculate
            $middle_point = ($getPoint['middle']['total_point']['point'] ?? 0) + $m_carry;
            $middle_active_user = $getPoint['middle']['total_active_inactive_user']['active_user_count'] ?? 0;
            $middle_inactive_user = $getPoint['middle']['total_active_inactive_user']['inactive_user_count'] ?? 0;
            $middle_total_package_purchase_price = $getPoint['middle']['total_package_purchase_price']['total_package_purchase_price'] ?? 0;
            $middle_total_package_purchase_bonus = $getPoint['middle']['total_package_purchase_bonus']['total_package_purchase_price'] ?? 0;

            // right calculate
            $right_point = ($getPoint['right']['total_point']['point'] ?? 0) + $r_carry;
            $right_active_user = $getPoint['right']['total_active_inactive_user']['active_user_count'] ?? 0;
            $right_inactive_user = $getPoint['right']['total_active_inactive_user']['inactive_user_count'] ?? 0;
            $right_total_package_purchase_price = $getPoint['right']['total_package_purchase_price']['total_package_purchase_price'] ?? 0;
            $right_total_package_purchase_bonus = $getPoint['right']['total_package_purchase_bonus']['total_package_purchase_bonus'] ?? 0;



            // if ($left_point == $right_point) {
            //     $left_carry = $right_carry = 0;
            // } 
            // else if ($left_point > $right_point) {
            //     $left_carry = $left_point - $right_point;
            //     $right_carry = 0;

            //     $left_point = $right_point ?? 0;
            // } 
            // else {
            //     $right_carry = $right_point - $left_point;
            //     $left_carry = 0;

            //     $right_point = $left_point ?? 0;
            // }





            // if ($left_point == $right_point) {
            //     $left_carry = $right_carry = $middle_carry = 0;
            //     $middle_point = $left_point;
            // } 
            // else if ($left_point > $right_point) {
            //     $left_carry = $left_point - $right_point;
            //     $right_carry = 0;

            //     $middle_point = ($left_point + $right_point) / 2;
            //     $middle_carry = $middle_point - $right_point;

            //     $left_point = $right_point ?? 0;
            // } 
            // else {
            //     $right_carry = $right_point - $left_point;
            //     $left_carry = 0;

            //     $middle_point = ($left_point + $right_point) / 2;
            //     $middle_carry = $middle_point - $left_point;

            //     $right_point = $left_point ?? 0;
            // }


            $result = [
                'user_id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
                'left_point' => $left_point,
                'middle_point' => $middle_point,
                'right_point' => $right_point,
                'left_carry' => $left_carry,
                'middle_carry' => $middle_carry,
                'right_carry' => $right_carry,
                'left_active_user' => $left_active_user,
                'left_inactive_user' => $left_inactive_user,
                'middle_active_user' => $middle_active_user,
                'middle_inactive_user' => $middle_inactive_user,
                'right_active_user' => $right_active_user,
                'right_inactive_user' => $right_inactive_user,
                'center_name' => $user->center_name,
                'user_image' => $user->image,
                'left_total_package_purchase_price' => $left_total_package_purchase_price,
                'middle_total_package_purchase_price' => $middle_total_package_purchase_price,
                'right_total_package_purchase_price' => $right_total_package_purchase_price,

                'left_total_package_purchase_bonus' => $left_total_package_purchase_bonus,
                'middle_total_package_purchase_bonus' => $middle_total_package_purchase_bonus,
                'right_total_package_purchase_bonus' => $right_total_package_purchase_bonus,
                'purchase_date' => strtotime('-1 day', strtotime(date('d M Y', time()))),
            ];

            $success = true;
            $message = 'Successfully Caleculated!';
        } else {
            $success = false;
            $message = 'User has not purchased any package';
        }
    } else {
        $success = false;
        $message = 'User not found!';
    }

    return [
        'success' => $success,
        'message' => $message,
        'data' => $result,
    ];
}

function craditAmountCalculate($point)
{
    return ($point / Constant::PLACEMENT_POINT['point']) * Constant::POINT_TO_AMOUNT['amount'];
}
function matchingCount($point)
{
    return ($point / Constant::PLACEMENT_POINT['point']);
}

function bonusDistribution($users)
{
    $result = [];
    $distDate = time();
    foreach ($users as $user) {
        if ($user->status == 1) {

            $distributionData = calculateDistributionPoint($users, $user->id);
            $illagible = false;
            if ($distributionData['data'] != null) {

                if ($user->current_distribution_data == null) {
                    $illagible = true;
                } else {
                    $startDate = strtotime(date('d M Y 00:00:00', $distDate));
                    $endDate = strtotime(date('d M Y 23:59:59', $distDate));
                    if (($user->current_distribution_data[0]->date >= $startDate) && ($user->current_distribution_data[0]->date <= $endDate)) {
                        $illagible = false;
                    } else {
                        $illagible = true;
                    }
                }
                if ($illagible == true) {

                    $left_point = $distributionData['data']['left_point'];
                    $right_point = $distributionData['data']['right_point'];
                    $left_carry = $distributionData['data']['left_carry'];
                    $right_carry = $distributionData['data']['right_carry'];

                    // left side calculation    

                    if ($distributionData['data']['left_point'] >= Constant::PLACEMENT_POINT['point']) {
                        $leftMatchingCount = matchingCount($distributionData['data']['left_point']);
                    } else {
                        $leftMatchingCount = 0;
                    }

                    $leftMatchingFlashCount = 0;
                    if ($leftMatchingCount > Constant::MAX_MATCHING_DISTRIBUTE['count']) {
                        $leftMatchingFlashCount = $leftMatchingCount - Constant::MAX_MATCHING_DISTRIBUTE['count'];
                        $leftMatchingCount = Constant::MAX_MATCHING_DISTRIBUTE['count'];

                        $left_point = $left_point - (Constant::PLACEMENT_POINT['point'] * $leftMatchingFlashCount);
                        $left_carry = 0;
                    }

                    $left_carryFlashCount = 0;
                    $leftCarryCount = matchingCount($distributionData['data']['left_carry']);
                    if ($leftCarryCount > Constant::MAX_MATCHING_DISTRIBUTE['count']) {
                        $left_carryFlashCount = $leftCarryCount - Constant::MAX_MATCHING_DISTRIBUTE['count'];
                        $left_carry = $left_carry - (Constant::PLACEMENT_POINT['point'] * $left_carryFlashCount);
                    }


                    // right side calculation 
                    if ($distributionData['data']['right_point'] >= Constant::PLACEMENT_POINT['point']) {
                        $rightMatchingCount = matchingCount($distributionData['data']['right_point']);
                    } else {
                        $rightMatchingCount = 0;
                    }

                    $rightMatchingFlashCount = 0;
                    if ($rightMatchingCount > Constant::MAX_MATCHING_DISTRIBUTE['count']) {
                        $rightMatchingFlashCount = $rightMatchingCount - Constant::MAX_MATCHING_DISTRIBUTE['count'];
                        $rightMatchingCount = Constant::MAX_MATCHING_DISTRIBUTE['count'];

                        $right_point = $right_point - (Constant::PLACEMENT_POINT['point'] * $rightMatchingFlashCount);
                        $right_carry = 0;
                    }

                    $right_carryFlashCount = 0;
                    $rightCarryCount = matchingCount($distributionData['data']['right_carry']);
                    if ($rightCarryCount > Constant::MAX_MATCHING_DISTRIBUTE['count']) {
                        $right_carryFlashCount = $rightCarryCount - Constant::MAX_MATCHING_DISTRIBUTE['count'];
                        $right_carry =  $right_carry - (Constant::PLACEMENT_POINT['point'] * $right_carryFlashCount);
                    }


                    if ($left_point >= Constant::PLACEMENT_POINT['point']) {
                        $cradit_amount = craditAmountCalculate($left_point);
                    } else {
                        $cradit_amount = 0;
                    }

                    $insertData = [
                        'user_id' => $distributionData['data']['user_id'],
                        'left_point' => $left_point,
                        'right_point' => $right_point,
                        'left_carry' => $left_carry,
                        'right_carry' => $right_carry,
                        'left_flash' => Constant::PLACEMENT_POINT['point'] * $leftMatchingFlashCount,
                        'right_flash' => Constant::PLACEMENT_POINT['point'] * $rightMatchingFlashCount,
                        'left_carry_flash' => Constant::PLACEMENT_POINT['point'] * $left_carryFlashCount,
                        'right_carry_flash' => Constant::PLACEMENT_POINT['point'] * $right_carryFlashCount,
                        'date' => $distDate,
                        'purchase_date' => $distributionData['data']['purchase_date'],
                    ];

                    $insertDataView = [
                        'user_id' => $distributionData['data']['user_id'],
                        'left_point' => $left_point,
                        'right_point' => $right_point,
                        'left_carry' => $left_carry,
                        'right_carry' => $right_carry,
                        'left_flash' => Constant::PLACEMENT_POINT['point'] * $leftMatchingFlashCount,
                        'right_flash' => Constant::PLACEMENT_POINT['point'] * $rightMatchingFlashCount,
                        'left_carry_flash' => Constant::PLACEMENT_POINT['point'] * $left_carryFlashCount,
                        'right_carry_flash' => Constant::PLACEMENT_POINT['point'] * $right_carryFlashCount,
                        'date' => $distDate,
                        'purchase_date' => $distributionData['data']['purchase_date'],
                        'cradit_amount' => $cradit_amount,
                        'leftMatchingCount' => $leftMatchingCount,
                        'leftMatchingFlashCount' => $leftMatchingFlashCount,
                        'rightMatchingCount' => $rightMatchingCount,
                        'rightMatchingFlashCount' => $rightMatchingFlashCount,
                    ];

                    $insertId = QB::table('binary_point_distribution')->insert($insertData);

                    if (($left_point != 0) && ($right_point != 0)) {

                        $transectionData = [
                            'user_id' => $distributionData['data']['user_id'],
                            'cradit' => $cradit_amount,
                            'debit' => 0,
                            'time' => time(),
                            'type' => 9,
                            'gen' => 0,
                            'his' => 9,
                            'from_id' => 0,
                            'note' => 0,
                            'distribution_id' => $insertId,
                        ];

                        QB::table('user_transection')->insert($transectionData);
                    }

                    $result[] = $insertDataView;
                }
            }
            // $result[] = $distributionData;
        }
    }

    return $result;
}
function remainingSubscriptionDate()
{
    $sesson_user = $_SESSION['user_id'];
    $subscription = QB::table('subscription')->where('user_id', $sesson_user)->orderBy('time', 'desc')->first();

    if ($subscription) {
        $lastSubDate = is_numeric($subscription->time) ? date('Y-m-d', $subscription->time) : $subscription->time;
    } else {
        $member = QB::table('member')->where('id', $sesson_user)->first();
        $lastSubDate = date('Y-m-d', $member->joining_time);
    }

    $today = date('Y-m-d');

    $lastSubDateObj = new DateTime($lastSubDate);
    $todayObj = new DateTime($today);
    $interval = $lastSubDateObj->diff($todayObj);
    $monthDays = 30;
    $remainingDate = $monthDays - $interval->days;
    return $remainingDate;
}

function add_notification($user_id, $event, $description) {
    global $queryBuilder;
    
    $time = time();
    $queryBuilder->table('notifications')->insert([
        'time' => $time,
        'user_id' => $user_id,
        'event' => $envet,
        'description' => $description,
        'is_seen' => 0,
    ]);
}

function agent_product_stock($product_id){
    $stockIn = QB::table('agent_product_stock')
        ->where('user_id', $_SESSION['user_id'])
        ->where('product_id', $product_id)
        ->where('type', 'stock_in')
        ->get();

    $stockOut = QB::table('agent_product_stock')
        ->where('user_id', $_SESSION['user_id'])
        ->where('product_id', $product_id)
        ->where('type', 'stock_out')
        ->get();

    $totalIn = 0;
    foreach ($stockIn as $row) {
        $totalIn += $row->qty ?? 0;
    }

    $totalOut = 0;
    foreach ($stockOut as $row) {
        $totalOut += $row->qty ?? 0;
    }

    $stock = $totalIn - $totalOut;
    return $stock;
}
