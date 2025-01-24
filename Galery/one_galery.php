<?php
require './../config.php';

require_once './../fonctionsBDD/Galery.php'; // déclare fichier galerie avec les fonction db relative à la galerie
require_once './../fonctionsBDD/Artistes.php'; // déclare fichier galerie avec les fonction db relative à la galerie
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
    <?php include "./../View/templates/navbar.php" ?> <!-- Intégration de la navbar a la page -->
    <div class="container">
		<h1 class="h1 my-5 text-center">A propos de cette Galerie</h1>
		
		<div class="d-flex py-4 flex-md-row flex-sm-column justify-content-evenly align-items-center">
			<?php
				$galeries = get_galery_by_id($_GET["idgalerie"]); // Si l'idgalerie nest pas lié à au min un artiste ds la table exposer alors la requête ne peut aboutir
				// echo "<pre>";
				// print_r($galeries);
				// echo "</pre>";
				?>
					<img 
						<?php if (is_file("./../upload/".$galeries[0]['imagegalerie'])){ ?>
							src='<?php echo "./../upload/".$galeries[0]['imagegalerie'] ?>'
							<?php 
						} 
						else{ ?>
							src = "./../upload/img_gal_01.png" ;
							<?php
						} ?> class='card-img-top' alt='Image Galerie' style='max-width: 100%; max-height: 400px;'
					>

					<div class="p-5">
						<h2 class="h4">
							<?php echo $galeries[0]["nomgalerie"]?>
						</h2>
						<p class='card-text'><?php echo "Ville : ".$galeries[0]['villegalerie'];?>
						</p>
						<p class='card-text'><?php echo "Adresse : ".$galeries[0]['adressegalerie'];?>
						</p>
						<p class='card-text'><?php echo "Descritpion : ".$galeries[0]["descriptiongalerie"] ?>
						</p>
					</div>

					<div class="d-flex flex-column">
						</br>
						<a href="./../Galery/all_galery.php" 
							class='btn btn-outline-info m-1'>Revenir aux galeries</a>
						<?php
						if( isset($_SESSION['pseudoclient']) && $_SESSION['pseudoclient'] == 'serrante' ) // Afficher bouton admin Terry
							{
							?>
							<li class="nav-item px-2 text-muted">
							</br>
								<a href="./../Galery/edit_galery.php?idgalerie=<?php echo $_GET["idgalerie"] ?>" 
									class='btn text-warning border-warning btn-outline-info m-1'>Modifier cette galerie</a>
							</li>
						<?php
							} 
						?>
					</div>
		</div>
		<h2 class="h2 my-5 text-center">Voir les artistes</h2>
		<div class="d-flex flex-wrap justify-content-evenly mb-5 ">
			<?php
				$Galeries = get_galery_by_id($_GET["idgalerie"]);
				// echo "<pre>";
				// print_r($Galeries);
				// echo "</pre>";
				foreach($Galeries as $Galerie) {
					$Artistes = get_info_artiste($Galerie["idartiste"]);
					// echo "<pre>";
					// print_r($Artistes); // Affiche le tableau que renvoie la fonction
					// echo "</pre>";
					?>
					<div class="card-deck m-4 text-center " style='width: 30rem;'>	
						<!-- <img src='./../image/no_img.png' class='card-img-top' alt='Image'> -->
						<img <?php if (is_file("./../upload/".$Artistes['imageartiste'])){ ?>
							src='<?php echo "./../upload/".$Artistes['imageartiste'] ?>'
							<?php 
							} 
							else{ ?> src = "./../upload/no_img.png"<?php } ?>
						class='card-img-top' style='max-width: 50%; max-height: 300px;' alt='Image artiste'>
						<div class='card-body'>
							</br>
							<h5 class="card-title"><?php echo $Artistes["nomartiste"]?></h5>
							<!-- <p class='card-text'><?php //echo $Artistes["descriptionartiste"] ?></p> -->
						</div>
						</br>
						<a href="./../Artistes/show_artiste.php?idartiste=<?php echo $Galerie["idartiste"]?>" 
									class='btn btn-outline-info m-1'>Voir l'artiste</a> <!-- Lien pointant vers la page dynamique de présentation de l'artiste choisit -->
					</div>
				 <?php } 
				?> 
			 </div>
		 </div>
	 </div>
	</br>
	<!-- <a href="./../index.php">Retour à l'acceuil</a> -->
	<?php include "./../View/templates/footer.php" ?>	<!-- Intégration du footer a la page -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>