<?php
    require_once '../Controller/ServicesC.php';

    $ServicesC=  new servicesC();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Service</title>
	<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>


	<section class="container">
		<h2></h2>
		<div class="form-container">
            <form action="" method = 'POST'>
                <div class="row">
                    <div class="col-25">
                        <label>Search Title: </label>
                    </div>
                    <div class="col-75">
                        <input type = "text" name = 'services'>
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
		if (isset($_POST['nom_service']) && isset($_POST['search'])){
			$result = $ServicesC->getServiceByTitle($_POST['nom']);
			if ($result !== false) {
	?>
		<section class="container">
			<h2>Nom services</h2>
			<a href = "afficherServices.php" class="btn btn-primary shop-item-button">All services</a>
			<div class="shop-items">

				<div class="shop-item">
					<strong class="shop-item-title"> <?= $result['nom'] ?> </strong>
					<div class="shop-item-details">
						<span class="shop-item-price"><?= $result['prix'] ?> dt.</span>
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

	<script src="../assets/js/script.js"></script>
</body>

</html>
