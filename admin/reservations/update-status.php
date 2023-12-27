<?php
include '../../config/database.php';
$reservation = new Reservation();
$status;
$notify;
if (isset($_POST['status']) && isset($_POST['id'])) {
    $status = $_POST['status'];
    $id = $_POST['id'];
    $reservation_data = $reservation->getReservationById($id);
    if ($status == $reservation_data['status']){
        $notify = "Vui lòng chọn lựa chọn khác";
    }
    else{
        $notify = ($reservation->updateStatusReservation($id,$status)) ? "Cập nhật thành công trạng thái" : "Thử lại sau";   
    }
}
else{
    $notify = "Cập nhật thất bại";
}
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');
echo json_encode($notify);