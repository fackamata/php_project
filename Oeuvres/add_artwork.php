<?php
require "./../config.php";  //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Types.php'; //Import du fichier contenant les fonctions BDD associé aux Types
?>
<html>
<head>
  <title>Ajout d'oeuvre d'art</title>
  <meta charset="utf-8"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
        <?php
            session_start();  //Lance la session sur le navigateur
            include "./../View/templates/navbar.php";  //Inclus la barre de navigation du site
            $listtype=get_info_type();  //Récupère les informations des types pour les utiliser
        ?>
        <!-- Formulaire de création d'une oeuvre d'art-->
        <form class='container' action="./save_add_artwork.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nomoeuvre">Nom de l'oeuvre : </label>
                <input type="text" class="form-control" name="nomoeuvre" placeholder='La Joconde' required>
            </div>
            <div class="form-group">
                <label for="description">Description de l'oeuvre : </label>
                <input type="text" class="form-control" name="description" placeholder='Tableau de Léonard de Vinci...'>
            </div>
            <div class="form-group">
                <label for="image">Image de l'oeuvre : </label>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="date">Date de l'oeuvre : </label>
                <input type="date" class="form-control" name="date" value='".date("Y-m-d")."' required>
            </div>
            <!-- Gestion de l'affichage de liste déroulante des types-->
            <div class="form-group">
                <label for="type">Type de l'oeuvre : </label>
                <select name='type' class='form-control' required>
                    <option value='' selected></option>
                    <?php foreach ($listtype as $type) {
                    echo "<option value='".$type["idtype"]."'>".$type["nomtype"]."</option>";
                }?>
                </select>
            </div>
            <button class="btn btn-success" type="submit">Ajouter</button>
        </form>
    <?php include "./../View/templates/footer.php"; ?> <!--Inclus le pied de page-->
</body>
</html>
