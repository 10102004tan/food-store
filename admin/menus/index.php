<?php
include '../../config/database.php';
$member = new Member();
if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
    $status = $member->login($username, $password);
    if ($status != 0) { // Double check if not admin
        header("location: index.php");
        exit();
    }
} else {
    header("location: index.php");
}



$template = new Template();
$menu = new Menu();
$page = 1;
$perPage = 4;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$total = $menu->getTotalMenu();
$menu_data = $menu->getAllMenuLimit(($page - 1) * $perPage, $perPage);
$endPage = ceil($total / $perPage);
$data = [
    'title' => 'Manage Menu',
    'slot' => $template->render('menu-data', ['menu_data' => $menu_data, 'endPage' => $endPage])
];
$template->view("layout-admin", $data);
