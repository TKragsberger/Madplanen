<?php
class MealPlan {
    public $dayNumber;
    public $userId;
    public $recipeId;
    
    function __construct($dayNumber, $userId, $recipeId) {
        $this->dayNumber = $dayNumber;
        $this->userId = $userId;
        $this->recipeId = $recipeId;
    }

    function getDayNumber() {
        return $this->dayNumber;
    }

    function getUserId() {
        return $this->userId;
    }

    function getRecipeId() {
        return $this->recipeId;
    }

    function setDayNumber($dayNumber) {
        $this->dayNumber = $dayNumber;
    }

    function setRecipeId($recipeId) {
        $this->recipeId = $recipeId;
    }


}
