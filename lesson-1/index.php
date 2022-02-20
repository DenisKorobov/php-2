<?php

class Player {

    public $id;
    public $x;
    public $y;
    public $color;
    public $speed;
    public $hp;

    public function __construct ($id = null, $x = null, $y = null, $color = null, $speed = 100, $hp = 100) {
        $this->id = $id;
        $this->x = $x;
        $this->y = $y;
        $this->color = $color;
        $this->speed = $speed;
        $this->hp = $hp;
    }

    public function fly() {
        echo "Летит со скоростью " . $this->speed . "<br>";
        echo "Имеет " . $this->hp . " жизней<br>";
    }

}

class Warrior extends Player {

    public $attack;

    public function __construct ($id = null, $x = null, $y = null, $color = null, $speed = 100, $hp = 100, $attack = 10) {
        parent::__construct($id, $x, $y, $color, $speed, $hp);
        $this->attack = $attack;
    }

    public function attack (Player $player) {
        $player->hp -= $this->attack;
    }

    public function fly() {
       parent::fly();
       echo "И может атаковать<br>";
    }

}

class Healer extends Player {

    public $heal;

    public function __construct ($id = null, $x = null, $y = null, $color = null, $speed = 100, $hp = 100, $heal = 10) {
        parent::__construct($id, $x, $y, $color, $speed, $hp);
        $this->heal = $heal;
    }

    public function heal (Player $player) {
        $player->hp += $this->heal;
    }

    public function fly() {
       parent::fly();
       echo "И может лечить<br>";
    }

}

$player1 = new Player(1, 2, 2, "red");
$player2 = new Warrior(2, 3, 1, "green", 200);
$player3 = new Healer(3, 4, 5, "blue", 300);

function fly (Player $player) {
    $player->fly();
    echo "<br>";
}

fly($player1);
fly($player2);
fly($player3);

$player2->attack($player1);

var_dump($player1);

echo "<br>";

$player3->heal($player1);

var_dump($player1);

echo "<br><br><hr><br>";

/*** -------------------------------------------------------- */

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

$a1 = new A();
$a2 = new A();
$a1->foo(); // Выведет 1 , т.к. префикс инкремент увеличит значение на 1, потом выполнится echo.
$a2->foo(); // Выведет 2 , т.к. у статической локальной переменной присваивание выполняется только один раз, при первом вызове функции. При последующих вызовах функции вместо присваивания переменная получает сохраненное ранее значение.
$a1->foo(); // Выведет 3 , т.к. статические переменные относятся к классу, и не зависят от экземпляра класса, на котором вызываются.
$a2->foo(); // Выведет 4 , т.к. статические переменные относятся к классу, и не зависят от экземпляра класса, на котором вызываются.

echo "<br><br><hr><br>";

/*** -------------------------------------------------------- */

class B {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

class C extends B {}

$b1 = new B();
$c1 = new C();
$b1->foo(); // Выведет 1 , т.к. префикс инкремент увеличит значение на 1, потом выполнится echo.
$c1->foo(); // Выведет 1 , т.к. префикс инкремент увеличит значение на 1, потом выполнится echo. Динамические методы в PHP существуют в контексте классов, поэтому другой класс - другое значение static $x.
$b1->foo(); // Выведет 2 , т.к. у статической локальной переменной присваивание выполняется только один раз, при первом вызове функции. При последующих вызовах функции вместо присваивания переменная получает сохраненное ранее значение.
$c1->foo(); // Выведет 2 , т.к. у статической локальной переменной присваивание выполняется только один раз, при первом вызове функции. При последующих вызовах функции вместо присваивания переменная получает сохраненное ранее значение.