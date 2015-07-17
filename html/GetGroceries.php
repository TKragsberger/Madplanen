<?php
session_start();
if(!isset($_SESSION["login"])) {
    $_SESSION["needLogin"] = true;
    header("Location: Login.php");
} 

include '../Control.php';
$control = new Control();
$result = $control->getGroceries();
echo '<table border="1" style="width:100%"><tr><td>ID</td><td>Vare Navn</td><td>Vare Info</td></tr>';
while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['groceries_id']."</td><td>".$row['groceries_item_name']."</td><td>".$row['groceries_info']."</td><tr>";
}
echo "</table><br>";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alle Vare</title>
    </head>
    <body>
        <div><a href="../index.php">Tilbage til Forside</a></div>
    </body>
</html>
