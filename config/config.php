<?php

define("WEBSITE_TITLE", 'MY SHOP');

//database name
define('DB_NAME', "shop_db");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_TYPE', "mysql");
define('DB_HOST', "localhost");

//define root and assets
$path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$path = str_replace("index.php", "", $path);
define('ROOT', $path . "");
define('ASSETS', ROOT . "public/assets/");

define('THEME', 'eshop/');

define('DEBUG', true);

if(DEBUG) {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}