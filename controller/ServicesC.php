<?php
    require_once '../config.php';
    class ServicesC {


        public function afficherServices1($tri) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM service'
                );
                if (isset($tri))
                {if ($tri=="AZ")
                {$query = $pdo->prepare(
                    'SELECT * FROM service ORDER BY nom_service ASC'
                );}

                    if ($tri=="ZA")
                    {$query = $pdo->prepare(
                        'SELECT * FROM service ORDER BY nom_service DESC '
                    );}
                    if ($tri=="D")
                    {$query = $pdo->prepare(
                        'SELECT * FROM service ORDER BY facture ASC '
                    );}
                    if ($tri=="P")
                    {$query = $pdo->prepare(
                        'SELECT * FROM service ORDER BY num_chambre ASC '
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
                    'SELECT * FROM service'
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
                    'SELECT * FROM album WHERE idservices= :id'
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
                    'SELECT * FROM service WHERE titre = :title'
                );
                $query->execute([
                    'title' => $title
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function connexion($service) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO service(num_chambre, nom_service, facture, date)
                VALUES (:num_chambre, :facture, :nom_service,:dateS,1)'
                );
                $query->execute([
                    'num_chambre' => $service->getNum_chambre(),
                    'nom_service' => $service->getNom_Service(),
                    'facture' => $service->getFacture(),
					'dateS' => $service->getDateS(),
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function modifierServices($service, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE service SET dateS= :date, num_chambre=:num_chambre,facture = :facture, nom_service= :nom_service  WHERE id_service = :id'
                );
                $query->execute([
				 'date' => $service->getDateS(),
				 'num_chambre' => $service->getNum_chambre(),
                    'facture' => $service->getFacture(),
					'nom_service' => $service->getNom_Service(),
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
                    'DELETE FROM service WHERE id_service = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function rechercherService($title) {
            $sql = "SELECT * from service where titre=:title";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'nom_service' => $service->getNom_Service(),
                ]);
                $result = $query->fetchAll();
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }

        function getAllTypeService() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM type_service'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function addTypeService($n,$p,$d) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO type_service(nom,prix,dateS)
                VALUES (:n, :p, :d)'
                );
                $query->execute([
                    'n' => $n,
                    'p' => $p,
                    'd' => $d,
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function supprimerType($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM type_service WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getTypeById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM type_service WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function updateTypeService($id,$n,$p,$d) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE type_service SET nom = :n, prix = :p, dateS = :d  WHERE id = :id' 
                );
                $query->execute([
                    'id' => $id,
                    'n' => $n,
                    'p' => $p,
                    'd' => $d,
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getLogin($username, $password) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM utilisateur WHERE Login = :l AND Password = :p' 
                );
                $query->execute([
                    'l' => $username,
                    'p' => $password,
                ]);
                foreach ($query->fetchAll() as $key ) {
                    return $key;
                }
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getUsers() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM utilisateur'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }              
        }

        public function getTypesByDate($date) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM type_service WHERE dateS > :d' 
                );
                $query->execute([
                    'd' => $date,
                ]);
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }