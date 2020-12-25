<?PHP
	include "../controller/ServicesC.php";

	$ServicesC=new servicesC();
	
	if (isset($_POST["id"])){
		$ServicesC->supprimerServices($_POST["id"]);
		header('Location:afficherServices.php');
	}

?>