<?php 
include '../../config/database.php';
$product = new Product();
$id;
$food;
$imagesFood;
if (isset($_POST['id'])){
    $id = $_POST['id'];
    $food = $product->getProductById($id);
    $imagesFood = $product->getImagesProductById($id);
    $food['images'] = $imagesFood;
}
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');
echo json_encode($food);