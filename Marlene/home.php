<?php
require_once __DIR__."/Config/Utils.php";
require_once __DIR__."/Controller/HomeController.php";


session_start();

// on récupère le controlleur demandé
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : "Home" ;
$ctrl = ucfirst($ctrl);
// var_dump($ctrl);

// on require le fichier controlleur concerné
if ($ctrl == "Client") {
    include_once __DIR__ ."/Controller/ClientController.php";
} else if ($ctrl == "Buy") {
    include_once __DIR__ ."/Controller/BuyController.php";
} else if ($ctrl == "Preferredartiste") {
    include_once __DIR__ ."/Controller/PreferredartisteController.php";
}

// on récupère la fonction de notre controlleur à exécuter
$fonction = isset($_GET['fct']) ? $_GET['fct'] : "index_home" ; 

// si on à un id, on le passe dans la fonction
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $data = $fonction($id);
}
// si on a un idclient, c'est qu'on à un idartiste également
elseif (isset($_GET["idclient"]) && isset($_GET['idartiste'])) {
    $idclient = $_GET["idclient"];
    $idartiste = $_GET["idartiste"];
    $data = $fonction($idclient, $idartiste);
}
// sinon la fonction ne prends pas d'argument
else {
    $data = $fonction();
}

// on récupère la page
$page = ($data["page"]) ? $data["page"] : 'index_home' ;

// on récupère le message s'il on en a un
$msg = (isset($_GET["msg"])) ? $_GET["msg"] : null ;

//
if (is_file("./Views/page/$ctrl/$page.php")) {
    $view = "./Views/page/$ctrl/$page.php";
} else {    
    echo $page;
    echo "la vue n'existe pas";
    // return_home();
}

$view = is_file("./Views/page/$ctrl/$page.php")
 ? "./Views/page/$ctrl/$page.php" : "./Views/page/Home/index_home.php";


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

// var_dump_pre($data);
?>