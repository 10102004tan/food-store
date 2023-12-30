<?php 
include '../../config/database.php';
$order = new Order();
$product = new Product();
if (isset($_POST['id']) 
    && isset($_POST['fullname']) 
    && isset($_POST['phone']) 
    && isset($_POST['email']) 
    && isset($_POST['address']) 
    && isset($_POST['payment-status']) 
    && isset($_POST['delivery-status'])){
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $paymentStatus = $_POST["payment-status"];
        $deliveryStatus = $_POST["delivery-status"];

        if ($order->update($id, $fullname, $phone, $email, $paymentStatus, $deliveryStatus, $address)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
}
