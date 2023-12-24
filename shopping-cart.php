<?php
include 'config/database.php';
$template = new Template();
$product = new Product();
$cart = array();
$products = array();
$total = 0;

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


// Render view
$data = [
    'title' => 'Cart',
    'slot' => $template->render('shopping-cart', ['cart' => $products, 'total' => $total]),
];

$template->view("layout", $data);
