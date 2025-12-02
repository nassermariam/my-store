<?php
// Handle checkout: save order and clear cart.json, then redirect home
require_once __DIR__ . '/../../core/function.php';

$cart = getCart();

// compute total
$total = 0.0;
foreach ($cart as $item) {
    $price = isset($item['price']) ? floatval($item['price']) : 0.0;
    $qty = isset($item['quantity']) ? intval($item['quantity']) : 1;
    $total += $price * $qty;
}

$ordersFile = __DIR__ . '/../../data/orders.json';
$orders = file_exists($ordersFile) ? json_decode(file_get_contents($ordersFile), true) : [];
if (!is_array($orders)) {
    $orders = [];
}

$orders[] = [
    'date' => date('c'),
    'items' => $cart,
    'total' => $total,
];

file_put_contents($ordersFile, json_encode($orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

// clear cart
clearCart();

setMessage('success', 'Checkout complete — thank you for your order.');

// redirect to home
header('Location: ../../index.php');
exit;
