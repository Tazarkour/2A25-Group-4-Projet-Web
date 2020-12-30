
   <?php
 include "config.php";

class service
{
	public $nom;
	public $prix;
}



 function connexion($post) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO services (nom,prix)
                VALUES (:nom, :prix)'
                );
                $query->execute([
                    'nom' => $post->nom,
                    'prix' => $post->prix
                ]);
                echo "Posted Successfully";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
$post=new service ();
$post->nom= $_POST["nom"];
$post->prix= $_POST["prix"];

connexion($post);
?>
