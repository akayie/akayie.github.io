<?php

    class Person {
        public $name = "Kyaw Kyaw" ;
        public $age = 23 ;
        public function changeName($rename) { //parameter method
            $this-> name = $rename ;

        }
    }

    $obj = new Person();
    echo $obj->name;  // name Kyaw Kyaw
    echo "<br>";

    $obj->changeName("Aung Aung"); 
    echo "<br>";

    echo $obj->name; // rename value Aung Aung

?>