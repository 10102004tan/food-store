<?php 
include '../../config/database.php';
$menu = new Menu();
$id;
$menu_data;
if (isset($_POST['id'])){
    $id = $_POST['id'];
    $menu_data = $menu->getMenuById($id);

}
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');
echo json_encode($menu_data);