<?php

namespace app\models;
use app\models\Orders;

class Orders extends Model
{
    public $id;
    public $user;
    public $goods;

    public function getTableName()
    {
        return 'orders';
    }

}