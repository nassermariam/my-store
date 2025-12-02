<?php
include '../core/function.php';
include '../core/validation.php';

include '../core/message.php'; // لو عندك دالة setMessage هنا


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = validatelogin($email, $password);


    // if (!empty($errors)) {
    //     setMessage("danger", $errors);
    //     header("Location: ../views/auth/login.php");
    //     exit;
    // }  if (loginUser($email, $password)) {
    //     setMessage("success", "login success");
    //     header("Location: ../index.php");
    //     exit;
    // } else {
    //     setMessage("danger", "login faild");
    //     header("Location: ../views/auth/login.php");
    //     exit;
    // }

    if (!empty($errors)) {
        setMessage("danger", $errors);
        header("Location: ../views/auth/login.php");
        exit;
    }

    if (loginUser($email, $password)) {
        setMessage("success", "Login successful");
        header("Location: ../index.php");
        exit;
    } else {
        setMessage("danger", "Login failed");
        header("Location: ../views/auth/login.php");
        exit;
    }
}
