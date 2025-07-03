<?php
   class  Animal{
   public $name = "Aung Net";
    public $age= 2;
    public $type ="Husky";
   }
   $obj = new Animal();
   $obi2 = new Animal();

   echo $obj->name;
   echo "<br>";

   //Method
   class Person{
    public $name="Aung Aung";
    public $age=23;
    public function shop($shopName="Lotteria"): void{ //default argument
    echo "I want to eat Fired Chicken in ".$shopName;
    }
   }
   $person_obj = new Person();
    // var_dump( $person_obj);
    echo $person_obj->shop(); //"KFC" = argument --shop("")
   

?>