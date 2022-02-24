<?php

use app\engine\Autoload;
use app\engine\Db;
use app\models\Goods;
use app\models\Users;
use app\interfaces\IModel;
use app\models\Basket;
use app\models\Orders;

//Подключаем автозагрузчик
include "../engine/Autoload.php";

//Регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);

//TODO используйте один экземпляр Db
$db = new Db();

//Работаем с объектами
$good = new Goods($db);

echo $good->getOne('id', 1);
echo $good->getAll();

$user = new Users($db);

echo $user->getOne('id', 1);
echo $user->getAll();

$basket = new Basket($db);

echo $basket->getOne('user', 1);
echo $basket->getAll();

$order = new Orders($db);

echo $order->getOne('id', 1);
echo $order->getAll();

function foo(IModel $model)
{
    echo $model->getTableName();
}

foo($user);

var_dump($user instanceof Db);