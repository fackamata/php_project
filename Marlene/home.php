<?php
require_once __DIR__."/Config/Utils.php";
require_once __DIR__."/Controller/HomeController.php";


session_start();

// var_dump_pre($_SERVER["PHP_AUTH_USER"]); 
// var_dump_pre($_GET);

// on récupère le controlleur demandé
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : "Home" ;
$ctrl = ucfirst($ctrl);
// var_dump($ctrl);

// on require le fichier controlleur concerné
if ($ctrl == "Client") {
    include_once __DIR__ ."/Controller/ClientController.php";
} else if ($ctrl == "Bid") {
    include_once __DIR__ ."/Controller/BidController.php";
} else if ($ctrl == "Preferredartiste") {
    include_once __DIR__ ."/Controller/PreferredartisteController.php";
} else if ($ctrl == "Preferredoeuvre") {
    include_once __DIR__ ."/Controller/PreferredoeuvreController.php";
}

// on récupère la fonction de notre controlleur à exécuter
$fonction = isset($_GET['fct']) ? $_GET['fct'] : "index_home" ; 

// si on à un id, on le passe dans la fonction
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $data = $fonction($id);
// si on a un idclient
} elseif (isset($_GET["idclient"])) {
    $idclient = isset($_GET["idclient"]);
    // si on a un idclient, on a soit un idartiste ou un idoeuvre
    if (isset($_GET["idartiste"])) {
        $idartiste = isset($_GET["idartiste"]);
        $data = $fonction($idclient, $idartiste);
    }elseif (isset($_GET["idoeuvre"])) {
        $idoeuvre = isset($_GET["idoeuvre"]);
        $data = $fonction($idclient, $oeuvre);
    }
}
else {
    $data = $fonction();
}

$page = ($data["page"]) ? $data["page"] : 'index_home' ;

// on récupère le message s'il on en a un
$msg = (isset($_GET["msg"])) ? $_GET["msg"] : null ;


if (is_file("./Views/page/$ctrl/$page.php")) {
    $view = "./Views/page/$ctrl/$page.php";
} else {
    $view = "./Views/page/Home/index_home.php";
}

// $view = is_file("./Views/page/$ctrl/$page.php")
//  ? "./Views/page/$ctrl/$page.php" : "./Views/page/Home/index_home.php";


// démarre la temporisation de sortie
ob_start(); 
// on extraie nos data pour les utliser dans la vue
$data = ($data) ? $data : ['title' => 'Admin Marlène'] ;
// on ajoute le message
$data["message"] = $msg;
extract($data);
require_once $view;
// fait le get content et le nettoie la mémoire tampon
$view_content = ob_get_clean(); 
// on affiche le tout dans la vue par défaut
require_once "./Views/templates/default.php";

var_dump_pre($data);
?>