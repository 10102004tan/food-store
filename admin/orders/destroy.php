<?php 
include '../../config/database.php';
$order = new Order();
if (isset($_POST['id'])){
    $id = $_POST['id'];

    if ($order->destroy($id)) {
        $_SESSION['notify-success'] = "Xóa thành công";
    }else{
        $_SESSION['notify-fail'] = "Xóa thất bại";
    }
}else{
    $_SESSION['notify-fail'] = "Không tìm thấy id của order này";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
