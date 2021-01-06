<?php
require_once '../controller/reservationC.php';

$reservationC =  new reservationC();

?>

<html>

<!------ Include the above in your HEAD tag ---------->


  <head>
    <title>Awesome Search Box</title>
      <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
      <link rel="stylesheet" href="stylesearch.css">

      </head>
      <!-- Coded with love by Mutiullah Samim-->
<body>
<a href = "showreservations.php" class="btn btn-primary shop-item-button">BACK</a>
<form action="" method = 'POST'>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="searchbar">
                <input class="search_input"   name="firstname" placeholder="Search...">
                <button class=" btn btn-info search_icon"  type="submit" name="search"><i class="fas fa-search"></i></button>
                <?php

if (isset($_POST['firstname']) && isset($_POST['search'])){
    $result = $reservationC->getReservationByFirstname($_POST['firstname']);
    if ($result !== false)

    {
        ?>


        <br>  <br>    <!------ Include the above in your HEAD tag ---------->

                <div class="container">
                    <div class="row">
                        <div class="span3">
                            <div class="well">
                                <h2 class="muted"> <?= $result['Prenom']."".$result['Nom'] ?> </h2>
                                <p > <span class="label ">Idreservation <?= $result['idreservation'] ?></span></p>



                          Phone Number  <strong class="shop-item-price"><?= $result['tel'] ?> </strong>
                        <br>
                            Address:    <strong class="shop-item-price"><?= $result['adresse'] ?> </strong>
                        <br>
                             Email       <strong class="shop-item-price"><?= $result['email'] ?> </strong>


                                </div>
                    </div>

                </div>
                </div>

            <?php
            }
            else { ?> <?php
                echo "<div > <br> <strong>  No results found! </div>";
            }
            }
            ?>
  </body>

</html>