<?php

	include "../controller/roomC.php";



	$roomC1=new roomC1();

	if (isset($_POST["idroom"])){
        $roomC1->deleteroom($_POST["idroom"]);
        header('Location:showrooms.php');
    }

