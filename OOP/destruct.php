<?php
    
    class Demo{
        //code

        public $result = 0;
        public function multi($num1,$num2){
            $this->result = $num1 * $num2;
        }
        public function __destruct(){
        echo "This result is " . $this->result;
        }
    }

   $obj= new Demo();
   $obj->multi(2,3);
?>