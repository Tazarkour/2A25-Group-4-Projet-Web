<?php
    require_once '../config.php';
    class ServicesC {


        public function afficherServices1($tri) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM services'
                );
                if (isset($tri))
                {if ($tri=="AZ")
                {$query = $pdo->prepare(
                    'SELECT * FROM services ORDER BY nom ASC'
                );}

                    if ($tri=="ZA")
                    {$query = $pdo->prepare(
                        'SELECT * FROM services ORDER BY nom DESC '
                    );}
                    if ($tri=="P")
                    {$query = $pdo->prepare(
                        'SELECT * FROM services ORDER BY prix ASC '
                    );}
                }

                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function afficherServices() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM services'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getServiceById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM services WHERE idservice= :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getServiceByTitle($title) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM services WHERE titre = :title'
                );
                $query->execute([
                    'title' => $title
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function connexion($services) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO services( nom,prix)
                VALUES (:prix, :nom,1)'
                );
                $query->execute([
                    'prix' => $service->getPrix(),
                    'nom' => $service->getNom(),
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function modifierServices($service, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE services SET prix= :prix, nom=:nom WHERE idservice = :id'
                );
                $query->execute([
				          'nom' => $service->getNomService(),
                    'prix' => $service->getPrix(),
                    'id' => $id
                ]);
             echo $id;
              echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
               echo $e->getMessage();
            }
        }

        public function supprimerServices($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM services WHERE idservice = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function searchServices ($title) {
            $sql = "SELECT * from services where titre=:title";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'nomServices' => $services->getNom(),
                ]);
                $result = $query->fetchAll();
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function getselect ()
        {
            {
      try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM Services1'
                );
                $query->execute();
                return $query->fetchAll();}
             catch (PDOException $e) {
               echo $e->getMessage();
            }
}
        }

    }
