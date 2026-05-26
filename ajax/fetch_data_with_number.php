<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../sadmin/config.php');

    $phone = isset($_POST['number']) ? trim($_POST['number']) : '';

    if ($phone === '') {
        echo json_encode(['exists' => false]);
        exit;
    }

    $data = QB::table('member')
        ->where('phone', $phone)
        ->orWhere('whatsapp', $phone)
        ->first();

    echo json_encode(['data' => $data]);
}
