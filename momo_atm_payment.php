<?php
header('Content-type: text/html; charset=utf-8');
include "./helper/momo_payment_helper.php";


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua MoMo";
$amount = "10000";
$orderId = time() . "";
$redirectUrl = "http://localhost/food-store/store_payment.php";
$ipnUrl = "http://localhost/food-store/checkout.php";
$extraData = "";


if (!empty($_POST)) {
    // $partnerCode = $_POST["partnerCode"];
    // $accessKey = $_POST["accessKey"];
    // $serectkey = $_POST["secretKey"];
    $orderId = $_POST["order_id"]; // Mã đơn hàng
    // $orderInfo = $_POST["orderInfo"];
    $amount = $_POST["amount"] * 24000;
    // $ipnUrl = $_POST["ipnUrl"];
    // $redirectUrl = $_POST["redirectUrl"];
    // $extraData = $_POST["extraData"];

    var_dump($orderId);
    var_dump($amount);

    $requestId = time() . "";
    $requestType = "payWithATM";
    $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array(
        'partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature
    );
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);
}
