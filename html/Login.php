<?php
session_start();
if(isset($_SESSION["needLogin"]) === true) {
    echo "Du skal lige logge ind først";
    session_unset();
}
if(isset($_POST['username'])) {
    if($_POST['username'] !== "" && $_POST['password'] !== "") {
        $email = $_POST['username'];
        $password = $_POST['password'];
        include '../Control.php';
        $control = new Control();
        echo $control->login($email, $password);
    } else {
        echo "Udfyld alle felter";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id="login" method="post" action="Login.php">
            <input id="username" name="username" placeholder="Indtast Email">
            <br>
            <input id="password" name="password" placeholder="Indtast Kodeord">
            <br>
            <input id="loginButton" value="Log Ind" type="submit">
        </form>
        <div><a href="../index.php">Tilbage til Forsiden</a></div>
    </body>
</html>
