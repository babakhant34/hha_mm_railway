<?php
     class Model_Item{
        public $id;
        public $name;
        public $type;
        public $color;
        public $description;
        public $notes;
        public $date;
        public function __construct(){
            $this->date = new Zend_Date();
        }
     }
?>