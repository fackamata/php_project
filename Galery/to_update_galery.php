<?php
require './../config.php';
require_once './../fonctionsBDD/Galery.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

$galeries = get_galery_by_id($_GET["idgalerie"]);
echo "<pre>";
print_r($galeries);
echo "</pre>";

$imagegalerie = pg_escape_string($_POST["imagegalerie"]);   
$nomgalerie = pg_escape_string($_POST["nomgalerie"]);
$descriptiongalerie = pg_escape_string($_POST["descriptiongalerie"]);
$villegalerie = pg_escape_string($_POST["villegalerie"]);
$adressegalerie = pg_escape_string($_POST["adressegalerie"]);
$cpgalerie = pg_escape_string($_POST["cpgalerie"]);
$paysgalerie = pg_escape_string($_POST["paysgalerie"]);
$idgalerie = $galeries[0]['idgalerie'];

// echo "<pre>";
// print_r($galeries[0]['idgalerie']);
// echo "</pre>";

edit_galery($imagegalerie, $nomgalerie, $descriptiongalerie, $villegalerie, $adressegalerie, $cpgalerie, $paysgalerie, $idgalerie);
header('location: ./one_galery.php?idgalerie='.$galeries[0]['idgalerie']) //fonctionnel
?>