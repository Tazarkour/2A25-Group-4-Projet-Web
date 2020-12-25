<?php
require "../Controller/ClientsC.php";
require "../models/client.php";
$ClientsC=new ClientsC();
        if (isset($_GET['id']))
        {
        $id=$_GET['id'];
    }

    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])&& isset($_POST['message']) && isset($_POST['id'])) {
        $post =  new clients();
        $id=$_POST['id'];
        $post->nom = $_POST["nom"];
        $post->prenom	= $_POST["prenom"];
        $post->email = $_POST["email"];
$post->message= $_POST["message"];
       $ClientsC->modifierClients($post, $id);
    }
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <div class="wrapper">
    <form class="form" method ="post" action="">
      <div class="pageTitle title">FEEDBACK </div>
      <div class="secondaryTitle title">Saisissez le feedback</div>
      <input type="text" class="name formEntry" name="nom"  id="nom"placeholder="name" />
	    <input type="text" class="last name formEntry"name="prenom" id="prenom" placeholder="last name" />
      <input type="text" class="email formEntry" name="email" id="email" placeholder="Email"/>
	  <input type="number" class="id formEntry"  name="id"  id="id"placeholder="id"/>
      <textarea class="message formEntry"  name="message"id="message" placeholder="Message"></textarea>
      <input type="checkbox" class="termsConditions" value="Term">
      <label style="color: grey" for="terms"> I Accept the <span style="color: #0e3721">Terms of Use</span> & <span style="color: #0e3721">Privacy Policy</span>.</label><br>
	   <input name="id" id="id" value="<?php echo $id ;?>" hidden>
      <button class="submit formEntry" onclick="thanks()">Submit</button>
    </form>
  </div>
  <script src="script.js"></script>
</body>
</html>