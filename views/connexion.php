
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
$post->dateS = $_POST["date"];
$post->places= $_POST["places"];
$post->email= $_POST["email"];

$ActivitesC ->connexion1($post);
/*$ActivitesC ->sendmail($post);*/
?>

