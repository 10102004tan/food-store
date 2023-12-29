<?php
define("DB_HOST",'localhost');
define("DB_USER",'root');
define("DB_PASS",'');
define("DB_NAME",'food_store_db');
define("DB_CHARSET", "utf8mb4");
define("BASE_URL" , $_SERVER['DOCUMENT_ROOT'] . '/food-store/');
define('pathImage',BASE_URL . 'public/storage/');
spl_autoload_register(function ($className) {
    require_once BASE_URL . "app/models/$className.php";
});

include BASE_URL . 'helper/token_hash_helper.php';

session_start();