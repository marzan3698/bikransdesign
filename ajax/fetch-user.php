<?php

require_once('../sadmin/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $username = isset($_GET['username']) ? trim($_GET['username']) : '';

    $data = QB::table('member')
        ->where('phone', $username)
        ->orWhere('username', $username)
        ->first();

    if ($data) {

        $agent = QB::table('agent')->where('user_id', $data->id)->first();

        $agent_area = '';

        if ($agent) {
            $agent_area = $agent->agent_area;
        } else {
            $agent_area = '';
        }

        echo json_encode([
            'success' => true,
            'data' => $data,
            'agent_area' => $agent_area
        ]);

    } else {

        echo json_encode([
            'success' => false,
            'message' => 'User not found'
        ]);
    }
}
?>