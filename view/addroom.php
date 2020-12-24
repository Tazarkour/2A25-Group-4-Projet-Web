<?php

require "../controller/reservationC.php";
require "../model/room.php";

$roomC = new roomC();
if (
    isset($_POST["roomtype"]) &&
    isset($_POST["price"]) &&
    isset($_POST["photo"])

) {
    if (
        !empty($_POST["roomtype"]) &&
        !empty($_POST["price"]) &&
        !empty($_POST["photo"])
    ) {
        $Room = new room(
            $_POST['roomtype'],
            $_POST['price'],
            $_POST['photo']


        );
        $roomC-> addRoom($Room);

    }
    else
        $error = "Missing information";
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Inscription</title>
    <script src="script.js"></script>
</head>
<body>
<h1>room</h1>
<form NAME="f" action="addroom.php" method="POST">
    <table border="1" width="50%">
        <tr>
            <th align="left" rowspan="8">
            </th>
            <th align="left">
                <label for="name">roomtype:
                </label>
            </th>
            <th align="left">
                <input type="text" id="name" name="roomtype" maxlength="25" size="20" placeholder="enter room type"
                       required>
            </th>
        </tr>
        <tr>
            <th align="left">
                <label for="price">price:
                </label>
            </th>
            <th align="left">
         <input type="text" id="price" name="price" maxlength="25" size="20" placeholder="enter room price">
            </th>
        </tr>
        <tr>
            <th align="left">
            </th>
        </tr>
        <tr>
            <th align="left">
                <label for="photo">Picture:
                </label>
            </th>
            <th align="left">
                <input type="file" id="photo" name="photo" required>
            </th>
        </tr>

        <tr>
            <th align="left">
            </th>
            <th align="left">
                <button type="submit">Envoyer</button>
            </th>
            <th align="left">
                <button type="button">Annuler</button>
            </th>
        </tr>
    </table>
</form>

</body>

</html>
