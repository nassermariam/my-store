<?php

function validateRequired($key, $value)
{
    return empty($value) ? "yo must be reqierd" : null;
}

function validateName($name)
{
    return strlen($name) < 4 ? "Your name must be at least 4 chars" : null;
}

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "Invalid email";
}

function validatepassword($password)
{
    if (strlen($password) < 6) {
        return "you name must be 4 chars";
    }

    if (!preg_match("/[A-z]/", $password,)) {
        return " you must contian UPPERCASE";
    }

    if (!preg_match("/[a-z]/", $password)) {
        return " you must contian lowcase";
    }

    if (!preg_match("/[0-9]/", $password)) {
        return "you must contian num";
    }
    return null;
}

function validateMatchpassword($password, $confirm_password)
{
    return $password === $confirm_password ? null : "password and confirm Password dont match";
}

function validateRegister($name, $email, $password, $confirm_password)
{

    $filds = [

        "name" => $name,
        "email" => $email,
        "password" => $password,
        "confirm_password" => $confirm_password,

    ];

    foreach ($filds as $key => $value) {

        if ($error = validateRequired($key, $value)) {
            return $error;
        }

        if ($error = validateName($name)) {

            return $error;
        }
        if ($error = validateEmail($email)) {
            return $error;
        }

        if ($error = validatepassword($password)) {
            return $error;
        }
        if ($error = validateMatchpassword($password, $confirm_password)) {
            return $error;
        }
    }
}





function validateLogin($email, $password)
{

    $filds = [

        "email" => $email,
        "password" => $password,

    ];

    foreach ($filds as $key => $value) {

        if ($error = validateRequired($key, $value)) {
            return $error;
        }


        if ($error = validateEmail($email)) {
            return $error;
        }
    }
}



function validateProduct($name, $price, $category, $image, $description)
{

    $filds = [


        "name" => $name,
        "price" => $price,
        "category" => $category,
        "image" => $image,
        "description" => $description,

    ];
}


function validateContact($name, $email, $message)
{

    $filds = [

        "name" => $name,
        "email" => $email,
        "message" => $message,

    ];

    foreach ($filds as $key => $value) {

        if ($error = validateRequired($key, $value)) {
            return $error;
        }

        if ($error = validateName($name)) {

            return $error;
        }
        if ($error = validateEmail($email)) {
            return $error;
        }
    }
}

function validateUpdateProduct($name, $price, $category, $image, $description)
{

    $filds = [


        "name" => $name,
        "price" => $price,
        "category" => $category,
        "image" => $image,
        "description" => $description,

    ];
}
function validateUpdateContact($id,$name, $email, $message)
{

    $filds = [

        "id" => $id,

        "name" => $name,
        "email" => $email,
        "message" => $message,
       
    ];
}
