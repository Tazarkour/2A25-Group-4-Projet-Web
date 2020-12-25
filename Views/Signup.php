<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v5 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="../Assets/css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="../Assets/fonts/font-awesome-5/css/fontawesome-all.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="../Assets/css/style.css"/>
</head>
<body class="form-v5">
	<div class="page-content">
		<div class="form-v5-content">
			<?php
			if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["Date_N"]) && isset($_POST["sexe"]) && isset($_POST["email"]) && isset($_POST["Login"]) && isset($_POST["password"]) && isset($_POST["password2"])) 
			{ 
				$User=new user($_POST["nom"],$_POST["prenom"],$_POST["sexe"],$_POST["email"],$_POST["Date_N"],$_POST["Login"],$_POST["password"]);
				if ($_POST["password"]!=$_POST["password^2"])
					echo "Les deux mot de passes sont differents";
				else
				{
					Check_Info ($User->email,$User->login);
					if (Check_Info ($User->email,$User->login))
					{
 						create_user($user);
 						header("Register_Success.html");
					}
				}
			} 
			?>
			<form class="form-detail" action="Signup.php" method="post">
				<h2>Register Account Form</h2>
				<div class="form-row">
					<label for="full-name">Nom</label>
					<input type="text" name="nom" id="nom" class="input-text" placeholder="Nom" required>
					<i class="fas fa-user"></i>
				</div>
				<div class="form-row">
					<label for="full-name">Prénom</label>
					<input type="text" name="prenom" id="prenom" class="input-text" placeholder="Prénom" required>
					<i class="fas fa-user"></i>
				</div>
				<div class="form-row">
					<label for="full-name" name="sexe" id="sexe">Sexe</label>
					<select class="input-text">
					<option value="Femme">Femme</option>
 					<option value="Homme">Homme</option>
 				</select>
				</div>
				<div class="form-row">
					<label for="your-email">Email</label>
					<input type="text" name="email" id="email" class="input-text" placeholder="Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<label for="your-email">Date De Naissance</label>
					<input type="date" name="Date_N" id="Date_N" class="input-date" >
				</div>
				<br>
				<div class="form-row">
					<label for="full-name">Login</label>
					<input type="text" name="Login" id="Login" class="input-text" placeholder="Login" required>
					<i class="fas fa-user"></i>
				</div>
				<div class="form-row">
					<label for="password">Mot de Passe</label>
					<input type="password" name="password" id="password" class="input-text" placeholder="Mot de Passe" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row">
					<label for="password">Confirmer Votre Mot De passe</label>
					<input type="password" name="password2" id="password2" class="input-text" placeholder="Confirmer Votre Mot De passe" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register">
				</div>
			</form>
		</div>
	</div>
</body>
</html>