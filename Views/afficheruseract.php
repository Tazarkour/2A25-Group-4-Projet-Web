<?PHP
	include "../controller/ActivitesC.php";


    $tri='';
    if (isset($_GET["tri"]))
    $tri=$_GET["tri"];
 
	$ActivitesC=new ActivitesC();
	$listeActivites=$ActivitesC->getActivitesByIdU($_SESSION["e"]);
	if (isset($_POST["id"]) && isset($_POST["supprimer"])){
		$ActivitesC->supprimerActivites($_POST["id"]);
		$ActivitesC->addsplaces($_POST["places"],$_POST["id"]);

	}
	if (isset($_POST["id"]) && isset($_POST["Modifier"])){
		$p=$_POST["places"]-$_POST["placesN"];
		echo $p;
		$ActivitesC->ModofierPlaces($_POST["placesN"],$_POST["id"]);
		$ActivitesC->addsplaces($p,$_POST["id_act"]);
		echo("<script>location.href = 'Act_gestion_conn.php';</script>");

	}


?>

<html>
	<head>
		<script src="../Assets/Controledesaisiejs/controleAct.js"></script>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste Utilisateurs </title>
    </head>
    <body>
		
		
		<hr>

		<table border=3 align = 'center'>
			<tr>
				<th style="text-align: center; width: 250px; font-size: 20px ">Id</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">ID_Activité</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Nom_Act</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">id_user</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Nom</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Places</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Modifier</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Supprimer</th>

			</tr>

			<?PHP
                
				foreach($listeActivites as $activites){
			?>
				<tr>
                    <form method="post" action="Act_gestion_conn.php">
					<td align = 'center'><?PHP echo $activites['id']; ?></td>
					<td align = 'center'><?PHP echo $activites['id_activites']; ?></td>
					<td align = 'center'><?PHP echo $activites['Nom_Act']; ?></td>
					<td align = 'center'><?PHP echo $activites['Id_User']; ?></td>
					<td align = 'center'><?PHP echo $activites['nom']; ?></td>
					<td align = 'center'><input value="<?PHP echo $activites['places'];?>" name="placesN" onkeyup="EnableDisable(this)"></td>
					<input name="id" value="<?PHP echo $activites['id']; ?>" hidden>
                    <td align = 'center'>
						<input type="hidden" value="<?PHP echo $activites['id']; ?>" name="id">
						<input type="hidden" value="<?PHP echo $activites['id_activites']; ?>" name="id_act">
						<input type="hidden" value="<?PHP echo $activites['places']; ?>" name="places">
						<button type="submit" name="Modifier" id="modifier" value="Modifier" class="btn btn-warning">Modifier</button>
						</form>
					</td>

					<td align = 'center'>
						<form method="POST" action="Act_gestion_conn.php">
						<input type="hidden" value="<?PHP echo $activites['id']; ?>" name="id">
						<input type="hidden" value="<?PHP echo $activites['id_activites']; ?>" name="id_act">
						<input type="hidden" value="<?PHP echo $activites['places']; ?>" name="places">
						<input type="submit" name="supprimer" value="supprimer" class="btn btn-danger">
						</form>
					</td>
					
				</tr>
			<?PHP
				}
			?>	



			
	</body>
</html>