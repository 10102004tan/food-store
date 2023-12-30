<?php 
include 'config/database.php';
$order = new Order();
if (isset($_POST['id'])){
    $id = $_POST['id'];

    if ($order->cancelOrder($id)) {
        $_SESSION['notify-success'] = "Hủy thành công";
    }else{
        $_SESSION['notify-fail'] = "Hủy thất bại";
    }
}else{
    $_SESSION['notify-fail'] = "Không tìm thấy id của order này";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);