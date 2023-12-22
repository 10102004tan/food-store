<?php 
include '../../config/database.php';
$menu = new Menu();
$id;
$name;
$descripton;
if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $descripton = $_POST['description'];
    if ($menu->update($id, $name, $descripton)) {
        $_SESSION['notify-success'] = "Sửa thành công";
    }
}
else{
    $_SESSION['notify-fail'] = "Sửa thất bại";
}
header('location: index.php');