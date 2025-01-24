<?php
require './../config.php';
require_once './../fonctionsBDD/Goodies.php'; // déclare fichier Goodies avec les fonction relative aux goodies.
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
		<h1 class="h1 my-5 text-center">A propos de cet object</h1>
		
		<div class="d-flex py-4 flex-md-row flex-sm-column justify-content-evenly align-items-center">
			<?php
				$goodies = get_goodies_by_id($_GET["idobject"]);
				// echo "<pre>";
				// print_r($goodies[0]);
				// echo "</pre>";
				foreach($goodies as $goodie) {
					?>
					<img
						<?php if (is_file("./../upload/".$goodie['imageobject'])){ ?>
							src='<?php echo "./../upload/".$goodie['imageobject'] ?>'
							<?php 
						} 
						else{ ?>
							src = "./../upload/img_obj_01.png" ;
							<?php
						} ?> class='card-img-top' alt='Image Goodies' style='max-width: 50%; max-height: 400px;'
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
						<?php
						if( isset($_SESSION['pseudoclient']) && $_SESSION['pseudoclient'] == 'serrante' ) // Afficher bouton admin Terry
							{
							?>
							<li class="nav-item px-2 text-muted">
							</br>
								<a href="./../Goodies/edit_goodies.php?idobject=<?php echo $goodies[0]["idobject"] ?>" 
									class='btn text-warning border-warning btn-outline-info m-1' >Modifier ce goodie</a>
							</li>
						<?php
							} 
						?>
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
	</div>
	</br>
	<a href="./../Goodies/all_goodies.php" class='card-link'>Revenir aux goodies</a>

	<?php include "./../View/templates/footer.php" ?>	<!-- Intégration du footer a la page -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>