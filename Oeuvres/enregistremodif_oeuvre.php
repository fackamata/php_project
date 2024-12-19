<?php
require_once './../fonctionsBDD/ConnexionBDD.php'; // déclaration du fichier contenant des fonctions pouvant être appelées
$conn1=connexionBDD('./../Utils/paramCon.php'); // appel de la fonction connexionBDD. Le résultat retourné sera dans la variable $conn1
// a partir d'ici, on est connecté à la BDD acec le connecteur $conn1

require_once './../fonctionsBDD/Oeuvres.php';
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
    <?php
        $var = "";
        echo "<pre>";
        print_r($_GET);
        echo "</pre>";
        echo "<pre>";
        print_r($_FILES['image']);
        echo "</pre>";
        if ($_GET["nomoeuvre"]){
            $var=$var."nomoeuvre = '".$_GET["nomoeuvre"]."', ";
        }
        if ($_GET["description"]){
            $var=$var."description = '".$_GET["description"]."', ";
        }
        if ($_GET["date"]){
            $var=$var."date = '".$_GET["date"]."', ";
        }
        if ($_GET["type"]){
            $listtype=get_info_type($conn1);
            foreach ($listtype as $type) {
                if ($type["nomtype"] == $_GET["type"]){
                    $idtype = $type["idtype"];
                }
            }
            $var=$var."refidtype = '".$idtype."', ";
        }
        $var=rtrim($var, ", ");
        enregistremodif_oeuvre($var, $_GET["idoeuvre"], $conn1);
    ?>
	<p>Modification prises en compte ! </p>
    <a href="javascript:history.back()">Retour à la page de l'oeuvre</a>
</body>
</html>
