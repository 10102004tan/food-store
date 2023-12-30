<?php
class MomoPayment extends Database
{

    public function getMomoPaymentInforByOrderId($orderId)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `momo_payment` WHERE `order_id` = ? ");
        $sql->bind_param("s", $orderId);
        return parent::select($sql)[0];
    }

    public function store($orderId, $partnerCode, $requestId, $amount, $orderType, $transId, $resultCode, $message, $payType, $responseTime, $extraData, $signature, $paymentOption, $orderInfor)
    {
        $sql = parent::$connection->prepare("INSERT INTO `momo_payment`(`order_id`, `partner_code`, `request_id`, `amount`, `order_info`, `order_type`, `trans_id`, `result_code`, `message`, `pay_type`, `response_time`, `extra_data`, `signature`, `payment_option`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("sssisssissssss", $orderId, $partnerCode, $requestId, $amount, $orderInfor, $orderType, $transId, $resultCode, $message, $payType, $responseTime, $extraData, $signature, $paymentOption);
        return $sql->execute();
    }
}
