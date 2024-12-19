<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Types.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)
?>
<html>
<head>
  <!-- Affichage du parametre dans le titre dela page -->
   <!-- <script defer src="./client_compte.js"></script> -->
  <title>Saisie d'un client</title>
  <meta charset="utf-8"/>
</head>
<body>
	<header>
		
	</header>

	<center>
        <?php
            echo "<pre>";
            print_r($_GET);
            echo "</pre>";
            $listtype=get_info_type();
        ?>
        <form method='POST' action='./save_add_artwork.php' enctype='multipart/form-data'>
            <label for="nomoeuvre">Nom de l'oeuvre : </label>
            <input type='text' name='nomoeuvre' placeholder='La Joconde' required></br>
            <label for="description">Description de l'oeuvre : </label>
            <input type='text' name='description' placeholder='Tableau de Léonard de Vinci...'></br>
            <label for="image[]">Images de l'oeuvre : </label>
            <input type='file' name='image[]' accept='image/*' multiple></br>
            <label for="date">Date de l'oeuvre : </label>
            <input type='date' name='date' value='".date("Y-m-d")."'></br>
            <label for="type">Type de l'oeuvre : </label>
            <select name='type' required>
                <option value='' selected></option>
                <?php foreach ($listtype as $type) {
                    echo "<option value='".$type["nomtype"]."'>".$type["nomtype"]."</option>";
                }?>
            </select></br>
            <input type='submit' value='Ajouter'>
        </form>
    </center>
</body>
</html>
