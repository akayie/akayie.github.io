<?php

    class Person{
        // public $name = "Kyaw Kyaw";
        // public function __construct(){
        //     //code
        //     echo "This is construct Method";
        // }

        public $result = 0;
        public function sum($num1 , $num2){
            $this->result = $num1 + $num2;
        }

        public function __destruct(){
            //code
            echo "This sum result is " . $this->result;
        }
    }

   $obj = new Person();
   $obj->sum(22,23);

?>