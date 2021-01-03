<?php
require "../Controller/ActivitesC.php";
require "../models/activites.php";
$ActivitesC=new ActivitesC();
        if (isset($_GET['id']))
        {
        $id=$_GET['id'];
    }

    if (isset($_POST['nom']) && isset($_POST['activites']) && isset($_POST['date'])&& isset($_POST['places']) && isset($_POST['id'])) {
        $post =  new activites();
        $id=$_POST['id'];
        $post->nom = $_POST["nom"];
        $post->activites= $_POST["activites"];
        $post->dateS = $_POST["date"];
        $post->places= $_POST["places"];
        $ActivitesC->modifierActivites($post, $id);
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
	<h1 class="text-center">Reserver activites</h1>
	<form class="registration-form" NAME="f" action="" method="POST">
		<label class="col-one-half">
			<span class="label-text">Nom</span>
			<input type="text" name="nom",id="nom">
		</label>
		<label class="col-one-half">
			<span class="label-text">activites</span>
			<input type="text" name="activites" id="activites">
		</label>
		<label>
			<span class="label-text">date</span>
			<input type="date" name="date" id="date">
		</label>
		<label>
			<span class="label-text">places</span>
			<input type="number" name="places" id="places">
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
