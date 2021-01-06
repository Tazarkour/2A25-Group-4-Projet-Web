<?PHP
	include "../Controller/ServicesC.php";
	if(!isset($_SESSION['e'])) {
		header('Location: Signin.php');
	}
$tri='';
if (isset($_GET["tri"]))
    $tri=$_GET["tri"];
	$ServicesC=new servicesC();
	$listeSevices=$ServicesC->afficherServices();
$liste=$ServicesC->getServiceByIdU($_SESSION["e"]);

	$sC = new ServicesC();
	if (isset($_POST["supprimer"])){
		$sC->supprimerServices($_POST["id"]);
		echo("<script>location.href = 'Res_Serv_Gestion.php';</script>");
	}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../Assets/s.css">
		<title> Afficher Liste Utilisateurs </title>
    </head>
    <body>
		<button><a href="form__.php">Ajouter Services</a></button>
        <a href="Res_Serv_Gestion.php?tri=AZ"> Alphabetique A-Z</a>
        <a href="Res_Serv_Gestion.php?tri=ZA"> Alphabetique Z-A</a>
        <a href="Res_Serv_Gestion.php?tri=D"> Date</a>
        <a href="Res_Serv_Gestion.php?tri=P"> Places</a>
		<hr>
		<table border=1 align = 'center' id="services">
			<tr>
				<th style="text-align: center; width: 250px; font-size: 20px ">Id Reservation</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">service</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Num chambre</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">ID Utilisateur</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Utilisateur</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">DateS</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">supprimer</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">modifier</th>
			</tr>

			<?PHP
				foreach($liste as $service){
			?>
				<tr>
					<td align="center"><?PHP echo $service['id_service']; ?></td>
					<td align="center"><?PHP $types = $sC->getAllTypeService();
					foreach ($types as $type ) {
						if($service['nom_service'] == $type['id']) {
							echo $type['nom'];
						}
					}
				 ?></td>
					<td align="center"><?PHP echo $service['num_chambre']; ?></td>
					<td align="center"><?PHP echo $service['id_user'];?>
					</td>
					<td align="center"><?PHP echo $service['Nom_User'];

					?>
					</td>
					<td align="center"><?PHP echo $service['dateS']; ?> </td>
					<td align="center">
						<form method="POST" action="Res_Serv_Gestion.php">
						<input type="submit" name="supprimer" value="supprimer" id="supprimer" class="btn btn-danger">
						<input type="hidden" value="<?PHP echo $service['id_service']; ?>" name="id" >
						</form>
					</td>
					<td align="center">
						<a href="Res_Serv_Modifier.php?id=<?= $service['id_service']; ?>" id="a" class="btn btn-warning"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
