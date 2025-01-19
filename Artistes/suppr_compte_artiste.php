<?php
require "./../config.php";
require_once BASE_PATH.'/fonctionsBDD/Artistes.php';

echo "<p>Alors ?</p>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$res = login_artiste($_SESSION["pseudoartiste"]);
$test = password_verify($_POST['supprpass'], $res['motdepasseartiste']);
if($test){
    echo "VALIDE";
    delete_artiste($_SESSION['pseudoartiste']);
    session_reset();
    header('Location: ./../index.php');
}
?>
