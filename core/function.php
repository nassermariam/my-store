<?php
session_start();



function setMessage($type, $message)
{
    $_SESSION['message'] = [
        'type' => $type,
        'message' => $message,
    ];
}


function showMessage()
{

    if (isset($_SESSION['message'])) {

        $type = $_SESSION['message']['type'];
        $message = $_SESSION['message']['message'];

        echo "<div class='alert alert-$type'>   $message</div>";
        unset($_SESSION['message']);
    }
}


function registerUser($name, $email, $password)
{

    $usersjsonfile = realpath(__DIR__ . "/../data/users.json");
    $users = file_exists($usersjsonfile) ? json_decode(file_get_contents($usersjsonfile), true) : [];
    // $users = json_decode(file_get_contents($usersjsonfile), true);

    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    $newuser = [


        "name" => $name,
        "email" => $email,
        "password" => $hashpassword,
    ];


    $users[] = $newuser;

    file_put_contents($usersjsonfile, json_encode($users, JSON_PRETTY_PRINT));
    $_SESSION["user"] = [

        "name" => $name,
        "email" => $email,


    ];
    return true;
}


// function loginUser($email, $password)
// {

//     $usersjsonfile = realpath(__DIR__ . "/../data/users.json");
//     $users = file_exists($usersjsonfile) ? json_decode(file_get_contents($usersjsonfile), true) : [];
//     $users = [];

//     foreach ($users as $user) {
//         if ($user['email'] === $email && password_verify($password, $user['password'])) {

//             $_SESSION["user"] = [

//                 "name" => $user['name'],
//                 "email" => $user['email'],


//             ];

//             return true;
//         }
//     }
//     return false;
// }
function loginUser($email, $password)
{

    $usersJsonFile = realpath(__DIR__ . "/../data/users.json");

    if (!file_exists($usersJsonFile)) {
        return false;
    }

    $users = json_decode(file_get_contents($usersJsonFile), true);

    if (!is_array($users)) {
        return false;
    }

    // لو $users كائن بعد json_decode، ناخد القيم بس
    if (array_keys($users) !== range(0, count($users) - 1)) {
        $users = array_values($users);
    }

    // foreach ($users as $user) {

    //         if ($user['email'] === $email && password_verify($password, $user['password'])) {

    //             $_SESSION["user"] = [

    //                 "name" => $user['name'],
    //                 "email" => $user['email'],


    //             ];
    foreach ($users as $user) {

        if ($user['email'] === $email && password_verify($password, $user['password'])) {

            $_SESSION["user"] = [

                "name" => $user['name'],
                "email" => $user['email'],


            ];

            return true;
        }



        return false;
    }
}



// function creatproduct($name, $price, $category, $image, $description)
// {
//     $productjsonfile = realpath(__DIR__ . "/../data/product.json");
//     $product = file_exists($productjsonfile) ? json_decode(file_get_contents($productjsonfile), true) : [];

//     $imgName = "";

//     if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

//         $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

//         // Create UUID file name
//         $uuid = sprintf(
//             '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
//             mt_rand(0, 0xffff), mt_rand(0, 0xffff),
//             mt_rand(0, 0xffff),
//             mt_rand(0, 0x0fff) | 0x4000,
//             mt_rand(0, 0x3fff) | 0x8000,
//             mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
//         );

//         $imgName = $uuid . "." . $extension;

//         $uploadDir = __DIR__ . "/../public/uploads/";

//         if (!is_dir($uploadDir)) {
//             mkdir($uploadDir, 0777, true);
//         }

//         move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imgName);
//     }

//     // Save correct image path in JSON
//     $newproduct = [
//         "name" => $name,
//         "price" => $price,
//         "category" => $category,
//         "image" => "public/uploads/" . $imgName,
//         "description" => $description,
//     ];

//     $product[] = $newproduct;

//     // Remove "\" from slashes in JSON
//     file_put_contents(
//         $productjsonfile,
//         json_encode($product, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
//     );

//     return true;
// }
// function creatproduct($name, $price, $category, $image, $description)
// {
//     $imgName = "";

//     if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
//         $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

//         $uuid = sprintf(
//             '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
//             mt_rand(0, 0xffff),
//             mt_rand(0, 0xffff),
//             mt_rand(0, 0xffff),
//             mt_rand(0, 0x0fff) | 0x4000,
//             mt_rand(0, 0x3fff) | 0x8000,
//             mt_rand(0, 0xffff),
//             mt_rand(0, 0xffff),
//             mt_rand(0, 0xffff)
//         );

//         $imgName = $uuid . "." . $extension;
//         $uploadDir = __DIR__ . "/../public/uploads/";

//         if (!is_dir($uploadDir)) {
//             mkdir($uploadDir, 0777, true);
//         }

//         move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imgName);
//     }

//     $productjsonfile = __DIR__ . "/../data/product.json";
//     $products = file_exists($productjsonfile) ? json_decode(file_get_contents($productjsonfile), true) : [];


//     $newId = empty($products) ? 1 : max(array_column($products, "id")) + 1;

//     $newProduct = [
//         "id" => $newId,
//         "name" => $name,
//         "price" => $price,
//         "category" => $category,
//         "image" => "public/uploads/" . $imgName,
//         "description" => $description,
//     ];

//     $products[] = $newProduct;

//     file_put_contents(
//         $productjsonfile,
//         json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
//     );

//     return true;
// }
function creatproduct($name, $price, $category, $image, $description)
{
    $productjsonfile = realpath(__DIR__ . "/../data/product.json");
    $product = file_exists($productjsonfile) ? json_decode(file_get_contents($productjsonfile), true) : [];

    $imgName = "";

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

        $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        // UUID image name
        $uuid = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );

        $imgName = $uuid . "." . $extension;

        $uploadDir = __DIR__ . "/../public/uploads/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imgName);
    }

    $newproduct = [
        "name" => $name,
        "price" => $price,
        "category" => $category,
        "image" => "uploads/" . $imgName, // <<< هنا التعديل الصحيح
        "description" => $description,
    ];

    $product[] = $newproduct;

    file_put_contents($productjsonfile, json_encode($product, JSON_PRETTY_PRINT));

    return true;
}


function getproduct()
{

    $productjsonfile = realpath(__DIR__ . "/../data/product.json");
    $product = file_exists($productjsonfile) ? json_decode(file_get_contents($productjsonfile), true) : [];
    return  $product;
}



function deleteProduct($id)
{
    $productjsonfile = realpath(__DIR__ . "/../data/product.json");

    // Load products
    $products = file_exists($productjsonfile) ? json_decode(file_get_contents($productjsonfile), true) : [];

    $found = false;

    foreach ($products as $index => $product) {
        if ($product['id'] == $id) {
            unset($products[$index]); // Correct delete
            $found = true;
            break;
        }
    }

    if ($found) {
        // Reindex array to avoid gaps
        $products = array_values($products);

        // Save back to JSON file
        file_put_contents($productjsonfile, json_encode($products, JSON_PRETTY_PRINT));

        return true;
    }

    return false;
}

function updateProduct($id, $name, $price, $category, $image, $description)
{
    $productjsonfile = realpath(__DIR__ . "/../data/product.json");

    // تحميل المنتجات
    $products = file_exists($productjsonfile) ? json_decode(file_get_contents($productjsonfile), true) : [];

    $found = false;
    $imgName = "";

    // رفع الصورة الجديدة
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        $uuid = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );

        $imgName = $uuid . "." . $extension;
        $uploadDir = __DIR__ . "/../public/uploads/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // حذف الصورة القديمة لو موجودة
        foreach ($products as $product) {
            if ($product['id'] == $id && !empty($product['image'])) {
                $oldImage = $uploadDir . $product['image'];
                if (file_exists($oldImage)) {
                    unlink($oldImage); // حذف الصورة القديمة
                }
                break;
            }
        }

        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imgName);
    }

    // تحديث بيانات المنتج
    foreach ($products as &$product) {
        if ($product['id'] == $id) {
            $product['name'] = $name;
            $product['price'] = $price;
            $product['category'] = $category;
            $product['description'] = $description;

            if (!empty($imgName)) {
                $product['image'] = $imgName;
            }

            $found = true;
            break;
        }
    }

    // حفظ التعديلات
    if ($found) {
        file_put_contents($productjsonfile, json_encode($products, JSON_PRETTY_PRINT));
        return true;
    }

    return false;
}

function creatContact($id, $name, $email, $message)
{

    // $contactjsonfile = realpath(__DIR__ . "/../data/contact.json");
    // $users = file_exists($contactjsonfile) ? json_decode(file_get_contents($contactjsonfile), true) : [];
    // // $users = json_decode(file_get_contents($usersjsonfile), true);
    // $newId = empty($contact) ? 1 : max(array_column($contact, "id")) + 1;

    // $newcontact = [


    //     "name" => $name,
    //     "email" => $email,
    //     "message" => $message,
    // ];


    // $contact[] = $newcontact;

    // file_put_contents($contactjsonfile, json_encode($contact, JSON_PRETTY_PRINT));
    // $_SESSION["contact"] = [

    //     "name" => $name,
    //     "email" => $email,
    //     "message" => $message,


    // ];
    // return true;
    $contactjsonfile = __DIR__ . "/../data/contact.json";
    $contact = file_exists($contactjsonfile) ? json_decode(file_get_contents($contactjsonfile), true) : [];


    $newId = empty($contact) ? 1 : max(array_column($contact, "id")) + 1;

    $newcontact = [
        "id" => $newId,
        "name" => $name,
        "email" => $email,
        "message" => $message,

    ];

    $contact[] = $newcontact;

    file_put_contents(
        $contactjsonfile,
        json_encode($contact, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
    );

    return true;
}
function getcontact()
{
    $file = realpath(__DIR__ . "/../data/contact.json");

    if (!file_exists($file)) {
        return []; // أهم حاجة ترجّع Array مش false
    }

    $data = file_get_contents($file);
    $contacts = json_decode($data, true);

    if (!is_array($contacts)) {
        return []; // لو حصل خطأ في json
    }

    return $contacts;
}


function deletecontact($id)
{
    $contactjsonfile = realpath(__DIR__ . "/../data/contact.json");

    // Load products
    $contact = file_exists($contactjsonfile) ? json_decode(file_get_contents($contactjsonfile), true) : [];

    $found = false;

    foreach ($contact as $index => $product) {
        if ($contact['id'] == $id) {
            unset($contact[$index]); // Correct delete
            $found = true;
            break;
        }
    }

    if ($found) {
        // Reindex array to avoid gaps
        $contact = array_values($contact);

        // Save back to JSON file
        file_put_contents($contactjsonfile, json_encode($contact, JSON_PRETTY_PRINT));

        return true;
    }

    return false;
}
// function updatecontact($id, $name, $email, $message)
// {

//     $contactjsonfile = realpath(__DIR__ . "/../data/contact.json");

//     // تحميل المنتجات
//     $contact = file_exists($contactjsonfile) ? json_decode(file_get_contents($contactjsonfile), true) : [];

//     $found = false;


//     foreach ($contact as &$contact) {
//         if ($contact['id'] == $id) {
//             $contact['name'] = $name;
//             $contact['email'] = $email;
//             $contact['message'] = $message;


//             $found = true;
//             break;
//         }
//     }

//     // حفظ التعديلات
//     if ($found) {
//         file_put_contents($contactjsonfile, json_encode($contact, JSON_PRETTY_PRINT));
//         return true;
//     }

//     return false;
// }
function updateContact($id, $name, $email, $message)
{
    $contactJsonFile = realpath(__DIR__ . "/../data/contact.json");

    // تحميل بيانات الاتصال
    $contacts = file_exists($contactJsonFile) ? json_decode(file_get_contents($contactJsonFile), true) : [];

    $found = false;

    // المرور على كل عنصر لتحديث البيانات
    foreach ($contacts as &$c) {
        if ($c['id'] == $id) {
            $c['name'] = $name;
            $c['email'] = $email;
            $c['message'] = $message;
            $found = true;
            break;
        }
    }

    // حفظ البيانات بعد التعديل
    if ($found) {
        file_put_contents($contactJsonFile, json_encode($contacts, JSON_PRETTY_PRINT));
        return true;
    }

    return false;
}


/**
 * Cart persistence helpers (store cart in data/cart.json)
 */
function getCartFilePath()
{
    $dataDir = __DIR__ . '/../data';
    if (!is_dir($dataDir)) {
        mkdir($dataDir, 0777, true);
    }
    return $dataDir . '/cart.json';
}

function getCart()
{
    $file = getCartFilePath();
    if (!file_exists($file)) {
        return [];
    }
    $data = file_get_contents($file);
    $cart = json_decode($data, true);
    if (!is_array($cart)) {
        return [];
    }
    return $cart;
}

function addToCart(array $product)
{
    $file = getCartFilePath();
    $cart = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    if (!is_array($cart)) {
        $cart = [];
    }

    // normalize product fields
    $product['id'] = (string) ($product['id'] ?? '');
    // if no id provided, generate a stable unique id
    if (empty($product['id'])) {
        $product['id'] = uniqid('p_', true);
    }
    $product['name'] = $product['name'] ?? '';
    $product['price'] = isset($product['price']) ? floatval($product['price']) : 0.0;
    $product['quantity'] = isset($product['quantity']) ? intval($product['quantity']) : 1;

    $found = false;
    foreach ($cart as &$item) {
        if ((string) $item['id'] === $product['id']) {
            $item['quantity'] = intval($item['quantity']) + $product['quantity'];
            $found = true;
            break;
        }
    }
    if (!$found) {
        $cart[] = $product;
    }

    file_put_contents($file, json_encode($cart, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    return true;
}

function clearCart()
{
    $file = getCartFilePath();
    if (file_exists($file)) {
        unlink($file);
    }
    return true;
}
