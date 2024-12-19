<?php
require_once BASE_PATH."/fonctionsBDD/Artistes.php";

session_start();
echo "<pre>";
print_r($_POST);
echo "</pre>";

$res = login_artiste($_SESSION['pseudoartiste']);
echo "<pre>";
print_r($res);
echo "</pre>";

$test = password_verify($_POST['oldpass'], $res['motdepasseartiste']);
if ($test){
    echo "PASSWORD CORRECT";
    change_password(password_hash($_POST['firstpass'], PASSWORD_DEFAULT), $_SESSION['idartiste']);
}
?>