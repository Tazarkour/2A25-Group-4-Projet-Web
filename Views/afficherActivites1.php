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
        <a href="Act_gestion1.php?tri=AZ" class="btn btn-success"> Alphabetique A-Z</a>
        <a href="Act_gestion1.php?tri=ZA" class="btn btn-success"> Alphabetique Z-A</a>
        <a href="Act_gestion1.php?tri=I" class="btn btn-success"> id</a>
        <a href="Act_gestion1.php?tri=P" class="btn btn-success"> Places</a>
		<hr>

		<table border=3 align = 'center'>
			<tr>
				<th style="text-align: center; width: 250px; font-size: 20px ">Id</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Nom</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Places</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Modifier</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Supprimer</th>
			</tr>

			<?PHP
                if (isset($_POST['id'])&& isset($_POST['nom']) && isset($_POST['places'])&& isset($_POST['modifier']) )
                {   
                	if (!empty($_POST['id'])&& !empty($_POST['nom']) && !empty($_POST['places'])&& !empty($_POST['modifier'])&& $_POST['places']>=0)
                    {$ActivitesC->modifierActivites1($_POST['nom'],$_POST['places'],$_POST['id']);
                    echo("<script>location.href = 'Act_gestion1.php';</script>");}
                     else echo "erreur";

                }
                if (isset($_POST['id']) && isset($_POST['supprimer']) )
                {   
                	 if (!empty($_POST['id']) && !empty($_POST['supprimer']) )
                   {
                   	$ActivitesC->supprimerActivites1($_POST["id"]);
                    echo("<script>location.href = 'Act_gestion1.php';</script>");
               		 }
               		  else echo "l'un des champs est vide";

                }    	
                if (isset($_POST['nom']) && isset($_POST['places'])&& isset($_POST['ajouter']) )
                {   
                	 if (!empty($_POST['nom']) && !empty($_POST['places'])&& !empty($_POST['ajouter']) )
                   { $ActivitesC->connexion1($_POST['nom'],$_POST['places']);
                    echo("<script>location.href = 'Act_gestion1.php';</script>");}
                    else echo "l'un des champs est vide";

                }
				foreach($listeActivites as $activites){
			?>
				<tr>
                    <form method="post" action="Act_gestion1.php">
					<td align="center"><input value= "<?PHP echo $activites['id']; ?>"name='id' disabled > </td>
					<td align="center"><input value ="<?PHP echo $activites['nom']; ?>" name='nom' ></td>
					<td align="center"><input value ="<?PHP echo $activites['places'];?>" type="number"  name= 'places' onkeyup="EnableDisable(this)"> </td>
                    <td align="center"><input type="submit" value="modifier" class="btn btn-warning" name="modifier">

						
					</td>

					<td align="center">
						<form method="POST" action="Act_gestion1.php.php">
						<input type="submit" name="supprimer" class="btn btn-danger" value="supprimer">
						<input type="hidden" value="<?PHP echo $activites['id']; ?>" name="id">
						</form>
					</td>
				</tr>
			<?PHP
				}
			?>	
			
			<br>
			<table border=1 align = 'center'>

				<br>
				<h7>Ajouter Activité</h7>
			<tr>
				<th style="text-align: center; width: 250px; font-size: 20px ">Nom</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Places</th>
				<th style="text-align: center; width: 250px; font-size: 20px ">Ajouter</th>
			</tr>
			<tr>
				<form method="post" action="Act_gestion1.php">
									
					<td align="center"><input  name='nom' type="text"></td>
					
					<td align="center"><input type="number"  name= 'places'> </td>
					<td align="center"><input type="submit" name="ajouter" class="btn btn-primary" value="Ajouter"></td>

			</tr>
		</table>
	</body>
</html>