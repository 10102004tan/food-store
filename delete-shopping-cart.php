<?php
include 'config/database.php';

if (isset($_SESSION['cart'])) {
    if ($_GET["id"]) {
        unset($_SESSION['cart'][$_GET["id"]]);
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
