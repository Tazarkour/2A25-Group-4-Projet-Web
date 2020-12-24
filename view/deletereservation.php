
<?php
include '../controller/reservationC.php';
$reservationC=new reservationC();

if (isset($_POST["idreservation"])&&($_POST["idroom"])){
    $reservationC->supprimerReservation($_POST["idreservation"],$_POST["idroom"]);
    header('Location:showreservations.php');
}

