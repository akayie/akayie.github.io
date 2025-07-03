<?php
    class Member{
        public $name="Kyaw Kyaw";
        public $age=23;
        public $address="Yangon";
        public function Activity(){
            echo "This is Activity";
        }

        public function doSomething(){
            echo "Do Something Method";
        }
    }
    class GoldMember extends Member{
        // public $name="Aung Aung";
        // public $age=23;
        // public $address="Yangon";
        public $gold =200;
        public function Activity(){
            $this->name = "Aung Aung";
            echo "This is OverWrite" . $this->name;
        }
    }
    //     class DiamondMember extends Member{
    //         public $name="Kyaw Kyaw";
    //         public $age=23;
    //         public $address="Yangon";
    //         public $diamond =200;
    //         public function Activity(){
    //             echo "This is Activity";
    //         }
    // }
    
    $obj = new GoldMember();
    echo $obj->name;
    echo "<br>";
    $obj->Activity();
    echo "<br>";    
    $obj-> doSomething();
?>