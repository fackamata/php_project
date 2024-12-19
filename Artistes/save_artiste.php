<?php
require './../config.php';
require_once BASE_PATH.'/fonctionsBDD/Artistes.php';

$var = '(';
$var = $var."'".$_POST["nomartiste"]."', ";
$var = $var."'".$_POST["prenomartiste"]."', ";
$var = $var."'".$_POST["villeartiste"]."', ";
$var = $var."'".$_POST["paysartiste"]."', ";
$var = $var."'".$_POST["emailartiste"]."', ";
$var = $var."'".$_POST["descriptionartiste"]."', ";
$var = $var."'".password_hash($_POST["firstpass"], PASSWORD_DEFAULT)."', ";
$pseudo = "'".$_POST["pseudoartiste"]."')";
$res = add_artiste($var, $pseudo);
session_start();
$_SESSION['idartiste'] = $res;
header('Location: ./artiste_account.php')
?>