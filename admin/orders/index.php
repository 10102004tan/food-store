<?php
include '../../config/database.php';
$member = new Member();
if (isset($_COOKIE["token"])) {
    $token = $_COOKIE["token"];
    $user = $member->getUserByToken($token);
    if ($user["role"] == 1) { // Double check if not admin
        header("location: index.php");
        exit();
    }
} else {
    header("location: index.php");
}




$template = new Template();
$order = new Order();
$page = 1;
$perPage = 5;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$total = $order->getTotalOrder();
$orders = $order->getAllOrderLimit(($page - 1) * $perPage, $perPage);
$endPage = ceil($total / $perPage);
$data = [
    'title' => 'Order Management',
    'slot' => $template->render('order-data', ['orders' => $orders, 'endPage' => $endPage])
];
$template->view("layout-admin", $data);