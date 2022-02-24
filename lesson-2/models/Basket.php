<?php

namespace app\models;
use app\models\Basket;

class Basket extends Model
{
    public $id;
    public $user;
    public $goods;

    public function getTableName()
    {
        return 'basket';
    }

}