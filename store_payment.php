<?php
include 'config/database.php';
require_once 'app/views/blocks/order-form-success.php';
$momoPayment = new MomoPayment();
$order = new Order();
if (
    isset($_GET["partnerCode"])
    && isset($_GET["orderId"])
    && isset($_GET["requestId"])
    && isset($_GET["amount"])
    && isset($_GET["orderInfo"])
    && isset($_GET["orderType"])
    && isset($_GET["transId"])
    && isset($_GET["resultCode"])
    && isset($_GET["message"])
    && isset($_GET["payType"])
    && isset($_GET["responseTime"])
    && isset($_GET["extraData"])
    && isset($_GET["signature"])
    && isset($_GET["paymentOption"])
) {

    $partnerCode = $_GET["partnerCode"];
    $orderId = $_GET["orderId"];
    $requestId = $_GET["requestId"];
    $amount = $_GET["amount"];
    $orderInfo = $_GET["orderInfo"];
    $orderType = $_GET["orderType"];
    $transId = $_GET["transId"];
    $message = $_GET["message"];
    $payType = $_GET["payType"];
    $responseTime = $_GET["responseTime"];
    $extraData = $_GET["extraData"];
    $signature = $_GET["signature"];
    $paymentOption = $_GET["paymentOption"];
    $resultCode = $_GET["resultCode"];
    $order_data = $order->getOrderByOrderId($orderId);

    if ($momoPayment->store($orderId, $partnerCode, $requestId, $amount, $orderType, $transId, $resultCode, $message, $payType, $responseTime, $extraData, $signature, $paymentOption, $orderInfo)) {
        if ($resultCode == 0 && $message == "Successful.") {
            $email = $order_data['email'];
            $subject = "Đơn hàng #$orderId đã được xác nhận!
            ";
            $content = createFormOrderSuccess($orderId,$order_data['fullname'],$order_data['address'],$amount,$order_data['phone']);
            sendCodeMail($email,$subject,$content);
            $order->updatePaymentStatusToSuccess($orderId);
            unset($_SESSION['cart']);
        }
        
        header("location: ./order-history.php");
    }
}


function sendCodeMail($email,$subject, $content)
{
    require "public/phpmailer/src/PHPMailer.php";
    require "public/phpmailer/src/SMTP.php";
    require 'public/phpmailer/src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tannp.42.student@fit.tdc.edu.vn';
        $mail->Password = 'tandz1234';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('tannp.42.student@fit.tdc.edu.vn', 'Food store admin');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $noidungthu = $content;
        $mail->Body = $noidungthu;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo 'Đã gửi mail xong';
        return true;
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
        return false;
    }
}













