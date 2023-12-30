<?php
include 'config/database.php';
$template = new Template();
$product = new Product();
$member = new Member();
$order = new Order();
$cart = array();
$products = array();
$total = 0;
$orderId = "";

// Get cart from session
if (isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];
}

// Get product from cart
foreach ($cart as $key => $quantity) {
    $productCart = $product->getProductById($key);
    array_push($products, $productCart);
    $products[count($products) - 1]["quantity"] = $quantity; // Use $quantity instead of $amount
    $total += ($productCart["price"] * $quantity); // Use $quantity instead of $amount
}

if (count($products) > 0) {
    // handle get checkout information
    if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["address"])) {
        $fullname = htmlspecialchars($_POST["firstname"] . " " . $_POST["lastname"]);
        $email = htmlspecialchars($_POST["email"]);
        $phone = htmlspecialchars($_POST["phone"]);
        $address = htmlspecialchars($_POST["address"]);
        $orderId = uniqid() . time();

        // Get user id
        if (isset($_COOKIE["token"])) {
            $user = $member->getUserByToken($_COOKIE["token"]);
            $userId = $user["id"];
            // Create order
            if ($order->store($orderId, $userId, $fullname, $email, $phone, $address, 0)) {
                if ($order->storeOrderDetails($orderId, $products)) {
                    header("location: ./payment.php?order_id=" . $orderId);
                }
            }
        }
    }
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


$data = [
    'title' => 'Checkout',
    'slot' => $template->render('checkout', ['products' => $products, 'total' => $total])
];

$template->view("layout", $data);
