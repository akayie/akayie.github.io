<?php

    trait First {
        public $name = "Aung Aung";
        public $age = 23;
        public function one(){
            echo "This is second Trait";
        }
    }

    trait Second{
        public function two(){
            echo "This is second Trait";
        }
    }

    trait third{
        public function three(){
            echo "This is third Trait";
        }
    }

    class Person{
        use First,Second,Third;
    }

    $obj = new Person();
    echo $obj->name;

?>