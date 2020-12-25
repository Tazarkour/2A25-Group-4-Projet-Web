<?PHP
	include "../controller/ClientsC.php";

	$ClientsC=new ClientsC();
	
	if (isset($_POST["id"])){
		$ClientsC->supprimerClients($_POST["id"]);
		header('Location:afficherClients.php');
	}

?>