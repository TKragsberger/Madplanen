<?php

class Grocery {
    public $groceryName;
    public $groceryInfo;
    
    public function __construct($groceryName, $groceryInfo) {
        $this->groceryName = $groceryName;
        $this->groceryInfo = $groceryInfo;
    }
    
    function getGroceryName() {
        return $this->groceryName;
    }

    function getGroceryInfo() {
        return $this->groceryInfo;
    }

    function setGroceryName($groceryName) {
        $this->groceryName = $groceryName;
    }

    function setGroceryInfo($groceryInfo) {
        $this->groceryInfo = $groceryInfo;
    }

}
