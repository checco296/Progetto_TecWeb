<?php
    $host = "127.0.0.1";  
    $user = "fferraio";
    $password = "eiGh1wooxahthohf";
    $database= "fferraio";
    $con = mysqli_connect($host, $user, $password,$database);
    
    if (mysqli_connect_errno()){
        header("Location: ../html/404.html");
        exit();
    }
?>