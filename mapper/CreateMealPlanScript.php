<?php
class CreateMealPlan {
    function createMealPlan($link, $mealPlanArray) {
        $query = "INSERT INTO MEAL_PLAN (day_number, user_id, recipe_id) VALUES (?, ?, ?)";
        if($stmt = $link->prepare($query)) {
            foreach ($mealPlanArray as $meal) {
                $day = $meal->getDayNumber();
                $user = $meal->getUserId();
                $recipe = $meal->getRecipeId();
                $stmt->bind_param("sss", $day, $user, $recipe);
                if($stmt->execute()) {
                    $_SESSION["createMealPlan"] = true;
//                    header("Location: ../index.php");
                } else {
                    $_SESSION["createMealPlan"] = false;
                    var_dump($stmt->error);
                }
            }
        } else {
            $_SESSION["error"] = mysqli_error();
            var_dump($stmt->error);
        }
    }
}
