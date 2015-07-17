<?php

class Control {
    
    private $dBFacade;
    
    function __construct() {
        include '../DBFacade.php';
        $this->dBFacade = new DBFacade();
    }
    
    public function createUser($firstName, $lastName, $email, $password){
        include '../class/User.php';
        $user = new User($firstName, $lastName, $email);
        $result = $this->dBFacade->createUser($user, $password);
        return $result;
    }
    
    public function getUsers() {
        $result = $this->dBFacade->getUsers();
        return $result;
    }
    
    public function createGrocery($groceryName, $groceryInfo) {
        include '../class/Grocery.php';
        $grocery = new Grocery($groceryName, $groceryInfo);
        $result = $this->dBFacade->createGrocery($grocery);
        return $result;
    }
    
    public function getGroceries() {
        $result = $this->dBFacade->getGroceries();
        return $result;
    }
    
    public function createMealPlan($array) {
        $mealPlanArray[] = "";
        include '../class/MealPlan.php';
        foreach ($array as $meal) {
            $mealPlan = new MealPlan($meal['dayNumber'], $meal['userId'], $meal['recipeId']);
            array_push($mealPlanArray, $mealPlan);
        }
        unset($mealPlanArray[0]);
        $result = $this->dBFacade->createMealPlan($mealPlanArray);
        return $result;
    }
    
    public function login($email, $password) {
        $result = $this->dBFacade->login($email, $password);
        return $result;
    }
    
    public function logout() {
        $result = $this->dBFacade->logout();
        return $result;
    }
}
