<?php
require './../config.php';

require_once './../fonctionsBDD/Artistes.php'; // déclare fichier Artiste avec nos fonction db relative à l'artiste

?>
<html>
	<head>
		<title> Liste des articles</title>
		<meta charset="utf-8"/>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	</head>
	<body>
        <?php
			include "./../View/templates/navbar.php";
			$artistes = get_all_artiste();
            echo "<pre>";
			print_r($artistes);
			echo "</pre>";
			foreach($artistes as $artiste) {
				echo "<div class='card' style='width: 18rem;'>";
				echo "<img src='./../upload/".$artiste['imageartiste']."' class='card-img-top' alt='".$artiste['pseudoartiste']."'>";
				echo "<div class='card-body'>";
					echo "<h5 class='card-title'>".$artiste["pseudoartiste"]."</h5>";
					echo "<p class='card-text'>".$artiste['nomartiste']."</p>";
					echo "<p class='card-text'>".$artiste['prenomartiste']."</p>";
					echo "<p class='card-text'>".$artiste['descriptionartiste']."</p>";
				echo "</div>";
				echo "<ul class='list-group list-group-flush'>";
					echo "<li class='list-group-item'>".$artiste['paysartiste']."</li>";
					echo "<li class='list-group-item'>".$artiste['villeartiste']."</li>";
					echo "<li class='list-group-item'>".$artiste['emailartiste']."</li>";
				echo "</ul>";
				echo "<div class='card-body'>";
					echo "<a href='./show_artiste.php?idartiste=".$artiste['idartiste']."' class='card-link'>Voir</a>";
				echo "</div>";
				echo "</div>";
			}
		?>
		<a href="javascript:history.back()">Retour à la page d'acceuil</a>
		<?php include "./../View/templates/footer.php";?>
	</body>
</html>
