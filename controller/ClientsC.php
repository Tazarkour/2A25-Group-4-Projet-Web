<?php
    require_once '../config.php';
    class ClientsC {
        public function afficherClients() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM clients'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getClientsById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM album WHERE idClients= :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getClientsByTitle($title) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM clients WHERE titre = :title'
                );
                $query->execute([
                    'title' => $title
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function connexion($clients) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO clients(nom, prenom,email ,message ) 
                VALUES (:nom, :prenom, :email,:message,1)'
                );
                $query->execute([
                    'nom' => $clients->getNom(),
                    'prenom' => $clients->getPrenom(),
                    'email' => $clients->getEmail(),
					'message' => $clients->getMessage(),
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
public function modifierClients($clients, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE clients SET email= :email, nom=:nom,prenom = :prenom, message= :message  WHERE id= :id'
                );
                $query->execute([
				 'email' => $clients->getEmail(),
				 'nom' => $clients->getNom(),
                    'prenom' => $clients->getPrenom(),
					'message' => $clients->getMessage(),
                    'id' => $id
                ]);
             echo $id;
              echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
               echo $e->getMessage();
            }
        }
        public function supprimerClients($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM clients WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function rechercherClients($title) {            
            $sql = "SELECT * from client where nom=:title"; 
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'nom' => $clients->getNom(),
                ]); 
                $result = $query->fetchAll(); 
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        
    }