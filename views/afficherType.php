<?PHP
	include "../controller/ServicesC.php";

	session_start();

	if(!isset($_SESSION['id'])) {
		header('Location: Login.php');
	}


	$sC = new ServicesC();
	$types = $sC->getAllTypeService();
	$count = 0;
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="s.css">
		<title> Afficher Liste Type Services </title>
    </head>
    <body>
		<button><a href="form__.php">Ajouter Type Service</a></button>
 
		<hr>
		<table border=1 align = 'center' id="services">
			<tr>
				<th>#</th>
				<th>Nom</th>
				<th>Prix</th>
				<th>Date</th>
				
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
				foreach($types as $t){
			?>
				<tr>
					<td><?PHP echo ++$count; ?></td>
				
					<td><?PHP echo $t['nom']; ?></td>
					<td><?PHP echo $t['prix']; ?></td>
					<td><?PHP echo $t['dateS']; ?></td>
					<td>
						<form method="POST" action="supprimerType.php">
						<input type="submit" name="supprimer" value="supprimer" id="supprimer" class="supprimer supprimer">
						<input type="hidden" value="<?PHP echo $t['id']; ?>" name="id">
						</form>
					</td>
					<td>
						<a href="modifierType.php?id=<?= $t['id']; ?>" id="a"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
