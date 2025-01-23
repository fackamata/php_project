<?php
require "./../config.php";  //Import d'un fichier de config contenant un chemin de base nommé BASE_PATH
require_once BASE_PATH.'/fonctionsBDD/Types.php';  //Import du fichier contenant les fonctions BDD associé aux Types

?>
<html>
<head>
  <title>Modifier une oeuvre</title>
  <meta charset="utf-8"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
        <?php
            session_start();    //Lance la session sur le navigateur
            include "./../View/templates/navbar.php";  //Inclus la barre de navigation du site
            $oeuvre=$_POST["id_oeuvre"];
            $oeuvre = unserialize($oeuvre); //Deserialise le tableau oeuvre transformer en caractère
            $listtype=get_info_type(); //Récupère les informations des types pour les utiliser
        ?>
            <!-- Formulaire d'édition d'une oeuvre d'art avec les champ pré rempli par les précédentes valeurs-->
            <form action="<?php echo "./save_edit_artwork.php"?>" class="container" method="post" enctype='multipart/form-data'>
                <div class="form-group">
                    <label for="nomoeuvre">Nom de l'oeuvre : </label>
                    <input type='text' class="form-control" name='nomoeuvre' value='<?php echo $oeuvre["nomoeuvre"]?>'>
                </div>
                <div class="form-group">
                    <label for="description">Description de l'oeuvre : </label>
                    <input type='text' class="form-control" name='description' value='<?php echo $oeuvre["descriptionoeuvre"]?>'>
                </div>
                <div class="form-group">
                    <label for="image">Remplacer l'image de l'oeuvre : </label>
                    <input type='file' class="form-control" name='image' accept='image/*' value='<?php echo $oeuvre["imageoeuvre"]?>'>
                </div>
                <div class="form-group">
                    <label for="date">Date de l'oeuvre : </label>
                    <input type='date' class="form-control" name='date' value='<?php echo $oeuvre["dateoeuvre"]?>'></br>
                </div>  
                <!--Gestion de l'affichage de liste déroulante des types Avec sélection du type actuel de l'oeuvre--> 
                <div class="form-group">
                    <label for="type">Type de l'oeuvre : </label>
                    <select name='type' class="form-select" aria-label="Default select example" required>
                        <?php foreach ($listtype as $type) {
                            if ($type['idtype'] == $oeuvre['refidtype']){
                                echo "<option value='".$type["idtype"]."' selected>".$type["nomtype"]."</option>";
                            }
                            else{
                                echo "<option value='".$type["idtype"]."'>".$type["nomtype"]."</option>";
                            }
                            }?>
                    </select>
                </div>
                <input type='hidden' name='idoeuvre' value='<?php echo $oeuvre["idoeuvre"]?>'>
                <button class="btn btn-success" type="submit">Modifier</button>
            </form>
    <?php include "./../View/templates/footer.php";?> <!--Inclus le pied de page-->
</body>
</html>
