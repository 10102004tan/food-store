<?php 
include '../../config/database.php';

$id;
$menu = new Menu();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if ($menu->destroy($id)){
        $_SESSION['notify-success'] = "Xóa thành công";
    }
    else{
        $_SESSION['notify-fail'] = "Xóa thất bại";
    }
}
else{
    $_SESSION['notify-fail'] = "Không tìm thấy id của menu này";
}
header('location: index.php');