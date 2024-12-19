<?php
require './../config.php';

require_once BASE_PATH.'/fonctionsBDD/Galery.php'; // déclare fichier galerie avec nos fonction db relative à l'galerie
/** En cours de réalisation */
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Accueil</title>
  </head>
  <body>

    <header>
      <?php include "./../View/templates/navbar.php" ?>
    </header>
    <h1>Galeries</h1>

        <?php	
			// $galeries = get_all_galerie();
            // echo "<pre>";
			// print_r($galeries);
			// echo "</pre>";
			// foreach($artises as $galerie) {
			// 	echo "<div class='card' style='width: 18rem;'>";
			// 	echo "<img src='...' class='card-img-top' alt='...'>";
			// 	echo "<div class='card-body'>";
			// 		echo "<h5 class='card-title'>".$artise[""]"</h5>";
			// 		echo "<p class='card-text'>Some quick example text to build on the card title and make up the bulk of the cards content.</p>";
			// 	echo "</div>";
			// 	echo "<ul class='list-group list-group-flush'>";
			// 		echo "<li class='list-group-item'>An item</li>";
			// 		echo "<li class='list-group-item'>A second item</li>";
			// 		echo "<li class='list-group-item'>A third item</li>";
			// 	echo "</ul>";
			// 	echo "<div class='card-body'>";
			// 		echo "<a href='#' class='card-link'>Card link</a>";
			// 		echo "<a href='#' class='card-link'>Another link</a>";
			// 	echo "</div>";
			// 	echo "</div>";
			// }
			$galerie = "galeries";
		?>
			
			<div>
				<h3>galerie : <?php echo $galerie ?> </h3>
			</div>
		</br>
			<div>
				<h3>galerie : <?php echo $galerie ?> </h3>
			</div>
		</br>
		<!-- <a href="javascript:history.back()">Retour à la page d'acceuil</a> -->

	<footer>
        <?php include "./../View/templates/footer.php" ?>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>