<?php

namespace app\models;
use app\models\Model;

class Goods extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $image;

    public function getTableName()
    {
        return 'goods';
    }

}