<?php
require "./../config.php"; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artistes.php'; //Import du fichier contenant les fonctions BDD associé aux Artistes
require_once BASE_PATH.'/fonctionsBDD/Artworks.php'; //Import du fichier contenant les fonctions BDD associé aux Oeuvres
require_once BASE_PATH.'/fonctionsBDD/Types.php'; //Import du fichier contenant les fonctions BDD associé aux Types
require_once BASE_PATH.'/fonctionsBDD/Exposer.php';  //Import du fichier contenant les fonctions BDD associé aux Exposition dans les galeries

?>
<html>
<head>
  <title>Compte Artiste</title>
  <meta charset="utf-8"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
		<?php
            session_start(); //Lance la session sur le navigateur
            include "./../View/templates/navbar.php"; //Inclus la barre de navigation du site
            $info=get_info_artiste($_SESSION["idartiste"]); //Récupère les informations d'un artiste pour les afficher
            $galerie = get_galery_by_id_artiste($_SESSION["idartiste"])['nomgalerie']; //Récupère le nom de la galerie d'exposition de l'artiste pour l'afficher
        ?>

            <div class="d-flex py-4 px-5 mx-5 flex-md-row flex-sm-column justify-content-around align-items-center">
            <?php if($info['imageartiste']){ //Vérification de l'upload du fichier image, si erreur alors utilisation d'une image aléatoire
               echo "<img src='./../upload/".$info['imageartiste']."' class='img-fluid' style='max-width: 100%; max-height: 400px;' alt='".$info["pseudoartiste"]."'>"; 
            }
            else{
                echo "<img src='https://picsum.photos/200' class='img-fluid' style='max-width: 100%; max-height: 400px;'>"; //Lien de l'image aléatoire
            }
            ?>
        
        <div class="d-flex px-5 mx-5 flex-column"> <!-- Affichage des informations d'un artiste-->
            <h5 class="card-title"><?php echo $info["pseudoartiste"] ?></h5>
            <p class="card-text"><?php echo $info["descriptionartiste"] ?><p>
            <p class="card-text"><?php echo $galerie ?></p>
        </div>
        <ul class='list-group list-group-flush py-3'>
            <li class="list-group-item">Nom : <?php echo $info["nomartiste"] ?></li>
            <li class="list-group-item">Prenom : <?php echo $info["prenomartiste"] ?></li>
            <li class="list-group-item">Email : <?php echo $info["emailartiste"] ?></li>
            <li class="list-group-item">Ville : <?php echo $info["villeartiste"] ?></li>
            <li class="list-group-item">Pays : <?php echo $info["paysartiste"] ?></li>
            <a href='./edit_artiste.php'><button class="btn btn-primary my-2">modifier</button></a> <!--//Lien vers la page de modification de compte d'un artiste-->
        </ul>
        </div>
        <div class="d-flex flex-wrap justify-content-evenly mb-5 ">       
			<?php
                $collection=get_info_artwork_by_artist($_SESSION['idartiste']); //Récupère les info de toutes les oeuvres de l'artiste connecté
                foreach ($collection as $oeuvre){
                    $type = get_type($oeuvre['refidtype'])['nomtype']; //Appel de la fonction pour récupérer un nom de type depuis son indice 
                    echo "<div class='card mb-3' style='max-width: 540px;'>
                        <div class='row g-0'>
                            <div class='col-md-4'>";
                            if ($oeuvre['imageoeuvre']){
                                echo "<img src='./../upload/".$oeuvre['imageoeuvre']."' class='img-fluid' style='max-width: 100%; max-height: 400px;' alt='".$oeuvre['nomoeuvre']."'>";
                            }
                            else{
                                echo "<img src='https://picsum.photos/200' class='img-fluid' style='max-width: 100%; max-height: 400px;'>";
                            }  
                            //Affiche une carte par oeuvres avec les infos associé
                            echo "</div> 
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$oeuvre['nomoeuvre']."</h5>
                                    <p class='card-text'>".$oeuvre['descriptionoeuvre']."</p>
                                    <p class='card-text'>".$type."</p>
                                    <p class='card-text'><small class='text-body-secondary'>".$oeuvre['dateoeuvre']."</small></p>
                                </div>
                                <form method='POST' action='./../Oeuvres/edit_artwork.php'><button class='btn btn-primary' name='id_oeuvre' value='".serialize($oeuvre)."'>modifier</button></form>
                                <form method='POST' action='./../Coments/show_comments.php'><button class='btn btn-primary' name='id_oeuvre' value='".$oeuvre["idoeuvre"]."'>commentaire</button></form>
                                <form method='POST' action='./../Oeuvres/delete_artwork.php'><button class='btn btn-primary' name='id_oeuvre' value='".$oeuvre["idoeuvre"]."'>Supprimer</button></form>
                            </div>
                        </div>
                    </div>";
                }
                ?>
                </div>
                <p style='text-align: center;'>Ajouter une Oeuvre : </p>
                <div class="d-flex justify-content-center"><a href='./../Oeuvres/add_artwork.php'><button class='btn btn-primary'>Ajouter</button></a></div>
        <?php include "./../View/templates/footer.php";?> <!--Inclus le pied de page-->
</body>
</html>
