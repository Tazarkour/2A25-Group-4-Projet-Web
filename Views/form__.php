<?php
require "../Controller/ServicesC.php";
require "../Model/service.php";

session_start();

	if(!isset($_SESSION['e'])) {
		header('Location: SIgnin.php');
	}
$ServicesC=new ServicesC();
      

    if (isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['date'])) {
       $ServicesC->addTypeService($_POST['nom'], $_POST['prix'], $_POST['date']);
       header('Location: Service_Gestion.php');
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
	<form class="registration-form" NAME="f" action="Service_Ajouter.php" method="POST">
		<label >
			<span class="label-text">Nom</span>
			<input type="text" name="nom">
		</label>
	
		<label>
			<span class="label-text">prix</span>
			<input type="number" name="prix"> 
		</label>
		<label>
			<span class="label-text">date</span>
			<input type="date" name="date"> 
		</label>
		<label class="checkbox">
			<input type="checkbox" name="newsletter" >
			<span>Sign me up for the weekly newsletter.</span>
		</label>
		<div class="text-center">
			<button class="submit" name="register">submit</button>
		</div>
<script src="fo.js">
</script>
</body>
</html>
