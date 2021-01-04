<?php
require "../Controller/ServicesC.php";
require "../models/service.php";
$ServicesC=new ServicesC();
    if (!isset($_GET['id'])) {
    	header('Location: afficherType.php');
    }
   	$type = $ServicesC->getTypeById($_GET['id']);  

    if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prix'])&& isset($_POST['date'])) {
       $ServicesC->updateTypeService($_POST['id'],$_POST['nom'], $_POST['prix'], $_POST['date']);
       header('Location: afficherType.php');
    }
    
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
	<form class="registration-form" NAME="f" action="" method="POST">
		<input type="hidden" name="id" value="<?php echo $type['id']; ?>">
		<label >
			<span class="label-text">Nom</span>
			<input type="text" name="nom" value="<?php echo $type['nom']; ?>">
		</label>
	
		<label>
			<span class="label-text">prix</span>
			<input type="number" name="prix" value="<?php echo $type['prix']; ?>"> 
		</label>
		<label>
			<span class="label-text">date</span>
			<input type="date" name="date" value="<?php echo $type['dateS']; ?>"> 
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
