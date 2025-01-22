<?php
require './../config.php';
require_once './../fonctionsBDD/Galery.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

$var = '(';
$var = $var."'".$_POST["imagegalerie"]."', ";   
$var = $var."'".$_POST["nomgalerie"]."', ";
$var = $var."'".$_POST["descriptiongalerie"]."', ";
$var = $var."'".$_POST["villegalerie"]."', ";
$var = $var."'".$_POST["adressegalerie"]."', ";
$var = $var."'".$_POST["cpgalerie"]."', ";
$var = $var."'".$_POST["paysgalerie"]."') ";

add_galery($var);
// header('location: ./add_galery.php') // fonctionnel
?>