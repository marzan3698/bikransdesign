<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../sadmin/config.php');

    $username = isset($_POST['username']) ? trim($_POST['username']) : '';

    if ($username === '') {
        echo json_encode(['exists' => false]);
        exit;
    }

    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM member WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    echo json_encode(['exists' => $count > 0]);
}
