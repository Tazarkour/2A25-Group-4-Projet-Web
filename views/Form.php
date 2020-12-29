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
	<h1 class="text-center">Reserver activites</h1>
	<form class="registration-form" NAME="f" action="connexion.php" method="POST">
		<label class="col-one-half">
			<span class="label-text">Nom</span>
			<input type="text" name="nom",id="nom">
		</label>
		<label class="col-one-half">
			<span class="label-text">Activté</span>
			  <?PHP
			   include "../models/activites.php";
 include "../controller/ActivitesC.php";
$ActivitesC=new ActivitesC();
    $listeActivites=$ActivitesC->getselect();?>
                   
                 <select type="select" name="activites" id="activites" >
                         <?php foreach($listeActivites as $activites){
                    ?>
<option  value="<?php echo $activites['id']; ?>"><?php echo  $activites['nom']; ?></option> <?php } ?>
         </select>
		</label>
		<label>
			<span class="label-text">date</span>
			<input type="date" name="date" id="date">
		</label>
		<label>
			<span class="label-text">places</span>
			<input type="number" name="places" id="places">
		</label>
		<label>
			<span class="label-text">email</span>
			<input type="text" name="email" id="email">
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