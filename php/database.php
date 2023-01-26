<?php
    $host = "localhost";  
    $user = "root";
    $password = "";
    $database= "tec_progetto";
    $con = mysqli_connect($host, $user, $password,$database);
    
    if (mysqli_connect_errno()){
        header("Location: ../html/404.html");
        exit();
    }
?>