<?php

    require_once '../controller/reservationC.php';
    require_once '../model/reservation.php';

$reservationC = new reservationC();
if (isset($_GET["idreservation"]))
    $idreservation=$_GET["idreservation"];
$error = "";
if (
    isset($_POST["firstname"]) &&
    isset($_POST["lastname"]) &&
    isset($_POST["adresse"])&&
    isset($_POST["tel"]) &&
    isset($_POST["date"]) &&

    isset($_POST["email"]) &&
    isset($_POST["nbn"])&&
    isset($_POST["room"])&&
    isset($_POST["rp"])
) {
    if (
        !empty($_POST["firstname"]) &&
        !empty($_POST["lastname"]) &&
        !empty($_POST["adresse"])&&
        !empty($_POST["tel"])&&
        empty($_POST["date"])&&
        !empty($_POST["email"])&&
        !empty($_POST["nbn"])&&
        !empty($_POST["room"])&&
        !empty($_POST["rp"])
    ) {
        $Reservation = new reservation(
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['adresse'],
            $_POST['tel'],
            $_POST['date'],
            $_POST['email'],
            $_POST['nbn'],
            $_POST['room'],
            $_POST['rp']


        );
       $idreservation=$_POST["idreservation"];
        $reservationC->updateReservation($Reservation, $idreservation);
        //header('refresh:5;url=showreservations.php');
    }

    else
        $error = "Missing information";

}




?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
<body>
<a class="btn btn-info" href="showreservations.php">Back</a>
<hr>



<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>Booking Form HTML Template</title>

        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="css/style.css" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <!--   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>

    <body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-push-5">
                        <div class="booking-cta">
                            <h1>Make your reservation</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam consectetur molestias itaque
                                ad sint fugit architecto incidunt iste culpa perspiciatis possimus voluptates aliquid consequuntur cumque quasi.
                                Perspiciatis.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-7">
                        <div class="booking-form">
                            <form method="POST" action="">
                                <a href = "searchreservation.php" class="btn btn-primary shop-item-button">Search</a>
                                <?php
                                if (isset($_GET['idreservation'])) {
                                $result = $reservationC->getReservationById($_GET['idreservation']);
                                if ($result !== false) {
                                ?>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="form-label">First Name</span>
                                            <input class="form-control" type="text" placeholder=" First Name" name="firstname" id="firstname"  value="<?= $result['firstname'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="form-label">Last Name</span>
                                            <input class="form-control" type="text" placeholder=" Last Name" name="lastname" id="lastname"value="<?= $result['lastname'] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="form-label">Phone Number</span>
                                    <input class="form-control"  type="text" placeholder="Enter your Phone Number" width="48" name="tel" id="tel" value="<?= $result['tel'] ?>">
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Adress</span>
                                    <input class="form-control"  type="text" placeholder="Enter your Phone Adresse" width="48" name="adresse" id="adresse" value="<?= $result['adresse'] ?>">
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Chek In</span>
                                    <input class="form-control"  type="date"  width="48" name="date" id="date" value="<?= $result['date'] ?>">
                                </div>
                                <input id="idreservation" name="idreservation" value="<?php echo $idreservation ?>" hidden>
                                <div class="form-group">
                                    <span class="form-label">Email</span>
                                    <input class="form-control" type="email" placeholder="Enter  your Email adress " width="18" name="email" id="email" value="<?= $result['email'] ?>">
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="form-label">Rooms</span>
                                        
                                            <select class="form-control" name="room" value="<?= $result['room'] ?>">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <span class="form-label">Room Preference</span>
                                                <select class="form-control"  name='rp'value="<?= $result['rp'] ?>" >
                                                    <option >Single</option>
                                                    <option > Twin room</option>
                                                    <option >Double room</option>
                                                    <option  >Triple room</option>
                                                    <option value="Suite">Suite</option>
                                                </select>
                                                <span class="select-arrow"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="form-label">Adults</span>
                                            <select class="form-control" >
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>



                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="form-label">Children</span>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>



                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="form-label">Number of nights</span>

                                            <input class="form-control" type="text" placeholder="Enter number" name="nbn"value="<?= $result['nbn'] ?>">

                                        </div>
                                    </div>

                                </div>


                                <div class="form-btn">
                                    <input type="submit" value="modifier" name="modifier">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    }
    else {
        header('Location:showreservations.php');
    }
    ?>
    </body>

    </html>