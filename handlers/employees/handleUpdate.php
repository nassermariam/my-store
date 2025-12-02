<?php
include '../../core/function.php';
include '../../core/validation.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image =  $_FILES['image'];
    $description = $_POST['description'];

    $errors = validateProduct($name, $price, $category, $image, $description);


    if (!empty($errors)) {
        setMessage("danger", $errors);
        header("Location: ../../views/employees/edit.php");
        exit;
    }

    if (updateProduct($id, $name, $price, $category, $image, $description)) {
        setMessage("success", "succesfully data");
        header("Location: ../../index.php");
        exit;
    }
    setMessage("danger", " failed create product");
    header("Location: ../../views/employees/edit.php");
    exit;
}
