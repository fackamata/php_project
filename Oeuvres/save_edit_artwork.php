<?php
require "./../config.php";

require_once BASE_PATH.'/fonctionsBDD/Artworks.php';
require_once BASE_PATH.'/fonctionsBDD/Types.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

$var = "";
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<pre>";
print_r($_FILES['image']);
echo "</pre>";
if (is_array($_FILES['image']['name'])){
    foreach (array_combine($_FILES['image']['tmp_name'], $_FILES['image']['name']) as $tmp => $name){
        move_uploaded_file($tmp, BASE_PATH."/upload/".$name);
    }
}
else{
    move_uploaded_file($_FILES['image']['tmp_name'], BASE_PATH."/upload/".$_FILES['image']['name']);
}
$var=$var."nomoeuvre = '".$_POST["nomoeuvre"]."', ";
$var=$var."descriptionoeuvre = '".$_POST["description"]."', ";
$var=$var."dateoeuvre = '".$_POST["date"]."', ";
$listtype=get_info_type();
    foreach ($listtype as $type) {
        if ($type["nomtype"] == $_POST["type"]){
            $idtype = $type["idtype"];
        }
    }
$var=$var."refidtype = '".$idtype."', ";
$var=$var."imageoeuvre = '".serialize($_FILES["image"]["name"])."'";
edit_artwork($var, $_POST["idoeuvre"]);
?>
<p>Modification prises en compte ! </p>
<a href="javascript:history.go(-2)">Retour à la page de l'artiste</a>