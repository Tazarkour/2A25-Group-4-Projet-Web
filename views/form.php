<?php
session_start();
if (isset($_SESSION ["e"])&&isset ($_POST["idservice"])) {
$id_user=$_SESSION ["e"];
$idservice=$_POST["idservice"];
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
	<form class="registration-form" NAME="f" action="connexion.php" method="POST">
		<label class="col-one-half">
			<span class="label-text">Nom Services</span>
			<input type="text" name="nom",id="nom">
		</label>
		<label class="col-one-half">
			<span class="label-text">Prix</span>
			<input type="number" name="prix" id="prix">
		</label>
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
