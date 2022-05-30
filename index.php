<?php
    session_start();

    require_once "./app/init.php";

    //define root and assets
    $path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
    $path = str_replace("index.php", "", $path);
    define('ROOT', $path . "");
    define('ASSETS', ROOT . "public/assets/");

    $myApp = new App();
    //echo $_GET["url"];
?>