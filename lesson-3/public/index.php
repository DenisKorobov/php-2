<?php

use app\engine\Db;
use app\engine\Autoload;
use app\models\{Products,Users};

//Подключаем автозагрузчик
//TODO сформировать абсолютный путь.
include dirname(__DIR__) . DIRECTORY_SEPARATOR . "engine" . DIRECTORY_SEPARATOR . "Autoload.php";
include dirname(__DIR__) . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "config.php";

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);


//работаем с объектами

$product = new Products("Пицца", "Описание", 125);

$product->insert();
$product->delete();


$user = new Users("user", 123);
$user->insert();