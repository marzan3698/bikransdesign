<?php
require_once('sadmin/config.php');

$ids = isset($_POST['ids']) ? $_POST['ids'] : [];

if (empty($ids)) {
    echo json_encode([]);
    exit;
}

// SQL Injection থেকে সুরক্ষা
$placeholders = implode(',', array_fill(0, count($ids), '?'));
$types = str_repeat('i', count($ids));

$stmt = $mysqli->prepare("SELECT id, name, images FROM product WHERE id IN ($placeholders)");
$stmt->bind_param($types, ...$ids);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[$row['id']] = [
        'name'  => $row['name'],
        'images' => 'https://nadmin.bikrans.com/' . $row['images'] // যেমন: uploads/product.jpg
    ];
}

echo json_encode($products);