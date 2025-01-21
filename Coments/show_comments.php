<?php
require './../config.php';
require_once './../fonctionsBDD/Comments.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
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
			print_r($_POST);
			$listcom = get_info_comment($_POST["id_oeuvre"]);
			$oeuvre = get_info_artwork($_POST['idoeuvre']);
			echo "<pre>";
			print_r($listcom);
			echo "</pre>";
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
			foreach($listcom as $com){
				$client = $com["nomclient"]." ".$com["prenomclient"];
				$artiste = $com["nomartiste"]." ".$com["prenomartiste"];
				echo "<div><h3>".$client." : </h3><p>".$com["nomoeuvre"]." (".$artiste.")</p><p>".$com["message"]."</p><p>".$com["datecommentaire"]."</p></div>";
				echo "</br>";
			}
		?>
		<a href="javascript:history.back()">Retour à la page de l'artiste</a>
    </body>
</html>