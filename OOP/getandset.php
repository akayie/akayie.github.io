<?php

    class Something {
        private $name ="Kyaw Kyaw";
        public function getData() {
            return $this->name;
    }

    
    public function setData($changeName){
        $this->name=$changeName;
        }
        public function getDataUpdate() {
            return $this->name;
    }
    }
    $obj = new Something();

    echo $obj->getData();
    echo "<br>";
    echo $obj->setData("Aye Aye");
    echo "<br>";
    echo $obj->getData();
    echo "<br>";
    echo $obj->getDataUpdate();

?>