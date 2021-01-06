<?php
require "../Controller/ServicesC.php";
require "../Model/service.php";

	if(!isset($_SESSION['e'])) {
		header('Location: Signin.php');
	}

$ServicesC=new ServicesC();
        if (isset($_GET['id']))
        {
        $id=$_GET['id'];
    }

    if (isset($_POST['nom']) && isset($_POST['chambre'])&& isset($_POST['date']) && isset($_POST['id'])) {
        $post =  new Service();
        $id=$_POST['id'];
        $post->nom_service = $_POST["nom"];
        $post->num_chambre		= $_POST["chambre"];
$post->dateS= $_POST["date"];
       $ServicesC->modifierServices($post, $id);
      echo("<script>location.href = 'Res_Serv_Gestion.php';</script>");
    }
    $sC = new ServicesC();
	$types = $sC->getAllTypeService();
?>
<!DOCTYPE HTML>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../Assets/main.css">
<title>formulaire</title>

</head>

<div class="container">
	
	<body>
	<h1 class="text-center">Changer Service</h1>
	<form class="registration-form" NAME="f" action="Res_Serv_Modifier.php" method="POST">
		<label class="col-one-half">
			<span class="label-text">Nom_service</span>
			<select name="nom" id="nom">
				<?php foreach( $types as $type ) { ?>
 				<option value="<?php echo $type['id']; ?>"><?php echo $type['nom']; ?></option>
 				<?php } ?>
 			</select>
		</label>
		<label class="col-one-half">
			<span class="label-text">Num chambre</span>
			<input type="number" name="chambre" id="chambre">
		</label>
		<label>
			<span class="label-text">date</span>
			<input type="date" name="date" id="date">
		</label>
		
		<label class="checkbox">
			<input type="checkbox" name="newsletter" >
			<span>Sign me up for the weekly newsletter.</span>
		</label>
		<div class="text-center">
      <input name="id" id="id" value="<?php echo $id ;?>" hidden>
			<button class="submit" name="register">Reserver</button>
		</div>
<script src="../Assets/fo.js">
</script>
</body>
</html>
