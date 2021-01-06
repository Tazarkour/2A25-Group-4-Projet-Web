
   <?php
 include "../config.php";
session_start();
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
                    'INSERT INTO service (nom_service, num_chambre,id_user,dateS,id_user,Nom_User) 
                VALUES (:nom_service, :num_chambre, :facture,:dateS,:id_user,:Nom_User)'
                );
                $query->execute([
                    'nom_service' => $nom_service,
                    'num_chambre' => $num_chambre,
                    'facture' => $facture,
					'dateS' => $dateS,   
                    'id_user' => $iduser
                    ,'Nom_User' => $Nomuser


                ]);
                echo "Posted Successfully";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }


$post=new service ();
$nom_service= $_POST["nom"];
$num_chambre= $_POST["chambre"];
$facture = $_POST["id_user"];
$dateS = $_POST["date"];
connexion($post);
header( "refresh:5;url=Acceuil.php");

?>

