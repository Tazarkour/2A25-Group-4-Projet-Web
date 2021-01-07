<?php

include_once '../Model/reservation.php';
include_once '../Model/room.php';
include_once '../controller/reservationC.php';
include_once '../views/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../Assets/Assets_Res/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/Assets_Res/path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Assets/Assets_Res/css/roompagestyle.css">
</head>

<body>

<!-- Navigation -->

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Radisson Blu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Acceuil.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="DashboardUser.php">Account</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<br>
<br>
<br>
<br>
<!-- Page Content -->
<div class="container">

    <?php

    $search="";
    if (isset($_GET["search"]))
    {
        $search=$_GET["search"];
    }
    afficherrooms($search);

    ?>
    <!-- Page Heading/Breadcrumbs -->




    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="../Assets/Assets_Res/vendor/jquery/jquery.min.js"></script>
<script src="../Assets/Assets_Res/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
