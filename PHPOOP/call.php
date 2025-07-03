<?php

    class Person{
        public $name = "Kyaw Kyaw";
        public function __call($name, $arguments)
        {
            echo "You are trying to call method.";
            var_dump($arguments);
        }
   
    public static function eat() {
        echo "This is static method!";
        }
    
    public static function __callStatic($name, $arguments){
        echo "You are trying to call static method ($name) <br>";
        var_dump($arguments);
    }
    }

    $obj = new Person();

    Person::eat();

    // Person::something();
    // echo $obj -> hello('Aung Aung');
