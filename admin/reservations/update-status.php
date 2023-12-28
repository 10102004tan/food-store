<?php
include '../../config/database.php';
$reservation = new Reservation();
$status;
$notify;
if (isset($_POST['status']) && isset($_POST['id'])) {
    $status = $_POST['status'];
    $id = $_POST['id'];
    $reservation_data = $reservation->getReservationById($id);
    $name = $reservation_data['name'];
    $date = $reservation_data['date'];
    $people  = $reservation_data['people'];
    $phone = $reservation_data['phone'];
    $email = $reservation_data['email'];
    if ($status == $reservation_data['status']){
        $notify = "Vui lòng chọn lựa chọn khác";
    }
    else{
        
        if ($reservation->updateStatusReservation($id,$status))
        {
         
            $content = "";
            $subject = "";
           if ($status == 2)
           {
            $subject = "[Food Store] Đặt bàn không thành công";
            $content = "Cảm ơn bạn tin tưởng sử dụng dịch vụ của Food store. <br>
            <h5>Chi tiết đơn hàng : </h5>  <br>
            Mã bàn : $id  <br>
            Tên khách hàng : $name  <br>
            Thời gian : $date  <br>
            Số lượng khách : $people  <br>
            Số điện thoại : $phone  <br>
            Email : $email  <br>
            Trạng thái : Đã bị hủy  <br>
            <br><br>
            Chân thành xin lỗi quý khách <3
            ";
           }
           else{
            $content = "Cảm ơn bạn tin tưởng sử dụng dịch vụ của Food store. Đơn hàng của bạn đã được xác nhận <br>
            <h5>Chi tiết đơn hàng : </h5>  <br>
            Mã bàn : $id  <br>
            Tên khách hàng : $name  <br>
            Thời gian : $date  <br>
            Số lượng khách : $people  <br>
            Số điện thoại : $phone  <br>
            Email : $email  <br>
            Trạng thái : Xác nhận có bàn  <br>
            <br>  <br>
            Chúc quý khách có 1 trải nghiệm vui vẻ bên những người thân iuuuu <3
            ";
            $subject = "[Food Store] Đặt bàn thành công";
            }
            sendCodeMail($email,$subject,$content);
            $notify = "Cập nhật thành công trạng thái";
        }
        else{
            $notify = "Thử lại sau"; 
        }
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


function sendCodeMail($email,$subject,$content)
{
    require "../../public/PHPMailer/src/PHPMailer.php";
    require "../../public/PHPMailer/src/SMTP.php"; 
    require '../../public/PHPMailer/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; 
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true; 
        $mail->Username = 'tannp.42.student@fit.tdc.edu.vn';
        $mail->Password = 'tandz1234'; 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port = 465;           
        $mail->setFrom('tannp.42.student@fit.tdc.edu.vn', 'Food store admin' ); 
        $mail->addAddress($email); 
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $noidungthu = "<div style='color: #000'>$content</div>"; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        return true;
    } catch (Exception $e) {
        // echo 'Error: ', $mail->ErrorInfo;
        return false;
    }
}