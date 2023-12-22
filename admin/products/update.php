<?php
include '../../config/database.php';
$product = new Product();
$name;
$price;
$description;
$menu_id;
$images;
$id;

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['menu_id']) && isset($_FILES['food-images'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $menu_id = $_POST['menu_id'];
    $imagesFood = $_FILES['food-images'];
    $imagesFoodPre = $product->getImagesProductById($id);
    $imagesFoodHash = [];
    foreach ($imagesFood['name'] as $imageFoodItem) {
        $array = explode('.', $imageFoodItem);
        $imagesFoodHash[] = hash('md5', $imageFoodItem) . date("YmdHis") . '.' . end($array);
    }
    if ($product->update($id, $name, $description, $price, $menu_id, $imagesFoodHash)) {
        $_SESSION['notify-success'] = "Cập nhật thông tin thành công";
        foreach ($imagesFoodPre as $imageFoodPre) {
            unlink(pathImage . $imageFoodPre);
        }
        for ($i = 0; $i < count($imagesFoodHash); $i++) {
            rename($imagesFood['tmp_name'][$i], pathImage . $imagesFoodHash[$i]);
        }
    } else {
        $_SESSION['notify-success'] = "Cập nhật thông tin thất bại";
    }
} else {
    $_SESSION['notify-success'] = "Cập nhật thông tin thất bại";
}
header("location: index.php");
