<?php
require "./../config.php";
require_once BASE_PATH."/fonctionsBDD/Artistes.php";
echo "Test";
echo "<pre>";
print_r($_POST);
echo "</pre>";
$pseudo = $_POST["pseudo"];
$password = $_POST["password"];
session_start();
$res = login_artiste($pseudo);
echo "<pre>";
print_r($res);
echo "</pre>";
$test = password_verify($password, $res["motdepasseartiste"]);
echo $test;
if($test){
    $_SESSION['idartiste'] = $res['idartiste'];
    $_SESSION['pseudoartiste'] = $res['pseudoartiste'];
    header('Location: ./artiste_account.php');
}
else{
    header('Location: ./connection_artiste.php');
}
?>