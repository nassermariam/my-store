<?php
include '../core/function.php';
include '../core/validation.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $confirm_password = $_POST['confirm_password'];

    $errors = validateContact($name, $email, $message);


    if (!empty($errors)) {
        setMessage("danger", $errors);
        header("Location: ../views/auth/contact.php");

        exit;
    }

    if (creatContact($id, $name, $email, $message)) {
        setMessage("success", "save to Contact successfully");
        header("Location: ../index.php");
        exit;
    }
}
