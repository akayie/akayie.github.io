<?php

    class Person{
        public $name = "Kyaw Kyaw";
        private $name2 = "Su Su";
        public $age = 23;
        public function eat ($shop = "Inlya Lake") {
            echo  $this->name2.  " I want to eat Fired chicken from " . $shop;  //  echo  $this->name2 == Su Su (private )
           
        }
            

    }

    $obj = new Person();
    echo $obj->name; // Kyaw Kyaw
    echo "<br>";
    echo $obj->eat(" HlaeDan"); // I want to eat Fired chicken from HlaeDan

    echo "<br>";
    echo $obj->eat(); //Default function **  I want to eat Fired chicken from Inlya Lake


?>