<?php

namespace app\models;
use app\models\Model;

class Users extends Model
{
    public $id;
    public $login;
    public $pass;

    public function getTableName()
    {
        return 'users';
    }
}