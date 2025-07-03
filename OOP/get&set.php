<?php

    class Person{
        public $name = "Kyaw Kyaw";
        public function __get($propertyName){
            echo "You are trying to get {$propertyName} property";
        }
        
        public function __set($propertyName,$value){
            echo "You are trying to set {$propertyName} property with this value {$value}";
        }
    }
    $obj = new Person();

    echo $obj->age;

    $obj->age = 45;
?>