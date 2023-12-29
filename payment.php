<?php
include 'config/database.php';
$template = new Template();
$product = new Product();
$order = new Order();
$orderId = "";
$orderData;
$totalPay = 0;

if (isset($_GET["order_id"])) {
    $orderId = $_GET["order_id"];
    $orderData = $order->getOrderByOrderId($orderId);
    $orderDataDetails = $order->getOrderDetailByOrderId($orderId);

    $totalPay = 0; // Initialize totalPay

    // Iterate over order details
    foreach ($orderDataDetails as $key => $orderDetails) {
        // Ensure that quantity is a numeric value
        $quantity = is_numeric($orderDetails["quantity"]) ? $orderDetails["quantity"] : 0;

        $producPrice = $product->getPriceProduct($orderDetails["product_id"]);
        $totalPay += $quantity * $producPrice[0]["price"];
    }

    // Now $totalPay contains the total payment for all products in the order
}



$data = [
    'title' => 'Payment',
    'slot' => $template->render('payment', ['order' => $orderData, "totalPay" => $totalPay])
];
$template->view("no-layout", $data);