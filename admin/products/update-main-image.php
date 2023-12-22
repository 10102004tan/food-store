<?php
include '../../config/database.php';
$product = new Product();
$id;
$imageFoodNew;
if (isset($_POST['id']) && $_FILES['new-food-image']){
    $id = $_POST['id'];
    $imageFoodNew = $_FILES['new-food-image'];
    $array = explode('.', $imageFoodNew['name']);
    $imageHashName = hash('md5', $imageFoodNew['name']). date("YmdHis"). '.' . end($array);
    $food = $product->getProductById($id);
    $imageFoodPre = $food['image'];
    echo $imageFoodPre;
    if ($product->updateImageMain($id, $imageHashName)){
        unlink(pathImage . $imageFoodPre);
        rename($imageFoodNew['tmp_name'], pathImage . $imageHashName);
        $_SESSION['notify-success'] = "Cập nhật ảnh cho  " . $food['name'] . " thành công";
    }
    else{
        $_SESSION['notify-fail'] = "Cập nhật ảnh thất bại";
    }
}
else{
    $_SESSION['notify-fail'] = "Cập nhật ảnh thất bại";
}
header("location: index.php");
