<?php 
require_once "../config1.php"; 
require_once "../config.php"; 
function AfficherComplaints() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM complaint'
                );       
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
function Supprimer($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM Complaint WHERE id= :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }   
function Modifier($titre, $type,$desc,$id,$check) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE complaint SET  Titre=:titre, Type= :type , Message= :Message, Checked=:Checked WHERE id = :id'
                );
                $query->execute([
         'titre' => $titre,
         'type' => $type,
                    'id' => $id,
                    'Message' => $desc,
                    'Checked'=> $check
                ]);
             echo $id;
             $query->rowCount(); 
            } catch (PDOException $e) {
               echo $e->getMessage();
            }
        }             
        
function Creation_Comp ($titre,$message,$type,$id_user,$nomuser)
{
            try
              {
                $pdo = getConnexion();
                $zero=0;
                $query = $pdo->prepare(
                    'INSERT INTO complaint (Titre, Message, Type,id_user,nom_user) VALUES (:titre, :message, :type, :id_user, :nom_user)'
                );
                $query->execute([
                    'titre' => $titre,
                    'message' => $message,
                    'type' => $type,
                    'id_user' => $id_user,
                    'nom_user' => $nomuser,              
                ]);}
             catch (PDOException $e) {
                echo $e->getMessage();
            }


}