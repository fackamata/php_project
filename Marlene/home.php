<?php
require_once __DIR__."/Config/Utils.php";
require_once __DIR__."/Controller/HomeController.php";



// var_dump_pre($_SERVER["REQUEST_URI"]); 
// var_dump_pre($_GET);
// redirect_on_page("index_client");

// on récupère le controlleur demandé
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : "Home" ;
$ctrl = ucfirst($ctrl);
// var_dump($ctrl);

// on require le fichier controlleur concerné
if ($ctrl == "Client") {
    include_once __DIR__ ."/Controller/ClientController.php";
} else if ($ctrl == "Bid") {
    include_once __DIR__ ."/Controller/BidController.php";
} else if ($ctrl == "Buy") {
    include_once __DIR__ ."/Controller/BuyController.php";
}
// switch ($ctrl) {
//     case "Client":
//         echo "dans le cas client\n";
//         include_once __DIR__ ."/Controller/ClientController.php";
//     case "Bid":
//         include_once __DIR__ ."/Controller/BidController.php";
//         echo "dans le cas bid\n";
//     case "Buy":
//         include_once __DIR__ ."/Controller/BuyController.php";
//         echo "dans le cas buy\n";
//     default:
//         echo "pas de controlleur préciser";
// }

// on récupère la fonction de notre controlleur à exécuter
$fonction = isset($_GET['fct']) ? $_GET['fct'] : "index_home" ; 
// var_dump($fonction);

// si on à un id, on le passe dans la fonction
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $data = $fonction($id);
} else {
    $data = $fonction();
}

$page = ($data["page"]) ? $data["page"] : 'index_home' ;
// var_dump($page);

if (is_file("./Views/page/$ctrl/$page.php")) {
    $view = "./Views/page/$ctrl/$page.php";
} else {
    $view = "./Views/page/Home/index_home.php";
}
$view = is_file("./Views/page/$ctrl/$page.php")
 ? "./Views/page/$ctrl/$page.php" : "./Views/page/Home/index_home.php";

//  var_dump($data);
// démarre la temporisation de sortie
ob_start(); 
// on extraie nos data pour les utliser dans la vue
$data = ($data) ? $data : ['title' => 'Admin Marlène'] ;
extract($data);
require_once $view;
// fait le get content et le nettoie la mémoire tampon
$view_content = ob_get_clean(); 
// on affiche le tout dans la vue par défaut
require_once "./Views/templates/default.php";

var_dump_pre($data);
?>