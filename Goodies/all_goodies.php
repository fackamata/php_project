<?php
require './../config.php';

require_once './../fonctionsBDD/Goodies.php'; // déclare fichier galerie avec nos fonction db relative à l'galerie
/** En cours de réalisation */
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	</head>
	<body>
		<?php include "./../View/templates/navbar.php" ?>
		<h1>Goodies</h1>
		<div class="d-flex flex-wrap justify-content-evenly mb-5 ">
			<?php
				$goodies = get_all_goodies();
				// echo "<pre>";
				// print_r($goodies);
				// echo "</pre>";
				foreach($goodies as $goodie) {
					$ttgoodies = get_goodies_by_id($goodie["idobject"]);
					// echo "<pre>";
					// print_r($ttgoodies[0]); // Affiche le tableau que renvoie la fonction
					// echo "</pre>";
					?>
					<div class="card-deck m-4 text-center " style='width: 30rem;'>	
						<!-- <img src='./../image/no_img.png' class='card-img-top' alt='Image'> -->
						<img <?php if (is_file("./../image/".$ttgoodies[0]['imageobject'])){ ?>
							src='<?php echo "./../image/".$ttgoodies[0]['imageobject'] ?>'
							<?php 
							} 
							else{ ?> src = "./../image/no_img.png"<?php } ?> 
						class='card-img-top' alt='Image Goodies'>
						
						<div class='card-body'>
							<h5 class="card-title">"<?php echo $goodie["nomobject"].$ttgoodies[0]["nomoeuvre"]?>"</h5>
							<p class='card-text'><?php echo $goodie["descriptionobject"] ?></p>
						</div>
						<div class='card-body'>
							<ul class='list-group list-group-flush'>
								<li class='list-group-item'><a href="./../Goodies/one_goodies.php?idobject=<?php echo $goodie["idobject"]?>" class='card-link'>Voir le goodie</a> <!-- Lien pointant vers la page dynamique de présentation de l'object choisit --></li>
								<li class='list-group-item'><a href='./../Oeuvres/show_artwork.php?idoeuvre=<?php echo $ttgoodies[0]["idoeuvre"]?>' class='card-link'>Voir l'oeuvre</a></li>
								<li class='list-group-item'><a href='./../Artistes/show_artiste.php?idartiste=<?php echo $ttgoodies[0]["refidartiste"]?>' class='card-link'>Voir l'artiste</a></li>
							</ul>
						</div>
					</div>
				 <?php } 
				?> 
			 </div>
		 </div>
		</br>
		<a href="./../index.php">Retour à la page d'acceuil</a>
		<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
		integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
		crossorigin="anonymous">
		</script> -->
		<?php include "./../View/templates/footer.php" ?>
	</body>
</html>