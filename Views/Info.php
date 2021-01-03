<?php
require_once "../Controller/BlogC.php";
require_once "../model/bloc.php";
require_once "../Controller/UserC.php";

$nmbB=count_Number_blogs();
$nmbC=count_Number_comm();
$nmb=count_Number_Users()
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Info</title>
        <script src="script.js"></script>
    </head>
<body>
  <h2>Le Nombre de Clients : <?php echo $nmb ?> </h2>
  <br>
  <h2>Le Nombre de Postes Sur Le Blog : <?php echo $nmbB ?> </h2>
  <br>
  <h2>Le Nombre de Commentaires Total : <?php echo $nmbC ?> </h2>


