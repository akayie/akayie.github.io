<?php

    class Person{
        public $name = "Kyaw Kyaw";
        private $age = 23;
        public function getData() {
            echo "My name is ". $this->name . ". My age's " . $this->age;
        }
        public function getAge(){
            return $this->age;
        }
    }

    $people1 = new Person(); 
    echo $people1 -> getAge();

    // class Dog{
    //     public $name;
    //     public $age;
    //     public $color;
    // }

    // $aung_net = new Dog();
    // $aung_net -> name = "Aung Net";
    // $aung_net-> age = 23;
    // $aung_net -> color = "White";

    // $bo_kyar = new Dog();
    // $bo_kyar -> name = "Bo Kyar";
    // $bo_kyar ->age =3;
    // $bo_kyar -> color = "Black";

    // var_dump($aung_net -> name);
    // var_dump($bo_kyar -> name);

    class Dog{
        public $name = "Aung Net";
        public $age = 3;
        private $color = "white";

        public function setData($change_color){
            $color = $change_color;
        }
        public function getColor(){
            return $this -> color;
        }
    }

    $obj = new Dog();
       $obj->setData("Black");
    var_dump($obj);
?>