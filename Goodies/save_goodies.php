<?php
require './../config.php';
require_once './../fonctionsBDD/Goodies.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

$nomobject = pg_escape_string($_POST["nomobject"]);
$prixobject = pg_escape_string($_POST["prixobject"]);
$refidoeuvre = pg_escape_string($_POST["refidoeuvre"]);
$descriptionobject = pg_escape_string($_POST["descriptionobject"]);
$imageobject = pg_escape_string($_POST["imageobject"]);

add_goodies( $nomobject, $prixobject, $refidoeuvre, $descriptionobject, $imageobject);
header('location: ./all_goodies.php') // fonctionnel
?>