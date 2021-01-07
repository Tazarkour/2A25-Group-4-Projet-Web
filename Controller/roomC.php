<?php
include "../config.php";
include "../config2.php";
class roomC1
{
    function affiche()
    {


        $sql = "SELECT * FROM rooms ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);

            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function deleteroom($idroom) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'DELETE FROM rooms WHERE idroom= :idroom'
            );
            $query->execute([
                'idroom' => $idroom
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function updateroom($Room, $idroom)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE rooms SET roomtype=:roomtype, price=:price,photo=:photo,qty=:qty WHERE idroom = :idroom'
            );
            $query->execute([
                'roomtype' => $Room->getRoomtype(),
                'price' => $Room->getPrice(),
                'photo' => $Room->getPhoto(),
                'qty' => $Room->getQty(),
                'idroom' => $idroom
            ]);
            echo $query->rowCount() . " room UPDATED successfully";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getRoomsById($idroom)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'SELECT * FROM rooms WHERE idroom = :idroom'
            );
            $query->execute([
                'idroom' => $idroom
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }

    }

}