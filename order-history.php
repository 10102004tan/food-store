<?php
include 'config/database.php';
$template = new Template();
$orderModel = new Order();
$member = new Member();
$product = new Product();


if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $user = $member->getUserByToken($token);

    $orders = $orderModel->getOrderByUserId($user["id"]);
    foreach ($orders as $key => $order) {
        $orderDetail = $orderModel->getOrderDetailByOrderId($order["id"]);
        foreach ($orderDetail as $index => $detail) {
            $productDetail = $product->getProductById($detail["product_id"]);
            $orderDetail[$index]["product"] = $productDetail;
        }
        $orders[$key]["details"] = $orderDetail;
    }

    $data = [
        'title' => 'Order History',
        'slot' => $template->render('order-history', ["orders" => $orders])
    ];


    $template->view("no-layout", $data);
}
