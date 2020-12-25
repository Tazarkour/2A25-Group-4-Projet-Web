<?PHP
	include "../controller/ClientsC.php";

	$ClientsC=new clientsC();
	$listeClients=$ClientsC->afficherClients();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste Clients</title>
    </head>
    <body>
		<button><a href="connexion.php">Ajouter Clients</a></button>
		<hr>
		<table border=1 align = 'center'>
			<tr>
				<th>Id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Email</th>
				<th>Message</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
				foreach($listeClients as $clients){
			?>
				<tr>
					<td><?PHP echo $clients['id']; ?></td>
					<td><?PHP echo $clients['nom']; ?></td>
					<td><?PHP echo $clients['prenom']; ?></td>
					<td><?PHP echo $clients['email']; ?></td>
					<td><?PHP echo $clients['message']; ?> </td>
					<td>
						<form method="POST" action="supprimerClients.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value="<?PHP echo $clients['id']; ?>" name="id">
						</form>
					</td>
					<td>
						<a href="modifierClients.php?id=<?= $clients['id']; ?>"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
