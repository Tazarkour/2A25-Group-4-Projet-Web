<?php

include "../controller/roomC.php";
include "../model/room.php";
if (isset($_GET["idroom"]))
    $idroom=$_GET["idroom"];
$error = "";

$roomC1 = new roomC1(); //controller
if (  isset($_POST["idroom"]) &&
    isset($_POST["roomtype"]) &&
    isset($_POST["price"]) &&
    isset($_POST["photo"]) &&
    isset($_POST["qty"])

) {
    if (  !empty($_POST["idroom"]) &&
        !empty($_POST["roomtype"]) &&
        !empty($_POST["price"]) &&
        !empty($_POST["photo"])&&
    !empty($_POST["qty"])
    ) {
        $Room = new room( //ism model//

            $_POST['roomtype'],
            $_POST['price'],
            $_POST['photo'],
  $_POST['qty']

        );
        $idroom=$_POST["idroom"];
        $roomC1->updateroom($Room,$idroom);

    } else
        $error = "Missing information";
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Add room Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/Assets_Res/css/styleroom.css">
</head>
<body>
<div class="testbox">
    <form action="" method="POST">
        <div class="banner">
            <h1> Add Rooms Form</h1>
        </div>
        <br/>
        <fieldset>
            <legend>Romm Details</legend>
            <div class="columns">

                <div class="item">
                    <?php
                    if (isset($_GET['idroom'])) {
                    $result = $roomC1->getRoomsById($_GET['idroom']);
                    if ($result !== false) {
                    ?>
                    <label for="fname">Room Type<span>*</span></label>
                    <input id="fname" type="text" name="roomtype" value="<?= $result['roomtype'] ?>"/>
                </div>


                <div class="item">
                    <label for="zip">Price<span>*</span></label>
                    <input id="zip" type="text"   name="price" value="<?= $result['price'] ?>"/>
                </div>
                <div class="item">
                    <label for="city">Quantity<span>*</span></label>
                    <input id="city" type="text"   name="qty" value="<?= $result['qty'] ?>" />
                </div>


                <div class="item">
                    <label for="phone">Image<span>*</span></label>
                    <input id="phone" type="file"    name="photo" value="<?= $result['photo'] ?>"/>

                </div>
                <input id="idroom" name="idroom" value="<?php echo $idroom ?>" hidden>

        </fieldset>
        <br/>

        <div class="btn-block">
            <button type="submit">Modify</button>
        </div>
    </form>
    <?php
    }
    }
    else {
        header('Location:Room_Gestion.php');
    }
    ?>
</div>
</body>
