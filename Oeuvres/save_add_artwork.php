<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artworks.php'; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
//require_once 'fonctionSys.php'; // déclaration du fichier contenant des fonctions orientées système (filtrage)
session_start();
$nomoeuvre = pg_escape_string($_POST["nomoeuvre"]);
$description = pg_escape_string($_POST["description"]);
$date = pg_escape_string($_POST["date"]);
$idtype = $_POST["type"];
if (!(move_uploaded_file($_FILES['image']['tmp_name'], "../upload/".$_FILES['image']['name']))){
    $_FILES["image"]["name"] = '';
}
$image = pg_escape_string($_FILES["image"]["name"]);
add_artwork($nomoeuvre, $description, $date, $image, $idtype, $_SESSION['idartiste']);
header('Location: ./../Artistes/artiste_account.php');
?>