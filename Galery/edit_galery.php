<?php
require './../config.php';
require_once './../fonctionsBDD/Galery.php';

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
    <h1>Page de modification des galeries</h1>
    <?php $galeries = get_galery_by_id($_GET["idgalerie"]);
    echo "<pre>";
    print_r($galeries[0]);
    echo "</pre>";
    
    ?>

        <div class="container">
        <!-- formulaire -->
        <form action="<?php echo "./to_update_galery.php?idgalerie=".$_GET["idgalerie"]?>" method="post">
        
            <div class="form-group">
                <label for="imagegalerie">Photo de présentation :</label>
                <input type="file" class="form-control" accept="image/*" value="<?php echo $galeries[0]['imagegalerie'];?>" name="imagegalerie" >
            <div class="form-group">
                <label for="nomgalerie">Nom galerie :</label>
                <input type="text" class="form-control" value="<?php echo $galeries[0]['nomgalerie'];?>" name="nomgalerie" required>
            <div class="form-group">
            </div>
                <label for="paysgalerie">Descritpion galerie :</label>
                <input type="text" class="form-control" value="<?php echo $galeries[0]['descriptiongalerie'];?>" name="descriptiongalerie" required>
                <div class="form-group">
            </div>
                <label for="villegalerie">Ville galerie :</label>
                <input type="text" class="form-control" value="<?php echo $galeries[0]['villegalerie'];?>" name="villegalerie" required>
            <div class="form-group">
            </div>
                <label for="addressegalerie">Addresse galerie :</label>
                <input type="text" class="form-control" value="<?php echo $galeries[0]['adressegalerie'];?>" name="adressegalerie" required>
            <div class="form-group">
            </div>  
                <label for="cpgalerie">Code postal galerie :</label>
                <input type="entier" class="form-control" value="<?php echo $galeries[0]['cpgalerie'];?>" name="cpgalerie" required>
            <div class="form-group">
            </div>
                <label for="paysgalerie">Pays galerie :</label>
                <input type="text" class="form-control" value="<?php echo $galeries[0]['paysgalerie'];?>" name="paysgalerie" required>
            <div class="form-group">
            </div>
                        
            <button class="btn btn-success" type="submit" id="submit">Modifier</button>
        </form>
        </br>
        <?php echo $_GET["idgalerie"]?>
        <?php echo "./delete_galery.php?idgalerie=".$_GET["idgalerie"]?>
        <form action="<?php echo "./delete_galery.php?idgalerie=".$_GET["idgalerie"]?>">
            <button class="btn btn-danger" type="submit" id="submit">Supprimer</button>
        </form>
            </br>
            <a href="./../index.php" class="btn btn-primary">Retour à la page d'acceuil</a>

        </div>
    </body>
</html>