<?PHP
	include "../controller/ActivitesC.php";


    $tri='';
    if (isset($_GET["tri"]))
    $tri=$_GET["tri"];
 
	$ActivitesC=new ActivitesC();
	$listeActivites=$ActivitesC->afficherActivites($tri);
	if (isset($_POST["id"]) && isset($_POST["supprimer"])){
		$ActivitesC->supprimerActivites($_POST["id"]);
		$ActivitesC->addsplaces($_POST["places"],$_POST["id_act"]);
		   echo("<script>location.href = 'Act_Gestion.php';</script>");

	}
	if (isset($_POST["id"]) && isset($_POST["Modifier"])){
		$p=$_POST["places"]-$_POST["placesN"];
		echo $p;
		$ActivitesC->ModofierPlaces($_POST["placesN"],$_POST["id"]);
		$ActivitesC->addsplaces($p,$_POST["id_act"]);
		echo("<script>location.href = 'Act_Gestion.php';</script>");

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
    	<form method="GET" action="Affichertoutposts.php">
  <label class="sr-only" for="search">Search</label>
            <input style="margin: 5px;" size="20" class="form-control" type="text" name="search" id="search">
            <input style="margin: 5px;"  class="btn btn-primary" type="submit" value="Search">
            </form>
		<a href="form.php" class="btn btn-primary">Ajouter activites</a>
        <a href="afficherActivites.php?tri=AZ" class="btn btn-success"> Alphabetique A-Z</a>
        <a href="afficherActivites.php?tri=ZA" class="btn btn-success"> Alphabetique Z-A</a>
        <a href="afficherActivites.php?tri=I" class="btn btn-success"> id</a>
        <a href="afficherActivites.php?tri=P" class="btn btn-success"> Places</a>
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
                    <form method="post" action="Act_gestion.php">
					<td align = 'center'><?PHP echo $activites['id']; ?></td>
					<td align = 'center'><?PHP echo $activites['id_activites']; ?></td>
					<td align = 'center'><?PHP echo $activites['Nom_Act']; ?></td>
					<td align = 'center'><?PHP echo $activites['Id_User']; ?></td>
					<td align = 'center'><?PHP echo $activites['nom']; ?></td>
					<td align = 'center'><input value="<?PHP echo $activites['places'];?>" name="placesN" type="number"  onkeyup="EnableDisable(this)"></td>
					<input name="id" value="<?PHP echo $activites['id']; ?>" hidden>
                    <td align = 'center'>
						<input type="hidden" value="<?PHP echo $activites['id']; ?>" name="id">
						<input type="hidden" value="<?PHP echo $activites['id_activites']; ?>" name="id_act">
						<input type="hidden" value="<?PHP echo $activites['places']; ?>" name="places" id='places'>
						<button type="submit" name="Modifier" id="modifier" value="Modifier" class="btn btn-warning">Modifier</button>
						</form>
					</td>

					<td align = 'center'>
						<form method="POST" action="Act_Gestion.php">
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