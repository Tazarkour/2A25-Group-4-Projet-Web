<?php

    function getConnexion1 () {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel2";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;

    
    }
?>
