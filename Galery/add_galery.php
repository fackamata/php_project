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

        <title>Ajout d'une galerie</title>
        </head>
        <body>
            <?php include "./../View/templates/navbar.php" ?>    <!-- Intégration de la navbar a la page -->
            <h1 class="h1 m-5 text-center">Page d'ajout des galeries</h1>
        <div class="container">
        <!-- formulaire -->
        <form action="<?php echo "./save_galery.php"?>" method="post">
        
            <div class="form-group">
                <label for="imagegalerie">Photo de présentation :</label>
                <input type="file" class="form-control" accept="image/*" name="imagegalerie" >
            <div class="form-group">
            </div>
                <label for="nomgalerie">Nom galerie :</label>
                <input type="text" class="form-control" name="nomgalerie" required>
            <div class="form-group">
            </div>
                <label for="paysgalerie">Descritpion galerie :</label>
                <input type="text" class="form-control" name="descriptiongalerie" required>
            <div class="form-group">
                </div>
                <label for="villegalerie">Ville galerie :</label>
                <input type="text" class="form-control" name="villegalerie" required>
            <div class="form-group">
            </div>
                <label for="adressegalerie">Addresse galerie :</label>
                <input type="text" class="form-control" name="adressegalerie" required>
            <div class="form-group">
            </div>  
                <label for="cpgalerie">Code postal galerie :</label>
                <input type="entier" class="form-control" name="cpgalerie" >
            <div class="form-group">
            </div>
                <label for="paysgalerie">Pays galerie :</label>
                <input type="text" class="form-control" name="paysgalerie" required>
            <div class="form-group">
            </div>
                        
            <button class="btn btn-success" type="submit" id="submit">Envoyer</button>
        </form>

            <!-- <a href="./../Galery/edit_galery.php" class="btn btn-primary">Modifier une galerie</a> -->
            <a href="./../index.php" class="btn btn-primary">Retour à la page d'acceuil</a>

        </div>
        <?php include "./../View/templates/footer.php" ?>
    </body>
</html>