
   <?php
 include "../models/activites.php";
 include "../controller/ActivitesC.php";

/*class activites
{
	public $nom;
	public $activites;
	public $places;
	public $dateS;
	public $email;

}*/

$ActivitesC=new ActivitesC();


$post=new Activites ();
$post->nom= $_POST["nom"];
$post->activites= $_POST["activites"];
$post->places= $_POST["places"];
$post->email= $_POST["email"];
session_start();


if ($ActivitesC ->subsplaces($_POST["places"],$_POST["activites"])==1)
$ActivitesC ->connexion1($post,$_SESSION['e']);
else echo "places non restantes";

/*$ActivitesC ->sendmail($post);*/
?>

