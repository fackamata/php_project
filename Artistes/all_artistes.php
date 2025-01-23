<?php
require './../config.php'; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once './../fonctionsBDD/Artistes.php'; //Import du fichier contenant les fonctions BDD associé aux Artistes
require_once BASE_PATH.'/fonctionsBDD/Exposer.php';  //Import du fichier contenant les fonctions BDD associé aux Exposition dans les galeries

?>
<html>
	<head>
		<title>Artistes</title>
		<meta charset="utf-8"/>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	</head>
	<body>
        <?php
			session_start(); //Lance la session sur le navigateur
			include "./../View/templates/navbar.php";
			$artistes = get_all_artiste(); //Récupère toute les infos de tout les artistes
			foreach($artistes as $artiste) { //Affichage de chaque artiste un par un
				$idartiste = pg_escape_string($artiste['idartiste']);
				$galerie = get_galery_by_id_artiste($idartiste); //Récupère le nom de la galerie d'exposition de l'artiste pour l'afficher
				echo "<div class='card' style='width: 18rem;'>";
				if($artiste['imageartiste']){ //Vérification de l'upload du fichier image, si erreur alors utilisation d'une image aléatoire
					echo "<img src='./../upload/".$artiste['imageartiste']."' class='card-img-top' alt='".$artiste['pseudoartiste']."'>";
				}
				else{
					echo "<img src='https://picsum.photos/200' class='card-img-top' alt='".$artiste['pseudoartiste']."'>";
				}
				echo "<div class='card-body'>";
					echo "<h5 class='card-title'>".$artiste["pseudoartiste"]."</h5>";
					echo "<p class='card-text'>".$artiste['nomartiste']."</p>";
					echo "<p class='card-text'>".$artiste['prenomartiste']."</p>";
					echo "<p class='card-text'><a href='./../Galery/one_galery.php?idgalerie=".$galerie['idgalerie']."'>".$galerie['nomgalerie']."</a></p>";
					echo "<p class='card-text'>".$artiste['descriptionartiste']."</p>";
				echo "</div>";
				echo "<ul class='list-group list-group-flush'>";
					echo "<li class='list-group-item'>".$artiste['paysartiste']."</li>";
					echo "<li class='list-group-item'>".$artiste['villeartiste']."</li>";
					echo "<li class='list-group-item'>".$artiste['emailartiste']."</li>";
				echo "</ul>";
				echo "<div class='card-body'>";
					echo "<a href='./show_artiste.php?idartiste=".$artiste['idartiste']."' class='card-link'>Voir</a>"; //Lien vers la page de l'artiste dont il est question
				echo "</div>";
				echo "</div>";
			}
		?>
		<?php include "./../View/templates/footer.php";?> <!--Inclus le pied de page-->
	</body>
</html>
