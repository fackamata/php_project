<?php
require "./config.php";
require_once BASE_PATH."/fonctionsBDD/Artistes.php";
//require_once BASE_PATH."/fonctionsBDD/Clients.php";
echo "Test";
echo "<pre>";
print_r($_POST);
echo "</pre>";
$table = $_POST["type_compte"];
$pseudo = $_POST["pseudo"];
$password = $_POST["password"];
session_start();
if ($_POST['type_compte'] == "artistes"){
    $res = login_artiste($pseudo);
    echo "<pre>";
    print_r($res);
    echo "</pre>";
    $test = password_verify($password, $res["motdepasseartiste"]);
    echo $test;
    if($test){
        $_SESSION['idartiste'] = $res['idartiste'];
        $_SESSION['pseudoartiste'] = $res['pseudoartiste'];
        header('Location: ./Artistes/artiste_account.php');
    }
    else{}
}
else{
    $res = login_client($pseudo);
    echo $res;
}
?>