<?php 
	include "../controller/servicesC.php";

	session_start();

	/*if(!isset($_SESSION['e'])) {
		header('Location: Singin.php');
	}*/

	$sC = new ServicesC();
	if (isset($_GET["r"]))
	$types = $sC->getTypeById($_GET["r"]);
else $types = $sC->getTypeById($_POST["id"]);
	if (isset($_POST["chambre"]) && isset($_POST["date"]))
	{$sC->connexion($_POST["nom"],$_POST["chambre"],$_SESSION["e"],$_POST["date"],$_SESSION["Nom"]." ".$_SESSION["Prenom"],$_POST["id"]);
header("location: Acceuil.php");
}

 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../Assets/Assets_Service/main.css">
<title>formulaire</title>

</head>

<div class="container">
	<header>
		<h1>
			<a href="#">
				<img src="../Assets/Assets_Service/logo_web.png" alt="hotel">
			</a>
		</h1>
	</header>
	<body>
	<h1 class="text-center">Reserver Services</h1>
	<form class="registration-form" NAME="f" action="Form_Ser.php" method="POST">
		<label class="col-one-half">
			<?php foreach( $types as $type ) {
			$S=$type["nom"]; ?>
			<span class="label-text">Nom_service</span>
			<input value="<?php echo $type["nom"]; ?>" disabled>
			 <input name="id" id="id" value="<?php echo $type["id"]; ?>" hidden>
			<?php } ?> 	

		</label>
		<label class="col-one-half">
			<span class="label-text">Num chambre</span>
			<input type="number" name="chambre" id="chambre">
		</label>
		<label>
			<input name="nom" id="nom" value="<?php echo $S; ?>" hidden>
			<span class="label-text">date</span>
			<input type="date" name="date" id="date">
		</label>
		<label>
			<input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['e']; ?>">
		</label>
		<label class="checkbox">
			<input type="checkbox" name="newsletter" >
			<span>Sign me up for the weekly newsletter.</span>
		</label>
		<div class="text-center">
			<button class="submit" name="register">Reserver</button>
		</div>
	</form>
</div>
<script src="fo.js">
</script>
</body>
</html>