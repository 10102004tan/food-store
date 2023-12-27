<?php
class Comment extends Database
{

    public function getCommentByProductId($productId)
    {
        $sql = parent::$connection->prepare("SELECT * FROM product_comments WHERE product_id = ?");
        $sql->bind_param("i", $productId);
        return parent::select($sql);
    }

    public function addNewComment($productId, $username, $comment)
    {
        $sql = parent::$connection->prepare("INSERT INTO product_comments (product_id, username, comment) VALUES (?, ?, ?)");
        $sql->bind_param('iss', $productId, $username, $comment);
        return $sql->execute();
    }
}
