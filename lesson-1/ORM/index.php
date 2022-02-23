<?php

class Db {

    protected $tableName;
    protected $wheres = [];

    public function table($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->tableName}";
        if (!empty($this->wheres)) {
            $sql .= " WHERE ";
            foreach ($this->wheres as $value) {
                $sql .= $value['field'] . " = " . $value['value'];
                if ($value != end($this->wheres)) $sql .= " AND ";
            }

        }
        return $sql . "<br>";
    }

    public function getOne($id) {
        return "SELECT * FROM {$this->tableName} WHERE id = {$id} <br>";
    }

    public function where($field, $value) {
        $this->wheres[] = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }

    public function cleanObject() {
        $this->tableName = null;
        $this->wheres = null;
    }

    public function andWhere($field, $value) {
        return $this->where($field, $value);
    }

}

$db = new Db();

echo $db->table('goods')->getAll();
$db->cleanObject();

echo $db->table('goods')->getOne(1);
$db->cleanObject();

echo $db->table('user')->getOne(2);
$db->cleanObject();

echo $db->table('user')->where('name', 'admin')->where('session', 123)->getAll();
$db->cleanObject();

echo $db->table('product')->where('name', 'Alex')->where('session', 123)->where('id', 5)->getAll();
$db->cleanObject();

echo $db->table('product')->where('name', 'Alex')->andWhere('session', 123)->andWhere('id', 5)->getAll();
$db->cleanObject();