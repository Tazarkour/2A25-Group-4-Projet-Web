<?php
include_once '../model/reservation.php';
include_once '../model/room.php';
include_once '../controller/reservationC.php';
?>
<html>
<head>
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/modern-business.css" rel="stylesheet">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/roompagestyle.css">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    </head>
    <div class="container">
<a class="navbar-brand" href="index.html"><?php
    session_start();
    if((isset($_SESSION['Nom']))&& (isset($_SESSION['Prenom']))){
    echo " Welcome , " ;
    echo $_SESSION['Prenom'];?>&nbsp;
    <?php
    echo $_SESSION['Nom'] ;
    }

    ?></php></a>
    </div>
</nav>