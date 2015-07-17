<?php
session_start();
if(!isset($_SESSION["login"])) {
    $_SESSION["needLogin"] = true;
    header("Location: Login.php");
} 

if(isset($_POST['firstName'])) {
    if($_POST['firstName'] !== "" && $_POST['lastName'] !== "" && $_POST['email'] !== "" && $_POST['password'] !== "" && $_POST['passwordRepeat'] !== "") {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];
        if($password === $passwordRepeat) {
            include '../Control.php';
            $control = new Control();
            echo $control->createUser($firstName, $lastName, $email, $password);
        } else {
            echo "Koden var ikke ens";
        }
    } else {
        echo "Der udfyld alle felter";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form id="createUser" method="post" action="CreateUser.php">
            <input id="firstName" name="firstName" placeholder="Fornavn">
            <br>
            <input id="lastName" name="lastName" placeholder="Efternavn">
            <br>
            <input id="email" name="email" placeholder="Email">
            <br>
            <input id="password" name="password" placeholder="Kodeord">
            <br>
            <input id="passwordRepeat" name="passwordRepeat" placeholder="Gentag Kodeord">
            <br>
            <input id="createUserButton" value="Opret Bruger" type="submit">
        </form>
        <div><a href="../index.php">Tilbage til Forsiden</a></div>
    </body>
</html>
