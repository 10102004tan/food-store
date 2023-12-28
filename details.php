<?php
include 'config/database.php';
$template = new Template();
$product = new Product();
$comment = new Comment();

$id;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$food = $product->getProductById($id);
$comments = $comment->getCommentByProductId($id);


// Handle add to cart
if (isset($_POST["food_id"]) && isset($_POST["quantity"])) {
    $foodId = $_POST["food_id"];
    $amount = $_POST["quantity"];

    // If the shopping cart not already exists
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    // If the product is already in the cart
    if (isset($_SESSION["cart"][$foodId])) {
        $_SESSION["cart"][$foodId] += $amount;
    } else {
        $_SESSION["cart"][$foodId] = $amount;
    }

    $_SESSION['notify-success'] = "Add to cart successfully";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

$data = [
    'title' => 'Details',
    'slot' => $template->render('details', ['food' => $food, 'comments' => $comments]),
];
$template->view("layout", $data);
