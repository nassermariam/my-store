<?php
// Persist cart to data/cart.json using core helpers
require_once __DIR__ . '/../../core/function.php';

// sanitize POST input
$id = isset($_POST['id']) ? (string) $_POST['id'] : '';
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0.0;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

// (no debug logging)

$product = [
    'id' => $id,
    'name' => $name,
    'price' => $price,
    'quantity' => $quantity,
];

addToCart($product);

// preserve previous behavior: redirect to cart view
header("Location: ../../views/employees/cart.php");
exit;
