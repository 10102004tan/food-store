<?php
include '../../config/database.php';
$template = new Template();
$menu = new Menu();
$page = 1;
$perPage = 4;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$key;
if (isset($_GET['key'])) {
    $key = $_GET['key'];
}
$total = $menu->getTotalMenuByKey($key);
$menu_data = $menu->getAllMenuByKeyLimit($key, ($page - 1) * $perPage, $perPage);
$endPage = ceil($total / $perPage);
$data = [
    'title' => 'Manage Menu',
    'slot' => $template->render('menu-data-search', ['menu_data' => $menu_data, 'endPage' => $endPage, 'key' => $key])
];

$template->view("layout-admin", $data);
