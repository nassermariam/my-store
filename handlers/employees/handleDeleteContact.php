<?php
include '../../core/function.php';
include '../../core/validation.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && !empty($_POST['id'])) {

    $id = (int)$_POST['id'];

    if (deletecontact($id)) {
        setMessage("success", "contact deleted");
        header("Location: ../../views/employees/editcontact.php");
        exit;
    } else {
        setMessage("danger", "Failed to delete contact");
        header("Location: ../../index.php");
        exit;
    }
} else {
    setMessage("danger", "Invalid contact");
    header("Location: ../../index.php");
    exit;
}
