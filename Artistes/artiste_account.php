<?php
require "./../config.php"; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artistes.php'; //Import du fichier contenant les fonctions BDD associé aux Artistes
require_once BASE_PATH.'/fonctionsBDD/Artworks.php'; //Import du fichier contenant les fonctions BDD associé aux Oeuvres

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
        ?>

        <div class="card" style="width: 18rem;">
            <?php if($info['imageartiste']){ //Vérification de l'upload du fichier image, si erreur alors utilisation d'une image aléatoire
               echo "<img src='./../upload/".$info['imageartiste']."' class='card-img-top' alt='".$info["pseudoartiste"]."'>"; 
            }
            else{
                echo "<img src='https://picsum.photos/200' class='card-img-top'>"; //Lien de l'image aléatoire
            }
            ?>
        
        <div class="card-body"> <!-- Affichage des informations d'un artiste-->
            <h5 class="card-title"><?php echo $info["pseudoartiste"] ?></h5>
            <p class="card-text"><?php echo $info["descriptionartiste"] ?><p>
            <p class="card-text"><?php echo $info["nomartiste"] ?><p>
            <p class="card-text"><?php echo $info["prenomartiste"] ?><p>
            <p class="card-text"><?php echo $info["emailartiste"] ?><p>
            <p class="card-text"><?php echo $info["villeartiste"] ?><p>
            <p class="card-text"><?php echo $info["paysartiste"] ?><p>
            <a href='./edit_artiste.php'><button class="btn btn-primary">modifier</button></a> <!--//Lien vers la page de modification de compte d'un artiste-->
        </div>
        </div>        
			<?php
                $collection=get_info_artwork_by_artist($_SESSION['idartiste']); //Récupère les info de toutes les oeuvres de l'artiste connecté
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
                            //Affiche une carte par oeuvres avec les infos associé
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
                echo "<p>Ajouter une Oeuvre : </p>";
                echo "<a href='./../Oeuvres/add_artwork.php'><button class='btn btn-primary'>Ajouter</button></a>";
        include "./../View/templates/footer.php";?> <!--Inclus le pied de page-->
</body>
</html>
