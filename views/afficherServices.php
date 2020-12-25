<?PHP
	include "../controller/ServicesC.php";
$tri='';
if (isset($_GET["tri"]))
    $tri=$_GET["tri"];
	$ServicesC=new servicesC();
	$listeSevices=$ServicesC->afficherServices();
$liste=$ServicesC->afficherServices1($tri);
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="s.css">
		<title> Afficher Liste Utilisateurs </title>
    </head>
    <body>
		<button><a href="form.html">Ajouter Services</a></button>
        <a href="afficherServices.php?tri=AZ"> Alphabetique A-Z</a>
        <a href="afficherServices.php?tri=ZA"> Alphabetique Z-A</a>
        <a href="afficherServices.php?tri=D"> Date</a>
        <a href="afficherServices.php?tri=P"> Places</a>
		<hr>
		<table border=1 align = 'center' id="services">
			<tr>
				<th>Id_service</th>
				<th>Nom_service</th>
				<th>Num_chambre</th>
				<th>facture</th>
				<th>DateS</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
				foreach($liste as $service){
			?>
				<tr>
					<td><?PHP echo $service['id_service']; ?></td>
					<td><?PHP echo $service['nom_service']; ?></td>
					<td><?PHP echo $service['num_chambre']; ?></td>
					<td><?PHP echo $service['facture']; ?></td>
					<td><?PHP echo $service['dateS']; ?> </td>
					<td>
						<form method="POST" action="supprimerServices.php">
						<input type="submit" name="supprimer" value="supprimer" id="supprimer" class="supprimer supprimer">
						<input type="hidden" value="<?PHP echo $service['id_service']; ?>" name="id">
						</form>
					</td>
					<td>
						<a href="modifierServices.php?id=<?= $service['id_service']; ?>" id="a"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
