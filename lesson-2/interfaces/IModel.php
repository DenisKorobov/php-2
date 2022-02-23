<?php

namespace app\interfaces;

interface IModel
{
    public function getOne($columnName, $value);
    public function getAll();
    public function getTableName();
}

interface Ilog
{
    public function log($str);
}
