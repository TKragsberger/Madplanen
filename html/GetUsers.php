<?php
session_start();
if(!isset($_SESSION["login"])) {
    $_SESSION["needLogin"] = true;
    header("Location: Login.php");
} 

include '../Control.php';
$control = new Control();
$result = $control->getUsers();
echo '<table border="1" style="width:100%"><tr><td>ID</td><td>Fornavn</td><td>Efternavn</td><td>Email</td></tr>';
while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['user_id']."</td><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['email']."</td><tr>";
}
echo "</table><br>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alle Brugere</title>
    </head>
    <body>
        <div><a href="../index.php">Tilbage til Forside</a></div>
    </body>
</html>
