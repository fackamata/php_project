<?php
require "./../config.php";

require_once BASE_PATH.'/fonctionsBDD/Artworks.php';
require_once BASE_PATH.'/fonctionsBDD/Types.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)

//$var = "";
echo "POST : ";
echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "FILES : ";
echo "<pre>";
print_r($_FILES);
echo "</pre>";

if (!(move_uploaded_file($_FILES['image']['tmp_name'], "../upload/".$_FILES['image']['name']))){
    echo "<p>Problème lors de la copie du fichier image...</p>";
    $_FILES['image']['name'] = '';
}

$listtype=get_info_type();
    foreach ($listtype as $type) {
        if ($type["nomtype"] == $_POST["type"]){
            $idtype = $type["idtype"];
        }
    }

$nomoeuvre = pg_escape_string($_POST['nomoeuvre']);
$descriptionoeuvre = pg_escape_string($_POST['description']);
$dateoeuvre = pg_escape_string($_POST['date']);
$idtype = pg_escape_string($idtype);
$imageoeuvre = pg_escape_string($_FILES['image']['name']);
edit_artwork($nomoeuvre, $descriptionoeuvre, $dateoeuvre, $idtype, $imageoeuvre, $_POST['idoeuvre']);
//header('Location: ./../Artistes/artiste_account.php');
?>