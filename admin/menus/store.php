<?php 
include '../../config/database.php';
$menu = new Menu();
$name;
$descripton;
if (isset($_POST['name']) && isset($_POST['description'])) {
    $name = $_POST['name'];
    $descripton = $_POST['description'];
    if ($menu->store($name,$descripton)){
        $_SESSION['notify-success'] = "Thêm thành công";
    }
}
else{
    $_SESSION['notify-fail'] = "Thêm thất bại";
}
header('location: index.php');
