
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
session_start();

$Activite=$ActivitesC->getact($_POST["activites"]);
foreach ($Activite as $activites)
{if ($ActivitesC ->subsplaces($_POST["places"],$_POST["activites"])==1)
$ActivitesC ->connexion($_SESSION['e'],$_SESSION['Nom']." ".$_SESSION['Prenom'],$_POST["places"],$_POST["activites"],$activites["nom"]);
else echo "places non restantes";
}
/*$ActivitesC ->sendmail($post);*/
?>

