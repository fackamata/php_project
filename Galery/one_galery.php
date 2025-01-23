<?php
require './../config.php';

require_once './../fonctionsBDD/Galery.php'; // déclare fichier galerie avec les fonction db relative à la galerie
/** En cours de réalisation 20-01-25 */
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
				$galeries = get_galery_by_id($_GET["idgalerie"]);
				// echo "<pre>";
				// print_r($galeries);
				// echo "</pre>";
				foreach($galeries as $galerie) {
				?>
					<img 
						<?php if (is_file("./../image/".$galerie['imagegalerie'])){ ?>
							src='<?php echo "./../image/".$galerie['imagegalerie'] ?>'
							<?php 
						} 
						else{ ?>
							src = "./../image/no_img.png" ;
							<?php
						} ?> class='card-img-top' alt='Image Galerie'
					>

					<div class="p-5">
						<h2 class="h4">
							<?php echo $goodie["nomobject"].' '.$goodies[0]["nomoeuvre"];?>
						</h2>
						<p class='card-text'><?php echo "Prix : ".$goodie["prixobject"].' €' ?>
						</p>
						<p class='card-text'><?php echo "Descritpion : ".$goodie["descriptionobject"] ?>
						</p>
					</div>

					<div class="d-flex flex-column">
						<a href="./../Goodies/edit_goodies.php?idobject=<?php echo $goodies[0]["idobject"] ?>" 
							class='btn text-warning border-warning btn-outline-info m-1' >Modifier ce goodie</a>
						</br>
						<a href="./../Goodies/all_goodies.php" 
							class='btn btn-outline-info m-1'>Revenir aux goodies</a>
						</br>
						<a href= "<?php echo "./../Marlene/home.php/?ctrl=buy&fct=display_add_buy&id=".$_GET["idobject"] ?>" 
							class="btn btn-outline-success">Acheter</a>
						</br>
						<a href='./../Oeuvres/show_artwork.php?idoeuvre=<?php echo $goodies[0]["idoeuvre"]?>' 
							class='btn btn-outline-info m-1'>Voir l'oeuvre</a> <!-- Lien pointant vers la page dynamique de présentation de l'oeuvre -->
						</br>	
						<a href="./../Artistes/show_artiste.php?idartiste=<?php echo $goodies[0]["refidartiste"]?>" 
							class='btn btn-outline-info m-1'>Voir l'artiste</a> <!-- Lien pointant vers la page dynamique de présentation de l'artiste -->
					</div>
				<?php
				}
				?>
		</div>
	
        <?php
			$galeries = get_galery_by_id($_GET["idgalerie"]);
			// echo "<pre>";
			// print_r($galeries);
			// echo "</pre>";
			foreach($galeries as $galerie) {
			 ?>
				<br>
				<div class='card' style='width: 40rem;'>
						<img <?php if (is_file("./../image/".$galerie['imagegalerie'])){ ?>
							src='<?php echo "./../image/".$galerie['imagegalerie'] ?>'
							<?php 
						} 
						else{ ?>
							src = "./../image/no_img.png" ;
							<?php
						} ?> class='card-img-top' alt='Image Galerie'>
						<div class='card-body'>
							<h4 class="card-title"><?php echo $galerie["villegalerie"] ?></h4>
							<p class='card-text'><?php echo $galerie["descriptiongalerie"] ?></p>
						</div>
						<ul class='list-group list-group-flush'>
							<li class='list-group-item'>An item</li>
							<li class='list-group-item'>A second item</li>
						</ul>
						<!-- <div class='card-body'> -->
							<a href="./../Artistes/show_artiste.php?idartiste=<?php echo $galerie["idartiste"]?>" class='card-link'>Voir l'artiste</a> <!-- Lien pointant vers la page dynamique de présentation de l'artiste choisit -->
						<!-- </div> -->
				</div>
			<?php
			}
			?>
		
		</br>
		<a href="./../Galery/edit_galery.php?idgalerie=<?php echo $_GET["idgalerie"] ?>" class='card-link'>Modifier cette galerie</a>
		</br>
		<a href="./all_galery.php">Retour aux galeries</a>
		</br>
		<a href="./../index.php">Retour à l'acceuil</a>

        <?php include "./../View/templates/footer.php" ?>	<!-- Intégration du footer a la page -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>