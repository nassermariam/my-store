<?php
session_start();

$cart = $_SESSION['cart'] ?? [];

if (!empty($cart)) {
    $ordersFile = __DIR__ . '/../../data/orders.json'; 

    $orders = file_exists($ordersFile) ? json_decode(file_get_contents($ordersFile), true) : [];

    $orders[] = [
        'date' => date('Y-m-d H:i:s'),
        'items' => $cart
    ];

    file_put_contents($ordersFile, json_encode($orders, JSON_PRETTY_PRINT));

    unset($_SESSION['cart']);

    echo "succesfuly save order";
} else {
    echo "empty ";
}
