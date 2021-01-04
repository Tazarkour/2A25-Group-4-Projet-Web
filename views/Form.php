<?php 
	include "../controller/servicesC.php";

	session_start();

	if(!isset($_SESSION['id'])) {
		header('Location: Login.php');
	}

	$sC = new ServicesC();
	$types = $sC->getAllTypeService();

 ?>
<!DOCTYPE HTML>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="main.css">
<title>formulaire</title>

</head>

<div class="container">
	<header>
		<h1>
			<a href="#">
				<img src="logo_web.png" alt="hotel">
			</a>
		</h1>
	</header>
	<body>
	<h1 class="text-center">Reserver Services</h1>
	<form class="registration-form" NAME="f" action="connexion.php" method="POST">
		<label class="col-one-half">
			<span class="label-text">Nom_service</span>
			<select name="nom" id="nom">
				<?php foreach( $types as $type ) { ?>
 				<option <?php 

 				if (isset($_GET['r'])) {
 					if($_GET['r'] == $type['id']) {
 						echo "selected";
 					}
 				}


 				 ?> value="<?php echo $type['id']; ?>"><?php echo $type['nom']; ?></option>
 				<?php } ?>
 			</select>
		</label>
		<label class="col-one-half">
			<span class="label-text">Num chambre</span>
			<input type="number" name="chambre" id="chambre">
		</label>
		<label>
			<span class="label-text">date</span>
			<input type="date" name="date" id="date">
		</label>
		<label>
			<input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id']; ?>">
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