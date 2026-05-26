<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../sadmin/config.php');

    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

    if ($phone === '') {
        echo json_encode(['exists' => false]);
        exit;
    }

    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM member WHERE phone = ?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    echo json_encode(['exists' => $count > 0]);
}
