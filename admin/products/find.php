<?php
include '../../config/database.php';
$template = new Template();
$menu = new Menu();
$menus_data = $menu->getAllMenu();
$product = new Product();
$page = 1;
$perPage = 5;
$key = $_GET['key'];
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

// echo $key;

$total = $product->getTotalProductByKey($key);
$foods = $product->getAllProductByKeyLimit($key,($page - 1)*$perPage, $perPage);
$endPage = ceil($total / $perPage);
$data = [
    'title' => 'Manage Product',
    'slot' => $template->render('food-data-search',['foods'=>$foods,'endPage'=> $endPage,'menus_data'=>$menus_data,'key'=>$key])
];
$template->view("layout-admin",$data);