<?PHP
	include "../controller/ActivitesC.php";

	$ServicesC=new ActivitesC();
	
	if (isset($_POST["id"])){
		$ServicesC->supprimerActivites1($_POST["id"]);
		header('Location:afficherActivites1.php');
	}

?>