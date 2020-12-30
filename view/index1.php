
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
    isset($_POST["idroom"])&&
isset($_POST["iduser"])
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
        !empty($_POST["idroom"])&&
    !empty($_POST["iduser"])
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
$_POST['iduser']
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
   $post->firstname= $_POST["firstname"];
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
<html>
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
    <link rel="stylesheet" href="css/style1.css">
</head>
<div id="error">
    <?php echo $error; ?>

</div>


<body>

<h1  <?php echo $_SESSION['Nom']; echo $_SESSION['e']?></h1>


<form action="" method="POST">
<!DOCTYPE html>
<div class="wrapper">
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

                        <select id =rp" name="rp" class="form-control">
                            <option style="color: midnightblue">1 Night</option>
                            <option style="color: midnightblue" >2 Night</option>
                            <option style="color: midnightblue" >3 Night</option>
                            <option style="color: midnightblue" >4 Night</option>
                            <option style="color: midnightblue">5 Night</option>
                        </select>
                    </div>
                    <div class="select">
                        <div class="form-holder">

                            <span class="lnr lnr-chevron-down"></span>
                        </div>
                        <select class="form-control id =room" name="room">
                            <option rel="1 Room">1 Room</option>
                            <option rel="2 Room">2 Room</option>
                            <option rel="3 Room">3 Room</option>
                            <option rel="4 Room">4 Room</option>
                            <option rel="5 Room">5 Room</option>
                        </select>
                    </div>
                </div>
                <button class="forward">NEXT
                    <i class="zmdi zmdi-long-arrow-right"></i>
                </button>

            </section>

            <!-- SECTION 2 -->
            <h4>Choose Room</h4>
            <section class="section-style">
                <div class="board-wrapper">
                    <div class="board-inner">
                        <div class="board-item">
                            Room 1 :
                            <span>Small Room</span>
                        </div>
                        <div class="board-item">
                            Room 2 :
                            <span>Luxury Room</span>
                        </div>
                        <div class="board-line">
                            <div class="board-item">
                                Adult :
                                <span>2</span>
                            </div>
                            <div class="board-item">
                                Childern :
                                <span>0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-wrapper">
                    <div class="form-row">
                        <div class="form-holder w-100">
                            <input type="text" class="form-control datepicker-here" '  id="dp3">
                            <span class="lnr lnr-calendar-full"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder w-100">
                            <input type="text" class="form-control datepicker-here" data-language='en' data-date-format="dd M yyyy" id="dp4">
                            <span class="lnr lnr-calendar-full"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Room 1 :</label>
                        <div class="form-row">
                            <div class="select mr-20">
                                <div class="form-holder">
                                    <div class="select-control">1 Adult</div>
                                    <span class="lnr lnr-chevron-down"></span>
                                </div>
                                <ul class="dropdown">
                                    <li rel="1 Adult">1 Adult</li>
                                    <li rel="2 Adults">2 Adults</li>
                                    <li rel="3 Adults">3 Adults</li>
                                </ul>
                            </div>

                            <div class="select">
                                <div class="form-holder">
                                    <div class="select-control">No Child</div>
                                    <span class="lnr lnr-chevron-down"></span>
                                </div>
                                <ul class="dropdown">
                                    <li rel="1 Room">No Child</li>
                                    <li rel="1 Child">1 Child</li>
                                    <li rel="2 Children">2 Children</li>
                                    <li rel="3 Children">3 Children</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Room 2 :</label>
                        <div class="form-row">
                            <div class="select mr-20">
                                <div class="form-holder">
                                    <div class="select-control">1 Adult</div>
                                    <span class="lnr lnr-chevron-down"></span>
                                </div>
                                <ul class="dropdown">
                                    <li rel="1 Adult">1 Adult</li>
                                    <li rel="2 Adults">2 Adults</li>
                                    <li rel="3 Adults">3 Adults</li>
                                </ul>
                            </div>

                            <div class="select">
                                <div class="form-holder">
                                    <div class="select-control">No Child</div>
                                    <span class="lnr lnr-chevron-down"></span>
                                </div>
                                <ul class="dropdown">
                                    <li rel="1 Room">No Child</li>
                                    <li rel="1 Child">1 Child</li>
                                    <li rel="2 Children">2 Children</li>
                                    <li rel="3 Children">3 Children</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <button class="forward">NEXT
                        <i class="zmdi zmdi-long-arrow-right"></i>
                    </button>
                </div>

            </section>

            <!-- SECTION 3 -->
            <h4>Make a Reservation</h4>
            <section>
                <div class="form-row">
                    <div class="form-holder">
                        <input type="text" class="form-control" placeholder="First Name :" name="firstname" id="firstname">
                    </div>
                    <div class="form-holder">
                        <input type="text" class="form-control" placeholder="Last Name :"name="lastname" id="lastname">
                    </div>
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
                <div class="form-row mb-21">
                    <div class="form-holder w-100">
                        <textarea name="nbn" id="nbn" class="form-control" style="height: 79px;" placeholder="Special Requirements :"></textarea>
                        <input class="form-control" type="text" value=<?PHP echo $_GET['idroom'] ;?> name="idroom">



                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> I have read and accept the <a href="#">terms and conditions.</a>
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