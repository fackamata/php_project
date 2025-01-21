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
            echo "<pre>";
            print_r($_SESSION);
            echo "</pre>";
            $info=get_info_artiste($_SESSION["idartiste"]);
        ?>

        <div class="card" style="width: 18rem;">
            <?php if($info['imageartiste']){
               echo "<img src='./../upload/".$info['imageartiste']."' class='card-img-top' alt='".$info["pseudoartiste"]."'>";
            }
            else{
                echo "<img src='https://picsum.photos/200' class='card-img-top'>";
            }
            ?>
        
        <div class="card-body">
            <h5 class="card-title"><?php echo $info["pseudoartiste"] ?></h5>
            <p class="card-text"><?php echo $info["descriptionartiste"] ?><p>
            <p class="card-text"><?php echo $info["nomartiste"] ?><p>
            <p class="card-text"><?php echo $info["prenomartiste"] ?><p>
            <p class="card-text"><?php echo $info["emailartiste"] ?><p>
            <p class="card-text"><?php echo $info["villeartiste"] ?><p>
            <p class="card-text"><?php echo $info["paysartiste"] ?><p>
            <form method='POST' action='./edit_artiste.php'><button class="btn btn-primary" name='id_artiste' value='<?php echo serialize($info) ?>'>modifier</button></form>
        </div>
        </div>        
	<center>
			<?php
                $collection=get_info_artwork_by_artist($_SESSION['idartiste']);
                foreach ($collection as $oeuvre){

                    echo "<div class='card mb-3' style='max-width: 540px;'>
                        <div class='row g-0'>
                            <div class='col-md-4'>";
                            if ($oeuvre['imageoeuvre']){
                                echo "<img src='./../upload/".$oeuvre['imageoeuvre']."' class='img-fluid rounded-start' alt='".$oeuvre['nomoeuvre']."'>";
                            }
                            else{
                                echo "<img src='https://picsum.photos/200' class='img-fluid rounded-start'>";
                            }  
                            echo "</div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$oeuvre['nomoeuvre']."</h5>
                                    <p class='card-text'>".$oeuvre['descriptionoeuvre']."</p>
                                    <p class='card-text'><small class='text-body-secondary'>".$oeuvre['dateoeuvre']."</small></p>
                                </div>
                                <form method='POST' action='./../Oeuvres/edit_artwork.php'><button class='btn btn-primary' name='id_oeuvre' value='".serialize($oeuvre)."'>modifier</button></form>
                                <form method='POST' action='./../Coments/show_comments.php'><button class='btn btn-primary' name='id_oeuvre' value='".$oeuvre["idoeuvre"]."'>commentaire</button></form>
                                <form method='POST' action='./../Oeuvres/delete_artwork.php'><button class='btn btn-primary' name='id_oeuvre' value='".$oeuvre["idoeuvre"]."'>Supprimer</button></form>
                            </div>
                        </div>
                    </div>";
                }
                echo "Ajouter une Oeuvre : ";
                echo "<form method='get' action='./../Oeuvres/add_artwork.php'><button class='btn btn-primary' name='idartiste' value='".$info["idartiste"]."'>Ajouter</button></form>";
            ?>
        <?php include "./../View/templates/footer.php";?>
	</center>
</body>
</html>
