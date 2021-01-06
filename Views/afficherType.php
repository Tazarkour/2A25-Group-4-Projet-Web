<?PHP
	include "../Controller/ServicesC.php";


	$sC = new ServicesC();

	if(!isset($_SESSION['e'])) {
		header('Location: Signin.php');
	}
	if (isset($_POST["supprimer"])){
		$sC->supprimerType($_POST["id"]);
		echo("<script>location.href = 'Services_Gestion.php';</script>");
	}


	$types = $sC->getAllTypeService();
	$count = 0;
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../Assets/s.css">
		<title> Afficher Liste Type Services </title>
    </head>
    <body>
		<button><a href="form__.php">Ajouter Type Service</a></button>
 
		<hr>
		<table border=1 align = 'center' id="services">
			<tr>
				<th style="text-align: center; width: 250px; font-size: 20px ">#</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Nom</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Prix</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Date</th>
				
				<th style="text-align: center; width: 250px; font-size: 20px ">supprimer</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">modifier</th>
			</tr>

			<?PHP
				foreach($types as $t){
			?>
				<tr>
					<td  align="center"><?PHP echo ++$count; ?></td>
				
					<td  align="center"><?PHP echo $t['nom']; ?></td>
					<td  align="center"><?PHP echo $t['prix']; ?></td>
					<td  align="center"><?PHP echo $t['dateS']; ?></td>
					<td  align="center">
						<form method="POST" action="Services_Gestion.php">
						<input type="submit" class="btn btn-danger" name="supprimer" value="supprimer" id="supprimer" class="supprimer supprimer">
						<input type="hidden" value="<?PHP echo $t['id']; ?>" name="id">
						</form>
					</td>
					<td  align="center">
						<a href="Service_Modifier.php?id=<?= $t['id']; ?>" id="a" class="btn btn-warning"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
