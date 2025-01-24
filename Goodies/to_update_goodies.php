<?php
require './../config.php';
require_once './../fonctionsBDD/Goodies.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

$goodies = get_goodies_by_id($_GET["idobject"]);
// echo "<pre>";
// print_r($goodies);
// echo "</pre>";

$nomobject = pg_escape_string($_POST["nomobject"]);
$prixobject = pg_escape_string($_POST["prixobject"]);
$descriptionobject = pg_escape_string($_POST["descriptionobject"]);
$imageobject = pg_escape_string($_POST["imageobject"]);
$idobject = $goodies[0]['idobject'];

echo "<pre>";
print_r($goodies[0]['idobject']);
echo "</pre>";

edit_goodies($nomobject, $prixobject, $descriptionobject, $imageobject, $idobject);
header('location: ./one_goodies.php?idobject='.$objects[0]['idobject']) //fonctionnel
?>