<?php

$DBH = new PDO("mysql:host=localhost;dbname=shop", 'root', '');

$DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);



$STH = $DBH->prepare('SELECT * FROM `products` WHERE id = :id AND name = :name');

$params = [
    'id' => 1,
    'name' => 'Чай'
];
$STH->execute($params);


//$STH->setFetchMode(PDO::FETCH_ASSOC);

var_dump($STH->fetch());