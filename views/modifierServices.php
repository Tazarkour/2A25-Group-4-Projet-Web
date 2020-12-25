<?php
require "../Controller/ServicesC.php";
require "../models/service.php";
$ServicesC=new ServicesC();
        if (isset($_GET['id']))
        {
        $id=$_GET['id'];
    }

    if (isset($_POST['nom']) && isset($_POST['chambre']) && isset($_POST['Numéro'])&& isset($_POST['date']) && isset($_POST['id'])) {
        $post =  new Service();
        $id=$_POST['id'];
        $post->nom_service = $_POST["nom"];
        $post->num_chambre		= $_POST["chambre"];
        $post->facture = $_POST["Numéro"];
$post->dateS= $_POST["date"];
       $ServicesC->modifierServices($post, $id);
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
		<label class="col-one-half">
			<span class="label-text">Nom_service</span>
			<input type="text" name="nom",id="nom">
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
			<span class="label-text">facture</span>
			<input type="number" name="Numéro" id="Numéro">
		</label>
		<label class="checkbox">
			<input type="checkbox" name="newsletter" >
			<span>Sign me up for the weekly newsletter.</span>
		</label>
		<div class="text-center">
      <input name="id" id="id" value="<?php echo $id ;?>" hidden>
			<button class="submit" name="register">Reserver</button>
		</div>
<script src="fo.js">
</script>
</body>
</html>
