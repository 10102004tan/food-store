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
$menu = new Menu();
$menus_data = $menu->getAllMenu();
$product = new Product();
$page = 1;
$perPage = 5;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$total = $product->getTotalProduct();
$foods = $product->getAllProductLimit(($page - 1) * $perPage, $perPage);
$endPage = ceil($total / $perPage);
$data = [
    'title' => 'Manage Product',
    'slot' => $template->render('food-data', ['foods' => $foods, 'endPage' => $endPage, 'menus_data' => $menus_data])
];
$template->view("layout-admin", $data);