<?php
require './../config.php';
require_once BASE_PATH.'/fonctionsBDD/Comments.php';
require_once BASE_PATH.'/fonctionsBDD/Artworks.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

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
			session_start();
			include "./../View/templates/navbar.php";
			$comments = get_info_comment($_POST["id_oeuvre"]);
			$oeuvre = get_info_artwork($_POST['id_oeuvre']);
			?>
			<div class='card mb-3' style='max-width: 540px;'>
            <div class='row g-0'>
                <div class='col-md-4'>
					<?php if($oeuvre['imageoeuvre']){
						echo "<img src='./../upload/".$oeuvre['imageoeuvre']."' class='img-fluid rounded-start' alt='".$oeuvre['nomoeuvre']."'>";
					}
					else{
						echo "<img src='https://picsum.photos/200' class='img-fluid rounded-start>";
					}
                    ?>
                </div>
	
                <div class='col-md-8'>
                    <div class='card-body'>
                        <h5 class='card-title'><?php echo $oeuvre['nomoeuvre'] ?></h5>
                        <h4 class='card-title'><?php echo $oeuvre['pseudoartiste'] ?></h4>
                        <p class='card-text'><?php echo $oeuvre['descriptionoeuvre'] ?></p>
                        <p class='card-text'><small class='text-body-secondary'><?php echo $oeuvre['dateoeuvre'] ?></small></p>
                    </div>
                </div>
            </div>
        	</div>
			<?php
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
		include "./../View/templates/footer.php";
		?>
    </body>
</html>