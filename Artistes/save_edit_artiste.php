<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artistes.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
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
    <?php
        session_start();
        $var = "";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        $var=$var."nomartiste = '".$_POST["nom"]."', "; // Ajoute le nom de l'artiste modifier
        $var=$var."descriptionartiste = '".$_POST["description"]."', "; //Ajoute le description de l'artiste modifier
        $var=$var."prenomartiste = '".$_POST["prenom"]."', "; //Ajoute le prénom de l'artiste modifier
        $var=$var."villeartiste = '".$_POST["ville"]."', "; //Ajoute la ville de l'artiste modifier
        $var=$var."paysartiste = '".$_POST["pays"]."', "; //Ajoute le pays de l'artiste modifier
        $var=$var."emailartiste = '".$_POST["email"]."', "; //Ajoute l'email de l'artiste modifier
        $var=$var."pseudoartiste = '".$_POST["pseudo"]."'"; //Ajoute l'email de l'artiste modifier
        edit_artiste($var, $_POST["idartiste"]);
    ?>
	<p>Modification prises en compte ! </p>
    <?php header('Location: ./artiste_account.php')?>
</body>
</html>
