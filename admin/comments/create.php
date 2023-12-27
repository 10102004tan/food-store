<?php
include '../../config/database.php';
$commentModel = new Comment();
if (isset($_POST['food_id']) && isset($_POST['username']) && isset($_POST['comment'])) {
    $productId = $_POST['food_id'];
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    if ($commentModel->addNewComment($productId, $username, $comment)) {
        $_SESSION['notify-success'] = "Comment added successfully";
    } else {
        $_SESSION['notify-fail'] = "Comment failed";
    }
} else {
    $_SESSION['notify-fail'] = "Please login first";
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
