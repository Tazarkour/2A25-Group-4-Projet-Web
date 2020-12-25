<?PHP
	include "../controller/ActivitesC.php";

	$ServicesC=new ActivitesC();
	
	if (isset($_POST["id"])){
		$ServicesC->supprimerActivites($_POST["id"]);
		header('Location:afficherActivites.php');
	}

?>