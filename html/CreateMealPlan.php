<?php
session_start();


if(!isset($_SESSION["login"])) {
    $_SESSION["needLogin"] = true;
    header("Location: Login.php");
}

if(isset($_POST['antalDage'])) {
    $_SESSION['antalDage'] = $_POST['antalDage'];
    $antalDage = $_POST['antalDage'];
    if($antalDage !== "") {
        echo '<form id="createMealPlan" method="post" action="CreateMealPlan.php">';
        for($i = 0; $i < $antalDage; $i++) {
            echo    'Dag '.($i+1).'
                    <input id="recipeId'.$i.'" name="recipeId'.$i.'" placeholder="Opskrift nr">
                    <br>';
        }
        echo '<input id="createMealPlanButton" value="Opret Madplan" type="submit"></form>';
    }
}

if(isset($_POST['recipeId1'])) {
    include '../Control.php';
    $control = new Control();
    $userId = $_SESSION["userId"];
    $arrayWithAll[] = "";
    $array;
    for($i = 0; $i < $_SESSION['antalDage']; $i++) {
        if($_POST['recipeId'.$i] !== "") {
            $dayNumber = $i+1;
            $recipeId = $_POST['recipeId'.$i];
            $array = array(
                "dayNumber" => $dayNumber,
                "userId" => $userId,
                "recipeId" => $recipeId,
            );
        } else {
            $array = null;
            echo "udfyld alle felter i madplanen";
            break;
        }
        array_push($arrayWithAll, $array);
    }
    unset($arrayWithAll[0]);
    $control->createMealPlan($arrayWithAll);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Opret Madplan</title>
    </head>
    <body>
        <form id="numberOfDaysMealPlan" method="post" action="CreateMealPlan.php">
            <input id="antalDage" name="antalDage" placeholder="Madplan Længde">
            <br>
            <input id="startMealPlanButton" value="Begynd Madplan" type="submit">
        </form>
        <div><a href="../index.php">Tilbage til Forsiden</a></div>
    </body>
</html>
