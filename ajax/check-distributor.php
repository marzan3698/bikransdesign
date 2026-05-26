<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../sadmin/config.php');

    $phone = isset($_POST['invite_no']) ? trim($_POST['invite_no']) : '';

    if ($phone === '') {
        echo json_encode(['exists' => false]);
        exit;
    }

    $data = QB::table('distributor')
        ->where('phone', $phone)
        ->first();

    echo json_encode(['data' => $data]);
}
