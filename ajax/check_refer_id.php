<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../sadmin/config.php');

    $refer_id = isset($_POST['refer_id']) ? trim($_POST['refer_id']) : '';

    if ($refer_id === '') {
        echo json_encode(['exists' => false]);
        exit;
    }

    $stmt = $mysqli->prepare("SELECT name, phone FROM member WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $refer_id);
    $stmt->execute();

    // Bind both columns
    $stmt->bind_result($name, $phone);

    if ($stmt->fetch()) {
        echo json_encode([
            'exists' => true,
            'name'   => $name,
            'phone'  => $phone
        ]);
    } else {
        echo json_encode([
            'exists' => false,
            'name'   => null,
            'phone'  => null
        ]);
    }

    $stmt->close();
}