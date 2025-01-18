<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Types.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

?>
<html>
<head>
  <title>Saisie d'un article</title>
  <meta charset="utf-8"/>
</head>
<body>
	<header>
		
	</header>
	<center>   
        <?php
            $oeuvre=$_POST["id_oeuvre"];
            $oeuvre = unserialize($oeuvre);
            echo "<pre>";
            print_r($oeuvre);
            echo "</pre>";
            $listtype=get_info_type();
            echo "<pre>";
            print_r($listtype);
            echo "</pre>";
        ?>
            <form method='POST' action='./save_edit_artwork.php' enctype='multipart/form-data'>
                <label for="nomoeuvre">Nom de l'oeuvre : </label>
                <input type='text' name='nomoeuvre' value='<?php echo $oeuvre["nomoeuvre"]?>'></br>
                <label for="description">Description de l'oeuvre : </label>
                <input type='text' name='description' value='<?php echo $oeuvre["descriptionoeuvre"]?>'></br>
                <label for="image">Remplacer l'image de l'oeuvre : </label>
                <input type='file' name='image' accept='image/*' value='<?php echo $oeuvre["imageoeuvre"]?>'></br>
                <label for="date">Date de l'oeuvre : </label>
                <input type='date' name='date' value='<?php echo $oeuvre["dateoeuvre"]?>'></br>
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
                </select></br>
                <input type='hidden' name='idoeuvre' value='<?php echo $oeuvre["idoeuvre"]?>'>
                <input type='submit' value='Modifier'>
            </form>
        <a href="javascript:history.back()">Retour à la page de l'artiste</a>
    </center>
</body>
</html>
