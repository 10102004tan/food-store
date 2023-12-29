<?php
class Order extends Database
{

    public function getAllOrder()
    {
        $sql = parent::$connection->prepare("SELECT * FROM `orders`");
        return parent::select($sql);
    }

    public function update($orderId, $fullname, $phone, $email, $paymentStatus, $deliveryStatus, $address) {
        $sql = parent::$connection->prepare("UPDATE `orders` SET `fullname`= ?, `phone`= ?, `email`= ?, `payment_status`= ?, `delivery_status`= ?, `address`= ? WHERE id = ?");
        $sql->bind_param("sssiiss",$fullname, $phone, $email, $paymentStatus, $deliveryStatus, $address, $orderId);
        return $sql->execute();
    }

    public function cancelOrder($orderId) {
        $sql = parent::$connection->prepare("UPDATE `orders` SET `delivery_status` = 3 WHERE id = ?");
        $sql->bind_param("s", $orderId);
        return $sql->execute();
    }

    public function getTotalOrder()
    {
        $sql = parent::$connection->prepare("SELECT count(*) as 'total' FROM `orders`");
        return parent::select($sql)[0]['total'];
    }

    public function getAllOrderLimit($page, $perPage)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `orders` GROUP BY orders.id DESC LIMIT ?,?");
        $sql->bind_param('ii', $page, $perPage);
        return parent::select($sql);
    }

    public function getOrderByOrderId($orderId)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `orders` WHERE `id` = ?");
        $sql->bind_param("s", $orderId);
        return parent::select($sql)[0];
    }

    public function getOrderDetailByOrderId($orderId)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `order_details` WHERE `order_id` = ?");
        $sql->bind_param("s", $orderId);
        return parent::select($sql);
    }

    public function destroy($id)
    {
        $sql = parent::$connection->prepare('DELETE FROM `orders` WHERE id = ?');
        $sql->bind_param("i", $id);
        $status = $sql->execute();

        // Delete order successfully
        if ($status) {
            // Delete order details
            $sql = parent::$connection->prepare('DELETE FROM `order_details` WHERE order_id = ?');
            $sql->bind_param("i", $id);
            return $sql->execute();
        }
        return false;
    }

    public function store($orderId, $userId, $fullname, $email, $phone, $address, $paymentStatus = 0)
    {
        // Create order
        $sql = parent::$connection->prepare("INSERT INTO `orders`(`id`, `user_id`, `fullname`, `email`, `phone`, `address`, `payment_status`) VALUES (?,?,?,?,?,?,?)");
        $sql->bind_param("sissssi", $orderId, $userId, $fullname, $email, $phone, $address, $paymentStatus);
        return $sql->execute();
    }

    public function storeOrderDetails($orderId, $products)
    {
        $query = "INSERT INTO `order_details`(`order_id`, `product_id`, `quantity`) VALUES ";
        $questionMark = "(?,?,?)";
        $params = "sii";
        $data = "";

        for ($i = 0; $i < count($products) - 1; $i++) {
            $questionMark .= ",(?,?,?)";
            $params .= "sii";
        }

        foreach ($products as $product) {
            $data .= $orderId . "," . $product["id"] . "," . $product["quantity"] . ",";
        }

        $strWithoutLastChar = rtrim($data, ',');

        $sql = parent::$connection->prepare($query . $questionMark);

        $bindParams = array_merge([$params], explode(',', $strWithoutLastChar));
        $refs = [];
        foreach ($bindParams as $key => &$value) {
            $refs[$key] = &$value;
        }
        array_unshift($refs, $sql);

        call_user_func_array('mysqli_stmt_bind_param', $refs);

        return $sql->execute();
    }

    public function updatePaymentStatusToSuccess($orderId)
    {
        $sql = parent::$connection->prepare("UPDATE `orders` SET `payment_status`= 1 WHERE id = ?");
        $sql->bind_param("s", $orderId);
        return $sql->execute();
    }

    public function getOrderByUserId($userId)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `orders` WHERE `user_id` = ?");
        $sql->bind_param("i", $userId);
        return parent::select($sql);
    }
}
