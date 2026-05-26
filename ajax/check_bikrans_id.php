<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../sadmin/config.php');

    $username = isset($_POST['username']) ? trim($_POST['username']) : '';

    if ($username === '') {
        echo json_encode(['exists' => false]);
        exit;
    }

   $data = QB::table('member')
        ->where('username', $username)
        ->first();

    echo json_encode(['data' => $data]);
}

