<?php
require "./controller/BaseController"

$controllerName = ucfirst((strtolower($_REQUEST['controller']) ?? 'Welcome') . 'Controller');
$actionName = $_REQUEST['action'] ?? 'index';
require "./controller/${controllerName}.php";

