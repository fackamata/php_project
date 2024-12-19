<?php
require_once './../fonctionsBDD/ConnexionBDD.php'; // déclaration du fichier contenant des fonctions pouvant être appelées
$conn1=connexionBDD('./../Utils/paramCon.php'); // appel de la fonction connexionBDD. Le résultat retourné sera dans la variable $conn1
// a partir d'ici, on est connecté à la BDD acec le connecteur $conn1

require_once './../fonctionsBDD/Oeuvres.php';
require_once './../fonctionsBDD/Types.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)
ini_set('upload_tmp_dir', '/var/www/RT/2ALT5/image/');
?>
<html>
<head>
  <!-- Affichage du parametre dans le titre dela page -->
   <!-- <script defer src="./artiste_compte.js"></script> -->
  <title>Saisie d'un article</title>
  <meta charset="utf-8"/>
</head>
<body>
    <img src="<?php $_FILES['image']['tmp_name'][0] ?>" alt="<?php $_FILES['image']['tmp_name'][0] ?>">
    <?php
        $var = "";
        $cont = "";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        foreach (array_combine($_FILES['image']['tmp_name'], $_FILES['image']['name']) as $tmp => $name){
            move_uploaded_file($tmp, "/var/www/RT/2ALT5/upload/".$name);
        }
        if ($_POST["nomoeuvre"]){
            $var=$var."'".$_POST["nomoeuvre"]."', ";
            $cont=$cont."nomoeuvre, ";
        }
        if ($_POST["description"]){
            $var=$var."'".$_POST["description"]."', ";
            $cont=$cont."description, ";
        }
        if ($_POST["date"]){
            $var=$var."'".$_POST["date"]."', ";
            $cont=$cont."date, ";
        }
        if ($_FILES["image"]["name"]){
            $var=$var."'".serialize($_FILES["image"]["name"])."', ";
            $cont=$cont."img, ";
        }
        if ($_POST["type"]){
            $listtype=get_info_type($conn1);
            foreach ($listtype as $type) {
                if ($type["nomtype"] == $_POST["type"]){
                    $idtype = $type["idtype"];
                }
            }
            $var=$var."'".$idtype."', ";
            $cont=$cont."refidtype, ";
        }
        //$var=rtrim($var, ", ");
        //$cont=rtrim($cont, ", ");
        $idartiste = $_POST["idartiste"];
        $var=$var."'".$idartiste."'";
        $cont=$cont."refartiste";
        echo $idartiste;
        echo $var;
        echo $cont."</br>";
        enregistreajout_oeuvre($var, $cont, $conn1);
    ?>
	<p>Ajout pris en compte ! </p>
    <a href="javascript:history.back()">Retour à la page de création</a>
</body>
</html>
