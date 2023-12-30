<?php
include 'config/database.php';
$template = new Template();
$product = new Product();
$order = new Order();
$product = new Product();

if (isset($_POST["id"])) {
    $orderId = $_POST["id"];

    $orderData = $order->getOrderByOrderId($orderId);
    $orderDataDetails = $order->getOrderDetailByOrderId($orderId);
    
    // order information
    $orderId = uniqid() . time();
    $fullname = $orderData["fullname"];
    $userId = $orderData["user_id"];
    $email = $orderData["email"];
    $phone = $orderData["phone"];
    $address = $orderData["address"];

    // details information
    // var_dump($orderDataDetails);

    if ($order->store($orderId, $userId, $fullname, $phone, $address, 0)) {
        $products = array();
        foreach ($orderDataDetails as $key => $detail) {
            $productDetail = $product->getProductById($detail["product_id"]);
            $productDetail["quantity"] = $detail["quantity"];
            array_push($products ,$productDetail);
        }
        // header('Content-Type: application/json');
        // echo json_encode($products);

        if ($order->storeOrderDetails($orderId ,$products)) {
            header("location: ./payment.php?order_id=" . $orderId);
        }
    }
}
