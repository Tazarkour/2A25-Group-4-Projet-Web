<?php
include '../controller/roomC.php';
$roomC1= new roomC1();

$liste=$roomC1->affiche();


if (isset($_POST["idroom"]) && isset($_POST["supprimer"])){
        $roomC1->deleteroom($_POST["idroom"]);
        header('Location:Room_Gestion.php');
    }




?>
<html>
<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> show reservation name </title>
</head>
<body>

<hr>
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
        <table class="table table-striped custab">
            <thead>
    <tr>
        <th>Id</th>
        <th>roomtype</th>
        <th>price</th>
        <th>photo</th>
        <th>qty </th>

        <th>supprimer</th>
        <th>modifier</th>
    </tr>
            </thead>
    <?PHP
    foreach($liste as $room){ //echo reservation 9dima//
        ?>
        <tr>
            <td><?PHP echo $room['idroom']; ?></td>
            <td><?PHP echo $room['roomtype']; ?></td>
            <td><?PHP echo $room['price']; ?></td>
            <td><?PHP echo $room['photo']; ?></td>
            <td><?PHP echo $room['qty']; ?></td>


            <td>
                <form method="POST" action="Room_Gestion.php">
                    <input type="submit"  class=" btn btn-danger" name="supprimer" value="Delete">
                    <input type="hidden" value="<?PHP echo $room['idroom'] ; // ba3thna id  champs hiddden bch na9rawh fi page spperimer ?> "name="idroom">
                </form>
            </td>
            <td>

                <a type="button" class="btn btn-primary shop-item-button" href = "Modifier_Room.php?idroom=<?= $room['idroom'] ?>">Modifier</a>
            </td>
        </tr>
        <?PHP



    }

    ?>
</table>
    </div>
</div>
<style>
    .custab{
        border: 1px solid #ccc;
        padding: 5px;
        margin: 5% 0;
        box-shadow: 3px 3px 2px #ccc;
        transition: 0.5s;
    }
    .custab:hover{
        box-shadow: 3px 3px 0px transparent;
        transition: 0.5s;
    }</style>
</body>
</html>