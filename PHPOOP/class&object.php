<?php

    class Person{
        public $name = "Kyaw Zin Aung";
        public function eat(){
            echo "I want to eat Fired Chicken!";
        }
    }

    // Object
    $obj =  new Person();

    //String data
    var_dump ($obj) ; //object(Person)#1 (1) { ["name"]=> string(13) "Kyaw Zin Aung" }
    echo "<br>";
    var_dump ($obj -> name) ; //string(13) "Kyaw Zin Aung"
    echo "<br>";
    var_dump ($obj -> eat()) ; //I want to eat Fired Chicken!NULL
    
?>
