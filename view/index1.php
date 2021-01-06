
<?php

include_once '../model/reservation.php';
include_once '../controller/reservationC.php';
include_once '../model/room.php';

session_start();
if (isset($_SESSION["e"])&& !empty($_SESSION["e"]))
{
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
        !empty($_POST["idroom"])

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
            $_POST['idroom'],
$_SESSION["e"]
        );
        $qty= $_GET["qty"];
        $idroom= $_GET["idroom"];
        $reservationC-> ajouterReservation($Reservation,$qty,$idroom,$_SESSION['e']);


        header('Location:showreservations.php');
    }
    else
        $error = "Missing information";


    $reservationC = new reservationC();
    $post=new reservationC();
   $post->firstname= $_SESSION["Nom"];
    $post->lastname= $_POST["lastname"];
    $post->date = $_POST["date"];
    $post->tel= $_POST["tel"];
   $post->adresse= $_POST["adresse"];
    $post->nbn= $_POST["nbn"];
   $post->rp= $_POST["rp"];
   $post->email= $_POST["email"];


   $reservationC ->sendmail($post);

}




?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>FormWizard_v2</title>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <!-- LINEARICONS -->
    <link rel="stylesheet" href="fonts/linearicons/style.css">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <!-- DATE-PICKER -->
    <link rel="stylesheet" href="vendor/date-picker/css/datepicker.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<div id="error">
    <?php echo $error; ?>

</div>


<body>

<h1  <?php echo $_SESSION['Nom']; echo $_SESSION['e']?></h1>


<form action="" method="POST">
<!DOCTYPE html>
<div class="wrapper" id="shadow">
    <div class="inner">
        <?php
        $search="";
        if (isset($_GET["search"]))
        {
            $search=$_GET["search"];
        }
        afficherrooms1($search);

        ?>
        <div id="wizard">



            <!-- SECTION 1 -->

            <h4>Choose Date</h4>
            <section>

                <div class="form-row">

                    <div class="form-holder">
                        <input type="text" class="form-control datepicker-here pl-85" data-language='en' data-date-format="dd - m - yyyy" id="dp1" name="date" >
                        <span class="lnr lnr-chevron-down"></span>
                        <span class="placeholder">Check in :</span>
                    </div>
                    <div class="form-holder">
                        <input type="text" class="form-control datepicker-here pl-96" data-language='en'  data-date-format="dd - m - yyyy" id="dp2">
                        <span class="lnr lnr-chevron-down"></span>
                        <span class="placeholder">Check out :</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="select">

                        <select id =nbn" name="nbn" class="form-control">
                            <option value="" style="color:white " value="" selected disabled hidden>Nights</option>
                            <option style="color: midnightblue">1 Night</option>
                            <option style="color: midnightblue" >2 Nights</option>
                            <option style="color: midnightblue" >3 Nights</option>
                            <option style="color: midnightblue" >4 Nights</option>
                            <option style="color: midnightblue">5 Nights</option>
                        </select>
                    </div>
                    <div class="select">
                        <div class="form-holder">


                        </div>
                        <select class="form-control" id =room" name="room">
                            <option value="" style="color:white " value="" selected disabled hidden>Rooms</option>
                            <option style="color: midnightblue">1 Room</option>
                            <option style="color: midnightblue" >2 Rooms</option>
                            <option style="color: midnightblue">3 Rooms</option>
                            <option style="color: midnightblue">4 Rooms</option>
                            <option style="color: midnightblue" >5 Rooms</option>
                        </select>
                    </div>
                </div>
                <button class="forward">NEXT
                    <i class="zmdi zmdi-long-arrow-right"></i>
                </button>

            </section>

            <!-- SECTION 2 -->

            <h4>Choose Room</h4>
            <section>

                <div class="form-row">

                    <div class="form-holder">

                    </div>
                    <div class="form-holder">

                    </div>
                </div>
                <div class="form-row">
                    <div class="select">

                        <select id =firstname" name="firstname" class="form-control">
                            <option value="" style="color:white " value="" selected disabled hidden>Adults</option>
                            <option style="color: midnightblue">1 Adult</option>
                            <option style="color: midnightblue" >2 Adults</option>
                            <option style="color: midnightblue" >3 Adults</option>
                            <option style="color: midnightblue" >4 Adults</option>
                            <option style="color: midnightblue">5 Adults</option>
                        </select>
                    </div>
                    <div class="select">
                        <div class="form-holder">


                        </div>

                        <select class="form-control" id ="lastname" name="lastname">
                            <option value="" style="color:white " value="" selected disabled hidden>Children</option>
                            <option style="color: midnightblue">No child</option>
                            <option style="color: midnightblue" >1 children</option>
                            <option style="color: midnightblue">2 children</option>
                            <option style="color: midnightblue">3 children</option>
                            <option style="color: midnightblue" >4 children</option>
                        </select>
                    </div>
                </div>
                <div class="form-row mb-21">
                    <div class="form-holder w-100">
                        <textarea name="rp" id="rp" class="form-control" style="height: 79px;" placeholder="Special Requirements :"></textarea>
                        <input class="form-control" type="text" value=<?PHP echo $_GET['idroom'] ;?> name="idroom" hidden >



                    </div>
                </div>
                <button class="forward">NEXT
                    <i class="zmdi zmdi-long-arrow-right"></i>
                </button>

            </section>


            <!-- SECTION 3 -->
            <h4>Make a Reservation</h4>
            <section>
                <div class="form-row">


                </div>
                <div class="form-row">

                    <div class="form-holder">

                        <input type="text" class="form-control" placeholder="Phone :" name="tel" >
                    </div>
                    <div class="form-holder">
                        <input type="text" class="form-control" placeholder="Mail :"name="email" id="email" required >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder w-100">
                        <input type="text" class="form-control" placeholder="Address :" name="adresse" id="adresse">
                    </div>
                </div>

                <div class="checkbox">
                    <label>
                        <input type="checkbox"> I have read and accept the <a href="#" >terms and conditions. </a>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <button type="submit" value="Submit">Submit</button>
            </section>

        </form>
                </div>
            </section>
        </div>
    </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>

<!-- JQUERY STEP -->
<script src="js/jquery.steps.js"></script>

<!-- DATE-PICKER -->
<script src="vendor/date-picker/js/datepicker.js"></script>
<script src="vendor/date-picker/js/datepicker.en.js"></script>

<script src="js/main.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!-- Template created and distributed by Colorlib -->
</body>
</html>

<?php
    }
    else

    header('Location:signin.php');
    ?>