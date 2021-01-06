<?php 
	include "../controller/servicesC.php";

	session_start();

	if(!isset($_SESSION['e'])) {
		header('Location: Signin.php');
	}

	$sC = new ServicesC();


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
	<form class="registration-form"  method="GET">
		<label>
			<span class="label-text">date</span>
			<input type="date" name="date" id="date">
		</label>
		<div class="text-center">
			<button class="submit" name="check" value="Check">Check</button>
		</div>
	</form>
	<br> <br><br><br><br>
	<br>
	<?php if (isset($_GET['date'])) { 
		$types = $sC->getTypesByDate($_GET['date']);
		foreach ($types as $key) { ?>
			<label>
			<h1><?php echo $key['nom']; ?></h1>
			<h5>prix: <?php echo $key['prix']; ?></h5>
			<h5>date: <?php echo $key['dateS']; ?></h5>
			<h5>reserver: <a href="Form_Ser.php?r=<?php echo $key['id']; ?>"><button>Book Now</button></a></h5> <br><br><br><br>
		</label>
		
	<?php }
		} ?>
</div>
<script src="fo.js">
</script>
</body>
</html>