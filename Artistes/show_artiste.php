<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artistes.php';
require_once BASE_PATH.'/fonctionsBDD/Artworks.php';
 // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

?>
<html>
<head>
  <!-- Affichage du parametre dans le titre dela page -->
   <!--<script defer src="./artiste_compte.js"></script>-->
  <title>Saisie d'un article</title>
  <meta charset="utf-8"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        include "./../View/templates/navbar.php";
        session_start();
        $artiste=get_info_artiste($_GET["idartiste"]);
    ?>
    
    <div class='card' style='width: 18rem;'>
				<img src='./../upload/<?php echo $artiste['imageartiste']?>' class='card-img-top' alt='<?php echo $artiste['pseudoartiste']?>'>
				<div class='card-body'>
					<h5 class='card-title'><?php echo $artiste["pseudoartiste"]?></h5>
					<p class='card-text'><?php echo $artiste['nomartiste']?></p>
					<p class='card-text'><?php echo $artiste['prenomartiste']?></p>
					<p class='card-text'><?php echo $artiste['descriptionartiste']?></p>
				</div>
				<ul class='list-group list-group-flush'>
					<li class='list-group-item'><?php echo $artiste['paysartiste']?></li>
					<li class='list-group-item'><?php echo $artiste['villeartiste']?></li>
					<li class='list-group-item'><?php echo $artiste['emailartiste']?></li>
				</ul>
				</div>
        <br/><br/>
			<?php
                $collection=get_info_artwork_by_artist($_GET['idartiste']);
                echo "<pre>";
                print_r($collection);
                echo "</pre>";
                foreach ($collection as $oeuvre){
                    $html = "<div class='card mb-3' style='max-width: 540px;'>
                    <div class='row g-0'>
                    <div class='col-md-4'>
                    <img src='./../upload/".$oeuvre['imageoeuvre']."' class='img-fluid rounded-start' alt='".$oeuvre['nomoeuvre']."'>
                    </div>
                    <div class='col-md-8'>
                    <div class='card-body'>
                        <h5 class='card-title'>".$oeuvre['nomoeuvre']."</h5>
                        <p class='card-text'>".$oeuvre['descriptionoeuvre']."</p>
                        <p class='card-text'><small class='text-body-secondary'>".$oeuvre['dateoeuvre']."</small></p>
                        <form method='GET' action='./../Oeuvres/show_artwork.php'><input type='hidden' name='idoeuvre' value='".$oeuvre['idoeuvre']."'/><input type='submit' value='Voir'/></form>";
                    $html = $html."</div></div></div></div>";
                    echo $html;
                }
            ?>
        <a href="./../index.php">Home</a>
    <?php include "./../View/templates/footer.php";?>
</body>
</html>
