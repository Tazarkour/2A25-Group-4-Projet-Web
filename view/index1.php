
<?php

include_once '../model/reservation.php';
include_once '../controller/reservationC.php';
include_once '../model/room.php';

$error = "";

// create user
$reservationC = null;

// create an instance of the controller
$reservationC = new reservationC();
if (
    isset($_POST["firstname"]) &&
    isset($_POST["lastname"]) &&
    isset($_POST["adresse"])&&
    isset($_POST["tel"]) &&
    isset($_POST["date"])&&
isset($_POST["email"]) &&
isset($_POST["nbn"])&&
    isset($_POST["room"])&&
    isset($_POST["rp"])&&
    isset($_POST["idroom"])
) {
    if (
        !empty($_POST["firstname"]) &&
        !empty($_POST["lastname"]) &&
        !empty($_POST["adresse"])&&
        !empty($_POST["tel"])&&
        !empty($_POST["date"])&&
    !empty($_POST["email"])&&
    !empty($_POST["nbn"])&&
        !empty($_POST["room"])&&
        !empty($_POST["rp"])&&
        isset($_POST["idroom"])
    ) {
        $Reservation = new reservation(
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['adresse'],
            $_POST['date'],
            $_POST['tel'],

             $_POST['email'],
            $_POST['nbn'],
            $_POST['room'],
 $_POST['rp'],
            $_POST['idroom']

        );
        $qty= $_GET["qty"];
        $idroom= $_GET["idroom"];
        $reservationC-> ajouterReservation($Reservation,$qty,$idroom);


        header('Location:showreservations.php');
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

<div id="error">
    <?php echo $error; ?>
</div>

<form action="" method="POST"><!DOCTYPE html>
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



                            <?php
                            $search="";
                            if (isset($_GET["search"]))
                            {
                                $search=$_GET["search"];
                            }
                            afficherrooms1($search);

                            ?>


						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">

							<form>


								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">First Name</span>
											<input class="form-control" type="text" placeholder=" First Name" name="firstname" id="firstname">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Last Name</span>
											<input class="form-control" type="text" placeholder=" Last Name" name="lastname" id="lastname">
										</div>
									</div>
								</div>
                                <div class="form-group">
                                    <span class="form-label">Adress</span>
                                    <input class="form-control"  type="text" placeholder="Enter your Adresse" width="48" name="adresse" id="adresse">
                                </div>
								<div class="form-group">
									<span class="form-label">Phone Number</span>
									<input class="form-control"  type="text" placeholder="Enter your Phone Number" width="48" name="tel" >
								</div>
                                <div class="form-group">
                                    <span class="form-label">Email</span>
                                    <input class="form-control" type="email" placeholder="Enter  your Email adress " width="18" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <span class="form-label">Chek In</span>
                                    <input class="form-control" type="date"  width="48" name="date" id="date" >
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="form-label">Rooms</span>
                                            <select class="form-control" name="room">
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
                                            <select class="form-control" name="rp" >
                                                <option>Single</option>
                                                <option> Twin room</option>
                                                <option>Double room</option>
                                                <option>Triple room</option>
                                                <option>Suite</option>
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

                                            <input class="form-control" type="text" placeholder="Enter number" name="nbn">
                                            <input class="form-control" type="text" value=<?PHP echo $_GET['idroom'] ;?> name="idroom">

                                        </div>
                                    </div>

                                    </div>


                                <div class="form-btn">
                                    <button class="submit-btn">Book Now </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>