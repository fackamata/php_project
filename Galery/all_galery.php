<?php
require './../config.php';

require_once './../fonctionsBDD/Galery.php'; // déclare fichier galerie avec nos fonction db relative à l'galerie
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
		<h1 class="h1 my-5 text-center">Galeries</h1>
		<div class="d-flex flex-wrap justify-content-evenly mb-5 ">
			<?php
				$galeries = get_all_galery();
				// echo "<pre>";
				// print_r($galeries);
				// echo "</pre>";
				foreach($galeries as $galerie) {
					$ttgaleries = get_galery_by_id($galerie["idgalerie"]);
					// echo "<pre>";
					// print_r($ttgaleries[0]); // Affiche le tableau que renvoie la fonction
					// echo "</pre>";
					?>
					<div class="card-deck m-4 text-center " style='width: 30rem;'>	
						<!-- <img src='./../image/no_img.png' class='card-img-top' alt='Image'> -->
						<img <?php if (is_file("./../upload/".$galerie['imagegalerie'])){ ?>
							src='<?php echo "./../upload/".$galerie['imagegalerie'] ?>'
							<?php 
							} 
							else{ ?> src = "./../upload/img_gal_01.png"<?php } ?> 
						class='card-img-top' style='max-width: 100%; max-height: 400px;' alt='Image galeries'>
						
						<div class='card-body'>
							<h5 class="card-title"><?php echo $galerie["nomgalerie"]?></h5>
							<p class='card-text'><?php echo $galerie["descriptiongalerie"] ?></p>
						</div>
						<div class='card-body'>
							<ul class='list-group list-group-flush'>
								<li class='list-group-item'>
									<a href="./../Galery/one_galery.php?idgalerie=<?php echo $galerie["idgalerie"]?>" 
										class='card-link'>Voir la Galerie</a> <!-- Lien pointant vers la page dynamique de présentation de l'object choisit -->
								</li>
							</ul>
						</div>
					</div>
				 <?php } 
				?> 
			 </div>
		 </div>
		</br>
		<!-- <a href="./../index.php">Retour à la page d'acceuil</a> -->
		<?php include "./../View/templates/footer.php" ?>
	</body>