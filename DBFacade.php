<?php
class DBFacade {
    
    private static $conn;
    
    public function getConnection(){
        include '../connection/Connection.php';
        if(null === static::$conn) {
            static::$conn = new Connection();
        }
        return static::$conn->getConnection();
    }
    
    public function createUser($user, $password){
        $link = $this->getConnection();
        include '../mapper/CreateUserScript.php';
        $createUser = new createUserScript();
        $result = $createUser->createUser($link, $user->getFirstName(), $user->getLastName(), $user->getEmail(), $password);
        return $result;
    } 
    
    public function getUsers() {
        $link = $this->getConnection();
        include '../mapper/GetUsersScript.php';
        $getUsers = new GetUsersScript();
        $result = $getUsers->getUsers($link);
        return $result;
    }
    
    public function createGrocery($grocery) {
        $link = $this->getConnection();
        include '../mapper/CreateGroceryScript.php';
        $createGrocery = new createGroceryScript();
        $result = $createGrocery->createGrocery($link, $grocery->getGroceryName(), $grocery->getGroceryInfo());
        return $result;
    }
    
    public function getGroceries() {
        $link = $this->getConnection();
        include '../mapper/GetGroceriesScript.php';
        $getGroceries = new GetGroceriesScript();
        $result = $getGroceries->getGroceries($link);
        return $result;
    }
    
    public function createMealPlan($mealPlanArray) {
        $link = $this->getConnection();
        include '../mapper/CreateMealPlanScript.php';
        $result = $createMealPlan = new CreateMealPlan($link, $mealPlanArray);
        return $result;
    }


    public function login($email, $password) {
        $link = $this->getConnection();
        $result = static::$conn->login($link, $email, $password);
        return $result;
    }
    
    public function logout() {
        $link = $this->getConnection();
        $result = static::$conn->logout($link);
        static::$conn->closeConnection($link);
        static::$conn = null;
        return $result;
    }
    
}
