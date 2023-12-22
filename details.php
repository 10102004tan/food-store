<?php
include 'config/database.php';
$template = new Template();
$product = new Product();
$id;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$food = $product->getProductById($id);
$data = [
    'title' => 'Details',
    'slot' => $template->render('details',['food'=> $food]),
];
$template->view("layout",$data);