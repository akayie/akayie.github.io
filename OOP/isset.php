<?php

    class Person{
        public $name ="Kyaw Kyaw";
        public function __isset($something){
            echo "You are checking this property {$something} value";
        }
    }

    $obj = new Person();
    var_dump(isset($obj->name)); //property value shi ma shi sitt payy (true , false)Boolean //Kyaw Kyaw ma pr yin lae  false age so lae false

    
    //unset ka data shi ma shi thi chin isset nay yar unset thone
?>
