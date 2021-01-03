<?php

    function getConnexion1 () {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "radisson_blu";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;

    
    }
?>
