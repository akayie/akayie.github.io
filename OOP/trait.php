<?php

    trait First{
        public $name="Aung Aung";
        public $age = 33;

    }
    trait Second{
        public $address="Yangon";
        public function something(){
            echo "This is trait method";
        }
    }

    class Member{
        use First, Second;

    }

    $obj = new Member();
    echo $obj->name;
?>