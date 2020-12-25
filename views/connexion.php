
   <?php
 include "config.php";

class service
{
	public $nom_service;
	public $num_chambre;
	public $facture;
	public $dateS;

}



 function connexion($post) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO service (nom_service, num_chambre,facture,dateS) 
                VALUES (:nom_service, :num_chambre, :facture,:dateS)'
                );
                $query->execute([
                    'nom_service' => $post->nom_service,
                    'num_chambre' => $post->num_chambre,
                    'facture' => $post->facture,
					'dateS' => $post->dateS
                ]);
                echo "Posted Successfully";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }


$post=new service ();
$post->nom_service= $_POST["nom"];
$post->num_chambre= $_POST["chambre"];
$post->facture = $_POST["Numéro"];
$post->dateS = $_POST["date"];
connexion($post);
?>

