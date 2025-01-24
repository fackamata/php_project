<?php
require "./../config.php";  //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artworks.php';  //Import du fichier contenant les fonctions BDD associé aux Oeuvres
require_once BASE_PATH.'/fonctionsBDD/Comments.php';  //Import du fichier contenant les fonctions BDD associé aux Commentaires
require_once BASE_PATH.'/fonctionsBDD/Types.php';  //Import du fichier contenant les fonctions BDD associé aux Commentaires
?>
<html>
<head>
  <title>Oeuvres</title>
  <meta charset="utf-8"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body>
        <?php 
        session_start(); //Lancement de la session
        include "./../View/templates/navbar.php"; //Inclus la barre de navigation du site
        ?>
        <h1 class="h1 my-5 text-center">Oeuvres</h1>
		<div class="d-flex flex-wrap justify-content-evenly mb-5 ">
            <?php
                $collectionoeuvres = get_all_artwork(); //Récupère toute les informations de toute les oeuvres
                foreach($collectionoeuvres as $oeuvre){ //Boucles itératives d'ajout des oeuvres à la page
                    $type = get_type($oeuvre['refidtype'])['nomtype']; //Appel de la fonction pour récupérer un nom de type depuis son indice 
                    $html = "<div class='card-deck m-4 text-center' style='width: 30rem;'>";
                        if($oeuvre['imageoeuvre']){ //Condition de vérification de l'existence d'une image
                            $html = $html."<img src='./../upload/".$oeuvre['imageoeuvre']."' class='img-fluid' style='max-width: 100%; max-height: 400px;' alt='".$oeuvre['nomoeuvre']."'>";
                        }
                        else{
                            $html = $html."<img src='https://picsum.photos/200' class='img-fluid' style='max-width: 100%; max-height: 400px;' alt='".$oeuvre['nomoeuvre']."'>"; //A défaut de la condition, affichage d'une image aléatoire
                        }
                        $html = $html."<div class='card-body py-3'>
                            <h5 class='card-title'>".$oeuvre['nomoeuvre']."</h5>
                            <h4 class='card-title'><a class='link-secondary link-offset-2 link-underline-dark link-underline-opacity-10' href='./../Artistes/show_artiste.php?idartiste=".$oeuvre['idartiste']."'>".$oeuvre['pseudoartiste']."</a></h4>
                            <p class='card-text overflow-y-auto' style='height: 8em;'>".$oeuvre['descriptionoeuvre']."</p>
                            <p class='card-text'>".$type."</p>
                            <p class='card-text'><small class='text-body-secondary'>".$oeuvre['dateoeuvre']."</small></p>
                            <form method='GET' action='./show_artwork.php'><input type='hidden' name='idoeuvre' value='".$oeuvre['idoeuvre']."'/><input type='submit' value='Voir'/></form>";
                    $html = $html."</div></div>";
                    echo $html;
                }
            ?>
        </div>
        <?php include "./../View/templates/footer.php";?> <!--Inclus le pied de page du site-->
    </body>
</html>