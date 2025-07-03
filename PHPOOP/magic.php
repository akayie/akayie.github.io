<?php
    class Person{
        public $user_name = "Ag Ag";
        public $education = "Ag Ag";
        public function __get($para){
            echo "You are trying to get {$para} property";

        }

        public function __set($name,$value){
            echo "You are trying to set {$name} property in your put this value {$value}";

        }
    }

    $obj = new Person();
    $obj->age = 23;
   
    unset($obj->education);

    var_dump (isset($obj->education));

    if (isset($obj->education)){
        //code

    }

?>