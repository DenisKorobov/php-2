<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{


    abstract public function getTableName();


    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id' => $id]);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert()
    {

        $tableName = $this->getTableName();

        foreach ($this as $key => $value) {

            $params[$key] = $value;

            if ($value) {
                $params[$key] = $value;
                $cols[] = "`" . $key . "`";
                $values[] = "':" . $key . "'";
            }

        }

        $cols = implode(", ", $cols);
        $values = implode(", ", $values);


        $sql = "INSERT INTO {$tableName} ({$cols}) VALUES ({$values})";

        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();

        return $this;

    }

    public function update() {}

    public function delete() {
        $id = $this->id;
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = {$id}";
        return Db::getInstance()->execute($sql);
    }

}