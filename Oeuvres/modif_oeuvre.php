<?php
require_once './../fonctionsBDD/ConnexionBDD.php'; // déclaration du fichier contenant des fonctions pouvant être appelées
$conn1=connexionBDD('./../Utils/paramCon.php'); // appel de la fonction connexionBDD. Le résultat retourné sera dans la variable $conn1
// a partir d'ici, on est connecté à la BDD acec le connecteur $conn1<
require_once './../fonctionsBDD/Types.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

?>
<html>
<head>
  <!-- Affichage du parametre dans le titre dela page -->
   <!-- <script defer src="./artiste_compte.js"></script> -->
  <title>Saisie d'un article</title>
  <meta charset="utf-8"/>
</head>
<body>
	<header>
		
	</header>
	<center>   
        <?php
            $oeuvre=$_GET["id_oeuvre"];
            $oeuvre = unserialize($oeuvre);
            echo "<pre>";
            print_r($oeuvre);
            echo "</pre>";
            $listtype=get_info_type($conn1);
            echo "<form method='GET' action='./enregistremodif_oeuvre.php' enctype='multipart/form-data'>";
            echo "Nom de l'oeuvre : <input type='text' name='nomoeuvre' placeholder='".$oeuvre["nomoeuvre"]."'></br>";
            echo "Description de l'oeuvre : <input type='text' name='description' placeholder='".$oeuvre["description"]."'></br>";
            echo "Image de l'oeuvre : <input type='file' name='image' accept='image/*' multiple></br>";
            echo "Date de l'oeuvre : <input type='date' name='date' value='".$oeuvre["date"]."'></br>";
            echo "Type de l'oeuvre : <select name='type'>";
            echo "<option value='' selected></option>";
            foreach ($listtype as $type) {
                echo "<option value='".$type["nomtype"]."'>".$type["nomtype"]."</option>";
            }
            echo "</select></br>";
            echo "<input type='hidden' name='idoeuvre' value='".$oeuvre["idoeuvre"]."'>";
            echo "<input type='submit' value='Modifier'>";
            echo "</form>";
        ?>
        <a href="javascript:history.back()">Retour à la page de l'artiste</a>
    </center>
</body>
</html>
