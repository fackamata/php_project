<?php
require './../config.php';

require_once './../fonctionsBDD/Galery.php'; // déclare fichier galerie avec nos fonction db relative à l'galerie
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
    <?php include "./../View/templates/navbar.php" ?>  <!-- Intégration de la navbar a la page -->
    <h1>Galeries</h1>
        <?php
			$galeries = get_all_galery();
            // echo "<pre>";
			// print_r($galeries);
			// echo "</pre>";
			foreach($galeries as $galerie) {
				?>
				<br>
				<div class='card' style='width: 20rem;'>
				<img src='./../image/no_img.png' class='card-img-top' alt='Image'>
				<div class='card-body'>
					<h5 class="card-title"><?php echo $galerie["villegalerie"] ?></h5>
					<p class='card-text'><?php echo $galerie["descriptiongalerie"] ?></p>
				</div>
				<ul class='list-group list-group-flush'>
					<li class='list-group-item'>An item</li>
					<li class='list-group-item'>A second item</li>
				</ul>
				<div class='card-body'>
					<a href="./../Galery/one_galery.php?idgalerie=<?php echo $galerie["idgalerie"]?>" class='card-link'>Voir la galerie</a> <!-- Lien pointant vers la page dynamique de présentation de la galerie choisit -->
				</div>
			</div>
			<?php
			}	
			$galerie = "galeries";
		?>
		</br>
		<a href="./../index.php">Retour à la page d'acceuil</a>

        <?php include "./../View/templates/footer.php" ?> <!-- Intégration du footer a la page -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>