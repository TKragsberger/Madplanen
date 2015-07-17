<?php
session_start();
if(!isset($_SESSION["login"])) {
    $_SESSION["needLogin"] = true;
    header("Location: Login.php");
}

if(isset($_POST['groceryName'])) {
    if($_POST['groceryName'] !== "" && $_POST['groceryInfo'] !== "") {
        $groceryName = $_POST['groceryName'];
        $groceryInfo = $_POST['groceryInfo'];
        include '../Control.php';
        $control = new Control();
        echo $control->createGrocery($groceryName, $groceryInfo);
    } else {
        echo "Der udfyld alle felter";
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Opret Vare</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id="createGrocery" method="post" action="CreateGrocery.php">
            <input id="groceryName" name="groceryName" placeholder="Vare navn">
            <br>
            <input id="groceryInfo" name="groceryInfo" placeholder="Vare information">
            <br>
            <input id="createGroceryButton" value="Opret Vare" type="submit">
        </form>
        <div><a href="../index.php">Tilbage til Forsiden</a></div>
    </body>
</html>
