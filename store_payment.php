<?php
include 'config/database.php';
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

    if ($momoPayment->store($orderId, $partnerCode, $requestId, $amount, $orderType, $transId, $resultCode, $message, $payType, $responseTime, $extraData, $signature, $paymentOption, $orderInfo)) {
        if ($resultCode == 0 && $message == "Successful.") {
            // Update payment status for order
            $order->updatePaymentStatusToSuccess($orderId);
            // Clear session cart
            unset($_SESSION['cart']);
        }
        header("location: ./order-history.php");
    }
}
