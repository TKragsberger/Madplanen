<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Madplanen</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        if(isset($_SESSION["login"]) === true) {
            echo    'Velkommen '.$_SESSION["name"];
            echo    '<div id="createUserLink"><a href="html/CreateUser.php">Opret bruger</a></div>
                    <div id="logoutLink"><a href="connection/Logout.php">Log ud</a></div>
                    <div id="createGroceryLink"><a href="html/CreateGrocery.php">Opret Vare</a></div>
                    <div id="getGroceries"><a href="html/GetGroceries.php">Hvis Vare</a></div>
                    <div id="getUsers"><a href="html/GetUsers.php">Hvis Brugere</a></div>
                    <div id="createMealPlan"><a href="html/CreateMealPlan.php">Opret Madplan</a></div>';
        } else {
            echo    '<div id="loginLink"><a href="html/Login.php">Log Ind</a></div>';
        }
        ?>
        
    </body>
</html>
