<?php
include '../../config/database.php';
$product = new Product();
$name;
$descripton;
$price;
$image;
$menu_id;


if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['image']) && isset($_POST['menu_id'])) {

    $name = $_POST['name'];
    $descripton = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $menu_id = $_POST['menu_id'];
    $array = explode('.', $image['name']);
    $imageHashName = hash('md5', $image['name']). date("YmdHis"). '.' . end($array);

    if ($product->store($name,$descripton,$price,$imageHashName,$menu_id)) {
        rename($image['tmp_name'], pathImage . $imageHashName);
        $_SESSION['notify-success'] = "Thêm " . $name . " thành công";
    }
    else{
        $_SESSION['notify-fail'] = "Thêm thất bại";
    }
    

}
else{
    $_SESSION['notify-fail'] = "Kiểm tra lại dữ liệu";
}
header("location: index.php");