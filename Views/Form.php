<?php session_start();?>

<!DOCTYPE HTML>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/css1/main.css">
<title>formulaire</title>

</head>

<div class="container">
	<header>
		<script src="../Assets/Controledesaisiejs/controleAct1.js"></script>
		<h1>
			<a href="#">
				<img src="../assets/assets_service/logo_web.png" alt="hotel">
			</a>
		</h1>
	</header>
	<body>
	<h1 class="text-center">Reserver activites</h1>
	<form class="registration-form" NAME="f" action="connexion.php" method="POST">
		<label class="col-one-half">
			<span class="label-text">Nom</span>
			<input value="<?php echo $_SESSION["Nom"];?>" type="text" name="nom",id="nom" disabled>

		</label>
		<label class="col-one-half">
			<span class="label-text">Activté</span>
			  <?PHP
			   include "../Model/activites.php";
 include "../Controller/ActivitesC.php";
 
$ActivitesC=new ActivitesC();
    $listeActivites=$ActivitesC->getselect();?>
                 
                 <select type="select" name="activites" id="activites" >
                         <?php foreach($listeActivites as $activites){
                    ?>
<option  value="<?php echo $activites['id']; ?>"><?php echo  $activites['nom']; ?></option> <?php } ?>
         </select>
		</label>
		<label>
			  <input value="<?php echo $activites['nom'];?>" type="text" name="Nom",id="nom" hidden>
			<span class="label-text">places</span>
			<input type="number" name="places" id="places" onkeyup="EnableDisable(this)">
		</label>
		<label>
			<span class="label-text">email</span>
			<input value="<?php echo $_SESSION["Email"];?>" type="text" name="email" id="email" disabled>
		</label>
		<label class="checkbox">
			<input type="checkbox" name="newsletter" >
			<span>Sign me up for the weekly newsletter.</span>
		</label>
		<div class="text-center">
			<button class="submit" name="register" id="submit">Reserver</button>
		</div>
	</form>
</div>
<script src="assets/js/fo.js">
</script>
</body>
</html>