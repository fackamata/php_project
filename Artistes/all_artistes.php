<?php
require './../config.php';

require_once './../fonctionsBDD/Artistes.php'; // déclare fichier Artiste avec nos fonction db relative à l'artiste

?>
<html>
	<head>
		<title> Liste des articles</title>
		<meta charset="utf-8"/>
	</head>
	<body>
        <?php	
			$artistes = get_all_artiste();
            echo "<pre>";
			print_r($artistes);
			echo "</pre>";
			foreach($artises as $artiste) {
				echo "<div class='card' style='width: 18rem;'>";
				echo "<img src='...' class='card-img-top' alt='...'>";
				echo "<div class='card-body'>";
					echo "<h5 class='card-title'>".$artise[""]"</h5>";
					echo "<p class='card-text'>Some quick example text to build on the card title and make up the bulk of the cards content.</p>";
				echo "</div>";
				echo "<ul class='list-group list-group-flush'>";
					echo "<li class='list-group-item'>An item</li>";
					echo "<li class='list-group-item'>A second item</li>";
					echo "<li class='list-group-item'>A third item</li>";
				echo "</ul>";
				echo "<div class='card-body'>";
					echo "<a href='#' class='card-link'>Card link</a>";
					echo "<a href='#' class='card-link'>Another link</a>";
				echo "</div>";
				echo "</div>";
			}
		?>

			<div>
				<h3>artiste : <?php echo $artiste ?> </h3>
			</div>
		</br>
		<a href=" <?php echo "./Artistes/artiste_compte.php?id=".$artistes[$i]['idartiste'] ?>"></a>
		<?php 
	}
		?>
			<div>
				<h3>artiste : <?php echo $artiste ?> </h3>
			</div>
		</br>
		<a href="javascript:history.back()">Retour à la page d'acceuil</a>
	</body>
</html>