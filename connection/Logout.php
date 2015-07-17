<?php
    
    session_start();
    include '../Control.php';
    $control = new Control();
    $control->logout();
//    $control->closeConnection();
    header("Location: ../index.php");
