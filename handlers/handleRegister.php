<?php
include '../core/function.php';
include '../core/validation.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = validateRegister($name, $email, $password, $confirm_password);


    if (!empty($errors)) {
        setMessage("danger", $errors);
        header("Location: ../views/auth/register.php");

        exit;
    }

    if (registerUser($name, $email, $password)) {
        setMessage("success", "register success");
        header("Location: ../index.php");
        exit;
    }
}
