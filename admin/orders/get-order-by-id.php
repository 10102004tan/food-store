<?php 
include '../../config/database.php';
$order = new Order();
$product = new Product();
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $order->getOrderByOrderId($id);

    $orderDetail = $order->getOrderDetailByOrderId($id);
    foreach ($orderDetail as $index => $detail) {
        $productDetail = $product->getProductById($detail["product_id"]);
        $orderDetail[$index]["product"] = $productDetail;
    }
    $data["details"] = $orderDetail;


    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');
    echo json_encode($data);
}
