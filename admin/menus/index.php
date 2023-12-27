<?php
include '../../config/database.php';
$member = new Member();
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
