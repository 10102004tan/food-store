<?php
include 'config/database.php';
$template = new Template();
$product = new Product();
$cart = [];
if (isset($_COOKIE["cart"])) {
    $cart = json_decode($_COOKIE["cart"], true);
}
$quantity = 1;
$image;
$price;
$name;
$id;
if (isset($_POST['id']) && isset($_POST['quantity'])) {
    $id = $_POST['id'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    
    $productExists = false;
    foreach ($cart as &$item) { 
        if ($item['id'] == $id) {
            $item['quantity'] = intval($item['quantity']) + intval($quantity);
            $productExists = true;
            break;
        }
    }

    if (!$productExists) {
        $newProduct = [
            "id" => $id,
            "name" => $name,
            "quantity" => $quantity,
            "image" => $image,
            "price" => $price,
        ];
        array_push($cart, $newProduct);
    }
    unset($item);
    setcookie("cart", json_encode($cart), time() + (86400 * 30), "/");

}


$total = 0;
$numberCart = 0;
foreach($cart as &$item){
    $total+=($item['price']*$item['quantity']);
    $numberCart+=$item['quantity'];
}


$data = [
    'title' => 'Cart',
    'slot' => $template->render('shopping-cart', ['cart' => $cart,'total'=>$total,'numberCart'=>$numberCart]),
];
$template->view("layout", $data);
