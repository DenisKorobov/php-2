<?php

namespace app\models;
use app\interfaces\IModel;
use app\interfaces\Ilog;
use app\engine\Db;


abstract class Model implements IModel, Ilog
{

    protected $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function log($str)
    {
        echo $str;
    }

    abstract public function getTableName();

    public function getOne($columnName, $value)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$columnName} = {$value}";
        return $this->db->queryOne($sql);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

}