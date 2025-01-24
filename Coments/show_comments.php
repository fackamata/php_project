<?php
require './../config.php';  //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Comments.php'; //Import du fichier contenant les fonctions BDD associé aux Commentaires
require_once BASE_PATH.'/fonctionsBDD/Artworks.php'; //Import du fichier contenant les fonctions BDD associé aux Oeuvres

?>
<html>
	<head>
		<title>Commentaires</title>
		<meta charset="utf-8"/>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	</head>
	<body>
        <?php
			session_start();  //Lance la session sur le navigateur
			include "./../View/templates/navbar.php";  //Inclus la barre de navigation du site
			$comments = get_info_comment($_POST["id_oeuvre"]);  //Récupère les commentaires d'une oeuvre
			$oeuvre = get_info_artwork($_POST['id_oeuvre']);  //Récupère les infos d'une oeuvre
			?>
            <!-- Affichage de l'oeuvre en question -->
			<div class='card mb-3' style='max-width: 540px;'>
					<?php if($oeuvre['imageoeuvre']){ //Test d'existence d'une image, remplcement par une image aléatoire si absente
						echo "<img src='./../upload/".$oeuvre['imageoeuvre']."' class='img-fluid rounded-start' alt='".$oeuvre['nomoeuvre']."'>";
					}
					else{
						echo "<img src='https://picsum.photos/200' class='img-fluid rounded-start>";
					}
                    ?>
                </div>
	
                <div class="d-flex px-5 py-3 mx-5 flex-column">
                        <h5 class='card-title'><?php echo $oeuvre['nomoeuvre'] ?></h5>
                        <h4 class='card-title'><?php echo $oeuvre['pseudoartiste'] ?></h4>
                        <p class='card-text'><?php echo $oeuvre['descriptionoeuvre'] ?></p>
                        <p class='card-text'><small class='text-body-secondary'><?php echo $oeuvre['dateoeuvre'] ?></small></p>
                    </div>
			<?php
            //Affichage des commentaires en liste
			foreach ($comments as $comment){
                $html = "<div class='card container'>
                    <div class='card-header'>
                        ".$comment['pseudoartiste']."
                    </div>
                    <div class='card-body'>
                        <blockquote class='blockquote mb-0'>
                        <p>".$comment['message']."</p>
                        <footer class='blockquote-footer'>".$comment['pseudoclient']." - ".$comment['datecommentaire']."</footer>
                        </blockquote>
                    </div>
                    </div>";
                    echo $html;
            }
		include "./../View/templates/footer.php"; //Inclus le pied de page
		?>
    </body>
</html>