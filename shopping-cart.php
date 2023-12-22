<?php
include 'config/database.php';
$template = new Template();
$product = new Product();
$cart = [];
$quantity = 1;
if (isset($_POST['id']) && isset($_POST['quantity'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $quantity = 1;
    if (isset($_COOKIE["cart"])) {
        $cart = json_decode($_COOKIE["cart"], true);
    }
    $productExists = false;
    foreach ($cart as $item) {
        if ($item['id'] == $id) {
            $item['quantity']+=$quantity;
            $productExists = true;
            break;
        }

        echo "<pre>";
        print_r($item);
        echo "</pre>";
    }
    if (!$productExists) {
        array_push($cart, [
            "id" => $id,
            "quantity" => $quantity
        ]);
    }
    setcookie("cart", json_encode($cart), time() + (86400 * 30), "/");
} else {
    echo "123";
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $data = [
        'title' => 'Details',
        'slot' => $template->render('shopping-cart.php', ['cart' => $cart]),
    ];
    // $template->view("layout", $data);


}
