<?php 	include "../controller/ServicesC.php";

	$ServicesC=new servicesC();
	
	if (isset($_POST["id"])){
		$ServicesC->supprimerType($_POST["id"]);
		header('Location:afficherType.php');
	}
 ?>