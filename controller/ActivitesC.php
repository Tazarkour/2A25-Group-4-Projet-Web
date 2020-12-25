<?php
    require_once '../config.php';
    class ActivitesC {
        public function afficherActivites($tri) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM activites'
                );
                if (isset($tri))
                {if ($tri=="AZ")
                {$query = $pdo->prepare(
                    'SELECT * FROM activites ORDER BY nom ASC'
                );}

                    if ($tri=="ZA")
                    {$query = $pdo->prepare(
                        'SELECT * FROM activites ORDER BY nom DESC '
                    );}
                    if ($tri=="D")
                    {$query = $pdo->prepare(
                        'SELECT * FROM activites ORDER BY dateS ASC '
                    );}
                    if ($tri=="P")
                    {$query = $pdo->prepare(
                        'SELECT * FROM activites ORDER BY places ASC '
                    );}
                }

                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getActivitesById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM activites WHERE id= :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getActivitesByTitle($title) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM activites WHERE titre = :title'
                );
                $query->execute([
                    'title' => $title
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function connexion($activites) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO activites(nom, activites, places, date)
                VALUES (:nom, :activites, :places,:dateS,1)'
                );
                $query->execute([
                    'nom' => $activites->getNom(),
                    'activites' => $activites->getActivites(),
                    'places' => $activites->getPlaces(),
					'dateS' => $activites->getDateS(),
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function modifierActivites($activites, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE activites SET dateS= :date, nom=:nom,activites = :activites, places= :places WHERE id = :id'
                );
                $query->execute([
				 'date' => $activites->getDateS(),
				 'nom' => $activites->getNom(),
                    'activites' => $activites->getActivites(),
					'places' => $activites->getPlaces(),
                    'id' => $id
                ]);
             echo $id;
              echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
               echo $e->getMessage();
            }
        }

        public function supprimerActivites($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM activites WHERE id= :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function rechercherActivites($title) {
            $sql = "SELECT * from activites where titre=:title";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'activites' => $activites->getActivites(),
                ]);
                $result = $query->fetchAll();
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function sendmail($activites)
        {
            $headers = "From: istupid692@gmail.com\r\n";
            $to = $activites->email;
            $subject = "confirmation de reservation";
            $message = "Bonjour Mr/Mme ".$activites->nom." je vous confirme qu'on a bien reçu votre reservation pour l'activité ".$activites->activites." le ".$activites->dateS." pour ".$activites->places." personnes. ";
            if (mail($to, $subject, $message, $headers))
                echo 'Success!';
            else
                echo 'UNSUCCESSFUL...';

        }
        public function connexion1($post) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO activites (nom, activites,dateS,places) 
                VALUES (:nom, :activites, :dateS,:places)'
                );
                $query->execute([
                    'nom' => $post->nom,
                    'activites' => $post->activites,
                    'dateS' => $post->dateS,
                    'places' => $post->places

                ]);
                echo "Posted Successfully";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

        }

    }
