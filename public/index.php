<?php

session_start();

$path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$path = str_replace("index.php", "", $path);

define('ROOT', $path);
define("ASSETS", $path . "assets/");

// echo ASSETS;

include "../app/core/init.php";
$app = new App();