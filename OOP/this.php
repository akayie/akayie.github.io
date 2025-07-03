<?php
    class Person{
        public $name="Aung Aung";
        public $age=22;
        public function changeName($changeName): void{
            $this->name="$changeName";
        }
    }

    $obj=new Person();
    echo $obj->name."<br>"; //Aung Aung
    echo $obj->changeName("Kyaw Kyaw"); 
    echo $obj->name;// Kyaw Kyaw

?>