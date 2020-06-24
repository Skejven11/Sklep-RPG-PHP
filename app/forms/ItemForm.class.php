<?php

namespace app\forms;

class ItemForm {
	public $name;
	public $author;
        public $publisher;
        public $price;
        public $idgenre;
        
        function checkNull() {
        foreach ($this as $key => $value) {
            if(!isset($value)) return false;
            else return true;
        }
    }
}