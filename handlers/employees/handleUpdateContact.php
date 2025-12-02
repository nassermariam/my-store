<?php
include '../../core/function.php';
include '../../core/validation.php';

$dataFile = __DIR__ . '/../../data/contact.json';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // $errors = validateProduct($name, $price, $category, $image, $description);


    // if (!empty($errors)) {
    //     setMessage("danger", $errors);
    //     header("Location: ../../views/employees/edit.php");
    //     exit;
    // }
   
    if (updatecontact($id, $name, $email, $message)) {
        setMessage("success", "succesfully data");
        header("Location: ../../index.php");
        exit;
    }
    setMessage("danger", " failed create product");
    header("Location: ../../views/employees/edit.php");
    exit;
}
