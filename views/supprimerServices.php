<?PHP
	include "../controller/ServicesC.php";

	$ServicesC=new servicesC();

	if (isset($_POST["idservice"])){
		$ServicesC->supprimerServices($_POST["idservice"]);
		header('Location:afficherServices.php');
	}

?>
