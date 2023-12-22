<?php
include '../../config/database.php';
$product = new Product();
$id;
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $food = $product->getProductById($id);
    $imagesFood = $product->getImagesProductById($id);

    if ($product->destroy($id)){
        $_SESSION['notify-success'] = "Xóa thành công";
        unlink(pathImage . $food['image']);
        foreach ($imagesFood as $imageFood) {
            unlink(pathImage .$imageFood['name']);
        }
    }
    else{
        $_SESSION['notify-success'] = "Xóa thất bại";
    }
}
else{
    $_SESSION['notify-success'] = "Xóa thất bại";
}
header("location: index.php");