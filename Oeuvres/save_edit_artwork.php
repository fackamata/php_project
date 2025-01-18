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
echo "../image/".$_FILES['image']['name'];
echo "</br>";
echo $_FILES['image']['tmp_name'];
if (!(move_uploaded_file($_FILES['image']['tmp_name'], "../upload/".$_FILES['image']['name']))){
    $_FILES["image"]["name"] = 'no_img.png';
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
$var=$var."imageoeuvre = '".$_FILES["image"]["name"]."'";
edit_artwork($var, $_POST["idoeuvre"]);
header('Location: ./../Artistes/artiste_account.php');
?>
<p>Modification prises en compte ! </p>