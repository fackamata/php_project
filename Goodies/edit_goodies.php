<?php
require './../config.php';
require_once './../fonctionsBDD/Goodies.php';

?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
    <?php include "./../View/templates/navbar.php" ?>    <!-- Intégration de la navbar a la page -->
    <h1>Page de modification des goodies</h1>
    <?php $goodies = get_goodies_by_id($_GET["idobject"]);
    // echo "<pre>";
    // print_r($goodies[0]);
    // echo "</pre>";
    
    ?>

        <div class="container">
        <!-- formulaire -->
        <form action="<?php echo "./to_update_goodies.php?idobject=".$_GET["idobject"]?>" method="post">
        
        <div class="form-group">
            <label for="nomobject">Nom object :</label>
            <input type="text" class="form-control" name="nomobject" value="<?php echo $goodies[0]['nomobject'];?>" required>
        <div class="form-group">
        </div>
            <label for="prixobject">Prix object :</label>
            <input type="entier" class="form-control" name="prixobject" value="<?php echo $goodies[0]['prixobject'];?>" required>
        <div class="form-group">
        <!-- </div>
            <label for="refidoeuvre">Numéro de l'oeuvre référante :</label>
            <input type="entier" class="form-control" name="refidoeuvre" required>
        <div class="form-group"> -->
        </div>
            <label for="descriptionobject">Descritpion object :</label>
            <input type="text" class="form-control" name="descriptionobject" value="<?php echo $goodies[0]['descriptionobject'];?>" required>
        <div class="form-group">
        </div>  
            <label for="imageobject">Photo de présentation :</label>
            <input type="file" class="form-control" accept="image/*" name="imageobject" value="<?php echo $goodies[0]['imageobject'];?>">
        <div class="form-group">
        </div>

        <button class="btn btn-success" type="submit" id="submit">Modifier</button>
        </br>
        <a href="<?php echo "./delete_goodies.php?idobject=".$_GET["idobject"]?>" class="btn btn-danger">Supprimer</a>
        </br>
        <a href="./all_goodies.php" class="btn btn-primary">Retour à tous les goodies</a>
        </br>
        <a href="./../index.php" class="btn btn-primary">Retour à la page d'acceuil</a>

        </div>
    </body>
</html>