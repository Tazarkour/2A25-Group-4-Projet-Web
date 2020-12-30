<?php

include "../config.php";



class reservationC
{
    public function ajouterReservation($Reservation ,$qty,$idroom,$user)
    { echo('hhh');
        $db = config::getConnexion();
        $sql="INSERT INTO reservation ( idreservation,firstname, lastname, adresse,tel,email,nbn,date,room,rp,idroom,iduser)
			VALUES (:idreservation,:firstname,:lastname,:adresse,:tel,:email,:nbn,:date,:room,:rp,:idroom,:iduser)";


 $sql1=" UPDATE rooms SET qty = :qty - 1 where idroom= :idroom";



        try{
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
                'date'=>$Reservation->getDate(),

                'nbn' => $Reservation->getNbn(),
                 'room' => $Reservation->getRoom(),
                'rp' => $Reservation->getRp(),
               'idroom' => $Reservation->getIdroom(),

                 'iduser' => $user


            ]);
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
    function afficherReservation(){

        $sql="SELECT * FROM reservation ";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);

            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function supprimerReservation($idreservation,$idroom){
        $sql="DELETE FROM reservation WHERE idreservation= :idreservation";
        $sql1=" UPDATE rooms SET qty = qty + 1 where idroom= :idroom";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req1=$db->prepare($sql1);
        $req->bindValue(':idreservation',$idreservation);
        $req1->bindValue(':idroom',$idroom);
        try{
            $req->execute();
            $req1->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

 function updateReservation ($Reservation, $idreservation) {
        try { echo('hhhh');
            $db = config::getConnexion();
            $query = $db->prepare(
                "UPDATE reservation SET idreservation=:idreservation, firstname=:firstname, lastname=:lastname, adresse=:adresse,tel=:tel,email=:email,nbn:=nbn,date=:date1,room=:room,rp=:rp ,idroom=:idroom WHERE idreservation = :idreservation"
            );
            echo "pass";
            echo
                $Reservation->getFirstname()." "
                .$Reservation->getLastname()." "
                .$Reservation->getAdresse()." "
                .$Reservation->getTel()." "
                .$Reservation->getEmail()." "
                . $Reservation->getNbn()." "
                .$Reservation->getDate()." "
                .$Reservation->getRoom()." "
                .$Reservation->getRp()." "
                .$Reservation->getIdroom()." "
                .$idreservation,
            $query->execute([

                'firstname' => $Reservation->getFirstname(),
                'lastname' => $Reservation->getLastname(),
                'adresse' => $Reservation->getAdresse(),
                'tel' => $Reservation->getTel(),
                'email'=>$Reservation->getEmail(),
                'nbn' => $Reservation->getNbn(),
                'date1'=>$Reservation->getDate(),
                 'room' => $Reservation->getRoom(),
                'rp' => $Reservation->getRp(),
                  'idroom'=> $Reservation->getIdroom(),
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
                'SELECT * FROM reservation WHERE firstname = :firstname'
            );
            $query->execute([
                'firstname' => $firstname
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function getReservationById($idreservation) {
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



    public function afficherActivites($tri) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'SELECT * FROM reservation'
            );
            if (isset($tri))
            {if ($tri=="AZ")
            {$query = $db->prepare(
                'SELECT * FROM reservation ORDER BY firstname  ASC'
            );}

                if ($tri=="ZA")
                {$query = $db->prepare(
                    'SELECT * FROM reservation ORDER BY firstname DESC '
                );}
                if ($tri=="D")
                {$query = $db->prepare(
                    'SELECT * FROM reservation ORDER BY adresse ASC '
                );}
                if ($tri=="P")
                {$query = $db->prepare(
                    'SELECT * FROM reservation ORDER BY lastname ASC '
                );}
            }

            $query->execute();
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
        $message = "Bonjour Mr/Mme ".$reservation->firstname." je vous confirme qu'on a bien reçu votre reservation pour la chambre le ".$reservation->date." pour ".$reservation->nbn." nuits. SOYEZ LA BIENVENUE";
        if (mail($to, $subject, $message, $headers))
            echo 'Success!';
        else
            echo 'UNSUCCESSFUL...';

    }





}
class roomC
{
    function addRoom($Room) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'INSERT INTO rooms (idroom, roomtype, price,photo) 
                VALUES (:idroom, :roomtype, :price,:photo)'
            );
            $query->execute([
                'idroom' => $Room->getIdroom(),
                'roomtype' => $Room->getRoomtype(),
                'price' => $Room->getPrice(),
                'photo' => $Room->getPhoto(),
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
                    <h3 class="card-header" style="color: #0056b3"><?php echo $row["roomtype"];?></h3>
                    <div class="card-body">
                        <div class="display-4" style="color: #0056b3"><?php echo $row["price"];?>&nbsp;TNT</div>


                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"></li>

                        <img class="card-img-top" src= <?php echo "img/".$row["photo"]." width="."750"." height="."300";?> >
                        <li class="list-group-item">
                            <form method="GET" action="index1.php">

                                <input class="form-control" type="hidden"  name="idroom"  value="<?= $row["idroom"] ?>"/>
                                <input class="form-control" type="hidden"  name="qty"  value="<?= $row["qty"] ?>"/>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    &nbsp;  More details
                                </button>

                                <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">More details</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Modal body..
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
                                <button href="index1.php?idroom=<?php echo $row["idroom"]?> " name="submit" type="submit" class="btn btn-primary"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                    &nbsp; Book Now</button>

                                          <?php }  ?>
                                <?php if($row["qty"]  == 0){  ?>
                                    <button href="index1.php" name="submit" type="submit" onclick="disabled=true;" class="btn disabled btn-primary"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                        &nbsp;Book Now</button>


                                    <p>sorry, not available</p>                                <?php }  ?>
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
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <h1 class="card-header"><?php echo $row["roomtype"];?></h1>
                <div class="card-body">
                    <div class="display-4"><?php echo $row["price"];?></div>
                    <div class="display-4"><?php echo $row["qty"];?></div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"></li>

                    <img class="card-img-top" src= <?php echo "img/".$row["photo"]." width="."750"." height="."300";?> >

                </ul>
            </div>
        </div>









        <?php
    }
    ?> </div> <?php
}

