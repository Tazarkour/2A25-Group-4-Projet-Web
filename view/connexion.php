<?php
include "../model/reservation.php";
include "../controller/reservationC.php";
$reservationC = new reservationC();
$post=new reservationC();
$post->firstname= $_POST["firstname"];
$post->lastname= $_POST["lastname"];
$post->date = $_POST["date"];
$post->tel= $_POST["tel"];
$post->adresse= $_POST["adresse"];
$post->nbn= $_POST["nbn"];
$post->rp= $_POST["rp"];
$post->email= $_POST["email"];

$reservationC ->sendmail($post);
