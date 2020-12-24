<?php
require_once '../controller/reservationC.php';

$reservationC =  new reservationC();

?>

<!DOCTYPE html>
<html lang="en">



</head>

<body>


<section class="container">
    <h2></h2>
    <div class="form-container">
        <form action="" method = 'POST'>
            <div class="row">
                <div class="col-25">
                    <label>Search reservation: </label>
                </div>
                <div class="col-75">
                    <input type = "text" name = 'firstname'>
                </div>
            </div>
            <br>
            <div class="row">
                <input type = "submit" value = "Search" name ="search">
            </div>
        </form>
    </div>
</section>

<?php
if (isset($_POST['firstname']) && isset($_POST['search'])){
    $result = $reservationC->getReservationByFirstname($_POST['firstname']);
    if ($result !== false) {
        ?>
        <section class="container">

            <a href = "showreservations.php" class="btn btn-primary shop-item-button">All reservation</a>
            <div class="shop-items">

                <div class="shop-item">
                    <strong class="shop-item-title"> <?= $result['firstname'] ?> </strong>

                    <div class="shop-item-details">
                        <span class="shop-item-price"><?= $result['tel'] ?> </span>
                    </div>
                </div>

            </div>
        </section>
        <?php
    }
    else {
        echo "<div> No results found!!! </div>";
    }
}
?>

</body>

</html>
