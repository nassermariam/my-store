<?php
include '../../core/function.php';
include '../../core/validation.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && !empty($_POST['id'])) {

    $id = (int)$_POST['id'];

    if (deleteProduct($id)) {
        setMessage("success", "Product deleted");
        header("Location: ../../views/employees/cart.php");
        exit;
    } else {
        setMessage("danger", "Failed to delete product");
        header("Location: ../../index.php");
        exit;
    }
} else {
    setMessage("danger", "Invalid request");
    header("Location: ../../index.php");
    exit;
}
