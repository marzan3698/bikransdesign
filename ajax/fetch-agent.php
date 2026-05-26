<?php

require_once('../sadmin/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $username = isset($_GET['username']) ? trim($_GET['username']) : '';
    $agent = QB::table('agent')
        ->where('username', $username)
        ->orWhere('number', $username)
        ->first();
    $member = QB::table('member')->where('id', $agent->user_id)->first();


    if ($agent) {
        echo json_encode([
            'success' => true,
            'data' => $agent,
            'image' => $member->image,
        ]);

    } else {

        echo json_encode([
            'success' => false,
            'message' => 'User not found'
        ]);

    }
}
?>