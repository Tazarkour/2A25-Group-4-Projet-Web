<?PHP
	include "../controller/ServicesC.php";
$tri='';
if (isset($_GET["tri"]))
    $tri=$_GET["tri"];
	$ServicesC=new servicesC();
	$listeServices=$ServicesC->afficherServices();
$liste=$ServicesC->afficherServices1($tri);
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="s.css">
		<title> Afficher Liste Services </title>
    </head>
    <body>
		<button><a href="form.html">Ajouter Services</a></button>
        <a href="afficherServices.php?tri=AZ"> Alphabetique A-Z</a>
        <a href="afficherServices.php?tri=ZA"> Alphabetique Z-A</a>
        <a href="afficherServices.php?tri=D"> prix</a>
		<hr>
		<table border=1 align = 'center' id="services">
			<tr>
				<th>Id Service</th>
				<th>Nom Services</th>
				<th>Prix</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
				foreach($liste as $service){
			?>
				<tr>
					<td><?PHP echo $service['idservice']; ?></td>
					<td><?PHP echo $service['nom']; ?></td>
					<td><?PHP echo $service['prix']; ?></td>
					<td>
						<form method="POST" action="supprimerServices.php">
						<input type="submit" name="supprimer" value="supprimer" id="supprimer" class="supprimer supprimer">
						<input type="hidden" value="<?PHP echo $service['idservice']; ?>" name="idservice">
						</form>
					</td>
					<td>
						<a href="modifierServices.php?id=<?= $service['idservice']; ?>" id="a"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
