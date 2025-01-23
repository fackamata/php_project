<?php
require "./../config.php";
require_once './../fonctionsBDD/Galery.php';

// $galeries = get_galery_by_id($_GET["idgalerie"]);
// echo "<pre>";
// print_r($galeries);
// echo "</pre>";

echo "<pre>";
print_r($_GET);
echo "</pre>";

$idgalerie = pg_escape_string($_GET["idgalerie"]);

echo "<pre>";
print_r(pg_escape_string($_GET["idgalerie"]));
echo "</pre>";

delete_galery($idgalerie);
header('Location: ./../Galery/all_galery.php');
?>