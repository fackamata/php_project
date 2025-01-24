<?php
require './../config.php';
require_once './../fonctionsBDD/Goodies.php';
require_once './../fonctionsBDD/Artworks.php';

?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        </head>
        <body>
            <?php include "./../View/templates/navbar.php";
            $listoeuvre = get_all_artwork(); //Récupère la liste des galeries pour que l'artiste sélectionne sa galerie d'exposition
            ?>    <!-- Intégration de la navbar a la page -->
            <h1 class="h1 m-5 text-center">Page d'ajout des goodies</h1>
        <div class="container">
        <!-- formulaire -->
        <form action="<?php echo "./save_goodies.php"?>" method="post">
        
            <div class="form-group">
                <label for="nomobject">Nom object :</label>
                <input type="text" class="form-control" name="nomobject" required>
            <div class="form-group">
            </div>
                <label for="prixobject">Prix object :</label>
                <input type="entier" class="form-control" name="prixobject" required>
            <div class="form-group">
            </div>
            <div class="form-group">
                <label for="refidoeuvre">Selectionner une oeuvre : </label>
                <select name='refidoeuvre' class="form-select" required>
                    <option value='' selected></option>
                    <?php foreach ($listoeuvre as $oeuvre) {
                            echo "<option value='".$oeuvre['idoeuvre']."'>".$oeuvre['nomoeuvre']."</option>";
                        }?>
                </select>
            <div class="form-group">
            <!-- </div> 
                <label for="refidoeuvre">Numéro de l'oeuvre référante :</label>
                <input type="entier" class="form-control" name="refidoeuvre" required>
            <div class="form-group"> -->
            </div>
                <label for="paysobject">Descritpion object :</label>
                <input type="text" class="form-control" name="descriptionobject" required>
            <div class="form-group">
            </div>  
                <label for="imageobject">Photo de présentation :</label>
                <input type="file" class="form-control" accept="image/*" name="imageobject" >
            <div class="form-group">
            </div>

            <button class="btn btn-success" type="submit" id="submit">Créer</button>
        </form>

            <!-- <a href="./../Galery/edit_goodies.php" class="btn btn-primary">Modifier le goodie</a> -->
            <a href="./../index.php" class="btn btn-primary">Retour à la page d'acceuil</a>

        </div>
        <?php include "./../View/templates/footer.php" ?>
    </body>
</html>