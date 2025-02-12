<?php
require "./../config.php"; //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Artistes.php'; //Import du fichier contenant les fonctions BDD associé aux Artistes
require_once BASE_PATH.'/fonctionsBDD/Artworks.php'; //Import du fichier contenant les fonctions BDD associé aux Oeuvres
require_once BASE_PATH.'/fonctionsBDD/Exposer.php';  //Import du fichier contenant les fonctions BDD associé aux Exposition dans les galeries


?>
<html>
<head>
  <title>Artiste</title>
  <meta charset="utf-8"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        session_start(); //Lance la session
        include "./../View/templates/navbar.php"; //Inclus la barre de navigation du site
        $artiste=get_info_artiste($_GET["idartiste"]); //Récupère les informations d'un artiste pour les afficher
        $galerie = get_galery_by_id_artiste($_GET["idartiste"]); //Récupère le nom de la galerie d'exposition de l'artiste pour l'afficher
        if(isset($_SESSION['idclient'])){
            $idclient = $_SESSION['idclient'];
        }
    ?>
    <h1 class="h1 my-5 text-center"><?php echo $artiste["pseudoartiste"]?></h1>
    <div class="d-flex py-4 px-5 mx-5 flex-md-row flex-sm-column justify-content-around align-items-center">
        <?php if($artiste['imageartiste']){  //Vérification de l'upload du fichier image, si erreur alors utilisation d'une image aléatoire
                echo "<img src='./../upload/".$artiste['imageartiste']."' class='img-fluid' style='max-width: 100%; max-height: 400px;' alt='".$artiste['pseudoartiste']."'>";
            }
            else{
                echo "<img src='https://picsum.photos/200' class='img-fluid' style='max-width: 100%; max-height: 400px;' alt='".$artiste['pseudoartiste']."'>";  //Lien de l'image aléatoire
            }
            ?>
                <!-- Carte d'un artiste -->
				<div class="d-flex px-5 mx-5 flex-column">
					<p class='card-text'><?php echo $artiste['nomartiste']?></p>
					<p class='card-text'><?php echo $artiste['prenomartiste']?></p>
					<p class='card-text'><?php echo $artiste['descriptionartiste']?></p>
                    <p class='card-text'><a href='./../../Galery/one_galery.php?idgalerie=<?php echo $galerie['idgalerie'] ?>'><?php echo $galerie['nomgalerie'] ?> </a></p>
				</div>
				<ul class='list-group list-group-flush'>
					<li class='list-group-item'><?php echo $artiste['paysartiste']?></li>
					<li class='list-group-item'><?php echo $artiste['villeartiste']?></li>
					<li class='list-group-item'><?php echo $artiste['emailartiste']?></li>

                    <!-- Condition d'affichage du bouton favoris d'un artiste, le client doit-être connecté-->
                    <?php if (isset($_SESSION['idclient'])) { //Condition de vérification de session d'un client
                        ?>
                        <!--Formulaire pour l'utilisation du bouton "favoris"-->
                        <form method="POST" 
                            action="<?php 
                                    $idartiste = $artiste['idartiste'];
                                    echo "./../Marlene/home.php?ctrl=preferredartiste&fct=new_preferredartiste&idclient=".$idclient."&idartiste=".$idartiste ;
                                    ?>" >
                            <input type='hidden' name='idartiste' value='<?php echo $artiste['idartiste']?>'/>
                            <input type='hidden' name='idclient' value='<?php echo $_SESSION['idclient']?>'/>
                            <button type='submit' class='btn btn-primary'>Favoris</button>
                        </form>
                        <?php
                    } ?>
                    
				</ul>
	</div>
    <div class="d-flex flex-wrap justify-content-evenly mb-5 ">
    <?php
        $idartiste = pg_escape_string($_GET['idartiste']);
        $collection=get_info_artwork_by_artist($idartiste); //Récupération des infos de toutes les oeuvres d'un artiste
        foreach ($collection as $oeuvre){
            //Création d'une carte par oeuvre
            $html = "<div class='card-deck m-4 text-center' style='width: 30rem;'>";
            if($oeuvre['imageoeuvre']){
                $html = $html."<img src='./../upload/".$oeuvre['imageoeuvre']."' class='img-fluid' style='max-width: 100%; max-height: 400px;' alt='".$oeuvre['nomoeuvre']."'>";
            }
            else{
                $html = $html."<img src='https://picsum.photos/200' class='img-fluid' style='max-width: 100%; max-height: 400px;' alt='".$oeuvre['nomoeuvre']."'>";
            }
            $html = $html."
                <div class='card-body py-4'>
                <h5 class='card-title'>".$oeuvre['nomoeuvre']."</h5>
                <p class='card-text overflow-y-auto' style='height: 8em;''>".$oeuvre['descriptionoeuvre']."</p>
                <p class='card-text'><small class='text-body-secondary'>".$oeuvre['dateoeuvre']."</small></p>
                <form method='GET' action='./../Oeuvres/show_artwork.php'><input type='hidden' name='idoeuvre' value='".$oeuvre['idoeuvre']."'/><input type='submit' value='Voir'/></form>";
            $html = $html."</div></div>";
            echo $html;
        }
        ?>
    </div>
        <?php include "./../View/templates/footer.php";?> <!--Inclus le pied de page-->
</body>
</html>
