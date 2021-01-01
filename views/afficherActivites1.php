<?PHP
	include "../controller/ActivitesC.php";

    $tri='';
    if (isset($_GET["tri"]))
    $tri=$_GET["tri"];
 
	$ActivitesC=new ActivitesC();
	$listeActivites=$ActivitesC->afficherActivites1($tri);

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste Utilisateurs </title>
    </head>
    <body>
		<button><a href="form.php">Ajouter activites</a></button>
        <a href="afficherActivites1.php?tri=AZ"> Alphabetique A-Z</a>
        <a href="afficherActivites1.php?tri=ZA"> Alphabetique Z-A</a>
        <a href="afficherActivites1.php?tri=I"> id</a>
        <a href="afficherActivites1.php?tri=P"> Places</a>
		<hr>

		<table border=1 align = 'center'>
			<tr>
				<th>Id</th>
				<th>Nom</th>
				<th>Places</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
                if (isset($_POST['id'])&& isset($_POST['nom']) && isset($_POST['places'])&& isset($_POST['modifier']) )
                {   
                    $ActivitesC->modifierActivites1($_POST['nom'],$_POST['places'],$_POST['id']);

                }
				foreach($listeActivites as $activites){
			?>
				<tr>
                    <form method="post" action="afficherActivites1.php">
					<td><input value= "<?PHP echo $activites['id']; ?>"name='id' disabled > </td>
					<td><input value ="<?PHP echo $activites['nom']; ?>" name='nom' ></td>
					<td><input value ="<?PHP echo $activites['places']; ?> "  name= 'places'> </td>
                    <td><input type="submit" value="modifier" name="modifier">

						
					</td>
					<td>
						<form method="POST" action="supprimerActivites1.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value="<?PHP echo $activites['id']; ?>" name="id">
						</form>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>