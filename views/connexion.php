 <?php
 include "config.php";

class clients
{
	public $nom;
	public $prenom;
	public $email;
	public $message;

}



 function connexion($post) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO clients (nom, prenom,email,message) 
                VALUES (:nom, :prenom, :email,:message)'
                );
                $query->execute([
                    'nom' => $post->nom,
                    'prenom' => $post->prenom,
                    'email' => $post->email,
					'message' => $post->message
                ]);
                echo "Posted Successfully";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }


$post=new clients ();
$post->nom= $_POST["nom"];
$post->prenom= $_POST["prenom"];
$post->email = $_POST["email"];
$post->message = $_POST["message"];
connexion($post);
?>

