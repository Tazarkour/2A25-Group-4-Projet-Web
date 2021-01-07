<?php

include "../config2.php";



class reservationC{

    public function ajouterReservation($Reservation, $qty, $idroom, $user)
    {
        echo('hhh');
        $db = config::getConnexion();
        $sql = "INSERT INTO reservation ( idreservation,firstname, lastname, adresse,tel,email,nbn,date,room,rp,idroom,iduser)
			VALUES (:idreservation,:firstname,:lastname,:adresse,:tel,:email,:nbn,:date,:room,:rp,:idroom,:iduser)";


        $sql1 = " UPDATE rooms SET qty = :qty - 1 where idroom= :idroom";


        try {
            $query = $db->prepare($sql);
            $query1 = $db->prepare($sql1);
            $query1->execute([
                'qty' => $qty,
                'idroom' => $idroom
            ]);
            $query->execute([

                /*nom de colonne*/ 'idreservation' => $Reservation->getIdreservation(),
                'firstname' => $Reservation->getFirstname(),
                'lastname' => $Reservation->getLastname(),
                'adresse' => $Reservation->getAdresse(),
                'tel' => $Reservation->getTel(),
                'email' => $Reservation->getEmail(),
                'date' => $Reservation->getDate(),

                'nbn' => $Reservation->getNbn(),
                'room' => $Reservation->getRoom(),
                'rp' => $Reservation->getRp(),
                'idroom' => $Reservation->getIdroom(),

                'iduser' => $user


            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function afficherReservation()
    {

        $sql = "SELECT * FROM reservation ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);

            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function afficherReservationSingle($id)
    {

        $sql = "SELECT * FROM reservation WHERE iduser=$id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);

            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerReservation($idreservation, $idroom)
    {
        $sql = "DELETE FROM reservation WHERE idreservation= :idreservation";
        $sql1 = " UPDATE rooms SET qty = qty + 1 where idroom= :idroom";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req1 = $db->prepare($sql1);
        $req->bindValue(':idreservation', $idreservation);
        $req1->bindValue(':idroom', $idroom);
        try {
            $req->execute();
            $req1->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function updateReservation($Reservation, $idreservation)
    {
        try {
            echo('hhhh');
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE reservation SET idreservation=:idreservation, firstname=:firstname, lastname=:lastname, adresse=:adresse,tel=:tel,email=:email,nbn:=nbn,date=:date,room=:room,rp=:rp ,idroom=:idroom,iduser=:iduser WHERE idreservation = :idreservation"
            );
            echo "pass";
            echo
                $Reservation->getFirstname() . " "
                . $Reservation->getLastname() . " "
                . $Reservation->getAdresse() . " "
                . $Reservation->getTel() . " "
                . $Reservation->getEmail() . " "
                . $Reservation->getNbn() . " "
                . $Reservation->getDate() . " "
                . $Reservation->getRoom() . " "
                . $Reservation->getRp() . " "
                . $Reservation->getIdroom() . " "
                . $idreservation,
            $query->execute([

                'firstname' => $Reservation->getFirstname(),
                'lastname' => $Reservation->getLastname(),
                'adresse' => $Reservation->getAdresse(),
                'tel' => $Reservation->getTel(),
                'email' => $Reservation->getEmail(),
                'nbn' => $Reservation->getNbn(),
                'date' => $Reservation->getDate(),
                'room' => $Reservation->getRoom(),
                'rp' => $Reservation->getRp(),
                'idroom' => $Reservation->getIdroom(),
                'iduser' => $Reservation->getIduser(),
                'idreservation' => $_GET["idreservation"]
            ]);
            echo "pass";
            echo $query->rowCount() . " reservation UPDATED successfully";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getReservationByFirstname($firstname) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'SELECT * FROM reservation LEFT JOIN utilisateur ON utilisateur.id=reservation.iduser WHERE Prenom= :Prenom'
            );
            $query->execute([
                'Prenom' => $firstname
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function getReservationById($idreservation)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'SELECT * FROM reservation WHERE idreservation = :idreservation'
            );
            $query->execute([
                'idreservation' => $idreservation
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }


    }


    public function afficherActivites($tri)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'SELECT * FROM reservation LEFT JOIN utilisateur ON utilisateur.id=reservation.iduser LEFT JOIN rooms ON rooms.idroom=reservation.idroom '
            );
            if (isset($tri)) {
                if ($tri == "DA") {
                    $query = $db->prepare(
                        'SELECT * FROM reservation LEFT JOIN utilisateur ON utilisateur.id=reservation.iduser LEFT JOIN rooms ON rooms.idroom=reservation.idroom ORDER BY date  ASC'
                    );
                }

                if ($tri == "DS") {
                    $query = $db->prepare(
                        'SELECT * FROM reservation LEFT JOIN utilisateur ON utilisateur.id=reservation.iduser LEFT JOIN rooms ON rooms.idroom=reservation.idroom ORDER BY date  DESC '
                    );
                }
                if ($tri == "ZA") {
                    $query = $db->prepare(
                        'SELECT * FROM reservation LEFT JOIN utilisateur ON utilisateur.id=reservation.iduser LEFT JOIN rooms ON rooms.idroom=reservation.idroom ORDER BY Nom  DESC '
                    );
                }
                if ($tri == "AZ") {
                    $query = $db->prepare(
                        'SELECT * FROM reservation LEFT JOIN utilisateur ON utilisateur.id=reservation.iduser LEFT JOIN rooms ON rooms.idroom=reservation.idroom ORDER BY Nom  ASC '
                    );
                }
            }

            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
     public function afficherActivites1($tri,$id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'SELECT * FROM reservation LEFT JOIN utilisateur ON utilisateur.id=reservation.iduser LEFT JOIN rooms ON rooms.idroom=reservation.idroom  WHERE iduser=:id'
            );
            if (isset($tri)) {
                if ($tri == "DA") {
                    $query = $db->prepare(
                        'SELECT * FROM reservation LEFT JOIN utilisateur ON utilisateur.id=reservation.iduser LEFT JOIN rooms ON rooms.idroom=reservation.idroom ORDER BY date  ASC  WHERE iduser=:id'
                    );
                }

                if ($tri == "DS") {
                    $query = $db->prepare(
                        'SELECT * FROM reservation LEFT JOIN utilisateur ON utilisateur.id=reservation.iduser LEFT JOIN rooms ON rooms.idroom=reservation.idroom ORDER BY date  DESC  WHERE iduser=$id'
                    );
                }
                if ($tri == "ZA") {
                    $query = $db->prepare(
                        'SELECT * FROM reservation LEFT JOIN utilisateur ON utilisateur.id=reservation.iduser LEFT JOIN rooms ON rooms.idroom=reservation.idroom ORDER BY Nom  DESC  WHERE iduser=:id'
                    );
                }
                if ($tri == "P") {
                    $query = $db->prepare(
                        'SELECT * FROM reservation LEFT JOIN utilisateur ON utilisateur.id=reservation.iduser LEFT JOIN rooms ON rooms.idroom=reservation.idroom ORDER BY Nom  ASC  WHERE iduser=:id'
                    );
                }
            }

            $query->execute([
                'id'=>$id
            ]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function sendmail($reservation)
    {
        $headers = "From: hotelfarcha5etoile@gmail.com\r\n";
        $to = $reservation->email;
        $subject = "confirmation de reservation";
        $message = "Bonjour Mr/Mme " . $reservation->firstname . " je vous confirme qu'on a bien reçu votre reservation pour la chambre le " . $reservation->date . " pour " . $reservation->nbn . " nuits. SOYEZ LA BIENVENUE";
        if (mail($to, $subject, $message, $headers))
            echo 'Success!';
        else
            echo 'UNSUCCESSFUL...';

    }



}
class roomC
{
    function addRoom($Room)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'INSERT INTO rooms (idroom, roomtype, price,photo,qty) 
                VALUES (:idroom, :roomtype, :price,:photo,:qty)'
            );
            $query->execute([
                'idroom' => $Room->getIdroom(),
                'roomtype' => $Room->getRoomtype(),
                'price' => $Room->getPrice(),
                'photo' => $Room->getPhoto(),
                'qty' => $Room->getQty(),
            ]);
            echo "Posted Successfully";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


}

function afficherrooms($search)
{  $db = config::getConnexion();


    $sql="SELECT idroom, roomtype, price, photo,qty FROM rooms ORDER BY price DESC";
    $result = $db->query($sql);

    if (!isset($search) || $search===""){ ?>  <div class="row"> <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC))
        {

            ?>

            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h3 class="card-header" style="color: #23234A"><?php echo $row["roomtype"];?></h3>
                    <div class="card-body">
                        <div class="display-4" style="color: #23234A"><?php echo $row["price"];?>&nbsp;$</div>


                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"></li>
<div class="geeks">
                        <img class="card-img-top" src= <?php echo "../Assets/Assets_Res/img/".$row["photo"]." width="."750"." height="."300";?> >
</div>
    <li class="list-group-item">
                            <form method="GET" action="index1.php">

                                <input class="form-control" type="hidden"  name="idroom"  value="<?= $row["idroom"] ?>"/>
                                <input class="form-control" type="hidden"  name="qty"  value="<?= $row["qty"] ?>"/>
                                <button type="button" class="btn" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    &nbsp;  More details
                                </button>

                                <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                    <?php echo $row["roomtype"];?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Spend time in our 34 sqm Classic Rooms and you'll discover modern design and functionality combined to create the perfect environment in which to unwind. With an option of city and garden views the outside is just as rewarding as the inside. Sleep soundly on either a king sized or twin beds. Unwind after a long day with a relaxing bath in the luxurious bathrooms. The bathroom is also equipped with a hairdryer. There is plenty of amenities to entertain yourself including a flat screen LCD TV featuring a number of national and international TV channels, along with free Wi-Fi allowing for easy access to work, home and entertainment.
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                          <?php if($row["qty"]  > 0){  ?>
                                <button href="index1.php?idroom=<?php echo $row["idroom"]?> " name="submit" type="submit" class="btn"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                    &nbsp; Book Now</button>

                                          <?php }  ?>
                                <?php if($row["qty"]  == 0){  ?>

                                    <button href="index1.php" name="submit" type="submit" onclick="disabled=true;" class="btn disabled " ><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                        &nbsp;Book Now </button>


                                    <p> Sorry, Not available For the Time being!</p>                                <?php }  ?>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>



            <?php
        }
        ?> </div> <?php
    }
    if ($result->rowCount() ==0)
        echo "no result";















}

function afficherrooms1($search)
{  $db = config::getConnexion();


    $sql="SELECT * FROM rooms WHERE idroom=$_GET[idroom]";
    $result = $db->query($sql);

    if (!isset($search) || $search===""){ ?>  <div class="row"> <?php
    ($row = $result->fetch(PDO::FETCH_ASSOC))


        ?>
        <div class="image-holder">
            <img src= <?php echo "../Assets/Assets_Res/img/".$row["photo"]." width="."1000"." height="."400";;?>>

            <h3><?php echo $row["roomtype"];?></h3>
        </div>









        <?php
    }
    ?> </div> <?php
}

