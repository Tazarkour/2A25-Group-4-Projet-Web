<?php

include_once '../model/reservation.php';
include_once '../controller/reservationC.php';

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
isset($_POST["date"])


) {
    if (
        !empty($_POST["firstname"]) &&
        !empty($_POST["lastname"]) &&
        !empty($_POST["adresse"])&&
    !empty($_POST["tel"])&&
     !empty($_POST["date"])



    ) {
        $Reservation = new reservation(
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['adresse'],
             $_POST['tel'],
         $_POST['date']

        );
        $reservationC-> ajouterReservation($Reservation);
        header('Location:showreservations.php');
    }
    else
        $error = "Missing information";
}


?>



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
<body>
<button><a href="showreservations.php">Retour à la liste</a></button>
<hr>

<div id="error">
    <?php echo $error; ?>
</div>

<form action="" method="POST">
    <table border="1" align="center">

        <tr>
            <td rowspan='3' colspan='1'>New album</td>
            <td>
                <label for="titre">first name:
                </label>
            </td>
            <td><input type="text" name="firstname" id="firstname" maxlength="20"></td>
        </tr>
        <tr>
            <td>
                <label for="lastename">lastname:
                </label>
            </td>
            <td><input type="text" name="lastname" id="lastname" maxlength="20"></td>
        </tr>
        <tr>
            <td>
                <label for="tel">tel:
                </label>
            </td>
            <td><input type="number" name="tel" id="tel" maxlength="20"></td>
        </tr>


        <tr>
            <td>
                <label for="adresse">adresse:
                </label>
            </td>
            <td><input type="text" name="adresse" id=adresse" maxlength="20"></td>
        </tr>
        <tr>
            <td>
                <label for="date">date:
                </label>
            </td>
            <td><input type="date" name="date" id="date" maxlength="20"></td>
        </tr>
        <td>
            <input type="submit" value="Envoyer">
        </td>
        <td>
            <input type="reset" value="Annuler" >
        </td>
        </tr>
    </table>
</form>
</body>
</html>