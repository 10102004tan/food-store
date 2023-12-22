<?php 
include '../../config/database.php';
$template = new Template();
$menu = new Menu();
$page = 1;
$perPage = 4;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$total = $menu->getTotalMenu();
$menu_data = $menu->getAllMenuLimit(($page - 1) *$perPage,$perPage);
$endPage = ceil($total / $perPage);
$data = [
    'title' => 'Manage Menu',
    'slot' => $template->render('menu-data',['menu_data'=> $menu_data,'endPage'=> $endPage])
];
$template->view("layout-admin",$data);