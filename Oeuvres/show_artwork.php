<?php
require "./../config.php";  //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artworks.php';  //Import du fichier contenant les fonctions BDD associé aux Oeuvres
require_once BASE_PATH.'/fonctionsBDD/Comments.php'; //Import du fichier contenant les fonctions BDD associé aux Commentaires
require_once BASE_PATH.'/fonctionsBDD/Types.php';  //Import du fichier contenant les fonctions BDD associé aux Types
?>
<html>
<head>
  <title>Oeuvre</title>
  <meta charset="utf-8"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
    <?php 
    session_start();  //Lance la session sur le navigateur
    include "./../View/templates/navbar.php"; //Inclus la barre de navigation du site
    $idoeuvre = pg_escape_string($_GET['idoeuvre']);
    $oeuvre = get_info_artwork($idoeuvre); //Récupère les informations d'une en oeuvre en BDD
    $type = get_type($oeuvre['refidtype'])['nomtype']; //Appel de la fonction pour récupérer un nom de type depuis son indice 
    ?>
    <body>
        <h1 class="h1 my-5 text-center"><?php echo $oeuvre["nomoeuvre"]?></h1>
        <div class="d-flex py-4 px-5 mx-5 flex-md-row flex-sm-column justify-content-around align-items-center">
                <?php if($oeuvre['imageoeuvre']){ //Test si une image existe, sinon en affiche une aléatoire
                    echo "<img src='./../upload/".$oeuvre['imageoeuvre']."' class='img-fluid' style='max-width: 100%; max-height: 400px;' alt='".$oeuvre['nomoeuvre']."'>";
                }
                else{
                    echo "<img src='https://picsum.photos/200' class='img-fluid' style='max-width: 100%; max-height: 400px;' alt='".$oeuvre['nomoeuvre']."'>";
                }
                ?>
            </div>
            <!--Affichage carte d'une oeuvre-->
            <div class="d-flex px-5 mx-5 flex-column justify-content-center">
                    <h4 class='card-title' style='text-align: center;'><a href='./../Artistes/show_artiste.php?idartiste=<?php echo $oeuvre['idartiste']?>'><?php echo $oeuvre['pseudoartiste'] ?></a></h4>
                    <p class='card-text' style='text-align: center;'><?php echo $type ?></p>
                    <p class='card-text' style='text-align: center;'><?php echo $oeuvre['descriptionoeuvre'] ?></p>
                    <p class='card-text' style='text-align: center;'><small class='text-body-secondary'><?php echo $oeuvre['dateoeuvre'] ?></small></p>
        </div>
        <div class='container-fluid'>
        <?php
            $comments = get_info_comment($oeuvre['idoeuvre']); //Récupère les commentaires sur une oeuvre
            if(isset($_SESSION['pseudoclient'])){ //Test si le client est connecté pour afficher l'invité de commentaire
                $commentaire = false;
                foreach ($comments as $comment){
                    if ($comment['pseudoclient'] == $_SESSION['pseudoclient']){ //Vérifie si le client a déjà mis un commentaire
                        $commentaire = true;
                    }
                }
                if(!$commentaire){ //Affiche en conséquence si client connecté et n'as pas encore mit de commentaire
                    echo "<form method='POST' action='./../Coments/save_comment.php'>
                            <div class='mb-3'>
                            <label for='commentaire' class='form-label'>Commentaire : </label>
                            <textarea class='form-control' name='commentaire' rows='3'></textarea>
                            </div>
                            <button type='submit' class='btn btn-primary'>Enregistrer</button>
                            <input type='hidden' name='idclient' value='".$_SESSION['idclient']."'>
                            <input type='hidden' name='idoeuvre' value='".$oeuvre['idoeuvre']."'>
                            </form>";
                }
            }
            foreach ($comments as $comment){ //Affiche tout les commentaires liés à l'oeuvre
                $html = "<div class='card container'>
                    <div class='card-header'>
                        ".$comment['pseudoartiste']."";
                if (isset($_SESSION['pseudoclient']) && $comment['pseudoclient'] == $_SESSION['pseudoclient']){ //Ajoute le bouton de suppression sur le commentaire lié au client connecté
                    $html = $html."<form action='./../Coments/delete_comment.php' method='POST'><input type='hidden' name='idoeuvre' value='".$oeuvre['idoeuvre']."'/>
                    <button class='btn btn-danger' type='submit'><i class='fas fa-trash-alt'></i></button>";
                }
                $html = $html."</div><div class='card-body'>
                        <blockquote class='blockquote mb-0'>
                        <p>".$comment['message']."</p>
                        <footer class='blockquote-footer'>".$comment['pseudoclient']." - ".$comment['datecommentaire']."</footer>
                        </blockquote>
                    </div>
                    </div>";
                    echo $html;
            }
        ?>
        </div>
        <?php include "./../View/templates/footer.php";?> <!--Inclus le pied de page-->
    </body>
</html>
