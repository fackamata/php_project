<?php
require './../config.php';

require_once './../fonctionsBDD/Goodies.php'; // déclare fichier galerie avec nos fonction db relative à l'galerie
/** En cours de réalisation */
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

    <header>
      <?php include "./../View/templates/navbar.php" ?>
    </header>
    <h1>Goodies</h1>

        <?php
			$goodies = get_all_goodies();
            echo "<pre>";
			print_r($goodies);
			echo "</pre>";
			foreach($goodies as $goodie) {
				?>
				<br>
				 <div class='card' style='width: 20rem;'>
				 <img src='./../image/no_img.png' class='card-img-top' alt='Image'>
				 <div class='card-body'>
					<h5 class="card-title"><?php echo $goodie["nomobject"] ?></h5>
					<p class='card-text'><?php echo $goodie["descriptionobject"] ?></p>
				</div>
				 <ul class='list-group list-group-flush'>
					 <li class='list-group-item'>An item</li>
					 <li class='list-group-item'>A second item</li>
					 <li class='list-group-item'>A third item</li>
				 </ul>
				 <div class='card-body'>
					 <a href='./../FonctionBDD/Artworks.php' class='card-link'>Voir l'oeuvre</a> 
					 <a href='./../FonctionBDD/Artistes.php' class='card-link'>Voir l'artiste</a>
					 <!-- Revoir les lien pour pointer sur la page de présentation de l'oeuvre et l'artiste -->
				 </div>
				 <?php
			}
			$goodie = "goodies";
		?>
		
		</br>
		<a href="./../index.php">Retour à la page d'acceuil</a>
		
	<footer>
        <?php include "./../View/templates/footer.php" ?>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>