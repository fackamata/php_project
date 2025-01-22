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
$pseudo = $_POST["pseudoartiste"];
add_artiste($var, $pseudo);
$res = login_artiste($pseudo);
echo "<pre>";
print_r($res);
echo "</pre>";
echo "<pre>";
print_r($_FILES);
echo "</pre>";
session_start();
$_SESSION['pseudoartiste'] = $res['pseudoartiste'];
$_SESSION['idartiste'] = $res['idartiste'];
//header('Location: ./artiste_account.php')
?>