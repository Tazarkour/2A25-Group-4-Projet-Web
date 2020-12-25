<?PHP
	include "../controller/ActivitesC.php";

    $tri='';
    if (isset($_GET["tri"]))
    $tri=$_GET["tri"];
 
	$ActivitesC=new ActivitesC();
	$listeActivites=$ActivitesC->afficherActivites($tri);

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste Utilisateurs </title>
    </head>
    <body>
		<button><a href="form.html">Ajouter activites</a></button>
        <a href="afficherActivites.php?tri=AZ"> Alphabetique A-Z</a>
        <a href="afficherActivites.php?tri=ZA"> Alphabetique Z-A</a>
        <a href="afficherActivites.php?tri=D"> Date</a>
        <a href="afficherActivites.php?tri=P"> Places</a>
		<hr>

		<table border=1 align = 'center'>
			<tr>
				<th>Id</th>
				<th>Nom</th>
				<th>Activites</th>
				<th>DateS</th>
				<th>Places</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
				foreach($listeActivites as $activites){
			?>
				<tr>
					<td><?PHP echo $activites['id']; ?></td>
					<td><?PHP echo $activites['nom']; ?></td>
					<td><?PHP echo $activites['activites']; ?></td>
					<td><?PHP echo $activites['dateS']; ?></td>
					<td><?PHP echo $activites['places']; ?> </td>
					<td>
						<form method="POST" action="supprimerActivites.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value="<?PHP echo $activites['id']; ?>" name="id">
						</form>
					</td>
					<td>
						<a href="modifierActivites.php?id=<?= $activites['id']; ?>"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
