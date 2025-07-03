<?php

    class Member{
        public function __construct(){
            echo "This is Member Construct Method";

       }
    }

    class GoldMember extends Member{
        public function __construct(){
            parent::__construct();
            echo "This is Gold Member Construct Method";
        }
    }

    new GoldMember();

?>