<?php

//Подключение автозагрузки
require "App/Config/autoload.php";
require "App/Lib/DB.php";

//Обработчик url
use App\Core\Router;
use App\Lib\DB;

$db = new DB();
define('DIR', __DIR__);

session_start();

$router = new Router();
$router->run();
