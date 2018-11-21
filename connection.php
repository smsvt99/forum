<?php

    $user = 'root';
    $password = 'root';
    $db = 'loginApp';
    $host = 'localhost';
    $port = 8889;

    $connection = mysqli_connect(
        $host,
        $user,
        $password,
        $db,
        $port);
        
?>