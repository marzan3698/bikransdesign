<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once('../sadmin/config.php');

    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

    if (empty($phone)) {
        echo json_encode(['status' => false, 'data' => null]);
        exit;
    }

    $stmt = $mysqli->prepare("SELECT customer_name, customer_phone, buy_date, expire_date 
                              FROM product_sale 
                              WHERE customer_phone = ? 
                              LIMIT 1");

    $stmt->bind_param("s", $phone);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    $stmt->close();

    echo json_encode([
        'status' => $data ? true : false,
        'data'   => $data
    ]);
}
?>