<?php 
	include "../controller/servicesC.php";

	if (isset($_POST['username']) and isset($_POST['password'])) {
		$sC = new ServicesC();
		$user = $sC->getLogin($_POST['username'],$_POST['password']);
		if(isset($user)) {
			session_start();
			$_SESSION['id'] = $user['id'];
			$_SESSION['Login'] = $user['Login'];
			//...
			header('Location: afficherServices.php');
		}
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
			
		</h1>
	</header>
	<body>
	<h1 class="text-center">LOGIN</h1>
	<form class="registration-form" method="POST">
		<label>
			<span class="label-text">Username</span>
			<input type="text" name="username" id="username">
		</label>
		<label>
			<span class="label-text">Password</span>
			<input type="password" name="password" id="password">
		</label>
		<div class="text-center">
			<button class="submit" name="register">LOGIN</button>
		</div>
	</form>
</div>
<script src="fo.js">
</script>
</body>
</html>