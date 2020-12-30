<?php
require "../Controller/ServicesC.php";
require "../models/service.php";
$ServicesC=new ServicesC();
        if (isset($_GET['id']))
        {
        $id=$_GET['id'];
    }

    if (isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['id'])) {
        $post =  new Service();
        $id=$_POST['id'];
        $post->nom = $_POST["nom"];
        $post->prix		= $_POST["prix"];
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
	<h1 class="text-center"> Services</h1>
	<form class="registration-form" NAME="f" action="" method="POST">
		<label class="col-one-half">
			<span class="label-text">Nom_service</span>
			<input type="text" name="nom",id="nom">
		</label>
		<label class="col-one-half">
			<span class="label-text">Prix</span>
			<input type="number" name="prix" id="prix">
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
