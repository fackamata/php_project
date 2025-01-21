<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Types.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

?>
<html>
<head>
  <title>Saisie d'un article</title>
  <meta charset="utf-8"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<header>
		
	</header>
	<center>   
        <?php
            session_start();
            include "./../View/templates/navbar.php";
            $oeuvre=$_POST["id_oeuvre"];
            $oeuvre = unserialize($oeuvre);
            $listtype=get_info_type();
        ?>
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
                <div class="form-group">
                    <label for="type">Type de l'oeuvre : </label>
                    <select name='type' required>
                        <?php foreach ($listtype as $type) {
                            if ($type['idtype'] == $oeuvre['refidtype']){
                                echo "<option value='".$type["nomtype"]."' selected>".$type["nomtype"]."</option>";
                            }
                            else{
                                echo "<option value='".$type["nomtype"]."'>".$type["nomtype"]."</option>";
                            }
                            }?>
                    </select>
                </div>
                <input type='hidden' name='idoeuvre' value='<?php echo $oeuvre["idoeuvre"]?>'>
                <button class="btn btn-success" type="submit">Modifier</button>
            </form>
    </center>
    <?php include "./../View/templates/footer.php";?>
</body>
</html>
