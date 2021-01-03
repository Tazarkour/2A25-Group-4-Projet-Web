<?PHP
	include "../controller/ActivitesC.php";


    $tri='';
    if (isset($_GET["tri"]))
    $tri=$_GET["tri"];
 
	$ActivitesC=new ActivitesC();
	$listeActivites=$ActivitesC->afficherActivites($tri);
	if (isset($_POST["id"]) && isset($_POST["supprimer"])){
		$ActivitesC->supprimerActivites($_POST["id"]);
		$ActivitesC->addsplaces($_POST["places"],$_POST["id"]);

	}


?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste Utilisateurs </title>
    </head>
    <body>
		<button><a href="form.php">Ajouter activites</a></button>
        <a href="afficherActivites.php?tri=AZ"> Alphabetique A-Z</a>
        <a href="afficherActivites.php?tri=ZA"> Alphabetique Z-A</a>
        <a href="afficherActivites.php?tri=I"> id</a>
        <a href="afficherActivites.php?tri=P"> Places</a>
		<hr>

		<table border=3 align = 'center'>
			<tr>
				<th style="text-align: center; width: 250px; font-size: 20px ">Id</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">ID_Activité</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Nom_Act</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">id_user</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Nom</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Places</th>
				<th style="text-align: center; width: 250px; font-size: 20px "h>Supprimer</th>

			</tr>

			<?PHP
                
				foreach($listeActivites as $activites){
			?>
				<tr>
                    <form method="post" action="Act_gestion.php">
					<td align = 'center'><?PHP echo $activites['id']; ?></td>
					<td align = 'center'><?PHP echo $activites['id_act']; ?></td>
					<td align = 'center'><?PHP echo $activites['Nom_Act']; ?></td>
					<td align = 'center'><?PHP echo $activites['id_user']; ?></td>
					<td align = 'center'><?PHP echo $activites['nom']; ?></td>
					<td align = 'center'><?PHP echo $activites['places'];?></td>
					<input name="id" value="<?PHP echo $activites['id']; ?>" hidden>
					</form>
                    

					<td align = 'center'>
						<form method="POST" action="supprimerActivites.php">
						<input type="hidden" value="<?PHP echo $activites['id']; ?>" name="id">
						<input type="submit" name="supprimer" value="supprimer" class="btn btn-danger">
						</form>
					</td>
				</tr>
			<?PHP
				}
			?>	



			
	</body>
</html>