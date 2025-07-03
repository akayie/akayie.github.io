<?php
    class Member{
        protected $name = "Kyaw Kyaw";
        public $age = 34;
        public $education = "B.C.Sc";
        public function something(){
            echo "Hello My Friend!";
        }
    }

    class GoldMember extends Member{
        public $gold = 10000;
    }

    class DiamondMember extends GoldMember{
        public $diamond = 20000;
        public function something(){
            //code 
            $this->name = "Aung Aung";
            echo "Overwriting Code!" .$this->name;
        }
       
        }
    

    $gold_member = new GoldMember();
    $diamond_member = new DiamondMember();
    var_dump($diamond_member-> something());

?>