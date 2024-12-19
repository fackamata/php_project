<?php
require "./config.php";
require_once BASE_PATH."/fonctionsBDD/Artistes.php";
require_once BASE_PATH."/fonctionsBDD/Clients.php";
echo "Test";
echo "<pre>";
print_r($_GET);
echo "</pre>";
$table = $_GET["type_compte"];
$pseudo = $_GET["pseudo"];
$password = $_GET["password"];
session_start();
if ($_GET['type_compte'] == "artistes"){
    $res = login_artiste($pseudo);
    echo "<pre>";
    print_r($res);
    echo "</pre>";
    $test = password_verify($password, $res["motdepasseartiste"]);
    if($test){
        header('Location: ./Artistes/artiste_account.php');
        $_SESSION['idartiste'] = $res['idartiste'];
        $_SESSION['pseudoartiste'] = $res['pseudoartiste'];
    }
}
else{
    $res = login_client($pseudo);
    echo $res;
}
?>