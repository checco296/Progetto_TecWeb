<?php
    $host = "localhost";  
    $username = "root";
    $password = "";
    $database= "tec_progetto";
    $con = mysqli_connect($host, $username, $password,$database);
    
    if (mysqli_connect_errno()){
        header("Location: ../html/404.html");
        exit();
    }
?>