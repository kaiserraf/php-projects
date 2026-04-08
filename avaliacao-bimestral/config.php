<?php
    $hostname = "localhost";
    $dataBase = "ra_2025105563";
    $user = "root";
    $password = "";

    $mysqli = new mysqli($hostname, $user, $password, $dataBase);

    if($mysqli -> connect_errno){
        echo "falha ao conectar(" .$mysqli->connect_errno. "(" .$mysqli->connect_errno;
    }
?>