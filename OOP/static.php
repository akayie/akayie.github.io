<?php

    class Person{
        public static function __callStatic($method, $value) {
        echo "You are trying to get method {$method} with this value";
        print_r($value);
        }

       public static function welcome(){
        echo "Welcome";
        }
    }

    Person::hello();
?>