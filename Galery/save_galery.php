<?php
require './../config.php';
require_once './../fonctionsBDD/Galery.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

// $var = '(';
// $var = $var."'".$_POST["imagegalerie"]."', ";   
// $var = $var."'".$_POST["nomgalerie"]."', ";
// $var = $var."'".$_POST["descriptiongalerie"]."', ";
// $var = $var."'".$_POST["villegalerie"]."', ";
// $var = $var."'".$_POST["adressegalerie"]."', ";
// $var = $var."'".$_POST["cpgalerie"]."', ";
// $var = $var."'".$_POST["paysgalerie"]."') ";

$imagegalerie = pg_escape_string($_POST["imagegalerie"]);   
$nomgalerie = pg_escape_string($_POST["nomgalerie"]);
$descriptiongalerie = pg_escape_string($_POST["descriptiongalerie"]);
$villegalerie = pg_escape_string($_POST["villegalerie"]);
$adressegalerie = pg_escape_string($_POST["adressegalerie"]);
$cpgalerie = pg_escape_string($_POST["cpgalerie"]);
$paysgalerie = pg_escape_string($_POST["paysgalerie"]);

add_galery($imagegalerie, $nomgalerie, $descriptiongalerie, $villegalerie, $adressegalerie, $cpgalerie, $paysgalerie, $idgalerie);
header('location: ./all_galery.php') // fonctionnel
?>